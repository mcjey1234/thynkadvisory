@extends('layouts.public')

@section('title', 'THYNK — Mobile & Web Apps · Geospatial · Design · Deployment')

@push('head')
    <meta property="og:title" content="THYNK — Mobile & Web Apps · Geospatial · Design · Deployment">
    <meta property="og:description" content="End-to-end digital solutions in Kenya: mobile apps, web applications, GIS, eLearning, and deployment. We build what you need, not just what you ask for.">
    <meta name="description" content="End-to-end digital solutions in Kenya: mobile apps, web applications, GIS, eLearning, and deployment. We build what you need, not just what you ask for.">
@endpush

@section('body_class', 'thynk-home')

@section('content')

@php
    $bannerItems = isset($banners) && $banners->count() > 0 ? $banners : collect();
    if ($bannerItems->count() == 0) {
        $bannerItems = collect([
            (object) ['image' => null]
        ]);
    }
@endphp

<!-- ============================================ -->
<!-- HERO SECTION -->
<!-- ============================================ -->
<!-- ============================================ -->
<!-- HERO BANNER CAROUSEL - WITH TK CONTENT -->
<!-- ============================================ -->
<section class="sl-hero">
    <div class="sl-hero-container">
        <div class="sl-hero-wrapper" id="slHeroWrapper">
            @foreach($bannerItems as $index => $banner)
                <div class="sl-hero-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                    <div class="sl-hero-image" style="background-image: url('{{ $banner->image ? asset('storage/' . $banner->image) : asset('wp-content/uploads/2021/10/waitingroomArtboard-1.png') }}');"></div>
                </div>
            @endforeach
        </div>
        @if($bannerItems->count() > 1)
        <div class="sl-hero-dots">
            @foreach($bannerItems as $index => $banner)
                <button class="sl-hero-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}" onclick="goToSlide({{ $index }})"></button>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- ============================================ -->
