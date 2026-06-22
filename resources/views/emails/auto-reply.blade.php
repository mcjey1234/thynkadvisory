<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You for Contacting Sofel Labs</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; color: #333; line-height: 1.6; background: #f5f5f5; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .header { background: linear-gradient(135deg, #0E2A47, #1a3a5f); color: #ffffff; padding: 30px 40px; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 700; }
        .header p { margin: 5px 0 0; opacity: 0.7; font-size: 14px; }
        .content { padding: 30px 40px; }
        .greeting { font-size: 18px; margin-bottom: 20px; color: #0E2A47; }
        .ai-response { background: #F8FAFB; padding: 20px 24px; border-radius: 12px; border-left: 4px solid #47C89F; margin: 20px 0; white-space: pre-wrap; font-size: 15px; line-height: 1.7; color: #2d3748; }
        .btn { display: inline-block; padding: 12px 30px; background: #47C89F; color: #fff; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 15px; transition: all 0.3s ease; margin: 10px 0; }
        .btn:hover { background: #3AAF8A; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(71, 200, 159, 0.15); }
        .footer { background: #F8FAFB; padding: 20px 40px; text-align: center; color: #999; font-size: 13px; border-top: 1px solid #e9ecef; }
        .signature { margin-top: 20px; }
        .badge { display: inline-block; background: rgba(71, 200, 159, 0.08); color: #47C89F; padding: 2px 12px; border-radius: 12px; font-size: 12px; font-weight: 600; }
        .divider { border: none; border-top: 1px solid #e9ecef; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📬 Thank You for Contacting Us</h1>
            <p>We appreciate your interest in Sofel Labs</p>
        </div>

        <div class="content">
            <div class="greeting">
                Dear <strong>{{ $name }}</strong>,
            </div>

            <p>Thank you for reaching out to Sofel Labs. We appreciate your interest in our services.</p>

            <div class="ai-response">
                {!! nl2br(e($aiReply)) !!}
            </div>

            <div style="text-align: center;">
                <a href="https://calendly.com/mwangikamau/consultation" class="btn">
                    📅 Schedule a Free Consultation
                </a>
            </div>

            <hr class="divider">

            <div style="font-size: 14px; color: #6B7C93;">
                <p style="margin: 0;"><strong>Need immediate help?</strong></p>
                <p style="margin: 5px 0;">Reply to this email or call us at <a href="tel:+254700000000" style="color: #47C89F;">+254 700 000 000</a></p>
            </div>

            <div class="signature">
                <p style="margin: 0;"><strong>Best regards,</strong></p>
                <p style="margin: 0; color: #47C89F; font-weight: 600;">Sofel Labs Team</p>
                <p style="margin: 0; font-size: 13px; color: #6B7C93;">Transforming Learning Through Innovation</p>
            </div>

            <div style="margin-top: 10px;">
                <span class="badge">✨ AI-Powered Response</span>
            </div>
        </div>

        <div class="footer">
            <p style="margin: 0;">This is an automated response from Sofel Labs.</p>
            <p style="margin: 5px 0 0;">© {{ date('Y') }} Sofel Labs. All rights reserved.</p>
        </div>
    </div>
</body>
</html>