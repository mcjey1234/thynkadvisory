<!-- ============================================ -->
<!-- PROCESS — Advanced Tree Visualization -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', 'Our Process - Sofel Labs')
@section('body_class', 'page-process')

@section('content')

<!-- ============================================ -->
<!-- PROCESS HERO BANNER -->
<!-- ============================================ -->
<section class="sf-process-hero" style="background-image: url('{{ asset('wp-content/uploads/images/process-bg.jpg') }}');">
    <div class="sf-process-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-process-hero-content">
            <span class="sf-process-hero-badge">Our Process</span>
            <h1 class="sf-process-hero-title">How We <span class="sf-text-teal">Work</span></h1>
            <p class="sf-process-hero-subtitle">A proven methodology designed to deliver exceptional results</p>
            <div class="sf-process-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- PROCESS TREE — Advanced Visualization -->
<!-- ============================================ -->
<section class="sf-process-tree">
    <div class="sf-container">
        <div class="sf-process-header">
            <span class="sf-process-section-badge">Our Methodology</span>
            <h2 class="sf-process-section-title">A Proven <span class="sf-text-teal">Process</span> for Success</h2>
            <div class="sf-process-header-line"></div>
            <p class="sf-process-section-subtitle">We follow a structured approach to ensure quality and consistency in everything we do</p>
        </div>

        @if(isset($processes) && $processes->count() > 0)
        <div class="sf-tree-container">
            <!-- Tree Trunk with Gradient -->
            <div class="sf-tree-trunk">
                <div class="sf-trunk-glow"></div>
            </div>

            @foreach($processes as $index => $process)
            <div class="sf-tree-branch" data-step="{{ $index }}">
                <!-- Branch Connection -->
                <div class="sf-branch-connection">
                    <div class="sf-branch-line"></div>
                    <div class="sf-branch-dot"></div>
                </div>

                <!-- Node Card -->
                <div class="sf-tree-node">
                    <div class="sf-node-card">
                        <!-- Image Section -->
                        <div class="sf-node-image">
                            @if($process->image)
                                <img src="{{ $process->image_url }}" alt="{{ $process->title }}" loading="lazy">
                                <div class="sf-image-overlay"></div>
                            @else
                                <div class="sf-node-icon-fallback">
                                    <i class="fas fa-arrow-right"></i>
                                </div>
                            @endif
                            <div class="sf-node-badge">
                                <span>{{ $process->step_number }}</span>
                            </div>
                        </div>

                        <!-- Content Section -->
                        <div class="sf-node-content">
                            <div class="sf-node-header">
                                <h3 class="sf-node-title">{{ $process->title }}</h3>
                                <div class="sf-node-divider"></div>
                            </div>
                            <div class="sf-node-description">
                                {!! nl2br(e($process->description)) !!}
                            </div>
                            <div class="sf-node-footer">
                                <span class="sf-node-step">Step {{ $loop->iteration }}</span>
                                <span class="sf-node-progress">{{ $index + 1 }}/{{ $processes->count() }}</span>
                            </div>
                        </div>

                        <!-- Decorative Corner Accent -->
                        <div class="sf-node-accent"></div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Tree Root -->
            <div class="sf-tree-root">
                <div class="sf-root-line"></div>
                <div class="sf-root-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#47C89F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                        <path d="M2 17l10 5 10-5"/>
                        <path d="M2 12l10 5 10-5"/>
                    </svg>
                </div>
                <span class="sf-root-text">Process Foundation</span>
            </div>
        </div>

        <!-- Process Flow Summary -->
        <div class="sf-process-flow">
            <div class="sf-flow-container">
                @foreach($processes as $index => $process)
                <div class="sf-flow-item">
                    <span class="sf-flow-number">{{ $index + 1 }}</span>
                    <span class="sf-flow-title">{{ $process->title }}</span>
                    @if(!$loop->last)
                    <span class="sf-flow-arrow">→</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="sf-process-empty">
            <p>No process steps available at the moment. Please check back later.</p>
        </div>
        @endif
    </div>
</section>

<!-- ============================================ -->
<!-- PROCESS CTA -->
<!-- ============================================ -->
<section class="sf-process-cta">
    <div class="sf-container">
        <div class="sf-process-cta-content">
            <h2 class="sf-process-cta-title">Ready to Start <span class="sf-text-teal">Your Journey</span>?</h2>
            <p class="sf-process-cta-text">Let's work together to bring your vision to life.</p>
            <a href="{{ route('contact') }}" class="sf-process-cta-btn">
                Get Started
                <span class="sf-cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Advanced Tree Visualization -->
