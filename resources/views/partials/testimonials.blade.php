<!-- ============================================ -->
<!-- TESTIMONIALS PAGE — Classic & Professional -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', 'Testimonials — What Our Clients Say | THYNK Advisory')
@section('body_class', 'page-testimonials')

@section('content')

<!-- ============================================ -->
<!-- TESTIMONIALS HERO BANNER -->
<!-- ============================================ -->
<section class="tf-testimonials-hero">
    <div class="tf-testimonials-hero-overlay"></div>
    <div class="tf-container">
        <div class="tf-testimonials-hero-content">
            <span class="tf-testimonials-hero-badge">Testimonials</span>
            <h1 class="tf-testimonials-hero-title">What Our <span class="tf-text-neon">Clients Say</span></h1>
            <p class="tf-testimonials-hero-subtitle">Real feedback from the organizations and individuals we've worked with</p>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- TESTIMONIALS CARDS -->
<!-- ============================================ -->
@if($testimonials->count() > 0)
<section class="tf-testimonials-section tf-reveal">
    <div class="tf-container">
        <div class="tf-testimonials-grid">
            @foreach($testimonials as $testimonial)
            <div class="tf-testimonial-card {{ $testimonial->is_featured ? 'tf-testimonial-featured' : '' }}">
                <!-- Quote Icon -->
                <div class="tf-testimonial-quote">"</div>

                <!-- Text -->
                <blockquote class="tf-testimonial-text">
                    {{ $testimonial->testimonial_text }}
                    @if($testimonial->is_featured)
                    <span class="tf-testimonial-highlight">— {{ $testimonial->client_name }}</span>
                    @endif
                </blockquote>

                <!-- Divider -->
                <div class="tf-testimonial-divider">
                    <span></span>
                    <span class="tf-divider-diamond">◆</span>
                    <span></span>
                </div>

                <!-- Author -->
                <div class="tf-testimonial-author">
                    <div class="tf-testimonial-avatar">
                        @if($testimonial->avatar_image)
                            <img src="{{ asset('storage/' . $testimonial->avatar_image) }}" alt="{{ $testimonial->client_name }}">
                        @else
                            <span>{{ $testimonial->avatar_initials ?? substr($testimonial->client_name, 0, 2) }}</span>
                        @endif
                    </div>
                    <div class="tf-testimonial-info">
                        <p class="tf-testimonial-name">{{ $testimonial->client_name }}</p>
                        @if($testimonial->client_role)
                        <p class="tf-testimonial-role">{{ $testimonial->client_role }}</p>
                        @endif
                        @if($testimonial->client_company)
                        <p class="tf-testimonial-company">{{ $testimonial->client_company }}</p>
                        @endif
                        @if($testimonial->project_type)
                        <p class="tf-testimonial-project">📌 {{ $testimonial->project_type }}</p>
                        @endif
                        <div class="tf-testimonial-stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                            <span class="tf-rating-number">{{ $testimonial->rating }}.0</span>
                        </div>
                    </div>
                </div>

                @if($testimonial->is_featured)
                <div class="tf-featured-badge">
                    <span>⭐</span> Featured
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@else
<!-- Fallback -->
<section class="tf-testimonials-section tf-reveal">
    <div class="tf-container">
        <div class="tf-testimonial-card tf-testimonial-center">
            <div class="tf-testimonial-quote">"</div>
            <blockquote class="tf-testimonial-text">
                THYNK delivered our Android and iOS app on time, with a design that our users actually love. The geospatial features worked flawlessly even in low-connectivity environments. <span class="tf-testimonial-highlight">They didn't just build what we asked for — they built what we needed.</span>
            </blockquote>
            <div class="tf-testimonial-divider">
                <span></span>
                <span class="tf-divider-diamond">◆</span>
                <span></span>
            </div>
            <div class="tf-testimonial-author tf-testimonial-author-center">
                <div class="tf-testimonial-avatar">MK</div>
                <div class="tf-testimonial-info">
                    <p class="tf-testimonial-name">Project Director</p>
                    <p class="tf-testimonial-role">Development Agency Client</p>
                    <div class="tf-testimonial-stars">★★★★★ <span class="tf-rating-number">5.0</span></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ============================================ -->
<!-- CTA SECTION -->
<!-- ============================================ -->
<section class="tf-cta-section">
    <div class="tf-container">
        <div class="tf-cta-content">
            <h2 class="tf-cta-title">Ready to <span class="tf-text-neon">Experience</span> the Difference?</h2>
            <p class="tf-cta-text">Join our satisfied clients and let us help you build something amazing.</p>
            <a href="{{ route('contact') }}" class="tf-cta-btn">Get in Touch →</a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Complete Testimonials Page -->
