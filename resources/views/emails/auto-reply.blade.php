<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to THYNKADVISORY</title>
    <style>
        body { 
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif; 
            color: #FFFFFF; 
            line-height: 1.6; 
            background: #0A0A0A; 
            margin: 0; 
            padding: 20px; 
        }
        .container { 
            max-width: 600px; 
            margin: 0 auto; 
            background: #0F172A; 
            border-radius: 16px; 
            overflow: hidden; 
            box-shadow: 0 8px 60px rgba(0,0,0,0.3);
            border: 1px solid rgba(57, 255, 20, 0.04); 
        }
        .header { 
            background: linear-gradient(135deg, #0A0A0A, #0F172A); 
            padding: 40px 40px 24px; 
            border-bottom: 1px solid rgba(57, 255, 20, 0.04); 
            text-align: center;
        }
        .header-logo { 
            font-size: 32px; 
            font-weight: 800; 
            letter-spacing: 4px; 
            margin: 0; 
            color: #FFFFFF;
        }
        .header-logo span { color: #39FF14; }
        .header-badge { 
            display: inline-block; 
            background: rgba(57, 255, 20, 0.04); 
            color: #39FF14; 
            padding: 4px 16px; 
            border-radius: 20px; 
            font-size: 11px; 
            font-weight: 600; 
            letter-spacing: 2px; 
            text-transform: uppercase;
            border: 1px solid rgba(57, 255, 20, 0.04);
            margin-top: 8px;
        }
        .header-subtitle { 
            margin: 8px 0 0; 
            opacity: 0.3; 
            font-size: 13px; 
            letter-spacing: 3px; 
            text-transform: uppercase; 
        }
        .content { 
            padding: 32px 40px 40px; 
            background: #0F172A; 
        }
        .greeting { 
            font-size: 20px; 
            margin-bottom: 16px; 
            color: #FFFFFF; 
            font-weight: 400;
        }
        .greeting strong { 
            color: #39FF14; 
            font-weight: 600;
        }
        .text-muted { 
            color: #94A3B8; 
        }
        .text-white { 
            color: #FFFFFF; 
        }
        .text-neon { 
            color: #39FF14; 
        }
        .subscriber-details { 
            background: rgba(57, 255, 20, 0.02); 
            padding: 20px 24px; 
            border-radius: 12px; 
            border-left: 3px solid #39FF14; 
            margin: 20px 0; 
        }
        .subscriber-details p { 
            margin: 5px 0; 
            font-size: 15px; 
            color: #CBD5E1; 
        }
        .label { 
            font-weight: 600; 
            color: #FFFFFF; 
        }
        .benefits { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 10px; 
            margin: 16px 0 20px; 
        }
        .benefit-item { 
            background: rgba(57, 255, 20, 0.02); 
            padding: 8px 16px; 
            border-radius: 8px; 
            font-size: 13px; 
            color: #94A3B8; 
            border: 1px solid rgba(57, 255, 20, 0.02); 
            transition: all 0.3s ease;
        }
        .benefit-item:hover { 
            background: rgba(57, 255, 20, 0.04); 
            border-color: rgba(57, 255, 20, 0.06);
        }
        .divider { 
            border: none; 
            border-top: 1px solid rgba(255,255,255,0.02); 
            margin: 24px 0; 
        }
        .btn { 
            display: inline-block; 
            padding: 14px 40px; 
            background: #39FF14; 
            color: #0F172A; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: 700; 
            font-size: 15px; 
            transition: all 0.3s ease; 
            margin: 8px 0; 
            box-shadow: 0 4px 24px rgba(57, 255, 20, 0.02); 
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }
        .btn:hover { 
            background: #2DE010; 
            transform: translateY(-2px); 
            box-shadow: 0 8px 40px rgba(57, 255, 20, 0.06); 
        }
        .btn-unsubscribe { 
            display: inline-block; 
            padding: 10px 24px; 
            background: transparent; 
            color: #ED4484; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: 500; 
            font-size: 14px; 
            border: 1px solid rgba(237, 68, 132, 0.06); 
            transition: all 0.3s ease; 
            font-family: 'Inter', 'Segoe UI', Arial, sans-serif;
        }
        .btn-unsubscribe:hover { 
            background: rgba(237, 68, 132, 0.04); 
            border-color: rgba(237, 68, 132, 0.1); 
        }
        .footer { 
            background: rgba(0,0,0,0.1); 
            padding: 24px 40px; 
            text-align: center; 
            color: #64748B; 
            font-size: 13px; 
            border-top: 1px solid rgba(57, 255, 20, 0.02); 
        }
        .footer a { 
            color: #39FF14; 
            text-decoration: none; 
        }
        .footer a:hover { 
            text-decoration: underline; 
        }
        .signature { 
            margin-top: 20px; 
            text-align: center; 
        }
        .brand-name { 
            font-size: 24px; 
            font-weight: 800; 
            letter-spacing: 4px; 
            color: #FFFFFF; 
        }
        .brand-name span { 
            color: #39FF14; 
        }
        .brand-tagline { 
            color: #39FF14; 
            font-weight: 500; 
            font-size: 13px; 
            letter-spacing: 2px; 
            text-transform: uppercase; 
            opacity: 0.6;
            margin-top: 4px;
        }
        .badge { 
            display: inline-block; 
            background: rgba(57, 255, 20, 0.04); 
            color: #39FF14; 
            padding: 2px 14px; 
            border-radius: 12px; 
            font-size: 11px; 
            font-weight: 600; 
            border: 1px solid rgba(57, 255, 20, 0.04); 
        }
        .badge-success { 
            background: rgba(57, 255, 20, 0.04); 
            border-color: rgba(57, 255, 20, 0.04); 
        }
        .footer-links { 
            display: flex; 
            justify-content: center; 
            gap: 20px; 
            flex-wrap: wrap; 
            margin: 8px 0; 
        }
        .footer-links a { 
            color: #64748B; 
            text-decoration: none; 
            font-size: 13px; 
        }
        .footer-links a:hover { 
            color: #39FF14; 
        }
        .footer-divider { 
            color: #1E293B; 
        }
        @media (max-width: 480px) {
            .header { padding: 30px 20px 20px; }
            .content { padding: 24px 20px 28px; }
            .footer { padding: 20px; }
            .header-logo { font-size: 24px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <div class="header-logo">THYNK<span>ADVISORY</span></div>
            <div class="header-badge">✦ Subscription Confirmed</div>
            <div class="header-subtitle">You're now subscribed to our newsletter</div>
        </div>

        <!-- CONTENT -->
        <div class="content">
            <!-- Greeting -->
            <div class="greeting">
                Dear <strong>{{ $name ?? 'Subscriber' }}</strong>,
            </div>

            <p class="text-muted">
                Thank you for subscribing to the THYNKADVISORY newsletter. We're excited to have you on board.
            </p>

            <!-- Subscriber Details -->
            <div class="subscriber-details">
                <p><span class="label">📧 Email:</span> {{ $email }}</p>
                @if(isset($source))
                <p><span class="label">📌 Source:</span> {{ ucfirst($source) }}</p>
                @endif
                <p><span class="label">📅 Subscribed:</span> {{ now()->format('F j, Y') }}</p>
            </div>

            <!-- Benefits -->
            <p class="text-white"><strong>What you'll receive:</strong></p>
            <div class="benefits">
                <span class="benefit-item">🧠 Innovation Insights</span>
                <span class="benefit-item">🎯 Strategic Advisory</span>
                <span class="benefit-item">📊 Market Trends</span>
                <span class="benefit-item">📰 Industry News</span>
                <span class="benefit-item">💡 Expert Perspectives</span>
                <span class="benefit-item">🚀 Growth Strategies</span>
            </div>

            <p class="text-muted" style="font-size: 14px;">
                We'll send you valuable content to help you stay ahead. You can unsubscribe at any time.
            </p>

            <!-- CTA Buttons -->
            <div style="text-align: center;">
                <a href="https://sofellabs.com" class="btn">
                    Explore THYNKADVISORY
                </a>
            </div>

            <div style="text-align: center; margin-top: 12px;">
                <a href="{{ route('unsubscribe', ['email' => $email]) }}" class="btn-unsubscribe">
                    Unsubscribe
                </a>
            </div>

            <hr class="divider">

            <!-- Contact -->
            <div style="font-size: 14px; color: #64748B; text-align: center;">
                <p style="margin: 0;"><strong class="text-white">Have questions?</strong></p>
                <p style="margin: 5px 0;">
                    Reply to this email or contact us at 
                    <a href="mailto:info@sofellabs.com" style="color: #39FF14; text-decoration: none;">info@sofellabs.com</a>
                </p>
            </div>

            <!-- Signature -->
            <div class="signature">
                <div class="brand-name">THYNK<span>ADVISORY</span></div>
                <div class="brand-tagline">Transforming Learning Through Innovation</div>
            </div>

            <div style="text-align: center; margin-top: 12px;">
                <span class="badge badge-success">✓ Subscription Confirmed</span>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <p style="margin: 0; color: #64748B;">
                You're receiving this because you subscribed to the THYNKADVISORY newsletter.
            </p>
            <div class="footer-links">
                <a href="{{ route('unsubscribe', ['email' => $email]) }}">Unsubscribe</a>
                <span class="footer-divider">·</span>
                <a href="https://sofellabs.com">Visit Website</a>
                <span class="footer-divider">·</span>
                <a href="mailto:info@sofellabs.com">Contact Us</a>
            </div>
            <p style="margin: 5px 0 0; opacity: 0.3; font-size: 12px;">
                © {{ date('Y') }} THYNKADVISORY. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>