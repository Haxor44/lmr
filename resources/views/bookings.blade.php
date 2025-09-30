<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - Matfam Hotel</title>
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

        /* Page Header */
        .page-header {
            margin-bottom: 3rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            color: #666;
        }

        /* Booking Tabs */
        .booking-tabs {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .tab-navigation {
            display: flex;
            border-bottom: 1px solid #eee;
        }

        .tab-btn {
            flex: 1;
            padding: 1.5rem 2rem;
            background: none;
            border: none;
            font-size: 1.1rem;
            font-weight: 500;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
            border-bottom: 3px solid transparent;
        }

        .tab-btn.active {
            color: #333;
            border-bottom-color: #2c5aa0;
            background: #f8f9fa;
        }

        .tab-btn:hover {
            background: #f8f9fa;
        }

        /* Booking Table */
        .booking-table-container {
            padding: 2rem;
        }

        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        .booking-table th {
            text-align: left;
            padding: 1rem;
            font-weight: 600;
            color: #666;
            border-bottom: 2px solid #eee;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .booking-table td {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        .booking-table tr:hover {
            background: #f8f9fa;
        }

        .booking-id {
            font-weight: 600;
            color: #333;
        }

        .room-name  {
            font-weight: 500;
            color: #333;
        }

        .booking-dates {
            color: #666;
        }

        .guest-count {
            color: #666;
            text-align: center;
        }

        .booking-total {
            font-weight: 600;
            color: #333;
            font-size: 1.1rem;
        }

        .booking-actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn.view {
            background: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
        }

        .action-btn.view:hover {
            background: #e9ecef;
        }

        .action-btn.cancel {
            background: #dc3545;
            color: white;
        }

        .action-btn.cancel:hover {
            background: #c82333;
        }

        .empty-message {
            text-align: center;
            color: #666;
            font-style: italic;
            padding: 2rem;
        }

        /* Help Section */
        .help-section {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 3rem;
        }

        .help-section h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .help-section p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .help-buttons {
            display: flex;
            gap: 1rem;
        }

        .help-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #f8f9fa;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .help-btn:hover {
            background: #e9ecef;
            border-color: #2c5aa0;
        }

        .help-btn-icon {
            font-size: 1.2rem;
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

        /* Concierge Widget */
        .concierge-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .concierge-btn {
            width: 60px;
            height: 60px;
            background: #2c5aa0;
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(44, 90, 160, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .concierge-btn:hover {
            background: #1e3d72;
            transform: scale(1.1);
        }

        .concierge-chat {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 350px;
            height: 400px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }

        .concierge-chat.active {
            display: flex;
        }

        .concierge-header {
            background: #2c5aa0;
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .concierge-avatar {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .concierge-info h4 {
            margin: 0;
            font-size: 1rem;
        }

        .concierge-info p {
            margin: 0;
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .concierge-close {
            margin-left: auto;
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.25rem;
        }

        .concierge-messages {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .message {
            max-width: 80%;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .message.bot {
            background: #f1f3f4;
            color: #333;
            align-self: flex-start;
        }

        .message.user {
            background: #2c5aa0;
            color: white;
            align-self: flex-end;
        }

        .concierge-input {
            padding: 1rem;
            border-top: 1px solid #eee;
            display: flex;
            gap: 0.5rem;
        }

        .concierge-input input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
            font-size: 0.9rem;
        }

        .concierge-input input:focus {
            border-color: #2c5aa0;
        }

        .concierge-send {
            background: #2c5aa0;
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        .concierge-send:hover {
            background: #1e3d72;
        }

        .concierge-send:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .page-title {
                font-size: 2rem;
            }

            .tab-navigation {
                flex-direction: column;
            }

            .booking-table-container {
                padding: 1rem;
                overflow-x: auto;
            }

            .booking-table {
                min-width: 600px;
            }

            .booking-actions {
                flex-direction: column;
            }

            .help-buttons {
                flex-direction: column;
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

            .concierge-chat {
                width: 300px;
                height: 350px;
            }
            
            .concierge-btn {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
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

        /* Tab Content */
        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
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
                 @guest
            @if (Route::has('login'))
            <li><a href="{{ url('/about') }}">About</a></li>
            @endif
        @else
        <li><a href="{{ url('/bookings') }}">Bookings</a></li>
        @endguest
                
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
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">My Bookings</h1>
                <p class="page-subtitle">Manage your reservations, view upcoming stays, and access your booking history.</p>
            </div>

            <!-- Booking Tabs -->
            <div class="booking-tabs">
                <div class="tab-navigation">
                    <button class="tab-btn active" data-tab="upcoming">Upcoming</button>
                    <button class="tab-btn" data-tab="past">Past Stays</button>
                    <button class="tab-btn" data-tab="cancelled">Cancelled</button>
                </div>

                <!-- Upcoming Bookings -->
                <div class="tab-content active" id="upcoming">
                    <div class="booking-table-container">
                        <table class="booking-table">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>Room</th>
                                    <th>Dates</th>
                                    <th>Guests</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">

                            </tbody>
                        </table>
                        <div class="empty-message">List of your upcoming bookings.</div>
                    </div>
                </div>

                <!-- Past Stays -->
                <div class="tab-content" id="past">
                    <div class="booking-table-container">
                        <div class="empty-message">No past stays found.</div>
                    </div>
                </div>

                <!-- Cancelled Bookings -->
                <div class="tab-content" id="cancelled">
                    <div class="booking-table-container">
                        <div class="empty-message">No cancelled bookings found.</div>
                    </div>
                </div>
            </div>

            <!-- Help Section -->
            <div class="help-section">
                <h2>Need Help?</h2>
                <p>If you need to make special arrangements or have questions about your booking, please don't hesitate to contact our reservations team.</p>
                <div class="help-buttons">
                    <a href="tel:+15551234567" class="help-btn">
                        <span class="help-btn-icon">📞</span>
                        Call Reservations
                    </a>
                    <a href="mailto:reservations@Matfam.com" class="help-btn">
                        <span class="help-btn-icon">✉️</span>
                        Email Support
                    </a>
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

    <!-- Concierge Widget -->
    <div class="concierge-widget">
        <button class="concierge-btn" id="conciergeBtn">
            💬
        </button>
        
        <div class="concierge-chat" id="conciergeChat">
            <div class="concierge-header">
                <div class="concierge-avatar">👨‍💼</div>
                <div class="concierge-info">
                    <h4>Hotel Concierge</h4>
                    <p>Online now</p>
                </div>
                <button class="concierge-close" id="conciergeClose">×</button>
            </div>
            
            <div class="concierge-messages" id="conciergeMessages">
                <div class="message bot">
                    Hello! I can help you with your bookings, modifications, cancellations, or any questions about your upcoming stays.
                </div>
            </div>
            
            <div class="concierge-input">
                <input type="text" id="conciergeInput" placeholder="Type your message..." maxlength="500">
                <button class="concierge-send" id="conciergeSend">➤</button>
            </div>
        </div>
    </div>

    <script>

        function createBookingRow(booking,checkin,checkout){
            const container = document.createElement('tr');
            container.innerHTML = `
                        
                                    <td class="booking-id">${booking.id}</td>
                                    <td class="room-name" >${booking.room.name}</td>
                                    <td class="booking-dates">${checkin} - ${checkout}</td>
                                    <td class="guest-count">${booking.guests}</td>
                                    <td class="booking-total">KSH${booking.base_amount}</td>
                                    <td class="booking-actions">
                                        <a href="#" class="action-btn view">View</a>
                                        <button class="action-btn cancel" onclick="cancelBooking('BK-8A7F32D1')">Cancel</button>
                                    </td>
                                
                    `
                    return container;
        }

        document.addEventListener('DOMContentLoaded', function() {
            
            
            fetch('/mybookings')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('tableData');
                const bookings = Object.values(data.bookings);
                bookings.forEach(booking => {
                    const checkin= new Date(booking.check_in);
                const checkout= new Date(booking.check_out);

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
                    container.appendChild(createBookingRow(booking,checkinFormatted,checkoutFormatted));
                });
                
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

        // Tab functionality
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', function() {
                const tabName = this.dataset.tab;
                
                // Remove active class from all tabs and content
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                this.classList.add('active');
                document.getElementById(tabName).classList.add('active');
            });
        });

        // Cancel booking functionality
        function cancelBooking(bookingId) {
            if (confirm(`Are you sure you want to cancel booking ${bookingId}? This action cannot be undone.`)) {
                // Simulate cancellation
                alert(`Booking ${bookingId} has been cancelled. You will receive a confirmation email shortly.`);
                
                // In a real application, this would make an API call to cancel the booking
                // For demo purposes, we'll just remove the row from the table
                const row = event.target.closest('tr');
                if (row) {
                    row.style.opacity = '0.5';
                    setTimeout(() => {
                        row.remove();
                        
                        // Check if table is empty
                        const tbody = document.querySelector('#upcoming tbody');
                        if (tbody.children.length === 0) {
                            tbody.innerHTML = '<tr><td colspan="6" class="empty-message">No upcoming bookings found.</td></tr>';
                        }
                    }, 1000);
                }
            }
        }

        // Concierge Widget Functionality
        const conciergeBtn = document.getElementById('conciergeBtn');
        const conciergeChat = document.getElementById('conciergeChat');
        const conciergeClose = document.getElementById('conciergeClose');
        const conciergeInput = document.getElementById('conciergeInput');
        const conciergeSend = document.getElementById('conciergeSend');
        const conciergeMessages = document.getElementById('conciergeMessages');

        let chatOpen = false;

        // Toggle chat
        conciergeBtn.addEventListener('click', function() {
            chatOpen = !chatOpen;
            if (chatOpen) {
                conciergeChat.classList.add('active');
                conciergeInput.focus();
            } else {
                conciergeChat.classList.remove('active');
            }
        });

        // Close chat
        conciergeClose.addEventListener('click', function() {
            chatOpen = false;
            conciergeChat.classList.remove('active');
        });

        // Send message
        function sendMessage() {
            const message = conciergeInput.value.trim();
            if (!message) return;
            
            // Add user message
            const userMessage = document.createElement('div');
            userMessage.className = 'message user';
            userMessage.textContent = message;
            conciergeMessages.appendChild(userMessage);
            
            // Clear input
            conciergeInput.value = '';
            
            // Scroll to bottom
            conciergeMessages.scrollTop = conciergeMessages.scrollHeight;
            
            // Simulate bot response
            setTimeout(() => {
                const botMessage = document.createElement('div');
                botMessage.className = 'message bot';
                
                // Booking-specific responses
                const responses = {
                    'cancel': 'I can help you cancel your booking. Please note that cancellation policies vary by booking. Would you like me to check the policy for a specific booking?',
                    'modify': 'I can assist with modifying your booking dates or room type, subject to availability. Which booking would you like to modify?',
                    'check': 'I can help you with check-in and check-out information. Standard check-in is from 3:00 PM and check-out is until 12:00 PM.',
                    'room': 'I can provide details about your room amenities, upgrade options, or special requests. What would you like to know?',
                    'payment': 'I can help with payment questions, receipts, or billing inquiries. What specific information do you need?',
                    'services': 'We offer spa services, fitness center, restaurant reservations, and concierge services. What interests you?',
                    'transport': 'I can arrange airport transfers, taxi services, or provide directions. How can I help with transportation?',
                    'special': 'I can help arrange special occasions, dietary requirements, or accessibility needs. What would you like to arrange?',
                    'default': 'I\'m here to help with your bookings! I can assist with cancellations, modifications, check-in details, room information, or any other questions about your stay.'
                };
                
                let response = responses.default;
                const lowerMessage = message.toLowerCase();
                
                for (const [key, value] of Object.entries(responses)) {
                    if (lowerMessage.includes(key)) {
                        response = value;
                        break;
                    }
                }
                
                botMessage.textContent = response;
                conciergeMessages.appendChild(botMessage);
                
                // Scroll to bottom
                conciergeMessages.scrollTop = conciergeMessages.scrollHeight;
            }, 1000);
        }

        // Send message on button click
        conciergeSend.addEventListener('click', sendMessage);

        // Send message on Enter key
        conciergeInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    </script>
</body>
</html>