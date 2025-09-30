@extends('layouts.app')

@section('title', 'Experience Luxury Redefined')

@section('content')
<!-- Hero Section -->
<section class="hero" id="home">
    <div class="container">
        <div class="hero-content">
            <h1>Experience Luxury Redefined</h1>
            <p class="subtitle">
                Indulge in our premium accommodations, world-class amenities, and exceptional service for an unforgettable stay
            </p>
            
            <form class="booking-form" id="bookingForm">
                @csrf
                <div class="form-group">
                    <label for="checkin">Check-in Date</label>
                    <input type="date" id="checkin" name="checkin" required>
                </div>
                
                <div class="form-group">
                    <label for="checkout">Check-out Date</label>
                    <input type="date" id="checkout" name="checkout" required>
                </div>
                
                <div class="form-group">
                    <label for="guests">Guests</label>
                    <select id="guests" name="guests" required>
                        <option value="1" selected>1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                        <option value="5">5+ Guests</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="roomtype">Room Type</label>
                    <select id="roomtype" name="roomtype">
                        <option value="any" selected>Any Type</option>
                        <option value="single">Single Room</option>
                        <option value="double">Double Room</option>
                        <option value="suite">Suite</option>
                        <option value="deluxe">Deluxe Room</option>
                    </select>
                </div>
                
                <button type="submit" class="search-btn">
                    <span class="search-text">
                        <i class="fas fa-search"></i>
                        Search Availability
                    </span>
                    <span class="search-loading" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i>
                        Searching...
                    </span>
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Featured Accommodations -->
<section class="section" style="background: var(--bg-secondary);" id="rooms">
    <div class="container">
        <div class="section-title">
            <h2>Featured Accommodations</h2>
            <p>Explore our most popular room options designed for your comfort and luxury</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-bottom: 2rem;">
            <!-- Deluxe King Room -->
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: var(--shadow); transition: transform 0.3s ease, box-shadow 0.3s ease;" 
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow)'">
                
                <div style="height: 200px; background: url('/images/100.jpg') center/cover; position: relative;">
                    <span style="position: absolute; top: 1rem; right: 1rem; background: var(--accent-color); color: white; padding: 0.25rem 0.75rem; border-radius: 15px; font-size: 0.8rem; font-weight: 500;">
                        Popular
                    </span>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 600;">Deluxe King Room</h3>
                    <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1rem;">
                        KES 25,000<span style="font-size: 0.8rem; color: var(--text-secondary); font-weight: normal;">/night</span>
                    </div>
                    
                    <ul style="list-style: none; margin-bottom: 1.5rem; color: var(--text-secondary);">
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-bed" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            King-size bed with premium linens
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-wifi" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            High-speed WiFi
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-tv" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            Smart TV with streaming services
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-concierge-bell" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            24-hour room service
                        </li>
                    </ul>
                    
                    <div style="display: flex; gap: 1rem;">
                        <a href="#" class="btn btn-outline" style="flex: 1; text-align: center;">View Details</a>
                        <a href="#" class="btn btn-primary" style="flex: 1; text-align: center;">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Luxury Suite -->
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: var(--shadow); transition: transform 0.3s ease, box-shadow 0.3s ease;" 
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow)'">
                
                <div style="height: 200px; background: url('/images/120.jpg') center/cover; position: relative;">
                    <span style="position: absolute; top: 1rem; right: 1rem; background: var(--secondary-color); color: white; padding: 0.25rem 0.75rem; border-radius: 15px; font-size: 0.8rem; font-weight: 500;">
                        Trending
                    </span>
                </div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 600;">Luxury Suite</h3>
                    <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1rem;">
                        KES 45,000<span style="font-size: 0.8rem; color: var(--text-secondary); font-weight: normal;">/night</span>
                    </div>
                    
                    <ul style="list-style: none; margin-bottom: 1.5rem; color: var(--text-secondary);">
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-home" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            Separate living and bedroom areas
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-bed" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            King-size bed with premium linens
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-couch" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            Spacious living area
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-spa" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            Premium bathroom with luxury amenities
                        </li>
                    </ul>
                    
                    <div style="display: flex; gap: 1rem;">
                        <a href="#" class="btn btn-outline" style="flex: 1; text-align: center;">View Details</a>
                        <a href="#" class="btn btn-primary" style="flex: 1; text-align: center;">Book Now</a>
                    </div>
                </div>
            </div>

            <!-- Family Suite -->
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: var(--shadow); transition: transform 0.3s ease, box-shadow 0.3s ease;" 
                 onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'"
                 onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='var(--shadow)'">
                
                <div style="height: 200px; background: url('/images/104.jpg') center/cover; position: relative;"></div>
                
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.3rem; margin-bottom: 0.5rem; color: var(--text-primary); font-weight: 600;">Family Suite</h3>
                    <div style="font-size: 1.5rem; font-weight: bold; color: var(--primary-color); margin-bottom: 1rem;">
                        KES 35,000<span style="font-size: 0.8rem; color: var(--text-secondary); font-weight: normal;">/night</span>
                    </div>
                    
                    <ul style="list-style: none; margin-bottom: 1.5rem; color: var(--text-secondary);">
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-users" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            Perfect for families
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-gamepad" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            Family-friendly entertainment
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-wifi" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            High-speed WiFi
                        </li>
                        <li style="padding: 0.25rem 0; display: flex; align-items: center;">
                            <i class="fas fa-concierge-bell" style="margin-right: 0.5rem; color: var(--primary-color); width: 16px;"></i>
                            24-hour room service
                        </li>
                    </ul>
                    
                    <div style="display: flex; gap: 1rem;">
                        <a href="#" class="btn btn-outline" style="flex: 1; text-align: center;">View Details</a>
                        <a href="#" class="btn btn-primary" style="flex: 1; text-align: center;">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center">
            <a href="{{ url('/rooms') }}" class="btn btn-outline">
                <i class="fas fa-arrow-right"></i>
                View All Rooms
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section" id="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Premium Services</h2>
            <p>Enhancing your stay with exceptional amenities and personalized experiences</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
            <div class="text-center" style="padding: 2rem;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem; box-shadow: 0 4px 15px rgba(44, 90, 160, 0.3);">
                    <i class="fas fa-spa"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--text-primary); font-weight: 600;">Spa & Wellness</h3>
                <p style="color: var(--text-secondary); line-height: 1.6;">Relax and rejuvenate with our premium spa treatments and wellness facilities for ultimate relaxation.</p>
            </div>
            
            <div class="text-center" style="padding: 2rem;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem; box-shadow: 0 4px 15px rgba(44, 90, 160, 0.3);">
                    <i class="fas fa-tint"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--text-primary); font-weight: 600;">Water Refilling</h3>
                <p style="color: var(--text-secondary); line-height: 1.6;">Stay hydrated with our convenient water refilling stations and complimentary bottled water service.</p>
            </div>
            
            <div class="text-center" style="padding: 2rem;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem; box-shadow: 0 4px 15px rgba(44, 90, 160, 0.3);">
                    <i class="fas fa-dumbbell"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--text-primary); font-weight: 600;">Fitness Center</h3>
                <p style="color: var(--text-secondary); line-height: 1.6;">Stay fit with our state-of-the-art equipment and personal training services available 24/7.</p>
            </div>
            
            <div class="text-center" style="padding: 2rem;">
                <div style="width: 80px; height: 80px; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: white; font-size: 2rem; box-shadow: 0 4px 15px rgba(44, 90, 160, 0.3);">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 style="margin-bottom: 1rem; color: var(--text-primary); font-weight: 600;">Event Spaces</h3>
                <p style="color: var(--text-secondary); line-height: 1.6;">Host unforgettable events in our elegant and versatile spaces with professional event planning.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section" style="background: var(--bg-secondary);">
    <div class="container">
        <div class="section-title">
            <h2>Guest Experiences</h2>
            <p>What our valued guests say about their stay with us</p>
        </div>
        
        <div style="background: white; padding: 3rem; border-radius: 15px; box-shadow: var(--shadow); max-width: 800px; margin: 0 auto; text-align: center;">
            <div style="font-size: 4rem; color: var(--primary-color); margin-bottom: 1rem; opacity: 0.3;">
                <i class="fas fa-quote-left"></i>
            </div>
            <p style="font-size: 1.2rem; font-style: italic; margin-bottom: 2rem; color: var(--text-secondary); line-height: 1.6;">
                "Our stay at MatFam Resort exceeded all expectations. The rooms were immaculate, the staff attentive, and the amenities world-class. We'll definitely be returning for our next vacation."
            </p>
            <div style="display: flex; align-items: center; justify-content: center; gap: 1rem;">
                <div style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem;">
                    <i class="fas fa-user"></i>
                </div>
                <div style="text-align: left;">
                    <h4 style="color: var(--text-primary); margin-bottom: 0.25rem; font-weight: 600;">Sarah Johnson</h4>
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">Business Traveler</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section style="background: linear-gradient(135deg, var(--primary-color), var(--primary-dark)); color: white; padding: 4rem 0; text-align: center;">
    <div class="container">
        <h2 style="margin-bottom: 1rem; font-size: 2.2rem; font-weight: 600;">Stay Updated with Our Special Offers</h2>
        <p style="margin-bottom: 2.5rem; opacity: 0.9; font-size: 1.1rem; max-width: 600px; margin-left: auto; margin-right: auto;">
            Subscribe to our newsletter and be the first to know about exclusive deals, seasonal promotions, and travel inspiration.
        </p>
        
        <form style="display: flex; max-width: 500px; margin: 0 auto; gap: 1rem; flex-wrap: wrap;" onsubmit="handleNewsletterSubmit(event)">
            <input type="email" placeholder="Enter your email address" required 
                   style="flex: 1; padding: 1rem; border: none; border-radius: var(--border-radius); font-size: 1rem; min-width: 250px;">
            <button type="submit" class="btn btn-secondary" style="padding: 1rem 2rem; font-size: 1rem; font-weight: 600;">
                <i class="fas fa-paper-plane"></i>
                Subscribe
            </button>
        </form>
        
        <p style="font-size: 0.8rem; margin-top: 1.5rem; opacity: 0.7;">
            We respect your privacy. Unsubscribe at any time.
        </p>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Enhanced booking form functionality
