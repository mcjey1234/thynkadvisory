@extends('layouts.public')

@section('title', 'Daily Digest')
@section('body_class', 'page-daily-digest')

@section('content')

<!-- ============================================ -->
<!-- DAILY DIGEST HERO -->
<!-- ============================================ -->
<section class="dd-hero">
    <div class="dd-hero-overlay"></div>
    <div class="dd-container">
        <div class="dd-hero-content">
            <span class="dd-hero-badge">Daily Digest</span>
            <h1 class="dd-hero-title">Your Daily <span class="dd-text-neon">Learning Brief</span></h1>
            <p class="dd-hero-subtitle">Curated insights on instructional design, gamification, and eLearning — delivered fresh every day.</p>
            <div class="dd-hero-date">{{ $today->format('l, F j, Y') }}</div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- DAILY DIGEST CONTENT -->
<!-- ============================================ -->
<section class="dd-content">
    <div class="dd-container">
        <div class="dd-grid">
            <!-- Main Content -->
            <div class="dd-main">
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                    <article class="dd-card">
                        <div class="dd-card-meta">
                            <span class="dd-card-category">{{ ucfirst($post->type) }}</span>
                            <span class="dd-card-date">{{ $post->post_date->format('F j, Y') }}</span>
                        </div>
                        <h3 class="dd-card-title">{{ $post->title }}</h3>
                        <p class="dd-card-text">{{ $post->content }}</p>
                        @if($post->image)
                        <figure class="dd-card-figure">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        </figure>
                        @endif
                        <div class="dd-card-divider"></div>
                    </article>
                    @endforeach
                @else
                    <div class="dd-empty">
                        <span class="dd-empty-icon">—</span>
                        <h3>No posts for today</h3>
                        <p>Check back tomorrow for fresh insights.</p>
                        <a href="{{ route('daily.digest', ['date' => now()->subDay()->format('Y-m-d')]) }}" class="dd-btn dd-btn-outline">View Previous</a>
                    </div>
                @endif
            </div>
            
            <!-- Sidebar -->
            <aside class="dd-sidebar">
                <!-- Tip of the Day -->
                @if($tipOfTheDay)
                <div class="dd-widget dd-widget-highlight">
                    <h4 class="dd-widget-title">Tip of the Day</h4>
                    <blockquote class="dd-widget-blockquote">
                        <p>{{ $tipOfTheDay->content }}</p>
                        <cite>— {{ $tipOfTheDay->title }}</cite>
                    </blockquote>
                </div>
                @endif
                
                <!-- Recent Posts -->
                <div class="dd-widget">
                    <h4 class="dd-widget-title">Recent Posts</h4>
                    <ul class="dd-recent-list">
                        @foreach($recentPosts as $post)
                        <li>
                            <a href="{{ route('daily.digest.show', $post->post_date->format('Y-m-d')) }}">
                                <span class="dd-recent-title">{{ $post->title }}</span>
                                <span class="dd-recent-date">{{ $post->post_date->format('M d') }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
                <!-- Archive -->
                <div class="dd-widget">
                    <h4 class="dd-widget-title">Archive</h4>
                    <ul class="dd-archive-list">
                        @foreach($archiveDates as $date)
                        <li>
                            <a href="{{ route('daily.digest.show', $date->format('Y-m-d')) }}">
                                {{ $date->format('F j, Y') }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — THYNK Advisory Theme -->
<!-- ============================================ -->
<style>
    .dd-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    
    .dd-text-neon {
        color: #39FF14;
    }
    
    /* ---- Hero ---- */
    .dd-hero {
        position: relative;
        padding: 80px 0 60px;
        background: #0F172A;
        border-bottom: 1px solid rgba(57,255,20,0.04);
    }
    
    .dd-hero-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse at 50% 50%, rgba(57,255,20,0.02) 0%, transparent 70%);
    }
    
    .dd-hero-content {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 700px;
        margin: 0 auto;
    }
    
    .dd-hero-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #39FF14;
        background: rgba(57,255,20,0.06);
        padding: 4px 20px;
        border-radius: 20px;
        margin-bottom: 16px;
        border: 1px solid rgba(57,255,20,0.04);
    }
    
    .dd-hero-title {
        font-size: 44px;
        font-weight: 700;
        color: #FFFFFF;
        margin: 0 0 12px 0;
        font-family: 'Cabin', sans-serif;
        letter-spacing: -0.5px;
        line-height: 1.15;
    }
    
    .dd-hero-subtitle {
        font-size: 17px;
        color: rgba(255,255,255,0.35);
        line-height: 1.7;
        margin: 0 0 20px 0;
        font-weight: 300;
    }
    
    .dd-hero-date {
        display: inline-block;
        font-size: 13px;
        color: rgba(255,255,255,0.15);
        padding-top: 16px;
        border-top: 1px solid rgba(255,255,255,0.03);
        font-weight: 300;
        letter-spacing: 0.5px;
    }
    
    /* ---- Content ---- */
    .dd-content {
        padding: 60px 0 80px;
        background: #F8FAFC;
    }
    
    .dd-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 48px;
        align-items: start;
    }
    
    /* ---- Cards ---- */
    .dd-card {
        background: #FFFFFF;
        border-radius: 12px;
        padding: 32px 36px;
        margin-bottom: 24px;
        border: 1px solid rgba(0,0,0,0.02);
        box-shadow: 0 1px 8px rgba(0,0,0,0.01);
        transition: box-shadow 0.3s ease;
        position: relative;
    }
    
    .dd-card:hover {
        box-shadow: 0 4px 24px rgba(57,255,20,0.03);
        border-color: rgba(57,255,20,0.04);
    }
    
    .dd-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, #39FF14, transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        border-radius: 0 0 12px 12px;
    }
    
    .dd-card:hover::after {
        opacity: 0.2;
    }
    
    .dd-card-meta {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-bottom: 8px;
    }
    
    .dd-card-category {
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #39FF14;
        background: rgba(57,255,20,0.04);
        padding: 2px 14px;
        border-radius: 12px;
        border: 1px solid rgba(57,255,20,0.04);
    }
    
    .dd-card-date {
        font-size: 12px;
        color: #94A3B8;
        font-weight: 300;
    }
    
    .dd-card-title {
        font-size: 20px;
        font-weight: 600;
        color: #0F172A;
        margin: 0 0 8px 0;
        font-family: 'Cabin', sans-serif;
        letter-spacing: -0.3px;
    }
    
    .dd-card-text {
        font-size: 15px;
        color: #475569;
        line-height: 1.8;
        margin: 0;
    }
    
    .dd-card-figure {
        margin: 16px 0 0 0;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .dd-card-figure img {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .dd-card-divider {
        margin-top: 20px;
        border-bottom: 1px solid rgba(0,0,0,0.02);
    }
    
    /* ---- Empty State ---- */
    .dd-empty {
        text-align: center;
        padding: 60px 24px;
        background: #FFFFFF;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.02);
    }
    
    .dd-empty-icon {
        font-size: 40px;
        color: #CBD5E1;
        display: block;
        margin-bottom: 12px;
        font-weight: 100;
    }
    
    .dd-empty h3 {
        font-size: 22px;
        color: #0F172A;
        margin: 0 0 8px 0;
        font-family: 'Cabin', sans-serif;
        font-weight: 600;
    }
    
    .dd-empty p {
        color: #94A3B8;
        margin: 0 0 20px 0;
    }
    
    .dd-btn-outline {
        display: inline-block;
        padding: 10px 32px;
        border: 1px solid #39FF14;
        color: #39FF14;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif;
        background: transparent;
    }
    
    .dd-btn-outline:hover {
        background: #39FF14;
        color: #0F172A;
        box-shadow: 0 4px 20px rgba(57,255,20,0.12);
    }
    
    /* ---- Sidebar ---- */
    .dd-sidebar {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }
    
    .dd-widget {
        background: #FFFFFF;
        border-radius: 12px;
        padding: 24px 28px;
        border: 1px solid rgba(0,0,0,0.02);
        box-shadow: 0 1px 8px rgba(0,0,0,0.01);
    }
    
    .dd-widget-highlight {
        background: linear-gradient(135deg, #F8FAFC, #FFFFFF);
        border-left: 3px solid #39FF14;
    }
    
    .dd-widget-title {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #0F172A;
        margin: 0 0 12px 0;
        font-family: 'Cabin', sans-serif;
    }
    
    .dd-widget-blockquote {
        margin: 0;
    }
    
    .dd-widget-blockquote p {
        font-size: 14px;
        color: #475569;
        line-height: 1.8;
        margin: 0 0 8px 0;
        font-style: italic;
    }
    
    .dd-widget-blockquote cite {
        font-size: 12px;
        color: #94A3B8;
        font-style: normal;
        font-weight: 300;
    }
    
    .dd-recent-list,
    .dd-archive-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .dd-recent-list li,
    .dd-archive-list li {
        padding: 10px 0;
        border-bottom: 1px solid rgba(0,0,0,0.02);
    }
    
    .dd-recent-list li:last-child,
    .dd-archive-list li:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }
    
    .dd-recent-list a,
    .dd-archive-list a {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
        color: #475569;
        font-size: 14px;
        transition: color 0.3s ease;
    }
    
    .dd-recent-list a:hover,
    .dd-archive-list a:hover {
        color: #39FF14;
    }
    
    .dd-recent-date {
        font-size: 12px;
        color: #94A3B8;
        flex-shrink: 0;
        margin-left: 12px;
    }
    
    /* ---- Responsive ---- */
    @media (max-width: 991px) {
        .dd-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }
        .dd-hero-title {
            font-size: 36px;
        }
    }
    
    @media (max-width: 768px) {
        .dd-hero {
            padding: 60px 0 40px;
        }
        .dd-hero-title {
            font-size: 28px;
        }
        .dd-hero-subtitle {
            font-size: 15px;
        }
        .dd-content {
            padding: 40px 0 60px;
        }
        .dd-card {
            padding: 24px 20px;
        }
        .dd-card-title {
            font-size: 18px;
        }
        .dd-card-text {
            font-size: 14px;
        }
        .dd-widget {
            padding: 20px;
        }
    }
    
    @media (max-width: 480px) {
        .dd-container {
            padding: 0 16px;
        }
        .dd-hero-title {
            font-size: 24px;
        }
        .dd-hero-subtitle {
            font-size: 14px;
        }
        .dd-card {
            padding: 20px 16px;
        }
        .dd-card-title {
            font-size: 16px;
        }
    }
</style>

@endsection