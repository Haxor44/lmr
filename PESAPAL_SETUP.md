# Pesapal Payment Integration Setup Guide

## Overview
Your MatFam2 booking system now includes complete Pesapal payment integration with automatic room cleanup functionality.

## Features Implemented ✅

### 1. **Payment Processing**
- Full Pesapal API v3 integration
- Support for M-Pesa, Airtel Money, Visa, Mastercard
- Secure payment form with billing information
- Real-time payment status tracking
- Automatic booking confirmation on payment

### 2. **Database Enhancements**
- Enhanced Payment model with comprehensive tracking
- Booking-Payment relationships
- Refund management system
- Payment status history

### 3. **Automatic Room Management**
- Daily cleanup at midnight (existing feature)
- Expired booking cleanup every 5 minutes
- Smart room availability updates
- Conflict detection and prevention

### 4. **Error Handling & Security**
- Custom exception classes
- Comprehensive logging
- Input validation
- CSRF protection
- Transaction safety with database locks

## Setup Instructions

### 1. **Configure Environment Variables**
Add these variables to your `.env` file:

```bash
# Pesapal Configuration
PESAPAL_ENV=sandbox                    # Use 'live' for production
PESAPAL_CONSUMER_KEY=your_consumer_key_here
PESAPAL_CONSUMER_SECRET=your_consumer_secret_here
PESAPAL_IPN_ID=                        # Will be populated after IPN registration
PESAPAL_CURRENCY=KES
PESAPAL_LANGUAGE=EN
```

### 2. **Get Pesapal Credentials**
1. **Sandbox (Testing):**
   - Visit: https://developer.pesapal.com/
   - Create a developer account
   - Get your Consumer Key and Consumer Secret

2. **Production:**
   - Contact Pesapal for business account setup
   - Get live credentials

### 3. **Register IPN URLs**
Run the command to register your IPN URL with Pesapal:

```bash
# Check existing registrations
php artisan pesapal:register-ipn --check

# Register new IPN URL
php artisan pesapal:register-ipn
```

After successful registration, add the returned IPN ID to your `.env` file:
```bash
PESAPAL_IPN_ID=your_ipn_id_here
```

### 4. **Database Migration**
The payments table has been enhanced. If not already done:

```bash
php artisan migrate
```

### 5. **Test the Integration**

#### Testing Payment Flow:
1. Create a booking (existing functionality)
2. Navigate to the booking details page
3. Click "Complete Payment" button
4. Fill in the payment form
5. Complete payment on Pesapal gateway
6. Verify booking confirmation

#### Testing Callbacks:
- Payments will automatically confirm bookings
- Check logs in `storage/logs/laravel.log`
- Monitor payment status in the database

## File Structure

### New/Modified Files:
```
app/
├── Console/Commands/RegisterPesapalIPN.php     # IPN registration command
├── Exceptions/
│   ├── BookingException.php                    # Booking-specific exceptions
│   └── PaymentException.php                    # Payment-specific exceptions
├── Http/Controllers/PesapalPaymentController.php # Payment handling
├── Services/PaymentService.php                 # Enhanced payment service
└── Models/Payment.php                          # Enhanced payment model

config/pesapal.php                              # Pesapal configuration
database/migrations/..._update_payments_table_for_pesapal.php
resources/views/payments/show.blade.php         # Payment form
routes/web.php                                  # Updated routes
```

## API Routes

### Payment Routes:
- `GET /payments/{booking}/show` - Payment form
- `POST /payments/{booking}/initiate` - Initialize payment
- `GET /payments/callback` - Payment callback handler
- `POST /payments/ipn` - IPN handler
- `GET /payments/status/{orderTrackingId}` - Check status
- `POST /payments/{payment}/refund` - Request refund
- `GET /payments/history` - Payment history

## Security Notes

### 1. **Environment Security**
- Never commit `.env` file to version control
- Use different credentials for sandbox/production
- Regularly rotate API credentials

### 2. **Payment Security**
- All payment data is encrypted in transit
- No sensitive card data is stored locally
- CSRF protection on all forms
- Input validation on all endpoints

### 3. **Database Security**
- Foreign key constraints maintain data integrity
- Transaction locks prevent race conditions
- Proper indexing for performance

## Monitoring & Debugging

### 1. **Logs**
Check these files for payment-related logs:
- `storage/logs/laravel.log` - Application logs
- Payment errors, callback processing, etc.

### 2. **Database**
Monitor these tables:
- `payments` - Payment records
- `bookings` - Booking status updates
- `rooms` - Availability changes

### 3. **Pesapal Dashboard**
- Monitor transactions in Pesapal dashboard
- Check callback delivery status
- View payment method analytics

## Troubleshooting

### Common Issues:

#### 1. **IPN Not Working**
- Verify IPN URL is publicly accessible
- Check if PESAPAL_IPN_ID is set correctly
- Review IPN logs in application logs

#### 2. **Payment Not Confirming**
- Check callback URL accessibility
- Verify transaction status in Pesapal dashboard
- Review payment service logs

#### 3. **Room Not Updating**
- Check scheduled task is running: `php artisan schedule:run`
- Verify booking status transitions
- Check room availability logic

### 4. **API Errors**
- Verify credentials are correct
- Check API environment (sandbox vs live)
- Review Pesapal API documentation

## Scheduled Tasks

Make sure your cron job is set up for Laravel scheduler:

```bash
# Add to crontab
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

Current scheduled tasks:
- **Daily 00:01**: Update room availability, mark completed bookings
- **Every 5 minutes**: Clean up expired pending bookings

## Production Deployment

### 1. **Before Going Live:**
- [ ] Update environment to `PESAPAL_ENV=live`
- [ ] Replace sandbox credentials with production credentials
- [ ] Re-register IPN URLs for production
- [ ] Test end-to-end payment flow
- [ ] Set up monitoring and alerting
- [ ] Configure backup procedures

### 2. **SSL Certificate**
- Ensure your domain has a valid SSL certificate
- Pesapal requires HTTPS for all callback URLs

### 3. **Performance**
- Monitor payment processing times
- Set up database query optimization
- Consider caching for frequently accessed data

## Support

For Pesapal-specific issues:
- Pesapal Developer Support: https://developer.pesapal.com/
- Pesapal Business Support: support@pesapal.com

For implementation issues:
- Review application logs
- Check Laravel documentation
- Consult the Laravel community

---

**Your booking system is now fully equipped with:**
✅ Pesapal payment processing  
✅ Automatic room cleanup  
✅ Comprehensive error handling  
✅ Payment tracking and history  
✅ Refund management  
✅ Real-time status updates  

The system is production-ready pending your Pesapal credentials configuration!
