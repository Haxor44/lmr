@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matfam - Experience Luxury Redefined</title>
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

        .nav-links a:hover {
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
        }

        .btn-primary {
            background: #2c5aa0;
            color: white;
        }

        .btn-outline {
            background: transparent;
            color: #2c5aa0;
            border: 1px solid #2c5aa0;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('images/001_0469.jpg?height=600&width=1200');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            margin-top: 80px;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 300;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .booking-form {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    max-width: 800px;
    margin: 0 auto;
}

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            color: #333;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .search-btn {
    background: #2c5aa0;
    color: white;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 500;
    grid-column: span 4;
    margin-top: 0.5rem;
    width: 100%;
}

        /* Featured Accommodations */
        .accommodations {
            padding: 4rem 0;
            background: #f8f9fa;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #666;
        }

        .room-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .room-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-5px);
        }

        .room-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .room-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #e74c3c;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .room-content {
            padding: 1.5rem;
        }

        .room-title {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .room-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c5aa0;
            margin-bottom: 1rem;
        }

        .room-features {
            list-style: none;
            margin-bottom: 1.5rem;
        }

        .room-features li {
            padding: 0.25rem 0;
            color: #666;
        }

        .room-actions {
            display: flex;
            gap: 1rem;
        }

        /* Services Section */
        .services {
            padding: 4rem 0;
            background: white;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .service-card {
            text-align: center;
            padding: 2rem;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: #2c5aa0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .service-card h3 {
            margin-bottom: 1rem;
            color: #333;
        }

        .service-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Testimonials */
        .testimonials {
            padding: 4rem 0;
            background: #f8f9fa;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .testimonial-text {
            font-size: 1.1rem;
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #555;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #ddd;
        }

        .author-info h4 {
            color: #333;
            margin-bottom: 0.25rem;
        }

        .author-info p {
            color: #666;
            font-size: 0.9rem;
        }

        /* Newsletter */
        .newsletter {
            background: #2c5aa0;
            color: white;
            padding: 3rem 0;
            text-align: center;
        }

        .newsletter h2 {
            margin-bottom: 1rem;
        }

        .newsletter p {
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .newsletter-form {
            display: flex;
            max-width: 400px;
            margin: 0 auto;
            gap: 1rem;
        }

        .newsletter-form input {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
        }

        .newsletter-form button {
            background: #f39c12;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }

        /* Footer */
        footer {
            background: #1a1a1a;
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
            color: #2c5aa0;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            padding: 0.25rem 0;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 1rem;
            text-align: center;
            color: #999;
        }

        /* Responsive */
        @media (max-width: 768px) {
    nav {
        justify-content: space-between;
    }
    
    .nav-links {
        display: none;
    }

    .hero-content h1 {
        font-size: 2rem;
    }

    .hero-content p {
        font-size: 1rem;
        padding: 0 1rem;
    }

    .booking-form {
        grid-template-columns: 1fr;
        padding: 1.5rem;
        margin: 0 1rem;
    }

    .search-btn {
        grid-column: span 1;
        width: 100%;
    }

    .room-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .room-card {
        margin: 0 1rem;
    }

    .services-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    .service-card {
        padding: 1.5rem;
    }

    .newsletter-form {
        flex-direction: column;
        max-width: none;
        padding: 0 1rem;
    }

    .footer-content {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        text-align: center;
    }

    .container {
        padding: 0 15px;
    }

    .section-title h2 {
        font-size: 2rem;
    }

    .testimonial-card {
        margin: 0 1rem;
        padding: 1.5rem;
    }

    .testimonial-author {
        flex-direction: column;
        gap: 0.5rem;
    }

    .room-actions {
        flex-direction: column;
        gap: 0.5rem;
    }

    .room-actions .btn {
        text-align: center;
    }
}

@media (max-width: 480px) {
    .hero-content h1 {
        font-size: 1.5rem;
    }

    .hero-content p {
        font-size: 0.9rem;
    }

    .booking-form {
        padding: 1rem;
    }

    .form-group input,
    .form-group select {
        padding: 0.6rem;
        font-size: 0.9rem;
    }

    .search-btn {
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
    }

    .section-title h2 {
        font-size: 1.8rem;
    }

    .room-price {
        font-size: 1.3rem;
    }

    .service-icon {
        width: 50px;
        height: 50px;
        font-size: 1.2rem;
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
    .concierge-chat {
        width: calc(100vw - 20px);
        right: -5px;
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
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1>Experience Luxury Redefined</h1>
                <p>Indulge in our premium accommodations, world-class amenities, and exceptional service for an unforgettable stay</p>
                
                <form class="booking-form">
                    <div class="form-group">
                        <label for="checkin">Check-in Date</label>
                        <input type="date" id="checkin" name="checkin">
                    </div>
                    <div class="form-group">
                        <label for="checkout">Check-out Date</label>
                        <input type="date" id="checkout" name="checkout">
                    </div>
                    <div class="form-group">
                        <label for="guests">Guests</label>
                        <select id="guests" name="guests">
                            <option value="1">1 Guest</option>
                            <option value="2">2 Guests</option>
                            <option value="3">3 Guests</option>
                            <option value="4">4 Guests</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roomtype">Room Type</label>
                        <select id="roomtype" name="roomtype">
                            <option value="any">Any Type</option>
                            <option value="deluxe">Deluxe Room</option>
                            <option value="suite">Suite</option>
                            <option value="family">Family Room</option>
                        </select>
                    </div>
                    <button type="submit" class="search-btn">Search Availability</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Accommodations -->
    <section class="accommodations" id="rooms">
        <div class="container">
            <div class="section-title">
                <h2>Featured Accommodations</h2>
                <p>Explore our most popular room options</p>
            </div>
            
            <div class="room-grid">
                <div class="room-card">
                    <div class="room-image" style="background-image: url('images/100.jpg?height=200&width=350');">
                        <span class="room-badge">Popular</span>
                    </div>
                    <div class="room-content">
                        <h3 class="room-title">Deluxe King Room</h3>
                        <div class="room-price">$250<span style="font-size: 0.8rem; color: #666;">/night</span></div>
                        <ul class="room-features">
                            <li>• King-size bed with premium linens</li>
                            <li>• Premium amenities and linens</li>
                            <li>• 24-hour room service</li>
                            <li>• In-room Smart TV with streaming services</li>
                            <li>• High-speed WiFi</li>
                        </ul>
                        <div class="room-actions">
                            <a href="#" class="btn btn-outline">View Details</a>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-image" style="background-image: url('images/120.jpg?height=200&width=350');">
                        <span class="room-badge">Trending</span>
                    </div>
                    <div class="room-content">
                        <h3 class="room-title">Luxury Suite</h3>
                        <div class="room-price">$450<span style="font-size: 0.8rem; color: #666;">/night</span></div>
                        <ul class="room-features">
                            <li>• Separate living and bedroom areas</li>
                            <li>• King-size bed with premium linens</li>
                            <li>• Spacious living area with sofa and chairs</li>
                            <li>• In-room Smart TV with streaming services</li>
                            <li>• Premium bathroom with luxury amenities</li>
                        </ul>
                        <div class="room-actions">
                            <a href="#" class="btn btn-outline">View Details</a>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <div class="room-card">
                    <div class="room-image" style="background-image: url('images/104.jpg?height=200&width=350');"></div>
                    <div class="room-content">
                        <h3 class="room-title">Family Suite</h3>
                        <div class="room-price">$350<span style="font-size: 0.8rem; color: #666;">/night</span></div>
                        <ul class="room-features">
                            <li>• In-room Smart TV with streaming services</li>
                            <li>• Premium bathroom with luxury amenities</li>
                            <li>• Family-friendly entertainment</li>
                            <li>• High-speed WiFi</li>
                            <li>• 24-hour room service</li>
                        </ul>
                        <div class="room-actions">
                            <a href="#" class="btn btn-outline">View Details</a>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 2rem;">
                <a href="#" class="btn btn-outline">View All Rooms →</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="section-title">
                <h2>Our Premium Services</h2>
                <p>Enhancing your stay with exceptional amenities</p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">🧘</div>
                    <h3>Spa & Wellness</h3>
                    <p>Relax and rejuvenate with our premium spa treatments and wellness facilities for ultimate relaxation.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">💧</div>
                    <h3>Water Refilling</h3>
                    <p>Stay hydrated with our convenient water refilling stations and complimentary bottled water service.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">💪</div>
                    <h3>Fitness Center</h3>
                    <p>Stay fit with our state-of-the-art equipment and personal training services available 24/7.</p>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">🎉</div>
                    <h3>Event Spaces</h3>
                    <p>Host unforgettable events in our elegant and versatile spaces.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Guest Experiences</h2>
                <p>What our guests say about their stay</p>
            </div>
            
            <div class="testimonial-card">
                <p class="testimonial-text">"Our stay at Matfam exceeded all expectations. The rooms were immaculate, the staff attentive, and the amenities world-class. We'll definitely be returning for our next vacation."</p>
                <div class="testimonial-author">
                    <div class="author-avatar" style="background-image: url('/placeholder.svg?height=50&width=50'); background-size: cover;"></div>
                    <div class="author-info">
                        <h4>Sarah Johnson</h4>
                        <p>Business Traveler</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <h2>Stay Updated with Our Special Offers</h2>
            <p>Subscribe to our newsletter and be the first to know about exclusive deals, seasonal promotions, and travel inspiration.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe</button>
            </form>
            <p style="font-size: 0.8rem; margin-top: 1rem; opacity: 0.8;">We respect your privacy. Unsubscribe at any time.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Matfam</h3>
                    <p>Experience luxury redefined with our exceptional accommodations and world-class service.</p>
                </div>
                
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#rooms">Rooms & Suites</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#">Spa & Massage</a></li>
                        <li><a href="#">Fine Dining</a></li>
                        <li><a href="#">Restaurant & Bar</a></li>
                        <li><a href="#">Events & Functions</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <ul>
                        <li>Lanet-Ndundori Rd, opp Barracks</li>
                        <li>Nakuru City</li>
                        <li>Phone: +1 (555) 123-4567</li>
                        <li>Email: info@lanetmatfamresort.co.ke.com</li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 Matfam. All rights reserved. | Privacy Policy | Terms & Conditions</p>
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
                    Welcome to Matfam! I'm here to assist you with reservations, amenities, and any questions you may have. How can I help you today?
                </div>
            </div>
            
            <div class="quick-actions">
                <button class="quick-action" data-message="I'd like to make a reservation">Make Reservation</button>
                <button class="quick-action" data-message="What amenities do you offer?">View Amenities</button>
                <button class="quick-action" data-message="I need help with my booking">Booking Help</button>
                <button class="quick-action" data-message="What are your room rates?">Room Rates</button>
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
        // Set default dates for booking form
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            
            const checkinInput = document.getElementById('checkin');
            const checkoutInput = document.getElementById('checkout');
            
            if (checkinInput && checkoutInput) {
                checkinInput.value = today.toISOString().split('T')[0];
                checkoutInput.value = tomorrow.toISOString().split('T')[0];
            }
        });

        // Handle booking form submission
        document.querySelector('.booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Searching for available rooms... This would normally redirect to a booking page.');
        });

        // Handle newsletter subscription
        document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            alert(`Thank you for subscribing with email: ${email}`);
            this.reset();
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
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

        // Mobile menu toggle
        const mobileMenuBtn = document.createElement('button');
        mobileMenuBtn.innerHTML = '☰';
        mobileMenuBtn.style.cssText = `
    display: none;
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #2c5aa0;
    cursor: pointer;
`;
        mobileMenuBtn.className = 'mobile-menu-btn';

        // Insert mobile menu button
        document.querySelector('nav').appendChild(mobileMenuBtn);

        // Show mobile menu button on small screens
        const mediaQuery = window.matchMedia('(max-width: 768px)');
        function handleMobileMenu(e) {
            if (e.matches) {
                mobileMenuBtn.style.display = 'block';
            } else {
                mobileMenuBtn.style.display = 'none';
            }
        }
        mediaQuery.addListener(handleMobileMenu);
        handleMobileMenu(mediaQuery);

        // Mobile menu toggle functionality
        mobileMenuBtn.addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
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
            "Thank you for your inquiry! I'll be happy to help you with that. Let me get the information for you.",
            "Excellent choice! Our team will assist you with your request. Is there anything specific you'd like to know?",
            "I'd be delighted to help you with that. Our luxury amenities are designed to exceed your expectations.",
            "Perfect! I'll connect you with our reservations team right away. They'll take care of everything for you.",
            "Great question! Our rates vary by season and room type. I'll send you our current availability and pricing."
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
    </script>
</body>
</html>
    
@endsection

