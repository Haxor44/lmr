@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Complete Your Payment</h4>
                </div>
                <div class="card-body">
                    <!-- Booking Summary -->
                    <div class="mb-4 p-3 bg-light rounded">
                        <h5>Booking Summary</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Booking ID:</strong> {{ $booking->confirmation_code }}</p>
                                <p><strong>Room:</strong> {{ $booking->room->name }}</p>
                                <p><strong>Room Type:</strong> {{ ucfirst($booking->room->type) }}</p>
                                <p><strong>Guests:</strong> {{ $booking->guests }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Check-in:</strong> {{ $booking->check_in->format('M d, Y') }}</p>
                                <p><strong>Check-out:</strong> {{ $booking->check_out->format('M d, Y') }}</p>
                                <p><strong>Duration:</strong> {{ $booking->duration }} night(s)</p>
                                <p><strong>Status:</strong> 
                                    <span class="badge badge-warning">{{ ucfirst($booking->status) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing Breakdown -->
                    <div class="mb-4 p-3 border rounded">
                        <h5>Pricing Breakdown</h5>
                        <div class="d-flex justify-content-between">
                            <span>Base Amount:</span>
                            <span>KES {{ number_format($booking->base_amount, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax (10%):</span>
                            <span>KES {{ number_format($booking->tax_amount, 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <strong>Total Amount:</strong>
                            <strong>KES {{ number_format($booking->total_price, 2) }}</strong>
                        </div>
                    </div>

                    <!-- Payment Form -->
                    <form id="paymentForm" class="needs-validation" novalidate>
                        @csrf
                        <h5 class="mb-3">Billing Information</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="first_name">First Name *</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" 
                                           value="{{ old('first_name', $booking->user->name ?? '') }}" required>
                                    <div class="invalid-feedback">Please provide a valid first name.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="last_name">Last Name *</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" 
                                           value="{{ old('last_name') }}" required>
                                    <div class="invalid-feedback">Please provide a valid last name.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="email">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="{{ old('email', $booking->user->email ?? '') }}" required>
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="phone">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" 
                                           value="{{ old('phone') }}" placeholder="+254700000000" required>
                                    <div class="invalid-feedback">Please provide a valid phone number.</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" 
                                           value="{{ old('city') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="country_code">Country</label>
                                    <select class="form-control" id="country_code" name="country_code">
                                        <option value="KE" {{ old('country_code', 'KE') == 'KE' ? 'selected' : '' }}>Kenya</option>
                                        <option value="UG" {{ old('country_code') == 'UG' ? 'selected' : '' }}>Uganda</option>
                                        <option value="TZ" {{ old('country_code') == 'TZ' ? 'selected' : '' }}>Tanzania</option>
                                        <option value="RW" {{ old('country_code') == 'RW' ? 'selected' : '' }}>Rwanda</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="address_line_1">Address Line 1</label>
                            <input type="text" class="form-control" id="address_line_1" name="address_line_1" 
                                   value="{{ old('address_line_1') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="address_line_2">Address Line 2</label>
                            <input type="text" class="form-control" id="address_line_2" name="address_line_2" 
                                   value="{{ old('address_line_2') }}">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" id="payButton">
                                <span class="spinner-border spinner-border-sm me-2 d-none" id="paymentSpinner" role="status"></span>
                                Pay KES {{ number_format($booking->total_price, 2) }}
                            </button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">
                        <small class="text-muted">
                            <i class="fas fa-lock me-1"></i>
                            Your payment is secured by Pesapal. We accept M-Pesa, Airtel Money, Visa, and Mastercard.
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('paymentForm');
    const payButton = document.getElementById('payButton');
    const spinner = document.getElementById('paymentSpinner');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Basic form validation
        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Disable button and show spinner
        payButton.disabled = true;
        spinner.classList.remove('d-none');
        payButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';

        // Prepare form data
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        // Send payment request
        fetch(`{{ route('payments.initiate', $booking->id) }}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.redirect_url) {
                // Redirect to Pesapal payment page
                window.location.href = data.redirect_url;
            } else {
                throw new Error(data.message || 'Payment initialization failed');
            }
        })
        .catch(error => {
            console.error('Payment error:', error);
            alert('Payment initialization failed: ' + error.message);
            
            // Re-enable button
            payButton.disabled = false;
            spinner.classList.add('d-none');
            payButton.innerHTML = 'Pay KES {{ number_format($booking->total_price, 2) }}';
        });
    });

    // Add form validation styles
    const inputs = form.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.checkValidity()) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            }
        });
    });
});
</script>
@endpush
@endsection
