<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details - Sofel Labs</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; padding: 40px; color: #333; }
        .header { border-bottom: 2px solid #47C89F; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { font-size: 28px; color: #0E2A47; }
        .header p { color: #666; margin-top: 5px; }
        .details { max-width: 700px; margin: 0 auto; }
        .row { display: flex; padding: 10px 0; border-bottom: 1px solid #eee; }
        .label { font-weight: 600; width: 150px; color: #0E2A47; flex-shrink: 0; }
        .value { flex: 1; }
        .message-box { background: #f8f9fa; padding: 15px; border-radius: 8px; border-left: 4px solid #47C89F; margin-top: 10px; white-space: pre-wrap; }
        .status-badge { display: inline-block; padding: 3px 14px; border-radius: 12px; font-weight: bold; }
        .status-unread { background: #fee; color: #dc3545; }
        .status-read { background: #fff3cd; color: #ffc107; }
        .status-replied { background: #d4edda; color: #28a745; }
        .footer { text-align: center; margin-top: 40px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #999; }
        .no-print { margin-top: 20px; text-align: center; }
        @media print {
            .no-print { display: none; }
            body { padding: 20px; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📄 Contact Details</h1>
        <p>Submitted on {{ $contact->created_at->format('M d, Y h:i A') }}</p>
    </div>

    <div class="details">
        <div class="row">
            <span class="label">Name:</span>
            <span class="value"><strong>{{ $contact->name }}</strong></span>
        </div>
        <div class="row">
            <span class="label">Email:</span>
            <span class="value">{{ $contact->email }}</span>
        </div>
        <div class="row">
            <span class="label">Phone:</span>
            <span class="value">{{ $contact->phone ?? 'N/A' }}</span>
        </div>
        <div class="row">
            <span class="label">Subject:</span>
            <span class="value"><strong>{{ $contact->subject }}</strong></span>
        </div>
        <div class="row">
            <span class="label">Status:</span>
            <span class="value">
                <span class="status-badge status-{{ $contact->status }}">
                    {{ ucfirst($contact->status) }}
                </span>
            </span>
        </div>
        <div class="row">
            <span class="label">IP Address:</span>
            <span class="value">{{ $contact->ip_address ?? 'N/A' }}</span>
        </div>
        <div class="row" style="border-bottom: none;">
            <span class="label">Message:</span>
        </div>
        <div class="message-box">{{ $contact->message }}</div>
    </div>

    <div class="footer">
        <p>This document was generated from the Sofel Labs Admin Panel.</p>
        <p>© {{ date('Y') }} Sofel Labs. All rights reserved.</p>
    </div>

    <div class="no-print">
        <button onclick="window.print()" style="padding: 10px 30px; background: #47C89F; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-size: 16px;">
            🖨️ Print / Save as PDF
        </button>
        <a href="{{ route('filament.admin.resources.contacts.view', $contact) }}" style="display: inline-block; margin-left: 10px; padding: 10px 30px; background: #6c757d; color: #fff; text-decoration: none; border-radius: 6px;">
            ← Back
        </a>
    </div>
</body>
</html>