<!-- HERO STYLES -->
<!-- ============================================ -->
<style>
    /* ============================================
       SL HERO — Banner Only, Udemy Style
       ============================================ */

    .sl-hero {
        position: relative !important;
        width: 100% !important;
        overflow: hidden !important;
        background: #FFFFFF !important;
        padding: 40px 0 !important;
        min-height: auto !important;
        display: block !important;
    }

    .sl-hero-container {
        width: 100% !important;
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 20px !important;
        position: relative !important;
        z-index: 2 !important;
    }

    .sl-hero-wrapper {
        position: relative !important;
        width: 100% !important;
        aspect-ratio: 1920/600 !important;
        max-height: 600px !important;
        border-radius: 12px !important;
        overflow: hidden !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.04) !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
        background: #f8fafb !important;
    }

    .sl-hero-slide {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        opacity: 0 !important;
        transition: opacity 0.6s ease !important;
        border-radius: 12px !important;
        overflow: hidden !important;
    }

    .sl-hero-slide.active {
        opacity: 1 !important;
        position: relative !important;
    }

    .sl-hero-image {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 100% !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        transition: transform 8s ease !important;
    }

    .sl-hero-slide.active .sl-hero-image {
        transform: scale(1.02) !important;
    }

    /* ---- Dots ---- */
    .sl-hero-dots {
        position: absolute !important;
        bottom: 16px !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        display: flex !important;
        gap: 8px !important;
        z-index: 10 !important;
        background: rgba(0, 0, 0, 0.25) !important;
        padding: 5px 12px !important;
        border-radius: 20px !important;
        backdrop-filter: blur(4px) !important;
    }

    .sl-hero-dot {
        width: 8px !important;
        height: 8px !important;
        border-radius: 50% !important;
        border: none !important;
        background: rgba(255, 255, 255, 0.35) !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        padding: 0 !important;
    }

    .sl-hero-dot:hover {
        transform: scale(1.3) !important;
        background: rgba(255, 255, 255, 0.7) !important;
    }

    .sl-hero-dot.active {
        background: #EE6F20 !important;
        transform: scale(1.3) !important;
        box-shadow: 0 0 12px rgba(238, 111, 32, 0.3) !important;
    }

    /* ============================================
       RESPONSIVE - FIXED: FULL IMAGE VISIBLE
       ============================================ */
    @media (max-width: 1200px) {
        .sl-hero-wrapper {
            aspect-ratio: 16/5 !important;
            max-height: 480px !important;
        }
        
        .sl-hero-image {
            background-size: contain !important;
            background-color: #f8fafb !important;
        }
    }

    @media (max-width: 991px) {
        .sl-hero {
            padding: 30px 0 !important;
        }

        .sl-hero-wrapper {
            aspect-ratio: 16/6 !important;
            max-height: 400px !important;
            border-radius: 10px !important;
        }
        
        .sl-hero-image {
            background-size: contain !important;
            background-color: #f8fafb !important;
        }
    }

    @media (max-width: 768px) {
        .sl-hero {
            padding: 15px 0 !important;
        }

        .sl-hero-wrapper {
            aspect-ratio: 16/8 !important;
            max-height: 350px !important;
            border-radius: 8px !important;
        }

        .sl-hero-dots {
            bottom: 10px !important;
            padding: 4px 10px !important;
            gap: 6px !important;
        }

        .sl-hero-dot {
            width: 7px !important;
            height: 7px !important;
        }
        
        .sl-hero-container {
            padding: 0 12px !important;
        }
        
        .sl-hero-image {
            background-size: contain !important;
            background-color: #f8fafb !important;
        }
    }

    @media (max-width: 480px) {
        .sl-hero {
            padding: 10px 0 !important;
        }

        .sl-hero-wrapper {
            aspect-ratio: 16/10 !important;
            max-height: 280px !important;
            border-radius: 6px !important;
        }

        .sl-hero-dots {
            bottom: 8px !important;
            padding: 3px 8px !important;
            gap: 5px !important;
        }

        .sl-hero-dot {
            width: 6px !important;
            height: 6px !important;
        }
        
        .sl-hero-container {
            padding: 0 8px !important;
        }
        
        .sl-hero-image {
            background-size: contain !important;
            background-color: #f8fafb !important;
            background-position: center !important;
        }
    }
    
    /* Extra small devices */
    @media (max-width: 380px) {
        .sl-hero-wrapper {
            aspect-ratio: 16/11 !important;
            max-height: 220px !important;
            border-radius: 4px !important;
        }
        
        .sl-hero-dots {
            bottom: 5px !important;
            padding: 2px 6px !important;
            gap: 4px !important;
        }
        
        .sl-hero-dot {
            width: 5px !important;
            height: 5px !important;
        }
        
        .sl-hero-image {
            background-size: contain !important;
            background-color: #f8fafb !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- HERO SCRIPT -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.sl-hero-slide');
    const dots = document.querySelectorAll('.sl-hero-dot');
    let currentSlide = 0;
    let slideInterval;
    const intervalTime = 8000;

    function goToSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.add('active');
        }
        currentSlide = index;
    }

    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        goToSlide(next);
    }

    window.goToSlide = goToSlide;

    function startAutoSlide() {
        if (slides.length > 1) {
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    }

    function stopAutoSlide() {
        if (slideInterval) {
            clearInterval(slideInterval);
            slideInterval = null;
        }
    }

    // Pause on dot click
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            stopAutoSlide();
            goToSlide(index);
            setTimeout(startAutoSlide, 8000);
        });
    });

    // Pause on hover
    const wrapper = document.querySelector('.sl-hero-wrapper');
    if (wrapper) {
        wrapper.addEventListener('mouseenter', stopAutoSlide);
        wrapper.addEventListener('mouseleave', function() {
            if (slides.length > 1) {
                startAutoSlide();
            }
        });
    }

    if (slides.length > 0) {
        goToSlide(0);
        startAutoSlide();
    }

    // Preload images
    slides.forEach(slide => {
        const bg = slide.querySelector('.sl-hero-image');
        if (bg) {
            const img = new Image();
            img.src = bg.style.backgroundImage.replace(/url\(['"]?(.*?)['"]?\)/i, '$1');
        }
    });
});
</script>

<!-- ============================================ -->
<!-- TRUST METRICS STRIP -->
<!-- ============================================ -->
<section class="tk-metrics">
    <div class="tk-container">
        <div class="tk-metrics-grid">
            <div class="tk-metric-item">
                <span class="tk-metric-num" style="color:#2563EB;">Android & iOS</span>
                <span class="tk-metric-label">Native & Cross-Platform</span>
            </div>
            <div class="tk-metric-divider"></div>
            <div class="tk-metric-item">
                <span class="tk-metric-num" style="color:#39FF14;">GIS Ready</span>
                <span class="tk-metric-label">Geospatial Solutions</span>
            </div>
            <div class="tk-metric-divider"></div>
            <div class="tk-metric-item">
                <span class="tk-metric-num" style="color:#06B6D4;">Full-Stack</span>
                <span class="tk-metric-label">Design to Deployment</span>
            </div>
            <div class="tk-metric-divider"></div>
            <div class="tk-metric-item">
                <span class="tk-metric-num" style="color:#4B5563;">Gamification</span>
                <span class="tk-metric-label">Instructional Design · eLearning</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SERVICES SECTION -->
<!-- ============================================ -->
<section class="tk-section tk-bg-dark tk-reveal" id="services">
    <div class="tk-container">
        <div class="tk-section-header">
            <span class="tk-badge tk-badge--cyan">What We Do</span>
            <h2 class="tk-heading-xl" style="color:#0F172A;">End-to-End Digital <span style="color:#39FF14;">Solutions</span></h2>
            <p class="tk-body-lg" style="color:#4B5563;">From the first wireframe to live deployment — we cover every layer of the digital stack, for every platform your users are on.</p>
        </div>

        <div class="tk-services-grid">
            <!-- Mobile Apps -->
            <div class="tk-service-card tk-service-card--featured">
                <div class="tk-service-glow"></div>
                <div class="tk-service-icon-wrap" style="background:rgba(57,255,20,0.08); border-color:rgba(57,255,20,0.25);">
                    <i class="fas fa-mobile-alt" style="color:#39FF14;"></i>
                </div>
                <h3 class="tk-service-title">Mobile Applications</h3>
                <p class="tk-service-text">Native and cross-platform apps for Android and iOS. We build with Flutter, React Native, and native SDKs — choosing the right stack for your performance, budget, and user experience goals.</p>
                <div class="tk-service-tags">
                    <span>Android</span><span>iOS</span><span>Flutter</span><span>React Native</span>
                </div>
                <div class="tk-service-devices">
                    <span class="tk-device-pill"><i class="fab fa-android"></i> Android</span>
                    <span class="tk-device-pill"><i class="fab fa-apple"></i> iOS</span>
                </div>
            </div>

            <!-- Web Applications -->
            <div class="tk-service-card">
                <div class="tk-service-icon-wrap" style="background:rgba(6,182,212,0.12); border-color:rgba(6,182,212,0.25);">
                    <i class="fas fa-code" style="color:#06B6D4;"></i>
                </div>
                <h3 class="tk-service-title">Web Applications</h3>
                <p class="tk-service-text">Scalable, fast, and secure web platforms built with modern frameworks. From MVPs to enterprise-grade systems — we architect for growth and maintainability.</p>
                <div class="tk-service-tags">
                    <span>React</span><span>Laravel</span><span>Vue</span><span>Node.js</span>
                </div>
            </div>

            <!-- Geospatial -->
            <div class="tk-service-card">
                <div class="tk-service-icon-wrap" style="background:rgba(57,255,20,0.08); border-color:rgba(57,255,20,0.2);">
                    <i class="fas fa-map-marked-alt" style="color:#39FF14;"></i>
                </div>
                <h3 class="tk-service-title">Geospatial & GIS</h3>
                <p class="tk-service-text">Interactive maps, spatial data analysis, and location-aware systems. We turn complex geographic data into intuitive tools for decision-making, field operations, and urban planning.</p>
                <div class="tk-service-tags">
                    <span>Mapbox</span><span>GeoJSON</span><span>QGIS</span><span>PostGIS</span>
                </div>
            </div>

            <!-- Instructional Design & Gamification -->
            <div class="tk-service-card">
                <div class="tk-service-icon-wrap" style="background:rgba(57,255,20,0.08); border-color:rgba(57,255,20,0.2);">
                    <i class="fas fa-graduation-cap" style="color:#39FF14;"></i>
                </div>
                <h3 class="tk-service-title">Instructional Design &amp; Gamification</h3>
                <p class="tk-service-text">Engaging eLearning experiences with gamification, AI-powered video (Synthesia), and professional course authoring (Articulate). We design learning that people actually want to complete.</p>
                <div class="tk-service-tags">
                    <span>Gamification</span><span>Articulate</span><span>Synthesia</span><span>eLearning</span>
                </div>
            </div>

            <!-- Deployment & DevOps -->
            <div class="tk-service-card">
                <div class="tk-service-icon-wrap" style="background:rgba(6,182,212,0.12); border-color:rgba(6,182,212,0.25);">
                    <i class="fas fa-rocket" style="color:#06B6D4;"></i>
                </div>
                <h3 class="tk-service-title">Deployment & DevOps</h3>
                <p class="tk-service-text">We don't just build — we ship. CI/CD pipelines, cloud infrastructure, server configuration, and app store deployment. Your product goes live and stays live.</p>
                <div class="tk-service-tags">
                    <span>AWS</span><span>Docker</span><span>App Store</span><span>Play Store</span>
                </div>
            </div>

            <!-- Consultation -->
            <div class="tk-service-card tk-service-card--cta">
                <div class="tk-service-cta-inner">
                    <div class="tk-neon-circle">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3 style="color:#0F172A; font-size:20px; font-weight:700; margin:0 0 10px; font-family:'Inter',sans-serif;">Not Sure Where to Start?</h3>
                    <p style="color:#4B5563; font-size:14px; line-height:1.7; margin:0 0 20px;">Book a free discovery call. We'll map out the right solution for your goals and budget — no pressure, no jargon.</p>
                    <a href="https://cal.com/thynk-consulatation" class="tk-btn tk-btn--neon" id="Book2">Book Free Call</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- MOBILE APPS DEEP DIVE -->
<!-- ============================================ -->
<section class="tk-section tk-bg-navy tk-reveal" id="mobile">
    <div class="tk-container">
        <div class="tk-split-grid">
            <div class="tk-split-content">
                <span class="tk-badge tk-badge--blue">Mobile First</span>
                <h2 class="tk-heading-xl tk-text-white" style="margin-top:14px;">Android & iOS Apps<br><span class="tk-grad-text">Built to Perform</span></h2>
                <p class="tk-body-lg tk-text-muted" style="margin:16px 0 28px;">We build real mobile applications — not glorified websites wrapped in a shell. Whether you need a consumer app on the Play Store, an enterprise iOS tool, or a cross-platform product on both — we build it right.</p>

                <div class="tk-feature-list">
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#2563EB;"></span>
                        <div>
                            <strong>Native Performance</strong>
                            <p>Android (Kotlin/Java) and iOS (Swift) native builds when performance is non-negotiable.</p>
                        </div>
                    </div>
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#06B6D4;"></span>
                        <div>
                            <strong>Cross-Platform Efficiency</strong>
                            <p>Flutter and React Native for one codebase, two platforms, faster time-to-market.</p>
                        </div>
                    </div>
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#39FF14;"></span>
                        <div>
                            <strong>App Store to Live</strong>
                            <p>We handle submission, App Store Optimization, and post-launch monitoring.</p>
                        </div>
                    </div>
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#2563EB;"></span>
                        <div>
                            <strong>Offline-First Architecture</strong>
                            <p>Apps that work in low-connectivity environments — critical for field and rural use cases.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tk-split-visual">
                <div class="tk-phone-mockup">
                    <div class="tk-phone-frame">
                        <div class="tk-phone-screen">
                            <div class="tk-phone-status-bar">
                                <span>9:41</span>
                                <span class="tk-phone-icons"><i class="fas fa-wifi"></i> <i class="fas fa-battery-full"></i></span>
                            </div>
                            <div class="tk-phone-app-ui">
                                <div class="tk-app-header">
                                    <div class="tk-app-logo-dot"></div>
                                    <span>THYNK App</span>
                                    <i class="fas fa-bell" style="font-size:12px; opacity:0.6;"></i>
                                </div>
                                <div class="tk-app-hero-card">
                                    <div class="tk-app-map-placeholder">
                                        <div class="tk-map-grid"></div>
                                        <div class="tk-map-pin"><i class="fas fa-map-pin"></i></div>
                                        <div class="tk-map-circle"></div>
                                    </div>
                                    <div class="tk-app-card-footer">
                                        <span class="tk-app-stat-pill" style="background:rgba(37,99,235,0.15); color:#2563EB;"><i class="fas fa-chart-line"></i> Live Data</span>
                                        <span class="tk-app-stat-pill" style="background:rgba(57,255,20,0.1); color:#39FF14;"><i class="fas fa-circle"></i> Online</span>
                                    </div>
                                </div>
                                <div class="tk-app-grid-4">
                                    <div class="tk-app-icon-block" style="background:rgba(37,99,235,0.1);"><i class="fas fa-map" style="color:#2563EB;"></i><span>Map</span></div>
                                    <div class="tk-app-icon-block" style="background:rgba(6,182,212,0.1);"><i class="fas fa-database" style="color:#06B6D4;"></i><span>Data</span></div>
                                    <div class="tk-app-icon-block" style="background:rgba(57,255,20,0.08);"><i class="fas fa-chart-bar" style="color:#39FF14;"></i><span>Stats</span></div>
                                    <div class="tk-app-icon-block" style="background:rgba(37,99,235,0.1);"><i class="fas fa-cog" style="color:#2563EB;"></i><span>Settings</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tk-phone-android">
                        <div class="tk-phone-frame tk-phone-frame--android">
                            <div class="tk-phone-screen">
                                <div class="tk-phone-app-ui" style="padding:10px;">
                                    <div style="background:rgba(37,99,235,0.1); border-radius:8px; padding:12px; margin-bottom:8px; border:1px solid rgba(37,99,235,0.2);">
                                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px;"><i class="fab fa-android" style="color:#39FF14; font-size:14px;"></i><span style="color:#fff; font-size:11px; font-weight:600;">Android Build</span></div>
                                        <div class="tk-mini-progress"><div class="tk-mini-progress-fill" style="width:88%;"></div></div>
                                        <span style="color:rgba(255,255,255,0.5); font-size:10px;">Build complete · 88% optimized</span>
                                    </div>
                                    <div style="background:rgba(6,182,212,0.1); border-radius:8px; padding:12px; border:1px solid rgba(6,182,212,0.2);">
                                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:6px;"><i class="fab fa-apple" style="color:#06B6D4; font-size:14px;"></i><span style="color:#fff; font-size:11px; font-weight:600;">iOS Build</span></div>
                                        <div class="tk-mini-progress"><div class="tk-mini-progress-fill" style="width:92%; background:linear-gradient(90deg,#06B6D4,#2563EB);"></div></div>
                                        <span style="color:rgba(255,255,255,0.5); font-size:10px;">Build complete · 92% optimized</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- GEOSPATIAL SECTION -->
<!-- ============================================ -->
<section class="tk-section tk-bg-darker tk-reveal" id="geospatial">
    <div class="tk-container">
        <div class="tk-gis-header">
            <span class="tk-badge tk-badge--neon">Geospatial & GIS</span>
            <h2 class="tk-heading-xl" style="color:#0F172A;">Your Data Has a <span style="color:#39FF14; text-shadow: none;">Location.</span><br>We Make It Visible.</h2>
            <p class="tk-body-lg" style="color:#4B5563;">From field data collection to real-time dashboards and spatial analysis — we build GIS tools that turn raw geographic data into strategic insight.</p>
        </div>

        <div class="tk-gis-showcase">
            <div class="tk-gis-map-visual">
                <div class="tk-map-container">
                    <div class="tk-map-bg"></div>
                    <div class="tk-map-layers">
                        <div class="tk-map-layer tk-map-layer--1"></div>
                        <div class="tk-map-layer tk-map-layer--2"></div>
                        <div class="tk-map-layer tk-map-layer--3"></div>
                    </div>
                    <div class="tk-map-pins">
                        <div class="tk-map-pin-marker" style="top:30%; left:40%;">
                            <div class="tk-pin-pulse"></div>
                            <i class="fas fa-map-pin" style="color:#39FF14;"></i>
                        </div>
                        <div class="tk-map-pin-marker" style="top:55%; left:60%;">
                            <div class="tk-pin-pulse" style="animation-delay:0.5s;"></div>
                            <i class="fas fa-map-pin" style="color:#06B6D4;"></i>
                        </div>
                        <div class="tk-map-pin-marker" style="top:45%; left:25%;">
                            <div class="tk-pin-pulse" style="animation-delay:1s;"></div>
                            <i class="fas fa-map-pin" style="color:#0F172A;"></i>
                        </div>
                    </div>
                    <div class="tk-map-overlay-card">
                        <span style="font-size:10px; color:#6B7C93; text-transform:uppercase; letter-spacing:1px;">Active Zones</span>
                        <div style="display:flex; gap:12px; margin-top:4px;">
                            <span style="color:#39FF14; font-size:18px; font-weight:700; font-family:'Inter',sans-serif;">14</span>
                            <span style="color:#06B6D4; font-size:18px; font-weight:700; font-family:'Inter',sans-serif;">8</span>
                            <span style="color:#0F172A; font-size:18px; font-weight:700; font-family:'Inter',sans-serif;">22</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tk-gis-features">
                <div class="tk-gis-feature-item">
                    <div class="tk-gis-feature-icon"><i class="fas fa-layer-group" style="color:#39FF14;"></i></div>
                    <div>
                        <h4 style="color:#0F172A;">Interactive Map Platforms</h4>
                        <p style="color:#4B5563;">Custom web and mobile maps with layers, filters, and real-time data feeds — built on Mapbox, Leaflet, and Google Maps APIs.</p>
                    </div>
                </div>
                <div class="tk-gis-feature-item">
                    <div class="tk-gis-feature-icon"><i class="fas fa-satellite-dish" style="color:#06B6D4;"></i></div>
                    <div>
                        <h4 style="color:#0F172A;">Spatial Data Analysis</h4>
                        <p style="color:#4B5563;">QGIS and PostGIS-powered analysis for land use, route optimization, coverage mapping, and demographic profiling.</p>
                    </div>
                </div>
                <div class="tk-gis-feature-item">
                    <div class="tk-gis-feature-icon"><i class="fas fa-database" style="color:#0F172A;"></i></div>
                    <div>
                        <h4 style="color:#0F172A;">Field Data Collection</h4>
                        <p style="color:#4B5563;">Mobile-first tools for offline field surveys, GPS tagging, and real-time sync when connectivity returns.</p>
                    </div>
                </div>
                <div class="tk-gis-feature-item">
                    <div class="tk-gis-feature-icon"><i class="fas fa-chart-area" style="color:#39FF14;"></i></div>
                    <div>
                        <h4 style="color:#0F172A;">Geospatial Dashboards</h4>
                        <p style="color:#4B5563;">Decision-support dashboards that surface geographic trends across your operations, fleet, or community.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="tk-section tk-bg-navy tk-reveal" id="learning">
    <div class="tk-container">
        <div class="tk-split-grid tk-split-grid--reverse">
            <div class="tk-split-content">
                <span class="tk-badge tk-badge--gold" style="background:rgba(57,255,20,0.08); color:#39FF14; border:1px solid rgba(57,255,20,0.35);">Instructional Design</span>
                <h2 class="tk-heading-xl" style="color:#0F172A; margin-top:14px;">Gamification &amp; eLearning<br><span style="color:#39FF14;">That Actually Engages</span></h2>
                <p class="tk-body-lg" style="color:#4B5563; margin:16px 0 28px;">We combine instructional design, gamification, and AI-powered video to create learning experiences that people actually want to complete. From course authoring to interactive assessments — we build it all.</p>

                <div class="tk-feature-list">
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#39FF14;"></span>
                        <div>
                            <strong style="color:#0F172A;">Gamification Design</strong>
                            <p style="color:#4B5563;">Points, badges, leaderboards, quests, and progress tracking — game mechanics that drive real engagement and completion rates.</p>
                        </div>
                    </div>
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#06B6D4;"></span>
                        <div>
                            <strong style="color:#0F172A;">Articulate &amp; eLearning Authoring</strong>
                            <p style="color:#4B5563;">Professional course creation with Articulate 360, Storyline, and Rise — interactive modules, quizzes, and branching scenarios.</p>
                        </div>
                    </div>
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#39FF14;"></span>
                        <div>
                            <strong style="color:#0F172A;">Synthesia AI Video</strong>
                            <p style="color:#4B5563;">AI-powered video production with Synthesia — custom avatars, multilingual voiceovers, and professional course content at scale.</p>
                        </div>
                    </div>
                    <div class="tk-feature-row">
                        <span class="tk-feature-dot" style="background:#06B6D4;"></span>
                        <div>
                            <strong style="color:#0F172A;">Instructional Design Strategy</strong>
                            <p style="color:#4B5563;">Pedagogically sound content structure, learning objectives, assessments, and learner pathways — designed for real outcomes.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tk-split-visual">
                <div class="tk-learning-mockup">
                    <div class="tk-learning-card" style="background:#FFFFFF; border:1px solid #E2E8F0; border-radius:16px; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,0.06);">
                        <div style="background:linear-gradient(135deg,#39FF14,#06B6D4); padding:20px 24px;">
                            <span style="color:#0F172A; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase;">Gamified Course</span>
                            <h3 style="color:#0F172A; margin:6px 0 0; font-size:20px; font-weight:700; font-family:'Inter',sans-serif;">Level Up: Learning Design</h3>
                        </div>
                        <div style="padding:20px 24px;">
                            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <span style="font-size:13px; color:#4B5563; font-weight:600;">Progress</span>
                                <span style="font-size:13px; color:#39FF14; font-weight:700;">68%</span>
                            </div>
                            <div style="width:100%; height:8px; background:#F1F5F9; border-radius:4px; overflow:hidden; margin-bottom:16px;">
                                <div style="width:68%; height:100%; background:linear-gradient(90deg,#39FF14,#06B6D4); border-radius:4px;"></div>
                            </div>
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-bottom:16px;">
                                <div style="background:#F8FAFC; padding:12px; border-radius:8px; text-align:center; border:1px solid #E2E8F0;">
                                    <span style="display:block; font-size:20px; font-weight:800; color:#39FF14;">4</span>
                                    <span style="font-size:10px; color:#4B5563; text-transform:uppercase; letter-spacing:0.5px;">Badges Earned</span>
                                </div>
                                <div style="background:#F8FAFC; padding:12px; border-radius:8px; text-align:center; border:1px solid #E2E8F0;">
                                    <span style="display:block; font-size:20px; font-weight:800; color:#06B6D4;">12</span>
                                    <span style="font-size:10px; color:#4B5563; text-transform:uppercase; letter-spacing:0.5px;">Modules</span>
                                </div>
                            </div>
                            <div style="display:flex; gap:8px; flex-wrap:wrap;">
                                <span style="font-size:11px; font-weight:600; padding:4px 12px; background:rgba(57,255,20,0.08); border:1px solid rgba(57,255,20,0.25); border-radius:20px; color:#39FF14;"><i class="fas fa-gamepad"></i> Gamification</span>
                                <span style="font-size:11px; font-weight:600; padding:4px 12px; background:rgba(6,182,212,0.1); border:1px solid rgba(6,182,212,0.25); border-radius:20px; color:#06B6D4;"><i class="fas fa-video"></i> Synthesia</span>
                                <span style="font-size:11px; font-weight:600; padding:4px 12px; background:rgba(57,255,20,0.08); border:1px solid rgba(57,255,20,0.2); border-radius:20px; color:#39FF14;"><i class="fas fa-graduation-cap"></i> Articulate</span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top:16px; display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                        <div style="background:#FFFFFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; text-align:center;">
                            <i class="fas fa-robot" style="color:#06B6D4; font-size:20px; margin-bottom:6px;"></i>
                            <p style="font-size:11px; color:#0F172A; margin:0; font-weight:600;">AI Avatars</p>
                            <p style="font-size:10px; color:#4B5563; margin:4px 0 0;">Synthesia</p>
                        </div>
                        <div style="background:#FFFFFF; border:1px solid #E2E8F0; border-radius:12px; padding:14px 16px; text-align:center;">
                            <i class="fas fa-trophy" style="color:#39FF14; font-size:20px; margin-bottom:6px;"></i>
                            <p style="font-size:11px; color:#0F172A; margin:0; font-weight:600;">Leaderboards</p>
                            <p style="font-size:10px; color:#4B5563; margin:4px 0 0;">Gamification</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================================ -->
<!-- HOW WE WORK — PROCESS -->
<!-- ============================================ -->
<section class="tk-section tk-bg-navy tk-reveal" id="process">
    <div class="tk-container">
        <div class="tk-section-header">
            <span class="tk-badge tk-badge--cyan">Our Process</span>
            <h2 class="tk-heading-xl tk-text-white">From Brief to <span class="tk-grad-text">Deployed</span></h2>
            <p class="tk-body-lg tk-text-muted">A clear, collaborative process — no surprises, no ghosting. You know what's happening at every stage.</p>
        </div>

        <div class="tk-process-timeline">
            <div class="tk-process-track"></div>
            <div class="tk-process-step">
                <div class="tk-process-node" style="border-color:#2563EB; color:#2563EB;">01</div>
                <div class="tk-process-card">
                    <span class="tk-process-week" style="color:#2563EB;">Week 1</span>
                    <h3>Discovery & Scoping</h3>
                    <p>We understand your users, technical requirements, and business goals. We define exactly what gets built — and why — before a single line of code is written.</p>
                </div>
            </div>
            <div class="tk-process-step">
                <div class="tk-process-node" style="border-color:#06B6D4; color:#06B6D4;">02</div>
                <div class="tk-process-card">
                    <span class="tk-process-week" style="color:#06B6D4;">Week 2–3</span>
                    <h3>Design & Architecture</h3>
                    <p>UI/UX wireframes, design system, and technical architecture reviewed and approved by you before development starts. No surprises later.</p>
                </div>
            </div>
            <div class="tk-process-step">
                <div class="tk-process-node" style="border-color:#39FF14; color:#39FF14;">03</div>
                <div class="tk-process-card">
                    <span class="tk-process-week" style="color:#39FF14;">Week 4–8</span>
                    <h3>Build & Iterate</h3>
                    <p>Agile sprints with weekly demos. You see real progress every week, give feedback, and we adapt. No waiting months to see something.</p>
                </div>
            </div>
            <div class="tk-process-step">
                <div class="tk-process-node" style="border-color:#2563EB; color:#2563EB;">04</div>
                <div class="tk-process-card">
                    <span class="tk-process-week" style="color:#2563EB;">Week 9–10</span>
                    <h3>Test & Deploy</h3>
                    <p>QA, performance testing, and production deployment. App store submissions, server configuration, DNS, SSL — everything to make you live and stable.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- DESIGN SHOWCASE -->
<!-- ============================================ -->
<section class="tk-section tk-bg-dark tk-reveal" id="design">
    <div class="tk-container">
        <div class="tk-split-grid tk-split-grid--reverse">
            <div class="tk-split-content">
                <span class="tk-badge tk-badge--blue">Graphic Design & UI/UX</span>
                <h2 class="tk-heading-xl tk-text-white" style="margin-top:14px;">Design That <span class="tk-grad-text">Communicates.</span><br>Not Just Decorates.</h2>
                <p class="tk-body-lg tk-text-muted" style="margin:16px 0 28px;">We build design systems, brand identities, and UI components that work as a coherent whole — not as random pretty pieces. Every visual decision serves a purpose.</p>

                <div class="tk-design-offerings">
                    <div class="tk-design-item"><i class="fas fa-check" style="color:#39FF14;"></i> Brand identity & logo design</div>
                    <div class="tk-design-item"><i class="fas fa-check" style="color:#39FF14;"></i> Mobile & web UI/UX design</div>
                    <div class="tk-design-item"><i class="fas fa-check" style="color:#39FF14;"></i> Design systems & component libraries</div>
                    <div class="tk-design-item"><i class="fas fa-check" style="color:#39FF14;"></i> Marketing & social media graphics</div>
                    <div class="tk-design-item"><i class="fas fa-check" style="color:#39FF14;"></i> Pitch decks & presentation design</div>
                    <div class="tk-design-item"><i class="fas fa-check" style="color:#39FF14;"></i> Icon sets & illustration</div>
                </div>

                <a href="https://cal.com/thynk-consulatation" class="tk-btn tk-btn--primary" style="margin-top:24px; display:inline-block;" id="Book3">Discuss Your Design</a>
            </div>
            <div class="tk-split-visual">
                <div class="tk-design-mockup">
                    <div class="tk-design-card tk-design-card--1">
                        <div class="tk-dc-header" style="background:linear-gradient(135deg,#2563EB,#06B6D4);">
                            <span style="color:#fff; font-size:11px; font-weight:700; letter-spacing:2px; text-transform:uppercase;">Brand Identity</span>
                        </div>
                        <div class="tk-dc-body">
                            <div class="tk-color-swatches">
                                <div class="tk-swatch" style="background:#2563EB;"></div>
                                <div class="tk-swatch" style="background:#06B6D4;"></div>
                                <div class="tk-swatch" style="background:#39FF14;"></div>
                                <div class="tk-swatch" style="background:#0F172A;"></div>
                                <div class="tk-swatch" style="background:#FFFFFF; border:1px solid rgba(0,0,0,0.1);"></div>
                            </div>
                            <div style="margin-top:10px;">
                                <span style="font-size:22px; font-weight:800; color:#0F172A; font-family:'Inter',sans-serif; letter-spacing:-1px;">THYNK</span>
                                <span style="display:block; font-size:10px; color:#6B7C93; letter-spacing:3px; text-transform:uppercase;">Technology</span>
                            </div>
                        </div>
                    </div>
                    <div class="tk-design-card tk-design-card--2">
                        <div class="tk-dc-ui-preview">
                            <div class="tk-ui-nav" style="background:#0F172A; padding:10px 12px; border-radius:6px 6px 0 0; display:flex; align-items:center; gap:6px;">
                                <div style="width:8px;height:8px;border-radius:50%;background:#ff5f57;"></div>
                                <div style="width:8px;height:8px;border-radius:50%;background:#febc2e;"></div>
                                <div style="width:8px;height:8px;border-radius:50%;background:#28c840;"></div>
                                <span style="flex:1; text-align:center; font-size:9px; color:rgba(255,255,255,0.4);">thynk.app</span>
                            </div>
                            <div style="background:#fff; padding:14px; border-radius:0 0 6px 6px;">
                                <div style="height:8px; background:linear-gradient(90deg,#2563EB,#06B6D4); border-radius:4px; width:60%; margin-bottom:6px;"></div>
                                <div style="height:6px; background:#E8ECF2; border-radius:4px; width:80%; margin-bottom:4px;"></div>
                                <div style="height:6px; background:#E8ECF2; border-radius:4px; width:65%; margin-bottom:10px;"></div>
                                <div style="display:flex; gap:6px;">
                                    <div style="height:28px; flex:1; background:#2563EB; border-radius:4px;"></div>
                                    <div style="height:28px; flex:1; background:#E8ECF2; border-radius:4px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- RESULTS / STATS -->
<!-- ============================================ -->
<section class="tk-stats-section tk-reveal">
    <div class="tk-container">
        <div class="tk-stats-header">
            <span class="tk-badge tk-badge--neon">Our Track Record</span>
            <h2 class="tk-heading-xl tk-text-white">Numbers That <span class="tk-neon-text">Speak</span></h2>
        </div>
        <div class="tk-stats-grid">
            <div class="tk-stat-card">
                <div class="tk-stat-inner">
                    <span class="tk-stat-num" style="color:#2563EB;">50+</span>
                    <span class="tk-stat-label">Applications Deployed</span>
                    <span class="tk-stat-sub">Web, mobile, and GIS tools live in production</span>
                </div>
                <div class="tk-stat-bg-icon"><i class="fas fa-rocket"></i></div>
            </div>
            <div class="tk-stat-card tk-stat-card--featured">
                <div class="tk-stat-inner">
                    <span class="tk-stat-num" style="color:#39FF14;">2</span>
                    <span class="tk-stat-label">Platforms, One Team</span>
                    <span class="tk-stat-sub">Android and iOS built and shipped together</span>
                </div>
                <div class="tk-stat-bg-icon"><i class="fas fa-mobile-alt"></i></div>
            </div>
            <div class="tk-stat-card">
                <div class="tk-stat-inner">
                    <span class="tk-stat-num" style="color:#06B6D4;">100%</span>
                    <span class="tk-stat-label">End-to-End Delivery</span>
                    <span class="tk-stat-sub">Design, build, deploy — under one roof</span>
                </div>
                <div class="tk-stat-bg-icon"><i class="fas fa-check-circle"></i></div>
            </div>
            <div class="tk-stat-card">
                <div class="tk-stat-inner">
                    <span class="tk-stat-num" style="color:#2563EB;">GIS</span>
                    <span class="tk-stat-label">Geospatial Ready</span>
                    <span class="tk-stat-sub">Spatial data, maps, and location intelligence</span>
                </div>
                <div class="tk-stat-bg-icon"><i class="fas fa-map-marked-alt"></i></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- WHO WE SERVE -->
<!-- ============================================ -->
<section class="tk-section tk-bg-navy tk-reveal">
    <div class="tk-container">
        <div class="tk-section-header">
            <span class="tk-badge tk-badge--blue">Who We Work With</span>
            <h2 class="tk-heading-xl tk-text-white">Built for <span class="tk-grad-text">Builders</span></h2>
            <p class="tk-body-lg tk-text-muted">We work with startups, enterprises, NGOs, and government agencies that need reliable digital products — not just proposals.</p>
        </div>
        <div class="tk-audience-grid">
            <div class="tk-audience-card">
                <div class="tk-audience-icon-wrap" style="background:rgba(37,99,235,0.1); border-color:rgba(37,99,235,0.2);"><i class="fas fa-seedling" style="color:#2563EB;"></i></div>
                <h3>Startups</h3>
                <p>MVPs built fast, built right. We help you validate your idea with a real product — not a prototype that falls apart under real users.</p>
            </div>
            <div class="tk-audience-card">
                <div class="tk-audience-icon-wrap" style="background:rgba(6,182,212,0.1); border-color:rgba(6,182,212,0.2);"><i class="fas fa-building" style="color:#06B6D4;"></i></div>
                <h3>Enterprises</h3>
                <p>Internal tools, customer-facing platforms, and legacy system modernization — with the reliability and security enterprises require.</p>
            </div>
            <div class="tk-audience-card">
                <div class="tk-audience-icon-wrap" style="background:rgba(57,255,20,0.08); border-color:rgba(57,255,20,0.2);"><i class="fas fa-hands-helping" style="color:#39FF14;"></i></div>
                <h3>NGOs & Development</h3>
                <p>Field data tools, offline-first mobile apps, and geospatial platforms for impactful work in challenging environments.</p>
            </div>
            <div class="tk-audience-card">
                <div class="tk-audience-icon-wrap" style="background:rgba(37,99,235,0.1); border-color:rgba(37,99,235,0.2);"><i class="fas fa-landmark" style="color:#2563EB;"></i></div>
                <h3>Government & Public Sector</h3>
                <p>GIS dashboards, citizen service apps, and data portals built to government standards with security and accessibility in mind.</p>
            </div>
        </div>
    </div>
</section>


<!-- ============================================ -->
<!-- TESTIMONIAL CAROUSEL - DIRECT DB QUERY -->
<!-- ============================================ -->
@php
    use App\Models\Testimonial;
    $testimonials = Testimonial::published()
        ->orderBy('display_order', 'asc')
        ->get();
    $featuredTestimonial = Testimonial::published()
        ->featured()
        ->first();
@endphp

@if($testimonials->count() > 0)
<section class="tc-carousel-section tc-reveal">
    <div class="tc-container">
        <div class="tc-carousel-header">
            <span class="tc-carousel-badge">Testimonials</span>
            <h2>What Our <span class="text-neon">Clients Say</span></h2>
            <p>Real feedback from the organizations and individuals we've worked with</p>
        </div>

        <div class="tc-carousel-wrapper">
            <div class="tc-carousel-track" id="tcCarouselTrack">
                @foreach($testimonials as $index => $testimonial)
                <div class="tc-carousel-slide {{ $index === 0 ? 'tc-active' : '' }}" data-slide="{{ $index }}">
                    <div class="tc-testimonial-card {{ $testimonial->is_featured ? 'tc-testimonial-featured' : '' }}">
                        <!-- Quote Icon -->
                        <div class="tc-quote-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 11H7C6.44772 11 6 11.4477 6 12V13C6 13.5523 6.44772 14 7 14H10C10.5523 14 11 13.5523 11 13V12C11 11.4477 10.5523 11 10 11Z" fill="#39FF14"/>
                                <path d="M17 11H14C13.4477 11 13 11.4477 13 12V13C13 13.5523 13.4477 14 14 14H17C17.5523 14 18 13.5523 18 13V12C18 11.4477 17.5523 11 17 11Z" fill="#39FF14"/>
                                <path d="M4 4H20C21.1046 4 22 4.89543 22 6V18C22 19.1046 21.1046 20 20 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4Z" stroke="#39FF14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" opacity="0.3"/>
                                <path d="M8 17H16" stroke="#39FF14" stroke-width="1.5" stroke-linecap="round" opacity="0.3"/>
                            </svg>
                        </div>

                        <blockquote class="tc-testimonial-text">
                            "{{ $testimonial->testimonial_text }}"
                            @if($testimonial->is_featured)
                            <span class="tc-testimonial-highlight">— {{ $testimonial->client_name }}</span>
                            @endif
                        </blockquote>

                        <div class="tc-testimonial-divider">
                            <span></span>
                            <span class="tc-divider-diamond">◆</span>
                            <span></span>
                        </div>

                        <div class="tc-testimonial-author">
                            <div class="tc-testimonial-avatar">
                                @if($testimonial->avatar_image)
                                    <img src="{{ asset('storage/' . $testimonial->avatar_image) }}" alt="{{ $testimonial->client_name }}">
                                @else
                                    <span>{{ $testimonial->avatar_initials ?? substr($testimonial->client_name, 0, 2) }}</span>
                                @endif
                            </div>
                            <div class="tc-author-info">
                                <p class="tc-testimonial-name">{{ $testimonial->client_name }}</p>
                                @if($testimonial->client_role || $testimonial->client_company)
                                <p class="tc-testimonial-role">
                                    {{ $testimonial->client_role }}
                                    @if($testimonial->client_role && $testimonial->client_company)
                                        <span class="tc-role-separator">·</span>
                                    @endif
                                    {{ $testimonial->client_company }}
                                </p>
                                @endif
                                @if($testimonial->project_type)
                                <p class="tc-testimonial-project">
                                    <span class="tc-project-icon">📌</span>
                                    {{ $testimonial->project_type }}
                                </p>
                                @endif
                                <div class="tc-stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $testimonial->rating)
                                            <span class="tc-star-filled">★</span>
                                        @else
                                            <span class="tc-star-empty">☆</span>
                                        @endif
                                    @endfor
                                    <span class="tc-rating-number">{{ $testimonial->rating }}.0</span>
                                </div>
                            </div>
                        </div>

                        @if($testimonial->is_featured)
                        <div class="tc-featured-badge">
                            <span class="tc-featured-icon">⭐</span>
                            Featured
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            @if($testimonials->count() > 1)
            <!-- Dots -->
            <div class="tc-carousel-dots" id="tcCarouselDots">
                @foreach($testimonials as $index => $testimonial)
                    <button class="tc-carousel-dot {{ $index === 0 ? 'tc-active' : '' }}" 
                            data-slide="{{ $index }}" 
                            aria-label="Go to testimonial {{ $index + 1 }}">
                    </button>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- FIXED TESTIMONIAL CAROUSEL STYLES -->
<!-- ============================================ -->
<style>
    /* ================================================
       TC CAROUSEL — Auto-slide Testimonial Carousel
       FIXED: Proper width and display for all slides
       ================================================ */

    .tc-carousel-section {
        background: #FFFFFF !important;
        padding: 80px 0 !important;
        overflow: hidden !important;
        position: relative !important;
        width: 100% !important;
    }

    .tc-carousel-section::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 4px !important;
        background: linear-gradient(90deg, transparent, #39FF14, #06B6D4, #39FF14, transparent) !important;
        opacity: 0.5 !important;
    }

    .tc-container {
        max-width: 900px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
        position: relative !important;
        z-index: 2 !important;
        width: 100% !important;
    }

    .tc-carousel-header {
        text-align: center !important;
        margin-bottom: 48px !important;
        width: 100% !important;
    }

    .tc-carousel-badge {
        display: inline-block !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        padding: 6px 20px !important;
        border-radius: 50px !important;
        background: rgba(57, 255, 20, 0.08) !important;
        color: #27B80E !important;
        border: 1px solid rgba(57, 255, 20, 0.25) !important;
        font-family: 'Inter', sans-serif !important;
        margin-bottom: 16px !important;
        transition: all 0.3s ease !important;
    }

    .tc-carousel-header h2 {
        font-size: clamp(30px, 4.5vw, 44px) !important;
        font-weight: 800 !important;
        line-height: 1.15 !important;
        font-family: 'Inter', sans-serif !important;
        letter-spacing: -1.5px !important;
        color: #0F172A !important;
        margin: 0 0 12px !important;
    }

    .tc-carousel-header h2 .text-neon {
        color: #27B80E !important;
        position: relative !important;
    }

    .tc-carousel-header p {
        font-size: 18px !important;
        line-height: 1.75 !important;
        color: #6B7C93 !important;
        max-width: 560px !important;
        margin: 0 auto !important;
        font-weight: 400 !important;
    }

    /* ---- Carousel Wrapper ---- */
    .tc-carousel-wrapper {
        position: relative !important;
        overflow: hidden !important;
        border-radius: 24px !important;
        background: transparent !important;
        padding: 8px 0 !important;
        width: 100% !important;
    }

    /* ---- Carousel Track ---- */
    .tc-carousel-track {
        display: flex !important;
        transition: transform 0.8s cubic-bezier(0.65, 0, 0.35, 1) !important;
        will-change: transform !important;
        width: 100% !important;
        position: relative !important;
    }

    /* ---- Carousel Slide ---- */
    .tc-carousel-slide {
        min-width: 100% !important;
        flex: 0 0 100% !important;
        width: 100% !important;
        flex-shrink: 0 !important;
        padding: 4px !important;
        transition: opacity 0.8s ease !important;
        position: relative !important;
        display: block !important;
    }

    .tc-carousel-slide:not(.tc-active) {
        opacity: 0 !important;
        pointer-events: none !important;
    }

    .tc-carousel-slide.tc-active {
        opacity: 1 !important;
        pointer-events: auto !important;
        z-index: 2 !important;
    }

    /* ---- Testimonial Card ---- */
    .tc-testimonial-card {
        padding: 48px 48px 40px !important;
        background: #F8FAFC !important;
        border: 1px solid rgba(226, 232, 240, 0.8) !important;
        border-radius: 24px !important;
        text-align: center !important;
        transition: all 0.4s ease !important;
        position: relative !important;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04) !important;
        width: 100% !important;
        display: block !important;
        margin: 0 auto !important;
    }

    .tc-testimonial-card:hover {
        border-color: rgba(57, 255, 20, 0.3) !important;
        box-shadow: 0 8px 48px rgba(57, 255, 20, 0.08) !important;
        transform: translateY(-2px) !important;
    }

    .tc-testimonial-featured {
        border-color: rgba(57, 255, 20, 0.4) !important;
        background: #FAFFFE !important;
        box-shadow: 0 4px 32px rgba(57, 255, 20, 0.06) !important;
        position: relative !important;
    }

    .tc-testimonial-featured::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 3px !important;
        background: linear-gradient(90deg, #39FF14, #06B6D4, #39FF14) !important;
        border-radius: 24px 24px 0 0 !important;
    }

    .tc-quote-icon {
        margin-bottom: 16px !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .tc-quote-icon svg {
        width: 48px !important;
        height: 48px !important;
        opacity: 0.6 !important;
        transition: all 0.4s ease !important;
    }

    .tc-testimonial-card:hover .tc-quote-icon svg {
        opacity: 1 !important;
        transform: scale(1.05) !important;
    }

    .tc-testimonial-text {
        font-size: clamp(20px, 2.5vw, 26px) !important;
        font-weight: 300 !important;
        line-height: 1.8 !important;
        color: #1E293B !important;
        margin: 0 0 24px !important;
        font-family: 'Inter', Georgia, sans-serif !important;
        font-style: italic !important;
        letter-spacing: -0.2px !important;
        word-wrap: break-word !important;
    }

    .tc-testimonial-highlight {
        color: #27B80E !important;
        font-weight: 600 !important;
        display: block !important;
        margin-top: 12px !important;
        font-style: normal !important;
        font-size: 18px !important;
    }

    .tc-testimonial-divider {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 16px !important;
        margin: 0 auto 28px !important;
        max-width: 140px !important;
    }

    .tc-testimonial-divider span:first-child,
    .tc-testimonial-divider span:last-child {
        flex: 1 !important;
        height: 1.5px !important;
        background: linear-gradient(90deg, transparent, rgba(57, 255, 20, 0.4)) !important;
        display: block !important;
    }

    .tc-testimonial-divider span:last-child {
        background: linear-gradient(90deg, rgba(57, 255, 20, 0.4), transparent) !important;
    }

    .tc-divider-diamond {
        color: #39FF14 !important;
        font-size: 10px !important;
        opacity: 0.6 !important;
        animation: tcDiamondPulse 2s ease-in-out infinite !important;
    }

    @keyframes tcDiamondPulse {
        0%, 100% { opacity: 0.4; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.2); }
    }

    .tc-testimonial-author {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 18px !important;
        padding-top: 24px !important;
        border-top: 1.5px solid rgba(226, 232, 240, 0.6) !important;
        flex-wrap: wrap !important;
    }

    .tc-testimonial-avatar {
        width: 56px !important;
        height: 56px !important;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #39FF14, #06B6D4) !important;
        color: #0F172A !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        font-weight: 700 !important;
        font-family: 'Inter', sans-serif !important;
        flex-shrink: 0 !important;
        overflow: hidden !important;
        box-shadow: 0 4px 16px rgba(57, 255, 20, 0.2) !important;
        transition: all 0.3s ease !important;
        border: 2px solid rgba(255, 255, 255, 0.8) !important;
    }

    .tc-testimonial-avatar img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }

    .tc-testimonial-card:hover .tc-testimonial-avatar {
        transform: scale(1.05) !important;
        box-shadow: 0 6px 24px rgba(57, 255, 20, 0.3) !important;
    }

    .tc-author-info {
        text-align: left !important;
        flex: 1 !important;
        min-width: 150px !important;
    }

    .tc-testimonial-name {
        font-size: 17px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 2px !important;
        font-family: 'Inter', sans-serif !important;
        letter-spacing: -0.3px !important;
    }

    .tc-testimonial-role {
        font-size: 13px !important;
        color: #6B7C93 !important;
        margin: 0 0 4px !important;
        font-weight: 400 !important;
    }

    .tc-role-separator {
        margin: 0 6px !important;
        color: #CBD5E1 !important;
    }

    .tc-testimonial-project {
        font-size: 12px !important;
        color: #94A3B8 !important;
        margin: 0 0 6px !important;
        font-weight: 400 !important;
    }

    .tc-project-icon {
        margin-right: 4px !important;
    }

    .tc-stars {
        display: flex !important;
        align-items: center !important;
        gap: 3px !important;
        flex-wrap: wrap !important;
    }

    .tc-star-filled {
        color: #FFD700 !important;
        font-size: 16px !important;
        text-shadow: 0 0 8px rgba(255, 215, 0, 0.3) !important;
    }

    .tc-star-empty {
        color: #E2E8F0 !important;
        font-size: 16px !important;
    }

    .tc-rating-number {
        font-size: 13px !important;
        color: #6B7C93 !important;
        font-weight: 600 !important;
        margin-left: 4px !important;
    }

    .tc-featured-badge {
        position: absolute !important;
        top: 16px !important;
        right: 16px !important;
        background: rgba(57, 255, 20, 0.12) !important;
        color: #27B80E !important;
        font-size: 11px !important;
        font-weight: 600 !important;
        padding: 4px 14px !important;
        border-radius: 50px !important;
        display: flex !important;
        align-items: center !important;
        gap: 4px !important;
        border: 1px solid rgba(57, 255, 20, 0.2) !important;
        font-family: 'Inter', sans-serif !important;
        letter-spacing: 0.5px !important;
        backdrop-filter: blur(4px) !important;
        animation: tcFeaturedPulse 3s ease-in-out infinite !important;
        z-index: 5 !important;
    }

    @keyframes tcFeaturedPulse {
        0%, 100% { box-shadow: 0 0 0 0 rgba(57, 255, 20, 0); }
        50% { box-shadow: 0 0 20px rgba(57, 255, 20, 0.1); }
    }

    .tc-featured-icon {
        font-size: 12px !important;
    }

    /* ---- Dots ---- */
    .tc-carousel-dots {
        display: flex !important;
        justify-content: center !important;
        gap: 12px !important;
        margin-top: 32px !important;
        position: relative !important;
        z-index: 10 !important;
        flex-wrap: wrap !important;
    }

    .tc-carousel-dot {
        width: 12px !important;
        height: 12px !important;
        border-radius: 50% !important;
        border: 2px solid transparent !important;
        background: #E2E8F0 !important;
        cursor: pointer !important;
        transition: all 0.4s cubic-bezier(0.65, 0, 0.35, 1) !important;
        padding: 0 !important;
        flex-shrink: 0 !important;
        position: relative !important;
    }

    .tc-carousel-dot:hover {
        transform: scale(1.2) !important;
        background: #94A3B8 !important;
    }

    .tc-carousel-dot.tc-active {
        background: #39FF14 !important;
        transform: scale(1.25) !important;
        box-shadow: 0 0 24px rgba(57, 255, 20, 0.4) !important;
        border-color: rgba(57, 255, 20, 0.2) !important;
    }

    .tc-carousel-dot.tc-active::after {
        content: '' !important;
        position: absolute !important;
        top: -4px !important;
        left: -4px !important;
        right: -4px !important;
        bottom: -4px !important;
        border-radius: 50% !important;
        border: 2px solid rgba(57, 255, 20, 0.2) !important;
        animation: tcDotRipple 2s ease-out infinite !important;
    }

    @keyframes tcDotRipple {
        0% { transform: scale(1); opacity: 1; }
        100% { transform: scale(1.8); opacity: 0; }
    }

    .tc-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .tc-reveal-visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }

    @media (prefers-reduced-motion: reduce) {
        .tc-reveal {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
        .tc-carousel-dot.tc-active::after {
            animation: none !important;
        }
    }

    @media (max-width: 768px) {
        .tc-carousel-section { padding: 60px 0 !important; }
        .tc-testimonial-card { padding: 32px 24px 28px !important; }
        .tc-testimonial-text { font-size: 18px !important; line-height: 1.7 !important; }
        .tc-testimonial-highlight { font-size: 16px !important; }
        .tc-testimonial-author { flex-direction: column !important; text-align: center !important; gap: 14px !important; }
        .tc-author-info { text-align: center !important; }
        .tc-stars { justify-content: center !important; }
        .tc-carousel-dots { gap: 10px !important; margin-top: 24px !important; }
        .tc-carousel-dot { width: 10px !important; height: 10px !important; }
        .tc-featured-badge { top: 12px !important; right: 12px !important; font-size: 10px !important; padding: 3px 10px !important; }
        .tc-quote-icon svg { width: 36px !important; height: 36px !important; }
    }

    @media (max-width: 480px) {
        .tc-carousel-section { padding: 44px 0 !important; }
        .tc-container { padding: 0 16px !important; }
        .tc-testimonial-card { padding: 24px 18px 20px !important; border-radius: 18px !important; }
        .tc-testimonial-text { font-size: 16px !important; line-height: 1.6 !important; }
        .tc-testimonial-highlight { font-size: 14px !important; margin-top: 8px !important; }
        .tc-testimonial-avatar { width: 48px !important; height: 48px !important; font-size: 15px !important; }
        .tc-testimonial-name { font-size: 15px !important; }
        .tc-testimonial-role { font-size: 12px !important; }
        .tc-testimonial-divider { margin: 0 auto 20px !important; max-width: 100px !important; gap: 12px !important; }
        .tc-carousel-dots { gap: 8px !important; margin-top: 18px !important; }
        .tc-carousel-dot { width: 8px !important; height: 8px !important; }
        .tc-carousel-dot.tc-active { transform: scale(1.3) !important; }
        .tc-featured-badge { top: 8px !important; right: 8px !important; font-size: 9px !important; padding: 2px 8px !important; }
        .tc-star-filled, .tc-star-empty { font-size: 14px !important; }
        .tc-quote-icon { margin-bottom: 10px !important; }
        .tc-quote-icon svg { width: 28px !important; height: 28px !important; }
    }
</style>

<!-- ============================================ -->
<!-- TESTIMONIAL CAROUSEL SCRIPT -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('tcCarouselTrack');
    const slides = track ? track.querySelectorAll('.tc-carousel-slide') : [];
    const dotsContainer = document.getElementById('tcCarouselDots');
    let currentIndex = 0;
    let slideInterval;
    let isPaused = false;
    const intervalTime = 6000;
    const totalSlides = slides.length;

    console.log('Total testimonials found:', totalSlides);

    if (totalSlides === 0) {
        console.warn('No testimonials found');
        return;
    }

    function goToSlide(index) {
        index = ((index % totalSlides) + totalSlides) % totalSlides;

        slides.forEach((slide, i) => {
            slide.classList.toggle('tc-active', i === index);
        });

        if (track) {
            track.style.transform = `translateX(-${index * 100}%)`;
        }

        if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll('.tc-carousel-dot');
            dots.forEach((dot, i) => {
                dot.classList.toggle('tc-active', i === index);
            });
        }

        currentIndex = index;
    }

    function nextSlide() {
        if (!isPaused) {
            goToSlide(currentIndex + 1);
        }
    }

    function startAutoSlide() {
        if (totalSlides > 1) {
            stopAutoSlide();
            slideInterval = setInterval(nextSlide, intervalTime);
        }
    }

    function stopAutoSlide() {
        if (slideInterval) {
            clearInterval(slideInterval);
            slideInterval = null;
        }
    }

    // Dot clicks
    if (dotsContainer) {
        const dots = dotsContainer.querySelectorAll('.tc-carousel-dot');
        dots.forEach((dot, index) => {
            dot.addEventListener('click', function(e) {
                e.stopPropagation();
                stopAutoSlide();
                goToSlide(index);
                setTimeout(startAutoSlide, intervalTime);
            });
        });
    }

    // Pause on hover
    const wrapper = document.querySelector('.tc-carousel-wrapper');
    if (wrapper) {
        wrapper.addEventListener('mouseenter', function() {
            isPaused = true;
            stopAutoSlide();
        });
        wrapper.addEventListener('mouseleave', function() {
            isPaused = false;
            if (totalSlides > 1) {
                startAutoSlide();
            }
        });
    }

    // Pause on touch
    if (wrapper) {
        wrapper.addEventListener('touchstart', function() {
            isPaused = true;
            stopAutoSlide();
        });
        wrapper.addEventListener('touchend', function() {
            isPaused = false;
            if (totalSlides > 1) {
                startAutoSlide();
            }
        });
    }

    // Initialize
    goToSlide(0);
    if (totalSlides > 1) {
        setTimeout(startAutoSlide, 3000);
    }

    // Reveal
    const revealEls = document.querySelectorAll('.tc-reveal');
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('tc-reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function(el) { observer.observe(el); });
    } else {
        revealEls.forEach(function(el) { el.classList.add('tc-reveal-visible'); });
    }

    // Pause when page hidden
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            stopAutoSlide();
        } else {
            if (totalSlides > 1 && !isPaused) {
                startAutoSlide();
            }
        }
    });
});
</script>
@else
<!-- Fallback static testimonial -->
<section class="tc-carousel-section tc-reveal">
    <div class="tc-container">
        <div class="tc-carousel-header">
            <span class="tc-carousel-badge">Testimonials</span>
            <h2>What Our <span class="text-neon">Clients Say</span></h2>
            <p>Real feedback from the organizations and individuals we've worked with</p>
        </div>
        <div class="tc-carousel-wrapper">
            <div class="tc-carousel-track" style="height: auto;">
                <div class="tc-carousel-slide tc-active" style="opacity: 1; display: block; position: relative; z-index: 2; width: 100%;">
                    <div class="tc-testimonial-card">
                        <div class="tc-quote-icon">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 11H7C6.44772 11 6 11.4477 6 12V13C6 13.5523 6.44772 14 7 14H10C10.5523 14 11 13.5523 11 13V12C11 11.4477 10.5523 11 10 11Z" fill="#39FF14"/>
                                <path d="M17 11H14C13.4477 11 13 11.4477 13 12V13C13 13.5523 13.4477 14 14 14H17C17.5523 14 18 13.5523 18 13V12C18 11.4477 17.5523 11 17 11Z" fill="#39FF14"/>
                                <path d="M4 4H20C21.1046 4 22 4.89543 22 6V18C22 19.1046 21.1046 20 20 20H4C2.89543 20 2 19.1046 2 18V6C2 4.89543 2.89543 4 4 4Z" stroke="#39FF14" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" opacity="0.3"/>
                                <path d="M8 17H16" stroke="#39FF14" stroke-width="1.5" stroke-linecap="round" opacity="0.3"/>
                            </svg>
                        </div>
                        <blockquote class="tc-testimonial-text">
                            "THYNK delivered our Android and iOS app on time, with a design that our users actually love. The geospatial features worked flawlessly even in low-connectivity environments."
                            <span class="tc-testimonial-highlight">— They didn't just build what we asked for — they built what we needed.</span>
                        </blockquote>
                        <div class="tc-testimonial-divider">
                            <span></span>
                            <span class="tc-divider-diamond">◆</span>
                            <span></span>
                        </div>
                        <div class="tc-testimonial-author">
                            <div class="tc-testimonial-avatar">MK</div>
                            <div class="tc-author-info">
                                <p class="tc-testimonial-name">Project Director</p>
                                <p class="tc-testimonial-role">Development Agency Client</p>
                                <div class="tc-stars">
                                    <span class="tc-star-filled">★</span>
                                    <span class="tc-star-filled">★</span>
                                    <span class="tc-star-filled">★</span>
                                    <span class="tc-star-filled">★</span>
                                    <span class="tc-star-filled">★</span>
                                    <span class="tc-rating-number">5.0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif


