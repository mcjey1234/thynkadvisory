<!-- ============================================ -->
<!-- ABOUT US — Professional Classic Design -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', $about->title ?? 'About Us - Sofel Labs')
@section('body_class', 'page-about-us')

@section('content')

<!-- ============================================ -->
<!-- ABOUT HERO BANNER -->
<!-- ============================================ -->
<section class="sf-about-hero" style="background-image: url('{{ $about->background_image_url ?? asset('wp-content/uploads/images/about-bg.jpg') }}');">
    <div class="sf-about-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-about-hero-content">
            <span class="sf-about-hero-badge">About Us</span>
            <h1 class="sf-about-hero-title">{{ $about->title ?? 'About Sofel Labs' }}</h1>
            <p class="sf-about-hero-subtitle">{{ $about->subtitle ?? '' }}</p>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- ABOUT DESCRIPTION — Full Content Visible -->
<!-- ============================================ -->
<section class="sf-about-description">
    <div class="sf-container">
        <div class="sf-about-description-grid">
            <!-- Left Column: Content -->
            <div class="sf-about-description-content">
                <span class="sf-about-section-badge">Who We Are</span>
                <h2 class="sf-about-section-title">Your Trusted Partner in <span class="sf-text-neon">Learning Innovation</span></h2>

                <div class="sf-about-description-text">
                    @php
                        $description = $about->description ?? '<p>No description available.</p>';
                        $description = nl2br($description);
                        $description = str_replace(['<p>', '</p>'], '', $description);
                        $description = '<p>' . $description . '</p>';
                    @endphp
                    {!! $description !!}
                </div>

                @if($about && $about->image_url)
                <div class="sf-about-description-image-mobile">
                    <img src="{{ $about->image_url }}" alt="{{ $about->title ?? 'About Us' }}">
                </div>
                @endif
            </div>

            <!-- Right Column: Image with Badge -->
            @if($about && $about->image_url)
            <div class="sf-about-description-image">
                <div class="sf-about-image-wrapper">
                    <img src="{{ $about->image_url }}" alt="{{ $about->title ?? 'About Us' }}">
                    <div class="sf-about-image-accent"></div>
                    <div class="sf-about-image-badge">
                        <span>✦</span>
                        <span>Since 2020</span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — About Description -->
