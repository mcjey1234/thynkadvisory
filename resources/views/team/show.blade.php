<!-- ============================================ -->
<!-- TEAM DETAIL — Individual Team Member -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', $member->name . ' - Thynk Advisory')
@section('body_class', 'page-team-detail')

@section('content')

<!-- ============================================ -->
<!-- TEAM MEMBER DETAIL -->
<!-- ============================================ -->
<section class="sf-team-detail">
    <div class="sf-container">
        <div class="sf-team-detail-grid">
            <!-- Image -->
            <div class="sf-team-detail-image">
                @if($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}">
                @else
                    <div class="sf-team-detail-avatar">
                        <span>{{ strtoupper(substr($member->name, 0, 2)) }}</span>
                    </div>
                @endif
            </div>

            <!-- Info -->
            <div class="sf-team-detail-info">
                <div class="sf-team-detail-header">
                    <span class="sf-team-detail-badge">Team Member</span>
                    <h1 class="sf-team-detail-name">{{ $member->name }}</h1>
                    <p class="sf-team-detail-position">{{ $member->position }}</p>
                </div>

                <div class="sf-team-detail-body">
                    <!-- Skills / Additional Info -->
                    @if($member->bio)
                    <div class="sf-team-detail-skills">
                        <h3 class="sf-detail-label">Skills & Expertise</h3>
                        <p class="sf-team-detail-bio">{{ $member->bio }}</p>
                    </div>
                    @endif

                    <!-- Personal Description -->
                    @if($member->description)
                    <div class="sf-team-detail-description">
                        <h3 class="sf-detail-label">About {{ explode(' ', $member->name)[0] }}</h3>
                        <div class="sf-team-detail-text">
                            {!! nl2br(e($member->description)) !!}
                        </div>
                    </div>
                    @endif

                    <!-- Contact -->
                    <div class="sf-team-detail-contact">
                        @if($member->email)
                        <div class="sf-contact-item">
                            <span class="sf-contact-icon"><i class="fas fa-envelope"></i></span>
                            <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                        </div>
                        @endif
                        @if($member->linkedin)
                        <div class="sf-contact-item">
                            <span class="sf-contact-icon"><i class="fab fa-linkedin-in"></i></span>
                            <a href="{{ $member->linkedin }}" target="_blank">LinkedIn Profile</a>
                        </div>
                        @endif
                    </div>

                    <!-- Social Links -->
                    <div class="sf-team-detail-social">
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="sf-social-detail-link linkedin">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                        @endif
                    </div>
                </div>

                <div class="sf-team-detail-footer">
                    <a href="{{ route('team') }}" class="sf-team-detail-back">
                        <i class="fas fa-arrow-left"></i> Back to Team
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Team Detail Classic -->
<!-- ============================================ -->
<style>
    /* ============================================
       TEAM DETAIL — Classic Professional Design
       ============================================ */

    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }

    .sf-team-detail {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
    }

    .sf-team-detail-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 60px !important;
        align-items: start !important;
    }

    /* ---- Image ---- */
    .sf-team-detail-image {
        position: sticky !important;
        top: 100px !important;
    }

    .sf-team-detail-image img {
        width: 100% !important;
        border-radius: 16px !important;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06) !important;
        border: 1px solid #E8EDF2 !important;
    }

    .sf-team-detail-avatar {
        width: 100% !important;
        aspect-ratio: 1 !important;
        border-radius: 16px !important;
        background: linear-gradient(135deg, #F4F6F9, #E8EDF2) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 72px !important;
        font-weight: 700 !important;
        color: #39FF14 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        border: 1px solid #E8EDF2 !important;
    }

    /* ---- Header ---- */
    .sf-team-detail-header {
        margin-bottom: 24px !important;
    }

    .sf-team-detail-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #39FF14 !important;
        margin-bottom: 12px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-detail-name {
        font-size: 40px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }

    .sf-team-detail-position {
        font-size: 18px !important;
        color: #39FF14 !important;
        font-weight: 500 !important;
        margin: 0 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    /* ---- Body ---- */
    .sf-team-detail-body {
        margin-bottom: 24px !important;
    }

    .sf-detail-label {
        font-size: 14px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 0 8px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }

    .sf-team-detail-skills {
        margin-bottom: 20px !important;
    }

    .sf-team-detail-bio {
        font-size: 15px !important;
        line-height: 1.7 !important;
        color: #6B7C93 !important;
        margin: 0 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-detail-description {
        margin-bottom: 20px !important;
    }

    .sf-team-detail-text {
        font-size: 16px !important;
        line-height: 1.8 !important;
        color: #4B5563 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-detail-text p {
        margin-bottom: 12px !important;
    }

    .sf-team-detail-text p:last-child {
        margin-bottom: 0 !important;
    }

    /* ---- Contact ---- */
    .sf-team-detail-contact {
        display: flex !important;
        flex-direction: column !important;
        gap: 8px !important;
        margin-bottom: 20px !important;
        padding: 16px 20px !important;
        background: #F8FAFC !important;
        border-radius: 12px !important;
        border: 1px solid #E8EDF2 !important;
    }

    .sf-contact-item {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        font-size: 14px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-contact-icon {
        width: 32px !important;
        height: 32px !important;
        border-radius: 50% !important;
        background: rgba(57, 255, 20, 0.08) !important;
        color: #39FF14 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        flex-shrink: 0 !important;
    }

    .sf-contact-item a {
        color: #0F172A !important;
        text-decoration: none !important;
        transition: color 0.3s ease !important;
    }

    .sf-contact-item a:hover {
        color: #39FF14 !important;
    }

    /* ---- Social ---- */
    .sf-team-detail-social {
        display: flex !important;
        gap: 10px !important;
        flex-wrap: wrap !important;
        margin-bottom: 20px !important;
    }

    .sf-social-detail-link {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 10px 22px !important;
        border: 1px solid #E8EDF2 !important;
        border-radius: 8px !important;
        color: #0F172A !important;
        text-decoration: none !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        background: #FFFFFF !important;
    }

    .sf-social-detail-link:hover {
        border-color: #39FF14 !important;
        color: #39FF14 !important;
        background: rgba(57, 255, 20, 0.02) !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 16px rgba(57, 255, 20, 0.06) !important;
    }

    .sf-social-detail-link.linkedin:hover {
        border-color: #0A66C2 !important;
        color: #0A66C2 !important;
        background: rgba(10, 102, 194, 0.02) !important;
    }

    /* ---- Footer ---- */
    .sf-team-detail-footer {
        padding-top: 20px !important;
        border-top: 1px solid #E8EDF2 !important;
    }

    .sf-team-detail-back {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        color: #0F172A !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
    }

    .sf-team-detail-back:hover {
        color: #39FF14 !important;
        transform: translateX(-4px) !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sf-team-detail-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
        }

        .sf-team-detail-image {
            position: relative !important;
            top: 0 !important;
            max-width: 400px !important;
            margin: 0 auto !important;
        }

        .sf-team-detail-name {
            font-size: 34px !important;
        }
    }

    @media (max-width: 768px) {
        .sf-team-detail {
            padding: 60px 0 !important;
        }

        .sf-team-detail-name {
            font-size: 28px !important;
        }

        .sf-team-detail-position {
            font-size: 16px !important;
        }

        .sf-team-detail-bio {
            font-size: 14px !important;
        }

        .sf-team-detail-text {
            font-size: 15px !important;
        }

        .sf-team-detail-image {
            max-width: 300px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }

        .sf-team-detail {
            padding: 40px 0 !important;
        }

        .sf-team-detail-name {
            font-size: 24px !important;
        }

        .sf-team-detail-position {
            font-size: 15px !important;
        }

        .sf-team-detail-avatar {
            font-size: 48px !important;
        }

        .sf-team-detail-bio {
            font-size: 13px !important;
        }

        .sf-team-detail-text {
            font-size: 14px !important;
        }

        .sf-social-detail-link {
            font-size: 13px !important;
            padding: 8px 16px !important;
        }

        .sf-team-detail-contact {
            padding: 14px 16px !important;
        }

        .sf-contact-item {
            font-size: 13px !important;
        }
    }
</style>

@endsection