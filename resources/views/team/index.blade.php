<!-- ============================================ -->
<!-- TEAM — Professional Team Page -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', 'Our Team - Sofel Labs')
@section('body_class', 'page-team')

@section('content')

<!-- ============================================ -->
<!-- TEAM HERO BANNER -->
<!-- ============================================ -->
<section class="sf-team-hero" style="background-image: url('{{ asset('wp-content/uploads/images/team-bg.jpg') }}');">
    <div class="sf-team-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-team-hero-content">
            <span class="sf-team-hero-badge">Our Team</span>
            <h1 class="sf-team-hero-title">Meet the <span class="sf-text-teal">People</span> Behind Sofel Labs</h1>
            <p class="sf-team-hero-subtitle">A passionate team of experts dedicated to transforming learning through innovation</p>
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
            <h2 class="sf-team-section-title">Driven by <span class="sf-text-teal">Excellence</span></h2>
            <div class="sf-team-header-line"></div>
            <p class="sf-team-section-subtitle">We are a diverse team of professionals united by a shared passion for learning and innovation</p>
        </div>

        @if(isset($teamMembers) && $teamMembers->count() > 0)
        <div class="sf-team-grid">
            @foreach($teamMembers as $index => $member)
            <div class="sf-team-card">
                <div class="sf-team-card-inner">
                    <!-- Image -->
                    <div class="sf-team-card-image">
                        @if($member->image)
                            <img src="{{ $member->image_url }}" alt="{{ $member->name }}" loading="lazy">
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
                                @if($member->twitter)
                                <a href="{{ $member->twitter }}" target="_blank" class="sf-social-link" aria-label="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                @endif
                                @if($member->facebook)
                                <a href="{{ $member->facebook }}" target="_blank" class="sf-social-link" aria-label="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                @endif
                                @if($member->instagram)
                                <a href="{{ $member->instagram }}" target="_blank" class="sf-social-link" aria-label="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                @endif
                                @if($member->phone)
                                <a href="tel:{{ $member->phone }}" class="sf-social-link" aria-label="Phone">
                                    <i class="fas fa-phone"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="sf-team-card-content">
                        <h3 class="sf-team-card-name">{{ $member->name }}</h3>
                        <p class="sf-team-card-position">{{ $member->position }}</p>
                        @if($member->bio)
                        <div class="sf-team-card-bio">
                            {!! nl2br(e($member->bio)) !!}
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
            <h2 class="sf-team-cta-title">Want to <span class="sf-text-teal">Join</span> Our Team?</h2>
            <p class="sf-team-cta-text">We're always looking for passionate professionals who share our vision.</p>
            <a href="{{ route('contact') }}" class="sf-team-cta-btn">
                Get in Touch
                <span class="sf-cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Team Page -->
