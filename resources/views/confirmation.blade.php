<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed - Matfam Hotel</title>
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
            min-height: calc(100vh - 100px);
        }

        /* Confirmation Section */
        .confirmation-section {
            background: white;
            padding: 3rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            margin-bottom: 2rem;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2.5rem;
            color: white;
        }

        .confirmation-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .confirmation-subtitle {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .confirmation-number {
            font-size: 2rem;
            font-weight: bold;
            color: #2c5aa0;
            background: #f8f9fa;
            padding: 1rem 2rem;
            border-radius: 8px;
            display: inline-block;
            margin-bottom: 1.5rem;
            letter-spacing: 2px;
        }

        .confirmation-email {
            font-size: 1rem;
            color: #666;
        }

        /* Booking Details */
        .booking-details-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .booking-details-section h2 {
            font-size: 1.8rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .check-dates {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
        }

        .check-date {
            text-align: left;
        }

        .check-date h3 {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .check-date .date {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.25rem;
        }

        .check-date .time {
            font-size: 0.9rem;
            color: #666;
        }

        /* Room Info */
        .room-info {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #eee;
        }

        .room-image {
            width: 120px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 0.9rem;
        }

        .room-details {
            flex: 1;
        }

        .room-details h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .room-details .guest-info {
            color: #666;
            font-size: 1rem;
        }

        /* Price Breakdown */
        .price-breakdown {
            margin-bottom: 2rem;
        }

        .price-breakdown h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            padding-bottom: 0.5rem;
        }

        .price-row.total {
            border-top: 2px solid #eee;
            padding-top: 1rem;
            margin-top: 1rem;
            font-weight: bold;
            font-size: 1.1rem;
        }

        .price-label {
            color: #666;
        }

        .price-value {
            color: #333;
            font-weight: 500;
        }

        .price-row.total .price-label,
        .price-row.total .price-value {
            color: #333;
            font-weight: bold;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .action-btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn.primary {
            background: #2c5aa0;
            color: white;
        }

        .action-btn.primary:hover {
            background: #1e3d72;
        }

        .action-btn.secondary {
            background: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
        }

        .action-btn.secondary:hover {
            background: #e9ecef;
        }

        /* Return Link */
        .return-link {
            text-align: center;
            margin-bottom: 3rem;
        }

        .return-link a {
            color: #2c5aa0;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
        }

        .return-link a:hover {
            text-decoration: underline;
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

            .confirmation-title {
                font-size: 2rem;
            }

            .confirmation-number {
                font-size: 1.5rem;
                padding: 0.75rem 1.5rem;
            }

            .check-dates {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .room-info {
                flex-direction: column;
                gap: 1rem;
            }

            .room-image {
                width: 100%;
                height: 150px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .action-btn {
                width: 100%;
                max-width: 300px;
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
                <li><a href="{{ url('/rooms') }}">Rooms</a></li>
                <li><a href="{{ url('/services') }}" class="active">Services</a></li>
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
            <!-- Confirmation Section -->
            <div class="confirmation-section">
                <div class="success-icon">✓</div>
                <h1 class="confirmation-title">Booking Confirmed!</h1>
                <p class="confirmation-subtitle">Thank you for your booking. Your confirmation number is:</p>
                <div class="confirmation-number" id="bookingCode">BK-8PUGTF7P</div>
                <p class="confirmation-email">A confirmation email has been sent to your email address.</p>
            </div>

            <!-- Booking Details -->
            <div class="booking-details-section">
                <h2>Booking Details</h2>
                
                <!-- Check Dates -->
                <div class="check-dates">
                    <div class="check-date">
                        <h3>Check-in</h3>
                        <div class="date" id="summaryCheckin">Wednesday, June 25, 2025</div>
                        <div class="time">From 3:00 PM</div>
                    </div>
                    <div class="check-date">
                        <h3>Check-out</h3>
                        <div class="date" id="summaryCheckout">Thursday, June 26, 2025</div>
                        <div class="time">Until 12:00 PM</div>
                    </div>
                </div>

                <!-- Room Info -->
                <div class="room-info">
                    <div class="room-image">
                        <img id="summaryImage" src="#" alt="Executive King Room" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                    </div>
                    <div class="room-details">
                        <h3 id="summaryRoom">Executive King Room</h3>
                        <div class="guest-info" id="summaryGuest">1 Guest • 1 Night</div>
                    </div>
                </div>

                <!-- Price Breakdown -->
                <div class="price-breakdown">
                    <h3>Price Breakdown</h3>
                    <div class="price-row">
                        <span class="price-label" id="summaryPrice">Executive King Room ($320 × 1 nights)</span>
                        <span class="price-value" id="summaryBaseprice">$320</span>
                    </div>
                    <div class="price-row">
                        <span class="price-label">Taxes & Fees</span>
                        <span class="price-value" id="summaryTax">$38</span>
                    </div>
                    <div class="price-row total">
                        <span class="price-label">Total</span>
                        <span class="price-value" id="summaryTotal">$358</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="action-btn secondary" id="printReceipt">Print Receipt</button>
                    <a href="{{ url('/bookings') }}" class="action-btn primary">View Booking</a>
                </div>
            </div>

            <!-- Return Link -->
            <div class="return-link">
                <a href="{{ url('/') }}">Return to Homepage</a>
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
                    <p>123 Luxury Lane,<br>
                    Prestige City</p>
                    <p>Phone: +1 (555) 123-4567</p>
                    <p>Email: info@Matfam.com</p>
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
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/bookings')
            .then(response => response.json())
            .then(data => {
                console.log(data.bookings[0]);
                const checkin= new Date(data.bookings[0].check_in);
                const checkout= new Date(data.bookings[0].check_out);

                // Format as "August 15, 2025"
                const checkinFormatted = checkin.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    timeZone: 'UTC' // Important for UTC dates
                });  
                const checkoutFormatted = checkout.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    timeZone: 'UTC' // Important for UTC dates
                });
                //const checkinFormatted = data.bookings[0].check_in.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
                //const checkoutFormatted = data.bookings[0].check_out.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                //const timeDiff = data.bookings[0].check_out.getTime() - data.bookings[0].check_in.getTime();
                //const nights = Math.ceil(timeDiff / (1000 * 3600 * 24));
                document.getElementById('bookingCode').textContent = data.bookings[0].confirmation_code;
                document.getElementById('summaryRoom').textContent = data.bookings[0].room.name;
                document.getElementById('summaryGuest').textContent = `${data.bookings[0].guests} Guest`;
                document.getElementById('summaryCheckin').textContent = checkinFormatted;
                document.getElementById('summaryCheckout').textContent = checkoutFormatted;
                document.getElementById('summaryImage').src= `images/${data.bookings[0].room.images}`;
                document.getElementById('summaryBaseprice').textContent = `Ksh${data.bookings[0].base_amount}`;
                document.getElementById('summaryPrice').textContent = `${data.bookings[0].room.name}  ${data.bookings[0].base_amount}`;
                document.getElementById('summaryTax').textContent = `Ksh${data.bookings[0].tax_amount}`;
                document.getElementById('summaryTotal').textContent = `Ksh${data.bookings[0].total_price}`;   
            });
        });

        
        
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

        // Print Receipt functionality
        function printReceipt() {
            const printContent = `
                <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
                    <div style="text-align: center; margin-bottom: 30px;">
                        <h1 style="color: #2c5aa0; margin-bottom: 10px;">Matfam Hotel</h1>
                        <h2 style="color: #333;">Booking Confirmation</h2>
                        <p style="font-size: 18px; color: #666;">Confirmation Number: <strong style="color: #2c5aa0;">BK-8PUGTF7P</strong></p>
                    </div>
                    
                    <div style="border: 1px solid #ddd; padding: 20px; margin-bottom: 20px;">
                        <h3 style="color: #333; margin-bottom: 15px;">Booking Details</h3>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span><strong>Check-in:</strong></span>
                            <span>Wednesday, June 25, 2025 (From 3:00 PM)</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span><strong>Check-out:</strong></span>
                            <span>Thursday, June 26, 2025 (Until 12:00 PM)</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span><strong>Room:</strong></span>
                            <span>Executive King Room</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span><strong>Guests:</strong></span>
                            <span>1 Guest • 1 Night</span>
                        </div>
                    </div>
                    
                    <div style="border: 1px solid #ddd; padding: 20px;">
                        <h3 style="color: #333; margin-bottom: 15px;">Price Breakdown</h3>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Executive King Room ($320 × 1 nights)</span>
                            <span>$320</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                            <span>Taxes & Fees</span>
                            <span>$38</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; border-top: 2px solid #333; padding-top: 10px; font-weight: bold; font-size: 18px;">
                            <span>Total</span>
                            <span>$358</span>
                        </div>
                    </div>
                    
                    <div style="text-align: center; margin-top: 30px; color: #666;">
                        <p>Thank you for choosing Matfam Hotel!</p>
                        <p>123 Luxury Lane, Prestige City</p>
                        <p>Phone: +1 (555) 123-4567 | Email: info@Matfam.com</p>
                    </div>
                </div>
            `;
            
            const printWindow = window.open('', '_blank');
            printWindow.document.write(`
    <!DOCTYPE html>
    <html>
    <head>
        <title>Booking Receipt - Matfam Hotel</title>
        <style>
            body { margin: 0; padding: 20px; }
            @media print {
                body { margin: 0; }
            }
        </style>
    </head>
    <body>
        ${printContent}
        <script>
            window.onload = function() {
                window.print();
                window.onafterprint = function() {
                    window.close();
                };
            };
        <\/script>
    </body>
    </html>
`);
printWindow.document.close(); // Add this after writing
           
        };
    </script>
</body>
</html>