<!-- ============================================ -->
<style>
    /* ============================================
       ABOUT DESCRIPTION — Split Layout
       ============================================ */

    .sf-about-description {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
        position: relative !important;
    }

    .sf-about-description-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 60px !important;
        align-items: start !important;
    }

    .sf-about-description-content {
        display: flex !important;
        flex-direction: column !important;
    }

    .sf-about-section-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #39FF14 !important;
        margin-bottom: 12px !important;
    }

    .sf-about-section-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 20px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.2 !important;
    }

    .sf-text-neon {
        color: #39FF14 !important;
    }

    .sf-about-description-text {
        font-size: 16px !important;
        line-height: 1.9 !important;
        color: #4B5563 !important;
        max-width: 100% !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }

    .sf-about-description-text p {
        margin-bottom: 18px !important;
        font-size: 16px !important;
        line-height: 1.9 !important;
        color: #4B5563 !important;
    }

    .sf-about-description-text p:last-child {
        margin-bottom: 0 !important;
    }

    .sf-about-description-text ul,
    .sf-about-description-text ol {
        margin: 12px 0 18px 24px !important;
        padding-left: 12px !important;
    }

    .sf-about-description-text li {
        margin-bottom: 8px !important;
        line-height: 1.8 !important;
        font-size: 15px !important;
        color: #4B5563 !important;
    }

    .sf-about-description-text blockquote {
        border-left: 4px solid #39FF14 !important;
        padding: 16px 24px !important;
        margin: 20px 0 !important;
        background: rgba(57, 255, 20, 0.03) !important;
        border-radius: 0 8px 8px 0 !important;
        font-style: italic !important;
        color: #4B5563 !important;
    }

    .sf-about-description-text strong {
        color: #0F172A !important;
        font-weight: 600 !important;
    }

    .sf-about-description-text h2,
    .sf-about-description-text h3,
    .sf-about-description-text h4 {
        color: #0F172A !important;
        margin: 24px 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-about-description-image {
        position: relative !important;
        display: flex !important;
        align-items: start !important;
    }

    .sf-about-image-wrapper {
        position: relative !important;
        border-radius: 16px !important;
        overflow: hidden !important;
        width: 100% !important;
        background: #F8FAFC !important;
    }

    .sf-about-image-wrapper img {
        width: 100% !important;
        height: auto !important;
        display: block !important;
        border-radius: 16px !important;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06) !important;
        transition: all 0.5s ease !important;
    }

    .sf-about-image-wrapper:hover img {
        transform: scale(1.02) !important;
    }

    .sf-about-image-accent {
        position: absolute !important;
        bottom: -20px !important;
        right: -20px !important;
        width: 120px !important;
        height: 120px !important;
        background: linear-gradient(135deg, #39FF14, #06B6D4) !important;
        border-radius: 16px !important;
        opacity: 0.05 !important;
        z-index: -1 !important;
    }

    .sf-about-image-badge {
        position: absolute !important;
        bottom: 20px !important;
        left: 20px !important;
        background: rgba(255, 255, 255, 0.92) !important;
        backdrop-filter: blur(10px) !important;
        -webkit-backdrop-filter: blur(10px) !important;
        padding: 10px 20px !important;
        border-radius: 12px !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04) !important;
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        border: 1px solid rgba(255, 255, 255, 0.3) !important;
    }

    .sf-about-image-badge span:first-child {
        font-size: 18px !important;
        color: #39FF14 !important;
        font-weight: 700 !important;
    }

    .sf-about-image-badge span:last-child {
        font-size: 12px !important;
        font-weight: 500 !important;
        color: #0F172A !important;
        letter-spacing: 0.3px !important;
    }

    .sf-about-description-image-mobile {
        display: none !important;
        margin-top: 24px !important;
    }

    .sf-about-description-image-mobile img {
        width: 100% !important;
        border-radius: 12px !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06) !important;
    }

    @media (max-width: 991px) {
        .sf-about-description-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
        }
        .sf-about-description-image {
            display: none !important;
        }
        .sf-about-description-image-mobile {
            display: block !important;
        }
        .sf-about-section-title {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-about-description {
            padding: 60px 0 !important;
        }
        .sf-about-section-title {
            font-size: 28px !important;
        }
        .sf-about-description-text,
        .sf-about-description-text p {
            font-size: 15px !important;
            line-height: 1.8 !important;
        }
    }

    @media (max-width: 480px) {
        .sf-about-description {
            padding: 40px 0 !important;
        }
        .sf-container {
            padding: 0 16px !important;
        }
        .sf-about-section-title {
            font-size: 24px !important;
        }
        .sf-about-section-badge {
            font-size: 11px !important;
        }
        .sf-about-description-text,
        .sf-about-description-text p {
            font-size: 14px !important;
            line-height: 1.7 !important;
        }
        .sf-about-image-badge {
            bottom: 14px !important;
            left: 14px !important;
            padding: 6px 14px !important;
        }
        .sf-about-image-badge span:first-child {
            font-size: 14px !important;
        }
        .sf-about-image-badge span:last-child {
            font-size: 10px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- MISSION, VISION, VALUES -->
<!-- ============================================ -->
<section class="sf-about-mvv">
    <div class="sf-container">
        <div class="sf-about-mvv-header">
            <span class="sf-about-mvv-badge">Our Foundation</span>
            <h2 class="sf-about-mvv-title">What Drives <span class="sf-text-neon">Everything We Do</span></h2>
            <p class="sf-about-mvv-subtitle">Our mission, vision, and values guide every decision we make</p>
        </div>

        <div class="sf-about-mvv-grid">
            <!-- Mission -->
            <div class="sf-about-mvv-card sf-about-mvv-card--mission">
                <div class="sf-about-mvv-card-header">
                    <div class="sf-about-mvv-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                            <path d="M2 17l10 5 10-5"/>
                            <path d="M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <h3 class="sf-about-mvv-card-title">Our Mission</h3>
                </div>
                <div class="sf-about-mvv-card-body">
                    <p class="sf-about-mvv-text">{{ $about->mission ?? 'No mission statement available.' }}</p>
                </div>
                <div class="sf-about-mvv-card-footer">
                    <span class="sf-mvv-tag">Purpose</span>
                </div>
            </div>

            <!-- Vision -->
            <div class="sf-about-mvv-card sf-about-mvv-card--vision">
                <div class="sf-about-mvv-card-header">
                    <div class="sf-about-mvv-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </div>
                    <h3 class="sf-about-mvv-card-title">Our Vision</h3>
                </div>
                <div class="sf-about-mvv-card-body">
                    <p class="sf-about-mvv-text">{{ $about->vision ?? 'No vision statement available.' }}</p>
                </div>
                <div class="sf-about-mvv-card-footer">
                    <span class="sf-mvv-tag">Aspiration</span>
                </div>
            </div>

            <!-- Values -->
            <div class="sf-about-mvv-card sf-about-mvv-card--values">
                <div class="sf-about-mvv-card-header">
                    <div class="sf-about-mvv-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2L15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2z"/>
                        </svg>
                    </div>
                    <h3 class="sf-about-mvv-card-title">Our Values</h3>
                </div>
                <div class="sf-about-mvv-card-body">
                    <p class="sf-about-mvv-text">{{ $about->about_values ?? 'No values available.' }}</p>
                </div>
                <div class="sf-about-mvv-card-footer">
                    <span class="sf-mvv-tag">Principles</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Mission Vision Values -->
<!-- ============================================ -->
<style>
    .sf-about-mvv {
        padding: 80px 0 !important;
        background: #F8FAFC !important;
    }

    .sf-about-mvv-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sf-about-mvv-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2px !important;
        color: #39FF14 !important;
        margin-bottom: 12px !important;
    }

    .sf-about-mvv-title {
        font-size: 38px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-about-mvv-subtitle {
        font-size: 18px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-weight: 300 !important;
    }

    .sf-about-mvv-grid {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 24px !important;
    }

    .sf-about-mvv-card {
        background: #FFFFFF !important;
        border-radius: 16px !important;
        padding: 32px 28px !important;
        transition: all 0.4s ease !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.02) !important;
        display: flex !important;
        flex-direction: column !important;
        height: 100% !important;
    }

    .sf-about-mvv-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 12px 50px rgba(0, 0, 0, 0.06) !important;
        border-color: rgba(57, 255, 20, 0.08) !important;
    }

    .sf-about-mvv-card--mission {
        border-top: 4px solid #39FF14 !important;
    }
    .sf-about-mvv-card--vision {
        border-top: 4px solid #06B6D4 !important;
    }
    .sf-about-mvv-card--values {
        border-top: 4px solid #0F172A !important;
    }

    .sf-about-mvv-card-header {
        display: flex !important;
        align-items: center !important;
        gap: 14px !important;
        margin-bottom: 16px !important;
        padding-bottom: 14px !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.04) !important;
    }

    .sf-about-mvv-icon {
        width: 48px !important;
        height: 48px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        flex-shrink: 0 !important;
        background: rgba(57, 255, 20, 0.06) !important;
        color: #39FF14 !important;
    }

    .sf-about-mvv-card--vision .sf-about-mvv-icon {
        background: rgba(6, 182, 212, 0.06) !important;
        color: #06B6D4 !important;
    }

    .sf-about-mvv-card--values .sf-about-mvv-icon {
        background: rgba(15, 23, 42, 0.06) !important;
        color: #0F172A !important;
    }

    .sf-about-mvv-icon svg {
        width: 28px !important;
        height: 28px !important;
        stroke: currentColor !important;
    }

    .sf-about-mvv-card-title {
        font-size: 20px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-about-mvv-card-body {
        flex: 1 !important;
        margin-bottom: 16px !important;
    }

    .sf-about-mvv-text {
        font-size: 15px !important;
        line-height: 1.8 !important;
        color: #4B5563 !important;
        margin: 0 !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }

    .sf-about-mvv-card-footer {
        padding-top: 14px !important;
        border-top: 1px solid rgba(0, 0, 0, 0.03) !important;
    }

    .sf-mvv-tag {
        display: inline-block !important;
        font-size: 11px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
        padding: 3px 14px !important;
        border-radius: 12px !important;
        background: rgba(57, 255, 20, 0.04) !important;
        color: #39FF14 !important;
    }

    .sf-about-mvv-card--vision .sf-mvv-tag {
        background: rgba(6, 182, 212, 0.04) !important;
        color: #06B6D4 !important;
    }

    .sf-about-mvv-card--values .sf-mvv-tag {
        background: rgba(15, 23, 42, 0.04) !important;
        color: #0F172A !important;
    }

    @media (max-width: 991px) {
        .sf-about-mvv-grid {
            grid-template-columns: 1fr 1fr !important;
        }
        .sf-about-mvv-title {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-about-mvv {
            padding: 60px 0 !important;
        }
        .sf-about-mvv-title {
            font-size: 28px !important;
        }
        .sf-about-mvv-subtitle {
            font-size: 16px !important;
        }
        .sf-about-mvv-grid {
            grid-template-columns: 1fr !important;
            gap: 16px !important;
        }
        .sf-about-mvv-card {
            padding: 24px 20px !important;
        }
        .sf-about-mvv-card-title {
            font-size: 18px !important;
        }
        .sf-about-mvv-text {
            font-size: 14px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-about-mvv {
            padding: 40px 0 !important;
        }
        .sf-container {
            padding: 0 16px !important;
        }
        .sf-about-mvv-title {
            font-size: 24px !important;
        }
        .sf-about-mvv-subtitle {
            font-size: 14px !important;
        }
        .sf-about-mvv-card {
            padding: 20px 16px !important;
        }
        .sf-about-mvv-card-title {
            font-size: 17px !important;
        }
        .sf-about-mvv-text {
            font-size: 13px !important;
            line-height: 1.7 !important;
        }
        .sf-about-mvv-card-header {
            gap: 10px !important;
            margin-bottom: 12px !important;
            padding-bottom: 10px !important;
        }
        .sf-about-mvv-icon {
            width: 40px !important;
            height: 40px !important;
        }
        .sf-about-mvv-icon svg {
            width: 22px !important;
            height: 22px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- ABOUT STATS -->
<!-- ============================================ -->
<section class="sf-about-stats">
    <div class="sf-container">
        <div class="sf-about-stats-grid">
            <div class="sf-about-stat">
                <span class="sf-about-stat-number" data-count="40">0</span>
                <span class="sf-about-stat-label">Gamified Programs Shipped</span>
            </div>
            <div class="sf-about-stat-divider"></div>
            <div class="sf-about-stat">
                <span class="sf-about-stat-number" data-count="3">0</span>
                <span class="sf-about-stat-label">Continents Served</span>
            </div>
            <div class="sf-about-stat-divider"></div>
            <div class="sf-about-stat">
                <span class="sf-about-stat-number" data-count="92">0</span>
                <span class="sf-about-stat-label">Avg. Learner Completion Rate</span>
            </div>
            <div class="sf-about-stat-divider"></div>
            <div class="sf-about-stat">
                <span class="sf-about-stat-number" data-count="5.0">0</span>
                <span class="sf-about-stat-label">Client Satisfaction Rating</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Stats -->
<!-- ============================================ -->
<style>
    .sf-about-stats {
        padding: 60px 0 !important;
        background: #0F172A !important;
    }

    .sf-about-stats-grid {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        align-items: center !important;
        gap: 0 !important;
    }

    .sf-about-stat {
        text-align: center !important;
        padding: 0 16px !important;
    }

    .sf-about-stat-number {
        display: block !important;
        font-size: 44px !important;
        font-weight: 800 !important;
        color: #39FF14 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        line-height: 1.1 !important;
    }

    .sf-about-stat-label {
        display: block !important;
        font-size: 13px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin-top: 4px !important;
    }

    .sf-about-stat-divider {
        width: 1px !important;
        height: 50px !important;
        background: rgba(255, 255, 255, 0.06) !important;
        flex-shrink: 0 !important;
    }

    @media (max-width: 991px) {
        .sf-about-stats-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 24px !important;
        }
        .sf-about-stat-divider {
            display: none !important;
        }
    }

    @media (max-width: 768px) {
        .sf-about-stats {
            padding: 40px 0 !important;
        }
        .sf-about-stats-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 16px !important;
        }
        .sf-about-stat-number {
            font-size: 34px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-about-stats-grid {
            grid-template-columns: 1fr !important;
            gap: 12px !important;
        }
        .sf-about-stat-number {
            font-size: 30px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- ABOUT CTA -->
<!-- ============================================ -->
<section class="sf-about-cta">
    <div class="sf-container">
        <div class="sf-about-cta-content">
            <h2 class="sf-about-cta-title">Ready to Transform Your Learning?</h2>
            <p class="sf-about-cta-text">Let's work together to create learning experiences that deliver real results.</p>
            <a href="{{ route('contact') }}" class="sf-about-cta-btn">Get in Touch →</a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — CTA -->
<!-- ============================================ -->
<style>
    .sf-about-cta {
        padding: 80px 0 !important;
        background: #0F172A !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
    }

    .sf-about-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
    }

    .sf-about-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-about-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }

    .sf-about-cta-btn {
        display: inline-block !important;
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

    .sf-about-cta-btn:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(57, 255, 20, 0.15) !important;
    }

    @media (max-width: 768px) {
        .sf-about-cta {
            padding: 60px 0 !important;
        }
        .sf-about-cta-title {
            font-size: 28px !important;
        }
        .sf-about-cta-text {
            font-size: 16px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-about-cta {
            padding: 40px 0 !important;
        }
        .sf-about-cta-title {
            font-size: 24px !important;
        }
        .sf-about-cta-btn {
            padding: 12px 32px !important;
            font-size: 15px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- HERO STYLES -->
<!-- ============================================ -->
<style>
    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sf-text-neon {
        color: #39FF14 !important;
    }

    .sf-about-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 450px !important;
        display: flex !important;
        align-items: center !important;
    }

    .sf-about-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }

    .sf-about-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }

    .sf-about-hero-badge {
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
    }

    .sf-about-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }

    .sf-about-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
    }

    @media (max-width: 991px) {
        .sf-about-hero-title {
            font-size: 40px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-about-hero {
            padding: 80px 0 !important;
            min-height: 350px !important;
        }
        .sf-about-hero-title {
            font-size: 32px !important;
        }
        .sf-about-hero-subtitle {
            font-size: 17px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }
        .sf-about-hero-title {
            font-size: 26px !important;
        }
        .sf-about-hero-subtitle {
            font-size: 15px !important;
        }
        .sf-about-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- SCRIPTS — Counter Animation -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.sf-about-stat-number');

        const animateCounter = (counter) => {
            const target = parseFloat(counter.getAttribute('data-count'));
            const isDecimal = target % 1 !== 0;
            const duration = 2000;
            const startTime = performance.now();
            const startValue = 0;

            const updateCounter = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                const currentValue = eased * target;

                if (isDecimal) {
                    counter.textContent = currentValue.toFixed(1);
                } else {
                    counter.textContent = Math.floor(currentValue);
                }

                if (progress < 1) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = isDecimal ? target.toFixed(1) : target;
                }
            };

            requestAnimationFrame(updateCounter);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    if (!counter.dataset.animated) {
                        counter.dataset.animated = 'true';
                        animateCounter(counter);
                    }
                }
            });
        }, { threshold: 0.3 });

        counters.forEach(counter => observer.observe(counter));
    });
</script>

@endsection