@extends('layouts.public')

@section('title', 'Book a Consultation - Sofel Labs')
@section('body_class', 'page-booking')

@section('content')

<!-- ============================================ -->
<!-- BOOKING HERO -->
<!-- ============================================ -->
<section class="sf-booking-hero" style="background-image: url('{{ asset('wp-content/uploads/images/booking-bg.jpg') }}');">
    <div class="sf-booking-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-booking-hero-content">
            <span class="sf-booking-hero-badge">Schedule a Meeting</span>
            <h1 class="sf-booking-hero-title">Book Your <span class="sf-text-teal">Free Consultation</span></h1>
            <p class="sf-booking-hero-subtitle">Choose a time that works for you and let's discuss how we can help transform your learning programs.</p>
            <div class="sf-booking-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- BOOKING SECTION -->
<!-- ============================================ -->
<section class="sf-booking-section">
    <div class="sf-container">
        <div class="sf-booking-grid">
            <!-- Left: Booking Info -->
            <div class="sf-booking-info">
                <div class="sf-booking-info-header">
                    <span class="sf-booking-info-badge">What to Expect</span>
                    <h2 class="sf-booking-info-title">Your <span class="sf-text-teal">Discovery Call</span></h2>
                    <p class="sf-booking-info-text">During this 30-minute consultation, we'll discuss your learning challenges and explore how Sofel Labs can help.</p>
                </div>

                <div class="sf-booking-features">
                    <div class="sf-booking-feature">
                        <div class="sf-booking-feature-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="sf-booking-feature-content">
                            <h4 class="sf-booking-feature-title">Understanding Your Needs</h4>
                            <p class="sf-booking-feature-text">We'll listen to your challenges, goals, and vision for your learning programs.</p>
                        </div>
                    </div>
                    <div class="sf-booking-feature">
                        <div class="sf-booking-feature-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <div class="sf-booking-feature-content">
                            <h4 class="sf-booking-feature-title">Tailored Solutions</h4>
                            <p class="sf-booking-feature-text">We'll share how our instructional design and gamification approaches can address your specific needs.</p>
                        </div>
                    </div>
                    <div class="sf-booking-feature">
                        <div class="sf-booking-feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <div class="sf-booking-feature-content">
                            <h4 class="sf-booking-feature-title">Next Steps</h4>
                            <p class="sf-booking-feature-text">We'll outline a clear path forward and discuss how we can partner together to achieve your goals.</p>
                        </div>
                    </div>
                </div>

                <div class="sf-booking-testimonial">
                    <div class="sf-booking-testimonial-content">
                        <i class="fas fa-quote-left sf-booking-quote-icon"></i>
                        <blockquote class="sf-booking-testimonial-text">
                            "Sofel Labs didn't just gamify our training — they transformed how our people learn. The engagement was unreal."
                        </blockquote>
                        <div class="sf-booking-testimonial-author">
                            <span class="sf-booking-testimonial-name">Cjay</span>
                            <span class="sf-booking-testimonial-title">Instructional Design Specialist</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Cal.com Embed -->
            <div class="sf-booking-calendar">
                <div class="sf-booking-calendar-card">
                    <div class="sf-booking-calendar-header">
                        <div class="sf-booking-calendar-header-info">
                            <span class="sf-booking-calendar-icon">📅</span>
                            <div>
                                <h3 class="sf-booking-calendar-title">Select a Time</h3>
                                <p class="sf-booking-calendar-subtitle">30-minute discovery call</p>
                            </div>
                        </div>
                    </div>

                    <!-- Cal.com Embed -->
                    <div class="sf-booking-calendar-embed">
                        <!-- Cal.com Inline Embed -->
                        <div id="cal-inline"></div>

                        <!-- Cal.com Script -->
                        <script type="module">
                            (function (C, A, L) {
                                let p = function (a, ar) { a.q.push(ar); };
                                let d = C.document;
                                C.Cal = C.Cal || function () { let cal = C.Cal; let ar = arguments; if (!cal.loaded) { cal.ns = {}; cal.q = cal.q || []; d.head.appendChild(d.createElement("script")).src = A; cal.loaded = true; } if (ar[0] === L) { const api = function () { p(api, arguments); }; const namespace = ar[1]; api.q = api.q || []; if (typeof namespace === "string") { cal.ns[namespace] = cal.ns[namespace] || api; p(cal.ns[namespace], ar); p(cal, ["initNamespace", namespace]); } else p(cal, ar); return; } p(cal, ar); };
                            })(window, "https://app.cal.com/embed.js", "init");

                            // Initialize Cal.com with your booking link
                            Cal("init", "https://cal.com/sofellabs", { 
                                origin: "https://cal.com",
                                ui: {
                                    styles: {
                                        branding: {
                                            brandColor: "#47C89F",
                                            logo: "{{ asset('wp-content/uploads/images/logo.jpeg') }}"
                                        }
                                    }
                                }
                            });

                            // Inline embed
                            Cal("inline", {
                                elementOrSelector: "#cal-inline",
                                calLink: "https://cal.com/sofellabs",
                                config: {
                                    layout: "month_view",
                                    theme: "light",
                                    hideEventTypeDetails: false,
                                    hideBranding: true,
                                    cssVarsPerTheme: {
                                        light: {
                                            "--cal-brand": "#47C89F",
                                            "--cal-brand-emphasis": "#3AAF8A",
                                            "--cal-brand-subtle": "rgba(71, 200, 159, 0.1)",
                                            "--cal-text": "#0E2A47",
                                            "--cal-text-emphasis": "#0A1A2E",
                                            "--cal-text-muted": "#6B7C93",
                                            "--cal-bg": "#FFFFFF",
                                            "--cal-bg-emphasis": "#F8FAFB",
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>

                    <div class="sf-booking-calendar-footer">
                        <div class="sf-booking-calendar-footer-item">
                            <i class="fas fa-clock"></i>
                            <span>30 minutes</span>
                        </div>
                        <div class="sf-booking-calendar-footer-item">
                            <i class="fas fa-video"></i>
                            <span>Video call (link sent after booking)</span>
                        </div>
                        <div class="sf-booking-calendar-footer-item">
                            <i class="fas fa-globe"></i>
                            <span>Online meeting</span>
                        </div>
                    </div>
                </div>

                <!-- Alternative: Simple Button -->
                <div class="sf-booking-simple">
                    <div class="sf-booking-simple-divider">
                        <span class="sf-simple-divider-line"></span>
                        <span class="sf-simple-divider-text">or</span>
                        <span class="sf-simple-divider-line"></span>
                    </div>
                    <div class="sf-booking-simple-content">
                        <p class="sf-booking-simple-text">Prefer to schedule directly?</p>
                        <a href="https://cal.com/sofellabs" target="_blank" class="sf-booking-simple-btn">
                            <i class="fas fa-external-link-alt"></i>
                            Open in New Tab
                            <span class="sf-btn-arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- BOOKING CTA -->
<!-- ============================================ -->
<section class="sf-booking-cta">
    <div class="sf-container">
        <div class="sf-booking-cta-content">
            <h2 class="sf-booking-cta-title">Not Ready to Book? <span class="sf-text-teal">Let's Chat</span></h2>
            <p class="sf-booking-cta-text">Have questions before scheduling? We're happy to answer them.</p>
            <div class="sf-booking-cta-buttons">
                <a href="{{ route('contact') }}" class="sf-booking-cta-btn sf-booking-cta-btn-primary">
                    Contact Us <span class="sf-cta-arrow">→</span>
                </a>
                <a href="{{ route('services') }}" class="sf-booking-cta-btn sf-booking-cta-btn-secondary">
                    Explore Our Services
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Booking Page -->
<!-- ============================================ -->
<style>
    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }
    .sf-text-teal {
        color: #47C89F !important;
    }

    /* ---- Hero ---- */
    .sf-booking-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 400px !important;
        display: flex !important;
        align-items: center !important;
    }
    .sf-booking-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }
    .sf-booking-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }
    .sf-booking-hero-badge {
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
    .sf-booking-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }
    .sf-booking-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
    }
    .sf-booking-hero-line {
        width: 60px !important;
        height: 3px !important;
        background: #47C89F !important;
        border-radius: 4px !important;
        margin-top: 8px !important;
    }

    /* ---- Booking Section ---- */
    .sf-booking-section {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
    }
    .sf-booking-grid {
        display: grid !important;
        grid-template-columns: 1fr 1.5fr !important;
        gap: 60px !important;
        align-items: start !important;
    }

    /* ---- Booking Info ---- */
    .sf-booking-info-header {
        margin-bottom: 32px !important;
    }
    .sf-booking-info-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #47C89F !important;
        margin-bottom: 12px !important;
    }
    .sf-booking-info-title {
        font-size: 34px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }
    .sf-booking-info-text {
        font-size: 16px !important;
        line-height: 1.7 !important;
        color: #6B7C93 !important;
        margin: 0 !important;
    }

    .sf-booking-features {
        display: flex !important;
        flex-direction: column !important;
        gap: 20px !important;
        margin-bottom: 32px !important;
    }
    .sf-booking-feature {
        display: flex !important;
        gap: 16px !important;
        padding: 18px 20px !important;
        background: #F8FAFB !important;
        border-radius: 12px !important;
        transition: all 0.3s ease !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .sf-booking-feature:hover {
        transform: translateX(4px) !important;
        border-color: rgba(71, 200, 159, 0.08) !important;
    }
    .sf-booking-feature-icon {
        width: 44px !important;
        height: 44px !important;
        border-radius: 50% !important;
        background: rgba(71, 200, 159, 0.06) !important;
        color: #47C89F !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        flex-shrink: 0 !important;
        margin-top: 2px !important;
    }
    .sf-booking-feature-content {
        flex: 1 !important;
    }
    .sf-booking-feature-title {
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-booking-feature-text {
        font-size: 14px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        line-height: 1.6 !important;
    }

    /* ---- Testimonial ---- */
    .sf-booking-testimonial {
        background: linear-gradient(135deg, #F8FAFB, #F0F4F6) !important;
        padding: 28px 24px !important;
        border-radius: 12px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .sf-booking-quote-icon {
        color: #47C89F !important;
        font-size: 20px !important;
        opacity: 0.3 !important;
        margin-bottom: 8px !important;
        display: block !important;
    }
    .sf-booking-testimonial-text {
        font-size: 16px !important;
        font-style: italic !important;
        color: #0E2A47 !important;
        margin: 0 0 12px 0 !important;
        line-height: 1.6 !important;
        font-weight: 300 !important;
    }
    .sf-booking-testimonial-author {
        display: flex !important;
        flex-direction: column !important;
        gap: 2px !important;
    }
    .sf-booking-testimonial-name {
        font-weight: 600 !important;
        color: #0E2A47 !important;
        font-size: 15px !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-booking-testimonial-title {
        font-size: 13px !important;
        color: #6B7C93 !important;
    }

    /* ---- Cal.com Embed ---- */
    .sf-booking-calendar-card {
        background: #FFFFFF !important;
        border-radius: 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        overflow: hidden !important;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.02) !important;
    }
    .sf-booking-calendar-header {
        padding: 20px 24px !important;
        background: #F8FAFB !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .sf-booking-calendar-header-info {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
    }
    .sf-booking-calendar-icon {
        font-size: 24px !important;
    }
    .sf-booking-calendar-title {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-booking-calendar-subtitle {
        font-size: 13px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
    }
    .sf-booking-calendar-embed {
        padding: 24px !important;
        min-height: 400px !important;
        background: #FFFFFF !important;
    }
    .sf-booking-calendar-embed #cal-inline {
        width: 100% !important;
        min-height: 500px !important;
    }
    .sf-booking-calendar-footer {
        padding: 16px 24px !important;
        background: #F8FAFB !important;
        border-top: 1px solid rgba(0, 0, 0, 0.02) !important;
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 16px !important;
    }
    .sf-booking-calendar-footer-item {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        font-size: 13px !important;
        color: #6B7C93 !important;
    }
    .sf-booking-calendar-footer-item i {
        color: #47C89F !important;
        font-size: 14px !important;
    }

    /* ---- Alternative Simple Booking ---- */
    .sf-booking-simple {
        margin-top: 24px !important;
        text-align: center !important;
    }
    .sf-booking-simple-divider {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 16px !important;
        margin-bottom: 16px !important;
    }
    .sf-simple-divider-line {
        flex: 1 !important;
        height: 1px !important;
        background: rgba(0, 0, 0, 0.04) !important;
    }
    .sf-simple-divider-text {
        font-size: 12px !important;
        text-transform: uppercase !important;
        letter-spacing: 2px !important;
        color: #6B7C93 !important;
        font-weight: 500 !important;
    }
    .sf-booking-simple-text {
        font-size: 14px !important;
        color: #6B7C93 !important;
        margin: 0 0 12px 0 !important;
    }
    .sf-booking-simple-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 12px 28px !important;
        background: transparent !important;
        color: #47C89F !important;
        border: 2px solid rgba(71, 200, 159, 0.12) !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 500 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        transition: all 0.3s ease !important;
    }
    .sf-booking-simple-btn:hover {
        background: #47C89F !important;
        color: #FFFFFF !important;
        border-color: #47C89F !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(71, 200, 159, 0.12) !important;
    }
    .sf-booking-simple-btn .sf-btn-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }
    .sf-booking-simple-btn:hover .sf-btn-arrow {
        transform: translateX(4px) !important;
    }

    /* ---- CTA ---- */
    .sf-booking-cta {
        padding: 80px 0 !important;
        background: linear-gradient(135deg, #0A0610 0%, #1A0A18 100%) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
    }
    .sf-booking-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
    }
    .sf-booking-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-booking-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }
    .sf-booking-cta-buttons {
        display: flex !important;
        justify-content: center !important;
        gap: 16px !important;
        flex-wrap: wrap !important;
    }
    .sf-booking-cta-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 14px 36px !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-weight: 600 !important;
        font-size: 16px !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }
    .sf-booking-cta-btn-primary {
        background: #47C89F !important;
        color: #FFFFFF !important;
        border: none !important;
    }
    .sf-booking-cta-btn-primary:hover {
        background: #3AAF8A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(71, 200, 159, 0.12) !important;
    }
    .sf-booking-cta-btn-secondary {
        background: transparent !important;
        color: #FFFFFF !important;
        border: 1px solid rgba(255, 255, 255, 0.06) !important;
    }
    .sf-booking-cta-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.02) !important;
        border-color: rgba(255, 255, 255, 0.12) !important;
        transform: translateY(-2px) !important;
    }
    .sf-cta-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }
    .sf-booking-cta-btn:hover .sf-cta-arrow {
        transform: translateX(4px) !important;
    }

    /* ---- Responsive ---- */
    @media (max-width: 991px) {
        .sf-booking-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
        }
        .sf-booking-hero-title {
            font-size: 40px !important;
        }
        .sf-booking-info-title {
            font-size: 30px !important;
        }
        .sf-booking-calendar-embed #cal-inline {
            min-height: 400px !important;
        }
    }
    @media (max-width: 768px) {
        .sf-booking-hero {
            padding: 80px 0 !important;
            min-height: 320px !important;
        }
        .sf-booking-hero-title {
            font-size: 32px !important;
        }
        .sf-booking-hero-subtitle {
            font-size: 17px !important;
        }
        .sf-booking-section {
            padding: 60px 0 !important;
        }
        .sf-booking-info-title {
            font-size: 26px !important;
        }
        .sf-booking-info-text {
            font-size: 15px !important;
        }
        .sf-booking-feature {
            padding: 16px !important;
        }
        .sf-booking-calendar-embed {
            padding: 16px !important;
        }
        .sf-booking-calendar-embed #cal-inline {
            min-height: 350px !important;
        }
        .sf-booking-cta {
            padding: 60px 0 !important;
        }
        .sf-booking-cta-title {
            font-size: 28px !important;
        }
        .sf-booking-cta-text {
            font-size: 16px !important;
        }
        .sf-booking-cta-buttons {
            flex-direction: column !important;
            align-items: center !important;
        }
        .sf-booking-cta-btn {
            width: 100% !important;
            justify-content: center !important;
        }
        .sf-booking-calendar-footer {
            flex-direction: column !important;
            gap: 8px !important;
            padding: 12px 20px !important;
        }
    }
    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }
        .sf-booking-hero-title {
            font-size: 26px !important;
        }
        .sf-booking-hero-subtitle {
            font-size: 15px !important;
        }
        .sf-booking-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }
        .sf-booking-hero-line {
            width: 40px !important;
            height: 2px !important;
        }
        .sf-booking-info-title {
            font-size: 22px !important;
        }
        .sf-booking-calendar-header {
            padding: 16px 18px !important;
        }
        .sf-booking-calendar-title {
            font-size: 16px !important;
        }
        .sf-booking-calendar-embed #cal-inline {
            min-height: 300px !important;
        }
        .sf-booking-cta-title {
            font-size: 22px !important;
        }
        .sf-booking-testimonial-text {
            font-size: 14px !important;
        }
        .sf-booking-simple-btn {
            width: 100% !important;
            justify-content: center !important;
        }
    }
</style>

@endsection