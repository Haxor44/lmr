<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Matfam Hotel</title>
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6rem 0 4rem;
        }

        .login-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.5rem;
            font-weight: 400;
        }

        .login-header p {
            color: #666;
            font-size: 1rem;
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

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2c5aa0;
            box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
        }

        .password-group {
            position: relative;
        }

        .forgot-password {
            position: absolute;
            top: 0;
            right: 0;
            color: #2c5aa0;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            color: #666;
        }

        .sign-in-btn {
            width: 100%;
            background: #2c5aa0;
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .sign-in-btn:hover {
            background: #1e3d72;
        }

        .divider {
            text-align: center;
            margin: 1.5rem 0;
            position: relative;
            color: #999;
            font-size: 0.9rem;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #ddd;
            z-index: 1;
        }

        .divider span {
            background: white;
            padding: 0 1rem;
            position: relative;
            z-index: 2;
        }

        .social-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: white;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            border-color: #2c5aa0;
            background: #f8f9fa;
        }

        .google-btn {
            color: #db4437;
        }

        .facebook-btn {
            color: #4267B2;
        }

        .signup-link {
            text-align: center;
            color: #666;
        }

        .signup-link a {
            color: #2c5aa0;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
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

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                justify-content: space-between;
            }
            
            .nav-links {
                display: none;
            }

            .login-container {
                margin: 0 1rem;
                padding: 2rem;
            }

            .login-header h1 {
                font-size: 1.5rem;
            }

            .social-buttons {
                grid-template-columns: 1fr;
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

        @media (max-width: 480px) {
            .main-content {
                padding: 5rem 0 2rem;
            }

            .login-container {
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
                <a href="{{ url('/login') }}" class="btn btn-outline">Sign In</a>
                <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
            </div>
            <button class="mobile-menu-btn">☰</button>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="login-container">
            <div class="login-header">
                <h1>Welcome Back</h1>
                <p>Sign in to access your account</p>
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form  method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="name@example.com" required>
                </div>

                <div class="form-group">
                    <div class="password-group">
                        <label for="password">Password</label>
                        @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                    </div>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="sign-in-btn">Sign in</button>
            </form>

            <div class="divider">
                <span>OR CONTINUE WITH</span>
            </div>

            <div class="social-buttons">
                <a href="#" class="social-btn google-btn">
                    <span style="font-size: 1.2rem;">G</span>
                    Google
                </a>
                <a href="#" class="social-btn facebook-btn">
                    <span style="font-size: 1.2rem;">f</span>
                    Facebook
                </a>
            </div>

            <div class="signup-link">
                Don't have an account? <a href="{{ url('/register') }}">Sign up here</a>
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
                        <li><a href="#">Gym & Fitness</a></li>
                        <li><a href="#">Restaurant & Bar</a></li>
                        <li><a href="#">Events & Functions</a></li>
                    </ul>
                </div>
                
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p>123 Luxury Lane<br>
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
        // Handle login form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const remember = document.getElementById('remember').checked;
            
            // Basic validation
            if (!email || !password) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }
            
            // Simulate login process
            const submitBtn = document.querySelector('.sign-in-btn');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Signing in...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert(`Welcome back! You have successfully signed in with ${email}`);
                
                // Reset form
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                
                // In a real application, you would redirect to the dashboard
                // window.location.href = 'dashboard.html';
            }, 2000);
        });

        // Handle social login buttons
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const provider = this.textContent.trim();
                alert(`${provider} login would be implemented here.`);
            });
        });

        // Handle forgot password link
        document.querySelector('.forgot-password').addEventListener('click', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            
            if (email) {
                alert(`Password reset instructions will be sent to ${email}`);
            } else {
                alert('Please enter your email address first, then click "Forgot password?"');
                document.getElementById('email').focus();
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

        // Auto-focus email field when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('email').focus();
        });
    </script>
</body>
</html>