
@extends('layouts.public')

@section('title', 'Unsubscribe - Sofel Labs')
@section('body_class', 'page-unsubscribe')

@section('content')
<section class="sl-section" style="padding: 80px 0; background: #F8FAFB; min-height: 60vh; display: flex; align-items: center;">
    <div class="sl-container" style="max-width: 500px; margin: 0 auto; padding: 0 20px; width: 100%;">
        <div class="sl-card" style="background: #FFFFFF; border-radius: 16px; padding: 40px 36px; text-align: center; box-shadow: 0 4px 30px rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.02);">

            @if($subscription && $subscription->status === 'active')
                <div style="margin-bottom: 20px;">
                    <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(237, 68, 132, 0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="fas fa-envelope" style="font-size: 28px; color: #ED4484;"></i>
                    </div>
                </div>
                <h2 style="color: #0E2A47; font-size: 28px; font-weight: 700; margin-bottom: 12px; font-family: 'Cabin', 'Gill Sans Nova', sans-serif;">
                    Unsubscribe from Updates
                </h2>
                <p style="color: #6B7C93; font-size: 16px; line-height: 1.6; margin-bottom: 8px;">
                    You are about to unsubscribe <strong style="color: #0E2A47;">{{ $email }}</strong> from Sofel Labs updates.
                </p>
                <p style="color: #A0AEC0; font-size: 14px; margin-bottom: 24px;">
                    You will no longer receive emails about new services and updates.
                </p>
                <form action="{{ route('unsubscribe.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="email" value="{{ $email }}">
                    <button type="submit" style="padding: 14px 40px; background: #ED4484; color: #FFFFFF; border: none; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.3s ease; font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif; width: 100%;">
                        Confirm Unsubscribe
                    </button>
                </form>
                <p style="margin-top: 16px; font-size: 14px; color: #6B7C93;">
                    <a href="{{ route('home') }}" style="color: #47C89F; text-decoration: none;">← Keep me subscribed, go back</a>
                </p>
            @elseif($subscription && $subscription->status === 'unsubscribed')
                <div style="margin-bottom: 20px;">
                    <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(71, 200, 159, 0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="fas fa-check-circle" style="font-size: 28px; color: #47C89F;"></i>
                    </div>
                </div>
                <h2 style="color: #0E2A47; font-size: 28px; font-weight: 700; margin-bottom: 12px; font-family: 'Cabin', 'Gill Sans Nova', sans-serif;">
                    Already Unsubscribed
                </h2>
                <p style="color: #6B7C93; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
                    You are already unsubscribed from our updates.
                </p>
                <a href="{{ route('home') }}" style="display: inline-block; padding: 12px 32px; background: #47C89F; color: #FFFFFF; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px; transition: all 0.3s ease;">
                    Return to Sofel Labs
                </a>
            @else
                <div style="margin-bottom: 20px;">
                    <div style="width: 64px; height: 64px; border-radius: 50%; background: rgba(255, 193, 7, 0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                        <i class="fas fa-exclamation-circle" style="font-size: 28px; color: #F59E0B;"></i>
                    </div>
                </div>
                <h2 style="color: #0E2A47; font-size: 28px; font-weight: 700; margin-bottom: 12px; font-family: 'Cabin', 'Gill Sans Nova', sans-serif;">
                    Email Not Found
                </h2>
                <p style="color: #6B7C93; font-size: 16px; line-height: 1.6; margin-bottom: 24px;">
                    We couldn't find <strong style="color: #0E2A47;">{{ $email }}</strong> in our subscription list.
                </p>
                <a href="{{ route('home') }}" style="display: inline-block; padding: 12px 32px; background: #47C89F; color: #FFFFFF; text-decoration: none; border-radius: 8px; font-weight: 600; font-size: 16px; transition: all 0.3s ease;">
                    Return to Sofel Labs
                </a>
            @endif
        </div>
    </div>
</section>

<style>
    @media (max-width: 480px) {
        .sl-card {
            padding: 24px 20px !important;
        }
        h2 {
            font-size: 24px !important;
        }
    }
</style>
@endsection