<!-- ============================================ -->
<style>
    /* ============================================
       PROCESS TREE — Advanced Design
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
    .sf-process-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 450px !important;
        display: flex !important;
        align-items: center !important;
    }

    .sf-process-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }

    .sf-process-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }

    .sf-process-hero-badge {
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

    .sf-process-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
        animation: sfFadeInUp 0.8s ease forwards !important;
    }

    .sf-process-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
        animation: sfFadeInUp 1s ease forwards !important;
    }

    .sf-process-hero-line {
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
       PROCESS TREE SECTION
       ============================================ */
    .sf-process-tree {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
        position: relative !important;
    }

    .sf-process-header {
        text-align: center !important;
        margin-bottom: 48px !important;
    }

    .sf-process-section-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #47C89F !important;
        margin-bottom: 12px !important;
    }

    .sf-process-section-title {
        font-size: 38px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-process-header-line {
        width: 40px !important;
        height: 2px !important;
        background: linear-gradient(90deg, #47C89F, #9ACA43) !important;
        border-radius: 4px !important;
        margin: 0 auto 12px !important;
    }

    .sf-process-section-subtitle {
        font-size: 18px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-weight: 300 !important;
    }

    /* ============================================
       TREE CONTAINER
       ============================================ */
    .sf-tree-container {
        position: relative !important;
        padding: 20px 0 40px 0 !important;
        max-width: 900px !important;
        margin: 0 auto !important;
    }

    /* ---- Tree Trunk ---- */
    .sf-tree-trunk {
        position: absolute !important;
        top: 0 !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        width: 4px !important;
        height: 100% !important;
        background: linear-gradient(180deg, rgba(71, 200, 159, 0.05), rgba(71, 200, 159, 0.12), rgba(71, 200, 159, 0.05)) !important;
        border-radius: 4px !important;
        z-index: 0 !important;
        animation: sfTrunkGrow 2s ease forwards !important;
    }

    .sf-trunk-glow {
        position: absolute !important;
        top: 0 !important;
        left: -10px !important;
        width: 24px !important;
        height: 100% !important;
        background: radial-gradient(ellipse, rgba(71, 200, 159, 0.03), transparent) !important;
        border-radius: 50% !important;
    }

    @keyframes sfTrunkGrow {
        from { transform: translateX(-50%) scaleY(0); }
        to { transform: translateX(-50%) scaleY(1); }
    }

    /* ============================================
       TREE BRANCH
       ============================================ */
    .sf-tree-branch {
        position: relative !important;
        margin-bottom: 32px !important;
        z-index: 1 !important;
        opacity: 0;
        animation: sfBranchFall 0.8s ease forwards !important;
    }

    .sf-tree-branch:nth-child(1) { animation-delay: 0.2s; }
    .sf-tree-branch:nth-child(2) { animation-delay: 0.4s; }
    .sf-tree-branch:nth-child(3) { animation-delay: 0.6s; }
    .sf-tree-branch:nth-child(4) { animation-delay: 0.8s; }
    .sf-tree-branch:nth-child(5) { animation-delay: 1.0s; }
    .sf-tree-branch:nth-child(6) { animation-delay: 1.2s; }

    @keyframes sfBranchFall {
        0% {
            opacity: 0;
            transform: translateY(-50px) scale(0.95);
        }
        70% {
            opacity: 1;
            transform: translateY(6px) scale(1.01);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* ---- Branch Connection ---- */
    .sf-branch-connection {
        position: absolute !important;
        top: 50% !important;
        z-index: 0 !important;
        display: flex !important;
        align-items: center !important;
        animation: sfConnectionGrow 0.6s ease forwards !important;
        opacity: 0;
    }

    .sf-tree-branch:nth-child(odd) .sf-branch-connection {
        left: 50% !important;
        transform: translateY(-50%) translateX(0) !important;
        flex-direction: row-reverse !important;
    }

    .sf-tree-branch:nth-child(even) .sf-branch-connection {
        right: 50% !important;
        transform: translateY(-50%) translateX(0) !important;
        flex-direction: row !important;
    }

    @keyframes sfConnectionGrow {
        from { opacity: 0; transform: scaleX(0); }
        to { opacity: 1; transform: scaleX(1); }
    }

    .sf-branch-line {
        width: 50px !important;
        height: 2px !important;
        background: linear-gradient(90deg, rgba(71, 200, 159, 0.08), rgba(71, 200, 159, 0.15)) !important;
        flex-shrink: 0 !important;
    }

    .sf-tree-branch:nth-child(odd) .sf-branch-line {
        background: linear-gradient(90deg, rgba(71, 200, 159, 0.15), rgba(71, 200, 159, 0.08)) !important;
    }

    .sf-branch-dot {
        width: 8px !important;
        height: 8px !important;
        border-radius: 50% !important;
        background: #47C89F !important;
        flex-shrink: 0 !important;
        box-shadow: 0 0 20px rgba(71, 200, 159, 0.08) !important;
        animation: sfDotPulse 2s ease-in-out infinite !important;
    }

    @keyframes sfDotPulse {
        0%, 100% { transform: scale(1); opacity: 0.4; }
        50% { transform: scale(1.3); opacity: 0.8; }
    }

    /* ============================================
       TREE NODE
       ============================================ */
    .sf-tree-node {
        position: relative !important;
        max-width: 420px !important;
        margin: 0 !important;
        z-index: 1 !important;
    }

    .sf-tree-branch:nth-child(odd) .sf-tree-node {
        margin-left: auto !important;
        margin-right: 0 !important;
        padding-left: 40px !important;
    }

    .sf-tree-branch:nth-child(even) .sf-tree-node {
        margin-left: 0 !important;
        margin-right: auto !important;
        padding-right: 40px !important;
    }

    /* ---- Node Card ---- */
    .sf-node-card {
        display: flex !important;
        gap: 20px !important;
        background: #FFFFFF !important;
        border-radius: 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.02) !important;
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
        overflow: hidden !important;
        position: relative !important;
    }

    .sf-node-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 16px 60px rgba(0, 0, 0, 0.06) !important;
        border-color: rgba(71, 200, 159, 0.06) !important;
    }

    /* ---- Node Image ---- */
    .sf-node-image {
        flex: 0 0 120px !important;
        height: 120px !important;
        position: relative !important;
        overflow: hidden !important;
        background: linear-gradient(135deg, rgba(71, 200, 159, 0.04), rgba(154, 202, 67, 0.04)) !important;
    }

    .sf-node-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        transition: transform 0.6s ease !important;
    }

    .sf-node-card:hover .sf-node-image img {
        transform: scale(1.05) !important;
    }

    .sf-image-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(71, 200, 159, 0.02), transparent) !important;
    }

    .sf-node-icon-fallback {
        width: 100% !important;
        height: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: #47C89F !important;
        font-size: 28px !important;
        background: rgba(71, 200, 159, 0.02) !important;
    }

    .sf-node-icon-fallback i {
        font-size: 28px !important;
    }

    /* ---- Node Badge ---- */
    .sf-node-badge {
        position: absolute !important;
        top: 8px !important;
        left: 8px !important;
        background: linear-gradient(135deg, #47C89F, #3AAF8A) !important;
        color: #FFFFFF !important;
        width: 32px !important;
        height: 32px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 12px !important;
        font-weight: 700 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        box-shadow: 0 2px 12px rgba(71, 200, 159, 0.15) !important;
        transition: all 0.3s ease !important;
    }

    .sf-node-card:hover .sf-node-badge {
        transform: scale(1.05) !important;
    }

    /* ---- Node Content ---- */
    .sf-node-content {
        flex: 1 !important;
        padding: 16px 20px 16px 0 !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: center !important;
    }

    .sf-tree-branch:nth-child(odd) .sf-node-content {
        padding: 16px 0 16px 0 !important;
    }

    .sf-tree-branch:nth-child(even) .sf-node-content {
        padding: 16px 20px 16px 0 !important;
    }

    .sf-node-header {
        margin-bottom: 6px !important;
    }

    .sf-node-title {
        font-size: 18px !important;
        font-weight: 600 !important;
        color: #0E2A47 !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        transition: color 0.3s ease !important;
    }

    .sf-node-card:hover .sf-node-title {
        color: #47C89F !important;
    }

    .sf-node-divider {
        width: 30px !important;
        height: 2px !important;
        background: linear-gradient(90deg, #47C89F, #9ACA43) !important;
        border-radius: 4px !important;
        transition: width 0.3s ease !important;
    }

    .sf-node-card:hover .sf-node-divider {
        width: 40px !important;
    }

    .sf-node-description {
        font-size: 14px !important;
        line-height: 1.6 !important;
        color: #4A5A6E !important;
        margin: 0 !important;
        flex: 1 !important;
    }

    .sf-node-description p {
        margin-bottom: 6px !important;
    }

    .sf-node-description p:last-child {
        margin-bottom: 0 !important;
    }

    .sf-node-footer {
        margin-top: 10px !important;
        padding-top: 8px !important;
        border-top: 1px solid rgba(0, 0, 0, 0.02) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        font-size: 12px !important;
        color: #6B7C93 !important;
    }

    .sf-node-step {
        font-weight: 500 !important;
        opacity: 0.5 !important;
    }

    .sf-node-progress {
        font-weight: 600 !important;
        color: #47C89F !important;
        opacity: 0.4 !important;
    }

    /* ---- Node Accent ---- */
    .sf-node-accent {
        position: absolute !important;
        top: 0 !important;
        width: 4px !important;
        height: 100% !important;
        background: linear-gradient(180deg, #47C89F, #9ACA43) !important;
        opacity: 0.08 !important;
        transition: all 0.5s ease !important;
    }

    .sf-tree-branch:nth-child(odd) .sf-node-accent {
        left: 0 !important;
        border-radius: 16px 0 0 16px !important;
    }

    .sf-tree-branch:nth-child(even) .sf-node-accent {
        right: 0 !important;
        border-radius: 0 16px 16px 0 !important;
    }

    .sf-node-card:hover .sf-node-accent {
        opacity: 0.2 !important;
        width: 6px !important;
    }

    /* ============================================
       TREE ROOT
       ============================================ */
    .sf-tree-root {
        text-align: center !important;
        padding: 16px 0 0 0 !important;
        position: relative !important;
        z-index: 1 !important;
        opacity: 0;
        animation: sfRootAppear 0.8s ease 2s forwards !important;
    }

    @keyframes sfRootAppear {
        from { opacity: 0; transform: translateY(10px) scale(0.95); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    .sf-root-line {
        width: 40px !important;
        height: 2px !important;
        background: linear-gradient(90deg, transparent, rgba(71, 200, 159, 0.1), transparent) !important;
        margin: 0 auto 10px !important;
    }

    .sf-root-icon {
        display: inline-block !important;
        margin-bottom: 4px !important;
        animation: sfRootPulse 3s ease-in-out infinite !important;
    }

    .sf-root-icon svg {
        width: 32px !important;
        height: 32px !important;
    }

    @keyframes sfRootPulse {
        0%, 100% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.08); opacity: 0.8; }
    }

    .sf-root-text {
        display: block !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        color: #6B7C93 !important;
        letter-spacing: 2px !important;
        text-transform: uppercase !important;
        opacity: 0.4 !important;
    }

    /* ============================================
       PROCESS FLOW
       ============================================ */
    .sf-process-flow {
        padding: 28px 24px !important;
        background: #F8FAFB !important;
        border-radius: 12px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
        margin-top: 32px !important;
        opacity: 0;
        animation: sfFlowAppear 0.8s ease 2.5s forwards !important;
    }

    @keyframes sfFlowAppear {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .sf-flow-container {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 8px !important;
        flex-wrap: wrap !important;
    }

    .sf-flow-item {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 6px 14px !important;
        background: #FFFFFF !important;
        border-radius: 8px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
        font-size: 13px !important;
        transition: all 0.3s ease !important;
    }

    .sf-flow-item:hover {
        border-color: rgba(71, 200, 159, 0.08) !important;
        transform: translateY(-2px) !important;
    }

    .sf-flow-number {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 24px !important;
        height: 24px !important;
        border-radius: 50% !important;
        background: #47C89F !important;
        color: #FFFFFF !important;
        font-size: 11px !important;
        font-weight: 700 !important;
    }

    .sf-flow-title {
        color: #0E2A47 !important;
        font-weight: 500 !important;
    }

    .sf-flow-arrow {
        color: #47C89F !important;
        font-size: 14px !important;
        opacity: 0.15 !important;
    }

    /* ---- Empty State ---- */
    .sf-process-empty {
        text-align: center !important;
        padding: 60px 0 !important;
        color: #6B7C93 !important;
        font-size: 18px !important;
    }

    /* ============================================
       CTA SECTION
       ============================================ */
    .sf-process-cta {
        padding: 80px 0 !important;
        background: linear-gradient(135deg, #0A0610 0%, #1A0A18 100%) !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
        position: relative !important;
        overflow: hidden !important;
    }

    .sf-process-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
        position: relative !important;
        z-index: 1 !important;
    }

    .sf-process-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-process-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }

    .sf-process-cta-btn {
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

    .sf-process-cta-btn:hover {
        background: #3AAF8A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(71, 200, 159, 0.12) !important;
    }

    .sf-cta-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }

    .sf-process-cta-btn:hover .sf-cta-arrow {
        transform: translateX(4px) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sf-tree-trunk {
            left: 30px !important;
            transform: none !important;
        }

        .sf-branch-connection {
            display: none !important;
        }

        .sf-tree-branch:nth-child(odd) .sf-tree-node,
        .sf-tree-branch:nth-child(even) .sf-tree-node {
            margin-left: 40px !important;
            margin-right: 0 !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
            max-width: calc(100% - 40px) !important;
        }

        .sf-node-card {
            flex-direction: column !important;
        }

        .sf-node-image {
            flex: none !important;
            height: 160px !important;
            width: 100% !important;
        }

        .sf-node-content {
            padding: 16px 18px !important;
        }

        .sf-tree-branch:nth-child(odd) .sf-node-content,
        .sf-tree-branch:nth-child(even) .sf-node-content {
            padding: 16px 18px !important;
        }

        .sf-node-accent {
            display: none !important;
        }

        .sf-process-hero-title {
            font-size: 40px !important;
        }

        .sf-process-section-title {
            font-size: 32px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-process-hero {
            padding: 80px 0 !important;
            min-height: 350px !important;
        }

        .sf-process-hero-title {
            font-size: 32px !important;
        }

        .sf-process-hero-subtitle {
            font-size: 17px !important;
        }

        .sf-process-tree {
            padding: 60px 0 !important;
        }

        .sf-tree-trunk {
            left: 20px !important;
        }

        .sf-tree-branch:nth-child(odd) .sf-tree-node,
        .sf-tree-branch:nth-child(even) .sf-tree-node {
            margin-left: 30px !important;
            max-width: calc(100% - 30px) !important;
        }

        .sf-node-image {
            height: 140px !important;
        }

        .sf-node-title {
            font-size: 16px !important;
        }

        .sf-node-description {
            font-size: 13px !important;
            line-height: 1.6 !important;
        }

        .sf-process-section-title {
            font-size: 28px !important;
        }

        .sf-process-section-subtitle {
            font-size: 16px !important;
        }

        .sf-process-flow {
            padding: 20px 16px !important;
        }

        .sf-flow-container {
            gap: 6px !important;
            flex-direction: column !important;
            align-items: stretch !important;
        }

        .sf-flow-item {
            justify-content: center !important;
            padding: 8px 12px !important;
        }

        .sf-flow-arrow {
            display: none !important;
        }

        .sf-process-cta {
            padding: 60px 0 !important;
        }

        .sf-process-cta-title {
            font-size: 28px !important;
        }

        .sf-process-cta-text {
            font-size: 16px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }

        .sf-process-hero-title {
            font-size: 26px !important;
        }

        .sf-process-hero-subtitle {
            font-size: 15px !important;
        }

        .sf-process-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }

        .sf-process-hero-line {
            width: 40px !important;
            height: 2px !important;
        }

        .sf-process-section-title {
            font-size: 24px !important;
        }

        .sf-process-section-badge {
            font-size: 11px !important;
        }

        .sf-process-section-subtitle {
            font-size: 14px !important;
        }

        .sf-tree-trunk {
            left: 14px !important;
        }

        .sf-tree-branch:nth-child(odd) .sf-tree-node,
        .sf-tree-branch:nth-child(even) .sf-tree-node {
            margin-left: 20px !important;
            max-width: calc(100% - 20px) !important;
        }

        .sf-node-image {
            height: 120px !important;
        }

        .sf-node-title {
            font-size: 15px !important;
        }

        .sf-node-description {
            font-size: 12px !important;
            line-height: 1.5 !important;
        }

        .sf-node-content {
            padding: 14px 14px !important;
        }

        .sf-tree-branch:nth-child(odd) .sf-node-content,
        .sf-tree-branch:nth-child(even) .sf-node-content {
            padding: 14px 14px !important;
        }

        .sf-node-badge {
            width: 28px !important;
            height: 28px !important;
            font-size: 10px !important;
            top: 6px !important;
            left: 6px !important;
        }

        .sf-node-footer {
            font-size: 11px !important;
            flex-wrap: wrap !important;
            gap: 4px !important;
        }

        .sf-process-cta-title {
            font-size: 24px !important;
        }

        .sf-process-cta-btn {
            padding: 12px 32px !important;
            font-size: 15px !important;
        }

        .sf-root-icon svg {
            width: 24px !important;
            height: 24px !important;
        }

        .sf-root-text {
            font-size: 11px !important;
        }
    }
</style>

@endsection