document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    const checkinDate = document.getElementById('checkin');
    const checkoutDate = document.getElementById('checkout');
    
    // Set minimum dates to today
    if (checkinDate && checkoutDate) {
        checkinDate.min = today;
        checkoutDate.min = today;
        
        // Set default check-in to today
        if (!checkinDate.value) {
            checkinDate.value = today;
        }
        
        // Set default check-out to tomorrow
        if (!checkoutDate.value) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            checkoutDate.value = tomorrow.toISOString().split('T')[0];
        }
        
        // Update checkout date when checkin changes
        checkinDate.addEventListener('change', function() {
            const checkinValue = new Date(this.value);
            const nextDay = new Date(checkinValue);
            nextDay.setDate(nextDay.getDate() + 1);
            checkoutDate.min = nextDay.toISOString().split('T')[0];
            
            // If checkout date is before or equal to checkin, update it
            if (checkoutDate.value <= this.value) {
                checkoutDate.value = nextDay.toISOString().split('T')[0];
            }
        });
        
        // Ensure checkout is always after checkin
        checkoutDate.addEventListener('change', function() {
            const checkinValue = new Date(checkinDate.value);
            const checkoutValue = new Date(this.value);
            
            if (checkoutValue <= checkinValue) {
                const nextDay = new Date(checkinValue);
                nextDay.setDate(nextDay.getDate() + 1);
                this.value = nextDay.toISOString().split('T')[0];
            }
        });
    }
});