<!-- ============================================ -->
<!-- TECH STACK -->
<!-- ============================================ -->
<section class="tk-section tk-bg-dark tk-reveal">
    <div class="tk-container">
        <div class="tk-section-header">
            <span class="tk-badge tk-badge--cyan">Technology Stack</span>
            <h2 class="tk-heading-xl tk-text-white">Tools We <span class="tk-grad-text">Master</span></h2>
            <p class="tk-body-lg tk-text-muted">We choose the right technology for your project — not the trendiest one. Our stack is battle-tested, production-proven, and chosen with purpose.</p>
        </div>
        <div class="tk-stack-grid">
            <div class="tk-stack-category">
                <h4 class="tk-stack-cat-title" style="color:#2563EB;"><i class="fas fa-mobile-alt"></i> Mobile</h4>
                <div class="tk-stack-chips">
                    <span class="tk-stack-chip">Flutter</span>
                    <span class="tk-stack-chip">React Native</span>
                    <span class="tk-stack-chip">Kotlin</span>
                    <span class="tk-stack-chip">Swift</span>
                </div>
            </div>
            <div class="tk-stack-category">
                <h4 class="tk-stack-cat-title" style="color:#06B6D4;"><i class="fas fa-code"></i> Web</h4>
                <div class="tk-stack-chips">
                    <span class="tk-stack-chip">React</span>
                    <span class="tk-stack-chip">Laravel</span>
                    <span class="tk-stack-chip">Vue.js</span>
                    <span class="tk-stack-chip">Node.js</span>
                </div>
            </div>
            <div class="tk-stack-category">
                <h4 class="tk-stack-cat-title" style="color:#39FF14;"><i class="fas fa-map"></i> GIS</h4>
                <div class="tk-stack-chips">
                    <span class="tk-stack-chip">Mapbox</span>
                    <span class="tk-stack-chip">QGIS</span>
                    <span class="tk-stack-chip">PostGIS</span>
                    <span class="tk-stack-chip">Leaflet</span>
                </div>
            </div>
            <div class="tk-stack-category">
                <h4 class="tk-stack-cat-title" style="color:#4B5563;"><i class="fas fa-graduation-cap"></i> Learning & AI</h4>
                <div class="tk-stack-chips">
                    <span class="tk-stack-chip">Articulate</span>
                    <span class="tk-stack-chip">Synthesia</span>
                    <span class="tk-stack-chip">AI Integration</span>
                    <span class="tk-stack-chip">eLearning</span>
                </div>
            </div>
            <div class="tk-stack-category">
                <h4 class="tk-stack-cat-title" style="color:#06B6D4;"><i class="fas fa-paint-brush"></i> Design</h4>
                <div class="tk-stack-chips">
                    <span class="tk-stack-chip">Figma</span>
                    <span class="tk-stack-chip">Adobe Suite</span>
                    <span class="tk-stack-chip">Illustrator</span>
                    <span class="tk-stack-chip">Framer</span>
                </div>
            </div>
            <div class="tk-stack-category">
                <h4 class="tk-stack-cat-title" style="color:#39FF14;"><i class="fas fa-database"></i> Backend</h4>
                <div class="tk-stack-chips">
                    <span class="tk-stack-chip">PostgreSQL</span>
                    <span class="tk-stack-chip">MySQL</span>
                    <span class="tk-stack-chip">Firebase</span>
                    <span class="tk-stack-chip">Redis</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================================ -->
