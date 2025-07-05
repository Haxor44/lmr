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
            
            <a href="{{ route('payments.create', ['booking' => $booking->id]) }}" 
               class="btn btn-success">
                Proceed to Payment
            </a>
        </div>
    </div>
</div>
@endsection