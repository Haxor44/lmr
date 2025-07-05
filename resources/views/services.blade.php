@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Matfam Hotel</title>
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

        /* Service Tabs */
        .service-tabs {
            background: white;
            padding: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .tabs-container {
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #eee;
        }

        .tab-button {
            background: none;
            border: none;
            padding: 1rem 2rem;
            cursor: pointer;
            font-size: 1rem;
            color: #666;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .tab-button.active {
            color: #2c5aa0;
            border-bottom-color: #2c5aa0;
        }

        .tab-button:hover {
            color: #2c5aa0;
        }

        /* Main Content */
        .main-content {
            background: white;
            padding: 2rem 0;
        }

        .service-hero {
            position: relative;
            margin-bottom: 3rem;
        }

        .service-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        .service-info {
            padding: 2rem 0;
        }

        .service-info h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .service-description {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .service-features {
            list-style: none;
            margin-bottom: 2rem;
        }

        .service-features li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            font-size: 1rem;
            color: #333;
        }

        .feature-icon {
            width: 20px;
            height: 20px;
            background: #2c5aa0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        /* Booking Form */
        .booking-section {
            background: #f8f9fa;
            padding: 3rem 0;
        }

        .booking-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .booking-form h3 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .booking-form .subtitle {
            color: #666;
            margin-bottom: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
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
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2c5aa0;
            box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            background: #2c5aa0;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #1e3d72;
        }

        /* Treatments Section */
        .treatments-section {
            padding: 3rem 0;
        }

        .treatments-section h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 2rem;
            text-align: center;
        }

        .treatments-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .treatment-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .treatment-card:hover {
            transform: translateY(-5px);
        }

        .treatment-card h4 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 1.2rem;
        }

        .treatment-duration {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .treatment-description {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .treatment-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c5aa0;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #2c5aa0 0%, #1e3d72 100%);
            color: white;
            padding: 3rem 0;
            text-align: center;
        }

        .cta-section h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .cta-btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .cta-btn.primary {
            background: #2c5aa0;
            color: white;
        }

        .cta-btn.primary:hover {
            background: #1e3d72;
        }

        .cta-btn.secondary {
            background: transparent;
            color: white;
            border: 1px solid white;
        }

        .cta-btn.secondary:hover {
            background: white;
            color: #2c3e50;
        }

        /* Footer */
        footer {
            background: #2c3e50;
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

            .tabs-container {
                flex-wrap: wrap;
                justify-content: flex-start;
                overflow-x: auto;
            }

            .tab-button {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
                white-space: nowrap;
            }

            .service-image {
                height: 200px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .treatments-grid {
                grid-template-columns: 1fr;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
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

            .booking-form,
            .main-content {
                padding: 1rem;
            }

            .treatment-card {
                padding: 1rem;
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
            <h1>Our Premium Services</h1>
            <p>Experience luxury with our world-class amenities and services</p>
        </div>
    </section>

    <!-- Service Tabs -->
    <section class="service-tabs">
        <div class="container">
            <div class="tabs-container">
                <button class="tab-button active" data-tab="spa">Spa & Massage</button>
                <button class="tab-button" data-tab="fitness">Fitness Center</button>
                <button class="tab-button" data-tab="water">Water Refilling</button>
                <button class="tab-button" data-tab="events">Event Spaces</button>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="main-content">
        <div class="container">
            <div class="service-hero">
    <img src="images/IMG_9606.JPG" alt="Spa & Massage" class="service-image" id="spaImage">
    <img src="images/IMG_9626.JPG" alt="State-of-the-Art Fitness Center" class="service-image" id="fitnessImage" style="display: none;">
    <img src="images/conf.jpg" alt="Water Refilling Service" class="service-image" id="waterImage" style="display: none;">
    <img src="images/IMG_9637.JPG" alt="Elegant Event Spaces" class="service-image" id="eventsImage" style="display:none;">
</div>

            <div class="service-info" id="spaInfo">
                <h2>Spa & Massage</h2>
                <p class="service-description">
                    Indulge in ultimate relaxation at our award-winning spa. Our experienced therapists offer a wide range of treatments designed to rejuvenate your body and calm your mind.
                </p>

                <ul class="service-features">
                    <li>
                        <div class="feature-icon">✓</div>
                        Professional therapists with years of experience
                    </li>
                    <li>
                        <div class="feature-icon">✓</div>
                        Premium, organic products for all treatments
                    </li>
                    <li>
                        <div class="feature-icon">✓</div>
                        Private treatment rooms with relaxing ambiance
                    </li>
                </ul>
            </div>
        
<div class="service-info" id="fitnessInfo" style="display: none;">
    <h2>State-of-the-Art Fitness Center</h2>
    <p class="service-description">
        Stay on top of your fitness routine with our modern gym facilities. Open 24/7, our fitness center is equipped with the latest cardio and strength training equipment for a complete workout.
    </p>

    <ul class="service-features">
        <li>
            <div class="feature-icon">✓</div>
            Latest cardio and strength training equipment
        </li>
        <li>
            <div class="feature-icon">✓</div>
            Personal trainers available upon request
        </li>
        <li>
            <div class="feature-icon">✓</div>
            Complimentary fitness classes (yoga, pilates, etc.)
        </li>
    </ul>
</div>

<div class="service-info" id="waterInfo" style="display: none;">
    <h2>Water Refilling Service</h2>
    <p class="service-description">
        Stay hydrated with our premium water refilling service. We offer purified, alkaline, and mineral water options with convenient subscription plans and flexible delivery schedules.
    </p>

    <ul class="service-features">
        <li>
            <div class="feature-icon">✓</div>
            Multiple water types: Purified, Alkaline, Mineral
        </li>
        <li>
            <div class="feature-icon">✓</div>
            Flexible subscription plans and delivery schedules
        </li>
        <li>
            <div class="feature-icon">✓</div>
            Eco-friendly refillable containers provided
        </li>
    </ul>
</div>

<div class="service-info" id="eventsInfo" style="display: none;">
    <h2>Elegant Event Spaces</h2>
    <p class="service-description">
        Host your special occasions in our versatile event venues. From intimate gatherings to grand celebrations, our spaces can be customized to suit your needs.
    </p>

    <ul class="service-features">
        <li>
            <div class="feature-icon">✓</div>
            Multiple venues for various event sizes
        </li>
        <li>
            <div class="feature-icon">✓</div>
            Professional event planning assistance
        </li>
        <li>
            <div class="feature-icon">✓</div>
            Customizable catering packages
        </li>
    </ul>
</div>
</div>
    </section>

    <!-- Booking Form -->
    <section class="booking-section">
        <div class="container">
            <div class="booking-form">
                <h3>Book a Massage Treatment</h3>
                <p class="subtitle">Schedule your relaxing spa experience</p>

                <form id="bookingForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" id="fullName" name="fullName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="treatment">Treatment Type</label>
                            <select id="treatment" name="treatment" required>
                                <option value="">Select treatment</option>
                                <option value="swedish">Swedish Massage</option>
                                <option value="deep-tissue">Deep Tissue Massage</option>
                                <option value="hot-stone">Hot Stone Massage</option>
                                <option value="aromatherapy">Aromatherapy Massage</option>
                                <option value="couples">Couples Massage</option>
                                <option value="prenatal">Prenatal Massage</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Preferred Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                            <label for="time">Preferred Time</label>
                            <select id="time" name="time" required>
                                <option value="">Select time</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="17:00">5:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="requests">Special Requests</label>
                        <textarea id="requests" name="requests" placeholder="Any allergies, preferences, or special requirements..."></textarea>
                    </div>

                    <button type="submit" class="submit-btn">Submit Booking Request</button>
                </form>
            </div>
        </div>
    </section>
    
<section class="booking-section" id="fitnessBooking" style="display: none;">
    <div class="container">
        <div class="booking-form">
            <h3>Book Fitness Services</h3>
            <p class="subtitle">Reserve your personal training or fitness class</p>

            <form id="fitnessBookingForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="fitnessFullName">Full Name</label>
                        <input type="text" id="fitnessFullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="fitnessEmail">Email</label>
                        <input type="email" id="fitnessEmail" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="fitnessPhone">Phone Number</label>
                        <input type="tel" id="fitnessPhone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="fitnessService">Service Type</label>
                        <select id="fitnessService" name="service" required>
                            <option value="">Select service</option>
                            <option value="personal-training">Personal Training</option>
                            <option value="yoga-class">Yoga Class</option>
                            <option value="hiit-workout">HIIT Workout</option>
                            <option value="pilates-class">Pilates Class</option>
                            <option value="gym-orientation">Gym Orientation</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="fitnessDate">Preferred Date</label>
                        <input type="date" id="fitnessDate" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="fitnessTime">Preferred Time</label>
                        <select id="fitnessTime" name="time" required>
                            <option value="">Select time</option>
                            <option value="06:00">6:00 AM</option>
                            <option value="07:00">7:00 AM</option>
                            <option value="08:00">8:00 AM</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="17:00">5:00 PM</option>
                            <option value="18:00">6:00 PM</option>
                            <option value="19:00">7:00 PM</option>
                            <option value="20:00">8:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fitnessLevel">Fitness Level</label>
                    <select id="fitnessLevel" name="fitnessLevel" required>
                        <option value="">Select your fitness level</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="fitnessGoals">Fitness Goals</label>
                    <textarea id="fitnessGoals" name="goals" placeholder="Tell us about your fitness goals and any specific requirements..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Booking Request</button>
            </form>
        </div>
    </div>
</section>

<section class="booking-section" id="waterBooking" style="display: none;">
    <div class="container">
        <div class="booking-form">
            <h3>Water Refilling Subscription</h3>
            <p class="subtitle">Set up your convenient water delivery service</p>

            <form id="waterBookingForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="waterFullName">Full Name</label>
                        <input type="text" id="waterFullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="waterEmail">Email</label>
                        <input type="email" id="waterEmail" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="waterPhone">Phone Number</label>
                        <input type="tel" id="waterPhone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="waterType">Water Type</label>
                        <select id="waterType" name="waterType" required>
                            <option value="">Select water type</option>
                            <option value="purified">Purified Water</option>
                            <option value="alkaline">Alkaline Water</option>
                            <option value="mineral">Mineral Water</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deliveryAddress">Delivery Address</label>
                    <textarea id="deliveryAddress" name="deliveryAddress" placeholder="Enter your complete delivery address..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="subscriptionPlan">Subscription Plan</label>
                    <select id="subscriptionPlan" name="subscriptionPlan" required>
                        <option value="">Select subscription plan</option>
                        <option value="basic">Basic Plan - 20 liters/week ($15/delivery)</option>
                        <option value="family">Family Plan - 40 liters/delivery ($25/delivery)</option>
                        <option value="premium">Premium Plan - 60 liters/week ($35/delivery)</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="deliveryDay">Preferred Delivery Day</label>
                        <select id="deliveryDay" name="deliveryDay" required>
                            <option value="">Select day</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="deliveryTime">Preferred Time</label>
                        <select id="deliveryTime" name="deliveryTime" required>
                            <option value="">Select time</option>
                            <option value="08:00">8:00 AM - 10:00 AM</option>
                            <option value="10:00">10:00 AM - 12:00 PM</option>
                            <option value="12:00">12:00 PM - 2:00 PM</option>
                            <option value="14:00">2:00 PM - 4:00 PM</option>
                            <option value="16:00">4:00 PM - 6:00 PM</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="deliveryInstructions">Special Delivery Instructions</label>
                    <textarea id="deliveryInstructions" name="deliveryInstructions" placeholder="Any special instructions for delivery (gate codes, building access, etc.)..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Subscribe to Water Service</button>
            </form>
        </div>
    </div>
</section>

<section class="booking-section" id="eventsBooking" style="display: none;">
    <div class="container">
        <div class="booking-form">
            <h3>Book an Event Space</h3>
            <p class="subtitle">Plan your special occasion with us</p>

            <form id="eventsBookingForm">
                <div class="form-row">
                    <div class="form-group">
                        <label for="eventsFullName">Full Name</label>
                        <input type="text" id="eventsFullName" name="fullName" required>
                    </div>
                    <div class="form-group">
                        <label for="eventsEmail">Email</label>
                        <input type="email" id="eventsEmail" name="email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="eventsPhone">Phone Number</label>
                        <input type="tel" id="eventsPhone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="eventType">Event Type</label>
                        <select id="eventType" name="eventType" required>
                            <option value="">Select event type</option>
                            <option value="wedding">Wedding</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="birthday">Birthday Party</option>
                            <option value="anniversary">Anniversary</option>
                            <option value="conference">Conference</option>
                            <option value="gala">Gala Dinner</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="preferredVenue">Preferred Venue</label>
                        <select id="preferredVenue" name="preferredVenue" required>
                            <option value="">Select venue</option>
                            <option value="grand-ballroom">Grand Ballroom (Up to 500 guests)</option>
                            <option value="garden-terrace">Garden Terrace (Up to 150 guests)</option>
                            <option value="executive-boardroom">Executive Boardroom (Up to 25 guests)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="numberOfGuests">Number of Guests</label>
                        <input type="number" id="numberOfGuests" name="numberOfGuests" min="1" max="500" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="eventDate">Event Date</label>
                        <input type="date" id="eventDate" name="eventDate" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDuration">Event Duration</label>
                        <select id="eventDuration" name="eventDuration" required>
                            <option value="">Select duration</option>
                            <option value="2-hours">2 Hours</option>
                            <option value="4-hours">4 Hours</option>
                            <option value="6-hours">6 Hours</option>
                            <option value="8-hours">8 Hours</option>
                            <option value="full-day">Full Day</option>
                            <option value="multi-day">Multi-Day</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cateringRequirements">Catering Requirements</label>
                    <select id="cateringRequirements" name="cateringRequirements" required>
                        <option value="">Select catering option</option>
                        <option value="full-service">Full Service Catering</option>
                        <option value="buffet">Buffet Style</option>
                        <option value="cocktail">Cocktail Reception</option>
                        <option value="plated-dinner">Plated Dinner</option>
                        <option value="light-refreshments">Light Refreshments</option>
                        <option value="no-catering">No Catering Required</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="specialRequirements">Special Requirements</label>
                    <textarea id="specialRequirements" name="specialRequirements" placeholder="Please describe any special requirements, decorations, AV equipment, or other details..."></textarea>
                </div>

                <button type="submit" class="submit-btn">Submit Event Inquiry</button>
            </form>
        </div>
    </div>
</section>

    
<section class="treatments-section">
        <div class="container">
            <h3>Our Massage Treatments</h3>

            <div class="treatments-grid">
                <div class="treatment-card">
                    <h4>Swedish Massage</h4>
                    <p class="treatment-duration">60 min</p>
                    <p class="treatment-description">A gentle, relaxing massage that improves circulation and relieves tension.</p>
                    <div class="treatment-price">$120</div>
                </div>

                <div class="treatment-card">
                    <h4>Deep Tissue Massage</h4>
                    <p class="treatment-duration">60 min</p>
                    <p class="treatment-description">Targets deeper layers of muscle to address chronic tension and pain.</p>
                    <div class="treatment-price">$150</div>
                </div>

                <div class="treatment-card">
                    <h4>Hot Stone Massage</h4>
                    <p class="treatment-duration">75 min</p>
                    <p class="treatment-description">Uses smooth, heated stones to relax muscles and improve circulation.</p>
                    <div class="treatment-price">$180</div>
                </div>

                <div class="treatment-card">
                    <h4>Aromatherapy Massage</h4>
                    <p class="treatment-duration">60 min</p>
                    <p class="treatment-description">Combines massage with essential oils for enhanced relaxation.</p>
                    <div class="treatment-price">$130</div>
                </div>

                <div class="treatment-card">
                    <h4>Couples Massage</h4>
                    <p class="treatment-duration">60 min</p>
                    <p class="treatment-description">Share a relaxing massage experience with your partner in a private suite.</p>
                    <div class="treatment-price">$240</div>
                </div>

                <div class="treatment-card">
                    <h4>Prenatal Massage</h4>
                    <p class="treatment-duration">75 min</p>
                    <p class="treatment-description">Specially designed for expectant mothers to relieve discomfort.</p>
                    <div class="treatment-price">$140</div>
                </div>
            </div>
        </div>
    </section>
    
<section class="treatments-section" id="fitnessClasses" style="display: none;">
    <div class="container">
        <h3>Fitness Classes</h3>

        <div class="treatments-grid">
            <div class="treatment-card">
                <h4>Morning Yoga</h4>
                <p class="treatment-duration">Daily, 7:00-8:00 AM</p>
                <p class="treatment-description">Start your day with energizing yoga poses and mindful breathing.</p>
                <div class="treatment-price">Complimentary for guests</div>
            </div>

            <div class="treatment-card">
                <h4>HIIT Workout</h4>
                <p class="treatment-duration">Mon/Wed/Fri, 5:00-6:00 AM</p>
                <p class="treatment-description">High-intensity interval training for maximum calorie burn.</p>
                <div class="treatment-price">Complimentary for guests</div>
            </div>

            <div class="treatment-card">
                <h4>Pilates</h4>
                <p class="treatment-duration">Tue/Thu/Sat, 6:00-10:00 AM</p>
                <p class="treatment-description">Core-strengthening exercises for improved posture and flexibility.</p>
                <div class="treatment-price">Complimentary for guests</div>
            </div>
        </div>
    </div>
</section>

<section class="treatments-section" id="waterPlans" style="display: none;">
    <div class="container">
        <h3>Subscription Plans</h3>

        <div class="treatments-grid">
            <div class="treatment-card">
                <h4>Basic Plan</h4>
                <p class="treatment-duration">Daily delivery</p>
                <p class="treatment-description">Perfect for small families or individuals. Volume: 20 liters/week</p>
                <div class="treatment-price">$15/delivery</div>
            </div>

            <div class="treatment-card">
                <h4>Family Plan</h4>
                <p class="treatment-duration">Bi-weekly delivery</p>
                <p class="treatment-description">Ideal for medium to large families. Volume: 40 liters/delivery</p>
                <div class="treatment-price">$25/delivery</div>
            </div>

            <div class="treatment-card">
                <h4>Premium Plan</h4>
                <p class="treatment-duration">Weekly delivery</p>
                <p class="treatment-description">For high-consumption households or small offices. Volume: 60 liters/week</p>
                <div class="treatment-price">$35/delivery</div>
            </div>
        </div>
    </div>
</section>

<section class="treatments-section" id="eventSpaces" style="display: none;">
    <div class="container">
        <h3>Our Event Spaces</h3>

        <div class="treatments-grid">
            <div class="treatment-card">
                <h4>Matfam Garden</h4>
                <p class="treatment-duration">Up to 200 guests</p>
                <p class="treatment-description">Beautiful outdoor space ideal for ceremonies and cocktail receptions. Area: 300 m²</p>
                <div class="treatment-price">Contact for pricing</div>
            </div>

            <div class="treatment-card">
                <h4>Summit Auditorim</h4>
                <p class="treatment-duration">Up to 300 guests</p>
                <p class="treatment-description">Our largest venue, perfect for weddings, galas, and conferences. Area: 500 m²</p>
                <div class="treatment-price">Contact for pricing</div>
            </div>

            <div class="treatment-card">
                <h4>Syokimau Conference Hall</h4>
                <p class="treatment-duration">Up to 250 guests</p>
                <p class="treatment-description">Sophisticated space for business meetings and intimate gatherings. Area: 75 m²</p>
                <div class="treatment-price">Contact for pricing</div>
            </div>
        </div>
    </div>
</section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h3>Ready to Experience Our Services?</h3>
            <p>Book your stay at Matfam and enjoy access to all our premium amenities and services. Our team is ready to provide you with an unforgettable experience.</p>
            <div class="cta-buttons">
                <a href="rooms.html" class="cta-btn primary">Book a Room</a>
                <a href="#contact" class="cta-btn secondary">Contact Us</a>
            </div>
        </div>
    </section>

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
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Our Services</h3>
                    <ul>
                        <li><a href="#spa">Spa & Massage</a></li>
                        <li><a href="#fitness">Gym & Fitness</a></li>
                        <li><a href="#restaurant">Restaurant & Bar</a></li>
                        <li><a href="#events">Events & Functions</a></li>
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
                        Welcome to our event planning services! I'm here to help you book the perfect venue for your special occasion. Whether it's a wedding, corporate event, or celebration, how can I assist you today?
                    </div>
                </div>
                
                <div class="quick-actions">
                    <button class="quick-action" data-message="I'd like to book an event space">Book Event Space</button>
                    <button class="quick-action" data-message="What venues do you have available?">View Venues</button>
                    <button class="quick-action" data-message="Tell me about catering options">Catering Options</button>
                    <button class="quick-action" data-message="Do you provide event planning?">Event Planning</button>
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

        // Tab functionality
        document.querySelectorAll('.tab-button').forEach(button => {
    button.addEventListener('click', function() {
        // Remove active class from all tabs
        document.querySelectorAll('.tab-button').forEach(tab => {
            tab.classList.remove('active');
        });
        
        // Add active class to clicked tab
        this.classList.add('active');
        
        const tabName = this.getAttribute('data-tab');
        
        // Hide all content sections
        document.getElementById('spaImage').style.display = 'none';
        document.getElementById('fitnessImage').style.display = 'none';
        document.getElementById('waterImage').style.display = 'none';
        document.getElementById('eventsImage').style.display = 'none';
        document.querySelector('.service-info').style.display = 'none';
        document.getElementById('fitnessInfo').style.display = 'none';
        document.getElementById('waterInfo').style.display = 'none';
        document.getElementById('eventsInfo').style.display = 'none';
        document.querySelector('.booking-section').style.display = 'none';
        document.getElementById('fitnessBooking').style.display = 'none';
        document.getElementById('waterBooking').style.display = 'none';
        document.getElementById('eventsBooking').style.display = 'none';
        document.querySelector('.treatments-section').style.display = 'none';
        document.getElementById('fitnessClasses').style.display = 'none';
        document.getElementById('waterPlans').style.display = 'none';
        document.getElementById('eventSpaces').style.display = 'none';
        
        // Show relevant content based on tab
        if (tabName === 'spa') {
            document.getElementById('spaImage').style.display = 'block';
            document.querySelector('.service-info').style.display = 'block';
            document.querySelector('.booking-section').style.display = 'block';
            document.querySelector('.treatments-section').style.display = 'block';
            
        } else if (tabName === 'water') {
            document.getElementById('waterImage').style.display = 'block';
            document.getElementById('waterInfo').style.display = 'block';
            document.getElementById('waterBooking').style.display = 'block';
            document.getElementById('waterPlans').style.display = 'block';
        } else if (tabName === 'fitness') {
            document.getElementById('fitnessImage').style.display = 'block';
            document.getElementById('fitnessInfo').style.display = 'block';
            document.getElementById('fitnessBooking').style.display = 'block';
            document.getElementById('fitnessClasses').style.display = 'block';
        } else if (tabName === 'events') {
            document.getElementById('eventsImage').style.display = 'block';
            document.getElementById('eventsInfo').style.display = 'block';
            document.getElementById('eventsBooking').style.display = 'block';
            document.getElementById('eventSpaces').style.display = 'block';
        }
    });
});

        // Set minimum date to today
        document.addEventListener('DOMContentLoaded', function() {
            const dateInput = document.getElementById('date');
            const eventDateInput = document.getElementById('eventDate');
            const today = new Date().toISOString().split('T')[0];
            if (dateInput) dateInput.min = today;
            if (eventDateInput) eventDateInput.min = today;
        });

        // Booking form submission
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const fullName = formData.get('fullName');
            const email = formData.get('email');
            const phone = formData.get('phone');
            const treatment = formData.get('treatment');
            const date = formData.get('date');
            const time = formData.get('time');
            const requests = formData.get('requests');
            
            // Basic validation
            if (!fullName || !email || !phone || !treatment || !date || !time) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }
            
            // Simulate booking process
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Processing...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert(`Thank you, ${fullName}! Your ${treatment} treatment has been requested for ${date} at ${time}. We'll contact you at ${email} to confirm your appointment.`);
                
                // Reset form
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
        
// Fitness booking form submission
document.getElementById('fitnessBookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const fullName = formData.get('fullName');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const service = formData.get('service');
    const date = formData.get('date');
    const time = formData.get('time');
    const fitnessLevel = formData.get('fitnessLevel');
    const goals = formData.get('goals');
    
    // Basic validation
    if (!fullName || !email || !phone || !service || !date || !time || !fitnessLevel) {
        alert('Please fill in all required fields.');
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }
    
    // Simulate booking process
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Processing...';
    submitBtn.disabled = true;
    
    setTimeout(() => {
        alert(`Thank you, ${fullName}! Your ${service} session has been requested for ${date} at ${time}. We'll contact you at ${email} to confirm your appointment.`);
        
        // Reset form
        this.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 2000);
});

// Water subscription form submission
document.getElementById('waterBookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const fullName = formData.get('fullName');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const waterType = formData.get('waterType');
    const deliveryAddress = formData.get('deliveryAddress');
    const subscriptionPlan = formData.get('subscriptionPlan');
    const deliveryDay = formData.get('deliveryDay');
    const deliveryTime = formData.get('deliveryTime');
    const deliveryInstructions = formData.get('deliveryInstructions');
    
    // Basic validation
    if (!fullName || !email || !phone || !waterType || !deliveryAddress || !subscriptionPlan || !deliveryDay || !deliveryTime) {
        alert('Please fill in all required fields.');
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }
    
    // Simulate subscription process
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Processing...';
    submitBtn.disabled = true;
    
    setTimeout(() => {
        alert(`Thank you, ${fullName}! Your ${waterType} water subscription (${subscriptionPlan}) has been set up for delivery on ${deliveryDay}s at ${deliveryTime}. We'll contact you at ${email} to confirm your first delivery.`);
        
        // Reset form
        this.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 2000);
});

// Events booking form submission
document.getElementById('eventsBookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const fullName = formData.get('fullName');
    const email = formData.get('email');
    const phone = formData.get('phone');
    const eventType = formData.get('eventType');
    const preferredVenue = formData.get('preferredVenue');
    const numberOfGuests = formData.get('numberOfGuests');
    const eventDate = formData.get('eventDate');
    const eventDuration = formData.get('eventDuration');
    const cateringRequirements = formData.get('cateringRequirements');
    const specialRequirements = formData.get('specialRequirements');
    
    // Basic validation
    if (!fullName || !email || !phone || !eventType || !preferredVenue || !numberOfGuests || !eventDate || !eventDuration || !cateringRequirements) {
        alert('Please fill in all required fields.');
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }
    
    // Simulate booking process
    const submitBtn = this.querySelector('.submit-btn');
    const originalText = submitBtn.textContent;
    
    submitBtn.textContent = 'Processing...';
    submitBtn.disabled = true;
    
    setTimeout(() => {
        alert(`Thank you, ${fullName}! Your ${eventType} event inquiry for ${numberOfGuests} guests at the ${preferredVenue} on ${eventDate} has been submitted. Our event planning team will contact you at ${email} within 24 hours to discuss details.`);
        
        // Reset form
        this.reset();
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }, 2000);
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
    "I'd be happy to help you plan your event! We have three beautiful venues: Grand Ballroom, Garden Terrace, and Executive Boardroom.",
    "Our event planning team can assist with everything from catering to decorations. What type of event are you planning?",
    "We offer full-service catering, buffet style, cocktail receptions, and more. Our chef can customize menus to your preferences.",
    "The Grand Ballroom accommodates up to 500 guests and is perfect for weddings and galas. Would you like to schedule a venue tour?",
    "Our Garden Terrace is ideal for outdoor ceremonies and cocktail receptions. It has a beautiful view and can host up to 150 guests."
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