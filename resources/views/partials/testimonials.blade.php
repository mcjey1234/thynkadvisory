@if($testimonials->count() > 0)
<section class="tk-testimonial-section tk-reveal">
    <div class="tk-container">
        <div class="tk-testimonial-header">
            <span class="tk-testimonial-badge">Testimonials</span>
            <h2>What Our <span class="text-neon">Clients Say</span></h2>
            <p>Real feedback from the organizations and individuals we've worked with</p>
        </div>

        <div class="tk-testimonial-grid">
            @foreach($testimonials as $testimonial)
            <div class="tk-testimonial-card {{ $testimonial->is_featured ? 'tk-testimonial-featured' : '' }}">
                <div class="tk-testimonial-quote-mark">"</div>
                <blockquote class="tk-testimonial-text">
                    {{ $testimonial->testimonial_text }}
                    @if($testimonial->is_featured)
                    <span class="tk-testimonial-highlight">— {{ $testimonial->client_name }}</span>
                    @endif
                </blockquote>
                <div class="tk-testimonial-divider">
                    <span></span><span class="tk-divider-diamond">◆</span><span></span>
                </div>
                <div class="tk-testimonial-author">
                    <div class="tk-testimonial-avatar">
                        @if($testimonial->avatar_image)
                            <img src="{{ asset('storage/' . $testimonial->avatar_image) }}" alt="{{ $testimonial->client_name }}">
                        @else
                            <span>{{ $testimonial->avatar_initials ?? substr($testimonial->client_name, 0, 2) }}</span>
                        @endif
                    </div>
                    <div>
                        <p class="tk-testimonial-name">{{ $testimonial->client_name }}</p>
                        @if($testimonial->client_role)
                        <p class="tk-testimonial-role">{{ $testimonial->client_role }}</p>
                        @endif
                        @if($testimonial->client_company)
                        <p class="tk-testimonial-company">{{ $testimonial->client_company }}</p>
                        @endif
                        @if($testimonial->project_type)
                        <p class="tk-testimonial-project">📌 {{ $testimonial->project_type }}</p>
                        @endif
                        <div class="tk-stars">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    ★
                                @else
                                    ☆
                                @endif
                            @endfor
                            <span>{{ $testimonial->rating }}.0</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .tk-testimonial-section {
        padding: 80px 0;
        background: #F8FAFC;
    }
    .tk-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .tk-testimonial-header {
        text-align: center;
        max-width: 700px;
        margin: 0 auto 48px;
    }
    .tk-testimonial-badge {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 3px;
        color: #39FF14;
        background: rgba(57,255,20,0.06);
        padding: 4px 20px;
        border-radius: 20px;
        border: 1px solid rgba(57,255,20,0.04);
        margin-bottom: 12px;
    }
    .tk-testimonial-header h2 {
        font-size: 36px;
        font-weight: 700;
        color: #0F172A;
        margin: 0 0 8px;
        font-family: 'Cabin', sans-serif;
    }
    .text-neon { color: #39FF14; }
    .tk-testimonial-header p {
        font-size: 16px;
        color: #64748B;
        margin: 0;
    }

    .tk-testimonial-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
        gap: 32px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .tk-testimonial-card {
        background: #FFFFFF;
        border-radius: 16px;
        padding: 32px 28px;
        border: 1px solid rgba(0,0,0,0.02);
        box-shadow: 0 2px 20px rgba(0,0,0,0.02);
        transition: all 0.3s ease;
        position: relative;
    }
    .tk-testimonial-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 40px rgba(57,255,20,0.04);
        border-color: rgba(57,255,20,0.04);
    }
    .tk-testimonial-featured {
        border: 2px solid rgba(57,255,20,0.06);
        background: linear-gradient(135deg, #FFFFFF, #F8FAFC);
    }

    .tk-testimonial-quote-mark {
        font-size: 48px;
        color: #39FF14;
        opacity: 0.1;
        line-height: 1;
        margin-bottom: 4px;
        font-family: 'Georgia', serif;
    }
    .tk-testimonial-text {
        font-size: 16px;
        color: #475569;
        line-height: 1.8;
        margin: 0 0 16px;
        font-style: italic;
        font-weight: 300;
    }
    .tk-testimonial-highlight {
        color: #39FF14;
        font-weight: 400;
        display: block;
        margin-top: 8px;
    }

    .tk-testimonial-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 16px 0 20px;
    }
    .tk-testimonial-divider span:first-child,
    .tk-testimonial-divider span:last-child {
        flex: 1;
        height: 1px;
        background: rgba(0,0,0,0.04);
    }
    .tk-divider-diamond {
        color: #39FF14;
        font-size: 12px;
        opacity: 0.3;
    }

    .tk-testimonial-author {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .tk-testimonial-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #0F172A;
        color: #39FF14;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 16px;
        flex-shrink: 0;
        overflow: hidden;
        font-family: 'Cabin', sans-serif;
    }
    .tk-testimonial-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .tk-testimonial-name {
        font-size: 16px;
        font-weight: 600;
        color: #0F172A;
        margin: 0;
        font-family: 'Cabin', sans-serif;
    }
    .tk-testimonial-role {
        font-size: 13px;
        color: #39FF14;
        margin: 0;
        font-weight: 500;
    }
    .tk-testimonial-company {
        font-size: 13px;
        color: #64748B;
        margin: 0;
    }
    .tk-testimonial-project {
        font-size: 12px;
        color: #94A3B8;
        margin: 4px 0 0;
    }
    .tk-stars {
        color: #F59E0B;
        font-size: 14px;
        letter-spacing: 2px;
        margin-top: 4px;
    }
    .tk-stars span {
        color: #94A3B8;
        font-size: 12px;
        margin-left: 4px;
    }

    @media (max-width: 768px) {
        .tk-testimonial-grid {
            grid-template-columns: 1fr;
        }
        .tk-testimonial-section {
            padding: 60px 0;
        }
        .tk-testimonial-header h2 {
            font-size: 28px;
        }
        .tk-testimonial-card {
            padding: 24px 20px;
        }
    }
    @media (max-width: 480px) {
        .tk-testimonial-header h2 {
            font-size: 24px;
        }
        .tk-testimonial-text {
            font-size: 15px;
        }
        .tk-testimonial-author {
            flex-direction: column;
            text-align: center;
        }
        .tk-container {
            padding: 0 16px;
        }
    }
</style>
@endif
