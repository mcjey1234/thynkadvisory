<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sofel Labs - Service Update</title>
    <style>
        body {
            font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif;
            background-color: #f8fafb;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        .card {
            background: #ffffff;
            border-radius: 16px;
            padding: 40px 36px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.04);
            border: 1px solid rgba(0,0,0,0.02);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 24px;
            border-bottom: 2px solid rgba(71, 200, 159, 0.08);
        }
        .header img {
            max-height: 50px;
            margin-bottom: 16px;
        }
        .badge {
            display: inline-block;
            padding: 4px 18px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: rgba(71, 200, 159, 0.1);
            color: #47C89F;
        }
        .greeting {
            font-size: 20px;
            font-weight: 600;
            color: #0E2A47;
            margin: 12px 0 4px 0;
        }
        .greeting-sub {
            color: #6B7C93;
            font-size: 16px;
            margin: 0;
        }
        .service-title {
            color: #0E2A47;
            font-size: 28px;
            font-weight: 700;
            margin: 20px 0 12px 0;
            line-height: 1.3;
        }
        .service-description {
            color: #4A5A6E;
            font-size: 16px;
            line-height: 1.8;
            margin: 8px 0 24px 0;
            padding: 16px 20px;
            background: #F8FAFB;
            border-radius: 8px;
            border-left: 3px solid #47C89F;
        }
        .service-description p {
            margin: 0;
        }
        .divider {
            border: none;
            height: 1px;
            background: rgba(0,0,0,0.04);
            margin: 24px 0;
        }
        .btn {
            display: inline-block;
            padding: 14px 36px;
            background: #47C89F;
            color: #FFFFFF !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            text-align: center;
        }
        .btn:hover {
            background: #3AAF8A;
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(71, 200, 159, 0.12);
        }
        .btn-secondary {
            display: inline-block;
            padding: 12px 28px;
            background: transparent;
            color: #47C89F !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            border: 2px solid rgba(71, 200, 159, 0.12);
            transition: all 0.3s ease;
        }
        .btn-secondary:hover {
            background: rgba(71, 200, 159, 0.04);
        }
        .footer {
            text-align: center;
            color: #6B7C93;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid rgba(0,0,0,0.04);
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        .footer-links a {
            color: #47C89F;
            text-decoration: none;
            font-size: 14px;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }
        .unsubscribe {
            margin-top: 12px;
            font-size: 13px;
            color: #A0AEC0;
        }
        .unsubscribe a {
            color: #A0AEC0;
            text-decoration: underline;
        }
        .unsubscribe a:hover {
            color: #ED4484;
        }
        @media (max-width: 480px) {
            .card {
                padding: 24px 20px;
            }
            .service-title {
                font-size: 22px;
            }
            .btn {
                width: 100%;
                text-align: center;
            }
            .service-description {
                padding: 12px 16px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <img src="{{ asset('wp-content/uploads/images/logo.jpeg') }}" alt="Sofel Labs" style="max-height: 45px;">
                <br>
                <span class="badge">{{ $action === 'created' ? ' New Service' : '🔄 Service Updated' }}</span>
                <p class="greeting">Hello {{ $subscriber->name ?? 'Subscriber' }}!</p>
                <p class="greeting-sub">
                    We're excited to share a {{ $action === 'created' ? 'new' : 'updated' }} service with you.
                </p>
            </div>

            <h2 class="service-title">{{ $service->title }}</h2>

            <div class="service-description">
    <p>{{ $cleanDescription }}</p>
</div

            <div style="text-align: center; margin: 24px 0;">
                <a href="{{ route('services') }}" class="btn">View All Services →</a>
            </div>

            <div style="text-align: center; margin-top: 16px;">
                <a href="{{ route('contact') }}" class="btn-secondary">💡 Need help? Contact us</a>
            </div>

            <div class="footer">
                <div class="footer-links">
                    <a href="{{ route('services') }}">Explore Services</a>
                    <span>·</span>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <span>·</span>
                    <a href="{{ route('home') }}">Home</a>
                </div>
                <p class="unsubscribe">
                    You're receiving this because you subscribed to Sofel Labs updates.
                    <br>
                    <a href="{{ $unsubscribeLink }}">Unsubscribe</a> at any time.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
