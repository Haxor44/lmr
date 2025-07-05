<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->enum('type', ['single', 'double', 'suite', 'deluxe']);
            $table->decimal('base_price', 10, 2);
            $table->integer('max_guests');
            $table->json('amenities'); // ['wifi', 'ac', 'tv', 'minibar']
            $table->enum('availability', ['available', 'booked', 'maintenance'])->default('available');
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
