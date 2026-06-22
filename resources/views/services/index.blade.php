<!-- ============================================ -->
<!-- SERVICES — Classic Professional Design -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', 'Our Services - Sofel Labs')
@section('body_class', 'page-services')

@section('content')

<!-- ============================================ -->
<!-- SERVICES HERO BANNER -->
<!-- ============================================ -->
<section class="sf-services-hero" style="background-image: url('{{ asset('wp-content/uploads/images/services-bg.jpg') }}');">
    <div class="sf-services-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-services-hero-content">
            <span class="sf-services-hero-badge">Our Services</span>
            <h1 class="sf-services-hero-title">What <span class="sf-text-teal">We Do</span></h1>
            <p class="sf-services-hero-subtitle">Comprehensive learning solutions designed to transform your organization</p>
            <div class="sf-services-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SERVICES GRID -->
<!-- ============================================ -->
<section class="sf-services-grid-section">
    <div class="sf-container">
        <div class="sf-services-header">
            <span class="sf-services-section-badge">Our Expertise</span>
            <h2 class="sf-services-section-title">Solutions That <span class="sf-text-teal">Deliver Results</span></h2>
            <div class="sf-services-header-line"></div>
            <p class="sf-services-section-subtitle">Explore our range of professional services designed to meet your unique needs</p>
        </div>

        @if($services->count() > 0)
        <div class="sf-services-grid">
            @foreach($services as $service)
            <div class="sf-service-card">
                <div class="sf-service-card-inner">
                    @if($service->image)
                    <div class="sf-service-card-image">
                        <img src="{{ $service->image_url }}" alt="{{ $service->title }}">
                        <div class="sf-service-card-overlay"></div>
                    </div>
                    @else
                    <div class="sf-service-card-icon">
                        @if($service->icon)
                            <i class="{{ $service->icon }}"></i>
                        @else
                            <i class="fas fa-cogs"></i>
                        @endif
                    </div>
                    @endif
                    <div class="sf-service-card-content">
                        <h3 class="sf-service-card-title">{{ $service->title }}</h3>
                        <div class="sf-service-card-description">
                            {!! nl2br(e($service->description)) !!}
                        </div>
                        <a href="{{ route('services.show', $service->id) }}" class="sf-service-card-btn">
                            Learn More
                            <span class="sf-btn-arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="sf-services-empty">
            <p>No services available at the moment. Please check back later.</p>
        </div>
        @endif
    </div>
</section>

<!-- ============================================ -->
<!-- SERVICES CTA -->
<!-- ============================================ -->
<section class="sf-services-cta">
    <div class="sf-container">
        <div class="sf-services-cta-content">
            <h2 class="sf-services-cta-title">Ready to <span class="sf-text-teal">Transform</span> Your Learning?</h2>
            <p class="sf-services-cta-text">Let's discuss how our services can help you achieve your goals.</p>
            <a href="{{ route('contact') }}" class="sf-services-cta-btn">
                Contact Us
                <span class="sf-cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Classic Services Page -->