<!-- FAQ -->
<!-- ============================================ -->
<section class="tk-section tk-bg-navy tk-reveal">
    <div class="tk-container tk-container--narrow">
        <div class="tk-section-header">
            <span class="tk-badge tk-badge--cyan">FAQ</span>
            <h2 class="tk-heading-xl tk-text-white">Common Questions</h2>
            <p class="tk-body-lg tk-text-muted">The things most clients want to know before reaching out.</p>
        </div>
        <div class="tk-faq-list">
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>Do you build for both Android and iOS?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>Yes — always. We build native Android and iOS apps, as well as cross-platform apps using Flutter and React Native. We'll recommend the right approach based on your budget, timeline, and performance requirements. Most clients benefit from a Flutter-based build that serves both platforms at lower cost without sacrificing quality.</p>
                </div>
            </div>
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>How long does a mobile app project typically take?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>A standard mobile app project — design through app store deployment — runs 8–12 weeks. Simpler MVPs can be ready in 6 weeks. Complex apps with geospatial features, offline sync, or third-party integrations run 12–16 weeks. We'll give you an honest estimate in the first call based on your specific requirements.</p>
                </div>
            </div>
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>Do you handle app store submission and deployment?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>Yes. We handle the full deployment pipeline — including Google Play Store and Apple App Store submission, reviewing policy compliance, setting up release tracks, and configuring production environments. We don't hand over an APK and leave you to figure out the rest.</p>
                </div>
            </div>
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>What's included in your GIS and geospatial services?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>Our GIS work includes interactive map development, spatial database design, field data collection tools, satellite imagery integration, route and coverage analysis, and custom geospatial dashboards. We work with Mapbox, Google Maps APIs, Leaflet, QGIS, PostGIS, and GeoServer depending on the use case.</p>
                </div>
            </div>
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>Do you offer gamification and instructional design services?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>Yes — we specialize in gamification and instructional design for eLearning platforms, training apps, and educational products. We integrate game mechanics like points, badges, leaderboards, and progress tracking into learning experiences. Our instructional design approach ensures that content is pedagogically sound, engaging, and aligned with learning outcomes. We work with tools like Articulate and Synthesia to create interactive, multimedia-rich learning experiences.</p>
                </div>
            </div>
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>Can you work with an existing codebase or do you start from scratch?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>Both. We take on greenfield projects and we also pick up and improve existing codebases. We'll do a code audit first to understand the current state, and give you an honest assessment of whether to extend, refactor, or rebuild — depending on what's actually in the codebase.</p>
                </div>
            </div>
            <div class="tk-faq-item">
                <button class="tk-faq-question" aria-expanded="false">
                    <span>Do you offer post-launch support and maintenance?</span>
                    <span class="tk-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="tk-faq-answer">
                    <p>Yes — we offer monthly retainer packages for monitoring, bug fixes, security updates, OS compatibility updates (important for mobile), and feature additions. Most clients move to a maintenance retainer after launch. We'll discuss options that fit your budget.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CTA FINAL -->
