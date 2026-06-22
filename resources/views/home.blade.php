@extends('layouts.public')
@section('title', 'Effective Gamification - Sofel Labs')
@section('body_class', 'wp-singular page-template-default page page-id-12381 wp-custom-logo wp-theme-astra wp-child-theme-42comets ast-single-post ast-inherit-site-logo-transparent ast-hfb-header ast-page-builder-template ast-no-sidebar astra-3.7.7 elementor-default elementor-kit-10677 elementor-page elementor-page-12381')
@section('content')

@php
    $bannerItems = isset($banners) && $banners->count() > 0 ? $banners : collect();
    if ($bannerItems->count() == 0) {
        $bannerItems = collect([
            (object) ['image' => 'wp-content/uploads/2021/10/waitingroomArtboard-1.png']
        ]);
    }
@endphp

<!-- ============================================ -->
<!-- HERO BANNER CAROUSEL -->
<!-- ============================================ -->
<section class="sl-hero">
    <div class="sl-hero-container">
        <div class="sl-hero-wrapper" id="sofelHeroWrapper">
            @foreach($bannerItems as $index => $banner)
                <div class="sl-hero-slide {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}">
                    <div class="sl-hero-image" style="background-image: url('{{ $banner->image ? asset('storage/' . $banner->image) : asset('wp-content/uploads/2021/10/waitingroomArtboard-1.png') }}');"></div>
                    <div class="sl-hero-overlay">
                        <div class="sl-hero-content">
                            <span class="sl-hero-eyebrow">Gamification · Instructional Design · eLearning</span>
                            <h1 class="sl-hero-headline">Learning That <span class="sl-accent-lime">Sticks.</span><br>Training That <span class="sl-accent-orange">Works.</span></h1>
                            <p class="sl-hero-subtext">We design gamified learning experiences that transform passive training into active performance. Real engagement, real results — built for Africa and beyond.</p>
                            <div class="sl-hero-actions">
                                <a href="https://cal.com/sofellabs" class="sl-btn sl-btn--orange" id="Book1">Start Your Free Consultation</a>
                                <a href="#how-it-works" class="sl-btn sl-btn--ghost">See How It Works ↓</a>
                            </div>
                        </div>
                    </div>
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
<!-- TRUST STRIP -->
<!-- ============================================ -->
<section class="sl-trust-strip sl-reveal">
    <div class="sl-container">
        <div class="sl-trust-grid">
            <div class="sl-trust-item">
                <span class="sl-trust-num" style="color:#47C89F;">40+</span>
                <span class="sl-trust-label">Gamified programs shipped</span>
            </div>
            <div class="sl-trust-divider"></div>
            <div class="sl-trust-item">
                <span class="sl-trust-num" style="color:#9ACA43;">3</span>
                <span class="sl-trust-label">Continents served</span>
            </div>
            <div class="sl-trust-divider"></div>
            <div class="sl-trust-item">
                <span class="sl-trust-num" style="color:#EE6F20;">92%</span>
                <span class="sl-trust-label">Avg. learner completion rate</span>
            </div>
            <div class="sl-trust-divider"></div>
            <div class="sl-trust-item">
                <span class="sl-trust-num" style="color:#47C89F;">5.0</span>
                <span class="sl-trust-label">Client satisfaction rating</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- THE PROBLEM — What's Broken in Training -->
<!-- ============================================ -->
<section class="sl-section sl-bg-navy sl-reveal" id="the-problem">
    <div class="sl-container sl-container--narrow">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--orange">Sound Familiar?</span>
            <h2 class="sl-heading-xl sl-text-white">Most Corporate Training Gets Forgotten<br>Within <span class="sl-accent-orange">72 Hours</span></h2>
            <p class="sl-body-lg" style="color:rgba(255,255,255,0.65); max-width:600px; margin:14px auto 0;">The Ebbinghaus Forgetting Curve has been known since 1885. Yet most organizations still design training the same old way — and wonder why nothing changes on the job.</p>
        </div>

        <div class="sl-problem-grid">
            <!-- Problem 1 -->
            <div class="sl-problem-item">
                <div class="sl-problem-number">01</div>
                <div class="sl-problem-item-content">
                    <h3 class="sl-problem-item-title">Passive Learning</h3>
                    <p class="sl-problem-item-text">Slide decks and long videos create an illusion of learning. Learners click "Next" on autopilot, retain almost nothing, and return to their desks unchanged.</p>
                </div>
            </div>

            <!-- Problem 2 -->
            <div class="sl-problem-item">
                <div class="sl-problem-number">02</div>
                <div class="sl-problem-item-content">
                    <h3 class="sl-problem-item-title">Checkbox Compliance</h3>
                    <p class="sl-problem-item-text">Completion rates look great on dashboards. But completing a course and actually learning from it are two very different things — and most training only achieves the first.</p>
                </div>
            </div>

            <!-- Problem 3 -->
            <div class="sl-problem-item">
                <div class="sl-problem-number">03</div>
                <div class="sl-problem-item-content">
                    <h3 class="sl-problem-item-title">Gimmicky Gamification</h3>
                    <p class="sl-problem-item-text">Slapping badges on boring content doesn't make it engaging. True gamification is a design philosophy — not a feature you bolt on after the course is built.</p>
                </div>
            </div>

            <!-- Problem 4 -->
            <div class="sl-problem-item">
                <div class="sl-problem-number">04</div>
                <div class="sl-problem-item-content">
                    <h3 class="sl-problem-item-title">No Measurable Impact</h3>
                    <p class="sl-problem-item-text">Organizations spend millions on training they can't measure. If you can't show behavior change on the job, you haven't really trained anyone.</p>
                </div>
            </div>
        </div>

        <div class="sl-problem-callout">
            <p>The problem isn't your people. It's the design of your training.<br><strong style="color:#EE6F20;">Sofel Labs was built to fix this.</strong></p>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Problem Section -->
<!-- ============================================ -->
<style>
    /* ============================================
       THE PROBLEM — Clean Professional Design
       ============================================ */

    .sl-section {
        padding: 80px 0 !important;
    }

    .sl-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sl-container--narrow {
        max-width: 900px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sl-bg-navy {
        background: #0E2A47 !important;
    }

    /* ---- SECTION HEADER ---- */
    .sl-section-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sl-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        padding: 6px 22px !important;
        border-radius: 20px !important;
        margin-bottom: 14px !important;
    }

    .sl-badge--orange {
        color: #EE6F20 !important;
        background: rgba(238, 111, 32, 0.08) !important;
        border: 1px solid rgba(238, 111, 32, 0.08) !important;
    }

    .sl-heading-xl {
        font-size: 38px !important;
        font-weight: 700 !important;
        line-height: 1.2 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sl-text-white {
        color: #FFFFFF !important;
    }

    .sl-accent-orange {
        color: #EE6F20 !important;
    }

    .sl-body-lg {
        font-size: 18px !important;
        line-height: 1.7 !important;
    }

    /* ---- PROBLEM GRID ---- */
    .sl-problem-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 24px !important;
        margin-bottom: 36px !important;
    }

    .sl-problem-item {
        background: rgba(255, 255, 255, 0.02) !important;
        border: 1px solid rgba(255, 255, 255, 0.04) !important;
        border-radius: 12px !important;
        padding: 28px 24px !important;
        display: flex !important;
        gap: 18px !important;
        align-items: flex-start !important;
        transition: all 0.4s ease !important;
    }

    .sl-problem-item:hover {
        background: rgba(255, 255, 255, 0.04) !important;
        border-color: rgba(238, 111, 32, 0.06) !important;
        transform: translateY(-4px) !important;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1) !important;
    }

    .sl-problem-number {
        font-size: 28px !important;
        font-weight: 800 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        color: rgba(238, 111, 32, 0.15) !important;
        line-height: 1 !important;
        flex-shrink: 0 !important;
        min-width: 40px !important;
    }

    .sl-problem-item-content {
        flex: 1 !important;
    }

    .sl-problem-item-title {
        font-size: 17px !important;
        font-weight: 600 !important;
        color: #FFFFFF !important;
        margin: 0 0 6px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: 0.2px !important;
    }

    .sl-problem-item-text {
        font-size: 14px !important;
        line-height: 1.7 !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 !important;
    }

    /* ---- CALLOUT ---- */
    .sl-problem-callout {
        text-align: center !important;
        padding: 28px 24px !important;
        border-top: 1px solid rgba(255, 255, 255, 0.04) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04) !important;
        margin-top: 8px !important;
    }

    .sl-problem-callout p {
        font-size: 19px !important;
        font-weight: 300 !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 !important;
        letter-spacing: 0.3px !important;
    }

    .sl-problem-callout strong {
        font-weight: 600 !important;
        font-style: normal !important;
    }

    /* ---- SCROLL REVEAL ---- */
    .sl-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease !important;
    }

    .sl-reveal.sl-reveal-visible {
        opacity: 1 !important;
        transform: translateY(0) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sl-problem-grid {
            grid-template-columns: 1fr 1fr !important;
            gap: 16px !important;
        }

        .sl-heading-xl {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sl-section {
            padding: 60px 0 !important;
        }

        .sl-container--narrow {
            padding: 0 16px !important;
        }

        .sl-problem-grid {
            grid-template-columns: 1fr !important;
            gap: 14px !important;
        }

        .sl-problem-item {
            padding: 20px 18px !important;
            gap: 14px !important;
        }

        .sl-problem-number {
            font-size: 24px !important;
            min-width: 32px !important;
        }

        .sl-problem-item-title {
            font-size: 16px !important;
        }

        .sl-problem-item-text {
            font-size: 13px !important;
        }

        .sl-heading-xl {
            font-size: 28px !important;
        }

        .sl-body-lg {
            font-size: 16px !important;
        }

        .sl-problem-callout p {
            font-size: 17px !important;
        }
    }

    @media (max-width: 480px) {
        .sl-section {
            padding: 40px 0 !important;
        }

        .sl-container {
            padding: 0 16px !important;
        }

        .sl-heading-xl {
            font-size: 24px !important;
        }

        .sl-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }

        .sl-body-lg {
            font-size: 15px !important;
        }

        .sl-problem-item {
            padding: 16px 14px !important;
            gap: 12px !important;
        }

        .sl-problem-number {
            font-size: 20px !important;
            min-width: 28px !important;
        }

        .sl-problem-item-title {
            font-size: 15px !important;
        }

        .sl-problem-item-text {
            font-size: 13px !important;
            line-height: 1.6 !important;
        }

        .sl-problem-callout p {
            font-size: 15px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- SCROLL REVEAL SCRIPT -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll reveal observer
        const revealElements = document.querySelectorAll('.sl-reveal');

        const revealObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sl-reveal-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(function(el) {
            revealObserver.observe(el);
        });
    });
</script>

<!-- ============================================ -->
<!-- TRANSFORMATION JOURNEY — Before vs After -->
<!-- ============================================ -->
<section class="sl-transform-classic sl-reveal">
    <div class="sl-container-full">
        <div class="sl-transform-classic-header">
            <span class="sl-badge sl-badge--teal">The Transformation</span>
            <h2 class="sl-transform-classic-title">
                From <span class="sl-text-orange">Frustration</span>
                <span class="sl-text-divider">to</span>
                <span class="sl-text-teal">Mastery</span>
            </h2>
            <p class="sl-transform-classic-subtitle">How we turn common training challenges into game-changing learning experiences</p>
            <div class="sl-transform-classic-line"></div>
        </div>

        <!-- Comparison Grid -->
        <div class="sl-transform-classic-grid">
            <!-- Before Column -->
            <div class="sl-transform-classic-col sl-transform-classic-col--before">
                <div class="sl-transform-classic-col-header">
                    <span class="sl-transform-classic-icon sl-transform-classic-icon--before">✕</span>
                    <h3 class="sl-transform-classic-col-title">The Old Way</h3>
                    <span class="sl-transform-classic-col-sub">Traditional training</span>
                </div>
                <ul class="sl-transform-classic-features">
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--before">✕</span>
                        <span>Static slides that put people to sleep</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--before">✕</span>
                        <span>Long videos with zero engagement</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--before">✕</span>
                        <span>Checkbox compliance with no real learning</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--before">✕</span>
                        <span>Gimmicky badges that feel forced</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--before">✕</span>
                        <span>No connection to real work</span>
                    </li>
                </ul>
                <div class="sl-transform-classic-outcome sl-transform-classic-outcome--before">
                    <span class="sl-outcome-label">The Result</span>
                    <p class="sl-outcome-text">Completed. Forgotten. No impact.</p>
                </div>
            </div>

            <!-- Divider -->
            <div class="sl-transform-classic-divider">
                <span class="sl-divider-line"></span>
                <span class="sl-divider-diamond">◆</span>
                <span class="sl-divider-line"></span>
            </div>

            <!-- After Column -->
            <div class="sl-transform-classic-col sl-transform-classic-col--after">
                <div class="sl-transform-classic-col-header">
                    <span class="sl-transform-classic-icon sl-transform-classic-icon--after">✓</span>
                    <h3 class="sl-transform-classic-col-title">The New Way</h3>
                    <span class="sl-transform-classic-col-sub">Transformational learning</span>
                </div>
                <ul class="sl-transform-classic-features">
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--after">✓</span>
                        <span>Interactive challenges that engage and excite</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--after">✓</span>
                        <span>Meaningful rewards that motivate intrinsically</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--after">✓</span>
                        <span>Real progress tracking that shows growth</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--after">✓</span>
                        <span>Applied learning that connects to work</span>
                    </li>
                    <li>
                        <span class="sl-feature-mark sl-feature-mark--after">✓</span>
                        <span>Behavior change that lasts beyond the course</span>
                    </li>
                </ul>
                <div class="sl-transform-classic-outcome sl-transform-classic-outcome--after">
                    <span class="sl-outcome-label">The Result</span>
                    <p class="sl-outcome-text">Remembered. Applied. Celebrated.</p>
                </div>
            </div>
        </div>

        <!-- Insights -->
        <div class="sl-transform-classic-insights">
            <div class="sl-insight-item">
                <span class="sl-insight-number">01</span>
                <div>
                    <h4 class="sl-insight-title">From Content to Experience</h4>
                    <p class="sl-insight-text">Transform passive information into active learning journeys that stick.</p>
                </div>
            </div>
            <div class="sl-insight-item">
                <span class="sl-insight-number">02</span>
                <div>
                    <h4 class="sl-insight-title">From Completion to Competence</h4>
                    <p class="sl-insight-text">Measure what learners can do, not just what they've clicked through.</p>
                </div>
            </div>
            <div class="sl-insight-item">
                <span class="sl-insight-number">03</span>
                <div>
                    <h4 class="sl-insight-title">From One-Size to Personal</h4>
                    <p class="sl-insight-text">Design adaptive pathways that meet each learner where they are.</p>
                </div>
            </div>
            <div class="sl-insight-item">
                <span class="sl-insight-number">04</span>
                <div>
                    <h4 class="sl-insight-title">From Training to Transformation</h4>
                    <p class="sl-insight-text">Create lasting change in behavior, performance, and business outcomes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Classic Transformation -->