<!-- ============================================ -->
<style>
    /* ============================================
       TF — Testimonials Page
       Prefix: tf-
       ============================================ */

    .tf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .tf-text-neon {
        color: #39FF14 !important;
    }

    /* ============================================
       HERO BANNER
       ============================================ */
    .tf-testimonials-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 400px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background-image: url('{{ asset('wp-content/uploads/images/testimonials-bg.jpg') }}');
        background-color: #0F172A !important;
    }

    .tf-testimonials-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.92) 0%, rgba(26, 10, 24, 0.85) 100%) !important;
    }

    .tf-testimonials-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 720px !important;
        margin: 0 auto !important;
        text-align: center !important;
        padding: 0 20px !important;
    }

    .tf-testimonials-hero-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        color: #39FF14 !important;
        background: rgba(57, 255, 20, 0.12) !important;
        padding: 6px 24px !important;
        border-radius: 20px !important;
        margin-bottom: 20px !important;
        border: 1px solid rgba(57, 255, 20, 0.08) !important;
    }

    .tf-testimonials-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 16px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }

    .tf-testimonials-hero-subtitle {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.55) !important;
        margin: 0 !important;
        font-weight: 300 !important;
        line-height: 1.7 !important;
    }

    /* ============================================
       TESTIMONIALS SECTION
       ============================================ */
    .tf-testimonials-section {
        padding: 80px 0 !important;
        background: #F8FAFC !important;
    }

    .tf-testimonials-grid {
        display: grid !important;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)) !important;
        gap: 30px !important;
        max-width: 1200px !important;
        margin: 0 auto !important;
    }

    /* ============================================
       TESTIMONIAL CARD
       ============================================ */
    .tf-testimonial-card {
        background: #FFFFFF !important;
        border-radius: 16px !important;
        padding: 32px 28px !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.03) !important;
        transition: all 0.35s ease !important;
        position: relative !important;
        display: flex !important;
        flex-direction: column !important;
    }

    .tf-testimonial-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 12px 48px rgba(57, 255, 20, 0.05) !important;
        border-color: rgba(57, 255, 20, 0.08) !important;
    }

    .tf-testimonial-featured {
        border: 2px solid rgba(57, 255, 20, 0.08) !important;
        background: linear-gradient(135deg, #FFFFFF, #FAFFFE) !important;
        position: relative !important;
    }

    .tf-testimonial-featured::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 3px !important;
        background: linear-gradient(90deg, #39FF14, #06B6D4) !important;
        border-radius: 16px 16px 0 0 !important;
    }

    .tf-testimonial-center {
        max-width: 720px !important;
        margin: 0 auto !important;
    }

    /* ---- Quote ---- */
    .tf-testimonial-quote {
        font-size: 44px !important;
        color: #39FF14 !important;
        opacity: 0.08 !important;
        line-height: 1 !important;
        margin-bottom: 4px !important;
        font-family: 'Georgia', serif !important;
        letter-spacing: 2px !important;
    }

    /* ---- Text ---- */
    .tf-testimonial-text {
        font-size: 16px !important;
        color: #475569 !important;
        line-height: 1.8 !important;
        margin: 0 0 16px 0 !important;
        font-style: italic !important;
        font-weight: 300 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .tf-testimonial-highlight {
        color: #39FF14 !important;
        font-weight: 400 !important;
        display: block !important;
        margin-top: 8px !important;
        font-style: normal !important;
        font-size: 15px !important;
        opacity: 0.9 !important;
    }

    /* ---- Divider ---- */
    .tf-testimonial-divider {
        display: flex !important;
        align-items: center !important;
        gap: 16px !important;
        margin: 12px 0 18px 0 !important;
    }

    .tf-testimonial-divider span:first-child,
    .tf-testimonial-divider span:last-child {
        flex: 1 !important;
        height: 1px !important;
        background: rgba(0, 0, 0, 0.04) !important;
        display: block !important;
    }

    .tf-divider-diamond {
        color: #39FF14 !important;
        font-size: 10px !important;
        opacity: 0.25 !important;
    }

    /* ---- Author ---- */
    .tf-testimonial-author {
        display: flex !important;
        align-items: center !important;
        gap: 16px !important;
        padding-top: 16px !important;
        border-top: 1px solid rgba(0, 0, 0, 0.03) !important;
        margin-top: auto !important;
    }

    .tf-testimonial-author-center {
        justify-content: center !important;
    }

    .tf-testimonial-avatar {
        width: 48px !important;
        height: 48px !important;
        border-radius: 50% !important;
        background: #0F172A !important;
        color: #39FF14 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-weight: 700 !important;
        font-size: 16px !important;
        flex-shrink: 0 !important;
        overflow: hidden !important;
        font-family: 'Cabin', sans-serif !important;
    }

    .tf-testimonial-avatar img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }

    .tf-testimonial-info {
        flex: 1 !important;
    }

    .tf-testimonial-name {
        font-size: 16px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 !important;
        font-family: 'Cabin', sans-serif !important;
    }

    .tf-testimonial-role {
        font-size: 13px !important;
        color: #39FF14 !important;
        margin: 0 !important;
        font-weight: 500 !important;
        opacity: 0.85 !important;
    }

    .tf-testimonial-company {
        font-size: 13px !important;
        color: #64748B !important;
        margin: 0 !important;
    }

    .tf-testimonial-project {
        font-size: 12px !important;
        color: #94A3B8 !important;
        margin: 4px 0 0 !important;
    }

    .tf-testimonial-stars {
        color: #F59E0B !important;
        font-size: 14px !important;
        letter-spacing: 2px !important;
        margin-top: 4px !important;
        display: flex !important;
        align-items: center !important;
        gap: 2px !important;
    }

    .tf-rating-number {
        color: #94A3B8 !important;
        font-size: 12px !important;
        margin-left: 4px !important;
        font-weight: 400 !important;
    }

    /* ---- Featured Badge ---- */
    .tf-featured-badge {
        position: absolute !important;
        top: 16px !important;
        right: 16px !important;
        background: rgba(57, 255, 20, 0.06) !important;
        color: #27B80E !important;
        font-size: 11px !important;
        font-weight: 600 !important;
        padding: 4px 12px !important;
        border-radius: 12px !important;
        border: 1px solid rgba(57, 255, 20, 0.08) !important;
        display: flex !important;
        align-items: center !important;
        gap: 4px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .tf-featured-badge span {
        font-size: 12px !important;
    }

    /* ============================================
       CTA SECTION
       ============================================ */
    .tf-cta-section {
        padding: 80px 0 !important;
        background: #0F172A !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
    }

    .tf-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
    }

    .tf-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .tf-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.45) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }

    .tf-cta-btn {
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

    .tf-cta-btn:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(57, 255, 20, 0.15) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .tf-testimonials-hero-title {
            font-size: 38px !important;
        }
        .tf-testimonials-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 24px !important;
        }
    }

    @media (max-width: 768px) {
        .tf-testimonials-hero {
            padding: 80px 0 !important;
            min-height: 320px !important;
        }
        .tf-testimonials-hero-title {
            font-size: 30px !important;
        }
        .tf-testimonials-hero-subtitle {
            font-size: 16px !important;
        }
        .tf-testimonials-section {
            padding: 60px 0 !important;
        }
        .tf-testimonials-grid {
            grid-template-columns: 1fr !important;
            gap: 20px !important;
        }
        .tf-testimonial-card {
            padding: 24px 20px !important;
        }
        .tf-cta-title {
            font-size: 28px !important;
        }
        .tf-cta-text {
            font-size: 16px !important;
        }
    }

    @media (max-width: 480px) {
        .tf-container {
            padding: 0 16px !important;
        }
        .tf-testimonials-hero-title {
            font-size: 26px !important;
        }
        .tf-testimonials-hero-subtitle {
            font-size: 14px !important;
        }
        .tf-testimonials-hero-badge {
            font-size: 10px !important;
            padding: 4px 16px !important;
        }
        .tf-testimonials-section {
            padding: 40px 0 !important;
        }
        .tf-testimonial-card {
            padding: 20px 16px !important;
            border-radius: 12px !important;
        }
        .tf-testimonial-text {
            font-size: 14px !important;
            line-height: 1.7 !important;
        }
        .tf-testimonial-author {
            flex-direction: column !important;
            text-align: center !important;
            gap: 12px !important;
        }
        .tf-testimonial-stars {
            justify-content: center !important;
        }
        .tf-featured-badge {
            top: 12px !important;
            right: 12px !important;
            font-size: 10px !important;
            padding: 3px 10px !important;
        }
        .tf-cta-section {
            padding: 40px 0 !important;
        }
        .tf-cta-title {
            font-size: 24px !important;
        }
        .tf-cta-btn {
            padding: 12px 32px !important;
            font-size: 15px !important;
        }
        .tf-testimonial-quote {
            font-size: 36px !important;
        }
    }

    /* ============================================
       REVEAL ANIMATION
       ============================================ */
    .tf-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.7s ease, transform 0.7s ease;
    }

    .tf-reveal-visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }

    @media (prefers-reduced-motion: reduce) {
        .tf-reveal {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- REVEAL SCRIPT -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const revealEls = document.querySelectorAll('.tf-reveal');
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('tf-reveal-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
            revealEls.forEach(function(el) { observer.observe(el); });
        } else {
            revealEls.forEach(function(el) { el.classList.add('tf-reveal-visible'); });
        }
    });
</script>

@endsection