<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; line-height: 1.5; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 24px; }
        .logo { margin-bottom: 24px; }
        h1 { font-size: 1.25rem; margin: 0 0 16px; }
        .meta { color: #666; font-size: 0.875rem; margin-bottom: 16px; }
        .description { white-space: pre-wrap; background: #f5f5f5; padding: 16px; border-radius: 8px; }
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

        <h1>Your job listing has been published</h1>
        <p>Hi {{ $job->employer->user->name }},</p>
        <p>Your job <strong>{{ $job->title }}</strong> is now live on {{ config('app.name') }}.</p>

        <div class="meta">
            {{ $job->location }} · {{ $job->salary->formatted() }} · {{ $job->schedule->value }}
        </div>

        <div class="description">{{ Str::limit($job->description, 500) }}</div>

        <p style="margin-top: 24px;">
            <a href="{{'/jobs/'. $job->id }}" style="color: #1544EF;">View listing →</a>
        </p>

        <div class="footer">
            {{ config('app.name') }} · {{ config('app.url') }}
        </div>
    </div>
</body>
</html>
