@extends('layouts.public')

@section('title', $project->title . ' - THYNKADVISORY')
@section('body_class', 'page-scorm-detail')

@section('content')

<section class="scorm-detail">
    <div class="scorm-container">
        <div class="scorm-detail-content">
            <div class="scorm-detail-header">
                <h1>{{ $project->title }}</h1>
                <p>{{ $project->description }}</p>
                <div class="scorm-detail-meta">
                    @if($project->client_name)
                    <span>👤 Client: {{ $project->client_name }}</span>
                    @endif
                    @if($project->industry)
                    <span>🏭 Industry: {{ $project->industry }}</span>
                    @endif
                    <span>👁️ {{ $project->views }} views</span>
                </div>
                <a href="{{ route('scorm.play', $project->id) }}" class="scorm-btn-play">
                    ▶ Launch Course
                </a>
            </div>
        </div>
    </div>
</section>

@if($related->count() > 0)
<section class="scorm-related">
    <div class="scorm-container">
        <h2>Related Projects</h2>
        <div class="scorm-grid">
            @foreach($related as $item)
            <div class="scorm-card">
                <div class="scorm-card-content">
                    <h3>{{ $item->title }}</h3>
                    <a href="{{ route('scorm.show', $item->id) }}" class="scorm-btn">View →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
    .scorm-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
    .scorm-detail { padding: 60px 0; background: #F8FAFC; }
    .scorm-detail-content {
        background: #FFFFFF;
        border-radius: 16px;
        padding: 40px 48px;
        border: 1px solid rgba(0,0,0,0.02);
    }
    .scorm-detail-header h1 {
        font-size: 36px;
        font-weight: 700;
        color: #0F172A;
        font-family: 'Cabin', sans-serif;
        margin: 0 0 8px;
    }
    .scorm-detail-header p {
        font-size: 16px;
        color: #64748B;
        line-height: 1.7;
        margin: 0 0 20px;
    }
    .scorm-detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        font-size: 14px;
        color: #94A3B8;
        margin-bottom: 24px;
    }
    .scorm-btn-play {
        display: inline-block;
        padding: 14px 40px;
        background: #39FF14;
        color: #0F172A;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    .scorm-btn-play:hover {
        background: #2DE010;
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(57,255,20,0.08);
    }
    .scorm-related { padding: 60px 0; background: #FFFFFF; }
    .scorm-related h2 {
        font-size: 28px;
        font-weight: 600;
        color: #0F172A;
        font-family: 'Cabin', sans-serif;
        margin: 0 0 24px;
    }
    .scorm-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 24px;
    }
    .scorm-card {
        background: #F8FAFC;
        border-radius: 12px;
        padding: 20px 24px;
        border: 1px solid rgba(0,0,0,0.02);
        transition: all 0.3s ease;
    }
    .scorm-card:hover { border-color: rgba(57,255,20,0.04); }
    .scorm-card h3 {
        font-size: 16px;
        font-weight: 600;
        color: #0F172A;
        margin: 0 0 12px;
    }
    @media (max-width: 768px) {
        .scorm-detail-content { padding: 24px 20px; }
        .scorm-detail-header h1 { font-size: 28px; }
        .scorm-detail-meta { gap: 12px; font-size: 13px; }
    }
</style>

@endsection
