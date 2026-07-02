@extends('layouts.public')

@section('title', 'Projects - THYNKADVISORY')
@section('body_class', 'page-projects')

@section('content')

<!-- ============================================ -->
<!-- PROJECTS HERO -->
<!-- ============================================ -->
<section class="projects-hero">
    <div class="projects-container">
        <div class="projects-hero-content">
            <span class="projects-hero-badge">Our Work</span>
            <h1>Featured <span class="text-neon">Projects</span></h1>
            <p>Explore our portfolio of mobile apps, web applications, design work, and digital solutions</p>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CATEGORY FILTER -->
<!-- ============================================ -->
<section class="projects-filter-section">
    <div class="projects-container">
        <div class="projects-filter">
            <a href="{{ route('projects.index') }}" class="projects-filter-btn {{ !$category ? 'active' : '' }}">All Projects</a>
            @foreach($categories as $cat)
            <a href="{{ route('projects.index', ['category' => $cat['value']]) }}" class="projects-filter-btn {{ $category == $cat['value'] ? 'active' : '' }}">
                {{ $cat['label'] }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- PROJECTS GRID -->
<!-- ============================================ -->
<section class="projects-grid-section">
    <div class="projects-container">
        @if($projects->count() > 0)
        <div class="projects-grid">
            @foreach($projects as $project)
            <div class="project-card" data-category="{{ $project->category }}">
                @if($project->thumbnail)
                <div class="project-card-image">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                    <span class="project-card-badge">{{ $project->category_label }}</span>
                </div>
                @else
                <div class="project-card-image project-card-image-placeholder">
                    <span>{{ $project->category_icon }}</span>
                    <span class="project-card-badge">{{ $project->category_label }}</span>
                </div>
                @endif
                <div class="project-card-content">
                    <h3>{{ $project->title }}</h3>
                    <p>{{ Str::limit($project->description, 100) }}</p>
                    <div class="project-card-footer">
                        @if($project->client_name)
                        <span class="project-client">👤 {{ $project->client_name }}</span>
                        @endif
                        <span class="project-views">👁️ {{ $project->views }}</span>
                    </div>
                    <a href="{{ route('projects.show', $project->id) }}" class="project-btn">View Project →</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="projects-empty">
            <span>📚</span>
            <h3>No projects available</h3>
            <p>Check back soon for new projects.</p>
        </div>
        @endif
    </div>
</section>

<!-- ============================================ -->
<!-- PROJECTS CTA -->
<!-- ============================================ -->
<section class="projects-cta">
    <div class="projects-container">
        <div class="projects-cta-content">
            <h2>Have a Project in Mind?</h2>
            <p>Let's discuss how we can bring your idea to life</p>
            <a href="{{ route('contact') }}" class="projects-cta-btn">Get in Touch →</a>
        </div>
    </div>
</section>

<style>
    .projects-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .text-neon { color: #39FF14; }

    /* ---- Hero ---- */
    .projects-hero {
        padding: 60px 0 40px;
        background: #0F172A;
        border-bottom: 1px solid rgba(57,255,20,0.04);
    }
    .projects-hero-content {
        text-align: center;
        max-width: 700px;
        margin: 0 auto;
    }
    .projects-hero-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #39FF14;
        background: rgba(57,255,20,0.06);
        padding: 4px 20px;
        border-radius: 20px;
        border: 1px solid rgba(57,255,20,0.04);
        margin-bottom: 16px;
    }
    .projects-hero-content h1 {
        font-size: 44px;
        font-weight: 700;
        color: #FFFFFF;
        margin: 0 0 8px;
        font-family: 'Cabin', sans-serif;
    }
    .projects-hero-content p {
        font-size: 18px;
        color: rgba(255,255,255,0.4);
        margin: 0;
        font-weight: 300;
    }

    /* ---- Filter ---- */
    .projects-filter-section {
        padding: 24px 0 0;
        background: #F8FAFC;
    }
    .projects-filter {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        padding: 20px 0;
        border-bottom: 1px solid rgba(0,0,0,0.02);
    }
    .projects-filter-btn {
        padding: 8px 24px;
        border: 1px solid rgba(0,0,0,0.04);
        border-radius: 20px;
        background: transparent;
        color: #64748B;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif;
    }
    .projects-filter-btn:hover {
        border-color: #39FF14;
        color: #0F172A;
        background: rgba(57,255,20,0.02);
    }
    .projects-filter-btn.active {
        background: #39FF14;
        color: #0F172A;
        border-color: #39FF14;
    }

    /* ---- Grid ---- */
    .projects-grid-section {
        padding: 40px 0 60px;
        background: #F8FAFC;
    }
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 32px;
    }

    /* ---- Cards ---- */
    .project-card {
        background: #FFFFFF;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 20px rgba(0,0,0,0.02);
        border: 1px solid rgba(0,0,0,0.02);
        transition: all 0.3s ease;
    }
    .project-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 40px rgba(57,255,20,0.04);
        border-color: rgba(57,255,20,0.04);
    }
    .project-card-image {
        height: 200px;
        background: #F1F5F9;
        overflow: hidden;
        position: relative;
    }
    .project-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .project-card-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 48px;
        background: linear-gradient(135deg, #F1F5F9, #E2E8F0);
    }
    .project-card-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 3px 12px;
        border-radius: 4px;
        background: #39FF14;
        color: #0F172A;
    }
    .project-card-content {
        padding: 20px 24px 24px;
    }
    .project-card-content h3 {
        font-size: 18px;
        font-weight: 600;
        color: #0F172A;
        margin: 0 0 8px;
        font-family: 'Cabin', sans-serif;
    }
    .project-card-content p {
        font-size: 14px;
        color: #64748B;
        line-height: 1.6;
        margin: 0 0 12px;
    }
    .project-card-footer {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: #94A3B8;
        margin-bottom: 12px;
    }
    .project-client {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .project-views {
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .project-btn {
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
    .project-btn:hover {
        background: #2DE010;
        transform: translateY(-2px);
    }

    /* ---- Empty ---- */
    .projects-empty {
        text-align: center;
        padding: 60px;
        background: #FFFFFF;
        border-radius: 12px;
    }
    .projects-empty span { font-size: 48px; display: block; margin-bottom: 16px; }
    .projects-empty h3 { color: #0F172A; margin: 0 0 8px; }
    .projects-empty p { color: #94A3B8; margin: 0; }

    /* ---- CTA ---- */
    .projects-cta {
        padding: 60px 0;
        background: #0F172A;
        border-top: 1px solid rgba(57,255,20,0.04);
    }
    .projects-cta-content {
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
    }
    .projects-cta-content h2 {
        font-size: 32px;
        font-weight: 700;
        color: #FFFFFF;
        font-family: 'Cabin', sans-serif;
        margin: 0 0 8px;
    }
    .projects-cta-content p {
        font-size: 16px;
        color: rgba(255,255,255,0.4);
        margin: 0 0 24px;
    }
    .projects-cta-btn {
        display: inline-block;
        padding: 14px 36px;
        background: #39FF14;
        color: #0F172A;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        transition: all 0.3s ease;
    }
    .projects-cta-btn:hover {
        background: #2DE010;
        transform: translateY(-2px);
        box-shadow: 0 8px 32px rgba(57,255,20,0.08);
    }

    /* ---- Responsive ---- */
    @media (max-width: 768px) {
        .projects-hero-content h1 { font-size: 32px; }
        .projects-grid { grid-template-columns: 1fr; }
        .projects-filter {
            gap: 8px;
            padding: 16px 0;
        }
        .projects-filter-btn {
            font-size: 13px;
            padding: 6px 16px;
        }
        .projects-cta-content h2 { font-size: 26px; }
    }
    @media (max-width: 480px) {
        .projects-container { padding: 0 16px; }
        .projects-hero-content h1 { font-size: 28px; }
        .projects-filter-btn { font-size: 12px; padding: 4px 14px; }
        .project-card-content { padding: 16px 18px 20px; }
    }
</style>

@endsection
