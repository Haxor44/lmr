<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'check_in', 'check_out', 'guests',
        'base_amount', 'tax_amount', 'total_price', 'status',
        'payment_method', 'payment_id', 'confirmation_code', 'guest_details'
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
        'base_amount' => 'decimal:2',
        'tax_amount' => 'decimal:2',
        'total_price' => 'decimal:2',
        'guest_details' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($booking) {
            $booking->confirmation_code = strtoupper(Str::random(8));
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class)->latest();
    }

    public function getDurationAttribute()
    {
        return $this->check_out->diffInDays($this->check_in);
    }

    public function canBeCancelled()
    {
        return $this->status === 'confirmed' && 
               $this->check_in->gt(now()->addDays(1)); // 24 hours cancellation policy
    }
}
