@extends('layouts.public')

@section('title', $post->title . ' - Sofel Labs')
@section('body_class', 'page-daily-digest')

@section('content')

<section class="dd-single">
    <div class="dd-container">
        <div class="dd-single-content">
            <a href="{{ route('daily.digest') }}" class="dd-back">← Back to Daily Digest</a>
            
            <div class="dd-single-card">
                <div class="dd-single-header">
                    <div class="dd-single-meta">
                        <span class="dd-single-type">{{ ucfirst($post->type) }}</span>
                        <span class="dd-single-date">{{ $post->post_date->format('l, F j, Y') }}</span>
                    </div>
                    <h1>{{ $post->title }}</h1>
                    <div class="dd-single-icon">{{ $post->icon ?? '📌' }}</div>
                </div>
                
                <div class="dd-single-body">
                    @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="dd-single-image">
                    @endif
                    <p>{{ $post->content }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .dd-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    .dd-single {
        padding: 60px 0 80px;
        background: #F8FAFC;
    }
    
    .dd-back {
        display: inline-block;
        color: #47C89F;
        text-decoration: none;
        margin-bottom: 24px;
        transition: all 0.3s ease;
    }
    
    .dd-back:hover {
        color: #3AAF8A;
    }
    
    .dd-single-card {
        background: #FFFFFF;
        border-radius: 16px;
        padding: 40px 48px;
        box-shadow: 0 2px 20px rgba(0,0,0,0.02);
        border: 1px solid rgba(0,0,0,0.02);
    }
    
    .dd-single-header {
        text-align: center;
        margin-bottom: 32px;
    }
    
    .dd-single-meta {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-bottom: 12px;
    }
    
    .dd-single-type {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #47C89F;
        background: rgba(71, 200, 159, 0.06);
        padding: 4px 16px;
        border-radius: 12px;
    }
    
    .dd-single-date {
        font-size: 14px;
        color: #94A3B8;
    }
    
    .dd-single-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #0F172A;
        margin: 8px 0 0;
        font-family: 'Cabin', sans-serif;
    }
    
    .dd-single-icon {
        font-size: 48px;
        margin-top: 16px;
    }
    
    .dd-single-body {
        font-size: 17px;
        color: #4A5568;
        line-height: 1.8;
    }
    
    .dd-single-body p {
        margin: 0;
    }
    
    .dd-single-image {
        width: 100%;
        border-radius: 12px;
        margin-bottom: 24px;
    }
    
    @media (max-width: 768px) {
        .dd-single {
            padding: 40px 0;
        }
        .dd-single-card {
            padding: 24px 20px;
        }
        .dd-single-header h1 {
            font-size: 26px;
        }
        .dd-single-body {
            font-size: 15px;
        }
    }
</style>

@endsection
