@extends('layouts.room')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details - Matfam Hotel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c5aa0;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: #2c5aa0;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #2c5aa0;
            color: white;
        }

        .btn-primary:hover {
            background: #1e3d72;
        }

        .btn-outline {
            background: transparent;
            color: #2c5aa0;
            border: 1px solid #2c5aa0;
        }

        .btn-outline:hover {
            background: #2c5aa0;
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-top: 100px;
            padding: 2rem 0;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: white;
            padding: 1rem 0;
            margin-bottom: 2rem;
            border-radius: 8px;
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.9rem;
            color: #666;
        }

        .breadcrumb-nav a {
            color: #2c5aa0;
            text-decoration: none;
        }

        .breadcrumb-nav a:hover {
            text-decoration: underline;
        }

        .breadcrumb-nav span {
            color: #999;
        }

        /* Progress Steps */
        .progress-steps {
            background: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 8px;
        }

        .steps-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .step-number {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: bold;
        }

        .step.active .step-number {
            background: #2c5aa0;
            color: white;
        }

        .step.inactive .step-number {
            background: #e9ecef;
            color: #6c757d;
        }

        .step.active .step-text {
            color: #2c5aa0;
        }

        .step.inactive .step-text {
            color: #6c757d;
        }

        /* Main Layout */
        .booking-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        /* Booking Details */
        .booking-details {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .booking-details h2 {
            font-size: 1.8rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .room-info {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
        }

        .room-image {
            width: 100px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .room-details-text h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .room-details-text .max-guests {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .room-details-text .price {
            color: #2c5aa0;
            font-weight: bold;
            font-size: 1.1rem;
        }

        /* Form Fields */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background: #f8f9fa;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #2c5aa0;
            box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
        }

        /* Add-ons */
        .addons-section {
            margin-bottom: 2rem;
        }

        .addons-section h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .addon-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border: 1px solid #eee;
            border-radius: 5px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .addon-item:hover {
            border-color: #2c5aa0;
            background: #f8f9fa;
        }

        .addon-item input[type="checkbox"] {
            margin-right: 0.75rem;
            transform: scale(1.2);
        }

        .addon-label {
            flex: 1;
            font-weight: 500;
            color: #333;
        }

        .addon-price {
            font-weight: bold;
            color: #2c5aa0;
        }

        /* Continue Button */
        .continue-btn {
            width: 100%;
            background: #2c5aa0;
            color: white;
            padding: 1rem;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .continue-btn:hover {
            background: #1e3d72;
        }

        /* Booking Summary */
        .booking-summary {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .booking-summary h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
        }

        .summary-row.border-bottom {
            border-bottom: 1px solid #eee;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
        }

        .summary-label {
            color: #666;
            font-weight: 500;
        }

        .summary-value {
            color: #333;
            font-weight: 500;
        }

        .summary-total {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            border-top: 2px solid #eee;
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .cancellation-policy {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: #666;
        }

        .cancellation-policy h4 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .check-times {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #666;
        }

        .check-times div {
            margin-bottom: 0.25rem;
        }

        /* Footer */
        footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 3rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .footer-section p {
            color: #bbb;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            padding: 0.25rem 0;
        }

        .footer-section ul li a {
            color: #bbb;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: #34495e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .social-icon:hover {
            background: #2c5aa0;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            padding-top: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #bbb;
            font-size: 0.9rem;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
        }

        .footer-links a {
            color: #bbb;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: white;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .booking-layout {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .steps-container {
                flex-direction: column;
                gap: 1rem;
            }

            .room-info {
                flex-direction: column;
            }

            .room-image {
                width: 100%;
                height: 200px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .footer-links {
                justify-content: center;
            }
        }

        /* Mobile menu styles */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #2c5aa0;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="container">
            <div class="logo">Matfam</div>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/rooms') }}" class="active">Rooms</a></li>
                <li><a href="{{ url('/services') }}">Services</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
            </ul>
            <div class="auth-buttons">
                <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
            <a href="{{ url('/login') }}" class="btn btn-outline">Sign In</a>
            <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
            @endif
        @else
        <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endguest
            </div>
            <button class="mobile-menu-btn">☰</button>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <nav class="breadcrumb-nav">
                    <a href="{{ url('/') }}">Home</a>
                    <span>></span>
                    <a href="{{ url('/rooms') }}">Rooms</a>
                    <span>></span>
                    <a href="{{ url('/room-details') }}">Executive King Room</a>
                    <span>></span>
                    <span>Booking</span>
                </nav>
            </div>

            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="steps-container">
                    <div class="step active">
                        <div class="step-number">1</div>
                        <div class="step-text">Booking Details</div>
                    </div>
                    <div class="step inactive">
                        <div class="step-number">2</div>
                        <div class="step-text">Payment</div>
                    </div>
                    <div class="step inactive">
                        <div class="step-number">3</div>
                        <div class="step-text">Confirmation</div>
                    </div>
                </div>
            </div>

            <!-- Booking Layout -->
            <div class="booking-layout">
                <!-- Booking Details -->
                <div class="booking-details">
                    <h2>Booking Details</h2>

                    <!-- Room Info -->
                    <div class="room-info" id="room-info">
                        
                    </div>

                    <!-- Booking Form -->
                    <form id="bookingForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="checkinDate">Check-in Date</label>
                                <input type="date" id="checkinDate" name="checkinDate" value="2025-06-25" required>
                            </div>
                            <div class="form-group">
                                <label for="checkoutDate">Check-out Date</label>
                                <input type="date" id="checkoutDate" name="checkoutDate" value="2025-06-26" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="guests">Number of Guests</label>
                            <select id="guests" name="guests" required>
                                <option value="1" selected>1 Guest</option>
                                <option value="2">2 Guests</option>
                            </select>
                        </div>

                        <!-- Add-ons -->
                        <div class="addons-section">
                            <h3>Add-ons (Optional)</h3>
                            
                            <div class="addon-item">
                                <input type="checkbox" id="breakfast" name="addons" value="breakfast">
                                <label for="breakfast" class="addon-label">Breakfast</label>
                                <span class="addon-price">+$25</span>
                            </div>

                            <div class="addon-item">
                                <input type="checkbox" id="lateCheckout" name="addons" value="lateCheckout">
                                <label for="lateCheckout" class="addon-label">Late Check-out (until 2 PM)</label>
                                <span class="addon-price">+$40</span>
                            </div>

                            <div class="addon-item">
                                <input type="checkbox" id="airportTransfer" name="addons" value="airportTransfer">
                                <label for="airportTransfer" class="addon-label">Airport Transfer</label>
                                <span class="addon-price">+$50</span>
                            </div>

                            <div class="addon-item">
                                <input type="checkbox" id="spaAccess" name="addons" value="spaAccess">
                                <label for="spaAccess" class="addon-label">Spa Access</label>
                                <span class="addon-price">+$35</span>
                            </div>
                        </div>

                        <button type="submit" class="continue-btn">Continue to Payment</button>
                    </form>
                </div>

                <!-- Booking Summary -->
                <div class="booking-summary">
                    <h3>Booking Summary</h3>
                    
                    <div class="summary-row">
                        <span class="summary-label">Room:</span>
                        <span class="summary-value" id="summary-name"></span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Dates:</span>
                        <span class="summary-value" id="summaryDates">Jun 25 - Jun 26, 2025</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Guests:</span>
                        <span class="summary-value" id="summaryGuests">1</span>
                    </div>
                    
                    <div class="summary-row border-bottom">
                        <span class="summary-label">Duration:</span>
                        <span class="summary-value" id="summaryDuration">1 night</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Room Rate:</span>
                        <span class="summary-value" id="roomRate">Ksh320 × 1 nights</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Subtotal:</span>
                        <span class="summary-value" id="subtotal">Ksh320</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Taxes & Fees (12%):</span>
                        <span class="summary-value" id="taxes">Ksh38</span>
                    </div>
                    
                    <div class="summary-row summary-total">
                        <span class="summary-label">Total:</span>
                        <span class="summary-value" id="total">Ksh358</span>
                    </div>

                    <div class="cancellation-policy">
                        <h4>Cancellation Policy:</h4>
                        <p>Free cancellation up to 48 hours before check-in. After that, a one-night charge applies.</p>
                    </div>

                    <div class="check-times">
                        <div><strong>Check-in:</strong> From 3:00 PM</div>
                        <div><strong>Check-out:</strong> Until 12:00 PM</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Matfam</h3>
                    <p>Experience luxury accommodations with exceptional services and amenities.</p>
                    <div class="social-icons">
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">📷</a>
                        <a href="#" class="social-icon">🐦</a>
                    </div>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="rooms.html">Rooms & Suites</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="services.html#spa">Spa & Massage</a></li>
                        <li><a href="services.html#fitness">Gym & Fitness</a></li>
                        <li><a href="services.html#restaurant">Restaurant & Bar</a></li>
                        <li><a href="services.html#events">Events & Functions</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>Lanet-Ndundori Rd, opp Barracks<br>
                    Nakuru City</p>
                    <p>Phone: +254 (555) 123-4567</p>
                    <p>Email: info@lanetmatfamresort.co.ke</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Matfam. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">FAQs</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        

        function createRoomCard(room){
            const container = document.createElement('div');
            container.innerHTML = `
                        <img src="{{ url('images/${room.images}') }}?height=80&width=100" alt="Executive King Room" class="room-image">
                        <div class="room-details-text">
                            <h3>${room.name}</h3>
                            <div class="max-guests">Max guests: ${room.max_guests}</div>
                            <div class="price">Ksh${room.base_price}</div>
                        </div>
                    `
                    return container;
        }

        Promise.all([
            fetchAllRooms() // This will now be called automatically
        ]).catch(error => {
            console.error('Error loading initial data:', error);
            showError('#featuredRooms', 'Failed to load featured rooms');
            showError('#allRooms', 'Failed to load rooms');
        });
        // fetching rooms
        function fetchAllRooms() {
        fetch('/rooms/{{ $rmid }}')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('room-info');
                const roomsummary = document.getElementById('summary-name');
                
                console.log(data.room);
                room = data.room;

                container.appendChild(createRoomCard(room));
                roomsummary.innerHTML = data.room.name;
                
            });
        }
        
        
        
        // Mobile menu functionality
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');

        mobileMenuBtn.addEventListener('click', function() {
            if (navLinks.style.display === 'flex') {
                navLinks.style.display = 'none';
            } else {
                navLinks.style.display = 'flex';
                navLinks.style.flexDirection = 'column';
                navLinks.style.position = 'absolute';
                navLinks.style.top = '100%';
                navLinks.style.left = '0';
                navLinks.style.right = '0';
                navLinks.style.background = 'white';
                navLinks.style.boxShadow = '0 2px 5px rgba(0,0,0,0.1)';
                navLinks.style.padding = '1rem';
                navLinks.style.zIndex = '1000';
            }
        });

        // Set minimum dates
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            const checkinDate = document.getElementById('checkinDate');
            const checkoutDate = document.getElementById('checkoutDate');
            
            checkinDate.min = today;
            checkoutDate.min = today;
            
            // Update checkout date when checkin changes
            checkinDate.addEventListener('change', function() {
                const checkinValue = new Date(this.value);
                const nextDay = new Date(checkinValue);
                nextDay.setDate(nextDay.getDate() + 1);
                checkoutDate.min = nextDay.toISOString().split('T')[0];
                
                if (checkoutDate.value <= this.value) {
                    checkoutDate.value = nextDay.toISOString().split('T')[0];
                }
                updateSummary();
            });

            checkoutDate.addEventListener('change', updateSummary);
            document.getElementById('guests').addEventListener('change', updateSummary);
            
            // Add-on checkboxes
            document.querySelectorAll('input[name="addons"]').forEach(checkbox => {
                checkbox.addEventListener('change', updateSummary);
            });
        });

        function updateSummary() {
            const checkinDate = new Date(document.getElementById('checkinDate').value);
            const checkoutDate = new Date(document.getElementById('checkoutDate').value);
            const guests = document.getElementById('guests').value;
            
            // Calculate nights
            const timeDiff = checkoutDate.getTime() - checkinDate.getTime();
            const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
            
            // Update summary display
            const checkinFormatted = checkinDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            const checkoutFormatted = checkoutDate.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
            
            document.getElementById('summaryDates').textContent = `${checkinFormatted} - ${checkoutFormatted}`;
            document.getElementById('summaryGuests').textContent = guests;
            document.getElementById('summaryDuration').textContent = `${nights} night${nights > 1 ? 's' : ''}`;
            
            // Calculate pricing
            const baseRate = {{ $price }}
            
            const roomTotal = baseRate * nights;
            //console.log(roomTotal);
            // Calculate add-ons
            let addonsTotal = 0;
            const addons = document.querySelectorAll('input[name="addons"]:checked');
            addons.forEach(addon => {
                switch(addon.value) {
                    case 'breakfast':
                        addonsTotal += 25;
                        break;
                    case 'lateCheckout':
                        addonsTotal += 40;
                        break;
                    case 'airportTransfer':
                        addonsTotal += 50;
                        break;
                    case 'spaAccess':
                        addonsTotal += 35;
                        break;
                }
            });
            
            const subtotal = roomTotal + addonsTotal;
            const taxes = Math.round(subtotal * 0.12);
            const total = subtotal + taxes;
            
            document.getElementById('roomRate').textContent = `Ksh${baseRate} × ${nights} nights`;
            document.getElementById('subtotal').textContent = `Ksh${subtotal}`;
            document.getElementById('taxes').textContent = `Ksh${taxes}`;
            document.getElementById('total').textContent = `Ksh${total}`;

            ;
        }

        function getCookie(name) {
            const cookies = Object.fromEntries(
        document.cookie.split('; ').map(cookie => {
        const [key, value] = cookie.split('=');
        return [key, decodeURIComponent(value)];
        })
        );
    return cookies[name] || null;
    }

        // Form submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const checkinDate = formData.get('checkinDate');
            const checkoutDate = formData.get('checkoutDate');
            const guests = formData.get('guests');
            const checkinDates = new Date(document.getElementById('checkinDate').value);
            const checkoutDates = new Date(document.getElementById('checkoutDate').value);
            const checkinFormatted = checkinDates.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
            const checkoutFormatted = checkoutDates.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
            var price = {{ $price }};


            // Calculate nights
            const timeDiff = checkoutDates.getTime() - checkinDates.getTime();
            const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));

            const roomTotal = price * nights;

            let addonsTotal = 0;
            const addons = document.querySelectorAll('input[name="addons"]:checked');
            addons.forEach(addon => {
                switch(addon.value) {
                    case 'breakfast':
                        addonsTotal += 25;
                        break;
                    case 'lateCheckout':
                        addonsTotal += 40;
                        break;
                    case 'airportTransfer':
                        addonsTotal += 50;
                        break;
                    case 'spaAccess':
                        addonsTotal += 35;
                        break;
                }
            });
            
            const subtotal = roomTotal + addonsTotal;
            const taxes = Math.round(subtotal * 0.12);
            const total = subtotal + taxes;

            console.log(total);
            
            // Basic validation
            if (!checkinDate || !checkoutDate || !guests) {
                alert('Please fill in all required fields.');
                return;
            }
            
            if (new Date(checkoutDate) <= new Date(checkinDate)) {
                alert('Check-out date must be after check-in date.');
                return;
            }

            var rmid = {{ $rmid }};
            var rmname = `{{ $name }}`;
           
           
            var room_data = {"room_id":rmid,"room_name":rmname,"checkin":checkinFormatted,"checkout":checkoutFormatted,"guests":guests,"nights":nights,"subtotal":subtotal,"tax":taxes,"base_price":price,"total":total};
            
            document.cookie = `room=${JSON.stringify(room_data)}; max-age=3600; path=/`;
            var cookie = document.cookie;
            var cookiedata = getCookie('room');
            console.log(JSON.parse(cookiedata));
            
            // Simulate proceeding to payment
            //alert('Proceeding to payment page...');
            // In a real application, this would redirect to the payment page
           window.location.replace("{{ url('/payment') }}");
           // we need room id,check_in,check_out,base_price,total_price,status,payment_method,confirmation code, guest_details
        });


        // Initialize summary on page load
        updateSummary();
    </script>
</body>
</html>
@endsection