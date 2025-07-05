@extends('layouts.room')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms & Suites - Matfam Hotel</title>
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

        /* Hero Section */
        .hero {
            background: #2c5aa0;
            color: white;
            padding: 6rem 0 3rem;
            margin-top: 80px;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 400;
        }

        .hero p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Main Content */
        .main-content {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            padding: 2rem 0;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Sidebar Filters */
        .filters-sidebar {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            height: fit-content;
            position: sticky;
            top: 120px;
        }

        .filter-section {
            margin-bottom: 2rem;
        }

        .filter-section h3 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .price-range {
            margin-bottom: 1rem;
        }

        .price-slider {
            width: 100%;
            margin: 1rem 0;
        }

        .price-values {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: #666;
        }

        .filter-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .amenities-list {
            list-style: none;
        }

        .amenities-list li {
            margin-bottom: 0.5rem;
        }

        .amenities-list input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .amenities-list label {
            font-size: 0.9rem;
            color: #666;
            cursor: pointer;
        }

        /* Rooms Content */
        .rooms-content {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .rooms-header {
            padding: 1.5rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .rooms-count {
            color: #666;
            font-size: 0.9rem;
        }

        .sort-dropdown {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9rem;
        }

        .rooms-list {
            padding: 1.5rem;
        }

        .room-card {
            display: grid;
            grid-template-columns: 200px 1fr auto;
            gap: 1.5rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid #eee;
            align-items: start;
        }

        .room-card:last-child {
            border-bottom: none;
        }

        .room-image {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
        }

        .room-details h3 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .room-description {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 1rem;
        }

        .room-amenities {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            font-size: 0.8rem;
            color: #666;
        }

        .room-amenities span {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .room-booking {
            text-align: right;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 1rem;
        }

        .room-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c5aa0;
        }

        .room-price span {
            font-size: 0.9rem;
            color: #666;
            font-weight: normal;
        }

        .room-badge {
            background: #e74c3c;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .room-badge.trending {
            background: #f39c12;
        }

        .room-badge.popular {
            background: #e74c3c;
        }

        .book-btn {
            background: #2c5aa0;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s ease;
        }

        .book-btn:hover {
            background: #1e3d72;
        }

        .view-details {
            color: #2c5aa0;
            text-decoration: none;
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

        .view-details:hover {
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

        /* Floating Concierge */
        .concierge-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1001;
        }

        .concierge-button {
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

        .concierge-button:hover {
            background: #1e3d72;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(44, 90, 160, 0.4);
        }

        .concierge-chat {
            position: absolute;
            bottom: 80px;
            right: 0;
            width: 320px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            display: none;
            overflow: hidden;
        }

        .concierge-chat.active {
            display: block;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chat-header {
            background: #2c5aa0;
            color: white;
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .chat-avatar {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2c5aa0;
            font-size: 1.2rem;
        }

        .chat-info h4 {
            margin: 0;
            font-size: 1rem;
        }

        .chat-info p {
            margin: 0;
            font-size: 0.8rem;
            opacity: 0.9;
        }

        .chat-close {
            margin-left: auto;
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 0.25rem;
        }

        .chat-body {
            padding: 1rem;
            max-height: 300px;
            overflow-y: auto;
        }

        .chat-message {
            margin-bottom: 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .message-avatar {
            width: 30px;
            height: 30px;
            background: #2c5aa0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .message-content {
            background: #f8f9fa;
            padding: 0.75rem;
            border-radius: 10px;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .chat-input {
            padding: 1rem;
            border-top: 1px solid #eee;
        }

        .chat-input-group {
            display: flex;
            gap: 0.5rem;
        }

        .chat-input input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 20px;
            font-size: 0.9rem;
            outline: none;
        }

        .chat-input input:focus {
            border-color: #2c5aa0;
        }

        .chat-send {
            background: #2c5aa0;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .quick-action {
            background: #e3f2fd;
            color: #2c5aa0;
            border: none;
            padding: 0.5rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: background 0.2s;
        }

        .quick-action:hover {
            background: #bbdefb;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero {
                padding: 5rem 0 2rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .main-content {
                grid-template-columns: 1fr;
                padding: 1rem;
                gap: 1rem;
            }

            .filters-sidebar {
                position: static;
                margin-bottom: 1rem;
            }

            .room-card {
                grid-template-columns: 1fr;
                gap: 1rem;
                text-align: center;
            }

            .room-image {
                width: 100%;
                height: 200px;
                justify-self: center;
            }

            .room-booking {
                align-items: center;
            }

            .rooms-header {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
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

            .concierge-widget {
                bottom: 15px;
                right: 15px;
            }

            .concierge-button {
                width: 55px;
                height: 55px;
                font-size: 1.3rem;
            }

            .concierge-chat {
                width: calc(100vw - 30px);
                right: -10px;
                bottom: 75px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }

            .hero {
                padding: 4rem 0 2rem;
            }

            .hero h1 {
                font-size: 1.5rem;
            }

            .main-content {
                padding: 0.5rem;
            }

            .filters-sidebar,
            .rooms-content {
                padding: 1rem;
            }

            .room-card {
                padding: 1rem 0;
            }

            .room-price {
                font-size: 1.3rem;
            }

            .concierge-chat {
                width: calc(100vw - 20px);
                right: -5px;
            }

            .auth-buttons {
                gap: 0.5rem;
            }

            .btn {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }

            nav {
                padding: 1.25rem 0;
            }

            .logo {
                font-size: 1.3rem;
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
            
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Our Rooms & Suites</h1>
            <p>Find your perfect accommodation for an unforgettable stay</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <!-- Filters Sidebar -->
            <aside class="filters-sidebar">
                <div class="filter-section">
                    <h3>Filter Rooms</h3>
                </div>

                <div class="filter-section">
                    <h3>Price Range</h3>
                    <div class="price-range">
                        <input type="range" id="priceRange" class="price-slider" min="0" max="1000" value="1000">
                        <div class="price-values">
                            <span>$0</span>
                            <span id="maxPrice">$1000</span>
                        </div>
                    </div>
                </div>

                <div class="filter-section">
                    <h3>Room Type</h3>
                    <select class="filter-select" id="roomType">
                        <option value="">Any Type</option>
                        <option value="standard">Standard Room</option>
                        <option value="deluxe">Deluxe Room</option>
                        <option value="suite">Suite</option>
                        <option value="family">Family Room</option>
                    </select>
                </div>

                <div class="filter-section">
                    <h3>Amenities</h3>
                    <ul class="amenities-list">
                        <li>
                            <input type="checkbox" id="wifi" value="wifi">
                            <label for="wifi">Free WiFi</label>
                        </li>
                        <li>
                            <input type="checkbox" id="breakfast" value="breakfast">
                            <label for="breakfast">Breakfast Included</label>
                        </li>
                        <li>
                            <input type="checkbox" id="roomservice" value="roomservice">
                            <label for="roomservice">Room Service</label>
                        </li>
                        <li>
                            <input type="checkbox" id="cityview" value="cityview">
                            <label for="cityview">City View</label>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Rooms Content -->
            <main class="rooms-content">
                <div class="rooms-header">
                    <div class="rooms-count">Showing <span id="roomCount">4</span> room types</div>
                    <select class="sort-dropdown" id="sortBy">
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="rating">Rating</option>
                        <option value="name">Name</option>
                    </select>
                </div>

                <div class="rooms-list" id="roomsList">
                    <!-- Standard Double Room -->
                    

                   
                    </div>
                </div>
            </main>
        </div>
    </div>

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
                        <li><a href="#services">Services</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Spa & Massage</a></li>
                        <li><a href="#">Gym & Fitness</a></li>
                        <li><a href="#">Restaurant & Bar</a></li>
                        <li><a href="#">Events & Functions</a></li>
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

    <!-- Floating Concierge -->
    <div class="concierge-widget">
        <button class="concierge-button" id="conciergeBtn">
            💬
        </button>
        
        <div class="concierge-chat" id="conciergeChat">
            <div class="chat-header">
                <div class="chat-avatar">👨‍💼</div>
                <div class="chat-info">
                    <h4>Matfam Concierge</h4>
                    <p>Online now</p>
                </div>
                <button class="chat-close" id="chatClose">×</button>
            </div>
            
            <div class="chat-body" id="chatBody">
                <div class="chat-message">
                    <div class="message-avatar">👨‍💼</div>
                    <div class="message-content">
                        Welcome to Matfam! I'm here to help you find the perfect room for your stay. What type of accommodation are you looking for?
                    </div>
                </div>
                
                <div class="quick-actions">
                    <button class="quick-action" data-message="I need help choosing a room">Room Selection</button>
                    <button class="quick-action" data-message="What amenities are available?">View Amenities</button>
                    <button class="quick-action" data-message="I'd like to make a reservation">Make Booking</button>
                    <button class="quick-action" data-message="Do you have family-friendly rooms?">Family Rooms</button>
                </div>
            </div>
            
            <div class="chat-input">
                <div class="chat-input-group">
                    <input type="text" id="chatInput" placeholder="Type your message...">
                    <button class="chat-send" id="chatSend">➤</button>
                </div>
            </div>
        </div>
    </div>

    <script>
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

        function createRoomCard(room){
            const container = document.createElement('div');
            container.innerHTML = `
                        <div class="room-card" data-price="180" data-type="standard">
                        <img src="images/${room.images}?height=150&width=200" alt="Standard Double Room" class="room-image">
                        <div class="room-details">
                            <h3>${room.name}</h3>
                            <p class="room-description">${room.description}</p>
                            <div class="room-amenities">
                                <span>🛏️ Queen bed</span>
                                <span>📶 Free WiFi</span>
                                <span>🚿 Private bathroom</span>
                                <span>❄️ Air conditioning</span>
                            </div>
                        </div>
                        <div class="room-booking">
                            <div class="room-price">Ksh${room.base_price}<span>/night</span></div>
                            <button class="book-btn">Book Now</button>
                            <a href="{{ url('/rooms/details/${room.id}') }}" class="view-details">View Details</a>
                        </div>
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
        fetch('/rooms/all')
            .then(response => response.json())
            .then(data => {
                const container = document.getElementById('roomsList');
                rooms = Object.values(data.rooms);

                rooms.forEach(room => {
                    console.log(room);
                    container.appendChild(createRoomCard(room));

                });
            });
        }
    
        // Price range slider
        const priceRange = document.getElementById('priceRange');
        const maxPrice = document.getElementById('maxPrice');

        priceRange.addEventListener('input', function() {
            maxPrice.textContent = '$' + this.value;
            filterRooms();
        });

        // Room filtering
        function filterRooms() {
            const maxPriceValue = parseInt(priceRange.value);
            const roomType = document.getElementById('roomType').value;
            const roomCards = document.querySelectorAll('.room-card');
            let visibleCount = 0;

            roomCards.forEach(card => {
                const price = parseInt(card.dataset.price);
                const type = card.dataset.type;
                
                let show = true;
                
                // Price filter
                if (price > maxPriceValue) {
                    show = false;
                }
                
                // Room type filter
                if (roomType && type !== roomType) {
                    show = false;
                }
                
                if (show) {
                    card.style.display = 'grid';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            document.getElementById('roomCount').textContent = visibleCount;
        }

        // Room type filter
        document.getElementById('roomType').addEventListener('change', filterRooms);

        // Sorting functionality
        document.getElementById('sortBy').addEventListener('change', function() {
            const sortBy = this.value;
            const roomsList = document.getElementById('roomsList');
            const roomCards = Array.from(document.querySelectorAll('.room-card'));

            roomCards.sort((a, b) => {
                switch(sortBy) {
                    case 'price-low':
                        return parseInt(a.dataset.price) - parseInt(b.dataset.price);
                    case 'price-high':
                        return parseInt(b.dataset.price) - parseInt(a.dataset.price);
                    case 'name':
                        const nameA = a.querySelector('h3').textContent;
                        const nameB = b.querySelector('h3').textContent;
                        return nameA.localeCompare(nameB);
                    default:
                        return 0;
                }
            });

            // Re-append sorted cards
            roomCards.forEach(card => roomsList.appendChild(card));
        });

        // Book Now buttons
        document.querySelectorAll('.book-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const roomCard = this.closest('.room-card');
                const roomName = roomCard.querySelector('h3').textContent;
                const roomPrice = roomCard.querySelector('.room-price').textContent;
                
                alert(`Booking ${roomName} for ${roomPrice}. This would redirect to the booking page.`);
            });
        });

        // View Details links
        /*document.querySelectorAll('.view-details').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const roomCard = this.closest('.room-card');
                const roomName = roomCard.querySelector('h3').textContent;
                
                //alert(`Viewing details for ${roomName}. This would show a detailed room page.`);
            });
        });*/

        // Concierge Chat Functionality
        const conciergeBtn = document.getElementById('conciergeBtn');
        const conciergeChat = document.getElementById('conciergeChat');
        const chatClose = document.getElementById('chatClose');
        const chatInput = document.getElementById('chatInput');
        const chatSend = document.getElementById('chatSend');
        const chatBody = document.getElementById('chatBody');

        // Toggle chat visibility
        conciergeBtn.addEventListener('click', function() {
            conciergeChat.classList.toggle('active');
            if (conciergeChat.classList.contains('active')) {
                chatInput.focus();
            }
        });

        // Close chat
        chatClose.addEventListener('click', function() {
            conciergeChat.classList.remove('active');
        });

        // Send message function
        function sendMessage(message) {
            if (!message.trim()) return;
            
            // Add user message
            const userMessage = document.createElement('div');
            userMessage.className = 'chat-message';
            userMessage.innerHTML = `
                <div class="message-content" style="background: #2c5aa0; color: white; margin-left: auto;">
                    ${message}
                </div>
            `;
            chatBody.appendChild(userMessage);
            
            // Simulate concierge response
            setTimeout(() => {
                const responses = [
                    "I'd be happy to help you find the perfect room! What's your budget range and preferred amenities?",
                    "Great choice! Our rooms feature premium amenities and exceptional comfort. Would you like me to check availability?",
                    "I can assist you with your booking right away. Let me connect you with our reservations team.",
                    "Our family rooms are perfect for guests with children. They include connecting rooms and kid-friendly amenities.",
                    "All our rooms include complimentary WiFi, room service, and premium linens. Would you like to know about specific room features?"
                ];
                
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                
                const conciergeMessage = document.createElement('div');
                conciergeMessage.className = 'chat-message';
                conciergeMessage.innerHTML = `
                    <div class="message-avatar">👨‍💼</div>
                    <div class="message-content">
                        ${randomResponse}
                    </div>
                `;
                chatBody.appendChild(conciergeMessage);
                chatBody.scrollTop = chatBody.scrollHeight;
            }, 1000);
            
            chatBody.scrollTop = chatBody.scrollHeight;
            chatInput.value = '';
        }

        // Send message on button click
        chatSend.addEventListener('click', function() {
            sendMessage(chatInput.value);
        });

        // Send message on Enter key
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage(chatInput.value);
            }
        });

        // Quick action buttons
        document.querySelectorAll('.quick-action').forEach(button => {
            button.addEventListener('click', function() {
                const message = this.getAttribute('data-message');
                sendMessage(message);
            });
        });

        // Close chat when clicking outside
        document.addEventListener('click', function(e) {
            if (!conciergeChat.contains(e.target) && !conciergeBtn.contains(e.target)) {
                conciergeChat.classList.remove('active');
            }
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'white';
                header.style.backdropFilter = 'none';
            }
        });
    </script>
</body>
</html>

@endsection





   





