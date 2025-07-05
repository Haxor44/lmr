<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Matfam Hotel</title>
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

        .register-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.5rem;
            font-weight: 400;
        }

        .register-header p {
            color: #666;
            font-size: 1rem;
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

        .password-requirements {
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.5rem;
            line-height: 1.4;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .checkbox-group label {
            margin: 0;
            font-weight: normal;
            color: #666;
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .checkbox-group a {
            color: #2c5aa0;
            text-decoration: none;
        }

        .checkbox-group a:hover {
            text-decoration: underline;
        }

        .create-account-btn {
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

        .create-account-btn:hover {
            background: #1e3d72;
        }

        .create-account-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
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

        .signin-link {
            text-align: center;
            color: #666;
        }

        .signin-link a {
            color: #2c5aa0;
            text-decoration: none;
        }

        .signin-link a:hover {
            text-decoration: underline;
        }

        /* Password Strength Indicator */
        .password-strength {
            margin-top: 0.5rem;
        }

        .strength-bar {
            height: 4px;
            background: #eee;
            border-radius: 2px;
            overflow: hidden;
            margin-bottom: 0.25rem;
        }

        .strength-fill {
            height: 100%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #e74c3c; width: 25%; }
        .strength-fair { background: #f39c12; width: 50%; }
        .strength-good { background: #f1c40f; width: 75%; }
        .strength-strong { background: #27ae60; width: 100%; }

        .strength-text {
            font-size: 0.8rem;
            font-weight: 500;
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

            .register-container {
                margin: 0 1rem;
                padding: 2rem;
            }

            .register-header h1 {
                font-size: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
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

            .register-container {
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

            .checkbox-group {
                align-items: flex-start;
            }

            .checkbox-group label {
                font-size: 0.85rem;
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
                <a href="{{ url('/login') }}" class="btn btn-outline">Sign In</a>
                <a href="{{ url('/register') }}" class="btn btn-primary">Register</a>
            </div>
            <button class="mobile-menu-btn">☰</button>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="register-container">
            <div class="register-header">
                <h1>Create an Account</h1>
                <p>Sign up to get started with Matfam</p>
            </div>
            
            <form  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    
                </div>

                <div class="form-group">
                   <x-input-label for="email" :value="__('Email')" />
                   <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
                   <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')" placeholder="••••••••"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    <div class="password-strength" id="passwordStrength" style="display: none;">
                        <div class="strength-bar">
                            <div class="strength-fill" id="strengthFill"></div>
                        </div>
                        <div class="strength-text" id="strengthText"></div>
                    </div>
                    <div class="password-requirements">
                        Password must be at least 8 characters long with at least one uppercase letter, one lowercase letter, and one number.
                    </div>
                </div>

                <div class="form-group">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        
                    <div id="passwordMatch" style="font-size: 0.85rem; margin-top: 0.5rem;"></div>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">
                        I agree to the <a href="#" target="_blank">Terms and Conditions</a> and <a href="#" target="_blank">Privacy Policy</a>
                    </label>
                </div>

                <button type="submit" class="create-account-btn">{{ __('Register') }}</button>
            </form>
            

            <div class="divider">
                <span>OR SIGN UP WITH</span>
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

            <div class="signin-link">
                Already have an account? <a href="{{ url('/login') }}">Sign in</a>
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
        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthIndicator = document.getElementById('passwordStrength');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            
            if (password.length === 0) {
                strengthIndicator.style.display = 'none';
                return;
            }
            
            strengthIndicator.style.display = 'block';
            
            let score = 0;
            let feedback = [];
            
            // Length check
            if (password.length >= 8) score++;
            else feedback.push('at least 8 characters');
            
            // Uppercase check
            if (/[A-Z]/.test(password)) score++;
            else feedback.push('uppercase letter');
            
            // Lowercase check
            if (/[a-z]/.test(password)) score++;
            else feedback.push('lowercase letter');
            
            // Number check
            if (/\d/.test(password)) score++;
            else feedback.push('number');
            
            // Update strength indicator
            strengthFill.className = 'strength-fill';
            
            if (score === 0) {
                strengthFill.classList.add('strength-weak');
                strengthText.textContent = 'Very Weak';
                strengthText.style.color = '#e74c3c';
            } else if (score === 1) {
                strengthFill.classList.add('strength-weak');
                strengthText.textContent = 'Weak';
                strengthText.style.color = '#e74c3c';
            } else if (score === 2) {
                strengthFill.classList.add('strength-fair');
                strengthText.textContent = 'Fair';
                strengthText.style.color = '#f39c12';
            } else if (score === 3) {
                strengthFill.classList.add('strength-good');
                strengthText.textContent = 'Good';
                strengthText.style.color = '#f1c40f';
            } else {
                strengthFill.classList.add('strength-strong');
                strengthText.textContent = 'Strong';
                strengthText.style.color = '#27ae60';
            }
            
            return score >= 4;
        }

        // Password confirmation checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            const matchIndicator = document.getElementById('passwordMatch');
            
            if (password_confirmation.length === 0) {
                matchIndicator.textContent = '';
                return true;
            }
            
            if (password === password_confirmation) {
                matchIndicator.textContent = '✓ Passwords match';
                matchIndicator.style.color = '#27ae60';
                return true;
            } else {
                matchIndicator.textContent = '✗ Passwords do not match';
                matchIndicator.style.color = '#e74c3c';
                return false;
            }
        }

        // Event listeners
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });

        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

        // Form validation and submission
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const name = formData.get('name').trim();
            const email = formData.get('email').trim();
            const password = formData.get('password');
            const password_confirmation = formData.get('password_confirmation');
            const terms = formData.get('terms');
            
            // Validation
            if (!name || !email || !password || !password_confirmation) {
                alert('Please fill in all required fields.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return;
            }
            
            // Password strength validation
            if (!checkPasswordStrength(password)) {
                alert('Password does not meet the requirements.');
                return;
            }
            
            // Password match validation
            if (password !== password_confirmation) {
                alert('Passwords do not match.');
                return;
            }
            
            // Terms agreement validation
            if (!terms) {
                alert('Please agree to the Terms and Conditions and Privacy Policy.');
                return;
            }
            
            // Simulate registration process
           
        });

        // Handle social registration buttons
        document.querySelectorAll('.social-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const provider = this.textContent.trim();
                alert(`${provider} registration would be implemented here.`);
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

        // Auto-focus first name field when page loads
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('name').focus();
        });
    </script>
</body>
</html>