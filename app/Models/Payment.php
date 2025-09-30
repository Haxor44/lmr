<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'booking_id',
        'user_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'pesapal_merchant_reference',
        'pesapal_redirect_url',
        'pesapal_confirmation_code',
        'pesapal_payment_method',
        'refund_status',
        'refund_amount',
        'refund_reason',
        'completed_at',
        'refunded_at',
        'details'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'refund_amount' => 'decimal:2',
        'completed_at' => 'datetime',
        'refunded_at' => 'datetime',
        'details' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isFailed()
    {
        return in_array($this->status, ['failed', 'cancelled', 'invalid']);
    }

    public function isRefunded()
    {
        return $this->refund_status === 'completed';
    }

    public function canBeRefunded()
    {
        return $this->isCompleted() && !$this->isRefunded();
    }
}
