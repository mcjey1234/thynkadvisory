<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .header {
            background: linear-gradient(135deg, #0E2A47, #1a3a5f);
            color: #ffffff;
            padding: 30px 40px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .header p {
            margin: 5px 0 0;
            opacity: 0.7;
            font-size: 14px;
        }
        .content {
            padding: 30px 40px;
        }
        .field {
            margin-bottom: 20px;
        }
        .field-label {
            font-weight: 600;
            color: #0E2A47;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: block;
            margin-bottom: 5px;
        }
        .field-value {
            background: #F8FAFB;
            padding: 12px 16px;
            border-radius: 8px;
            color: #333;
            font-size: 15px;
            border-left: 3px solid #47C89F;
        }
        .field-value.message {
            white-space: pre-wrap;
            min-height: 80px;
        }
        .badge {
            display: inline-block;
            background: #47C89F;
            color: #fff;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 12px;
        }
        .footer {
            background: #F8FAFB;
            padding: 20px 40px;
            text-align: center;
            color: #999;
            font-size: 13px;
            border-top: 1px solid #e9ecef;
        }
        .footer a {
            color: #47C89F;
            text-decoration: none;
        }
        .divider {
            border: none;
            border-top: 1px solid #e9ecef;
            margin: 20px 0;
        }
        .contact-info {
            background: #f8f9fa;
            padding: 15px 20px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .contact-info p {
            margin: 4px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📬 New Contact Message</h1>
            <p>You have received a new message from your website contact form.</p>
        </div>

        <div class="content">
            <div class="field">
                <span class="field-label">Name</span>
                <div class="field-value">{{ $name }}</div>
            </div>

            <div class="field">
                <span class="field-label">Email Address</span>
                <div class="field-value">
                    <a href="mailto:{{ $email }}" style="color: #47C89F; text-decoration: none;">{{ $email }}</a>
                </div>
            </div>

            @if(!empty($phone))
            <div class="field">
                <span class="field-label">Phone Number</span>
                <div class="field-value">
                    <a href="tel:{{ $phone }}" style="color: #47C89F; text-decoration: none;">{{ $phone }}</a>
                </div>
            </div>
            @endif

            <div class="field">
                <span class="field-label">Subject</span>
                <div class="field-value">
                    <span class="badge">{{ $subject }}</span>
                </div>
            </div>

            <div class="field">
                <span class="field-label">Message</span>
                <div class="field-value message">{{ $messageContent }}</div>
            </div>

            <hr class="divider">

            <div class="contact-info">
                <p><strong>From:</strong> {{ $name }}</p>
                <p><strong>Reply to:</strong> <a href="mailto:{{ $email }}" style="color: #47C89F;">{{ $email }}</a></p>
                @if(!empty($phone))
                <p><strong>Phone:</strong> <a href="tel:{{ $phone }}" style="color: #47C89F;">{{ $phone }}</a></p>
                @endif
            </div>
        </div>

        <div class="footer">
            <p style="margin: 0;">This message was sent from the Sofel Labs website contact form.</p>
            <p style="margin: 5px 0 0;">© {{ date('Y') }} Sofel Labs. All rights reserved.</p>
            <p style="margin: 5px 0 0; font-size: 12px;">
                <a href="mailto:{{ $email }}" style="color: #47C89F;">Reply to {{ $name }}</a>
            </p>
        </div>
    </div>
</body>
</html>