<!-- ============================================ -->
<style>
    /* ============================================
       SERVICES PAGE — Classic Professional Design
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
    .sf-services-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 450px !important;
        display: flex !important;
        align-items: center !important;
    }

    .sf-services-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }

    .sf-services-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }

    .sf-services-hero-badge {
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

    .sf-services-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
        animation: sfFadeInUp 0.8s ease forwards !important;
    }

    .sf-services-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
        animation: sfFadeInUp 1s ease forwards !important;
    }

    .sf-services-hero-line {
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
       GRID SECTION
       ============================================ */
    .sf-services-grid-section {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
    }

    .sf-services-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sf-services-section-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #47C89F !important;
        margin-bottom: 12px !important;
    }

    .sf-services-section-title {
        font-size: 38px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-services-header-line {
        width: 40px !important;
        height: 2px !important;
        background: linear-gradient(90deg, #47C89F, #9ACA43) !important;
        border-radius: 4px !important;
        margin: 0 auto 12px !important;
    }

    .sf-services-section-subtitle {
        font-size: 18px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-weight: 300 !important;
    }

    /* ============================================
       SERVICES GRID
       ============================================ */
    .sf-services-grid {
        display: grid !important;
        grid-template-columns: repeat(3, 1fr) !important;
        gap: 30px !important;
    }

    .sf-service-card {
        background: #FFFFFF !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        border-radius: 16px !important;
        overflow: hidden !important;
        transition: all 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.02) !important;
        display: flex !important;
        flex-direction: column !important;
        position: relative !important;
    }

    .sf-service-card:hover {
        transform: translateY(-8px) !important;
        box-shadow: 0 12px 50px rgba(0, 0, 0, 0.06) !important;
        border-color: rgba(71, 200, 159, 0.08) !important;
    }

    .sf-service-card-inner {
        display: flex !important;
        flex-direction: column !important;
        height: 100% !important;
    }

    /* ---- Card Image ---- */
    .sf-service-card-image {
        width: 100% !important;
        height: 220px !important;
        overflow: hidden !important;
        background: #F8FAFB !important;
        position: relative !important;
    }

    .sf-service-card-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    }

    .sf-service-card:hover .sf-service-card-image img {
        transform: scale(1.05) !important;
    }

    .sf-service-card-overlay {
        position: absolute !important;
        bottom: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 60% !important;
        background: linear-gradient(180deg, transparent, rgba(0, 0, 0, 0.02)) !important;
    }

    /* ---- Card Icon ---- */
    .sf-service-card-icon {
        padding: 30px 0 20px 0 !important;
        text-align: center !important;
        font-size: 48px !important;
        color: #47C89F !important;
        background: rgba(71, 200, 159, 0.02) !important;
        transition: all 0.4s ease !important;
    }

    .sf-service-card:hover .sf-service-card-icon {
        transform: scale(1.05) !important;
    }

    .sf-service-card-icon i {
        font-size: 48px !important;
    }

    /* ---- Card Content ---- */
    .sf-service-card-content {
        padding: 24px 24px 28px 24px !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
    }

    .sf-service-card-title {
        font-size: 20px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        transition: color 0.3s ease !important;
    }

    .sf-service-card:hover .sf-service-card-title {
        color: #47C89F !important;
    }

    .sf-service-card-description {
        font-size: 15px !important;
        line-height: 1.8 !important;
        color: #4A5A6E !important;
        flex: 1 !important;
        margin-bottom: 16px !important;
    }

    .sf-service-card-description p {
        margin-bottom: 12px !important;
    }

    .sf-service-card-description p:last-child {
        margin-bottom: 0 !important;
    }

    /* ---- Card Button ---- */
    .sf-service-card-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 10px 24px !important;
        border: 1px solid rgba(71, 200, 159, 0.15) !important;
        border-radius: 30px !important;
        color: #47C89F !important;
        text-decoration: none !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        align-self: flex-start !important;
        background: transparent !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .sf-service-card-btn::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: -100% !important;
        width: 100% !important;
        height: 100% !important;
        background: #47C89F !important;
        transition: left 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        z-index: 0 !important;
        border-radius: 30px !important;
    }

    .sf-service-card-btn:hover::before {
        left: 0 !important;
    }

    .sf-service-card-btn span,
    .sf-service-card-btn i {
        position: relative !important;
        z-index: 1 !important;
        transition: all 0.3s ease !important;
    }

    .sf-service-card-btn:hover {
        border-color: #47C89F !important;
        color: #FFFFFF !important;
        transform: translateX(4px) !important;
        box-shadow: 0 4px 20px rgba(71, 200, 159, 0.2) !important;
    }

    .sf-btn-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }

    .sf-service-card-btn:hover .sf-btn-arrow {
        transform: translateX(4px) !important;
    }

    /* ---- Empty State ---- */
    .sf-services-empty {
        text-align: center !important;
        padding: 60px 0 !important;
        color: #6B7C93 !important;
        font-size: 18px !important;
    }

    /* ============================================
       CTA SECTION
       ============================================ */
    .sf-services-cta {
        padding: 80px 0 !important;
        background: linear-gradient(135deg, #0A0610 0%, #1A0A18 100%) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .sf-services-cta::before {
        content: '' !important;
        position: absolute !important;
        top: -50% !important;
        right: -20% !important;
        width: 600px !important;
        height: 600px !important;
        background: radial-gradient(circle, rgba(71, 200, 159, 0.03) 0%, transparent 70%) !important;
        border-radius: 50% !important;
        pointer-events: none !important;
    }

    .sf-services-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
        position: relative !important;
        z-index: 1 !important;
    }

    .sf-services-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-services-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }

    .sf-services-cta-btn {
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
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-services-cta-btn:hover {
        background: #3AAF8A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(71, 200, 159, 0.15) !important;
    }

    .sf-cta-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }

    .sf-services-cta-btn:hover .sf-cta-arrow {
        transform: translateX(4px) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sf-services-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 24px !important;
        }

        .sf-services-hero-title {
            font-size: 40px !important;
        }

        .sf-services-section-title {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-services-hero {
            padding: 80px 0 !important;
            min-height: 350px !important;
        }

        .sf-services-hero-title {
            font-size: 32px !important;
        }

        .sf-services-hero-subtitle {
            font-size: 17px !important;
        }

        .sf-services-grid-section {
            padding: 60px 0 !important;
        }

        .sf-services-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }

        .sf-service-card-image {
            height: 180px !important;
        }

        .sf-services-section-title {
            font-size: 28px !important;
        }

        .sf-services-section-subtitle {
            font-size: 16px !important;
        }

        .sf-service-card-title {
            font-size: 18px !important;
        }

        .sf-service-card-description {
            font-size: 14px !important;
        }

        .sf-services-cta {
            padding: 60px 0 !important;
        }

        .sf-services-cta-title {
            font-size: 28px !important;
        }

        .sf-services-cta-text {
            font-size: 16px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }

        .sf-services-hero-title {
            font-size: 26px !important;
        }

        .sf-services-hero-subtitle {
            font-size: 15px !important;
        }

        .sf-services-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }

        .sf-services-hero-line {
            width: 40px !important;
            height: 2px !important;
        }

        .sf-services-section-title {
            font-size: 24px !important;
        }

        .sf-services-section-badge {
            font-size: 11px !important;
        }

        .sf-services-section-subtitle {
            font-size: 14px !important;
        }

        .sf-service-card {
            border-radius: 12px !important;
        }

        .sf-service-card-image {
            height: 150px !important;
        }

        .sf-service-card-content {
            padding: 18px 16px 20px 16px !important;
        }

        .sf-service-card-title {
            font-size: 17px !important;
        }

        .sf-service-card-description {
            font-size: 13px !important;
            line-height: 1.7 !important;
        }

        .sf-service-card-btn {
            font-size: 13px !important;
            padding: 8px 18px !important;
        }

        .sf-services-cta-title {
            font-size: 24px !important;
        }

        .sf-services-cta-btn {
            padding: 12px 32px !important;
            font-size: 15px !important;
        }
    }
</style>

@endsection