<!-- ============================================ -->
<section class="tk-cta-section tk-reveal">
    <div class="tk-cta-bg">
        <div class="tk-cta-circuit"></div>
    </div>
    <div class="tk-container">
        <div class="tk-cta-inner">
            <span class="tk-badge tk-badge--neon" style="margin-bottom:20px;">Start Today</span>
            <h2 class="tk-heading-xl" style="color:#0F172A;">Ready to Build Something <span style="color:#39FF14; text-shadow: none;">Real?</span></h2>
            <p class="tk-body-lg" style="color:#4B5563; max-width:580px; margin:16px auto 36px;">Tell us what you're building. We'll tell you what it takes — honestly, clearly, and fast. Free discovery call, no strings attached.</p>
            <div class="tk-cta-actions">
                <a href="https://cal.com/thynk-consulatation" class="tk-btn tk-btn--primary" id="Book4">Book Your Free Discovery Call</a>
                <a href="mailto:hello@thynk.tech" class="tk-btn tk-btn--outline">Send Us a Brief</a>
            </div>
            <div class="tk-cta-platforms">
                <span style="color:#4B5563;"><i class="fab fa-android" style="color:#39FF14;"></i> Android</span>
                <span class="tk-dot" style="color:#CBD5E1;">·</span>
                <span style="color:#4B5563;"><i class="fab fa-apple" style="color:#06B6D4;"></i> iOS</span>
                <span class="tk-dot" style="color:#CBD5E1;">·</span>
                <span style="color:#4B5563;"><i class="fas fa-globe" style="color:#06B6D4;"></i> Web</span>
                <span class="tk-dot" style="color:#CBD5E1;">·</span>
                <span style="color:#4B5563;"><i class="fas fa-map-marked-alt" style="color:#39FF14;"></i> GIS</span>
                <span class="tk-dot" style="color:#CBD5E1;">·</span>
                <span style="color:#4B5563;"><i class="fas fa-paint-brush" style="color:#06B6D4;"></i> Design</span>
                <span class="tk-dot" style="color:#CBD5E1;">·</span>
                <span style="color:#4B5563;"><i class="fas fa-rocket" style="color:#39FF14;"></i> Deployment</span>
                <span class="tk-dot" style="color:#CBD5E1;">·</span>
                <span style="color:#4B5563;"><i class="fas fa-gamepad" style="color:#F59E0B;"></i> Gamification</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
</section>

<!-- ============================================ -->
<!-- FLOATING CHAT -->
<!-- ============================================ -->
<div class="tk-floating-chat" id="tkFloatingChat">
    <button class="tk-chat-toggle" id="tkChatToggle" aria-label="Open Chat">
        <i class="fas fa-comment-dots"></i>
        <span class="tk-chat-badge" id="tkChatBadge">1</span>
    </button>
    <div class="tk-chat-window" id="tkChatWindow">
        <div class="tk-chat-header">
            <div class="tk-chat-header-info">
                <span class="tk-chat-avatar-glyph">🤖</span>
                <div>
                    <h4>THYNK Assistant</h4>
                    <p>Online · Ask me anything</p>
                </div>
            </div>
            <button class="tk-chat-close" id="tkChatClose"><i class="fas fa-times"></i></button>
        </div>
        <div class="tk-chat-messages" id="tkChatMessages">
            <div class="tk-chat-welcome">
                <div class="tk-chat-msg tk-chat-msg--bot">
                    <p>👋 Hi! I'm the THYNK AI Assistant.</p>
                    <p>I can help you with:</p>
                    <ul><li>Mobile App Development</li><li>Web Applications</li><li>GIS & Geospatial Solutions</li><li>Design & Deployment</li></ul>
                    <p style="margin-top:8px;">What are you building?</p>
                </div>
            </div>
        </div>
        <div class="tk-chat-input-area">
            <form id="tkChatForm" class="tk-chat-form">
                <input type="text" id="tkChatInput" placeholder="Type your message..." autocomplete="off">
                <button type="submit" id="tkChatSend"><i class="fas fa-paper-plane"></i></button>
            </form>
            <div class="tk-chat-typing" id="tkChatTyping" style="display:none;">
                <span></span><span></span><span></span>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- ALL STYLES -->
<!-- ============================================ -->
<style>
/* ================================================
   THYNK — Brand Theme (White + Luminous Green)
   Primary:       #0F172A  (dark text)
   Accent Green:  #39FF14  (luminous green)
   Cyan:          #06B6D4
   White BG:      #FFFFFF
   Alt BG:        #F8FAFC
   Body:          #4B5563
   Muted:         #6B7C93
   ================================================ */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

*, *::before, *::after { box-sizing: border-box !important; }

/* ---- TOKENS ---- */
:root {
    --tk-blue: #0F172A;
    --tk-cyan: #06B6D4;
    --tk-neon: #39FF14;
    --tk-navy: #FFFFFF;
    --tk-dark: #FFFFFF;
    --tk-darker: #F8FAFC;
    --tk-muted: #6B7C93;
    --tk-body: #4B5563;
}