<!-- ============================================ -->
<style>
    /* ============================================
       TEAM PAGE — Professional Design
       ============================================ */

    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sf-text-teal {
        color: #47C89F !important;
    }

    /* ============================================
       HERO SECTION
       ============================================ */
    .sf-team-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 450px !important;
        display: flex !important;
        align-items: center !important;
    }

    .sf-team-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
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
        color: #47C89F !important;
        background: rgba(71, 200, 159, 0.08) !important;
        padding: 6px 22px !important;
        border-radius: 20px !important;
        margin-bottom: 18px !important;
        animation: sfFadeInDown 0.8s ease forwards !important;
    }

    .sf-team-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
        animation: sfFadeInUp 0.8s ease forwards !important;
    }

    .sf-team-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
        animation: sfFadeInUp 1s ease forwards !important;
    }

    .sf-team-hero-line {
        width: 60px !important;
        height: 3px !important;
        background: #47C89F !important;
        border-radius: 4px !important;
        margin-top: 8px !important;
        animation: sfFadeInUp 1.2s ease forwards !important;
    }

    @keyframes sfFadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes sfFadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
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
        color: #47C89F !important;
        margin-bottom: 12px !important;
    }

    .sf-team-section-title {
        font-size: 38px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-team-header-line {
        width: 40px !important;
        height: 2px !important;
        background: linear-gradient(90deg, #47C89F, #9ACA43) !important;
        border-radius: 4px !important;
        margin: 0 auto 12px !important;
    }

    .sf-team-section-subtitle {
        font-size: 18px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-weight: 300 !important;
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
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        border-radius: 16px !important;
        overflow: hidden !important;
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.02) !important;
        opacity: 0;
        animation: sfCardAppear 0.6s ease forwards !important;
    }

    .sf-team-card:nth-child(1) { animation-delay: 0.1s; }
    .sf-team-card:nth-child(2) { animation-delay: 0.2s; }
    .sf-team-card:nth-child(3) { animation-delay: 0.3s; }
    .sf-team-card:nth-child(4) { animation-delay: 0.4s; }
    .sf-team-card:nth-child(5) { animation-delay: 0.5s; }
    .sf-team-card:nth-child(6) { animation-delay: 0.6s; }

    @keyframes sfCardAppear {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .sf-team-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: 0 16px 60px rgba(0, 0, 0, 0.06) !important;
        border-color: rgba(71, 200, 159, 0.06) !important;
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
        height: 280px !important;
        overflow: hidden !important;
        background: #F8FAFB !important;
    }

    .sf-team-card-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.6s ease !important;
    }

    .sf-team-card:hover .sf-team-card-image img {
        transform: scale(1.05) !important;
    }

    .sf-team-avatar-fallback {
        width: 100% !important;
        height: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: linear-gradient(135deg, rgba(71, 200, 159, 0.04), rgba(154, 202, 67, 0.04)) !important;
        font-size: 48px !important;
        font-weight: 700 !important;
        color: #47C89F !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    /* ---- Overlay ---- */
    .sf-team-card-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(71, 200, 159, 0.85), rgba(58, 175, 138, 0.85)) !important;
        opacity: 0 !important;
        transition: all 0.5s ease !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        backdrop-filter: blur(4px) !important;
        -webkit-backdrop-filter: blur(4px) !important;
    }

    .sf-team-card:hover .sf-team-card-overlay {
        opacity: 1 !important;
    }

    .sf-team-social {
        display: flex !important;
        gap: 12px !important;
        flex-wrap: wrap !important;
        justify-content: center !important;
        padding: 20px !important;
    }

    .sf-social-link {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 44px !important;
        height: 44px !important;
        border-radius: 50% !important;
        background: rgba(255, 255, 255, 0.12) !important;
        color: #FFFFFF !important;
        font-size: 16px !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        backdrop-filter: blur(4px) !important;
        -webkit-backdrop-filter: blur(4px) !important;
    }

    .sf-social-link:hover {
        background: #FFFFFF !important;
        color: #47C89F !important;
        transform: scale(1.08) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
    }

    /* ---- Card Content ---- */
    .sf-team-card-content {
        padding: 20px 22px 24px 22px !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }

    .sf-team-card-name {
        font-size: 20px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        transition: color 0.3s ease !important;
    }

    .sf-team-card:hover .sf-team-card-name {
        color: #47C89F !important;
    }

    .sf-team-card-position {
        font-size: 14px !important;
        color: #47C89F !important;
        font-weight: 500 !important;
        margin: 0 0 10px 0 !important;
        letter-spacing: 0.3px !important;
    }

    .sf-team-card-bio {
        font-size: 14px !important;
        line-height: 1.7 !important;
        color: #4A5A6E !important;
        flex: 1 !important;
        margin: 0 0 14px 0 !important;
    }

    .sf-team-card-bio p {
        margin-bottom: 6px !important;
    }

    .sf-team-card-bio p:last-child {
        margin-bottom: 0 !important;
    }

    .sf-team-card-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 8px 20px !important;
        border: 1px solid rgba(71, 200, 159, 0.15) !important;
        border-radius: 30px !important;
        color: #47C89F !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        align-self: flex-start !important;
        background: transparent !important;
    }

    .sf-team-card-btn:hover {
        background: #47C89F !important;
        color: #FFFFFF !important;
        border-color: #47C89F !important;
        box-shadow: 0 4px 20px rgba(71, 200, 159, 0.15) !important;
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
        font-size: 18px !important;
    }

    /* ============================================
       CTA SECTION
       ============================================ */
    .sf-team-cta {
        padding: 80px 0 !important;
        background: linear-gradient(135deg, #0A0610 0%, #1A0A18 100%) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .sf-team-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
        position: relative !important;
        z-index: 1 !important;
    }

    .sf-team-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-team-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }

    .sf-team-cta-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 14px 40px !important;
        background: #47C89F !important;
        color: #FFFFFF !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        font-size: 16px !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-cta-btn:hover {
        background: #3AAF8A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(71, 200, 159, 0.12) !important;
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
            padding: 80px 0 !important;
            min-height: 350px !important;
        }

        .sf-team-hero-title {
            font-size: 32px !important;
        }

        .sf-team-hero-subtitle {
            font-size: 17px !important;
        }

        .sf-team-grid-section {
            padding: 60px 0 !important;
        }

        .sf-team-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 16px !important;
        }

        .sf-team-card-image {
            height: 220px !important;
        }

        .sf-team-card-content {
            padding: 16px 18px 18px 18px !important;
        }

        .sf-team-card-name {
            font-size: 17px !important;
        }

        .sf-team-card-position {
            font-size: 13px !important;
        }

        .sf-team-card-bio {
            font-size: 13px !important;
            line-height: 1.6 !important;
        }

        .sf-team-section-title {
            font-size: 28px !important;
        }

        .sf-team-section-subtitle {
            font-size: 16px !important;
        }

        .sf-team-cta {
            padding: 60px 0 !important;
        }

        .sf-team-cta-title {
            font-size: 28px !important;
        }

        .sf-team-cta-text {
            font-size: 16px !important;
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

        .sf-team-hero-line {
            width: 40px !important;
            height: 2px !important;
        }

        .sf-team-section-title {
            font-size: 24px !important;
        }

        .sf-team-section-badge {
            font-size: 11px !important;
        }

        .sf-team-section-subtitle {
            font-size: 14px !important;
        }

        .sf-team-grid {
            grid-template-columns: 1fr !important;
            gap: 16px !important;
        }

        .sf-team-card-image {
            height: 200px !important;
        }

        .sf-team-card-name {
            font-size: 16px !important;
        }

        .sf-team-card-bio {
            font-size: 12px !important;
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
            font-size: 15px !important;
        }

        .sf-social-link {
            width: 36px !important;
            height: 36px !important;
            font-size: 14px !important;
        }
    }
</style>

@endsection