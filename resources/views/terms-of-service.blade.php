@extends('layouts.public')

@section('title', $termsOfService->title ?? 'Terms of Service - THYNK Advisory')

@section('content')
<section style="padding:80px 0; background:#F8FAFC;">
    <div style="max-width:900px; margin:0 auto; padding:0 24px;">
        @if($termsOfService)
            <h1 style="font-size:36px; font-weight:700; color:#0F172A; margin-bottom:8px; font-family:'Gill Sans Nova',sans-serif;">
                {{ $termsOfService->title }}
            </h1>
            
            @if($termsOfService->subtitle)
                <p style="font-size:18px; color:#40BAC8; margin-bottom:16px; font-family:'Gill Sans Nova',sans-serif;">
                    {{ $termsOfService->subtitle }}
                </p>
            @endif
            
            <div style="display:flex; gap:20px; margin-bottom:30px; flex-wrap:wrap; color:#64748B; font-size:14px; font-family:'Gill Sans Nova',sans-serif;">
                @if($termsOfService->effective_date)
                    <span>📅 Effective: {{ \Carbon\Carbon::parse($termsOfService->effective_date)->format('F d, Y') }}</span>
                @endif
                <span> Version: {{ $termsOfService->version }}</span>
            </div>
            
            <div style="color:#4B5563; font-size:16px; line-height:1.8; font-family:'Gill Sans Nova',sans-serif;">
                {!! $termsOfService->content !!}
            </div>
            
        @else
            <p style="color:#4B5563; font-size:16px; line-height:1.8; font-family:'Gill Sans Nova',sans-serif;">
                No terms of service are currently available. Please check back later.
            </p>
        @endif
        
        <div style="margin-top:40px; padding-top:20px; border-top:1px solid #E2E8F0;">
            <p style="color:#94A3B8; font-size:14px; font-family:'Gill Sans Nova',sans-serif;">
                For any questions about these terms, please contact us at:
                <br>
                <a href="mailto:info@thinkadvisory.co.ke" style="color:#39FF14; text-decoration:none; font-weight:500;">
                    info@thinkadvisory.co.ke
                </a>
            </p>
        </div>
    </div>
</section>
@endsection