<!-- ============================================ -->
<style>
    /* ============================================
       TRANSFORMATION — Classic Before/After
       ============================================ */

    .sl-transform-classic {
        padding: 80px 0 !important;
        background: #F8FAFB !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
    }

    .sl-container-full {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    /* ---- HEADER ---- */
    .sl-transform-classic-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sl-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        padding: 6px 22px !important;
        border-radius: 20px !important;
        margin-bottom: 14px !important;
    }

    .sl-badge--teal {
        color: #47C89F !important;
        background: rgba(71, 200, 159, 0.06) !important;
        border: 1px solid rgba(71, 200, 159, 0.06) !important;
    }

    .sl-transform-classic-title {
        font-size: 42px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 8px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sl-text-orange {
        color: #EE6F20 !important;
    }

    .sl-text-divider {
        color: rgba(14, 42, 71, 0.15) !important;
        font-weight: 300 !important;
        margin: 0 8px !important;
    }

    .sl-text-teal {
        color: #47C89F !important;
    }

    .sl-transform-classic-subtitle {
        font-size: 18px !important;
        color: #6B7C93 !important;
        margin: 0 0 16px 0 !important;
        font-weight: 300 !important;
    }

    .sl-transform-classic-line {
        width: 60px !important;
        height: 3px !important;
        background: linear-gradient(90deg, #EE6F20, #47C89F) !important;
        border-radius: 4px !important;
        margin: 0 auto !important;
    }

    /* ---- GRID ---- */
    .sl-transform-classic-grid {
        display: grid !important;
        grid-template-columns: 1fr auto 1fr !important;
        gap: 0 !important;
        align-items: stretch !important;
        background: #FFFFFF !important;
        border-radius: 16px !important;
        overflow: hidden !important;
        box-shadow: 0 2px 30px rgba(0, 0, 0, 0.02) !important;
        border: 1px solid rgba(0, 0, 0, 0.03) !important;
        margin-bottom: 40px !important;
    }

    /* ---- COLUMNS ---- */
    .sl-transform-classic-col {
        padding: 36px 32px !important;
        display: flex !important;
        flex-direction: column !important;
    }

    .sl-transform-classic-col--before {
        background: rgba(238, 111, 32, 0.01) !important;
    }

    .sl-transform-classic-col--after {
        background: rgba(71, 200, 159, 0.01) !important;
    }

    /* ---- COLUMN HEADER ---- */
    .sl-transform-classic-col-header {
        margin-bottom: 20px !important;
        padding-bottom: 14px !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.03) !important;
    }

    .sl-transform-classic-icon {
        display: inline-block !important;
        font-size: 16px !important;
        font-weight: 700 !important;
        margin-right: 8px !important;
    }

    .sl-transform-classic-icon--before {
        color: #EE6F20 !important;
    }

    .sl-transform-classic-icon--after {
        color: #47C89F !important;
    }

    .sl-transform-classic-col-title {
        font-size: 20px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 !important;
        display: inline-block !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sl-transform-classic-col-sub {
        display: block !important;
        font-size: 13px !important;
        color: #8A8A9E !important;
        margin-top: 2px !important;
        font-weight: 300 !important;
    }

    /* ---- FEATURES ---- */
    .sl-transform-classic-features {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 0 20px 0 !important;
        flex: 1 !important;
        display: flex !important;
        flex-direction: column !important;
        gap: 6px !important;
    }

    .sl-transform-classic-features li {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        padding: 8px 0 !important;
        font-size: 14px !important;
        color: #3D4A5C !important;
        border-bottom: 1px solid rgba(0, 0, 0, 0.02) !important;
    }

    .sl-transform-classic-features li:last-child {
        border-bottom: none !important;
    }

    .sl-feature-mark {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 20px !important;
        height: 20px !important;
        border-radius: 50% !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        flex-shrink: 0 !important;
    }

    .sl-feature-mark--before {
        background: rgba(238, 111, 32, 0.06) !important;
        color: #EE6F20 !important;
    }

    .sl-feature-mark--after {
        background: rgba(71, 200, 159, 0.06) !important;
        color: #47C89F !important;
    }

    /* ---- OUTCOME ---- */
    .sl-transform-classic-outcome {
        padding: 14px 18px !important;
        border-radius: 8px !important;
        text-align: center !important;
        margin-top: auto !important;
    }

    .sl-transform-classic-outcome--before {
        background: rgba(238, 111, 32, 0.02) !important;
        border: 1px solid rgba(238, 111, 32, 0.04) !important;
    }

    .sl-transform-classic-outcome--after {
        background: rgba(71, 200, 159, 0.02) !important;
        border: 1px solid rgba(71, 200, 159, 0.04) !important;
    }

    .sl-outcome-label {
        display: block !important;
        font-size: 10px !important;
        text-transform: uppercase !important;
        letter-spacing: 2px !important;
        color: #8A8A9E !important;
        font-weight: 600 !important;
        margin-bottom: 2px !important;
    }

    .sl-outcome-text {
        font-size: 16px !important;
        font-weight: 600 !important;
        margin: 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    /* ---- DIVIDER ---- */
    .sl-transform-classic-divider {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 0 12px !important;
        background: #FFFFFF !important;
        min-width: 48px !important;
    }

    .sl-divider-line {
        width: 2px !important;
        flex: 1 !important;
        min-height: 20px !important;
        background: linear-gradient(180deg, transparent, rgba(14, 42, 71, 0.04), transparent) !important;
    }

    .sl-divider-diamond {
        color: rgba(14, 42, 71, 0.04) !important;
        font-size: 10px !important;
        line-height: 1 !important;
        padding: 4px 0 !important;
    }

    /* ---- INSIGHTS ---- */
    .sl-transform-classic-insights {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 16px !important;
        margin-top: 8px !important;
    }

    .sl-insight-item {
        display: flex !important;
        align-items: flex-start !important;
        gap: 14px !important;
        padding: 16px 18px !important;
        background: #FFFFFF !important;
        border-radius: 10px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
        transition: all 0.3s ease !important;
    }

    .sl-insight-item:hover {
        border-color: rgba(71, 200, 159, 0.04) !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02) !important;
    }

    .sl-insight-number {
        font-size: 22px !important;
        font-weight: 700 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        color: rgba(71, 200, 159, 0.04) !important;
        line-height: 1 !important;
        flex-shrink: 0 !important;
        width: 28px !important;
    }

    .sl-insight-title {
        font-size: 14px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 0 2px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sl-insight-text {
        font-size: 13px !important;
        color: #6B7C93 !important;
        line-height: 1.5 !important;
        margin: 0 !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sl-transform-classic-grid {
            grid-template-columns: 1fr !important;
        }

        .sl-transform-classic-divider {
            flex-direction: row !important;
            padding: 8px 0 !important;
            min-width: auto !important;
        }

        .sl-divider-line {
            width: auto !important;
            height: 2px !important;
            flex: 1 !important;
            min-height: auto !important;
            background: linear-gradient(90deg, transparent, rgba(14, 42, 71, 0.04), transparent) !important;
        }

        .sl-transform-classic-col--before {
            border-bottom: 1px solid rgba(238, 111, 32, 0.02) !important;
        }

        .sl-transform-classic-col--after {
            border-top: 1px solid rgba(71, 200, 159, 0.02) !important;
        }

        .sl-transform-classic-insights {
            grid-template-columns: 1fr 1fr !important;
        }

        .sl-transform-classic-title {
            font-size: 34px !important;
        }
    }

    @media (max-width: 768px) {
        .sl-transform-classic {
            padding: 60px 0 !important;
        }

        .sl-container-full {
            padding: 0 16px !important;
        }

        .sl-transform-classic-col {
            padding: 24px 20px !important;
        }

        .sl-transform-classic-title {
            font-size: 28px !important;
        }

        .sl-transform-classic-subtitle {
            font-size: 16px !important;
        }

        .sl-transform-classic-features li {
            font-size: 13px !important;
            padding: 6px 0 !important;
        }

        .sl-outcome-text {
            font-size: 15px !important;
        }

        .sl-transform-classic-insights {
            grid-template-columns: 1fr !important;
            gap: 12px !important;
        }

        .sl-insight-item {
            padding: 14px 16px !important;
        }
    }

    @media (max-width: 480px) {
        .sl-transform-classic {
            padding: 40px 0 !important;
        }

        .sl-container-full {
            padding: 0 12px !important;
        }

        .sl-transform-classic-col {
            padding: 18px 14px !important;
        }

        .sl-transform-classic-title {
            font-size: 24px !important;
        }

        .sl-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }

        .sl-transform-classic-subtitle {
            font-size: 14px !important;
        }

        .sl-transform-classic-col-title {
            font-size: 17px !important;
        }

        .sl-transform-classic-features li {
            font-size: 12px !important;
            gap: 10px !important;
            padding: 5px 0 !important;
        }

        .sl-feature-mark {
            width: 18px !important;
            height: 18px !important;
            font-size: 10px !important;
        }

        .sl-outcome-text {
            font-size: 14px !important;
        }

        .sl-transform-classic-outcome {
            padding: 10px 14px !important;
        }

        .sl-divider-diamond {
            font-size: 8px !important;
        }

        .sl-insight-item {
            padding: 12px 14px !important;
            gap: 10px !important;
        }

        .sl-insight-number {
            font-size: 18px !important;
            width: 22px !important;
        }

        .sl-insight-title {
            font-size: 13px !important;
        }

        .sl-insight-text {
            font-size: 12px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- SCROLL REVEAL SCRIPT -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const revealElements = document.querySelectorAll('.sl-reveal');

        const revealObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sl-reveal-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        revealElements.forEach(function(el) {
            revealObserver.observe(el);
        });
    });
</script>

<!-- ============================================ -->
<!-- HOW IT WORKS — 3-Step Process -->
<!-- ============================================ -->
<section class="sl-section sl-bg-offwhite sl-reveal" id="how-it-works">
    <div class="sl-container">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--teal">How It Works</span>
            <h2 class="sl-heading-xl sl-text-navy">Your Path to Gamified Learning</h2>
            <p class="sl-body-lg sl-text-muted">A proven 3-step process to transform your training — from a blank brief to a live, engaging program your learners will actually talk about.</p>
        </div>
        <div class="sl-steps-grid">
            <div class="sl-step">
                <div class="sl-step-number" style="color:rgba(71,200,159,0.18);">01</div>
                <div class="sl-step-icon" style="color:#47C89F;"><i class="fas fa-search"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Discovery &amp; Strategy</h3>
                <p class="sl-body sl-text-muted">We start by understanding your learners, your goals, and the performance gaps. We ask the hard questions — what does your team need to <em>do differently</em> after training? This is where we identify the right gamification strategy for your specific context, not a generic template.</p>
                <div class="sl-step-tag" style="background:rgba(71,200,159,0.1); color:#47C89F;">Week 1–2</div>
            </div>
            <div class="sl-step">
                <div class="sl-step-number" style="color:rgba(154,202,67,0.18);">02</div>
                <div class="sl-step-icon" style="color:#9ACA43;"><i class="fas fa-pencil-ruler"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Design &amp; Development</h3>
                <p class="sl-body sl-text-muted">We design engaging challenges, meaningful rewards, and interactive simulations tailored to your content. Every mechanic is chosen because it serves the learning goal — not because it's trendy. We build within your existing LMS; no platform migration required.</p>
                <div class="sl-step-tag" style="background:rgba(154,202,67,0.1); color:#6a9a00;">Week 3–7</div>
            </div>
            <div class="sl-step">
                <div class="sl-step-number" style="color:rgba(238,111,32,0.18);">03</div>
                <div class="sl-step-icon" style="color:#EE6F20;"><i class="fas fa-rocket"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Launch &amp; Measure</h3>
                <p class="sl-body sl-text-muted">We deploy your gamified training and track engagement, retention, and on-the-job performance — not just completion rates. We stay on after launch, refining mechanics based on real learner behaviour. Most programs get significantly better in the weeks after launch.</p>
                <div class="sl-step-tag" style="background:rgba(238,111,32,0.1); color:#EE6F20;">Week 8–10</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- LEARNER JOURNEY MAPPING — Udemy Style -->
<!-- ============================================ -->
<section class="sl-journey-udemy sl-reveal">
    <div class="sl-container">
        <div class="sl-udemy-header">
            <span class="sl-badge sl-badge--teal">Learning Path</span>
            <h2 class="sl-udemy-title sl-text-navy">Your Journey to <span style="color:#47C89F;">Mastery</span></h2>
            <p class="sl-udemy-subtitle">A structured pathway designed to take your learners from beginner to confident, capable practitioner — with every step intentionally designed.</p>
        </div>

        <div class="sl-udemy-timeline">
            <div class="sl-udemy-stage">
                <div class="sl-udemy-stage-marker"><span class="sl-udemy-stage-number" style="border-color:#EE6F20; color:#EE6F20;">1</span></div>
                <div class="sl-udemy-stage-card">
                    <div class="sl-udemy-stage-icon"></div>
                    <h3 class="sl-udemy-stage-title">Awareness</h3>
                    <p class="sl-udemy-stage-desc">Understand why this matters to your work and goals. We connect the learning to real problems your team faces daily.</p>
                    <div class="sl-udemy-stage-meta"><span class="sl-udemy-meta-tag">Foundation</span><span class="sl-udemy-meta-tag">Context</span></div>
                    <div class="sl-udemy-stage-outcome"><span>You'll know the "why" behind the learning</span></div>
                </div>
            </div>
            <div class="sl-udemy-stage">
                <div class="sl-udemy-stage-marker"><span class="sl-udemy-stage-number" style="border-color:#9ACA43; color:#9ACA43;">2</span></div>
                <div class="sl-udemy-stage-card">
                    <div class="sl-udemy-stage-icon"></div>
                    <h3 class="sl-udemy-stage-title">Exploration</h3>
                    <p class="sl-udemy-stage-desc">Build foundational knowledge and connect new ideas. Short, interactive modules keep cognitive load manageable.</p>
                    <div class="sl-udemy-stage-meta"><span class="sl-udemy-meta-tag">Discovery</span><span class="sl-udemy-meta-tag">Connection</span></div>
                    <div class="sl-udemy-stage-outcome"><span>You'll build a solid knowledge foundation</span></div>
                </div>
            </div>
            <div class="sl-udemy-stage">
                <div class="sl-udemy-stage-marker"><span class="sl-udemy-stage-number" style="border-color:#EE6F20; color:#EE6F20;">3</span></div>
                <div class="sl-udemy-stage-card">
                    <div class="sl-udemy-stage-icon"></div>
                    <h3 class="sl-udemy-stage-title">Practice</h3>
                    <p class="sl-udemy-stage-desc">Apply knowledge through real-world scenarios, branching simulations, and challenges with immediate feedback loops.</p>
                    <div class="sl-udemy-stage-meta"><span class="sl-udemy-meta-tag">Application</span><span class="sl-udemy-meta-tag">Feedback</span></div>
                    <div class="sl-udemy-stage-outcome"><span>You'll develop practical skills and confidence</span></div>
                </div>
            </div>
            <div class="sl-udemy-stage">
                <div class="sl-udemy-stage-marker"><span class="sl-udemy-stage-number" style="border-color:#47C89F; color:#47C89F;">4</span></div>
                <div class="sl-udemy-stage-card">
                    <div class="sl-udemy-stage-icon"></div>
                    <h3 class="sl-udemy-stage-title">Mastery</h3>
                    <p class="sl-udemy-stage-desc">Apply skills independently and achieve measurable results on the job. This is where training becomes real performance.</p>
                    <div class="sl-udemy-stage-meta"><span class="sl-udemy-meta-tag">Competence</span><span class="sl-udemy-meta-tag">Impact</span></div>
                    <div class="sl-udemy-stage-outcome"><span>You'll apply learning with confidence and skill</span></div>
                </div>
            </div>
        </div>

        <div class="sl-udemy-progress">
            <div class="sl-udemy-progress-bar">
                <div class="sl-udemy-progress-fill"></div>
            </div>
            <div class="sl-udemy-progress-labels">
                <span class="sl-udemy-progress-label" style="color:#EE6F20;">Start</span>
                <span class="sl-udemy-progress-label">Explore</span>
                <span class="sl-udemy-progress-label">Practice</span>
                <span class="sl-udemy-progress-label" style="color:#47C89F;">Master</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- OUR PRINCIPLES -->
<!-- ============================================ -->
<section class="sl-section sl-bg-white sl-reveal">
    <div class="sl-container sl-container--narrow">
        <div class="sl-section-header">
            <span class="sl-eyebrow">What We Believe</span>
            <h2 class="sl-heading-xl sl-text-navy">A Few Principles We Don't Bend On</h2>
            <p class="sl-body-lg sl-text-muted">These aren't marketing talking points. They're the filters every design decision goes through before anything gets built.</p>
        </div>
        <div class="sl-principles-list">
            <div class="sl-principle-row">
                <span class="sl-principle-num">I.</span>
                <div>
                    <h3 class="sl-heading-sm sl-text-navy">Mechanics serve the goal — never the other way round</h3>
                    <p class="sl-body sl-text-muted">We choose a mechanic because it moves a learner toward a specific outcome, not because it's trending. If points don't serve the learning, there are no points.</p>
                </div>
            </div>
            <div class="sl-rule-thin"></div>
            <div class="sl-principle-row">
                <span class="sl-principle-num">II.</span>
                <div>
                    <h3 class="sl-heading-sm sl-text-navy">Motivation is built from the inside out</h3>
                    <p class="sl-body sl-text-muted">External rewards like badges and leaderboards wear off in weeks. We design for curiosity, mastery, and purpose first — because those motivators don't expire.</p>
                </div>
            </div>
            <div class="sl-rule-thin"></div>
            <div class="sl-principle-row">
                <span class="sl-principle-num">III.</span>
                <div>
                    <h3 class="sl-heading-sm sl-text-navy">Difficulty is a dial, not a guess</h3>
                    <p class="sl-body sl-text-muted">Every program is paced so beginners aren't lost and experienced staff stay sharp. The zone of proximal development isn't a theory — it's our design brief.</p>
                </div>
            </div>
            <div class="sl-rule-thin"></div>
            <div class="sl-principle-row">
                <span class="sl-principle-num">IV.</span>
                <div>
                    <h3 class="sl-heading-sm sl-text-navy">Measurement is designed in, not bolted on</h3>
                    <p class="sl-body sl-text-muted">If we can't show you it's working, we haven't finished the job. Every engagement includes a measurement plan tied to real behavior change, not vanity metrics.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- OUR FRAMEWORK — 4 Pillars -->
<!-- ============================================ -->
<section class="sl-framework sl-reveal">
    <div class="sl-container">
        <div class="sl-framework-header">
            <span class="sl-badge sl-badge--lime">Our Framework</span>
            <h2 class="sl-framework-title">The <span style="color:#47C89F;">Instructional Design</span> Pillars</h2>
            <p class="sl-framework-subtitle">Four core principles that guide every learning experience we design — from a quick compliance module to a 12-week leadership program.</p>
        </div>
        <div class="sl-framework-grid">
            <div class="sl-framework-pillar">
                <div class="sl-framework-pillar-icon"><span class="sl-pillar-emoji"></span></div>
                <h3 class="sl-framework-pillar-title">Learner-Centered Design</h3>
                <p class="sl-framework-pillar-text">We start with the learner — their context, challenges, and goals. Every decision is made with the question: <em>"What does the learner need to be able to do?"</em> Not "what content do we need to cover?"</p>
                <div class="sl-framework-pillar-tag"><span>Empathy First</span></div>
            </div>
            <div class="sl-framework-pillar">
                <div class="sl-framework-pillar-icon"><span class="sl-pillar-emoji"></span></div>
                <h3 class="sl-framework-pillar-title">Evidence-Based Practice</h3>
                <p class="sl-framework-pillar-text">We draw from cognitive science, learning research, and proven instructional models — not trends. Spaced repetition, retrieval practice, and worked examples aren't buzzwords here; they're building blocks.</p>
                <div class="sl-framework-pillar-tag"><span>Research-Backed</span></div>
            </div>
            <div class="sl-framework-pillar">
                <div class="sl-framework-pillar-icon"><span class="sl-pillar-emoji"></span></div>
                <h3 class="sl-framework-pillar-title">Purposeful Engagement</h3>
                <p class="sl-framework-pillar-text">Engagement isn't about entertainment — it's about creating meaningful interactions that build competence. Every activity serves a clear learning purpose. If it's fun <em>and</em> educational, even better.</p>
                <div class="sl-framework-pillar-tag"><span>Meaningful Interaction</span></div>
            </div>
            <div class="sl-framework-pillar">
                <div class="sl-framework-pillar-icon"><span class="sl-pillar-emoji"></span></div>
                <h3 class="sl-framework-pillar-title">Measurable Impact</h3>
                <p class="sl-framework-pillar-text">We design for results. Every program includes clear metrics that track learning outcomes, behavior change, and business impact. We report on what changed — not just what was completed.</p>
                <div class="sl-framework-pillar-tag"><span>Results-Driven</span></div>
            </div>
        </div>
        <div class="sl-framework-callout">
            <p class="sl-framework-callout-text">These pillars aren't just principles — they're the foundation of every program we design.</p>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- WHAT YOU GET — Services Included -->
<!-- ============================================ -->
<section class="sl-section sl-bg-offwhite sl-reveal">
    <div class="sl-container">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--teal">What's Included</span>
            <h2 class="sl-heading-xl sl-text-navy">Everything You Need to Launch</h2>
            <p class="sl-body-lg sl-text-muted">A complete toolkit — not just a slide deck. Every engagement with Sofel Labs includes these deliverables.</p>
        </div>
        <div class="sl-services-grid">
            <div class="sl-service-card">
                <div class="sl-service-icon sl-service-icon--teal"><i class="fas fa-route"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Learning Journey Map</h3>
                <p class="sl-body sl-text-muted">A full blueprint of every challenge, checkpoint, and reward moment your learners will move through — mapped to real performance goals, not just course content.</p>
            </div>
            <div class="sl-service-card">
                <div class="sl-service-icon sl-service-icon--lime"><i class="fas fa-puzzle-piece"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Mechanics Library</h3>
                <p class="sl-body sl-text-muted">A curated set of game mechanics matched to your content — not generic badges, but mechanics chosen because they fit what you're teaching and who your learners are.</p>
            </div>
            <div class="sl-service-card">
                <div class="sl-service-icon sl-service-icon--orange"><i class="fas fa-chart-line"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Measurement Plan</h3>
                <p class="sl-body sl-text-muted">Clear metrics tied to engagement and on-the-job performance, so you can show stakeholders the training is actually working — in language they understand and care about.</p>
            </div>
            <div class="sl-service-card">
                <div class="sl-service-icon sl-service-icon--teal"><i class="fas fa-users-cog"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Stakeholder Toolkit</h3>
                <p class="sl-body sl-text-muted">Ready-made talking points and visuals to win buy-in from leadership, fast — built from the language decision-makers respond to. Get your budget approved with confidence.</p>
            </div>
            <div class="sl-service-card">
                <div class="sl-service-icon sl-service-icon--lime"><i class="fas fa-sliders-h"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Difficulty Tuning</h3>
                <p class="sl-body sl-text-muted">Built-in pacing and difficulty curves so beginners aren't overwhelmed and advanced learners stay challenged. We design for the full range, not a mythical average learner.</p>
            </div>
            <div class="sl-service-card">
                <div class="sl-service-icon sl-service-icon--orange"><i class="fas fa-life-ring"></i></div>
                <h3 class="sl-heading-sm sl-text-navy">Post-Launch Support</h3>
                <p class="sl-body sl-text-muted">We stay on after launch to refine mechanics based on real learner behaviour, not just assumptions made in design. Most programs improve significantly after their first cohort goes through.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- RESULTS — Outcomes & Stats -->
<!-- ============================================ -->
<section class="sl-results-id sl-reveal">
    <div class="sl-container">
        <div class="sl-results-id-header">
            <span class="sl-results-id-badge">✦ Results That Matter</span>
            <h2 class="sl-results-id-title">Built for <span style="color:#9ACA43;">Learning Outcomes</span>, Not Optics</h2>
            <p class="sl-results-id-subtitle">Every design decision earns its place by moving a real learning metric</p>
        </div>
        <div class="sl-results-id-grid">
            <div class="sl-results-id-card">
                <div class="sl-results-id-icon"><span class="sl-result-emoji"></span></div>
                <h3 class="sl-results-id-card-title">Knowledge Retention</h3>
                <p class="sl-results-id-card-text">Programs designed with cognitive science principles consistently outperform passive e-learning on retention and recall, measured 30, 60, and 90 days after training.</p>
                <div class="sl-results-id-stat"><span class="sl-stat-number" style="color:#47C89F;">87%</span><span class="sl-stat-label">Higher retention vs. traditional training</span></div>
            </div>
            <div class="sl-results-id-card sl-results-id-card--featured">
                <div class="sl-results-id-icon"><span class="sl-result-emoji"></span></div>
                <h3 class="sl-results-id-card-title" style="color:#9ACA43;">Behavior Change</h3>
                <p class="sl-results-id-card-text">We measure success by what learners do differently on the job — not just what they clicked through. Observable behavior change within 30 days of program completion.</p>
                <div class="sl-results-id-stat sl-results-id-stat--lime"><span class="sl-stat-number" style="color:#9ACA43;">3.2x</span><span class="sl-stat-label">Better application of learning on the job</span></div>
            </div>
            <div class="sl-results-id-card">
                <div class="sl-results-id-icon"><span class="sl-result-emoji"></span></div>
                <h3 class="sl-results-id-card-title">Meaningful Engagement</h3>
                <p class="sl-results-id-card-text">Learners don't just complete our programs — they recommend them. High voluntary completion and peer sharing are signals that the design is working.</p>
                <div class="sl-results-id-stat"><span class="sl-stat-number" style="color:#47C89F;">92%</span><span class="sl-stat-label">Learner satisfaction and completion rate</span></div>
            </div>
            <div class="sl-results-id-card">
                <div class="sl-results-id-icon"><span class="sl-result-emoji"></span></div>
                <h3 class="sl-results-id-card-title">Business Impact</h3>
                <p class="sl-results-id-card-text">Training that changes behavior changes results. Our clients report measurable improvements in the KPIs their training was designed to move — within one quarter.</p>
                <div class="sl-results-id-stat"><span class="sl-stat-number" style="color:#EE6F20;">4.8x</span><span class="sl-stat-label">ROI on training investment</span></div>
            </div>
        </div>
        <div class="sl-results-id-callout">
            <div class="sl-results-id-callout-line"></div>
            <p class="sl-results-id-callout-text">We don't just design training — we design <strong>transformational learning experiences</strong> that deliver measurable results.</p>
            <div class="sl-results-id-callout-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- NEW SECTION 1: WHO WE SERVE -->
<!-- ============================================ -->
<section class="sl-section sl-bg-white sl-reveal">
    <div class="sl-container">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--orange">Who We Serve</span>
            <h2 class="sl-heading-xl sl-text-navy">Built for Teams Who Take Learning Seriously</h2>
            <p class="sl-body-lg sl-text-muted">We work with organisations that have tried conventional training and know it's not enough. Here's who gets the most value from what we do.</p>
        </div>
        <div class="sl-audience-grid">
            <div class="sl-audience-card">
                <div class="sl-audience-icon"><i class="fas fa-building" style="color:#47C89F;"></i></div>
                <h3 class="sl-audience-title">Corporate L&amp;D Teams</h3>
                <p class="sl-audience-text">You have a mandate to upskill thousands of employees but your completion rates are embarrassing and your leadership is asking hard questions. We help you build programs worth completing.</p>
                <div class="sl-audience-use-case">Common programs: Sales enablement, compliance, leadership development, onboarding</div>
            </div>
            <div class="sl-audience-card">
                <div class="sl-audience-icon"><i class="fas fa-hands-helping" style="color:#9ACA43;"></i></div>
                <h3 class="sl-audience-title">NGOs &amp; Development Agencies</h3>
                <p class="sl-audience-text">Your training serves communities with diverse literacy levels, limited bandwidth, and high stakes. We design for context — mobile-first, culturally appropriate, and built around real field scenarios.</p>
                <div class="sl-audience-use-case">Common programs: Health worker training, community education, capacity building</div>
            </div>
            <div class="sl-audience-card">
                <div class="sl-audience-icon"><i class="fas fa-graduation-cap" style="color:#EE6F20;"></i></div>
                <h3 class="sl-audience-title">Training Providers</h3>
                <p class="sl-audience-text">You design courses for a living but want to take your offering to the next level. We help you embed gamification principles and engagement mechanics that make your programs stand out in a crowded market.</p>
                <div class="sl-audience-use-case">Common programs: Professional certification, technical skills, soft skills</div>
            </div>
            <div class="sl-audience-card">
                <div class="sl-audience-icon"><i class="fas fa-shield-alt" style="color:#47C89F;"></i></div>
                <h3 class="sl-audience-title">Compliance Departments</h3>
                <p class="sl-audience-text">Compliance training has a terrible reputation — and for good reason. We rebuild it from the ground up: not dumbed-down, not preachy, but genuinely engaging because people understand why it matters.</p>
                <div class="sl-audience-use-case">Common programs: Anti-bribery, data privacy, health &amp; safety, financial compliance</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- NEW SECTION 2: GAMIFICATION EXPLAINED -->
<!-- ============================================ -->
<section class="sl-game-explain sl-reveal">
    <div class="sl-container">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--teal">Gamification Explained</span>
            <h2 class="sl-heading-xl sl-text-white">What Gamification Actually Is<br><span style="color:#9ACA43;">(And What It Isn't)</span></h2>
            <p class="sl-body-lg" style="color:rgba(255,255,255,0.65); max-width:640px; margin:14px auto 0;">There's a lot of confusion about this word. Let's clear it up — because understanding the difference between real gamification and its shallow imitation is everything.</p>
        </div>

        <div class="sl-game-explain-grid">
            <div class="sl-game-myth">
                <div class="sl-game-myth-header">
                    <span class="sl-game-myth-label" style="color:#EE6F20;"> The Myth</span>
                    <h3 style="color:#ffffff; font-size:20px; font-weight:700; margin:8px 0 0;">Gamification = Adding Points &amp; Badges</h3>
                </div>
                <p style="color:rgba(255,255,255,0.6); font-size:15px; line-height:1.75; margin:16px 0 0;">Many organisations mistake cosmetic gamification for the real thing. They add a leaderboard to an existing course, hand out completion badges, and wonder why engagement hasn't changed. This approach — sometimes called "pointsification" — is fundamentally different from genuine learning design. Superficial mechanics don't change motivation because they don't address the root cause: the content itself wasn't designed to engage.</p>
            </div>
            <div class="sl-game-truth">
                <div class="sl-game-truth-header">
                    <span class="sl-game-truth-label" style="color:#47C89F;">✓ The Reality</span>
                    <h3 style="color:#ffffff; font-size:20px; font-weight:700; margin:8px 0 0;">Gamification = A Design Philosophy</h3>
                </div>
                <p style="color:rgba(255,255,255,0.6); font-size:15px; line-height:1.75; margin:16px 0 0;">True gamification means applying game design principles — challenge, progression, feedback loops, narrative, and autonomy — to the structure of a learning experience from the very beginning. It means asking: what makes a game impossible to put down? And then intentionally engineering those same psychological drivers into your training. The result isn't a game. It's a learning experience so well-designed that people want to come back.</p>
                <div class="sl-game-mechanics-row">
                    <span class="sl-mechanic-tag">Challenge Curves</span>
                    <span class="sl-mechanic-tag">Feedback Loops</span>
                    <span class="sl-mechanic-tag">Narrative Arc</span>
                    <span class="sl-mechanic-tag">Autonomy</span>
                    <span class="sl-mechanic-tag">Mastery Progression</span>
                    <span class="sl-mechanic-tag">Social Dynamics</span>
                </div>
            </div>
        </div>

        <div class="sl-game-quote-row">
            <div class="sl-game-quote-card">
                <p class="sl-game-quote-text">"The goal of gamification is not to make work feel like play. It's to make learning feel worth doing."</p>
                <span class="sl-game-quote-attr">— Mwangi Kamau, Founder, Sofel Labs</span>
            </div>
            <div class="sl-game-stats-row">
                <div class="sl-game-stat"><span class="sl-game-stat-num" style="color:#47C89F;">48%</span><span class="sl-game-stat-label">Increase in learner engagement with gamified content</span></div>
                <div class="sl-game-stat"><span class="sl-game-stat-num" style="color:#9ACA43;">36%</span><span class="sl-game-stat-label">Higher knowledge retention after 90 days</span></div>
                <div class="sl-game-stat"><span class="sl-game-stat-num" style="color:#EE6F20;">60%</span><span class="sl-game-stat-label">Faster skill acquisition vs. traditional eLearning</span></div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- NEW SECTION 3: CASE STUDY / STORY -->
<!-- ============================================ -->
<section class="sl-section sl-bg-offwhite sl-reveal">
    <div class="sl-container">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--lime">In Practice</span>
            <h2 class="sl-heading-xl sl-text-navy">What a Real Transformation Looks Like</h2>
            <p class="sl-body-lg sl-text-muted">Here's how we took a compliance training program with 34% completion — and turned it into a learner-favourite experience with 91% completion in 8 weeks.</p>
        </div>

        <div class="sl-story-grid">
            <div class="sl-story-context">
                <div class="sl-story-tag" style="color:#EE6F20; border-color:rgba(238,111,32,0.3);">The Challenge</div>
                <h3 class="sl-heading-sm sl-text-navy">A Financial Services Firm with a Compliance Crisis</h3>
                <p class="sl-body sl-text-muted">A regional financial services firm was facing regulatory scrutiny. Their mandatory anti-bribery training had a 34% voluntary completion rate, and even those who completed it scored poorly on post-assessments. The L&D team had tried reminders, deadline pressure, and even making the training shorter — nothing worked.</p>
                <p class="sl-body sl-text-muted">The content wasn't the problem. The learners weren't the problem. The <strong style="color:#0E2A47;">design</strong> was the problem.</p>

                <div class="sl-story-tag" style="color:#47C89F; border-color:rgba(71,200,159,0.3); margin-top:28px;">Our Approach</div>
                <p class="sl-body sl-text-muted">We rebuilt the program around a central narrative: learners played the role of a compliance officer navigating real-world scenarios — supplier dinners, gift requests, whistleblower situations. Each scenario had branching consequences. Wrong decisions didn't just show a red X; they played out realistically, showing what an investigation would look like. Points reflected risk management skill, not just completion.</p>
            </div>

            <div class="sl-story-results">
                <div class="sl-story-result-header">Results After 8 Weeks</div>
                <div class="sl-story-stat-list">
                    <div class="sl-story-stat">
                        <span class="sl-story-stat-before">34%</span>
                        <span class="sl-story-stat-arrow">→</span>
                        <span class="sl-story-stat-after" style="color:#47C89F;">91%</span>
                        <span class="sl-story-stat-label">Voluntary completion rate</span>
                    </div>
                    <div class="sl-story-stat">
                        <span class="sl-story-stat-before">52%</span>
                        <span class="sl-story-stat-arrow">→</span>
                        <span class="sl-story-stat-after" style="color:#9ACA43;">89%</span>
                        <span class="sl-story-stat-label">Post-assessment pass rate</span>
                    </div>
                    <div class="sl-story-stat">
                        <span class="sl-story-stat-before">12 min</span>
                        <span class="sl-story-stat-arrow">→</span>
                        <span class="sl-story-stat-after" style="color:#EE6F20;">38 min</span>
                        <span class="sl-story-stat-label">Average time on training (voluntary)</span>
                    </div>
                    <div class="sl-story-stat">
                        <span class="sl-story-stat-before">2.1</span>
                        <span class="sl-story-stat-arrow">→</span>
                        <span class="sl-story-stat-after" style="color:#47C89F;">4.9/5</span>
                        <span class="sl-story-stat-label">Learner satisfaction rating</span>
                    </div>
                </div>
                <div class="sl-story-quote">
                    <p>"We've never had staff ask when the next compliance module is coming out. After Sofel's redesign, we had three people ask exactly that."</p>
                    <span>— Head of Compliance, Financial Services Client</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- TESTIMONIAL -->
<!-- ============================================ -->
<section class="sl-testimonial-classic sl-reveal">
    <div class="sl-testimonial-classic-container">
        <div class="sl-testimonial-classic-card">
            <div class="sl-testimonial-classic-quote-mark"><span>"</span></div>
            <blockquote class="sl-testimonial-classic-quote">
                Sofel Labs didn't just gamify our training — they transformed how our people learn.
                <span class="sl-testimonial-classic-highlight">The engagement was unreal.</span>
                For the first time, our team was actually excited to come back and complete more modules.
            </blockquote>
            <div class="sl-testimonial-classic-divider">
                <span class="sl-classic-divider-line"></span>
                <span class="sl-classic-divider-diamond">◆</span>
                <span class="sl-classic-divider-line"></span>
            </div>
            <div class="sl-testimonial-classic-author">
                <div class="sl-testimonial-classic-avatar">CJ</div>
                <div class="sl-testimonial-classic-author-info">
                    <p class="sl-testimonial-classic-name">Cjay</p>
                    <p class="sl-testimonial-classic-title">Instructional Design Specialist</p>
                    <div class="sl-testimonial-classic-rating">
                        <span class="sl-classic-star">★</span><span class="sl-classic-star">★</span>
                        <span class="sl-classic-star">★</span><span class="sl-classic-star">★</span>
                        <span class="sl-classic-star">★</span>
                        <span class="sl-classic-rating-text">5.0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- LOGOS / TRUSTED BY -->
<!-- ============================================ -->
<section class="sl-logos-strip sl-reveal">
    <div class="sl-container">
        <p class="sl-logos-label">Trusted by teams building training for</p>
        <div class="sl-logos-row">
            <div class="sl-logo-item"><i class="fas fa-building"></i><span>Corporates</span></div>
            <div class="sl-logo-item"><i class="fas fa-hands-helping"></i><span>NGOs</span></div>
            <div class="sl-logo-item"><i class="fas fa-globe-africa"></i><span>Development Agencies</span></div>
            <div class="sl-logo-item"><i class="fas fa-graduation-cap"></i><span>L&amp;D Teams</span></div>
            <div class="sl-logo-item"><i class="fas fa-shield-alt"></i><span>Compliance Departments</span></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- FOUNDER -->
<!-- ============================================ -->
<section class="sl-section sl-bg-white sl-reveal">
    <div class="sl-container">
        <div class="sl-founder-grid">
            <div class="sl-founder-content">
                <span class="sl-badge sl-badge--teal">Founder &amp; Lead Consultant</span>
                <h2 class="sl-heading-xl sl-text-navy" style="margin-top:12px !important;">Hi, I'm Mwangi Kamau.</h2>
                <p class="sl-founder-role sl-text-teal">E-Learning Consultant | Gamification Specialist</p>
                <p class="sl-founder-location sl-text-muted"><i class="fas fa-map-marker-alt sl-text-teal"></i> Nairobi County, Kenya</p>
                <p class="sl-body sl-text-body">I'm passionate about transforming how people learn. With years of experience in instructional design and gamification, I've helped organizations across Africa and beyond create engaging e-learning experiences that deliver real results — not just completion certificates.</p>
                <p class="sl-body sl-text-body">I founded <strong style="color:#47C89F;">Sofel Labs</strong> with a simple mission: make learning unforgettable. My approach combines proven instructional design principles with the motivational psychology of great game design. No gimmicks, no badges for the sake of badges — just experiences that actually move people.</p>
                <blockquote class="sl-founder-quote">"Gamification isn't about points and badges. It's about creating experiences that change behavior — and designing those experiences with intention."</blockquote>
                <p class="sl-body sl-text-body">Over the years, I've developed gamified training programs for corporates, NGOs, and development agencies — always with a focus on real-world application and measurable outcomes. I care deeply about the Africa context: designing learning that works for diverse populations, low-bandwidth environments, and high-stakes skill gaps.</p>
                <p class="sl-body sl-text-body sl-text-navy sl-fw-medium">I'm excited to help you build training that your learners will actually love.</p>
                <p class="sl-founder-signature">Let's transform learning together.<br>— Mwangi</p>
            </div>
            <div class="sl-founder-image-col">
                <img src="./wp-content/uploads/2021/06/mjcropped-799x1024.jpg" alt="Mwangi Kamau - Founder of Sofel Labs" class="sl-founder-img">
                <div class="sl-founder-stats">
                    <div class="sl-founder-stat">
                        <span class="sl-stat-num sl-text-teal">528</span>
                        <span class="sl-text-muted sl-small">Followers</span>
                    </div>
                    <div class="sl-founder-stat-divider"></div>
                    <div class="sl-founder-stat">
                        <span class="sl-stat-num sl-text-teal">376</span>
                        <span class="sl-text-muted sl-small">Connections</span>
                    </div>
                </div>
                <div class="sl-founder-social">
                    <a href="https://www.linkedin.com/in/mwangikamau/" target="_blank" class="sl-social-link" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://twitter.com/sofellabs" target="_blank" class="sl-social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/sofellabs" target="_blank" class="sl-social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                </div>
                <div class="sl-founder-brand-tag">Sofel Labs</div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- FAQ -->
<!-- ============================================ -->
<section class="sl-section sl-bg-offwhite sl-reveal">
    <div class="sl-container sl-container--narrow">
        <div class="sl-section-header">
            <span class="sl-badge sl-badge--teal">Common Questions</span>
            <h2 class="sl-heading-xl sl-text-navy">Frequently Asked Questions</h2>
            <p class="sl-body-lg sl-text-muted">Everything you've been wondering before booking a call. If your question isn't here, just reach out.</p>
        </div>
        <div class="sl-faq-list">
            <div class="sl-faq-item">
                <button class="sl-faq-question" aria-expanded="false">
                    <span>How long does a typical gamification project take?</span>
                    <span class="sl-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="sl-faq-answer">
                    <p class="sl-body">Most engagements run 6–10 weeks from discovery to launch, depending on the size of the program and how much existing content we're working from. Smaller pilot programs can move faster — sometimes in as little as 3 weeks for a focused module. We'll always give you a realistic timeline in our first conversation.</p>
                </div>
            </div>
            <div class="sl-faq-item">
                <button class="sl-faq-question" aria-expanded="false">
                    <span>Do you build the training yourself, or just consult on strategy?</span>
                    <span class="sl-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="sl-faq-answer">
                    <p class="sl-body">Both. We design the full mechanics and learning journey, and can either hand the blueprint to your in-house team or build the program ourselves end-to-end, depending on what you need. Many clients start with a strategy engagement and then bring us back to build. Others hand everything over from day one. We're flexible.</p>
                </div>
            </div>
            <div class="sl-faq-item">
                <button class="sl-faq-question" aria-expanded="false">
                    <span>Will this work for compliance training, or only for "fun" topics?</span>
                    <span class="sl-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="sl-faq-answer">
                    <p class="sl-body">Compliance training is one of our most common use cases — and one of the most rewarding to transform. Gamification doesn't mean turning serious content into a joke. It means designing the right challenge structure, consequences, and narrative so people actually pay attention, feel the stakes, and retain the material. We've built anti-bribery, data privacy, and health &amp; safety programs that learners actually request to revisit.</p>
                </div>
            </div>
            <div class="sl-faq-item">
                <button class="sl-faq-question" aria-expanded="false">
                    <span>Do we need special software or a new learning platform?</span>
                    <span class="sl-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="sl-faq-answer">
                    <p class="sl-body">No. We design mechanics that work within whatever LMS or delivery platform you already use — Moodle, TalentLMS, Cornerstone, custom builds, even WhatsApp-based delivery for low-bandwidth environments. No coding required on your end, and no forced platform migration. We meet you where your learners are.</p>
                </div>
            </div>
            <div class="sl-faq-item">
                <button class="sl-faq-question" aria-expanded="false">
                    <span>How do you measure whether it's actually working?</span>
                    <span class="sl-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="sl-faq-answer">
                    <p class="sl-body">Every program ships with a measurement plan tied to engagement metrics and, where possible, on-the-job behaviour change — not just completion rates, which can be misleading on their own. We use pre/post assessments, scenario-based performance scoring, manager observation tools, and 30/60/90 day check-ins to build a complete picture of learning impact.</p>
                </div>
            </div>
            <div class="sl-faq-item">
                <button class="sl-faq-question" aria-expanded="false">
                    <span>We have a small L&amp;D team with limited budget. Can you still help?</span>
                    <span class="sl-faq-icon"><i class="fas fa-plus"></i></span>
                </button>
                <div class="sl-faq-answer">
                    <p class="sl-body">Yes — and some of our best work has been with lean teams. We offer focused strategy engagements for teams who want to upskill internally and build gamified learning themselves. We can also scope a pilot project on a single high-priority course before committing to a larger engagement. Let's talk about what's actually possible within your constraints.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CTA DARK BANNER -->
<!-- ============================================ -->
<section class="sl-cta-banner sl-bg-navy sl-reveal">
    <div class="sl-container sl-container--narrow sl-text-center">
        <h2 class="sl-heading-lg sl-text-white">Build Your Gamified Program with Sofel Labs</h2>
        <p class="sl-body-lg sl-text-white-60">From strategy to launch — we guide you every step of the way.</p>
    </div>
</section>

<!-- ============================================ -->
<!-- CTA - DISCOVERY CALL -->
<!-- ============================================ -->
<section class="sl-section sl-bg-white sl-reveal">
    <div class="sl-container">
        <div class="sl-cta-grid">
            <div>
                <h2 class="sl-heading-xl sl-text-navy">The Effective Gamification Framework</h2>
                <p class="sl-body-lg sl-text-muted" style="margin:16px 0 28px !important;">Create unforgettable e-learning programs that get results and delight learners. Book a free discovery call and let's map out what's possible for your team.</p>
                <a href="https://cal.com/sofellabs" class="sl-btn sl-btn--teal" id="Book2">Book your discovery call</a>
            </div>
            <div>
                <img src="./wp-content/uploads/2022/01/devicesAsset-5-768x478.png" alt="Sofel Labs Framework" class="sl-cta-img">
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CTA - CONSULTATION (TEAL BG) -->
<!-- ============================================ -->
<section class="sl-section sl-bg-teal sl-reveal">
    <div class="sl-container">
        <div class="sl-cta-grid">
            <div>
                <p class="sl-small sl-text-white sl-fw-semibold" style="letter-spacing:2px; text-transform:uppercase; margin-bottom:10px !important;">Ready to make learning stick?</p>
                <h2 class="sl-heading-lg sl-text-white" style="margin-bottom:12px !important;">Start With a Free Consultation</h2>
                <p class="sl-body-lg sl-text-white" style="margin-bottom:28px !important;">Whether you're training staff, building capacity, or rolling out a large-scale program across an entire organization, Sofel Labs can help you design learning that actually delivers results — not just reports.</p>
                <a href="https://cal.com/sofellabs" class="sl-btn sl-btn--white-outline" id="Book3">Book Your Free Consultation</a>
            </div>
            <div>
                <img src="./wp-content/uploads/elementor/thumbs/unityimage-pk2fb7492hp367yesd35y7eiri5ygis1atvmtl6dgs.jpg" alt="Sofel Labs Consultation" class="sl-cta-img">
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SUBSCRIPTION SECTION -->
<!-- ============================================ -->
<section class="sl-section sl-bg-offwhite sl-reveal">
    <div class="sl-container sl-container--narrow sl-text-center">
        <span class="sl-badge sl-badge--teal">Get Updates</span>
        <h4 class="sl-heading-md sl-text-navy" style="margin:16px 0 8px !important;">Subscribe to Our Newsletter</h4>
        <p class="sl-body sl-text-muted" style="margin-bottom:16px !important;">Receive insights, case studies, and practical tips on gamification and instructional design.</p>

        <div id="subscription-message"></div>

        <form id="subscription-form" class="sl-subscription-form" style="max-width:500px;margin:0 auto;">
            @csrf
            <div class="sl-form-group" style="display:flex;gap:12px;flex-wrap:wrap;justify-content:center;">
                <input type="email" 
                       id="sub-email" 
                       name="email" 
                       placeholder="Enter your email address" 
                       required 
                       style="flex:1;min-width:220px;padding:12px 18px;border:2px solid rgba(0,0,0,0.06);border-radius:8px;font-size:16px;outline:none;transition:all 0.3s;">
                <button type="submit" 
                        class="sl-btn sl-btn--primary" 
                        style="padding:12px 32px;border:none;border-radius:8px;background:#47C89F;color:#FFFFFF;font-weight:600;font-size:16px;cursor:pointer;transition:all 0.3s;">
                    Subscribe
                </button>
            </div>
            <p style="font-size:13px;color:#6B7C93;margin-top:12px;">We respect your privacy. Unsubscribe at any time.</p>
        </form>

        <div id="subscription-success" style="display:none;padding:20px;background:rgba(71,200,159,0.06);border-radius:8px;border:1px solid rgba(71,200,159,0.12);max-width:500px;margin:0 auto;">
            <i class="fas fa-check-circle" style="color:#47C89F;font-size:24px;display:block;margin-bottom:8px;"></i>
            <p style="color:#47C89F;font-weight:600;font-size:16px;margin:0;">Thank you for subscribing!</p>
            <p style="color:#6B7C93;font-size:14px;margin:4px 0 0 0;">You'll receive our latest insights and updates.</p>
        </div>

        <div id="subscription-error" style="display:none;padding:20px;background:rgba(237,68,132,0.04);border-radius:8px;border:1px solid rgba(237,68,132,0.08);max-width:500px;margin:0 auto;">
            <i class="fas fa-exclamation-circle" style="color:#ED4484;font-size:24px;display:block;margin-bottom:8px;"></i>
            <p style="color:#ED4484;font-weight:600;font-size:16px;margin:0;">Something went wrong.</p>
            <p style="color:#6B7C93;font-size:14px;margin:4px 0 0 0;" id="error-message">Please try again later.</p>
        </div>
    </div>
</section>

<!-- Subscription Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('subscription-form');
    const emailInput = document.getElementById('sub-email');
    const successDiv = document.getElementById('subscription-success');
    const errorDiv = document.getElementById('subscription-error');
    const errorMessage = document.getElementById('error-message');
    const messageDiv = document.getElementById('subscription-message');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        // Reset messages
        successDiv.style.display = 'none';
        errorDiv.style.display = 'none';
        messageDiv.innerHTML = '';

        const email = emailInput.value.trim();

        if (!email) {
            showError('Please enter your email address.');
            return;
        }

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Subscribing...';
        submitBtn.disabled = true;

        // Get CSRF token
        const token = document.querySelector('meta[name="csrf-token"]')?.content || '';

        fetch('/subscribe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                email: email,
                source: 'website'
            })
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;

            if (data.success) {
                successDiv.style.display = 'block';
                form.style.display = 'none';
                emailInput.value = '';

                // Show success message at top
                messageDiv.innerHTML = `
                    <div style="padding:12px 18px;background:rgba(71,200,159,0.06);border-radius:8px;border:1px solid rgba(71,200,159,0.12);margin-bottom:16px;">
                        <p style="color:#47C89F;font-weight:500;margin:0;">✅ ${data.message}</p>
                    </div>
                `;

                // Reset form after 5 seconds if needed
                setTimeout(() => {
                    // You can show the form again if you want multiple subscriptions
                    // form.style.display = 'flex';
                    // successDiv.style.display = 'none';
                }, 5000);
            } else {
                if (data.already_subscribed) {
                    messageDiv.innerHTML = `
                        <div style="padding:12px 18px;background:rgba(255,193,7,0.06);border-radius:8px;border:1px solid rgba(255,193,7,0.12);margin-bottom:16px;">
                            <p style="color:#F59E0B;font-weight:500;margin:0;">ℹ️ ${data.message}</p>
                        </div>
                    `;
                } else {
                    showError(data.message || 'Something went wrong. Please try again.');
                }
            }
        })
        .catch(error => {
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
            console.error('Subscription error:', error);
            showError('Network error. Please check your connection and try again.');
        });
    });

    function showError(message) {
        errorMessage.textContent = message;
        errorDiv.style.display = 'block';
    }
});
</script>

