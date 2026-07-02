@extends('layouts.public')

@section('title', $project->title . ' - THYNKADVISORY')
@section('body_class', 'page-scorm-play')

@section('content')

<section class="scorm-player">
    <div class="scorm-player-container">
        <div class="scorm-player-header">
            <div>
                <h1>{{ $project->title }}</h1>
                @if($project->client_name)
                <p class="scorm-client">Client: {{ $project->client_name }}</p>
                @endif
            </div>
            <a href="{{ route('scorm.show', $project->id) }}" class="scorm-back">← Back to Project</a>
        </div>
        <div class="scorm-player-content">
            @if($project->scorm_url)
            <iframe 
                src="{{ $project->scorm_url }}" 
                frameborder="0" 
                allowfullscreen
                class="scorm-iframe"
                id="scorm-iframe"
                allow="autoplay; encrypted-media">
            </iframe>
            @elseif($project->url)
            <iframe 
                src="{{ $project->url }}" 
                frameborder="0" 
                allowfullscreen
                class="scorm-iframe"
                id="scorm-iframe"
                allow="autoplay; encrypted-media">
            </iframe>
            @else
            <div class="scorm-error">
                <span>⚠️</span>
                <h3>No SCORM content available</h3>
                <p>This project doesn't have any SCORM content uploaded yet.</p>
                <a href="{{ route('scorm.show', $project->id) }}" class="scorm-btn-back">Return to Project</a>
            </div>
            @endif
        </div>
    </div>
</section>

<style>
    .scorm-player-container { 
        max-width: 1200px; 
        margin: 0 auto; 
        padding: 24px; 
    }
    .scorm-player-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 16px;
    }
    .scorm-player-header h1 {
        font-size: 24px;
        font-weight: 600;
        color: #0F172A;
        font-family: 'Cabin', sans-serif;
        margin: 0;
    }
    .scorm-client {
        font-size: 14px;
        color: #64748B;
        margin: 4px 0 0;
    }
    .scorm-back {
        color: #39FF14;
        text-decoration: none;
        font-weight: 500;
        padding: 8px 16px;
        border: 1px solid rgba(57,255,20,0.04);
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    .scorm-back:hover { 
        color: #2DE010; 
        background: rgba(57,255,20,0.04);
    }
    .scorm-player-content {
        background: #0F172A;
        border-radius: 12px;
        overflow: hidden;
        height: calc(100vh - 200px);
        min-height: 500px;
        position: relative;
        border: 1px solid rgba(57,255,20,0.04);
    }
    .scorm-iframe {
        width: 100%;
        height: 100%;
        border: none;
        background: #FFFFFF;
    }
    .scorm-error {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #FFFFFF;
        text-align: center;
        padding: 40px;
    }
    .scorm-error span { font-size: 48px; margin-bottom: 16px; }
    .scorm-error h3 { font-size: 24px; margin: 0 0 8px; font-family: 'Cabin', sans-serif; }
    .scorm-error p { color: rgba(255,255,255,0.4); margin: 0 0 20px; }
    .scorm-btn-back {
        display: inline-block;
        padding: 10px 28px;
        background: #39FF14;
        color: #0F172A;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .scorm-btn-back:hover { background: #2DE010; transform: translateY(-2px); }
    
    @media (max-width: 768px) {
        .scorm-player-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .scorm-player-content {
            height: calc(100vh - 160px);
            min-height: 400px;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const iframe = document.getElementById('scorm-iframe');
    
    if (iframe) {
        // Handle SCORM API calls from the iframe
        window.addEventListener('message', function(event) {
            if (event.data && typeof event.data === 'object') {
                console.log('SCORM message received:', event.data);
            }
        });
        
        // Log when iframe loads
        iframe.addEventListener('load', function() {
            console.log('SCORM course loaded successfully');
        });
    }
});
</script>

@endsection