.tk-text-white  { color: #0F172A !important; }
.tk-text-muted  { color: var(--tk-muted) !important; }
.tk-text-body   { color: var(--tk-body) !important; }
.tk-grad-text   { background: linear-gradient(90deg, #39FF14, #06B6D4); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.tk-neon-text   { color: #27B80E !important; text-shadow: none !important; }
.tk-text-center { text-align: center !important; }

/* ---- BACKGROUNDS ---- */
.tk-bg-navy   { background: #FFFFFF !important; }
.tk-bg-dark   { background: #FFFFFF !important; }
.tk-bg-darker { background: #F8FAFC !important; }

/* ---- LAYOUT ---- */
.tk-container        { max-width: 1200px !important; margin: 0 auto !important; padding: 0 24px !important; }
.tk-container--narrow { max-width: 860px !important; margin: 0 auto !important; padding: 0 24px !important; }
.tk-section          { padding: 80px 0 !important; }
.tk-section-header   { text-align: center !important; margin-bottom: 52px !important; }
.tk-section-header .tk-body-lg { margin-top: 12px !important; max-width: 600px !important; margin-left: auto !important; margin-right: auto !important; }

/* ---- REVEAL ---- */
.tk-reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.7s ease, transform 0.7s ease; }
.tk-reveal-visible { opacity: 1 !important; transform: translateY(0) !important; }
@media (prefers-reduced-motion: reduce) { .tk-reveal { opacity: 1 !important; transform: none !important; transition: none !important; } }

/* ---- TYPOGRAPHY ---- */
.tk-heading-xl { font-size: clamp(26px, 4vw, 42px) !important; font-weight: 800 !important; line-height: 1.15 !important; font-family: 'Inter', sans-serif !important; letter-spacing: -1px !important; }
.tk-heading-lg { font-size: clamp(22px, 3vw, 34px) !important; font-weight: 700 !important; line-height: 1.2 !important; font-family: 'Inter', sans-serif !important; letter-spacing: -0.5px !important; }
.tk-heading-md { font-size: clamp(18px, 2.5vw, 26px) !important; font-weight: 600 !important; font-family: 'Inter', sans-serif !important; }
.tk-body-lg    { font-size: 18px !important; line-height: 1.75 !important; }
.tk-body       { font-size: 15px !important; line-height: 1.75 !important; }

/* ---- BADGES ---- */
.tk-badge { display: inline-block !important; font-size: 11px !important; font-weight: 700 !important; text-transform: uppercase !important; letter-spacing: 2.5px !important; padding: 5px 16px !important; border-radius: 20px !important; margin-bottom: 14px !important; font-family: 'Inter', sans-serif !important; }
.tk-badge--cyan   { background: rgba(6,182,212,0.1) !important; color: #0891B2 !important; border: 1px solid rgba(6,182,212,0.35) !important; }
.tk-badge--blue   { background: rgba(15,23,42,0.06) !important; color: #1E40AF !important; border: 1px solid rgba(15,23,42,0.15) !important; }
.tk-badge--neon   { background: rgba(57,255,20,0.08) !important; color: #27B80E !important; border: 1px solid rgba(57,255,20,0.35) !important; }

/* ---- BUTTONS ---- */
.tk-btn { display: inline-block !important; padding: 14px 28px !important; border-radius: 8px !important; font-size: 15px !important; font-weight: 600 !important; text-decoration: none !important; transition: all 0.25s ease !important; letter-spacing: 0.2px !important; font-family: 'Inter', sans-serif !important; cursor: pointer !important; }
.tk-btn--primary { background: #0F172A !important; color: #FFFFFF !important; border: none !important; box-shadow: 0 4px 16px rgba(15,23,42,0.2) !important; }
.tk-btn--primary:hover { background: #1E293B !important; transform: translateY(-2px) !important; box-shadow: 0 8px 28px rgba(15,23,42,0.3) !important; color: #fff !important; }
.tk-btn--outline { background: transparent !important; color: #0F172A !important; border: 1.5px solid rgba(15,23,42,0.25) !important; }
.tk-btn--outline:hover { border-color: #0F172A !important; color: #0F172A !important; background: rgba(15,23,42,0.04) !important; }
.tk-btn--neon { background: transparent !important; color: #27B80E !important; border: 1.5px solid rgba(57,255,20,0.5) !important; box-shadow: none !important; }
.tk-btn--neon:hover { background: rgba(57,255,20,0.07) !important; border-color: #39FF14 !important; transform: translateY(-2px) !important; color: #1DA30A !important; }

/* ---- INPUT ---- */
.tk-input { flex: 1; min-width: 220px; padding: 12px 18px; background: #FFFFFF; border: 1.5px solid #E2E8F0; border-radius: 8px; font-size: 15px; color: #0F172A; outline: none; transition: border-color 0.3s; font-family: 'Inter', sans-serif; }
.tk-input:focus { border-color: #39FF14; }
.tk-input::placeholder { color: #94A3B8; }

/* ==========================
   HERO
   ========================== */
.tk-hero { position: relative !important; min-height: 100vh !important; display: flex !important; align-items: center !important; background: #FAFFFE !important; overflow: hidden !important; padding: 120px 0 80px !important; }
.tk-hero-bg { position: absolute !important; inset: 0 !important; }
#tkCircuitCanvas { position: absolute !important; inset: 0 !important; width: 100% !important; height: 100% !important; opacity: 0.25 !important; }
.tk-hero-grid-overlay { position: absolute !important; inset: 0 !important; background-image: linear-gradient(rgba(57,255,20,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(57,255,20,0.04) 1px, transparent 1px) !important; background-size: 50px 50px !important; }
.tk-hero-container { position: relative !important; z-index: 2 !important; max-width: 800px !important; padding: 0 40px !important; }

.tk-hero-chip { display: inline-flex !important; align-items: center !important; gap: 10px !important; margin-bottom: 28px !important; }
.tk-chip-outer { display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; border-radius: 50% !important; background: rgba(57,255,20,0.1) !important; border: 1.5px solid rgba(57,255,20,0.4) !important; }
.tk-chip-inner { display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 24px !important; height: 24px !important; border-radius: 50% !important; background: rgba(57,255,20,0.15) !important; }
.tk-chip-icon { width: 14px !important; height: 14px !important; }
.tk-chip-label { font-size: 12px !important; font-weight: 600 !important; letter-spacing: 2px !important; text-transform: uppercase !important; color: #6B7C93 !important; font-family: 'Inter', sans-serif !important; }

.tk-hero-headline { font-size: clamp(36px, 6vw, 72px) !important; font-weight: 900 !important; line-height: 1.05 !important; letter-spacing: -2px !important; color: #0F172A !important; margin: 0 0 24px !important; font-family: 'Inter', sans-serif !important; }
.tk-hero-sub { font-size: 18px !important; line-height: 1.75 !important; color: #4B5563 !important; margin: 0 0 36px !important; max-width: 580px !important; font-family: 'Inter', sans-serif !important; }

.tk-hero-actions { display: flex !important; gap: 14px !important; flex-wrap: wrap !important; margin-bottom: 36px !important; }

.tk-hero-platforms { display: flex !important; gap: 12px !important; flex-wrap: wrap !important; }
.tk-platform-tag { display: inline-flex !important; align-items: center !important; gap: 6px !important; padding: 6px 14px !important; background: rgba(15,23,42,0.04) !important; border: 1px solid rgba(15,23,42,0.1) !important; border-radius: 20px !important; font-size: 12px !important; font-weight: 600 !important; color: #6B7C93 !important; font-family: 'Inter', sans-serif !important; transition: all 0.3s !important; }
.tk-platform-tag:hover { background: rgba(57,255,20,0.08) !important; border-color: rgba(57,255,20,0.4) !important; color: #27B80E !important; }

/* ---- METRICS ---- */
.tk-metrics { background: #F8FAFC !important; padding: 28px 0 !important; border-bottom: 1px solid #E2E8F0 !important; border-top: 1px solid #E2E8F0 !important; }
.tk-metrics-grid { display: grid !important; grid-template-columns: repeat(7, 1fr) !important; align-items: center !important; }
.tk-metric-item { text-align: center !important; display: flex !important; flex-direction: column !important; gap: 4px !important; padding: 8px 0 !important; }
.tk-metric-num { font-size: 20px !important; font-weight: 800 !important; font-family: 'Inter', sans-serif !important; line-height: 1 !important; }
.tk-metric-label { font-size: 11px !important; color: #6B7C93 !important; font-weight: 500 !important; text-transform: uppercase !important; letter-spacing: 0.5px !important; }
.tk-metric-divider { width: 1px !important; height: 32px !important; background: #E2E8F0 !important; margin: 0 auto !important; }

/* ---- SERVICES GRID ---- */
.tk-services-grid { display: grid !important; grid-template-columns: repeat(3, 1fr) !important; gap: 20px !important; }
.tk-service-card { background: #FFFFFF !important; border: 1px solid #E2E8F0 !important; border-radius: 16px !important; padding: 32px 26px !important; transition: all 0.4s ease !important; position: relative !important; overflow: hidden !important; box-shadow: 0 1px 4px rgba(0,0,0,0.05) !important; }
.tk-service-card:hover { border-color: rgba(57,255,20,0.5) !important; transform: translateY(-4px) !important; box-shadow: 0 12px 40px rgba(57,255,20,0.08) !important; }
.tk-service-card--featured { border-color: rgba(57,255,20,0.3) !important; background: #FAFFFE !important; }
.tk-service-card--featured::before { content: '' !important; position: absolute !important; top: 0 !important; left: 0 !important; right: 0 !important; height: 2px !important; background: linear-gradient(90deg, #39FF14, #06B6D4) !important; }
.tk-service-card--cta { background: rgba(57,255,20,0.03) !important; border: 1px solid rgba(57,255,20,0.2) !important; display: flex !important; align-items: center !important; justify-content: center !important; box-shadow: none !important; }
.tk-service-glow { position: absolute !important; top: -40px !important; right: -40px !important; width: 150px !important; height: 150px !important; border-radius: 50% !important; background: radial-gradient(circle, rgba(57,255,20,0.06) 0%, transparent 70%) !important; pointer-events: none !important; }
.tk-service-icon-wrap { width: 48px !important; height: 48px !important; border-radius: 12px !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 20px !important; margin-bottom: 18px !important; border: 1px solid !important; }
.tk-service-title { font-size: 18px !important; font-weight: 700 !important; color: #0F172A !important; margin: 0 0 10px !important; font-family: 'Inter', sans-serif !important; }
.tk-service-text { font-size: 14px !important; line-height: 1.7 !important; color: #4B5563 !important; margin: 0 0 16px !important; }
.tk-service-tags { display: flex !important; flex-wrap: wrap !important; gap: 6px !important; margin-bottom: 14px !important; }
.tk-service-tags span { font-size: 11px !important; font-weight: 500 !important; padding: 3px 10px !important; background: #F1F5F9 !important; border: 1px solid #E2E8F0 !important; border-radius: 20px !important; color: #4B5563 !important; }
.tk-service-devices { display: flex !important; gap: 8px !important; }
.tk-device-pill { display: inline-flex !important; align-items: center !important; gap: 5px !important; font-size: 11px !important; font-weight: 600 !important; padding: 4px 10px !important; border-radius: 20px !important; }
.tk-device-pill:first-child { background: rgba(57,255,20,0.08) !important; color: #27B80E !important; border: 1px solid rgba(57,255,20,0.3) !important; }
.tk-device-pill:last-child { background: rgba(6,182,212,0.08) !important; color: #0891B2 !important; border: 1px solid rgba(6,182,212,0.25) !important; }
.tk-neon-circle { width: 60px !important; height: 60px !important; border-radius: 50% !important; background: rgba(57,255,20,0.08) !important; border: 1.5px solid rgba(57,255,20,0.35) !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 24px !important; color: #27B80E !important; margin: 0 auto 16px !important; box-shadow: none !important; }
.tk-service-cta-inner { text-align: center !important; }

/* ---- SPLIT GRID ---- */
.tk-split-grid { display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 64px !important; align-items: center !important; }
.tk-split-grid--reverse .tk-split-content { order: 2 !important; }
.tk-split-grid--reverse .tk-split-visual { order: 1 !important; }

/* ---- FEATURE LIST ---- */
.tk-feature-list { display: flex !important; flex-direction: column !important; gap: 16px !important; }
.tk-feature-row { display: flex !important; gap: 14px !important; align-items: flex-start !important; }
.tk-feature-dot { width: 10px !important; height: 10px !important; border-radius: 50% !important; flex-shrink: 0 !important; margin-top: 6px !important; }
.tk-feature-row strong { display: block !important; color: #0F172A !important; font-size: 15px !important; font-weight: 600 !important; margin-bottom: 2px !important; font-family: 'Inter', sans-serif !important; }
.tk-feature-row p { font-size: 13px !important; color: #6B7C93 !important; line-height: 1.6 !important; margin: 0 !important; }

/* ---- PHONE MOCKUP ---- */
.tk-phone-mockup { position: relative !important; display: flex !important; gap: 20px !important; align-items: flex-start !important; justify-content: center !important; }
.tk-phone-frame { width: 200px !important; background: #0A0A1A !important; border: 2px solid rgba(57,255,20,0.3) !important; border-radius: 28px !important; overflow: hidden !important; box-shadow: 0 24px 60px rgba(0,0,0,0.15), 0 0 40px rgba(57,255,20,0.06) !important; position: relative !important; }
.tk-phone-frame--android { width: 160px !important; margin-top: 40px !important; border-color: rgba(57,255,20,0.2) !important; box-shadow: 0 20px 50px rgba(0,0,0,0.1), 0 0 30px rgba(57,255,20,0.04) !important; }
.tk-phone-screen { padding: 12px 10px !important; }
.tk-phone-status-bar { display: flex !important; justify-content: space-between !important; font-size: 10px !important; color: rgba(255,255,255,0.5) !important; margin-bottom: 8px !important; padding: 0 4px !important; }
.tk-phone-icons { display: flex !important; gap: 4px !important; }
.tk-phone-app-ui { display: flex !important; flex-direction: column !important; gap: 8px !important; }
.tk-app-header { display: flex !important; align-items: center !important; justify-content: space-between !important; padding: 6px 8px !important; background: rgba(255,255,255,0.04) !important; border-radius: 8px !important; font-size: 11px !important; color: rgba(255,255,255,0.7) !important; font-weight: 600 !important; }
.tk-app-logo-dot { width: 8px !important; height: 8px !important; border-radius: 50% !important; background: linear-gradient(135deg, #39FF14, #06B6D4) !important; }
.tk-app-hero-card { background: rgba(255,255,255,0.03) !important; border: 1px solid rgba(255,255,255,0.06) !important; border-radius: 10px !important; overflow: hidden !important; }
.tk-app-map-placeholder { height: 90px !important; position: relative !important; background: rgba(6,182,212,0.05) !important; overflow: hidden !important; }
.tk-map-grid { position: absolute !important; inset: 0 !important; background-image: linear-gradient(rgba(6,182,212,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(6,182,212,0.1) 1px, transparent 1px) !important; background-size: 12px 12px !important; }
.tk-map-pin { position: absolute !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; color: #39FF14 !important; font-size: 18px !important; filter: drop-shadow(0 0 6px rgba(57,255,20,0.5)) !important; }
.tk-map-circle { position: absolute !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; width: 40px !important; height: 40px !important; border-radius: 50% !important; border: 1px solid rgba(57,255,20,0.3) !important; animation: mapPulse 2s ease-in-out infinite !important; }
@keyframes mapPulse { 0%,100% { transform:translate(-50%,-50%) scale(1); opacity:1; } 50% { transform:translate(-50%,-50%) scale(1.3); opacity:0.4; } }
.tk-app-card-footer { display: flex !important; gap: 6px !important; padding: 6px 8px !important; }
.tk-app-stat-pill { font-size: 9px !important; font-weight: 600 !important; padding: 3px 7px !important; border-radius: 8px !important; display: flex !important; align-items: center !important; gap: 3px !important; }
.tk-app-grid-4 { display: grid !important; grid-template-columns: repeat(4, 1fr) !important; gap: 6px !important; }
.tk-app-icon-block { display: flex !important; flex-direction: column !important; align-items: center !important; gap: 3px !important; padding: 8px 4px !important; border-radius: 8px !important; font-size: 12px !important; }
.tk-app-icon-block span { font-size: 8px !important; color: rgba(255,255,255,0.4) !important; }
.tk-mini-progress { width: 100% !important; height: 4px !important; background: rgba(255,255,255,0.08) !important; border-radius: 2px !important; margin-bottom: 4px !important; overflow: hidden !important; }
.tk-mini-progress-fill { height: 100% !important; background: linear-gradient(90deg, #39FF14, #06B6D4) !important; border-radius: 2px !important; }
.tk-phone-android { display: flex !important; flex-direction: column !important; }

/* ---- GIS ---- */
.tk-gis-header { text-align: center !important; margin-bottom: 48px !important; }
.tk-gis-showcase { display: grid !important; grid-template-columns: 1fr 1fr !important; gap: 48px !important; align-items: center !important; }
.tk-map-container { position: relative !important; height: 320px !important; border-radius: 16px !important; overflow: hidden !important; background: #F8FAFC !important; border: 1px solid #E2E8F0 !important; }
.tk-map-bg { position: absolute !important; inset: 0 !important; background: linear-gradient(135deg, rgba(248,250,252,0.95), rgba(241,245,249,0.98)) !important; }
.tk-map-layers { position: absolute !important; inset: 0 !important; }
.tk-map-layer { position: absolute !important; border-radius: 4px !important; opacity: 0.5 !important; }
.tk-map-layer--1 { top: 20%; left: 15%; width: 30%; height: 25%; background: rgba(57,255,20,0.15) !important; border: 1px solid rgba(57,255,20,0.4) !important; }
.tk-map-layer--2 { top: 50%; left: 40%; width: 35%; height: 30%; background: rgba(6,182,212,0.12) !important; border: 1px solid rgba(6,182,212,0.35) !important; }
.tk-map-layer--3 { top: 30%; left: 55%; width: 28%; height: 20%; background: rgba(15,23,42,0.06) !important; border: 1px solid rgba(15,23,42,0.15) !important; }
.tk-map-pins { position: absolute !important; inset: 0 !important; }
.tk-map-pin-marker { position: absolute !important; transform: translate(-50%, -50%) !important; font-size: 20px !important; color: #27B80E !important; filter: none !important; }
.tk-pin-pulse { position: absolute !important; width: 28px !important; height: 28px !important; border-radius: 50% !important; border: 1.5px solid rgba(57,255,20,0.5) !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; animation: pinPulse 2s ease-in-out infinite !important; }
@keyframes pinPulse { 0%,100%{transform:translate(-50%,-50%) scale(0.8);opacity:0.8;} 50%{transform:translate(-50%,-50%) scale(1.4);opacity:0;} }
.tk-map-overlay-card { position: absolute !important; bottom: 16px !important; left: 16px !important; background: rgba(255,255,255,0.95) !important; border: 1px solid #E2E8F0 !important; border-radius: 8px !important; padding: 10px 14px !important; backdrop-filter: blur(8px) !important; box-shadow: 0 2px 12px rgba(0,0,0,0.08) !important; }
.tk-gis-features { display: flex !important; flex-direction: column !important; gap: 24px !important; }
.tk-gis-feature-item { display: flex !important; gap: 16px !important; align-items: flex-start !important; }
.tk-gis-feature-icon { width: 40px !important; height: 40px !important; border-radius: 10px !important; background: #F8FAFC !important; border: 1px solid #E2E8F0 !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 18px !important; flex-shrink: 0 !important; }
.tk-gis-feature-item h4 { font-size: 15px !important; font-weight: 600 !important; color: #0F172A !important; margin: 0 0 4px !important; font-family: 'Inter', sans-serif !important; }
.tk-gis-feature-item p { font-size: 13px !important; color: #6B7C93 !important; line-height: 1.6 !important; margin: 0 !important; }

/* ---- PROCESS ---- */
.tk-process-timeline { position: relative !important; display: flex !important; flex-direction: column !important; gap: 0 !important; }
.tk-process-track { position: absolute !important; left: 20px !important; top: 24px !important; bottom: 24px !important; width: 2px !important; background: linear-gradient(180deg, #39FF14, #06B6D4, #39FF14) !important; opacity: 0.3 !important; }
.tk-process-step { display: flex !important; gap: 28px !important; align-items: flex-start !important; padding: 24px 0 !important; border-bottom: 1px solid #F1F5F9 !important; }
.tk-process-step:last-child { border-bottom: none !important; }
.tk-process-node { width: 42px !important; height: 42px !important; border-radius: 50% !important; border: 2px solid !important; display: flex !important; align-items: center !important; justify-content: center !important; font-size: 12px !important; font-weight: 700 !important; background: #FFFFFF !important; flex-shrink: 0 !important; font-family: 'Inter', sans-serif !important; }
.tk-process-card h3 { font-size: 18px !important; font-weight: 700 !important; color: #0F172A !important; margin: 0 0 6px !important; font-family: 'Inter', sans-serif !important; }
.tk-process-card p { font-size: 14px !important; color: #6B7C93 !important; line-height: 1.7 !important; margin: 0 !important; }
.tk-process-week { font-size: 11px !important; font-weight: 600 !important; text-transform: uppercase !important; letter-spacing: 1.5px !important; display: block !important; margin-bottom: 6px !important; }

/* ---- DESIGN MOCKUP ---- */
.tk-design-mockup { position: relative !important; display: flex !important; flex-direction: column !important; gap: 16px !important; }
.tk-design-card { background: #FFFFFF !important; border: 1px solid #E2E8F0 !important; border-radius: 14px !important; overflow: hidden !important; box-shadow: 0 1px 4px rgba(0,0,0,0.05) !important; }
.tk-dc-header { padding: 14px 18px !important; }
.tk-dc-body { padding: 16px 18px !important; }
.tk-color-swatches { display: flex !important; gap: 8px !important; margin-bottom: 12px !important; }
.tk-swatch { width: 28px !important; height: 28px !important; border-radius: 6px !important; }
.tk-design-offerings { display: flex !important; flex-direction: column !important; gap: 10px !important; }
.tk-design-item { display: flex !important; align-items: center !important; gap: 10px !important; font-size: 14px !important; color: #4B5563 !important; font-family: 'Inter', sans-serif !important; }
.tk-design-item i { width: 16px !important; flex-shrink: 0 !important; }

/* ---- STATS ---- */
.tk-stats-section { background: #F8FAFC !important; padding: 80px 0 !important; }
.tk-stats-header { text-align: center !important; margin-bottom: 48px !important; }
.tk-stats-grid { display: grid !important; grid-template-columns: repeat(4, 1fr) !important; gap: 20px !important; }
.tk-stat-card { background: #FFFFFF !important; border: 1px solid #E2E8F0 !important; border-radius: 16px !important; padding: 32px 24px !important; text-align: center !important; position: relative !important; overflow: hidden !important; transition: all 0.4s !important; box-shadow: 0 1px 4px rgba(0,0,0,0.04) !important; }
.tk-stat-card::before { content:'' !important; position:absolute !important; top:0 !important; left:0 !important; right:0 !important; height:2px !important; background:linear-gradient(90deg,transparent,#39FF14,transparent) !important; opacity:0 !important; transition:opacity 0.4s !important; }
.tk-stat-card:hover::before { opacity:1 !important; }
.tk-stat-card:hover { transform:translateY(-4px) !important; border-color:rgba(57,255,20,0.3) !important; box-shadow: 0 8px 24px rgba(57,255,20,0.08) !important; }
.tk-stat-card--featured { border-color:rgba(57,255,20,0.35) !important; background:#FAFFFE !important; }
.tk-stat-card--featured::before { background:linear-gradient(90deg,transparent,#39FF14,transparent) !important; opacity:1 !important; }
.tk-stat-inner { position:relative !important; z-index:1 !important; }
.tk-stat-num { display:block !important; font-size:36px !important; font-weight:900 !important; font-family:'Inter',sans-serif !important; line-height:1.1 !important; margin-bottom:6px !important; }
.tk-stat-label { display:block !important; font-size:15px !important; font-weight:600 !important; color:#0F172A !important; margin-bottom:6px !important; font-family:'Inter',sans-serif !important; }
.tk-stat-sub { display:block !important; font-size:12px !important; color:#6B7C93 !important; line-height:1.5 !important; }
.tk-stat-bg-icon { position:absolute !important; bottom:-10px !important; right:10px !important; font-size:72px !important; color:rgba(15,23,42,0.03) !important; }

/* ---- AUDIENCE ---- */
.tk-audience-grid { display:grid !important; grid-template-columns:repeat(4,1fr) !important; gap:20px !important; }
.tk-audience-card { background:#FFFFFF !important; border:1px solid #E2E8F0 !important; border-radius:14px !important; padding:28px 22px !important; transition:all 0.3s !important; box-shadow: 0 1px 4px rgba(0,0,0,0.04) !important; }
.tk-audience-card:hover { border-color:rgba(57,255,20,0.4) !important; transform:translateY(-4px) !important; box-shadow: 0 8px 24px rgba(57,255,20,0.07) !important; }
.tk-audience-icon-wrap { width:44px !important; height:44px !important; border-radius:12px !important; border:1px solid !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:20px !important; margin-bottom:14px !important; }
.tk-audience-card h3 { font-size:17px !important; font-weight:700 !important; color:#0F172A !important; margin:0 0 10px !important; font-family:'Inter',sans-serif !important; }
.tk-audience-card p { font-size:13px !important; line-height:1.7 !important; color:#6B7C93 !important; margin:0 !important; }

/* ---- TESTIMONIAL ---- */
.tk-testimonial-section { background:#FFFFFF !important; padding:80px 0 !important; }
.tk-testimonial-card { max-width:820px !important; margin:0 auto !important; padding:48px 40px !important; background:#F8FAFC !important; border:1px solid #E2E8F0 !important; border-radius:20px !important; text-align:center !important; }
.tk-testimonial-quote-mark { font-size:64px !important; line-height:1 !important; color:#39FF14 !important; font-family:Georgia,serif !important; opacity:0.5 !important; margin-bottom:8px !important; }
.tk-testimonial-text { font-size:22px !important; font-weight:300 !important; line-height:1.7 !important; color:#1E293B !important; margin:0 0 24px !important; font-family:'Inter',Georgia,sans-serif !important; font-style:italic !important; }
.tk-testimonial-highlight { color:#27B80E !important; font-weight:600 !important; }
.tk-testimonial-divider { display:flex !important; align-items:center !important; justify-content:center !important; gap:16px !important; margin:0 auto 24px !important; max-width:120px !important; }
.tk-testimonial-divider span:first-child, .tk-testimonial-divider span:last-child { flex:1 !important; height:1px !important; background:rgba(57,255,20,0.3) !important; display:block !important; }
.tk-divider-diamond { color:rgba(57,255,20,0.5) !important; font-size:10px !important; }
.tk-testimonial-author { display:flex !important; align-items:center !important; justify-content:center !important; gap:16px !important; padding-top:24px !important; border-top:1px solid #E2E8F0 !important; }
.tk-testimonial-avatar { width:48px !important; height:48px !important; border-radius:50% !important; background:linear-gradient(135deg,#39FF14,#06B6D4) !important; color:#0F172A !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:14px !important; font-weight:700 !important; font-family:'Inter',sans-serif !important; flex-shrink:0 !important; }
.tk-testimonial-author > div { text-align:left !important; }
.tk-testimonial-name { font-size:15px !important; font-weight:600 !important; color:#0F172A !important; margin:0 0 2px !important; font-family:'Inter',sans-serif !important; }
.tk-testimonial-role { font-size:12px !important; color:#6B7C93 !important; margin:0 0 4px !important; }
.tk-stars { color:#27B80E !important; font-size:13px !important; display:flex !important; align-items:center !important; gap:4px !important; }
.tk-stars span { font-size:12px !important; color:#6B7C93 !important; }

/* ---- TECH STACK ---- */
.tk-stack-grid { display:grid !important; grid-template-columns:repeat(3,1fr) !important; gap:24px !important; }
.tk-stack-category { background:#FFFFFF !important; border:1px solid #E2E8F0 !important; border-radius:14px !important; padding:24px 22px !important; box-shadow: 0 1px 4px rgba(0,0,0,0.04) !important; }
.tk-stack-cat-title { font-size:14px !important; font-weight:700 !important; margin:0 0 12px !important; display:flex !important; align-items:center !important; gap:8px !important; font-family:'Inter',sans-serif !important; text-transform:uppercase !important; letter-spacing:1px !important; }
.tk-stack-chips { display:flex !important; flex-wrap:wrap !important; gap:8px !important; }
.tk-stack-chip { font-size:12px !important; font-weight:500 !important; padding:5px 12px !important; background:#F1F5F9 !important; border:1px solid #E2E8F0 !important; border-radius:20px !important; color:#4B5563 !important; transition:all 0.25s !important; }
.tk-stack-chip:hover { border-color:rgba(57,255,20,0.5) !important; color:#27B80E !important; background:rgba(57,255,20,0.05) !important; }

/* ---- FAQ ---- */
.tk-faq-list { display:flex !important; flex-direction:column !important; gap:10px !important; }
.tk-faq-item { border:1px solid #E2E8F0 !important; border-radius:12px !important; background:#FFFFFF !important; overflow:hidden !important; transition:border-color 0.25s !important; box-shadow: 0 1px 3px rgba(0,0,0,0.04) !important; }
.tk-faq-item:hover { border-color:rgba(57,255,20,0.4) !important; }
.tk-faq-item.tk-faq-open { border-color:rgba(57,255,20,0.5) !important; }
.tk-faq-question { width:100% !important; display:flex !important; align-items:center !important; justify-content:space-between !important; gap:16px !important; padding:18px 22px !important; background:transparent !important; border:none !important; cursor:pointer !important; text-align:left !important; font-size:15px !important; font-weight:600 !important; color:#0F172A !important; font-family:'Inter',sans-serif !important; }
.tk-faq-icon { flex-shrink:0 !important; width:28px !important; height:28px !important; border-radius:50% !important; background:rgba(57,255,20,0.08) !important; color:#27B80E !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:11px !important; transition:all 0.3s !important; }
.tk-faq-open .tk-faq-icon { transform:rotate(135deg) !important; background:#39FF14 !important; color:#0F172A !important; }
.tk-faq-answer { max-height:0 !important; overflow:hidden !important; transition:max-height 0.35s ease, padding 0.35s ease !important; padding:0 22px !important; }
.tk-faq-open .tk-faq-answer { max-height:300px !important; padding:0 22px 20px !important; }
.tk-faq-answer p { font-size:14px !important; line-height:1.75 !important; color:#6B7C93 !important; margin:0 !important; }

/* ---- CTA ---- */
.tk-cta-section { position:relative !important; background:#FAFFFE !important; padding:100px 0 !important; overflow:hidden !important; text-align:center !important; border-top:1px solid #E2E8F0 !important; }
.tk-cta-bg { position:absolute !important; inset:0 !important; }
.tk-cta-circuit { position:absolute !important; inset:0 !important; background: radial-gradient(ellipse at center, rgba(57,255,20,0.05) 0%, transparent 70%) !important; }
.tk-cta-inner { position:relative !important; z-index:2 !important; }
.tk-cta-actions { display:flex !important; gap:16px !important; justify-content:center !important; flex-wrap:wrap !important; margin-bottom:32px !important; }
.tk-cta-platforms { display:flex !important; align-items:center !important; justify-content:center !important; gap:12px !important; flex-wrap:wrap !important; font-size:13px !important; color:#94A3B8 !important; font-weight:500 !important; }
.tk-cta-platforms i { color:rgba(57,255,20,0.6) !important; margin-right:4px !important; }
.tk-dot { color:#CBD5E1 !important; }

/* ---- FLOATING CHAT ---- */
.tk-floating-chat { position:fixed !important; bottom:28px !important; right:28px !important; z-index:99999 !important; font-family:'Inter',sans-serif !important; }
.tk-chat-toggle { width:56px !important; height:56px !important; border-radius:50% !important; background:#0F172A !important; border:none !important; color:#FFFFFF !important; font-size:24px !important; cursor:pointer !important; box-shadow:0 4px 20px rgba(15,23,42,0.25) !important; transition:all 0.3s !important; position:relative !important; display:flex !important; align-items:center !important; justify-content:center !important; }
.tk-chat-toggle:hover { transform:scale(1.08) !important; box-shadow:0 8px 32px rgba(15,23,42,0.35) !important; background:#1E293B !important; }
.tk-chat-badge { position:absolute !important; top:-4px !important; right:-4px !important; background:#39FF14 !important; color:#0F172A !important; font-size:11px !important; font-weight:700 !important; width:20px !important; height:20px !important; border-radius:50% !important; display:flex !important; align-items:center !important; justify-content:center !important; animation:chatPulse 2s infinite !important; border:2px solid #FFFFFF !important; }
@keyframes chatPulse { 0%,100%{transform:scale(1);} 50%{transform:scale(1.15);} }
.tk-chat-badge.hidden { display:none !important; }
.tk-chat-window { position:absolute !important; bottom:68px !important; right:0 !important; width:360px !important; max-width:calc(100vw - 40px) !important; background:#FFFFFF !important; border:1px solid #E2E8F0 !important; border-radius:16px !important; box-shadow:0 8px 60px rgba(0,0,0,0.12) !important; display:none !important; flex-direction:column !important; overflow:hidden !important; transform-origin:bottom right !important; }
.tk-chat-window.open { display:flex !important; }
.tk-chat-header { display:flex !important; align-items:center !important; justify-content:space-between !important; padding:14px 18px !important; background:#F8FAFC !important; border-bottom:1px solid #E2E8F0 !important; }
.tk-chat-header-info { display:flex !important; align-items:center !important; gap:10px !important; }
.tk-chat-avatar-glyph { font-size:20px !important; }
.tk-chat-header h4 { font-size:14px !important; font-weight:600 !important; color:#0F172A !important; margin:0 !important; }
.tk-chat-header p { font-size:11px !important; color:#6B7C93 !important; margin:0 !important; }
.tk-chat-close { background:none !important; border:none !important; color:#94A3B8 !important; font-size:16px !important; cursor:pointer !important; padding:4px !important; }
.tk-chat-close:hover { color:#0F172A !important; }
.tk-chat-messages { flex:1 !important; padding:14px 16px !important; overflow-y:auto !important; max-height:320px !important; min-height:180px !important; display:flex !important; flex-direction:column !important; gap:8px !important; background:#FFFFFF !important; }
.tk-chat-msg { max-width:85% !important; padding:10px 14px !important; border-radius:12px !important; font-size:13px !important; line-height:1.6 !important; }
.tk-chat-msg--bot { background:#F1F5F9 !important; color:#1E293B !important; border-radius:0 12px 12px 12px !important; align-self:flex-start !important; border:1px solid #E2E8F0 !important; }
.tk-chat-msg--bot p { margin:0 0 4px !important; }
.tk-chat-msg--bot p:last-child { margin:0 !important; }
.tk-chat-msg--bot ul { margin:4px 0 !important; padding-left:16px !important; }
.tk-chat-msg--user { background:#0F172A !important; color:#FFFFFF !important; border-radius:12px 0 12px 12px !important; align-self:flex-end !important; }
.tk-chat-input-area { padding:10px 14px !important; border-top:1px solid #E2E8F0 !important; background:#FFFFFF !important; }
.tk-chat-form { display:flex !important; gap:8px !important; align-items:center !important; }
.tk-chat-form input { flex:1 !important; padding:9px 13px !important; background:#F8FAFC !important; border:1px solid #E2E8F0 !important; border-radius:8px !important; font-size:13px !important; color:#0F172A !important; outline:none !important; font-family:'Inter',sans-serif !important; }
.tk-chat-form input:focus { border-color:#39FF14 !important; }
.tk-chat-form input::placeholder { color:#94A3B8 !important; }
.tk-chat-form button { width:36px !important; height:36px !important; border-radius:50% !important; background:#0F172A !important; color:#FFFFFF !important; border:none !important; cursor:pointer !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:14px !important; flex-shrink:0 !important; }
.tk-chat-typing { display:flex !important; gap:5px !important; padding:6px 2px !important; }
.tk-chat-typing span { width:7px !important; height:7px !important; border-radius:50% !important; background:#39FF14 !important; animation:chatBounce 1.4s ease-in-out infinite !important; }
.tk-chat-typing span:nth-child(2) { animation-delay:0.2s !important; }
.tk-chat-typing span:nth-child(3) { animation-delay:0.4s !important; }
@keyframes chatBounce { 0%,60%,100%{transform:translateY(0);opacity:0.3;} 30%{transform:translateY(-6px);opacity:0.9;} }

/* ---- STICKY HEADER ---- */
.ast-main-header-wrap { position: sticky !important; top: 0 !important; z-index: 999 !important; transition: box-shadow 0.3s, background 0.3s !important; }
.ast-main-header-wrap.tk-header-scrolled, .main-header-bar.tk-header-scrolled { box-shadow: 0 4px 24px rgba(0,0,0,0.08) !important; background: rgba(255,255,255,0.98) !important; backdrop-filter: blur(10px) !important; }

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 991px) {
    .tk-services-grid { grid-template-columns: 1fr 1fr !important; }
    .tk-split-grid { grid-template-columns: 1fr !important; gap: 40px !important; }
    .tk-split-grid--reverse .tk-split-content { order: 1 !important; }
    .tk-split-grid--reverse .tk-split-visual { order: 2 !important; }
    .tk-gis-showcase { grid-template-columns: 1fr !important; gap: 32px !important; }
    .tk-stats-grid { grid-template-columns: 1fr 1fr !important; }
    .tk-audience-grid { grid-template-columns: 1fr 1fr !important; }
    .tk-stack-grid { grid-template-columns: 1fr 1fr !important; }
    .tk-metrics-grid { grid-template-columns: repeat(4,1fr) !important; }
    .tk-phone-mockup { justify-content: center !important; }
}
@media (max-width: 768px) {
    .tk-section { padding: 60px 0 !important; }
    .tk-hero { padding: 100px 0 60px !important; }
    .tk-hero-container { padding: 0 20px !important; }
    .tk-hero-headline { font-size: clamp(28px, 8vw, 42px) !important; }
    .tk-services-grid { grid-template-columns: 1fr !important; }
    .tk-stats-grid { grid-template-columns: 1fr 1fr !important; }
    .tk-audience-grid { grid-template-columns: 1fr !important; }
    .tk-stack-grid { grid-template-columns: 1fr !important; }
    .tk-testimonial-card { padding: 32px 24px !important; }
    .tk-testimonial-text { font-size: 18px !important; }
    .tk-metrics-grid { grid-template-columns: 1fr 1fr !important; row-gap: 16px !important; }
    .tk-metric-divider { display: none !important; }
    .tk-phone-android { display: none !important; }
    .tk-process-track { display: none !important; }
}
@media (max-width: 480px) {
    .tk-section { padding: 44px 0 !important; }
    .tk-container { padding: 0 16px !important; }
    .tk-container--narrow { padding: 0 16px !important; }
    .tk-hero-actions { flex-direction: column !important; }
    .tk-btn { width: 100% !important; text-align: center !important; }
    .tk-stats-grid { grid-template-columns: 1fr !important; }
    .tk-cta-actions { flex-direction: column !important; }
    .tk-process-step { flex-direction: column !important; gap: 10px !important; }
    .tk-process-node { width: 36px !important; height: 36px !important; font-size: 11px !important; }
}
</style>

<!-- ============================================ -->
<!-- CIRCUIT CANVAS ANIMATION -->
<!-- ============================================ -->
<script>
(function() {
    const canvas = document.getElementById('tkCircuitCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    let W, H, nodes = [], lines = [];

    function resize() {
        W = canvas.width = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
        init();
    }

    function init() {
        nodes = [];
        lines = [];
        const count = Math.floor((W * H) / 18000);
        for (let i = 0; i < count; i++) {
            nodes.push({ x: Math.random() * W, y: Math.random() * H, r: Math.random() * 2.5 + 1, vx: (Math.random() - 0.5) * 0.3, vy: (Math.random() - 0.5) * 0.3, color: ['#2563EB','#06B6D4','#39FF14'][Math.floor(Math.random()*3)] });
        }
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);
        nodes.forEach(n => {
            n.x += n.vx; n.y += n.vy;
            if (n.x < 0 || n.x > W) n.vx *= -1;
            if (n.y < 0 || n.y > H) n.vy *= -1;
        });
        for (let i = 0; i < nodes.length; i++) {
            for (let j = i+1; j < nodes.length; j++) {
                const d = Math.hypot(nodes[i].x - nodes[j].x, nodes[i].y - nodes[j].y);
                if (d < 100) {
                    ctx.beginPath();
                    ctx.moveTo(nodes[i].x, nodes[i].y);
                    ctx.lineTo(nodes[j].x, nodes[j].y);
                    ctx.strokeStyle = `rgba(37,99,235,${0.15 * (1 - d/100)})`;
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }
        nodes.forEach(n => {
            ctx.beginPath();
            ctx.arc(n.x, n.y, n.r, 0, Math.PI * 2);
            ctx.fillStyle = n.color;
            ctx.globalAlpha = 0.5;
            ctx.fill();
            ctx.globalAlpha = 1;
        });
        requestAnimationFrame(draw);
    }

    window.addEventListener('resize', resize);
    resize();
    draw();
})();
</script>

<!-- ============================================ -->
<!-- MAIN SCRIPTS -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll reveal
    var revealEls = document.querySelectorAll('.tk-reveal');
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('tk-reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function(el) { observer.observe(el); });
    } else {
        revealEls.forEach(function(el) { el.classList.add('tk-reveal-visible'); });
    }

    // FAQ accordion
    document.querySelectorAll('.tk-faq-item').forEach(function(item) {
        item.querySelector('.tk-faq-question').addEventListener('click', function() {
            var isOpen = item.classList.contains('tk-faq-open');
            document.querySelectorAll('.tk-faq-item').forEach(function(o) {
                o.classList.remove('tk-faq-open');
                o.querySelector('.tk-faq-question').setAttribute('aria-expanded','false');
            });
            if (!isOpen) {
                item.classList.add('tk-faq-open');
                this.setAttribute('aria-expanded','true');
            }
        });
    });

    // UTM passthrough for booking links
    ['Book1','Book2','Book3','Book4'].forEach(function(id) {
        var el = document.getElementById(id);
        if (el) el.href += window.location.search;
    });

    // Sticky header
    var siteHeader = document.querySelector('.main-header-bar') || document.querySelector('.ast-primary-header-bar');
    if (siteHeader) {
        var headerWrap = siteHeader.closest('.ast-main-header-wrap') || siteHeader.parentElement;
        function onScroll() {
            var scrolled = window.pageYOffset > 60;
            siteHeader.classList.toggle('tk-header-scrolled', scrolled);
            if (headerWrap) headerWrap.classList.toggle('tk-header-scrolled', scrolled);
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }

    // Subscription form
    var subForm = document.getElementById('subscription-form');
    if (subForm) {
        var successDiv = document.getElementById('subscription-success');
        var errorDiv = document.getElementById('subscription-error');
        var errorMsg = document.getElementById('error-message');
        var messageDiv = document.getElementById('subscription-message');

        subForm.addEventListener('submit', function(e) {
            e.preventDefault();
            successDiv.style.display = 'none';
            errorDiv.style.display = 'none';
            var email = document.getElementById('sub-email').value.trim();
            if (!email) return;
            var submitBtn = subForm.querySelector('button[type="submit"]');
            submitBtn.textContent = 'Subscribing...';
            submitBtn.disabled = true;
            var token = document.querySelector('meta[name="csrf-token"]')?.content || '';
            fetch('/subscribe', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
                body: JSON.stringify({ email: email, source: 'website' })
            }).then(r => r.json()).then(data => {
                submitBtn.textContent = 'Subscribe'; submitBtn.disabled = false;
                if (data.success) { successDiv.style.display = 'block'; subForm.style.display = 'none'; }
                else { errorMsg.textContent = data.message || 'Try again.'; errorDiv.style.display = 'block'; }
            }).catch(() => { submitBtn.textContent = 'Subscribe'; submitBtn.disabled = false; errorMsg.textContent = 'Network error. Try again.'; errorDiv.style.display = 'block'; });
        });
    }

    // Floating chat
    var chatToggle = document.getElementById('tkChatToggle');
    var chatWindow = document.getElementById('tkChatWindow');
    var chatClose  = document.getElementById('tkChatClose');
    var chatForm   = document.getElementById('tkChatForm');
    var chatInput  = document.getElementById('tkChatInput');
    var chatMsgs   = document.getElementById('tkChatMessages');
    var chatTyping = document.getElementById('tkChatTyping');
    var chatSend   = document.getElementById('tkChatSend');
    var chatBadge  = document.getElementById('tkChatBadge');
    var isOpen = false, isProcessing = false, contactId = null;

    function toggleChat() {
        isOpen = !isOpen;
        chatWindow.classList.toggle('open', isOpen);
        if (isOpen) { chatInput.focus(); chatBadge.classList.add('hidden'); }
    }

    if (chatToggle) chatToggle.addEventListener('click', toggleChat);
    if (chatClose) chatClose.addEventListener('click', toggleChat);
    document.addEventListener('click', function(e) { if (isOpen && !e.target.closest('.tk-floating-chat')) toggleChat(); });

    if (chatForm) {
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var msg = chatInput.value.trim();
            if (!msg || isProcessing) return;
            addMsg(msg, 'user');
            chatInput.value = '';
            isProcessing = true; chatSend.disabled = true; chatTyping.style.display = 'flex';
            var token = document.querySelector('meta[name="csrf-token"]')?.content || '';
            fetch('/chat/send', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept': 'application/json' },
                body: JSON.stringify({ message: msg, contact_id: contactId })
            }).then(r => r.json()).then(data => {
                chatTyping.style.display = 'none'; isProcessing = false; chatSend.disabled = false;
                if (data.success) { if (!contactId && data.contact_id) contactId = data.contact_id; addMsg(data.message, 'bot'); }
                else addMsg('Sorry, an error occurred. Please try again.', 'bot');
                chatInput.focus();
            }).catch(() => { chatTyping.style.display = 'none'; isProcessing = false; chatSend.disabled = false; addMsg('Network error. Please try again.', 'bot'); chatInput.focus(); });
        });
    }

    function addMsg(text, sender) {
        var div = document.createElement('div');
        div.className = 'tk-chat-msg tk-chat-msg--' + sender;
        if (sender === 'user') { div.textContent = text; }
        else { text.split('\n').forEach(function(line) { if (line.trim()) { var p = document.createElement('p'); p.textContent = line.trim(); div.appendChild(p); } }); if (!div.children.length) div.textContent = text; }
        var welcome = chatMsgs.querySelector('.tk-chat-welcome');
        if (welcome && sender === 'user') welcome.remove();
        chatMsgs.appendChild(div);
        chatMsgs.scrollTop = chatMsgs.scrollHeight;
    }
});
</script>

<!-- ---- STICKY HEADER STYLE ---- -->
<style>
.ast-main-header-wrap { position: sticky !important; top: 0 !important; z-index: 999 !important; transition: box-shadow 0.3s, background 0.3s !important; }
.ast-main-header-wrap.tk-header-scrolled, .main-header-bar.tk-header-scrolled { box-shadow: 0 4px 24px rgba(0,0,0,0.3) !important; background: rgba(10,15,28,0.98) !important; backdrop-filter: blur(10px) !important; }
</style>

@endsection