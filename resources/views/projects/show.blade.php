@extends('layouts.public')

@section('title', $project->title . ' - THYNKADVISORY')
@section('body_class', 'page-project-detail')

@section('content')

<section class="project-detail">
    <div class="project-container">
        <div class="project-detail-content">
            <div class="project-detail-header">
                <a href="{{ route('projects.index') }}" class="project-back">← Back to Projects</a>
                <div class="project-detail-meta">
                    <span class="project-detail-category">{{ $project->category_label }}</span>
                    @if($project->client_name)
                    <span class="project-detail-client">👤 {{ $project->client_name }}</span>
                    @endif
                    <span class="project-detail-views">👁️ {{ $project->views }} views</span>
                </div>
                <h1>{{ $project->title }}</h1>
                <p>{{ $project->description }}</p>
                
                @if($project->url || $project->github_url || $project->playstore_url || $project->appstore_url)
                <div class="project-detail-links">
                    @if($project->url)
                    <a href="{{ $project->url }}" target="_blank" class="project-detail-link">🌐 Visit Website</a>
                    @endif
                    @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" class="project-detail-link">🐙 GitHub</a>
                    @endif
                    @if($project->playstore_url)
                    <a href="{{ $project->playstore_url }}" target="_blank" class="project-detail-link">📱 Play Store</a>
                    @endif
                    @if($project->appstore_url)
                    <a href="{{ $project->appstore_url }}" target="_blank" class="project-detail-link">🍎 App Store</a>
                    @endif
                </div>
                @endif
            </div>
            
            @if($project->thumbnail)
            <div class="project-detail-image">
                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
            </div>
            @endif
        </div>
    </div>
</section>

@if($related->count() > 0)
<section class="project-related">
    <div class="project-container">
        <h2>Related Projects</h2>
        <div class="project-related-grid">
            @foreach($related as $item)
            <div class="project-related-card">
                <h3>{{ $item->title }}</h3>
                <p>{{ Str::limit($item->description, 80) }}</p>
                <a href="{{ route('projects.show', $item->id) }}" class="project-related-btn">View →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
    .project-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
    .project-detail {
        padding: 40px 0 60px;
        background: #F8FAFC;
    }
    .project-detail-content {
        background: #FFFFFF;
        border-radius: 16px;
        padding: 40px 48px;
        border: 1px solid rgba(0,0,0,0.02);
        box-shadow: 0 2px 20px rgba(0,0,0,0.02);
    }
    .project-back {
        display: inline-block;
        color: #39FF14;
        text-decoration: none;
        margin-bottom: 16px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    .project-back:hover {
        color: #2DE010;
        transform: translateX(-4px);
    }
    .project-detail-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 12px;
        font-size: 14px;
        color: #94A3B8;
    }
    .project-detail-category {
        background: rgba(57,255,20,0.04);
        color: #39FF14;
        padding: 2px 12px;
        border-radius: 4px;
        font-weight: 500;
        font-size: 12px;
    }
    .project-detail-content h1 {
        font-size: 36px;
        font-weight: 700;
        color: #0F172A;
        margin: 0 0 8px;
        font-family: 'Cabin', sans-serif;
    }
    .project-detail-content p {
        font-size: 16px;
        color: #64748B;
        line-height: 1.8;
        margin: 0 0 20px;
    }
    .project-detail-links {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 16px;
    }
    .project-detail-link {
        display: inline-block;
        padding: 8px 20px;
        background: #0F172A;
        color: #FFFFFF;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .project-detail-link:hover {
        background: #39FF14;
        color: #0F172A;
        transform: translateY(-2px);
    }
    .project-detail-image {
        margin-top: 16px;
        border-radius: 12px;
        overflow: hidden;
    }
    .project-detail-image img {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .project-related {
        padding: 60px 0 80px;
        background: #FFFFFF;
    }
    .project-related h2 {
        font-size: 28px;
        font-weight: 600;
        color: #0F172A;
        margin: 0 0 24px;
        font-family: 'Cabin', sans-serif;
    }
    .project-related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 20px;
    }
    .project-related-card {
        background: #F8FAFC;
        border-radius: 12px;
        padding: 20px 24px;
        border: 1px solid rgba(0,0,0,0.02);
        transition: all 0.3s ease;
    }
    .project-related-card:hover {
        border-color: rgba(57,255,20,0.04);
        transform: translateY(-2px);
    }
    .project-related-card h3 {
        font-size: 16px;
        font-weight: 600;
        color: #0F172A;
        margin: 0 0 4px;
    }
    .project-related-card p {
        font-size: 13px;
        color: #64748B;
        line-height: 1.5;
        margin: 0 0 12px;
    }
    .project-related-btn {
        color: #39FF14;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    .project-related-btn:hover {
        color: #2DE010;
        transform: translateX(4px);
    }
    
    @media (max-width: 768px) {
        .project-detail-content {
            padding: 24px 20px;
        }
        .project-detail-content h1 {
            font-size: 28px;
        }
        .project-detail-meta {
            gap: 12px;
            font-size: 13px;
        }
        .project-related-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@endsection