// Handle booking form submission
document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Show loading state
    const searchText = document.querySelector('.search-text');
    const searchLoading = document.querySelector('.search-loading');
    const submitButton = document.querySelector('.search-btn');
    
    searchText.style.display = 'none';
    searchLoading.style.display = 'inline-flex';
    submitButton.disabled = true;
    
    // Get form values
    const checkin = document.getElementById('checkin').value;
    const checkout = document.getElementById('checkout').value;
    const guests = document.getElementById('guests').value;
    const roomtype = document.getElementById('roomtype').value;
    
    // Validate dates
    if (!checkin || !checkout) {
        MatFam.notify('Please select check-in and check-out dates.', 'error');
        resetButtonState();
        return;
    }
    
    if (new Date(checkout) <= new Date(checkin)) {
        MatFam.notify('Check-out date must be after check-in date.', 'error');
        resetButtonState();
        return;
    }
    
    // Build search URL with parameters
    const searchParams = new URLSearchParams({
        check_in: checkin,
        check_out: checkout,
        guests: guests,
        ...(roomtype !== 'any' && { room_type: roomtype })
    });
    
    // Add a small delay to show loading state, then redirect
    setTimeout(() => {
        window.location.href = `/rooms/search?${searchParams.toString()}`;
    }, 500);
    
    function resetButtonState() {
        searchText.style.display = 'inline-flex';
        searchLoading.style.display = 'none';
        submitButton.disabled = false;
    }
});

// Handle newsletter subscription
function handleNewsletterSubmit(e) {
    e.preventDefault();
    const email = e.target.querySelector('input[type="email"]').value;
    MatFam.notify(`Thank you for subscribing with email: ${email}`, 'success');
    e.target.reset();
}
</script>
@endpush
