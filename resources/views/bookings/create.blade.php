@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Booking</h1>
    
    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="checkin">Check-in Date</label>
            <input type="date" class="form-control" id="checkin" name="checkin" required>
        </div>
        
        <div class="form-group">
            <label for="checkout">Check-out Date</label>
            <input type="date" class="form-control" id="checkout" name="checkout" required>
        </div>
        
        <div class="form-group">
            <label>Available Rooms</label>
            @foreach($availableRooms as $room)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="room_ids[]" 
                       id="room-{{ $room->id }}" value="{{ $room->id }}">
                <label class="form-check-label" for="room-{{ $room->id }}">
                    Room #{{ $room->room_number }} ({{ $room->room_type }})
                </label>
            </div>
            @endforeach
        </div>
        
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection