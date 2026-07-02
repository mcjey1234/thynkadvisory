<!-- ============================================ -->
<!-- MILESTONES — Classic Timeline Design -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', 'Our Milestones - Sofel Labs')
@section('body_class', 'page-milestones')

@section('content')

<!-- ============================================ -->
<!-- MILESTONES HERO BANNER -->
<!-- ============================================ -->
<section class="sf-milestones-hero" style="background-image: url('{{ asset('wp-content/uploads/images/milestones-bg.jpg') }}');">
    <div class="sf-milestones-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-milestones-hero-content">
            <span class="sf-milestones-hero-badge">Our Milestones</span>
            <h1 class="sf-milestones-hero-title">Our <span class="sf-text-neon">Journey</span></h1>
            <p class="sf-milestones-hero-subtitle">Key moments that have shaped our story and defined our success</p>
            <div class="sf-milestones-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- MILESTONES TIMELINE -->
<!-- ============================================ -->
<section class="sf-milestones-timeline">
    <div class="sf-container">
        <div class="sf-milestones-header">
            <span class="sf-milestones-section-badge">Our Story</span>
            <h2 class="sf-milestones-section-title">A Journey of <span class="sf-text-neon">Growth & Impact</span></h2>
            <div class="sf-milestones-header-line"></div>
            <p class="sf-milestones-section-subtitle">From our founding to the present day, each milestone represents a step forward</p>
        </div>

        @if(isset($milestones) && $milestones->count() > 0)
        <div class="sf-timeline">
            <!-- Timeline Center Line -->
            <div class="sf-timeline-line"></div>

            @foreach($milestones as $index => $milestone)
            <div class="sf-timeline-item" data-index="{{ $index }}">
                <div class="sf-timeline-item-inner">
                    <!-- Timeline Dot -->
                    <div class="sf-timeline-dot">
                        <span class="sf-dot-pulse"></span>
                    </div>

                    <!-- Timeline Content -->
                    <div class="sf-timeline-content">
                        <div class="sf-timeline-card">
                            <!-- Date Badge -->
                            <div class="sf-timeline-date">
                                <span class="sf-timeline-year">{{ $milestone->year }}</span>
                                @if($milestone->month)
                                <span class="sf-timeline-month">{{ $milestone->month }}</span>
                                @endif
                                @if($milestone->day)
                                <span class="sf-timeline-day">{{ $milestone->day }}</span>
                                @endif
                            </div>

                            <!-- Image -->
                            @if($milestone->image)
                            <div class="sf-timeline-image">
                                <img src="{{ $milestone->image_url }}" alt="{{ $milestone->title }}" loading="lazy">
                                <div class="sf-timeline-image-overlay"></div>
                            </div>
                            @endif

                            <!-- Content -->
                            <div class="sf-timeline-body">
                                @if($milestone->icon)
                                <div class="sf-timeline-icon">
                                    <i class="{{ $milestone->icon }}"></i>
                                </div>
                                @endif
                                <h3 class="sf-timeline-title">{{ $milestone->title }}</h3>
                                <div class="sf-timeline-description">
                                    {!! nl2br(e($milestone->description)) !!}
                                </div>
                                <div class="sf-timeline-step">
                                    <span class="sf-step-number">0{{ $index + 1 }}</span>
                                    <span class="sf-step-label">Milestone</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Milestones Stats -->
        <div class="sf-milestones-stats">
            <div class="sf-stats-grid">
                <div class="sf-stat-item">
                    <span class="sf-stat-number">{{ $milestones->count() }}</span>
                    <span class="sf-stat-label">Milestones Achieved</span>
                </div>
                <div class="sf-stat-divider"></div>
                <div class="sf-stat-item">
                    <span class="sf-stat-number">{{ $milestones->first()->year ?? 'N/A' }}</span>
                    <span class="sf-stat-label">Founded</span>
                </div>
                <div class="sf-stat-divider"></div>
                <div class="sf-stat-item">
                    <span class="sf-stat-number">{{ date('Y') }}</span>
                    <span class="sf-stat-label">Present Year</span>
                </div>
                <div class="sf-stat-divider"></div>
                <div class="sf-stat-item">
                    <span class="sf-stat-number">{{ $milestones->count() > 0 ? $milestones->count() * 2 : 0 }}+</span>
                    <span class="sf-stat-label">Years of Excellence</span>
                </div>
            </div>
        </div>
        @else
        <div class="sf-milestones-empty">
            <p>No milestones available at the moment. Please check back later.</p>
        </div>
        @endif
    </div>
</section>

<!-- ============================================ -->
<!-- MILESTONES CTA -->
<!-- ============================================ -->
<section class="sf-milestones-cta">
    <div class="sf-container">
        <div class="sf-milestones-cta-content">
            <h2 class="sf-milestones-cta-title">Be Part of Our <span class="sf-text-neon">Next Chapter</span></h2>
            <p class="sf-milestones-cta-text">Join us as we continue to grow and create more milestones together.</p>
            <a href="{{ route('contact') }}" class="sf-milestones-cta-btn">
                Join Our Journey
                <span class="sf-cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Milestones Timeline -->
<!-- ============================================ -->
<style>
    /* ============================================
       MILESTONES — Classic Timeline Design
       ============================================ */

    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sf-text-neon {
        color: #39FF14 !important;
    }

    /* ============================================
       HERO SECTION
       ============================================ */
    .sf-milestones-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 450px !important;
        display: flex !important;
        align-items: center !important;
    }

    .sf-milestones-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }

    .sf-milestones-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }

    .sf-milestones-hero-badge {
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
        animation: sfFadeInDown 0.8s ease forwards !important;
    }

    .sf-milestones-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
        animation: sfFadeInUp 0.8s ease forwards !important;
    }

    .sf-milestones-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
        animation: sfFadeInUp 1s ease forwards !important;
    }

    .sf-milestones-hero-line {
        width: 60px !important;
        height: 3px !important;
        background: #39FF14 !important;
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
       TIMELINE SECTION
       ============================================ */
    .sf-milestones-timeline {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
        position: relative !important;
    }

    .sf-milestones-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sf-milestones-section-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #39FF14 !important;
        margin-bottom: 12px !important;
    }

    .sf-milestones-section-title {
        font-size: 38px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-milestones-header-line {
        width: 40px !important;
        height: 2px !important;
        background: linear-gradient(90deg, #39FF14, #06B6D4) !important;
        border-radius: 4px !important;
        margin: 0 auto 12px !important;
    }

    .sf-milestones-section-subtitle {
        font-size: 18px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-weight: 300 !important;
    }

    /* ============================================
       TIMELINE
       ============================================ */
    .sf-timeline {
        position: relative !important;
        padding: 20px 0 !important;
        max-width: 900px !important;
        margin: 0 auto !important;
    }

    /* ---- Timeline Center Line ---- */
    .sf-timeline-line {
        position: absolute !important;
        top: 0 !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        width: 4px !important;
        height: 100% !important;
        background: linear-gradient(180deg, rgba(57, 255, 20, 0.05), rgba(57, 255, 20, 0.12), rgba(57, 255, 20, 0.05)) !important;
        border-radius: 4px !important;
        animation: sfLineGrow 2s ease forwards !important;
    }

    @keyframes sfLineGrow {
        from { transform: translateX(-50%) scaleY(0); }
        to { transform: translateX(-50%) scaleY(1); }
    }

    /* ---- Timeline Item ---- */
    .sf-timeline-item {
        position: relative !important;
        margin-bottom: 40px !important;
        z-index: 1 !important;
        opacity: 0;
        animation: sfItemAppear 0.8s ease forwards !important;
    }

    .sf-timeline-item:nth-child(1) { animation-delay: 0.2s; }
    .sf-timeline-item:nth-child(2) { animation-delay: 0.4s; }
    .sf-timeline-item:nth-child(3) { animation-delay: 0.6s; }
    .sf-timeline-item:nth-child(4) { animation-delay: 0.8s; }
    .sf-timeline-item:nth-child(5) { animation-delay: 1.0s; }
    .sf-timeline-item:nth-child(6) { animation-delay: 1.2s; }

    @keyframes sfItemAppear {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .sf-timeline-item-inner {
        position: relative !important;
        display: flex !important;
        align-items: flex-start !important;
    }

    /* ---- Timeline Dot ---- */
    .sf-timeline-dot {
        position: absolute !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        width: 20px !important;
        height: 20px !important;
        border-radius: 50% !important;
        background: #39FF14 !important;
        border: 4px solid rgba(57, 255, 20, 0.08) !important;
        box-shadow: 0 0 30px rgba(57, 255, 20, 0.02) !important;
        z-index: 2 !important;
        flex-shrink: 0 !important;
        transition: all 0.4s ease !important;
    }

    .sf-timeline-item:hover .sf-timeline-dot {
        transform: translateX(-50%) scale(1.15) !important;
        border-color: rgba(57, 255, 20, 0.15) !important;
        box-shadow: 0 0 40px rgba(57, 255, 20, 0.05) !important;
    }

    .sf-dot-pulse {
        position: absolute !important;
        top: -6px !important;
        left: -6px !important;
        right: -6px !important;
        bottom: -6px !important;
        border-radius: 50% !important;
        border: 2px solid rgba(57, 255, 20, 0.03) !important;
        animation: sfDotPulse 2s ease-in-out infinite !important;
    }

    @keyframes sfDotPulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.2); opacity: 0.1; }
    }

    /* ---- Timeline Content ---- */
    .sf-timeline-content {
        width: 50% !important;
        padding: 0 40px !important;
    }

    .sf-timeline-item:nth-child(odd) .sf-timeline-content {
        padding-right: 50px !important;
        text-align: right !important;
        margin-right: auto !important;
    }

    .sf-timeline-item:nth-child(even) .sf-timeline-content {
        padding-left: 50px !important;
        text-align: left !important;
        margin-left: auto !important;
    }

    /* ---- Timeline Card ---- */
    .sf-timeline-card {
        background: #FFFFFF !important;
        border-radius: 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.02) !important;
        overflow: hidden !important;
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        position: relative !important;
    }

    .sf-timeline-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 16px 60px rgba(0, 0, 0, 0.06) !important;
        border-color: rgba(57, 255, 20, 0.06) !important;
    }

    /* ---- Date Badge ---- */
    .sf-timeline-date {
        display: inline-flex !important;
        align-items: center !important;
        gap: 6px !important;
        padding: 6px 16px !important;
        background: linear-gradient(135deg, rgba(57, 255, 20, 0.04), rgba(6, 182, 212, 0.04)) !important;
        border-radius: 0 0 12px 12px !important;
        font-weight: 500 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        position: absolute !important;
        top: 0 !important;
        left: 16px !important;
        z-index: 2 !important;
    }

    .sf-timeline-item:nth-child(even) .sf-timeline-date {
        left: auto !important;
        right: 16px !important;
    }

    .sf-timeline-year {
        color: #39FF14 !important;
        font-weight: 700 !important;
        font-size: 16px !important;
    }

    .sf-timeline-month {
        color: #6B7C93 !important;
        font-size: 13px !important;
        font-weight: 400 !important;
    }

    .sf-timeline-day {
        color: #6B7C93 !important;
        font-size: 13px !important;
        font-weight: 400 !important;
    }

    /* ---- Image ---- */
    .sf-timeline-image {
        width: 100% !important;
        height: 180px !important;
        overflow: hidden !important;
        position: relative !important;
        background: #F8FAFC !important;
    }

    .sf-timeline-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.6s ease !important;
    }

    .sf-timeline-card:hover .sf-timeline-image img {
        transform: scale(1.03) !important;
    }

    .sf-timeline-image-overlay {
        position: absolute !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 60% !important;
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.01)) !important;
    }

    /* ---- Body ---- */
    .sf-timeline-body {
        padding: 20px 22px 22px 22px !important;
        position: relative !important;
    }

    .sf-timeline-icon {
        display: inline-block !important;
        font-size: 24px !important;
        color: #39FF14 !important;
        margin-bottom: 8px !important;
        transition: all 0.3s ease !important;
    }

    .sf-timeline-icon i {
        font-size: 24px !important;
    }

    .sf-timeline-card:hover .sf-timeline-icon {
        transform: scale(1.1) !important;
        color: #06B6D4 !important;
    }

    .sf-timeline-title {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 0 6px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        transition: color 0.3s ease !important;
    }

    .sf-timeline-card:hover .sf-timeline-title {
        color: #39FF14 !important;
    }

    .sf-timeline-description {
        font-size: 14px !important;
        line-height: 1.7 !important;
        color: #4B5563 !important;
        margin: 0 0 12px 0 !important;
    }

    .sf-timeline-description p {
        margin-bottom: 6px !important;
    }

    .sf-timeline-description p:last-child {
        margin-bottom: 0 !important;
    }

    .sf-timeline-step {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding-top: 10px !important;
        border-top: 1px solid rgba(0, 0, 0, 0.02) !important;
        font-size: 12px !important;
        color: #6B7C93 !important;
        opacity: 0.5 !important;
        transition: all 0.3s ease !important;
    }

    .sf-timeline-card:hover .sf-timeline-step {
        opacity: 0.8 !important;
    }

    .sf-step-number {
        font-weight: 700 !important;
        color: #39FF14 !important;
    }

    .sf-step-label {
        font-weight: 400 !important;
    }

    /* ---- Stats ---- */
    .sf-milestones-stats {
        margin-top: 48px !important;
        padding: 32px 24px !important;
        background: #F8FAFC !important;
        border-radius: 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
        opacity: 0;
        animation: sfStatsAppear 0.8s ease 1.5s forwards !important;
    }

    @keyframes sfStatsAppear {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .sf-stats-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        align-items: center !important;
        gap: 0 !important;
    }

    .sf-stat-item {
        text-align: center !important;
        padding: 0 16px !important;
    }

    .sf-stat-number {
        display: block !important;
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #39FF14 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        line-height: 1.1 !important;
    }

    .sf-stat-label {
        display: block !important;
        font-size: 13px !important;
        color: #6B7C93 !important;
        margin-top: 4px !important;
    }

    .sf-stat-divider {
        width: 1px !important;
        height: 40px !important;
        background: rgba(0, 0, 0, 0.03) !important;
        flex-shrink: 0 !important;
    }

    /* ---- Empty State ---- */
    .sf-milestones-empty {
        text-align: center !important;
        padding: 60px 0 !important;
        color: #6B7C93 !important;
        font-size: 18px !important;
    }

    /* ============================================
       CTA SECTION
       ============================================ */
    .sf-milestones-cta {
        padding: 80px 0 !important;
        background: #0F172A !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .sf-milestones-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
        position: relative !important;
        z-index: 1 !important;
    }

    .sf-milestones-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-milestones-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }

    .sf-milestones-cta-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 14px 40px !important;
        background: #39FF14 !important;
        color: #0F172A !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        font-size: 16px !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-milestones-cta-btn:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(57, 255, 20, 0.12) !important;
    }

    .sf-cta-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }

    .sf-milestones-cta-btn:hover .sf-cta-arrow {
        transform: translateX(4px) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sf-timeline-line {
            left: 20px !important;
            transform: none !important;
        }

        .sf-timeline-dot {
            left: 20px !important;
            transform: none !important;
        }

        .sf-timeline-item:hover .sf-timeline-dot {
            transform: scale(1.15) !important;
        }

        .sf-timeline-content {
            width: calc(100% - 50px) !important;
            padding: 0 0 0 40px !important;
            margin-left: 50px !important;
        }

        .sf-timeline-item:nth-child(odd) .sf-timeline-content,
        .sf-timeline-item:nth-child(even) .sf-timeline-content {
            text-align: left !important;
            padding: 0 0 0 40px !important;
            margin-left: 50px !important;
        }

        .sf-timeline-date {
            left: 16px !important;
            right: auto !important;
        }

        .sf-timeline-item:nth-child(even) .sf-timeline-date {
            left: 16px !important;
            right: auto !important;
        }

        .sf-stats-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 20px !important;
        }

        .sf-stat-divider {
            display: none !important;
        }

        .sf-milestones-hero-title {
            font-size: 40px !important;
        }

        .sf-milestones-section-title {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-milestones-hero {
            padding: 80px 0 !important;
            min-height: 350px !important;
        }

        .sf-milestones-hero-title {
            font-size: 32px !important;
        }

        .sf-milestones-hero-subtitle {
            font-size: 17px !important;
        }

        .sf-milestones-timeline {
            padding: 60px 0 !important;
        }

        .sf-timeline-image {
            height: 140px !important;
        }

        .sf-timeline-body {
            padding: 16px 18px 18px 18px !important;
        }

        .sf-timeline-title {
            font-size: 16px !important;
        }

        .sf-timeline-description {
            font-size: 13px !important;
            line-height: 1.6 !important;
        }

        .sf-timeline-content {
            padding: 0 0 0 30px !important;
            margin-left: 40px !important;
        }

        .sf-timeline-item:nth-child(odd) .sf-timeline-content,
        .sf-timeline-item:nth-child(even) .sf-timeline-content {
            padding: 0 0 0 30px !important;
            margin-left: 40px !important;
        }

        .sf-timeline-line {
            left: 14px !important;
        }

        .sf-timeline-dot {
            left: 14px !important;
            width: 16px !important;
            height: 16px !important;
        }

        .sf-milestones-section-title {
            font-size: 28px !important;
        }

        .sf-milestones-section-subtitle {
            font-size: 16px !important;
        }

        .sf-stats-grid {
            grid-template-columns: 1fr 1fr !important;
        }

        .sf-stat-number {
            font-size: 30px !important;
        }

        .sf-milestones-cta {
            padding: 60px 0 !important;
        }

        .sf-milestones-cta-title {
            font-size: 28px !important;
        }

        .sf-milestones-cta-text {
            font-size: 16px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }

        .sf-milestones-hero-title {
            font-size: 26px !important;
        }

        .sf-milestones-hero-subtitle {
            font-size: 15px !important;
        }

        .sf-milestones-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }

        .sf-milestones-hero-line {
            width: 40px !important;
            height: 2px !important;
        }

        .sf-milestones-section-title {
            font-size: 24px !important;
        }

        .sf-milestones-section-badge {
            font-size: 11px !important;
        }

        .sf-milestones-section-subtitle {
            font-size: 14px !important;
        }

        .sf-timeline-image {
            height: 120px !important;
        }

        .sf-timeline-body {
            padding: 14px 14px 16px 14px !important;
        }

        .sf-timeline-title {
            font-size: 15px !important;
        }

        .sf-timeline-description {
            font-size: 12px !important;
            line-height: 1.5 !important;
        }

        .sf-timeline-content {
            padding: 0 0 0 20px !important;
            margin-left: 30px !important;
        }

        .sf-timeline-item:nth-child(odd) .sf-timeline-content,
        .sf-timeline-item:nth-child(even) .sf-timeline-content {
            padding: 0 0 0 20px !important;
            margin-left: 30px !important;
        }

        .sf-timeline-line {
            left: 10px !important;
        }

        .sf-timeline-dot {
            left: 10px !important;
            width: 14px !important;
            height: 14px !important;
        }

        .sf-timeline-year {
            font-size: 14px !important;
        }

        .sf-timeline-month,
        .sf-timeline-day {
            font-size: 12px !important;
        }

        .sf-timeline-date {
            padding: 4px 12px !important;
        }

        .sf-stats-grid {
            grid-template-columns: 1fr !important;
            gap: 12px !important;
        }

        .sf-stat-number {
            font-size: 26px !important;
        }

        .sf-stat-label {
            font-size: 12px !important;
        }

        .sf-milestones-cta-title {
            font-size: 24px !important;
        }

        .sf-milestones-cta-btn {
            padding: 12px 32px !important;
            font-size: 15px !important;
        }
    }
</style>

@endsection