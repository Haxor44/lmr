<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Check if columns exist before dropping
            if (Schema::hasColumn('payments', 'payment_type')) {
                $table->dropColumn('payment_type');
            }
            
            // Add new columns for enhanced payment tracking
            if (!Schema::hasColumn('payments', 'booking_id')) {
                $table->foreignId('booking_id')->nullable()->constrained()->onDelete('cascade')->after('user_id');
            }
            if (!Schema::hasColumn('payments', 'amount')) {
                $table->decimal('amount', 10, 2)->after('booking_id');
            }
            if (!Schema::hasColumn('payments', 'currency')) {
                $table->string('currency', 3)->default('KES')->after('amount');
            }
            if (!Schema::hasColumn('payments', 'payment_method')) {
                $table->string('payment_method')->default('pesapal')->after('currency');
            }
            if (!Schema::hasColumn('payments', 'status')) {
                $table->enum('status', ['pending', 'completed', 'failed', 'cancelled', 'invalid'])->default('pending')->after('payment_method');
            }
            
            // Pesapal specific fields
            if (!Schema::hasColumn('payments', 'pesapal_merchant_reference')) {
                $table->string('pesapal_merchant_reference')->nullable()->after('status');
            }
            if (!Schema::hasColumn('payments', 'pesapal_redirect_url')) {
                $table->text('pesapal_redirect_url')->nullable()->after('pesapal_merchant_reference');
            }
            if (!Schema::hasColumn('payments', 'pesapal_confirmation_code')) {
                $table->string('pesapal_confirmation_code')->nullable()->after('pesapal_redirect_url');
            }
            if (!Schema::hasColumn('payments', 'pesapal_payment_method')) {
                $table->string('pesapal_payment_method')->nullable()->after('pesapal_confirmation_code');
            }
            
            // Refund tracking
            if (!Schema::hasColumn('payments', 'refund_status')) {
                $table->enum('refund_status', ['none', 'requested', 'processing', 'completed', 'failed'])->default('none')->after('pesapal_payment_method');
            }
            if (!Schema::hasColumn('payments', 'refund_amount')) {
                $table->decimal('refund_amount', 10, 2)->nullable()->after('refund_status');
            }
            if (!Schema::hasColumn('payments', 'refund_reason')) {
                $table->text('refund_reason')->nullable()->after('refund_amount');
            }
            
            // Timestamps
            if (!Schema::hasColumn('payments', 'completed_at')) {
                $table->timestamp('completed_at')->nullable()->after('refund_reason');
            }
            if (!Schema::hasColumn('payments', 'refunded_at')) {
                $table->timestamp('refunded_at')->nullable()->after('completed_at');
            }
        });
        
        // Convert details column to JSON and add indexes in a separate call
        Schema::table('payments', function (Blueprint $table) {
            // Convert existing details column to JSON if it's not already
            DB::statement('ALTER TABLE payments MODIFY details JSON NULL');
            
            // Add indexes for better performance
            if (!Schema::hasIndex('payments', 'payments_status_index')) {
                $table->index(['status']);
            }
            if (!Schema::hasIndex('payments', 'payments_booking_id_index')) {
                $table->index(['booking_id']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Drop new columns
            $table->dropIndex(['status']);
            $table->dropIndex(['booking_id']);
            $table->dropIndex(['transaction_id', 'status']);
            
            $table->dropColumn([
                'booking_id', 'amount', 'currency', 'payment_method', 'status',
                'pesapal_merchant_reference', 'pesapal_redirect_url', 'pesapal_confirmation_code',
                'pesapal_payment_method', 'refund_status', 'refund_amount', 'refund_reason',
                'completed_at', 'refunded_at', 'details'
            ]);
            
            // Restore original columns
            $table->text('details');
            $table->string('payment_type');
        });
    }
};