<!-- ============================================ -->
<!-- SCRIPTS -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Hero carousel
    var slides = document.querySelectorAll('.sl-hero-slide');
    var dots = document.querySelectorAll('.sl-hero-dot');
    var current = 0, timer;
    function show(i) {
        slides.forEach(function(s){ s.classList.remove('active'); });
        dots.forEach(function(d){ d.classList.remove('active'); });
        if (slides[i]) slides[i].classList.add('active');
        if (dots[i]) dots[i].classList.add('active');
        current = i;
    }
    function next() { show((current + 1) % slides.length); }
    function start() { if (slides.length > 1) timer = setInterval(next, 5000); }
    function stop() { clearInterval(timer); }
    window.goToSlide = function(i) { stop(); show(i); setTimeout(start, 5000); };
    dots.forEach(function(d, i){ d.addEventListener('click', function(){ goToSlide(i); }); });
    var wrapper = document.querySelector('.sl-hero-wrapper');
    if (wrapper) { wrapper.addEventListener('mouseenter', stop); wrapper.addEventListener('mouseleave', start); }
    start();

    // Append UTM params to booking links
    ['Book1','Book2','Book3'].forEach(function(id){
        var el = document.getElementById(id);
        if (el) el.href += window.location.search;
    });

    // Scroll reveal
    var revealEls = document.querySelectorAll('.sl-reveal');
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('sl-reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.10, rootMargin: '0px 0px -40px 0px' });
        revealEls.forEach(function (el) { observer.observe(el); });
    } else {
        revealEls.forEach(function (el) { el.classList.add('sl-reveal-visible'); });
    }

    // FAQ accordion
    var faqItems = document.querySelectorAll('.sl-faq-item');
    faqItems.forEach(function (item) {
        var question = item.querySelector('.sl-faq-question');
        question.addEventListener('click', function () {
            var isOpen = item.classList.contains('sl-faq-open');
            faqItems.forEach(function (other) {
                other.classList.remove('sl-faq-open');
                other.querySelector('.sl-faq-question').setAttribute('aria-expanded', 'false');
            });
            if (!isOpen) {
                item.classList.add('sl-faq-open');
                question.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // Sticky header
    var siteHeader = document.querySelector('.main-header-bar') || document.querySelector('.ast-primary-header-bar');
    if (siteHeader) {
        var headerWrap = siteHeader.closest('.ast-main-header-wrap') || siteHeader.parentElement;
        function onScroll() {
            if (window.pageYOffset > 80) {
                siteHeader.classList.add('sl-header-scrolled');
                if (headerWrap) headerWrap.classList.add('sl-header-scrolled');
            } else {
                siteHeader.classList.remove('sl-header-scrolled');
                if (headerWrap) headerWrap.classList.remove('sl-header-scrolled');
            }
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    }
});
</script>

<!-- ============================================ -->
<!-- ALL STYLES -->
<!-- ============================================ -->
<style>
/* ================================================
   SOFEL LABS — BRAND THEME
   Primary: Teal #47C89F | Lime #9ACA43 | Orange #EE6F20
   Navy: #0E2A47 | Body: #3D4A5C | Muted: #6B7C93
   ================================================ */
*, *::before, *::after { box-sizing: border-box !important; }

/* ---- TOKENS ---- */
.sl-text-navy   { color: #0E2A47 !important; }
.sl-text-teal   { color: #47C89F !important; }
.sl-text-lime   { color: #9ACA43 !important; }
.sl-text-orange { color: #EE6F20 !important; }
.sl-text-white  { color: #FFFFFF !important; }
.sl-text-white-60 { color: rgba(255,255,255,0.65) !important; }
.sl-text-muted  { color: #6B7C93 !important; }
.sl-text-body   { color: #3D4A5C !important; }
.sl-accent-lime   { color: #9ACA43; }
.sl-accent-orange { color: #EE6F20; }

/* ---- BACKGROUNDS ---- */
.sl-bg-white    { background: #FFFFFF !important; }
.sl-bg-offwhite { background: #F5F7F6 !important; }
.sl-bg-navy     { background: #0E2A47 !important; }
.sl-bg-teal     { background: #47C89F !important; }
.sl-bg-dark     { background: #0A1A10 !important; }

/* ---- TYPOGRAPHY ---- */
.sl-heading-xl { font-size: clamp(26px,4vw,40px) !important; font-weight:700 !important; line-height:1.2 !important; font-family:'Cabin',sans-serif !important; }
.sl-heading-lg { font-size: clamp(22px,3vw,32px) !important; font-weight:700 !important; line-height:1.25 !important; font-family:'Cabin',sans-serif !important; }
.sl-heading-md { font-size: clamp(18px,2.5vw,26px) !important; font-weight:600 !important; font-family:'Cabin',sans-serif !important; }
.sl-heading-sm { font-size:18px !important; font-weight:600 !important; font-family:'Cabin',sans-serif !important; margin-bottom:10px !important; }
.sl-body-lg    { font-size:18px !important; line-height:1.75 !important; color:#3D4A5C; }
.sl-body       { font-size:15px !important; line-height:1.75 !important; color:#3D4A5C; margin-bottom:14px !important; }
.sl-small      { font-size:13px !important; }
.sl-fw-semibold { font-weight:600 !important; }
.sl-fw-medium  { font-weight:500 !important; }

/* ---- LAYOUT ---- */
.sl-container { max-width:1200px !important; margin:0 auto !important; padding:0 24px !important; }
.sl-container--narrow { max-width:860px !important; margin:0 auto !important; padding:0 24px !important; }
.sl-container-full { max-width:1200px !important; margin:0 auto !important; padding:0 24px !important; }
.sl-text-center { text-align:center !important; }
.sl-section     { padding:80px 0 !important; }
.sl-cta-banner  { padding:60px 0 !important; }
.sl-section-header { text-align:center !important; margin-bottom:52px !important; }
.sl-section-header .sl-body-lg { margin-top:12px !important; max-width:600px !important; margin-left:auto !important; margin-right:auto !important; }

/* ---- REVEAL ---- */
.sl-reveal { opacity:0; transform:translateY(28px); transition:opacity 0.7s ease,transform 0.7s ease; }
.sl-reveal-visible { opacity:1 !important; transform:translateY(0) !important; }
@media (prefers-reduced-motion: reduce) { .sl-reveal { opacity:1 !important; transform:none !important; transition:none !important; } }

/* ---- EYEBROW ---- */
.sl-eyebrow { display:block !important; font-size:12.5px !important; font-weight:700 !important; text-transform:uppercase !important; letter-spacing:3px !important; color:#47C89F !important; margin-bottom:16px !important; text-align:center !important; }

/* ---- RULES ---- */
.sl-rule-thin { width:100% !important; height:1px !important; background:#E3E7ED !important; margin:0 !important; }

/* ---- BADGES ---- */
.sl-badge { display:inline-block !important; font-size:12px !important; font-weight:600 !important; text-transform:uppercase !important; letter-spacing:2px !important; padding:5px 18px !important; border-radius:20px !important; margin-bottom:14px !important; }
.sl-badge--teal   { background:rgba(71,200,159,0.1) !important; color:#47C89F !important; border:1px solid rgba(71,200,159,0.25) !important; }
.sl-badge--lime   { background:rgba(154,202,67,0.1) !important; color:#6a9a00 !important; border:1px solid rgba(154,202,67,0.25) !important; }
.sl-badge--orange { background:rgba(238,111,32,0.1) !important; color:#EE6F20 !important; border:1px solid rgba(238,111,32,0.25) !important; }

/* ---- BUTTONS ---- */
.sl-btn { display:inline-block !important; padding:14px 32px !important; border-radius:6px !important; font-size:15px !important; font-weight:600 !important; text-decoration:none !important; transition:all 0.25s ease !important; letter-spacing:0.3px !important; font-family:'Cabin',sans-serif !important; }
.sl-btn--teal { background:#47C89F !important; color:#FFFFFF !important; }
.sl-btn--teal:hover { background:#35aa85 !important; transform:translateY(-2px) !important; box-shadow:0 6px 20px rgba(71,200,159,0.35) !important; }
.sl-btn--orange { background:#EE6F20 !important; color:#FFFFFF !important; }
.sl-btn--orange:hover { background:#cc5d17 !important; transform:translateY(-2px) !important; box-shadow:0 6px 20px rgba(238,111,32,0.35) !important; }
.sl-btn--ghost { background:transparent !important; color:#FFFFFF !important; border:2px solid rgba(255,255,255,0.5) !important; }
.sl-btn--ghost:hover { border-color:#FFFFFF !important; background:rgba(255,255,255,0.1) !important; }
.sl-btn--white-outline { background:transparent !important; color:#FFFFFF !important; border:2px solid rgba(255,255,255,0.7) !important; }
.sl-btn--white-outline:hover { background:rgba(255,255,255,0.12) !important; border-color:#FFFFFF !important; transform:translateY(-2px) !important; }

/* ---- HERO ---- */
.sl-hero { padding:0 !important; background:#0E2A47 !important; }
.sl-hero-container { max-width:100% !important; margin:0 auto !important; padding:0 !important; position:relative !important; }
.sl-hero-wrapper { position:relative !important; width:100% !important; overflow:hidden !important; background:#0a1a2e !important; }
.sl-hero-slide { display:none !important; width:100% !important; height:580px !important; position:relative !important; animation:slFadeIn 0.8s ease !important; }
.sl-hero-slide.active { display:block !important; }
.sl-hero-image { width:100% !important; height:100% !important; background-size:cover !important; background-position:center !important; }
.sl-hero-overlay { position:absolute !important; inset:0 !important; background:linear-gradient(105deg, rgba(14,42,71,0.92) 0%, rgba(14,42,71,0.65) 55%, rgba(14,42,71,0.25) 100%) !important; display:flex !important; align-items:center !important; }
.sl-hero-content { padding:0 64px !important; max-width:720px !important; }
.sl-hero-eyebrow { display:block !important; font-size:12px !important; font-weight:700 !important; text-transform:uppercase !important; letter-spacing:3px !important; color:#47C89F !important; margin-bottom:16px !important; }
.sl-hero-headline { font-size:clamp(32px,5vw,58px) !important; font-weight:800 !important; line-height:1.15 !important; color:#FFFFFF !important; margin:0 0 20px !important; font-family:'Cabin',sans-serif !important; }
.sl-hero-subtext { font-size:18px !important; line-height:1.7 !important; color:rgba(255,255,255,0.75) !important; margin:0 0 32px !important; max-width:560px !important; }
.sl-hero-actions { display:flex !important; gap:16px !important; flex-wrap:wrap !important; }
@keyframes slFadeIn { from { opacity:0; } to { opacity:1; } }
.sl-hero-dots { position:absolute !important; bottom:24px !important; left:50% !important; transform:translateX(-50%) !important; display:flex !important; gap:8px !important; background:rgba(0,0,0,0.35) !important; padding:7px 14px !important; border-radius:20px !important; }
.sl-hero-dot { width:9px !important; height:9px !important; border-radius:50% !important; border:none !important; background:rgba(255,255,255,0.4) !important; cursor:pointer !important; transition:all 0.3s !important; }
.sl-hero-dot.active, .sl-hero-dot:hover { background:#47C89F !important; transform:scale(1.3) !important; }

/* ---- TRUST STRIP ---- */
.sl-trust-strip { background:#FFFFFF !important; padding:32px 0 !important; border-bottom:1px solid #E8ECF2 !important; }
.sl-trust-grid { display:grid !important; grid-template-columns:repeat(7,1fr) !important; align-items:center !important; }
.sl-trust-item { text-align:center !important; display:flex !important; flex-direction:column !important; gap:4px !important; }
.sl-trust-num { font-size:30px !important; font-weight:800 !important; font-family:'Cabin',sans-serif !important; line-height:1 !important; }
.sl-trust-label { font-size:12.5px !important; color:#6B7C93 !important; }
.sl-trust-divider { width:1px !important; height:36px !important; background:#E2E7EE !important; margin:0 auto !important; }

/* ---- PROBLEM SECTION ---- */
.sl-problem-cards { display:grid !important; grid-template-columns:repeat(4,1fr) !important; gap:20px !important; margin-bottom:40px !important; }
.sl-problem-card { background:rgba(255,255,255,0.04) !important; border:1px solid rgba(255,255,255,0.08) !important; border-radius:14px !important; padding:28px 22px !important; text-align:center !important; transition:all 0.3s !important; }
.sl-problem-card:hover { background:rgba(255,255,255,0.07) !important; transform:translateY(-4px) !important; }
.sl-problem-icon { font-size:36px !important; margin-bottom:14px !important; }
.sl-problem-title { font-size:17px !important; font-weight:600 !important; color:#FFFFFF !important; margin:0 0 10px !important; font-family:'Cabin',sans-serif !important; }
.sl-problem-text { font-size:14px !important; line-height:1.7 !important; color:rgba(255,255,255,0.6) !important; margin:0 !important; }
.sl-problem-callout { background:rgba(238,111,32,0.08) !important; border:1px solid rgba(238,111,32,0.15) !important; border-radius:10px !important; padding:24px 28px !important; text-align:center !important; font-size:18px !important; line-height:1.7 !important; color:rgba(255,255,255,0.75) !important; }

/* ---- TRANSFORM SECTION ---- */
.sl-transform-full { background:#FAFBF9 !important; padding:80px 0 !important; font-family:sans-serif !important; }
.sl-transform-full-header { text-align:center !important; margin-bottom:48px !important; }
.sl-transform-full-title { font-size:38px !important; font-weight:700 !important; color:#0E2A47 !important; margin:0 0 8px !important; font-family:'Cabin',sans-serif !important; }
.sl-transform-full-subtitle { font-size:18px !important; color:#6B7C93 !important; margin:0 !important; font-weight:300 !important; }
.sl-transform-full-grid { display:grid !important; grid-template-columns:1fr auto 1fr !important; background:#FFFFFF !important; border-radius:16px !important; overflow:hidden !important; box-shadow:0 2px 20px rgba(0,0,0,0.04) !important; border:1px solid #EEF0F4 !important; margin-bottom:40px !important; }
.sl-transform-full-col { padding:40px 32px !important; display:flex !important; flex-direction:column !important; }
.sl-transform-full-col--before { border-right:1px solid rgba(238,111,32,0.08) !important; }
.sl-transform-full-col--after { background:#F7FDF9 !important; }
.sl-transform-full-col-header { margin-bottom:24px !important; padding-bottom:16px !important; border-bottom:1px solid rgba(0,0,0,0.04) !important; }
.sl-transform-full-icon { display:inline-block !important; font-size:18px !important; font-weight:700 !important; margin-right:8px !important; }
.sl-transform-full-icon--before { color:#EE6F20 !important; }
.sl-transform-full-icon--after { color:#47C89F !important; }
.sl-transform-full-col-sub { display:block !important; font-size:13px !important; color:#8A8A9E !important; margin-top:2px !important; }
.sl-transform-full-col-body { flex:1 !important; display:flex !important; flex-direction:column !important; }
.sl-transform-full-text { font-size:16px !important; line-height:1.7 !important; color:#3D4A5C !important; margin:0 0 20px !important; }
.sl-transform-full-features { display:flex !important; flex-direction:column !important; gap:6px !important; margin-bottom:24px !important; }
.sl-transform-full-feature { display:flex !important; align-items:center !important; gap:12px !important; padding:8px 0 !important; font-size:14px !important; color:#3D4A5C !important; border-bottom:1px solid rgba(0,0,0,0.02) !important; }
.sl-feature-mark { display:inline-flex !important; align-items:center !important; justify-content:center !important; width:20px !important; height:20px !important; border-radius:50% !important; font-size:11px !important; font-weight:700 !important; flex-shrink:0 !important; }
.sl-feature-mark--before { background:rgba(238,111,32,0.1) !important; color:#EE6F20 !important; }
.sl-feature-mark--after  { background:rgba(71,200,159,0.1) !important; color:#47C89F !important; }
.sl-transform-full-outcome { padding:14px 18px !important; border-radius:8px !important; text-align:center !important; margin-top:auto !important; }
.sl-transform-full-outcome--before { background:rgba(238,111,32,0.04) !important; border:1px solid rgba(238,111,32,0.1) !important; }
.sl-transform-full-outcome--after  { background:rgba(71,200,159,0.04) !important; border:1px solid rgba(71,200,159,0.1) !important; }
.sl-outcome-label { display:block !important; font-size:10px !important; text-transform:uppercase !important; letter-spacing:1.5px !important; color:#8A8A9E !important; font-weight:600 !important; margin-bottom:2px !important; }
.sl-outcome-text { font-size:17px !important; font-weight:700 !important; margin:0 !important; font-family:'Cabin',sans-serif !important; }
.sl-transform-full-divider { display:flex !important; flex-direction:column !important; align-items:center !important; justify-content:center !important; padding:0 12px !important; min-width:60px !important; }
.sl-divider-line { width:2px !important; flex:1 !important; min-height:30px !important; background:linear-gradient(180deg,transparent,rgba(71,200,159,0.2),transparent) !important; }
.sl-divider-circle { width:48px !important; height:48px !important; border-radius:50% !important; background:#FFFFFF !important; border:2px solid rgba(71,200,159,0.2) !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:12px !important; font-weight:800 !important; color:#47C89F !important; font-family:'Cabin',sans-serif !important; flex-shrink:0 !important; }
.sl-transform-full-insights { display:grid !important; grid-template-columns:repeat(4,1fr) !important; gap:16px !important; }
.sl-insight-item { display:flex !important; align-items:flex-start !important; gap:14px !important; padding:16px 18px !important; background:#FFFFFF !important; border-radius:10px !important; border:1px solid #EEF0F4 !important; transition:all 0.3s !important; }
.sl-insight-item:hover { border-color:rgba(71,200,159,0.2) !important; transform:translateY(-2px) !important; box-shadow:0 4px 16px rgba(0,0,0,0.04) !important; }
.sl-insight-number { font-size:22px !important; font-weight:800 !important; font-family:'Cabin',sans-serif !important; color:rgba(71,200,159,0.2) !important; line-height:1 !important; flex-shrink:0 !important; width:28px !important; }
.sl-insight-title { font-size:14px !important; font-weight:600 !important; color:#0E2A47 !important; margin:0 0 2px !important; font-family:'Cabin',sans-serif !important; }
.sl-insight-text { font-size:13px !important; color:#6B7C93 !important; line-height:1.5 !important; margin:0 !important; }

/* ---- STEPS ---- */
.sl-steps-grid { display:grid !important; grid-template-columns:repeat(3,1fr) !important; gap:28px !important; }
.sl-step { text-align:center !important; padding:36px 24px !important; background:#FFFFFF !important; border-radius:14px !important; border:1px solid #E8ECF2 !important; transition:transform 0.3s,box-shadow 0.3s !important; position:relative !important; }
.sl-step:hover { transform:translateY(-4px) !important; box-shadow:0 8px 28px rgba(14,42,71,0.07) !important; }
.sl-step-number { font-size:52px !important; font-weight:800 !important; font-family:'Cabin',sans-serif !important; line-height:1 !important; margin-bottom:10px !important; }
.sl-step-icon { font-size:32px !important; margin-bottom:14px !important; }
.sl-step-tag { display:inline-block !important; margin-top:16px !important; font-size:11px !important; font-weight:600 !important; text-transform:uppercase !important; letter-spacing:1px !important; padding:4px 12px !important; border-radius:12px !important; }

/* ---- JOURNEY UDEMY ---- */
.sl-journey-udemy { background:#FFFFFF !important; padding:70px 0 !important; }
.sl-udemy-header { text-align:center !important; margin-bottom:48px !important; }
.sl-udemy-title { font-size:36px !important; font-weight:700 !important; margin:0 0 8px !important; font-family:'Cabin',sans-serif !important; }
.sl-udemy-subtitle { font-size:17px !important; color:#6B7C93 !important; margin:0 !important; }
.sl-udemy-timeline { display:grid !important; grid-template-columns:repeat(4,1fr) !important; gap:20px !important; margin-bottom:36px !important; }
.sl-udemy-stage { position:relative !important; }
.sl-udemy-stage-marker { display:flex !important; flex-direction:column !important; align-items:center !important; margin-bottom:16px !important; }
.sl-udemy-stage-number { display:flex !important; align-items:center !important; justify-content:center !important; width:36px !important; height:36px !important; border-radius:50% !important; background:#FFFFFF !important; border:2px solid #E8ECF2 !important; font-size:14px !important; font-weight:700 !important; position:relative !important; z-index:2 !important; }
.sl-udemy-stage-card { background:#FFFFFF !important; border:1px solid #F0F2F4 !important; border-radius:12px !important; padding:20px 16px !important; transition:all 0.3s !important; text-align:center !important; }
.sl-udemy-stage-card:hover { border-color:#D0D8E4 !important; box-shadow:0 4px 20px rgba(0,0,0,0.05) !important; transform:translateY(-4px) !important; }
.sl-udemy-stage-icon { font-size:28px !important; margin-bottom:8px !important; }
.sl-udemy-stage-title { font-size:17px !important; font-weight:600 !important; color:#0E2A47 !important; margin:0 0 6px !important; font-family:'Cabin',sans-serif !important; }
.sl-udemy-stage-desc { font-size:13px !important; color:#6B7C93 !important; line-height:1.5 !important; margin:0 0 12px !important; }
.sl-udemy-stage-meta { display:flex !important; justify-content:center !important; gap:6px !important; margin-bottom:12px !important; flex-wrap:wrap !important; }
.sl-udemy-meta-tag { font-size:11px !important; font-weight:500 !important; color:#8A8A9E !important; background:#F5F6F8 !important; padding:2px 10px !important; border-radius:12px !important; text-transform:uppercase !important; }
.sl-udemy-stage-outcome { background:#F8FAFB !important; border-radius:8px !important; padding:10px 12px !important; font-size:12px !important; color:#6B7C93 !important; }
.sl-udemy-progress { margin:24px 0 !important; padding:0 10px !important; }
.sl-udemy-progress-bar { width:100% !important; height:6px !important; background:#E8ECF2 !important; border-radius:4px !important; overflow:hidden !important; margin-bottom:10px !important; }
.sl-udemy-progress-fill { height:100% !important; width:100% !important; background:linear-gradient(90deg,#EE6F20,#9ACA43,#EE6F20,#47C89F) !important; border-radius:4px !important; }
.sl-udemy-progress-labels { display:flex !important; justify-content:space-between !important; }
.sl-udemy-progress-label { font-size:13px !important; color:#B0B8C4 !important; font-weight:500 !important; }

/* ---- PRINCIPLES ---- */
.sl-principles-list { display:flex !important; flex-direction:column !important; }
.sl-principle-row { display:grid !important; grid-template-columns:56px 1fr !important; gap:20px !important; padding:26px 0 !important; align-items:start !important; }
.sl-principle-num { font-family:'Cabin',sans-serif !important; font-size:26px !important; font-weight:800 !important; color:#47C89F !important; line-height:1 !important; }

/* ---- FRAMEWORK ---- */
.sl-framework { background:#0E2A47 !important; padding:80px 0 !important; }
.sl-framework-header { text-align:center !important; margin-bottom:48px !important; }
.sl-framework-title { font-size:38px !important; font-weight:700 !important; color:#FFFFFF !important; margin:0 0 8px !important; font-family:'Cabin',sans-serif !important; }
.sl-framework-subtitle { font-size:18px !important; color:rgba(255,255,255,0.5) !important; margin:0 !important; font-weight:300 !important; }
.sl-framework-grid { display:grid !important; grid-template-columns:repeat(4,1fr) !important; gap:24px !important; }
.sl-framework-pillar { background:rgba(255,255,255,0.03) !important; border:1px solid rgba(255,255,255,0.06) !important; border-radius:16px !important; padding:32px 22px !important; text-align:center !important; transition:all 0.4s !important; position:relative !important; overflow:hidden !important; }
.sl-framework-pillar::before { content:'' !important; position:absolute !important; top:0 !important; left:0 !important; right:0 !important; height:3px !important; background:linear-gradient(90deg,transparent,#47C89F,transparent) !important; opacity:0 !important; transition:opacity 0.4s !important; }
.sl-framework-pillar:hover::before { opacity:1 !important; }
.sl-framework-pillar:hover { transform:translateY(-6px) !important; background:rgba(255,255,255,0.06) !important; border-color:rgba(71,200,159,0.15) !important; box-shadow:0 12px 40px rgba(0,0,0,0.15) !important; }
.sl-framework-pillar-icon { margin-bottom:16px !important; }
.sl-pillar-emoji { font-size:38px !important; }
.sl-framework-pillar-title { font-size:18px !important; font-weight:600 !important; color:#FFFFFF !important; margin:0 0 10px !important; font-family:'Cabin',sans-serif !important; }
.sl-framework-pillar-text { font-size:14px !important; line-height:1.7 !important; color:rgba(255,255,255,0.58) !important; margin:0 0 16px !important; }
.sl-framework-pillar-text em { color:rgba(255,255,255,0.8) !important; }
.sl-framework-pillar-tag { display:inline-block !important; padding:4px 14px !important; border-radius:20px !important; background:rgba(71,200,159,0.08) !important; border:1px solid rgba(71,200,159,0.08) !important; }
.sl-framework-pillar-tag span { font-size:11px !important; font-weight:500 !important; color:#47C89F !important; text-transform:uppercase !important; letter-spacing:1px !important; }
.sl-framework-callout { margin-top:40px !important; padding:20px !important; text-align:center !important; border-top:1px solid rgba(255,255,255,0.04) !important; }
.sl-framework-callout-text { font-size:18px !important; font-weight:300 !important; color:rgba(255,255,255,0.4) !important; margin:0 !important; font-style:italic !important; }

/* ---- SERVICES ---- */
.sl-services-grid { display:grid !important; grid-template-columns:repeat(3,1fr) !important; gap:24px !important; }
.sl-service-card { background:#FFFFFF !important; padding:30px 26px !important; border-radius:14px !important; border:1px solid #E8ECF2 !important; transition:transform 0.3s,box-shadow 0.3s,border-color 0.3s !important; }
.sl-service-card:hover { transform:translateY(-4px) !important; box-shadow:0 10px 30px rgba(14,42,71,0.08) !important; border-color:rgba(71,200,159,0.25) !important; }
.sl-service-icon { width:48px !important; height:48px !important; border-radius:12px !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:20px !important; margin-bottom:16px !important; }
.sl-service-icon--teal   { background:rgba(71,200,159,0.12) !important; color:#47C89F !important; }
.sl-service-icon--lime   { background:rgba(154,202,67,0.12) !important; color:#6a9a00 !important; }
.sl-service-icon--orange { background:rgba(238,111,32,0.12) !important; color:#EE6F20 !important; }

/* ---- RESULTS ---- */
.sl-results-id { background:#0A1A10 !important; background:radial-gradient(circle at 20% 20%,#0d2417 0%,#0A1A10 65%) !important; padding:80px 0 !important; }
.sl-results-id-header { text-align:center !important; margin-bottom:48px !important; }
.sl-results-id-badge { display:inline-block !important; font-size:12px !important; font-weight:600 !important; text-transform:uppercase !important; letter-spacing:3px !important; color:#9ACA43 !important; background:rgba(154,202,67,0.08) !important; padding:4px 20px !important; border-radius:20px !important; border:1px solid rgba(154,202,67,0.1) !important; margin-bottom:14px !important; }
.sl-results-id-title { font-size:38px !important; font-weight:700 !important; color:#FFFFFF !important; margin:0 0 8px !important; font-family:'Cabin',sans-serif !important; }
.sl-results-id-subtitle { font-size:18px !important; color:rgba(255,255,255,0.5) !important; margin:0 !important; font-weight:300 !important; }
.sl-results-id-grid { display:grid !important; grid-template-columns:repeat(4,1fr) !important; gap:24px !important; }
.sl-results-id-card { background:rgba(255,255,255,0.025) !important; border:1px solid rgba(255,255,255,0.06) !important; border-radius:16px !important; padding:32px 24px !important; text-align:center !important; transition:all 0.4s !important; display:flex !important; flex-direction:column !important; position:relative !important; overflow:hidden !important; }
.sl-results-id-card::before { content:'' !important; position:absolute !important; top:0 !important; left:0 !important; right:0 !important; height:3px !important; background:linear-gradient(90deg,transparent,#47C89F,transparent) !important; opacity:0 !important; transition:opacity 0.4s !important; }
.sl-results-id-card:hover::before { opacity:1 !important; }
.sl-results-id-card:hover { transform:translateY(-6px) !important; background:rgba(255,255,255,0.04) !important; box-shadow:0 12px 40px rgba(0,0,0,0.2) !important; }
.sl-results-id-card--featured { border:1px solid rgba(154,202,67,0.2) !important; background:rgba(154,202,67,0.04) !important; transform:scale(1.02) !important; }
.sl-results-id-card--featured::before { background:linear-gradient(90deg,transparent,#9ACA43,transparent) !important; opacity:1 !important; }
.sl-results-id-card--featured:hover { transform:scale(1.02) translateY(-6px) !important; }
.sl-results-id-icon { margin-bottom:16px !important; }
.sl-result-emoji { font-size:38px !important; }
.sl-results-id-card-title { font-size:18px !important; font-weight:600 !important; color:#FFFFFF !important; margin:0 0 10px !important; font-family:'Cabin',sans-serif !important; }
.sl-results-id-card-text { font-size:14px !important; line-height:1.7 !important; color:rgba(255,255,255,0.55) !important; margin:0 0 20px !important; flex:1 !important; }
.sl-results-id-stat { padding:14px 16px !important; border-radius:10px !important; background:rgba(255,255,255,0.02) !important; border:1px solid rgba(255,255,255,0.04) !important; }
.sl-results-id-stat--lime { background:rgba(154,202,67,0.04) !important; border:1px solid rgba(154,202,67,0.08) !important; }
.sl-results-id-stat .sl-stat-number { display:block !important; font-size:28px !important; font-weight:800 !important; font-family:'Cabin',sans-serif !important; line-height:1.1 !important; }
.sl-results-id-stat .sl-stat-label { display:block !important; font-size:12px !important; color:rgba(255,255,255,0.4) !important; margin-top:4px !important; line-height:1.4 !important; }
.sl-results-id-callout { margin-top:48px !important; padding:24px 20px !important; text-align:center !important; border-top:1px solid rgba(255,255,255,0.04) !important; }
.sl-results-id-callout-line { width:60px !important; height:2px !important; background:rgba(154,202,67,0.2) !important; margin:0 auto !important; }
.sl-results-id-callout-text { font-size:18px !important; font-weight:300 !important; color:rgba(255,255,255,0.5) !important; margin:16px 0 !important; font-style:italic !important; }
.sl-results-id-callout-text strong { color:#FFFFFF !important; font-weight:600 !important; font-style:normal !important; }

/* ---- WHO WE SERVE ---- */
.sl-audience-grid { display:grid !important; grid-template-columns:repeat(2,1fr) !important; gap:24px !important; }
.sl-audience-card { background:#FFFFFF !important; border:1px solid #E8ECF2 !important; border-radius:14px !important; padding:32px 28px !important; transition:all 0.3s !important; }
.sl-audience-card:hover { transform:translateY(-4px) !important; box-shadow:0 10px 30px rgba(14,42,71,0.07) !important; border-color:rgba(71,200,159,0.2) !important; }
.sl-audience-icon { font-size:32px !important; margin-bottom:16px !important; }
.sl-audience-title { font-size:20px !important; font-weight:700 !important; color:#0E2A47 !important; margin:0 0 12px !important; font-family:'Cabin',sans-serif !important; }
.sl-audience-text { font-size:15px !important; line-height:1.75 !important; color:#3D4A5C !important; margin:0 0 16px !important; }
.sl-audience-use-case { font-size:13px !important; color:#6B7C93 !important; background:#F5F7F6 !important; border-radius:8px !important; padding:10px 14px !important; border-left:3px solid #47C89F !important; }

/* ---- GAMIFICATION EXPLAINED ---- */
.sl-game-explain { background:#0A1A10 !important; background:radial-gradient(circle at 80% 20%,#112515 0%,#0A1A10 60%) !important; padding:80px 0 !important; }
.sl-game-explain-grid { display:grid !important; grid-template-columns:1fr 1fr !important; gap:32px !important; margin:40px 0 !important; }
.sl-game-myth, .sl-game-truth { background:rgba(255,255,255,0.025) !important; border:1px solid rgba(255,255,255,0.07) !important; border-radius:14px !important; padding:32px 28px !important; }
.sl-game-myth { border-color:rgba(238,111,32,0.12) !important; }
.sl-game-truth { border-color:rgba(71,200,159,0.12) !important; }
.sl-game-myth-label, .sl-game-truth-label { font-size:12px !important; font-weight:700 !important; text-transform:uppercase !important; letter-spacing:2px !important; }
.sl-game-mechanics-row { display:flex !important; flex-wrap:wrap !important; gap:8px !important; margin-top:20px !important; }
.sl-mechanic-tag { background:rgba(71,200,159,0.08) !important; border:1px solid rgba(71,200,159,0.12) !important; color:#47C89F !important; font-size:12px !important; font-weight:600 !important; padding:4px 12px !important; border-radius:20px !important; }
.sl-game-quote-row { display:grid !important; grid-template-columns:1fr 1fr !important; gap:32px !important; align-items:center !important; }
.sl-game-quote-card { background:rgba(255,255,255,0.03) !important; border:1px solid rgba(255,255,255,0.06) !important; border-radius:14px !important; padding:32px 28px !important; border-left:4px solid #9ACA43 !important; }
.sl-game-quote-text { font-size:20px !important; font-style:italic !important; color:rgba(255,255,255,0.85) !important; line-height:1.65 !important; margin:0 0 12px !important; font-family:'Cabin',Georgia,sans-serif !important; }
.sl-game-quote-attr { font-size:13px !important; color:rgba(255,255,255,0.4) !important; }
.sl-game-stats-row { display:flex !important; flex-direction:column !important; gap:20px !important; }
.sl-game-stat { display:flex !important; align-items:center !important; gap:16px !important; padding:16px 20px !important; background:rgba(255,255,255,0.025) !important; border-radius:10px !important; border:1px solid rgba(255,255,255,0.04) !important; }
.sl-game-stat-num { font-size:32px !important; font-weight:800 !important; font-family:'Cabin',sans-serif !important; flex-shrink:0 !important; min-width:72px !important; }
.sl-game-stat-label { font-size:14px !important; color:rgba(255,255,255,0.6) !important; line-height:1.5 !important; }

/* ---- CASE STUDY / STORY ---- */
.sl-story-grid { display:grid !important; grid-template-columns:1fr 1fr !important; gap:48px !important; align-items:start !important; }
.sl-story-tag { display:inline-block !important; font-size:11px !important; font-weight:700 !important; text-transform:uppercase !important; letter-spacing:2px !important; padding:4px 12px !important; border-radius:20px !important; border:1px solid !important; margin-bottom:16px !important; }
.sl-story-results { background:#FFFFFF !important; border-radius:16px !important; padding:36px 32px !important; border:1px solid #E8ECF2 !important; box-shadow:0 4px 24px rgba(14,42,71,0.06) !important; }
.sl-story-result-header { font-size:14px !important; font-weight:700 !important; text-transform:uppercase !important; letter-spacing:2px !important; color:#47C89F !important; margin-bottom:28px !important; padding-bottom:14px !important; border-bottom:2px solid rgba(71,200,159,0.15) !important; }
.sl-story-stat-list { display:flex !important; flex-direction:column !important; gap:16px !important; margin-bottom:28px !important; }
.sl-story-stat { display:grid !important; grid-template-columns:80px 30px 80px 1fr !important; align-items:center !important; gap:0 12px !important; padding:14px 16px !important; background:#F5F7F6 !important; border-radius:8px !important; }
.sl-story-stat-before { font-size:20px !important; font-weight:700 !important; color:#6B7C93 !important; font-family:'Cabin',sans-serif !important; text-decoration:line-through !important; text-align:center !important; }
.sl-story-stat-arrow { font-size:18px !important; color:#D0D8E4 !important; text-align:center !important; }
.sl-story-stat-after { font-size:24px !important; font-weight:800 !important; font-family:'Cabin',sans-serif !important; text-align:center !important; }
.sl-story-stat-label { font-size:13px !important; color:#6B7C93 !important; line-height:1.4 !important; }
.sl-story-quote { background:rgba(71,200,159,0.05) !important; border-left:4px solid #47C89F !important; border-radius:0 8px 8px 0 !important; padding:20px 20px !important; }
.sl-story-quote p { font-size:15px !important; font-style:italic !important; color:#3D4A5C !important; margin:0 0 8px !important; line-height:1.7 !important; }
.sl-story-quote span { font-size:12px !important; color:#6B7C93 !important; }

/* ---- TESTIMONIAL ---- */
.sl-testimonial-classic { padding:80px 0 !important; background:#FFFFFF !important; border-top:1px solid #F0F2F4 !important; border-bottom:1px solid #F0F2F4 !important; }
.sl-testimonial-classic-container { max-width:820px !important; margin:0 auto !important; padding:0 24px !important; }
.sl-testimonial-classic-card { position:relative !important; padding:48px 40px !important; text-align:center !important; background:#FFFFFF !important; border:1px solid #EEF0F4 !important; border-radius:12px !important; transition:all 0.3s !important; }
.sl-testimonial-classic-card:hover { border-color:#DCE0E8 !important; box-shadow:0 4px 24px rgba(0,0,0,0.02) !important; }
.sl-testimonial-classic-quote-mark { margin-bottom:8px !important; }
.sl-testimonial-classic-quote-mark span { font-size:52px !important; line-height:1 !important; color:#47C89F !important; font-family:Georgia,serif !important; opacity:0.15 !important; font-weight:700 !important; }
.sl-testimonial-classic-quote { font-size:24px !important; font-weight:300 !important; line-height:1.7 !important; color:#1A1A2E !important; margin:0 0 20px !important; font-family:'Cabin',Georgia,sans-serif !important; font-style:italic !important; }
.sl-testimonial-classic-highlight { color:#47C89F !important; font-weight:600 !important; }
.sl-testimonial-classic-divider { display:flex !important; align-items:center !important; justify-content:center !important; gap:16px !important; margin:16px auto 24px !important; max-width:120px !important; }
.sl-classic-divider-line { flex:1 !important; height:1px !important; background:linear-gradient(90deg,transparent,#47C89F,transparent) !important; opacity:0.2 !important; }
.sl-classic-divider-diamond { color:#47C89F !important; font-size:10px !important; opacity:0.3 !important; }
.sl-testimonial-classic-author { display:flex !important; align-items:center !important; justify-content:center !important; gap:18px !important; padding-top:20px !important; border-top:1px solid #EEF0F4 !important; }
.sl-testimonial-classic-avatar { width:50px !important; height:50px !important; border-radius:50% !important; background:#47C89F !important; color:#FFFFFF !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:16px !important; font-weight:700 !important; font-family:'Cabin',sans-serif !important; flex-shrink:0 !important; }
.sl-testimonial-classic-author-info { text-align:left !important; }
.sl-testimonial-classic-name { font-size:16px !important; font-weight:600 !important; color:#1A1A2E !important; margin:0 0 2px !important; font-family:'Cabin',sans-serif !important; }
.sl-testimonial-classic-title { font-size:13px !important; color:#6B7C93 !important; margin:0 0 4px !important; }
.sl-testimonial-classic-rating { display:flex !important; align-items:center !important; gap:3px !important; }
.sl-classic-star { color:#EE6F20 !important; font-size:14px !important; }
.sl-classic-rating-text { font-size:12px !important; font-weight:500 !important; color:#6B7C93 !important; margin-left:4px !important; }

/* ---- LOGOS ---- */
.sl-logos-strip { background:#F5F7F6 !important; padding:36px 0 !important; }
.sl-logos-label { text-align:center !important; font-size:12.5px !important; font-weight:600 !important; text-transform:uppercase !important; letter-spacing:1.5px !important; color:#8A97A8 !important; margin-bottom:24px !important; }
.sl-logos-row { display:flex !important; flex-wrap:wrap !important; justify-content:center !important; gap:36px 48px !important; }
.sl-logo-item { display:flex !important; align-items:center !important; gap:10px !important; color:#6B7C93 !important; font-weight:600 !important; font-size:14.5px !important; opacity:0.75 !important; transition:opacity 0.25s,color 0.25s !important; }
.sl-logo-item:hover { opacity:1 !important; color:#0E2A47 !important; }
.sl-logo-item i { font-size:18px !important; color:#47C89F !important; }

/* ---- FOUNDER ---- */
.sl-founder-grid { display:grid !important; grid-template-columns:1fr 1fr !important; gap:56px !important; align-items:start !important; }
.sl-founder-role { font-size:17px !important; font-weight:500 !important; margin:4px 0 6px !important; color:#47C89F !important; }
.sl-founder-location { font-size:14px !important; margin-bottom:18px !important; color:#6B7C93 !important; }
.sl-founder-location i { margin-right:6px !important; color:#47C89F !important; }
.sl-founder-quote { font-size:18px !important; font-style:italic !important; font-weight:300 !important; color:#47C89F !important; line-height:1.5 !important; border-left:3px solid #47C89F !important; padding-left:18px !important; margin:20px 0 !important; }
.sl-founder-signature { font-size:19px !important; font-weight:600 !important; color:#47C89F !important; margin-top:12px !important; line-height:1.5 !important; }
.sl-founder-img { width:100% !important; border-radius:10px !important; box-shadow:0 8px 28px rgba(14,42,71,0.1) !important; }
.sl-founder-stats { display:flex !important; justify-content:center !important; gap:36px !important; margin:18px 0 !important; padding:14px !important; background:rgba(71,200,159,0.06) !important; border-radius:10px !important; }
.sl-founder-stat { text-align:center !important; }
.sl-stat-num { display:block !important; font-size:24px !important; font-weight:700 !important; font-family:'Cabin',sans-serif !important; color:#47C89F !important; }
.sl-founder-stat-divider { width:1px !important; background:#D0D8E4 !important; }
.sl-founder-social { display:flex !important; justify-content:center !important; gap:10px !important; margin:14px 0 !important; }
.sl-social-link { width:42px !important; height:42px !important; border-radius:50% !important; border:1px solid #D0D8E4 !important; display:flex !important; align-items:center !important; justify-content:center !important; color:#6B7C93 !important; text-decoration:none !important; transition:all 0.25s !important; }
.sl-social-link:hover { background:#47C89F !important; border-color:#47C89F !important; color:#FFFFFF !important; }
.sl-founder-brand-tag { display:block !important; width:fit-content !important; margin:14px auto 0 !important; background:#0E2A47 !important; color:#FFFFFF !important; padding:5px 20px !important; border-radius:20px !important; font-size:13px !important; font-weight:600 !important; letter-spacing:1px !important; text-align:center !important; }

/* ---- FAQ ---- */
.sl-faq-list { display:flex !important; flex-direction:column !important; gap:12px !important; }
.sl-faq-item { border:1px solid #E8ECF2 !important; border-radius:12px !important; background:#FFFFFF !important; overflow:hidden !important; transition:border-color 0.25s,box-shadow 0.25s !important; }
.sl-faq-item:hover { border-color:rgba(71,200,159,0.3) !important; }
.sl-faq-item.sl-faq-open { border-color:rgba(71,200,159,0.35) !important; box-shadow:0 4px 18px rgba(14,42,71,0.06) !important; }
.sl-faq-question { width:100% !important; display:flex !important; align-items:center !important; justify-content:space-between !important; gap:16px !important; padding:20px 24px !important; background:transparent !important; border:none !important; cursor:pointer !important; text-align:left !important; font-size:16px !important; font-weight:600 !important; color:#0E2A47 !important; font-family:'Cabin',sans-serif !important; }
.sl-faq-icon { flex-shrink:0 !important; width:28px !important; height:28px !important; border-radius:50% !important; background:rgba(71,200,159,0.1) !important; color:#47C89F !important; display:flex !important; align-items:center !important; justify-content:center !important; font-size:12px !important; transition:transform 0.3s,background 0.3s,color 0.3s !important; }
.sl-faq-open .sl-faq-icon { transform:rotate(135deg) !important; background:#47C89F !important; color:#FFFFFF !important; }
.sl-faq-answer { max-height:0 !important; overflow:hidden !important; transition:max-height 0.35s ease,padding 0.35s ease !important; padding:0 24px !important; }
.sl-faq-open .sl-faq-answer { max-height:400px !important; padding:0 24px 22px !important; }
.sl-faq-answer p { margin-bottom:0 !important; }

/* ---- CTA GRIDS ---- */
.sl-cta-grid { display:grid !important; grid-template-columns:1fr 1fr !important; gap:50px !important; align-items:center !important; }
.sl-cta-img { width:100% !important; border-radius:10px !important; }
.sl-contact-form-wrap { background:rgba(255,255,255,0.7) !important; border-radius:12px !important; padding:20px !important; border:1px solid #E8ECF2 !important; }

/* ---- HEADER (Astra) ---- */
.ast-main-header-wrap { position:sticky !important; top:0 !important; z-index:999 !important; transition:box-shadow 0.3s ease,background 0.3s ease !important; }
.ast-main-header-wrap.sl-header-scrolled, .main-header-bar.sl-header-scrolled { box-shadow:0 4px 20px rgba(14,42,71,0.1) !important; background:#FFFFFF !important; }

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width:991px) {
    .sl-problem-cards { grid-template-columns:repeat(2,1fr) !important; }
    .sl-framework-grid { grid-template-columns:1fr 1fr !important; gap:20px !important; }
    .sl-results-id-grid { grid-template-columns:1fr 1fr !important; gap:20px !important; }
    .sl-results-id-card--featured { transform:none !important; }
    .sl-audience-grid { grid-template-columns:1fr !important; }
    .sl-game-explain-grid { grid-template-columns:1fr !important; }
    .sl-game-quote-row { grid-template-columns:1fr !important; }
    .sl-story-grid { grid-template-columns:1fr !important; gap:32px !important; }
    .sl-udemy-timeline { grid-template-columns:1fr 1fr !important; }
    .sl-transform-full-grid { grid-template-columns:1fr !important; }
    .sl-transform-full-divider { flex-direction:row !important; padding:12px 0 !important; min-width:auto !important; }
    .sl-divider-line { width:auto !important; height:2px !important; flex:1 !important; min-height:auto !important; background:linear-gradient(90deg,transparent,rgba(71,200,159,0.2),transparent) !important; }
    .sl-transform-full-col--before { border-right:none !important; border-bottom:1px solid rgba(238,111,32,0.08) !important; }
    .sl-transform-full-insights { grid-template-columns:1fr 1fr !important; }
    .sl-founder-grid { grid-template-columns:1fr !important; gap:32px !important; }
    .sl-cta-grid { grid-template-columns:1fr !important; gap:28px !important; text-align:center !important; }
    .sl-trust-grid { grid-template-columns:repeat(4,1fr) !important; row-gap:20px !important; }
}

@media (max-width:768px) {
    .sl-section     { padding:60px 0 !important; }
    .sl-hero-slide  { height:380px !important; }
    .sl-hero-content { padding:0 28px !important; }
    .sl-hero-headline { font-size:30px !important; }
    .sl-hero-subtext { font-size:16px !important; }
    .sl-problem-cards { grid-template-columns:1fr !important; }
    .sl-steps-grid  { grid-template-columns:1fr !important; }
    .sl-services-grid { grid-template-columns:1fr !important; }
    .sl-results-id-grid { grid-template-columns:1fr !important; gap:16px !important; }
    .sl-udemy-timeline { grid-template-columns:1fr !important; }
    .sl-transform-full-col { padding:28px 20px !important; }
    .sl-transform-full-insights { grid-template-columns:1fr !important; }
    .sl-trust-grid  { grid-template-columns:repeat(2,1fr) !important; row-gap:22px !important; }
    .sl-trust-divider { display:none !important; }
    .sl-principle-row { grid-template-columns:40px 1fr !important; gap:14px !important; }
    .sl-framework-grid { grid-template-columns:1fr !important; }
    .sl-testimonial-classic-card { padding:32px 22px !important; }
    .sl-testimonial-classic-quote { font-size:18px !important; }
    .sl-story-stat { grid-template-columns:60px 24px 70px 1fr !important; }
}

@media (max-width:480px) {
    .sl-section     { padding:44px 0 !important; }
    .sl-hero-slide  { height:280px !important; }
    .sl-hero-content { padding:0 18px !important; }
    .sl-hero-headline { font-size:24px !important; }
    .sl-hero-actions { flex-direction:column !important; }
    .sl-btn         { width:100% !important; text-align:center !important; }
    .sl-container   { padding:0 16px !important; }
    .sl-container--narrow { padding:0 16px !important; }
    .sl-container-full { padding:0 12px !important; }
    .sl-founder-stats { flex-direction:column !important; gap:10px !important; }
    .sl-founder-stat-divider { display:none !important; }
    .sl-logos-row   { flex-direction:column !important; gap:16px !important; }
    .sl-principle-row { grid-template-columns:1fr !important; gap:8px !important; }
    .sl-game-stats-row { gap:12px !important; }
    .sl-game-stat-num { font-size:26px !important; min-width:56px !important; }
    .sl-story-stat { grid-template-columns:1fr !important; gap:4px !important; text-align:center !important; }
    .sl-story-stat-before, .sl-story-stat-arrow { display:none !important; }
    .sl-audience-card { padding:24px 20px !important; }
}
</style>

<!-- ============================================ -->
<!-- FLOATING CHAT BUTTON — Like Udemy -->
<!-- ============================================ -->
<div class="sf-floating-chat" id="sfFloatingChat">
    <button class="sf-chat-toggle" id="sfChatToggle" aria-label="Open Chat">
        <span class="sf-chat-icon">
            <i class="fas fa-comment-dots"></i>
        </span>
        <span class="sf-chat-badge" id="sfChatBadge">1</span>
    </button>

    <!-- Chat Window (Hidden by default) -->
    <div class="sf-chat-window" id="sfChatWindow">
        <div class="sf-chat-window-header">
            <div class="sf-chat-window-header-info">
                <span class="sf-chat-avatar-sm">🤖</span>
                <div>
                    <h4 class="sf-chat-window-title">AI Assistant</h4>
                    <p class="sf-chat-window-status">Online · Ready to help</p>
                </div>
            </div>
            <button class="sf-chat-close" id="sfChatClose">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sf-chat-window-messages" id="sfChatMessages">
            <div class="sf-chat-welcome-msg">
                <div class="sf-chat-msg sf-chat-msg--bot">
                    <p>👋 Hi there! I'm the Sofel Labs AI Assistant.</p>
                    <p>I can help you with questions about:</p>
                    <ul>
                        <li>Instructional Design</li>
                        <li>Gamification</li>
                        <li>Learning Strategy</li>
                        <li>Compliance Training</li>
                    </ul>
                    <p style="margin-top:8px;">What would you like to know?</p>
                </div>
            </div>
        </div>

        <div class="sf-chat-window-input">
            <form id="sfChatForm" class="sf-chat-input-form">
                <input type="text" id="sfChatInput" placeholder="Type your message..." autocomplete="off">
                <button type="submit" id="sfChatSend">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </form>
            <div class="sf-chat-typing-indicator" id="sfChatTyping" style="display:none;">
                <span class="sf-typing-dot"></span>
                <span class="sf-typing-dot"></span>
                <span class="sf-typing-dot"></span>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- FLOATING CHAT STYLES -->
<!-- ============================================ -->
<style>
    /* ============================================
       FLOATING CHAT — Like Udemy Style
       ============================================ */

    .sf-floating-chat {
        position: fixed !important;
        bottom: 28px !important;
        right: 28px !important;
        z-index: 99999 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
    }

    /* ---- Chat Toggle Button ---- */
    .sf-chat-toggle {
        width: 60px !important;
        height: 60px !important;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #47C89F, #35aa85) !important;
        border: none !important;
        color: #FFFFFF !important;
        font-size: 28px !important;
        cursor: pointer !important;
        box-shadow: 0 4px 20px rgba(71, 200, 159, 0.4) !important;
        transition: all 0.3s ease !important;
        position: relative !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .sf-chat-toggle:hover {
        transform: scale(1.08) !important;
        box-shadow: 0 8px 32px rgba(71, 200, 159, 0.5) !important;
    }

    .sf-chat-badge {
        position: absolute !important;
        top: -4px !important;
        right: -4px !important;
        background: #EE6F20 !important;
        color: #FFFFFF !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        width: 22px !important;
        height: 22px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-family: 'Cabin', sans-serif !important;
        animation: sfPulse 2s ease-in-out infinite !important;
        border: 2px solid #FFFFFF !important;
    }

    .sf-chat-badge.hidden {
        display: none !important;
    }

    @keyframes sfPulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* ---- Chat Window ---- */
    .sf-chat-window {
        position: absolute !important;
        bottom: 76px !important;
        right: 0 !important;
        width: 380px !important;
        max-width: calc(100vw - 40px) !important;
        background: #FFFFFF !important;
        border-radius: 16px !important;
        box-shadow: 0 8px 60px rgba(0, 0, 0, 0.12) !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        display: none !important;
        flex-direction: column !important;
        overflow: hidden !important;
        transform: translateY(20px) scale(0.95) !important;
        opacity: 0 !important;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
        transform-origin: bottom right !important;
    }

    .sf-chat-window.open {
        display: flex !important;
        transform: translateY(0) scale(1) !important;
        opacity: 1 !important;
    }

    /* ---- Chat Header ---- */
    .sf-chat-window-header {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 16px 20px !important;
        background: linear-gradient(135deg, #0E2A47, #1a3a5f) !important;
        color: #FFFFFF !important;
        flex-shrink: 0 !important;
    }

    .sf-chat-window-header-info {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
    }

    .sf-chat-avatar-sm {
        width: 36px !important;
        height: 36px !important;
        border-radius: 50% !important;
        background: rgba(255, 255, 255, 0.08) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        flex-shrink: 0 !important;
    }

    .sf-chat-window-title {
        font-size: 15px !important;
        font-weight: 600 !important;
        margin: 0 !important;
        font-family: 'Cabin', sans-serif !important;
    }

    .sf-chat-window-status {
        font-size: 11px !important;
        color: rgba(255, 255, 255, 0.6) !important;
        margin: 0 !important;
    }

    .sf-chat-close {
        background: none !important;
        border: none !important;
        color: rgba(255, 255, 255, 0.5) !important;
        font-size: 18px !important;
        cursor: pointer !important;
        transition: color 0.3s !important;
        padding: 4px 8px !important;
    }

    .sf-chat-close:hover {
        color: #FFFFFF !important;
    }

    /* ---- Chat Messages ---- */
    .sf-chat-window-messages {
        flex: 1 !important;
        padding: 16px 18px !important;
        overflow-y: auto !important;
        max-height: 350px !important;
        min-height: 200px !important;
        background: #F8FAFB !important;
        display: flex !important;
        flex-direction: column !important;
        gap: 8px !important;
    }

    .sf-chat-window-messages::-webkit-scrollbar {
        width: 4px !important;
    }
    .sf-chat-window-messages::-webkit-scrollbar-thumb {
        background: #D0D8E4 !important;
        border-radius: 10px !important;
    }

    .sf-chat-msg {
        max-width: 85% !important;
        padding: 10px 14px !important;
        border-radius: 12px !important;
        font-size: 13px !important;
        line-height: 1.6 !important;
        animation: sfMsgSlide 0.3s ease !important;
    }

    @keyframes sfMsgSlide {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .sf-chat-msg--bot {
        background: #FFFFFF !important;
        color: #1A1A2E !important;
        border-radius: 0 12px 12px 12px !important;
        align-self: flex-start !important;
        border: 1px solid rgba(0, 0, 0, 0.03) !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02) !important;
    }

    .sf-chat-msg--bot p {
        margin: 0 0 4px 0 !important;
    }
    .sf-chat-msg--bot p:last-child {
        margin-bottom: 0 !important;
    }
    .sf-chat-msg--bot ul {
        margin: 4px 0 !important;
        padding-left: 18px !important;
    }
    .sf-chat-msg--bot li {
        margin-bottom: 2px !important;
    }

    .sf-chat-msg--user {
        background: #47C89F !important;
        color: #FFFFFF !important;
        border-radius: 12px 0 12px 12px !important;
        align-self: flex-end !important;
    }

    .sf-chat-welcome-msg {
        display: flex !important;
        flex-direction: column !important;
        gap: 4px !important;
    }

    /* ---- Chat Input ---- */
    .sf-chat-window-input {
        padding: 12px 16px !important;
        border-top: 1px solid #EEF0F4 !important;
        background: #FFFFFF !important;
        flex-shrink: 0 !important;
    }

    .sf-chat-input-form {
        display: flex !important;
        gap: 8px !important;
        align-items: center !important;
    }

    .sf-chat-input-form input {
        flex: 1 !important;
        padding: 10px 14px !important;
        border: 1px solid #E8ECF2 !important;
        border-radius: 8px !important;
        font-size: 14px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        outline: none !important;
        transition: border-color 0.3s !important;
        color: #0E2A47 !important;
        background: #F8FAFB !important;
    }

    .sf-chat-input-form input:focus {
        border-color: #47C89F !important;
        box-shadow: 0 0 0 3px rgba(71, 200, 159, 0.04) !important;
    }

    .sf-chat-input-form input::placeholder {
        color: #B0B8C4 !important;
    }

    .sf-chat-input-form button {
        width: 40px !important;
        height: 40px !important;
        border-radius: 50% !important;
        background: #47C89F !important;
        color: #FFFFFF !important;
        border: none !important;
        cursor: pointer !important;
        transition: all 0.3s !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 16px !important;
        flex-shrink: 0 !important;
    }

    .sf-chat-input-form button:hover {
        background: #35aa85 !important;
        transform: scale(1.05) !important;
    }

    .sf-chat-input-form button:disabled {
        opacity: 0.5 !important;
        cursor: not-allowed !important;
        transform: none !important;
    }

    .sf-chat-typing-indicator {
        display: flex !important;
        align-items: center !important;
        gap: 6px !important;
        padding: 6px 0 2px 0 !important;
    }

    .sf-chat-typing-indicator .sf-typing-dot {
        width: 8px !important;
        height: 8px !important;
        border-radius: 50% !important;
        background: #47C89F !important;
        display: inline-block !important;
        animation: sfTypingBounce 1.4s ease-in-out infinite !important;
    }

    .sf-chat-typing-indicator .sf-typing-dot:nth-child(1) { animation-delay: 0s !important; }
    .sf-chat-typing-indicator .sf-typing-dot:nth-child(2) { animation-delay: 0.2s !important; }
    .sf-chat-typing-indicator .sf-typing-dot:nth-child(3) { animation-delay: 0.4s !important; }

    @keyframes sfTypingBounce {
        0%, 60%, 100% { transform: translateY(0); opacity: 0.3; }
        30% { transform: translateY(-6px); opacity: 0.8; }
    }

    /* ---- Responsive ---- */
    @media (max-width: 480px) {
        .sf-floating-chat {
            bottom: 16px !important;
            right: 16px !important;
        }

        .sf-chat-toggle {
            width: 52px !important;
            height: 52px !important;
            font-size: 24px !important;
        }

        .sf-chat-window {
            width: calc(100vw - 32px) !important;
            max-width: calc(100vw - 32px) !important;
            bottom: 66px !important;
            right: 0 !important;
            border-radius: 12px !important;
        }

        .sf-chat-window-messages {
            max-height: 280px !important;
            min-height: 160px !important;
        }

        .sf-chat-window-header {
            padding: 12px 16px !important;
        }

        .sf-chat-window-title {
            font-size: 14px !important;
        }

        .sf-chat-msg {
            font-size: 13px !important;
            padding: 8px 12px !important;
        }
    }

    @media (max-width: 360px) {
        .sf-chat-toggle {
            width: 48px !important;
            height: 48px !important;
            font-size: 20px !important;
        }

        .sf-chat-window {
            width: calc(100vw - 24px) !important;
            max-width: calc(100vw - 24px) !important;
            bottom: 60px !important;
        }

        .sf-chat-window-messages {
            max-height: 220px !important;
            min-height: 120px !important;
            padding: 12px 14px !important;
        }

        .sf-chat-window-input {
            padding: 8px 12px !important;
        }

        .sf-chat-input-form input {
            font-size: 13px !important;
            padding: 8px 12px !important;
        }

        .sf-chat-input-form button {
            width: 36px !important;
            height: 36px !important;
            font-size: 14px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- FLOATING CHAT SCRIPT -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('sfChatToggle');
    const chatWindow = document.getElementById('sfChatWindow');
    const chatClose = document.getElementById('sfChatClose');
    const chatForm = document.getElementById('sfChatForm');
    const chatInput = document.getElementById('sfChatInput');
    const chatMessages = document.getElementById('sfChatMessages');
    const chatTyping = document.getElementById('sfChatTyping');
    const chatSend = document.getElementById('sfChatSend');
    const chatBadge = document.getElementById('sfChatBadge');

    let isOpen = false;
    let isProcessing = false;
    let contactId = null;
    let sessionId = document.querySelector('meta[name="session-id"]')?.content || '';

    // Toggle chat window
    function toggleChat() {
        isOpen = !isOpen;
        chatWindow.classList.toggle('open', isOpen);
        if (isOpen) {
            chatInput.focus();
            chatBadge.classList.add('hidden');
        }
    }

    chatToggle.addEventListener('click', toggleChat);
    chatClose.addEventListener('click', toggleChat);

    // Close on outside click
    document.addEventListener('click', function(e) {
        if (isOpen && !e.target.closest('.sf-floating-chat')) {
            toggleChat();
        }
    });

    // Send message
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const message = chatInput.value.trim();
        if (!message || isProcessing) return;
        sendMessage(message);
    });

    // Enter key support
    chatInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            chatForm.dispatchEvent(new Event('submit'));
        }
    });

    function sendMessage(message) {
        // Add user message
        addMessage(message, 'user');
        chatInput.value = '';
        isProcessing = true;
        chatSend.disabled = true;
        chatTyping.style.display = 'flex';

        const token = document.querySelector('meta[name="csrf-token"]')?.content || '';

        const payload = {
            message: message,
            contact_id: contactId,
            session_id: sessionId
        };

        fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify(payload)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status} ${response.statusText}`);
            }
            return response.json();
        })
        .then(data => {
            chatTyping.style.display = 'none';
            isProcessing = false;
            chatSend.disabled = false;

            if (data.success) {
                if (!contactId && data.contact_id) {
                    contactId = data.contact_id;
                }
                addMessage(data.message, 'bot');
            } else {
                const errorMsg = data.error || data.message || 'Unknown error occurred';
                addMessage('Sorry, I encountered an error: ' + errorMsg, 'bot');
                console.error('Chat error details:', data);
            }
            chatInput.focus();
        })
        .catch(error => {
            chatTyping.style.display = 'none';
            isProcessing = false;
            chatSend.disabled = false;
            
            addMessage('Sorry, I encountered an error: ' + error.message, 'bot');
            console.error('Full fetch error:', error);
            chatInput.focus();
        });
    }

    function addMessage(text, sender) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `sf-chat-msg sf-chat-msg--${sender}`;

        if (sender === 'user') {
            msgDiv.textContent = text;
        } else {
            // Bot messages can have multiple paragraphs
            const lines = text.split('\n');
            lines.forEach(line => {
                if (line.trim()) {
                    const p = document.createElement('p');
                    p.textContent = line.trim();
                    msgDiv.appendChild(p);
                }
            });
            if (msgDiv.children.length === 0) {
                msgDiv.textContent = text;
            }
        }

        // Remove welcome message if it exists
        const welcomeMsg = chatMessages.querySelector('.sf-chat-welcome-msg');
        if (welcomeMsg && sender !== 'bot') {
            welcomeMsg.remove();
        }

        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
</script>
@endsection