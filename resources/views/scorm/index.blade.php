@extends('layouts.public')

@section('title', 'SCORM Projects - THYNKADVISORY')
@section('body_class', 'page-scorm-projects')

@section('content')

<section class="scorm-hero">
    <div class="scorm-container">
        <div class="scorm-hero-content">
            <h1>Our <span class="text-neon">SCORM</span> Projects</h1>
            <p>Interactive eLearning courses and training programs we've developed</p>
        </div>
    </div>
</section>

<section class="scorm-grid-section">
    <div class="scorm-container">
        <div class="scorm-grid">
            @forelse($projects as $project)
            <div class="scorm-card">
                @if($project->thumbnail)
                <div class="scorm-card-image">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                </div>
                @else
                <div class="scorm-card-image-placeholder">
                    <span>🎓</span>
                </div>
                @endif
                <div class="scorm-card-content">
                    <span class="scorm-card-badge">{{ $project->industry ?? 'eLearning' }}</span>
                    <h3>{{ $project->title }}</h3>
                    <p>{{ Str::limit($project->description, 100) }}</p>
                    <div class="scorm-card-footer">
                        @if($project->client_name)
                        <span>👤 {{ $project->client_name }}</span>
                        @endif
                        <span>👁️ {{ $project->views }}</span>
                    </div>
                    <a href="{{ route('scorm.show', $project->id) }}" class="scorm-btn">View Project →</a>
                </div>
            </div>
            @empty
            <div class="scorm-empty">
                <span>📚</span>
                <h3>No SCORM projects available</h3>
                <p>Check back soon for new interactive courses.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<style>
    .scorm-container { max-width: 1200px; margin: 0 auto; padding: 0 24px; }
    .text-neon { color: #39FF14; }
    
    .scorm-hero {
        padding: 60px 0 40px;
        background: #0F172A;
        border-bottom: 1px solid rgba(57,255,20,0.04);
    }
    .scorm-hero-content { text-align: center; }
    .scorm-hero-content h1 {
        font-size: 44px;
        font-weight: 700;
        color: #FFFFFF;
        font-family: 'Cabin', sans-serif;
        margin: 0;
    }
    .scorm-hero-content p {
        font-size: 18px;
        color: rgba(255,255,255,0.4);
        margin: 8px 0 0;
    }
    
    .scorm-grid-section { padding: 60px 0 80px; background: #F8FAFC; }
    .scorm-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 32px;
    }
    
    .scorm-card {
        background: #FFFFFF;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 20px rgba(0,0,0,0.02);
        border: 1px solid rgba(0,0,0,0.02);
        transition: all 0.3s ease;
    }
    .scorm-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 40px rgba(57,255,20,0.04);
        border-color: rgba(57,255,20,0.04);
    }
    
    .scorm-card-image { height: 200px; background: #F1F5F9; overflow: hidden; }
    .scorm-card-image img { width: 100%; height: 100%; object-fit: cover; }
    .scorm-card-image-placeholder {
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        background: #F1F5F9;
    }
    
    .scorm-card-content { padding: 20px 24px 24px; }
    .scorm-card-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        color: #39FF14;
        background: rgba(57,255,20,0.04);
        padding: 2px 12px;
        border-radius: 4px;
        margin-bottom: 8px;
    }
    .scorm-card-content h3 {
        font-size: 18px;
        font-weight: 600;
        color: #0F172A;
        margin: 0 0 8px;
        font-family: 'Cabin', sans-serif;
    }
    .scorm-card-content p {
        font-size: 14px;
        color: #64748B;
        line-height: 1.6;
        margin: 0 0 12px;
    }
    .scorm-card-footer {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #94A3B8;
        margin-bottom: 12px;
    }
    .scorm-btn {
        display: inline-block;
        padding: 8px 20px;
        background: #39FF14;
        color: #0F172A;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .scorm-btn:hover { background: #2DE010; }
    
    .scorm-empty {
        text-align: center;
        padding: 60px;
        background: #FFFFFF;
        border-radius: 12px;
    }
    .scorm-empty span { font-size: 48px; display: block; margin-bottom: 16px; }
    .scorm-empty h3 { color: #0F172A; margin: 0 0 8px; }
    .scorm-empty p { color: #94A3B8; margin: 0; }
    
    @media (max-width: 768px) {
        .scorm-hero-content h1 { font-size: 32px; }
        .scorm-grid { grid-template-columns: 1fr; }
    }
</style>

@endsection
