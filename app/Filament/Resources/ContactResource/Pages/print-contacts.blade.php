<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts List - Sofel Labs</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; padding: 40px; color: #333; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #47C89F; padding-bottom: 20px; }
        .header h1 { font-size: 28px; color: #0E2A47; }
        .header p { color: #666; margin-top: 5px; }
        .stats { display: flex; justify-content: center; gap: 30px; margin-bottom: 30px; }
        .stat { text-align: center; }
        .stat-number { font-size: 24px; font-weight: bold; color: #47C89F; }
        .stat-label { font-size: 14px; color: #666; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #0E2A47; color: #fff; padding: 10px 12px; text-align: left; font-size: 13px; }
        td { padding: 8px 12px; border-bottom: 1px solid #eee; font-size: 13px; }
        tr:nth-child(even) { background: #f9f9f9; }
        .status-badge { display: inline-block; padding: 2px 10px; border-radius: 12px; font-size: 11px; font-weight: bold; }
        .status-unread { background: #fee; color: #dc3545; }
        .status-read { background: #fff3cd; color: #ffc107; }
        .status-replied { background: #d4edda; color: #28a745; }
        .footer { text-align: center; margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #999; }
        .print-only { display: none; }
        @media print {
            .no-print { display: none; }
            .print-only { display: block; }
            body { padding: 20px; }
            th { background: #0E2A47 !important; color: #fff !important; }
            .header { border-bottom-color: #0E2A47 !important; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📋 Contact Submissions</h1>
        <p>Generated on {{ now()->format('M d, Y h:i A') }}</p>
    </div>

    <div class="stats">
        <div class="stat">
            <div class="stat-number">{{ $contacts->count() }}</div>
            <div class="stat-label">Total Submissions</div>
        </div>
        <div class="stat">
            <div class="stat-number">{{ $contacts->where('status', 'unread')->count() }}</div>
            <div class="stat-label">Unread</div>
        </div>
        <div class="stat">
            <div class="stat-number">{{ $contacts->where('status', 'read')->count() }}</div>
            <div class="stat-label">Read</div>
        </div>
        <div class="stat">
            <div class="stat-number">{{ $contacts->where('status', 'replied')->count() }}</div>
            <div class="stat-label">Replied</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Submitted</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>
                    <span class="status-badge status-{{ $contact->status }}">
                        {{ ucfirst($contact->status) }}
                    </span>
                </td>
                <td>{{ $contact->created_at->format('M d, Y h:i A') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>This report was generated from the Sofel Labs Admin Panel.</p>
        <p>© {{ date('Y') }} Sofel Labs. All rights reserved.</p>
    </div>

    <div style="text-align: center; margin-top: 20px;" class="no-print">
        <button onclick="window.print()" style="padding: 10px 30px; background: #47C89F; color: #fff; border: none; border-radius: 6px; cursor: pointer; font-size: 16px;">
            🖨️ Print / Save as PDF
        </button>
        <a href="{{ route('filament.admin.resources.contacts.index') }}" style="display: inline-block; margin-left: 10px; padding: 10px 30px; background: #6c757d; color: #fff; text-decoration: none; border-radius: 6px;">
            ← Back
        </a>
    </div>
</body>
</html>