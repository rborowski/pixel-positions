<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify your email</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; line-height: 1.5; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 24px; }
        .logo { margin-bottom: 24px; }
        h1 { font-size: 1.25rem; margin: 0 0 16px; }
        .footer { margin-top: 32px; font-size: 0.75rem; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="{{ config('app.url') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="{{ config('app.name') }}" width="120" />
            </a>
        </div>

        <h1>Verify your email address</h1>
        <p>Hi {{ $userName }},</p>
        <p>Please click the button below to verify your email address and activate your account.</p>

        <p style="margin-top: 24px;">
            <a href="{{ $verificationUrl }}" style="display: inline-block; background: #1544EF; color: white; padding: 12px 24px; text-decoration: none; border-radius: 8px; font-weight: 500;">Verify Email Address</a>
        </p>

        <p style="margin-top: 24px; color: #666; font-size: 0.875rem;">
            If you didn't create an account, you can safely ignore this email.
        </p>

        <div class="footer">
            {{ config('app.name') }} · {{ config('app.url') }}
        </div>
    </div>
</body>
</html>