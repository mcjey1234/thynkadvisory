<!-- ============================================ -->
<!-- TEAM — Classic Professional Page -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', 'Our Team - Thynk Advisory')
@section('body_class', 'page-team')

@section('content')

<!-- ============================================ -->
<!-- TEAM HERO -->
<!-- ============================================ -->
<section class="sf-team-hero">
    <div class="sf-container">
        <div class="sf-team-hero-content">
            <span class="sf-team-hero-badge">Our Team</span>
            <h1 class="sf-team-hero-title">Meet the <span class="sf-text-accent">Experts</span> Behind Thynk Advisory</h1>
            <p class="sf-team-hero-subtitle">A passionate team of developers, designers, and learning specialists dedicated to building purpose-driven digital solutions.</p>
            <div class="sf-team-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- TEAM GRID -->
<!-- ============================================ -->
<section class="sf-team-grid-section">
    <div class="sf-container">
        <div class="sf-team-header">
            <span class="sf-team-section-badge">Our Experts</span>
            <h2 class="sf-team-section-title">Driven by <span class="sf-text-accent">Excellence</span></h2>
            <div class="sf-team-header-line"></div>
            <p class="sf-team-section-subtitle">We are a diverse team of professionals united by a shared passion for innovation and impact.</p>
        </div>

        @if(isset($teamMembers) && $teamMembers->count() > 0)
        <div class="sf-team-grid">
            @foreach($teamMembers as $member)
            <div class="sf-team-card">
                <div class="sf-team-card-inner">
                    <!-- Image -->
                    <div class="sf-team-card-image">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" loading="lazy">
                        @else
                            <div class="sf-team-avatar-fallback">
                                <span>{{ strtoupper(substr($member->name, 0, 2)) }}</span>
                            </div>
                        @endif
                        <!-- Social Overlay -->
                        <div class="sf-team-card-overlay">
                            <div class="sf-team-social">
                                @if($member->email)
                                <a href="mailto:{{ $member->email }}" class="sf-social-link" aria-label="Email">
                                    <i class="fas fa-envelope"></i>
                                </a>
                                @endif
                                @if($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank" class="sf-social-link" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="sf-team-card-content">
                        <h3 class="sf-team-card-name">{{ $member->name }}</h3>
                        <p class="sf-team-card-position">{{ $member->position }}</p>

                        <!-- Additional Skills -->
                        @if($member->bio)
                        <div class="sf-team-card-skills">
                            <span class="sf-skills-label">Additional Skills</span>
                            <p class="sf-team-card-bio">{{ $member->bio }}</p>
                        </div>
                        @endif

                        <!-- Description -->
                        @if($member->description)
                        <div class="sf-team-card-description">
                            <p>{{ $member->description }}</p>
                        </div>
                        @endif

                        <a href="{{ route('team.show', $member->id) }}" class="sf-team-card-btn">
                            View Profile
                            <span class="sf-btn-arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="sf-team-empty">
            <p>No team members available at the moment. Please check back later.</p>
        </div>
        @endif
    </div>
</section>

<!-- ============================================ -->
<!-- TEAM CTA -->
<!-- ============================================ -->
<section class="sf-team-cta">
    <div class="sf-container">
        <div class="sf-team-cta-content">
            <h2 class="sf-team-cta-title">Want to <span class="sf-text-accent">Join</span> Our Team?</h2>
            <p class="sf-team-cta-text">We're always looking for passionate professionals who share our vision.</p>
            <a href="{{ route('contact') }}" class="sf-team-cta-btn">
                Get in Touch
                <span class="sf-cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Classic Design -->
<!-- ============================================ -->
<style>
    /* ============================================
       TEAM PAGE — Classic Professional Design
       ============================================ */

    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sf-text-accent {
        color: #39FF14 !important;
    }

    /* ============================================
       HERO SECTION
       ============================================ */
    .sf-team-hero {
        position: relative !important;
        padding: 100px 0 80px !important;
        background: linear-gradient(135deg, #0F172A 0%, #1A1A2E 100%) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04) !important;
    }

    .sf-team-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }

    .sf-team-hero-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        color: #39FF14 !important;
        background: rgba(57, 255, 20, 0.08) !important;
        padding: 6px 22px !important;
        border-radius: 20px !important;
        margin-bottom: 18px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-hero-title {
        font-size: 48px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }

    .sf-team-hero-subtitle {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-hero-line {
        width: 60px !important;
        height: 3px !important;
        background: #39FF14 !important;
        border-radius: 4px !important;
        margin-top: 8px !important;
    }

    /* ============================================
       TEAM GRID SECTION
       ============================================ */
    .sf-team-grid-section {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
    }

    .sf-team-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sf-team-section-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #39FF14 !important;
        margin-bottom: 12px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-section-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-team-header-line {
        width: 40px !important;
        height: 2px !important;
        background: #39FF14 !important;
        border-radius: 4px !important;
        margin: 0 auto 12px !important;
    }

    .sf-team-section-subtitle {
        font-size: 17px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-weight: 300 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    /* ============================================
       TEAM GRID
       ============================================ */
    .sf-team-grid {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 30px !important;
    }

    .sf-team-card {
        background: #FFFFFF !important;
        border: 1px solid #E8EDF2 !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.02) !important;
    }

    .sf-team-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 12px 48px rgba(0, 0, 0, 0.06) !important;
        border-color: rgba(57, 255, 20, 0.15) !important;
    }

    .sf-team-card-inner {
        display: flex !important;
        flex-direction: column !important;
        height: 100% !important;
    }

    /* ---- Card Image ---- */
    .sf-team-card-image {
        position: relative !important;
        width: 100% !important;
        height: 260px !important;
        overflow: hidden !important;
        background: #F4F6F9 !important;
    }

    .sf-team-card-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.5s ease !important;
    }

    .sf-team-card:hover .sf-team-card-image img {
        transform: scale(1.03) !important;
    }

    .sf-team-avatar-fallback {
        width: 100% !important;
        height: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: linear-gradient(135deg, #F4F6F9, #E8EDF2) !important;
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #39FF14 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    /* ---- Overlay ---- */
    .sf-team-card-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: rgba(15, 23, 42, 0.75) !important;
        opacity: 0 !important;
        transition: all 0.4s ease !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .sf-team-card:hover .sf-team-card-overlay {
        opacity: 1 !important;
    }

    .sf-team-social {
        display: flex !important;
        gap: 14px !important;
        flex-wrap: wrap !important;
        justify-content: center !important;
        padding: 20px !important;
    }

    .sf-social-link {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 42px !important;
        height: 42px !important;
        border-radius: 50% !important;
        background: rgba(255, 255, 255, 0.10) !important;
        color: #FFFFFF !important;
        font-size: 16px !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
    }

    .sf-social-link:hover {
        background: #39FF14 !important;
        color: #0F172A !important;
        transform: scale(1.06) !important;
    }

    /* ---- Card Content ---- */
    .sf-team-card-content {
        padding: 20px 24px 24px 24px !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }

    .sf-team-card-name {
        font-size: 19px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        transition: color 0.3s ease !important;
    }

    .sf-team-card:hover .sf-team-card-name {
        color: #39FF14 !important;
    }

    .sf-team-card-position {
        font-size: 13px !important;
        color: #39FF14 !important;
        font-weight: 500 !important;
        margin: 0 0 10px 0 !important;
        letter-spacing: 0.3px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    /* ---- Additional Skills Label (Different Color) ---- */
    .sf-team-card-skills {
        margin-bottom: 8px !important;
    }

    .sf-skills-label {
        display: inline-block !important;
        font-size: 10px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.8px !important;
        color: #F59E0B !important;
        /* Amber/Gold - Different from main accent */
        background: rgba(245, 158, 11, 0.08) !important;
        padding: 2px 10px !important;
        border-radius: 10px !important;
        margin-bottom: 4px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-card-bio {
        font-size: 13px !important;
        line-height: 1.6 !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    /* ---- Description ---- */
    .sf-team-card-description {
        font-size: 13px !important;
        line-height: 1.6 !important;
        color: #4B5563 !important;
        flex: 1 !important;
        margin: 0 0 14px 0 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-card-description p {
        margin: 0 !important;
    }

    /* ---- Button ---- */
    .sf-team-card-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 8px 20px !important;
        border: 1px solid rgba(57, 255, 20, 0.20) !important;
        border-radius: 30px !important;
        color: #39FF14 !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        align-self: flex-start !important;
        background: transparent !important;
    }

    .sf-team-card-btn:hover {
        background: #39FF14 !important;
        color: #0F172A !important;
        border-color: #39FF14 !important;
        box-shadow: 0 4px 16px rgba(57, 255, 20, 0.12) !important;
    }

    .sf-btn-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }

    .sf-team-card-btn:hover .sf-btn-arrow {
        transform: translateX(4px) !important;
    }

    /* ---- Empty State ---- */
    .sf-team-empty {
        text-align: center !important;
        padding: 60px 0 !important;
        color: #6B7C93 !important;
        font-size: 17px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    /* ============================================
       CTA SECTION
       ============================================ */
    .sf-team-cta {
        padding: 70px 0 !important;
        background: #0F172A !important;
        border-top: 1px solid rgba(255, 255, 255, 0.04) !important;
    }

    .sf-team-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
    }

    .sf-team-cta-title {
        font-size: 34px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-team-cta-text {
        font-size: 17px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-cta-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 14px 40px !important;
        background: #39FF14 !important;
        color: #0F172A !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        font-size: 15px !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-cta-btn:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 32px rgba(57, 255, 20, 0.10) !important;
    }

    .sf-cta-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }

    .sf-team-cta-btn:hover .sf-cta-arrow {
        transform: translateX(4px) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sf-team-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 24px !important;
        }

        .sf-team-hero-title {
            font-size: 40px !important;
        }

        .sf-team-section-title {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-team-hero {
            padding: 70px 0 60px !important;
        }

        .sf-team-hero-title {
            font-size: 32px !important;
        }

        .sf-team-hero-subtitle {
            font-size: 16px !important;
        }

        .sf-team-grid-section {
            padding: 60px 0 !important;
        }

        .sf-team-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }

        .sf-team-card-image {
            height: 220px !important;
        }

        .sf-team-card-content {
            padding: 18px 20px 20px 20px !important;
        }

        .sf-team-card-name {
            font-size: 17px !important;
        }

        .sf-team-section-title {
            font-size: 28px !important;
        }

        .sf-team-cta-title {
            font-size: 28px !important;
        }

        .sf-team-cta {
            padding: 50px 0 !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }

        .sf-team-hero-title {
            font-size: 26px !important;
        }

        .sf-team-hero-subtitle {
            font-size: 15px !important;
        }

        .sf-team-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }

        .sf-team-section-title {
            font-size: 24px !important;
        }

        .sf-team-card-image {
            height: 200px !important;
        }

        .sf-team-card-name {
            font-size: 16px !important;
        }

        .sf-team-card-btn {
            font-size: 12px !important;
            padding: 6px 16px !important;
        }

        .sf-team-cta-title {
            font-size: 24px !important;
        }

        .sf-team-cta-btn {
            padding: 12px 32px !important;
            font-size: 14px !important;
        }

        .sf-social-link {
            width: 36px !important;
            height: 36px !important;
            font-size: 14px !important;
        }

        .sf-skills-label {
            font-size: 9px !important;
            padding: 2px 8px !important;
        }
    }

    @media (min-width: 769px) and (max-width: 991px) {
        .sf-team-grid {
            grid-template-columns: 1fr 1fr !important;
        }
    }

    @media (min-width: 992px) and (max-width: 1199px) {
        .sf-team-grid {
            grid-template-columns: repeat(3, 1fr) !important;
        }
    }
</style>

@endsection