<!-- ============================================ -->
<!-- TEAM DETAIL — Individual Team Member -->
<!-- ============================================ -->
@extends('layouts.public')

@section('title', $member->name . ' - Sofel Labs')
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
                    <img src="{{ $member->image_url }}" alt="{{ $member->name }}">
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
                    <div class="sf-team-detail-bio">
                        {!! nl2br(e($member->bio)) !!}
                    </div>

                    <div class="sf-team-detail-contact">
                        @if($member->email)
                        <div class="sf-contact-item">
                            <span class="sf-contact-icon"><i class="fas fa-envelope"></i></span>
                            <a href="mailto:{{ $member->email }}">{{ $member->email }}</a>
                        </div>
                        @endif
                        @if($member->phone)
                        <div class="sf-contact-item">
                            <span class="sf-contact-icon"><i class="fas fa-phone"></i></span>
                            <a href="tel:{{ $member->phone }}">{{ $member->phone }}</a>
                        </div>
                        @endif
                    </div>

                    <div class="sf-team-detail-social">
                        @if($member->linkedin)
                        <a href="{{ $member->linkedin }}" target="_blank" class="sf-social-detail-link">
                            <i class="fab fa-linkedin-in"></i> LinkedIn
                        </a>
                        @endif
                        @if($member->twitter)
                        <a href="{{ $member->twitter }}" target="_blank" class="sf-social-detail-link">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        @endif
                        @if($member->facebook)
                        <a href="{{ $member->facebook }}" target="_blank" class="sf-social-detail-link">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        @endif
                        @if($member->instagram)
                        <a href="{{ $member->instagram }}" target="_blank" class="sf-social-detail-link">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        @endif
                    </div>
                </div>

                <div class="sf-team-detail-footer">
                    <a href="{{ route('team') }}" class="sf-team-detail-back">
                        ← Back to Team
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Team Detail -->
<!-- ============================================ -->
<style>
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

    .sf-team-detail-image img {
        width: 100% !important;
        border-radius: 16px !important;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.06) !important;
    }

    .sf-team-detail-avatar {
        width: 100% !important;
        aspect-ratio: 1 !important;
        border-radius: 16px !important;
        background: linear-gradient(135deg, rgba(71, 200, 159, 0.04), rgba(154, 202, 67, 0.04)) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 72px !important;
        font-weight: 700 !important;
        color: #47C89F !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-team-detail-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2px !important;
        color: #47C89F !important;
        margin-bottom: 12px !important;
    }

    .sf-team-detail-name {
        font-size: 42px !important;
        font-weight: 700 !important;
        color: #0E2A47 !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sf-team-detail-position {
        font-size: 20px !important;
        color: #47C89F !important;
        font-weight: 500 !important;
        margin: 0 0 20px 0 !important;
    }

    .sf-team-detail-bio {
        font-size: 16px !important;
        line-height: 1.8 !important;
        color: #4A5A6E !important;
        margin-bottom: 24px !important;
    }

    .sf-team-detail-bio p {
        margin-bottom: 12px !important;
    }

    .sf-team-detail-bio p:last-child {
        margin-bottom: 0 !important;
    }

    .sf-team-detail-contact {
        display: flex !important;
        flex-direction: column !important;
        gap: 8px !important;
        margin-bottom: 20px !important;
        padding: 16px !important;
        background: #F8FAFB !important;
        border-radius: 12px !important;
    }

    .sf-contact-item {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        font-size: 15px !important;
    }

    .sf-contact-icon {
        width: 32px !important;
        height: 32px !important;
        border-radius: 50% !important;
        background: rgba(71, 200, 159, 0.08) !important;
        color: #47C89F !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
    }

    .sf-contact-item a {
        color: #0E2A47 !important;
        text-decoration: none !important;
        transition: color 0.3s ease !important;
    }

    .sf-contact-item a:hover {
        color: #47C89F !important;
    }

    .sf-team-detail-social {
        display: flex !important;
        gap: 8px !important;
        flex-wrap: wrap !important;
        margin-bottom: 24px !important;
    }

    .sf-social-detail-link {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
        padding: 8px 18px !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        border-radius: 8px !important;
        color: #0E2A47 !important;
        text-decoration: none !important;
        font-size: 14px !important;
        transition: all 0.3s ease !important;
    }

    .sf-social-detail-link:hover {
        border-color: #47C89F !important;
        color: #47C89F !important;
        background: rgba(71, 200, 159, 0.02) !important;
    }

    .sf-team-detail-back {
        color: #47C89F !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
    }

    .sf-team-detail-back:hover {
        color: #3AAF8A !important;
        transform: translateX(-4px) !important;
    }

    @media (max-width: 991px) {
        .sf-team-detail-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
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
            font-size: 17px !important;
        }

        .sf-team-detail-bio {
            font-size: 15px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-team-detail-name {
            font-size: 24px !important;
        }

        .sf-team-detail-position {
            font-size: 15px !important;
        }

        .sf-team-detail-bio {
            font-size: 14px !important;
        }

        .sf-team-detail-avatar {
            font-size: 48px !important;
        }

        .sf-social-detail-link {
            font-size: 13px !important;
            padding: 6px 14px !important;
        }
    }
</style>

@endsection