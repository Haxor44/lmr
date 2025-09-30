@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Booking #{{ $booking->id }}</h5>
            <p class="card-text">
                <strong>User:</strong> {{ $booking->user->username }}<br>
                <strong>Check-in:</strong> {{ $booking->checkin }}<br>
                <strong>Check-out:</strong> {{ $booking->checkout }}<br>
                <strong>Created at:</strong> {{ $booking->created_at }}
            </p>
            
            <h5>Rooms Booked</h5>
            <ul>
                @foreach($booking->rooms as $room)
                <li>
                    Room #{{ $room->room_number }} ({{ $room->room_type }})
                    <img src="{{ asset('storage/' . $room->image) }}" width="100">
                </li>
                @endforeach
            </ul>
            
            @if($booking->status === 'pending')
                <a href="{{ route('payments.show', $booking->id) }}" 
                   class="btn btn-success btn-lg">
                    <i class="fas fa-credit-card me-2"></i>
                    Complete Payment (KES {{ number_format($booking->total_price, 2) }})
                </a>
            @elseif($booking->status === 'confirmed')
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i>
                    Payment confirmed! Your booking is confirmed.
                </div>
            @elseif($booking->status === 'cancelled')
                <div class="alert alert-danger">
                    <i class="fas fa-times-circle me-2"></i>
                    This booking has been cancelled.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection