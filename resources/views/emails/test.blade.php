<!DOCTYPE html>
<html>
<body>
    <h1>Email Test Successful!</h1>
    <p>Your Matfam email configuration is working correctly.</p>
    <p>Mailer used: {{ $mailer ?? 'default' }}</p>
    <p>Sent at: {{ now()->toDateTimeString() }}</p>
</body>
</html>