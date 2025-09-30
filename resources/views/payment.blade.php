<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Matfam Hotel</title>
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
            position: relative;
        }

        .steps-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 20%;
            right: 20%;
            height: 2px;
            background: #2c5aa0;
            z-index: 1;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
            position: relative;
            z-index: 2;
            background: white;
            padding: 0 1rem;
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

        .step.completed .step-number {
            background: #2c5aa0;
            color: white;
        }

        .step.active .step-number {
            background: #2c5aa0;
            color: white;
        }

        .step.inactive .step-number {
            background: #e9ecef;
            color: #6c757d;
        }

        .step.completed .step-text,
        .step.active .step-text {
            color: #2c5aa0;
        }

        .step.inactive .step-text {
            color: #6c757d;
        }

        /* Main Layout */
        .payment-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        /* Payment Information */
        .payment-info {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .payment-info h2 {
            font-size: 1.8rem;
            margin-bottom: 2rem;
            color: #333;
        }

        /* Payment Methods */
        .payment-methods {
            margin-bottom: 2rem;
        }

        .payment-methods h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .payment-options {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .payment-option {
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .payment-option:hover {
            border-color: #2c5aa0;
        }

        .payment-option.selected {
            border-color: #2c5aa0;
            background: #f8f9fa;
        }

        .payment-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .payment-icon {
            width: 40px;
            height: 40px;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            border-radius: 8px;
        }

        .credit-card-icon {
            background: #f8f9fa;
            color: #666;
        }

        .mpesa-icon {
            background: #00a86b;
            color: white;
            font-weight: bold;
            font-size: 1rem;
        }

        .payment-option-label {
            font-weight: 500;
            color: #333;
        }

        /* Form Fields */
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
            border-radius: 5px;
            font-size: 1rem;
            background: #f8f9fa;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2c5aa0;
            box-shadow: 0 0 0 3px rgba(44, 90, 160, 0.1);
        }

        .form-group input::placeholder {
            color: #999;
        }

        /* Security Message */
        .security-message {
            background: #e8f4fd;
            border: 1px solid #bee5eb;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 2rem;
            font-size: 0.9rem;
            color: #0c5460;
        }

        /* Complete Button */
        .complete-btn {
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

        .complete-btn:hover {
            background: #1e3d72;
        }

        .complete-btn:disabled {
            background: #6c757d;
            cursor: not-allowed;
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

            .payment-layout {
                grid-template-columns: 1fr;
            }

            .payment-options {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .steps-container {
                flex-direction: column;
                gap: 1rem;
            }

            .steps-container::before {
                display: none;
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

        /* M-Pesa specific styles */
        .form-help-text {
            font-size: 0.9rem;
            color: #666;
            margin-top: 0.5rem;
            line-height: 1.4;
        }

        .mpesa-process-info {
            background: #e8f5e8;
            border: 1px solid #c3e6c3;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .mpesa-process-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }

        .mpesa-process-icon {
            width: 32px;
            height: 32px;
            background: #00a86b;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1rem;
        }

        .mpesa-process-info h4 {
            color: #00a86b;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0;
        }

        .mpesa-process-steps {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mpesa-process-steps li {
            color: #00a86b;
            font-weight: 500;
            margin-bottom: 0.5rem;
            padding-left: 1rem;
            position: relative;
        }

        .mpesa-process-steps li:before {
            content: "•";
            color: #00a86b;
            font-weight: bold;
            position: absolute;
            left: 0;
        }

        .mpesa-process-steps li:last-child {
            margin-bottom: 0;
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

        .typing-indicator {
            display: none;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.8rem;
            font-style: italic;
        }

        .typing-dots {
            display: flex;
            gap: 2px;
        }

        .typing-dots span {
            width: 4px;
            height: 4px;
            background: #666;
            border-radius: 50%;
            animation: typing 1.4s infinite;
        }

        .typing-dots span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .typing-dots span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing {
            0%, 60%, 100% {
                transform: translateY(0);
            }
            30% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
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
            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <nav class="breadcrumb-nav">
                    <a href="index.html">Home</a>
                    <span>></span>
                    <a href="rooms.html">Rooms</a>
                    <span>></span>
                    <a href="room-details.html">Executive King Room</a>
                    <span>></span>
                    <span>Booking</span>
                </nav>
            </div>

            <!-- Progress Steps -->
            <div class="progress-steps">
                <div class="steps-container">
                    <div class="step completed">
                        <div class="step-number">1</div>
                        <div class="step-text">Booking Details</div>
                    </div>
                    <div class="step active">
                        <div class="step-number">2</div>
                        <div class="step-text">Payment</div>
                    </div>
                    <div class="step inactive">
                        <div class="step-number">3</div>
                        <div class="step-text">Confirmation</div>
                    </div>
                </div>
            </div>

            <!-- Payment Layout -->
            <div class="payment-layout">
                <!-- Payment Information -->
                <div class="payment-info">
                    <h2>Payment Information</h2>

                    <!-- Payment Methods -->
                    <div class="payment-methods">
                        <h3>Payment Method</h3>
                        <div class="payment-options">
                            <div class="payment-option selected" data-method="credit-card">
                                <input type="radio" name="paymentMethod" value="credit-card" checked>
                                <div class="payment-icon credit-card-icon">💳</div>
                                <div class="payment-option-label">Credit Card</div>
                            </div>
                            <div class="payment-option" data-method="mpesa">
                                <input type="radio" name="paymentMethod" value="mpesa">
                                <div class="payment-icon mpesa-icon">M</div>
                                <div class="payment-option-label">M-Pesa</div>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Form -->
                    <form id="paymentForm">
                        <div id="creditCardForm">
                            <div class="form-group">
                                <label for="cardholderName">Cardholder Name</label>
                                <input type="text" id="cardholderName" name="cardholderName" placeholder="Name on card" required>
                            </div>

                            <div class="form-group">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" maxlength="5" required>
                                </div>
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="123" maxlength="4" required>
                                </div>
                            </div>
                        </div>

                        <div id="mpesaForm" style="display: none;">
                            <div class="form-group">
                                <label for="mpesaNumber">M-Pesa Phone Number</label>
                                <input type="tel" id="mpesaNumber" name="mpesaNumber" placeholder="0712 345 678 or 254 712 345 678">
                                <div class="form-help-text">
                                    Enter your M-Pesa registered phone number. You will receive a payment request.
                                </div>
                            </div>
                            
                            <div class="mpesa-process-info">
                                <div class="mpesa-process-header">
                                    <div class="mpesa-process-icon">M</div>
                                    <h4>M-Pesa Payment Process</h4>
                                </div>
                                <ul class="mpesa-process-steps">
                                    <li>You will receive an STK push notification</li>
                                    <li>Enter your M-Pesa PIN to complete payment</li>
                                    <li>Payment confirmation will be sent via SMS</li>
                                </ul>
                            </div>
                        </div>

                        <div class="security-message">
                            🔒 Your payment information is secure. We use encryption to protect your data.
                        </div>

                        <button type="submit" class="complete-btn">Complete Booking</button>
                    </form>
                </div>

                <!-- Booking Summary -->
                <div class="booking-summary">
                    <h3>Booking Summary</h3>
                    
                    <div class="summary-row">
                        <span class="summary-label">Room:</span>
                        <span class="summary-value" id="summaryRoom">Executive King Room</span>
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
                        <span class="summary-value" id="summaryNights">1 night</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Room Rate:</span>
                        <span class="summary-value" id="summaryRates">$320 × 1 nights</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Subtotal:</span>
                        <span class="summary-value" id="summarySubtotal">$320</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Taxes & Fees (12%):</span>
                        <span class="summary-value" id="summaryTax">$38</span>
                    </div>
                    
                    <div class="summary-row summary-total">
                        <span class="summary-label">Total:</span>
                        <span class="summary-value" id="summaryTotal">$358</span>
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
                    <p>Nakuru Ndundori Rd, opp Barracks<br>
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
                    Hello! I'm here to help with your booking. Do you have any questions about your reservation or our services?
                </div>
            </div>
            
            <div class="typing-indicator" id="typingIndicator">
                <span>Concierge is typing</span>
                <div class="typing-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            
            <div class="concierge-input">
                <input type="text" id="conciergeInput" placeholder="Type your message..." maxlength="500">
                <button class="concierge-send" id="conciergeSend">➤</button>
            </div>
        </div>
    </div>

    <script>

        function getCookie(name) {
  const cookies = Object.fromEntries(
    document.cookie.split('; ').map(cookie => {
      const [key, value] = cookie.split('=');
      return [key, decodeURIComponent(value)];
    })
  );
  return cookies[name] || null;
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

        document.addEventListener('DOMContentLoaded', function() {
             var cookiedata = getCookie('room');
             var room = JSON.parse(cookiedata);
             console.log(room.room_id);
             document.getElementById('summaryRoom').textContent = room.room_name;
             document.getElementById('summaryDates').textContent = `${room.checkin} - ${room.checkout}`;
             document.getElementById('summarySubtotal').textContent = `Ksh${room.subtotal}`;
             document.getElementById('summaryRates').textContent = `Ksh${room.base_price} ×  ${room.nights} nights`;
             document.getElementById('summaryNights').textContent = `${room.nights} nights`;
             document.getElementById('summaryTax').textContent = `Ksh${room.tax}`;
             document.getElementById('summaryTotal').textContent = `Ksh${room.total}`;
        });

        // Payment method selection
        document.querySelectorAll('.payment-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                document.querySelectorAll('.payment-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Update radio button
                const radio = this.querySelector('input[type="radio"]');
                radio.checked = true;
                
                // Show/hide appropriate form
                const method = this.dataset.method;
                const creditCardForm = document.getElementById('creditCardForm');
                const mpesaForm = document.getElementById('mpesaForm');
                
                if (method === 'credit-card') {
                    creditCardForm.style.display = 'block';
                    mpesaForm.style.display = 'none';
                    
                    // Make credit card fields required
                    document.getElementById('cardholderName').required = true;
                    document.getElementById('cardNumber').required = true;
                    document.getElementById('expiryDate').required = true;
                    document.getElementById('cvv').required = true;
                    document.getElementById('mpesaNumber').required = false;
                } else if (method === 'mpesa') {
                    creditCardForm.style.display = 'none';
                    mpesaForm.style.display = 'block';
                    
                    // Make M-Pesa fields required
                    document.getElementById('cardholderName').required = false;
                    document.getElementById('cardNumber').required = false;
                    document.getElementById('expiryDate').required = false;
                    document.getElementById('cvv').required = false;
                    document.getElementById('mpesaNumber').required = true;
                }
            });
        });

        // Card number formatting
        document.getElementById('cardNumber').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });

        // Expiry date formatting
        document.getElementById('expiryDate').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });

        // CVV validation
        document.getElementById('cvv').addEventListener('input', function(e) {
            e.target.value = e.target.value.replace(/\D/g, '');
        });

        async function confirmBooking(){
            try {
                return await fetch('127.0.0.1:8000/emails')
            } catch (error) {
                
            }
        }
         async function createBooking() {
     try {

    // Extract XSRF token from cookies
    const xsrfToken = document.cookie
      .split('; ')
      .find(row => row.startsWith('XSRF-TOKEN='))
      ?.split('=')[1];

    if (!xsrfToken) {
      throw new Error('XSRF token not found in cookies');
    }

    // Step 2: Make booking request
    return await fetch('http://127.0.0.1:8000/bookings', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-XSRF-TOKEN': decodeURIComponent(xsrfToken),  // Decode URL-encoded token
      },
      credentials: 'include',  // Send cookies with request
      body: JSON.stringify({
      user_id: 2,
      room_id: 2,
      check_in: "2025-08-15",      // Added to top-level
      check_out: "2025-08-20",     // Added to top-level
      guests: 2,                   // Added to top-level
      booking_data: {              // Keep if your backend still needs this
        check_in: "2025-08-15",
        check_out: "2025-08-20",
        guests: 2
      },
      guest_details: {
        // Added primary_guest object with all required fields
        primary_guest: {
          name: "John Smith",
          email: "john@example.com",
          phone: "+1234567890"
        },
        // Keep additional guests if needed
        additional_guests: [
          {
            name: "Jane Smith",
            email: "jane@example.com"
          }
        ]
      }
    })
    });
    //confirmBooking();
  } catch (error) {
    console.log('Booking error:', error);
    // Handle error in your UI
  }
}

// Execute the function
//createBooking();

        // Form submission
        document.getElementById('paymentForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const selectedMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
            const submitBtn = document.querySelector('.complete-btn');
            const originalText = submitBtn.textContent;
            
            // Basic validation
            if (selectedMethod === 'credit-card') {
                const cardholderName = document.getElementById('cardholderName').value;
                const cardNumber = document.getElementById('cardNumber').value.replace(/\s/g, '');
                const expiryDate = document.getElementById('expiryDate').value;
                const cvv = document.getElementById('cvv').value;
                
                if (!cardholderName || !cardNumber || !expiryDate || !cvv) {
                    alert('Please fill in all credit card fields.');
                    return;
                }
                
                if (cardNumber.length < 13 || cardNumber.length > 19) {
                    alert('Please enter a valid card number.');
                    return;
                }
                
                if (cvv.length < 3 || cvv.length > 4) {
                    alert('Please enter a valid CVV.');
                    return;
                }
                
                // Validate expiry date format
                const expiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
                if (!expiryRegex.test(expiryDate)) {
                    alert('Please enter a valid expiry date (MM/YY).');
                    return;
                }
            } else if (selectedMethod === 'mpesa') {
                const mpesaNumber = document.getElementById('mpesaNumber').value;
                
                if (!mpesaNumber) {
                    alert('Please enter your M-Pesa phone number.');
                    return;
                }
            }

            
            var cookiedata = getCookie('room');
            var room = JSON.parse(cookiedata);
            console.log(room.room_id);
            createBooking();
            
            // Simulate payment processing
            submitBtn.textContent = 'Processing Payment...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                //alert('Payment successful! Redirecting to confirmation page...');
                // In a real application, this would redirect to the confirmation page
                //window.location.replace("{{ url('/confirmation') }}");
                
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });

        // Concierge Widget Functionality
        const conciergeBtn = document.getElementById('conciergeBtn');
        const conciergeChat = document.getElementById('conciergeChat');
        const conciergeClose = document.getElementById('conciergeClose');
        const conciergeInput = document.getElementById('conciergeInput');
        const conciergeSend = document.getElementById('conciergeSend');
        const conciergeMessages = document.getElementById('conciergeMessages');
        const typingIndicator = document.getElementById('typingIndicator');

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
            
            // Show typing indicator
            typingIndicator.style.display = 'flex';
            
            // Simulate bot response
            setTimeout(() => {
                typingIndicator.style.display = 'none';
                
                const botMessage = document.createElement('div');
                botMessage.className = 'message bot';
                
                // Simple response logic
                const responses = {
                    'payment': 'We accept all major credit cards and M-Pesa. Your payment information is secure and encrypted.',
                    'booking': 'Your booking details look great! You\'re reserving an Executive King Room for June 25-26, 2025.',
                    'cancel': 'You can cancel your booking free of charge up to 48 hours before check-in.',
                    'help': 'I\'m here to help! You can ask me about payment methods, booking details, cancellation policy, or any hotel services.',
                    'room': 'The Executive King Room features a king-size bed, city view, free WiFi, and luxury amenities.',
                    'services': 'We offer spa services, fitness center, restaurant, room service, and concierge assistance.',
                    'default': 'Thank you for your message! For immediate assistance, please call us at +1 (555) 123-4567 or I can help answer questions about your booking.'
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
            }, 1500);
        }

        // Send message on button click
        conciergeSend.addEventListener('click', sendMessage);

        // Send message on Enter key
        conciergeInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Auto-responses for common payment page questions
        setTimeout(() => {
            if (chatOpen) {
                const helpMessage = document.createElement('div');
                helpMessage.className = 'message bot';
                helpMessage.textContent = 'I notice you\'re on the payment page. Feel free to ask if you need help with payment methods or have any questions about your booking!';
                conciergeMessages.appendChild(helpMessage);
                conciergeMessages.scrollTop = conciergeMessages.scrollHeight;
            }
        }, 30000); // Show after 30 seconds if chat is open
    </script>
</body>
</html>