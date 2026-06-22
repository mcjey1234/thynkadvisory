<!-- ============================================ -->
<!-- SERVICE DETAIL — Single Service Page -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', $service->title ?? 'Service Detail - Sofel Labs')
@section('body_class', 'page-service-detail')

@section('content')

<!-- ============================================ -->
<!-- SERVICE DETAIL HERO -->
<!-- ============================================ -->
<section class="sf-service-detail-hero" style="background-image: url('{{ $service->image_url ?? asset('wp-content/uploads/images/services-bg.jpg') }}');">
    <div class="sf-service-detail-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-service-detail-hero-content">
            <span class="sf-service-detail-hero-badge">Service Detail</span>
            <h1 class="sf-service-detail-hero-title">{{ $service->title }}</h1>
            @if($service->icon)
            <div class="sf-service-detail-icon">
                <i class="{{ $service->icon }}"></i>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SERVICE DETAIL CONTENT -->
<!-- ============================================ -->
<section class="sf-service-detail-content">
    <div class="sf-container">
        <div class="sf-service-detail-grid">
            @if($service->image)
            <div class="sf-service-detail-image">
                <img src="{{ $service->image_url }}" alt="{{ $service->title }}">
            </div>
            @endif
            <div class="sf-service-detail-text">
                <h2 class="sf-service-detail-title">About This Service</h2>
                <div class="sf-service-detail-description">
                    {!! nl2br(e($service->description)) !!}
                </div>
                <a href="{{ route('contact') }}" class="sf-service-detail-btn">Get Started →</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- BACK TO SERVICES -->
<!-- ============================================ -->
<section class="sf-service-detail-back">
    <div class="sf-container">
        <a href="{{ route('services') }}" class="sf-service-detail-back-btn">← Back to All Services</a>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Service Detail -->
<!-- ============================================ -->
<style>
    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sf-service-detail-hero {
        position: relative !important;
        padding: 100px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 400px !important;
        display: flex !important;
        align-items: center !important;
    }

    .sf-service-detail-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }

    .sf-service-detail-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }

    .sf-service-detail-hero-badge {
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
    }

    .sf-service-detail-hero-title {
        font-size: 48px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }

    .sf-service-detail-icon {
        font-size: 48px !important;
        color: #47C89F !important;
        margin-top: 8px !important;
    }

    .sf-service-detail-content {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
    }

    .sf-service-detail-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 60px !important;
        align-items: center !important;
    }

    .sf-service-detail-image img {
        width: 100% !important;
        border-radius: 16px !important;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06) !important;
    }

    .sf-service-detail-title {
        font-size: 32px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 20px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-service-detail-description {
        font-size: 16px !important;
        line-height: 1.9 !important;
        color: #4A5A6E !important;
        margin-bottom: 24px !important;
    }

    .sf-service-detail-description p {
        margin-bottom: 16px !important;
    }

    .sf-service-detail-btn {
        display: inline-block !important;
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

    .sf-service-detail-btn:hover {
        background: #3AAF8A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(71, 200, 159, 0.15) !important;
    }

    .sf-service-detail-back {
        padding: 40px 0 !important;
        background: #F8FAFB !important;
    }

    .sf-service-detail-back-btn {
        color: #47C89F !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-service-detail-back-btn:hover {
        color: #3AAF8A !important;
        transform: translateX(-4px) !important;
    }

    @media (max-width: 991px) {
        .sf-service-detail-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
        }

        .sf-service-detail-hero-title {
            font-size: 36px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-service-detail-hero {
            padding: 60px 0 !important;
            min-height: 300px !important;
        }

        .sf-service-detail-hero-title {
            font-size: 28px !important;
        }

        .sf-service-detail-content {
            padding: 60px 0 !important;
        }

        .sf-service-detail-title {
            font-size: 26px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }

        .sf-service-detail-hero-title {
            font-size: 24px !important;
        }

        .sf-service-detail-title {
            font-size: 22px !important;
        }

        .sf-service-detail-description {
            font-size: 14px !important;
        }
    }
</style>

@endsection