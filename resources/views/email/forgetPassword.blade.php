<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h2>Password Reset Link</h2>
    <p>
        You have requested a password reset. Click the link below to reset your password:
    </p>
    <a href="{{ url('ChangePassword/' . $token) }}">Reset Password</a>
    <p>
        If you did not request a password reset, please ignore this email.
    </p>
</body>
</html>