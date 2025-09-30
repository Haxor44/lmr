@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div style="min-height: 100vh; background: var(--bg-secondary); padding-top: 70px;">
    <!-- Search Header -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-2xl font-bold text-gray-900 mb-4">Available Rooms</h1>
            
            <!-- Search Summary -->
            <div class="bg-blue-50 rounded-lg p-4 mb-4">
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-700">
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($searchCriteria['check_in'])->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($searchCriteria['check_out'])->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-2.239"></path>
                        </svg>
                        <span><strong>{{ $searchCriteria['guests'] }}</strong> Guest{{ $searchCriteria['guests'] > 1 ? 's' : '' }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span><strong>{{ $searchCriteria['duration'] }}</strong> night{{ $searchCriteria['duration'] > 1 ? 's' : '' }}</span>
                    </div>
                </div>
            </div>

            <!-- Results Count -->
            <div class="flex justify-between items-center">
                <p class="text-gray-600">
                    Found <strong>{{ $totalFound }}</strong> available room{{ $totalFound != 1 ? 's' : '' }}
                </p>
                
                <!-- Modify Search Button -->
                <a href="{{ url('/') }}#booking-form" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Modify Search
                </a>
            </div>
        </div>
    </div>

    <!-- Search Results -->
    <div class="container mx-auto px-4 py-8">
        @if($totalFound > 0)
            <div class="space-y-6">
                @foreach($rooms as $room)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="md:flex">
                        <!-- Room Image -->
                        <div class="md:w-80 h-64 md:h-auto">
                            @if($room->images && count($room->images) > 0)
                                <img src="{{ asset('storage/' . $room->images[0]) }}" 
                                     alt="{{ $room->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Room Details -->
                        <div class="flex-1 p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $room->name }}</h3>
                                    <div class="flex items-center gap-4 text-sm text-gray-600 mb-3">
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                            {{ ucfirst($room->type) }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-2.239"></path>
                                            </svg>
                                            Up to {{ $room->max_guests }} guests
                                        </span>
                                    </div>
                                </div>
                                
                                <!-- Pricing -->
                                <div class="text-right">
                                    <div class="text-2xl font-bold text-blue-600">
                                        KES {{ number_format($room->pricing['total_price'], 0) }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        for {{ $searchCriteria['duration'] }} night{{ $searchCriteria['duration'] > 1 ? 's' : '' }}
                                    </div>
                                    <div class="text-xs text-gray-400 mt-1">
                                        KES {{ number_format($room->pricing['total_price'] / $searchCriteria['duration'], 0) }}/night
                                    </div>
                                </div>
                            </div>

                            <!-- Room Description -->
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $room->description }}</p>

                            <!-- Room Features -->
                            @if(!empty($room->features))
                            <div class="mb-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($room->features, 0, 4) as $feature)
                                        <span class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-md">
                                            {{ $feature }}
                                        </span>
                                    @endforeach
                                    @if(count($room->features) > 4)
                                        <span class="inline-flex items-center px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-md">
                                            +{{ count($room->features) - 4 }} more
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <!-- Price Breakdown -->
                            <div class="bg-gray-50 rounded-lg p-3 mb-4">
                                <div class="text-sm space-y-1">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Room rate ({{ $searchCriteria['duration'] }} nights)</span>
                                        <span>KES {{ number_format($room->pricing['base_amount'], 0) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Tax (10%)</span>
                                        <span>KES {{ number_format($room->pricing['tax_amount'], 0) }}</span>
                                    </div>
                                    <div class="flex justify-between font-semibold text-gray-900 pt-1 border-t border-gray-200">
                                        <span>Total</span>
                                        <span>KES {{ number_format($room->pricing['total_price'], 0) }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex gap-3">
                                <a href="{{ url('/rooms/details/' . $room->id) }}" 
                                   class="flex-1 text-center px-4 py-2 border border-blue-600 text-blue-600 rounded-md hover:bg-blue-50 transition-colors">
                                    View Details
                                </a>
                                <button onclick="bookRoom({{ json_encode($room) }}, {{ json_encode($searchCriteria) }})" 
                                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors font-semibold">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- No Results -->
            <div class="text-center py-12">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">No rooms available</h3>
                <p class="text-gray-600 mb-4">
                    We couldn't find any rooms matching your search criteria for the selected dates.
                </p>
                <div class="space-y-2 text-sm text-gray-500">
                    <p>Try adjusting your search:</p>
                    <ul class="list-disc list-inside space-y-1">
                        <li>Change your check-in or check-out dates</li>
                        <li>Reduce the number of guests</li>
                        <li>Select a different room type</li>
                    </ul>
                </div>
                <a href="{{ url('/') }}#booking-form" 
                   class="inline-flex items-center mt-6 px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search Again
                </a>
            </div>
        @endif
    </div>
</div>

<!-- Booking Modal -->
<div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg max-w-md w-full mx-4 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Confirm Booking</h3>
            <button onclick="closeBookingModal()" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div id="bookingDetails" class="mb-4">
            <!-- Booking details will be populated here -->
        </div>
        
        <form id="bookingForm" action="{{ url('/bookings') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" id="room_id" name="room_id">
            <input type="hidden" id="check_in" name="check_in">
            <input type="hidden" id="check_out" name="check_out">
            <input type="hidden" id="guests" name="guests">
            
            <div>
                <label for="guest_name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="guest_name" name="guest_details[name]" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="guest_email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" id="guest_email" name="guest_details[email]" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="guest_phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" id="guest_phone" name="guest_details[phone]" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="button" onclick="closeBookingModal()" 
                        class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50">
                    Cancel
                </button>
                <button type="submit" 
                        class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-semibold">
                    Create Booking
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function bookRoom(room, searchCriteria) {
    // Populate modal with room details
    const bookingDetails = document.getElementById('bookingDetails');
    bookingDetails.innerHTML = `
        <div class="bg-gray-50 rounded-lg p-4">
            <h4 class="font-semibold text-gray-900 mb-2">${room.name}</h4>
            <div class="text-sm text-gray-600 space-y-1">
                <div>Check-in: ${new Date(searchCriteria.check_in).toLocaleDateString()}</div>
                <div>Check-out: ${new Date(searchCriteria.check_out).toLocaleDateString()}</div>
                <div>Guests: ${searchCriteria.guests}</div>
                <div>Duration: ${searchCriteria.duration} night${searchCriteria.duration > 1 ? 's' : ''}</div>
                <div class="font-semibold text-blue-600 pt-2">Total: KES ${room.pricing.total_price.toLocaleString()}</div>
            </div>
        </div>
    `;
    
    // Populate form fields
    document.getElementById('room_id').value = room.id;
    document.getElementById('check_in').value = searchCriteria.check_in;
    document.getElementById('check_out').value = searchCriteria.check_out;
    document.getElementById('guests').value = searchCriteria.guests;
    
    // Show modal
    document.getElementById('bookingModal').classList.remove('hidden');
    document.getElementById('bookingModal').classList.add('flex');
}

function closeBookingModal() {
    document.getElementById('bookingModal').classList.add('hidden');
    document.getElementById('bookingModal').classList.remove('flex');
}

// Handle booking form submission
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading state
    const submitButton = this.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.textContent = 'Creating Booking...';
    
    // Submit form
    const formData = new FormData(this);
    
    fetch('{{ url('/bookings') }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Redirect to booking details or payment page
            window.location.href = data.redirect_url || '/bookings/' + data.booking_id;
        } else {
            throw new Error(data.message || 'Booking creation failed');
        }
    })
    .catch(error => {
        alert('Error creating booking: ' + error.message);
        submitButton.disabled = false;
        submitButton.textContent = 'Create Booking';
    });
});

// Close modal when clicking outside
document.getElementById('bookingModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeBookingModal();
    }
});
</script>
@endpush
@endsection
