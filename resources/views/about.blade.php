<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Matfam Hotel</title>
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
            background: #2c3e50;
            color: white;
            padding: 8rem 0 4rem;
            text-align: center;
            margin-top: 80px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 300;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Content Sections */
        .content-section {
            padding: 4rem 0;
        }

        .content-section:nth-child(even) {
            background: #f8f9fa;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: #333;
        }

        .section-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #666;
            margin-bottom: 2rem;
        }

        /* Story Section with Images */
        .story-images {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .story-image {
            text-align: center;
        }

        .story-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .story-image h3 {
            color: #333;
            font-size: 1.2rem;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-member {
            text-align: center;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .team-member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .team-member h3 {
            color: #333;
            margin-bottom: 0.5rem;
        }

        .team-member p {
            color: #666;
            font-style: italic;
        }

        /* Contact Section */
        .contact-section {
            background: #f8f9fa;
            padding: 4rem 0;
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            margin-top: 2rem;
        }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group textarea {
            height: 120px;
            resize: vertical;
        }

        .contact-info h3 {
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .contact-details {
            margin-bottom: 2rem;
        }

        .contact-details h4 {
            color: #2c5aa0;
            margin-bottom: 0.5rem;
        }

        .contact-details p {
            color: #666;
            margin-bottom: 0.25rem;
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

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
                padding: 0 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .story-images {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .contact-content {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .footer-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .container {
                padding: 0 15px;
            }
        }

        @media (max-width: 480px) {
            .hero {
                padding: 6rem 0 3rem;
            }

            .hero h1 {
                font-size: 1.5rem;
            }

            .content-section {
                padding: 3rem 0;
            }

            .contact-form {
                padding: 1.5rem;
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
    <section class="hero">
        <div class="container">
            <h1>About Lanet Matfam Resort</h1>
            <p>Experience unparalleled luxury and hospitality in the heart of the city</p>
        </div>
    </section>

    <!-- Our Story Section -->
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">Our Story</h2>
            <div class="section-content">
                <p>Founded in 2012, Lanet Matfam Resort began with a vision to create an extraordinary hospitality experience that combines elegant design, exceptional service, and modern comforts.</p>
                
                <p>For over 13 years, we have been dedicated to the art of hospitality, continually evolving our services while maintaining our commitment to personalized attention and creating memorable experiences for every guest who walks through our doors.</p>
                
                <p>Our hotel has been recognized with numerous awards for excellence in hospitality, innovative design, and outstanding customer service. We take pride in our rich history while consistently looking toward the future of luxury accommodation.</p>
            </div>
            
            <div class="story-images">
                <div class="story-image">
                    <img src="images/IMG_9702.JPG?height=200&width=300" alt="Hotel Exterior">
                    <h3>Hotel Exterior</h3>
                </div>
                <div class="story-image">
                    <img src="images/001_0447.jpg?height=200&width=300" alt="Swimming Area">
                    <h3>Swimming Area</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission Section -->
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">Our Mission</h2>
            <div class="section-content">
                <p>At Luxe Hotel, our mission is to exceed expectations by providing extraordinary service and creating meaningful connections with our guests. We strive to be a home away from home, where every detail is crafted to ensure comfort, relaxation, and memorable experiences.</p>
                
                <p>We are committed to sustainable practices and giving back to our community while maintaining the highest standards of luxury hospitality. Our dedicated team works tirelessly to uphold these values and deliver exceptional service every day.</p>
            </div>
        </div>
    </section>

    <!-- Leadership Team Section -->
    <section class="content-section">
        <div class="container">
            <h2 class="section-title">Meet Our Leadership Team</h2>
            
            <div class="team-grid">
                <div class="team-member">
                    <img src="/placeholder.svg?height=120&width=120" alt="Jonathan Pierce">
                    <h3>Jonathan Pierce</h3>
                    <p>General Manager</p>
                </div>
                
                <div class="team-member">
                    <img src="/placeholder.svg?height=120&width=120" alt="Sophia Martinez">
                    <h3>Sophia Martinez</h3>
                    <p>Director of Operations</p>
                </div>
                
                <div class="team-member">
                    <img src="/placeholder.svg?height=120&width=120" alt="Marcus Chen">
                    <h3>Marcus Chen</h3>
                    <p>Head Chef</p>
                </div>
                
                <div class="team-member">
                    <img src="/placeholder.svg?height=120&width=120" alt="Isabella Rodriguez">
                    <h3>Isabella Rodriguez</h3>
                    <p>Guest Relations Manager</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <p class="section-content">We'd love to hear from you. Please fill out the form below or use the contact information provided.</p>
            
            <div class="contact-content">
                <div class="contact-form">
                    <form>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" placeholder="John Doe" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="john@example.com" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select id="subject" name="subject" required>
                                <option value="">How can we help you?</option>
                                <option value="reservation">Reservation Inquiry</option>
                                <option value="event">Event Planning</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" placeholder="Please provide details about your inquiry..." required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                    </form>
                </div>
                
                <div class="contact-info">
                    <div class="contact-details">
                        <h4>Address</h4>
                        <p>Lanet-Ndundori Rd, opp Barracks</p>
                        <p>Nakuru City</p>
                        <p>Kenya</p>
                    </div>
                    
                    <div class="contact-details">
                        <h4>Phone</h4>
                        <p>Reservations: +254 (555) 123-4567</p>
                        <p>Front Desk: +254 (555) 123-4568</p>
                        <p>Concierge: +254 (555) 123-4569</p>
                    </div>
                    
                    <div class="contact-details">
                        <h4>Email</h4>
                        <p>General: info@lanetmatfamresort.co.ke</p>
                        <p>Reservations: reservations@lanetmatfamresort.co.ke</p>
                        <p>Events: events@lanetmatfamresort.co.ke</p>
                    </div>
                    
                    <div class="contact-details">
                        <h4>Hours</h4>
                        <p>Front Desk: 24/7</p>
                        <p>Concierge: 7:00 AM - 11:00 PM</p>
                        <p>Restaurant: 6:30 AM - 10:30 PM</p>
                    </div>
                </div>
            </div>
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
                        <li><a href="about.html">About Us</a></li>
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
                        <li>Phone: +254 (555) 123-4567</li>
                        <li>Email: info@lanetmatfamresort.co.ke</li>
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
        // Handle contact form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const name = formData.get('name');
            const email = formData.get('email');
            const subject = formData.get('subject');
            const message = formData.get('message');
            
            // Basic validation
            if (!name || !email || !subject || !message) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Simulate form submission
            alert(`Thank you, ${name}! Your message has been sent. We'll get back to you at ${email} soon.`);
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