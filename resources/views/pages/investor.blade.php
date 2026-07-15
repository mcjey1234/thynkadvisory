@extends('layouts.public')

@section('title', 'Investor Data Room — THYNK Advisory')
@section('meta_description', '50+ applications deployed · 100% delivery rate · GIS-ready · Trusted by UNDP, UNICEF, World Bank, KCB Group, Kenya Airways')

@push('head')
    <meta property="og:title" content="THYNK Advisory — Investor Data Room" />
    <meta property="og:description" content="50+ applications deployed · 100% delivery rate · GIS-ready · Trusted by UNDP, UNICEF, World Bank, KCB Group, Kenya Airways" />
    <meta name="robots" content="index, follow" />
@endpush

@section('body_class', 'page-investor')

@section('content')

<!-- ============================================ -->
<!-- INVESTOR HERO -->
<!-- ============================================ -->
<section class="investor-hero">
    <div class="investor-container">
        <div class="investor-hero-content">
            <span class="investor-badge">Data Room</span>
            <h1>Investor &amp; Partner <span class="text-neon">Overview</span></h1>
            <p>Everything you need to know about THYNK Advisory — metrics, clients, testimonials, and projects.</p>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- QUICK METRICS -->
<!-- ============================================ -->
<section class="investor-metrics">
    <div class="investor-container">
        <div class="investor-metrics-grid">
            <div class="investor-metric">
                <span class="investor-metric-num">50+</span>
                <span class="investor-metric-label">Applications Deployed</span>
                <span class="investor-metric-sub">Web, mobile, and GIS tools live in production</span>
            </div>
            <div class="investor-metric-divider"></div>
            <div class="investor-metric">
                <span class="investor-metric-num">2</span>
                <span class="investor-metric-label">Platforms, One Team</span>
                <span class="investor-metric-sub">Android and iOS built and shipped together</span>
            </div>
            <div class="investor-metric-divider"></div>
            <div class="investor-metric">
                <span class="investor-metric-num">100%</span>
                <span class="investor-metric-label">End-to-End Delivery</span>
                <span class="investor-metric-sub">Design, build, deploy — under one roof</span>
            </div>
            <div class="investor-metric-divider"></div>
            <div class="investor-metric">
                <span class="investor-metric-num">GIS</span>
                <span class="investor-metric-label">Geospatial Ready</span>
                <span class="investor-metric-sub">Spatial data, maps, and location intelligence</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CLIENTS / TRUSTED BY -->
<!-- ============================================ -->
<section class="investor-clients">
    <div class="investor-container">
        <h2>Trusted By</h2>
        <p>Organizations that have partnered with THYNK Advisory</p>
        <div class="investor-clients-grid">
            <div class="investor-client">UNDP</div>
            <div class="investor-client">UNICEF</div>
            <div class="investor-client">World Bank</div>
            <div class="investor-client">KCB Group</div>
            <div class="investor-client">Kenya Airways</div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- SECTORS WE SERVE -->
<!-- ============================================ -->
<section class="investor-sectors">
    <div class="investor-container">
        <h2>Sectors We Serve</h2>
        <div class="investor-sectors-grid">
            <span class="investor-sector">GovTech</span>
            <span class="investor-sector">EdTech</span>
            <span class="investor-sector">AgriTech</span>
            <span class="investor-sector">Fintech</span>
            <span class="investor-sector">NGO / Development</span>
            <span class="investor-sector">HealthTech</span>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- TESTIMONIALS (PULLED FROM DB) -->
<!-- ============================================ -->
@if($testimonials->count() > 0)
<section class="investor-testimonials">
    <div class="investor-container">
        <h2>What Clients Say</h2>
        <p>Real feedback from organizations we've worked with</p>
        <div class="investor-testimonials-grid">
            @foreach($testimonials as $testimonial)
            <blockquote class="investor-testimonial">
                <p>"{{ $testimonial->testimonial_text }}"</p>
                <footer>
                    <strong>{{ $testimonial->client_name }}</strong>
                    @if($testimonial->client_company)
                    <span>{{ $testimonial->client_company }}</span>
                    @endif
                    @if($testimonial->project_type)
                    <span class="investor-testimonial-project">{{ $testimonial->project_type }}</span>
                    @endif
                    <div class="investor-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $testimonial->rating) ★ @else ☆ @endif
                        @endfor
                        <span class="investor-rating">{{ $testimonial->rating }}.0</span>
                    </div>
                </footer>
            </blockquote>
            @endforeach
        </div>
        <div class="investor-view-all">
            <a href="{{ route('testimonials.index') }}" class="investor-link">View all testimonials →</a>
        </div>
    </div>
</section>
@endif

<!-- ============================================ -->
<!-- FEATURED PROJECTS (PULLED FROM DB) -->
<!-- ============================================ -->
@if($projects->count() > 0)
<section class="investor-projects">
    <div class="investor-container">
        <h2>Featured Work</h2>
        <p>Selected projects from our portfolio</p>
        <div class="investor-projects-grid">
            @foreach($projects as $project)
            <div class="investor-project">
                @if($project->thumbnail)
                <div class="investor-project-image">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                </div>
                @endif
                <div class="investor-project-content">
                    <span class="investor-project-cat">{{ $project->category_label }}</span>
                    <h4>{{ $project->title }}</h4>
                    <p>{{ Str::limit($project->description, 100) }}</p>
                    @if($project->client_name)
                    <span class="investor-project-client">Client: {{ $project->client_name }}</span>
                    @endif
                    <a href="{{ route('projects.show', $project->id) }}" class="investor-project-link">View Project →</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="investor-view-all">
            <a href="{{ route('projects.index') }}" class="investor-link">View all projects →</a>
        </div>
    </div>
</section>
@endif

<!-- ============================================ -->
<!-- COMPANY OVERVIEW -->
<!-- ============================================ -->
<section class="investor-company">
    <div class="investor-container">
        <h2>Company Overview</h2>
        <div class="investor-company-grid">
            <div class="investor-company-item">
                <span class="investor-company-label">Founded</span>
                <span class="investor-company-value">2017</span>
            </div>
            <div class="investor-company-item">
                <span class="investor-company-label">Location</span>
                <span class="investor-company-value">Nairobi, Kenya</span>
            </div>
            <div class="investor-company-item">
                <span class="investor-company-label">Remote</span>
                <span class="investor-company-value">Remote-First</span>
            </div>
            <div class="investor-company-item">
                <span class="investor-company-label">Size</span>
                <span class="investor-company-value">2-10 Employees</span>
            </div>
            <div class="investor-company-item">
                <span class="investor-company-label">Type</span>
                <span class="investor-company-value">Privately Held</span>
            </div>
            <div class="investor-company-item">
                <span class="investor-company-label">Status</span>
                <span class="investor-company-value">Bootstrapped</span>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CONTACT / INVESTOR INQUIRIES -->
<!-- ============================================ -->
<section class="investor-contact">
    <div class="investor-container">
        <div class="investor-contact-inner">
            <h2>Investor &amp; Partnership Inquiries</h2>
            <p>We're always open to conversations with investors, partners, and collaborators.</p>
            <div class="investor-contact-details">
                <a href="mailto:info@thynkadvisory.co.ke" class="investor-contact-link">
                    info@thynkadvisory.co.ke
                </a>
                <a href="tel:+254757275827" class="investor-contact-link">
                    +254 757 275 827
                </a>
            </div>
            <div class="investor-contact-actions">
                <a href="https://cal.com/thynk-consulatation" class="investor-cta-btn">Book a Call</a>
                <a href="{{ route('contact') }}" class="investor-cta-btn investor-cta-btn-outline">Contact Form</a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- DOWNLOAD / PRINT OPTION -->
<!-- ============================================ -->
<div class="investor-print">
    <div class="investor-container">
        <button onclick="window.print()" class="investor-print-btn">
            Download as PDF
        </button>
        <a href="{{ route('home') }}" class="investor-print-link">← Back to Home</a>
    </div>
</div>

<!-- ============================================ -->
<!-- STYLES -->
<!-- ============================================ -->
<style>
/* ================================================
   INVESTOR PAGE — Clean, Professional, Data-Focused
   ================================================ */

.investor-container {
    max-width: 1100px !important;
    margin: 0 auto !important;
    padding: 0 24px !important;
}

.text-neon {
    color: #39FF14 !important;
}

/* ---- HERO ---- */
.investor-hero {
    padding: 60px 0 40px !important;
    background: #0F172A !important;
    border-bottom: 1px solid rgba(57,255,20,0.08) !important;
}
.investor-hero-content {
    text-align: center !important;
}
.investor-badge {
    display: inline-block !important;
    font-size: 11px !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 3px !important;
    color: #39FF14 !important;
    background: rgba(57,255,20,0.08) !important;
    padding: 6px 20px !important;
    border-radius: 20px !important;
    border: 1px solid rgba(57,255,20,0.15) !important;
    margin-bottom: 16px !important;
}
.investor-hero h1 {
    font-size: 42px !important;
    font-weight: 800 !important;
    color: #FFFFFF !important;
    margin: 0 0 12px !important;
    font-family: 'Inter', sans-serif !important;
    letter-spacing: -1px !important;
}
.investor-hero p {
    font-size: 18px !important;
    color: rgba(255,255,255,0.5) !important;
    margin: 0 !important;
    max-width: 600px !important;
    margin: 0 auto !important;
}

/* ---- METRICS ---- */
.investor-metrics {
    padding: 40px 0 !important;
    background: #FFFFFF !important;
    border-bottom: 1px solid #E2E8F0 !important;
}
.investor-metrics-grid {
    display: grid !important;
    grid-template-columns: repeat(7, 1fr) !important;
    align-items: center !important;
}
.investor-metric {
    text-align: center !important;
    padding: 8px 0 !important;
}
.investor-metric-num {
    display: block !important;
    font-size: 28px !important;
    font-weight: 800 !important;
    color: #0F172A !important;
    font-family: 'Inter', sans-serif !important;
}
.investor-metric-label {
    display: block !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    color: #0F172A !important;
    margin-top: 2px !important;
}
.investor-metric-sub {
    display: block !important;
    font-size: 11px !important;
    color: #6B7C93 !important;
    margin-top: 2px !important;
}
.investor-metric-divider {
    width: 1px !important;
    height: 40px !important;
    background: #E2E8F0 !important;
    margin: 0 auto !important;
}

/* ---- CLIENTS ---- */
.investor-clients {
    padding: 50px 0 !important;
    background: #F8FAFC !important;
    border-bottom: 1px solid #E2E8F0 !important;
}
.investor-clients h2 {
    font-size: 24px !important;
    font-weight: 700 !important;
    color: #0F172A !important;
    margin: 0 0 4px !important;
    font-family: 'Inter', sans-serif !important;
    text-align: center !important;
}
.investor-clients p {
    text-align: center !important;
    color: #6B7C93 !important;
    margin: 0 0 32px !important;
    font-size: 15px !important;
}
.investor-clients-grid {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    gap: 24px !important;
}
.investor-client {
    padding: 12px 32px !important;
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    font-size: 16px !important;
    color: #0F172A !important;
    box-shadow: 0 1px 4px rgba(0,0,0,0.04) !important;
    transition: all 0.3s ease !important;
}
.investor-client:hover {
    border-color: #39FF14 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 16px rgba(57,255,20,0.08) !important;
}

/* ---- SECTORS ---- */
.investor-sectors {
    padding: 50px 0 !important;
    background: #FFFFFF !important;
    border-bottom: 1px solid #E2E8F0 !important;
}
.investor-sectors h2 {
    font-size: 24px !important;
    font-weight: 700 !important;
    color: #0F172A !important;
    margin: 0 0 4px !important;
    font-family: 'Inter', sans-serif !important;
    text-align: center !important;
}
.investor-sectors-grid {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    gap: 12px !important;
}
.investor-sector {
    padding: 8px 20px !important;
    background: rgba(57,255,20,0.06) !important;
    border: 1px solid rgba(57,255,20,0.2) !important;
    border-radius: 20px !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    color: #0F172A !important;
}

/* ---- TESTIMONIALS ---- */
.investor-testimonials {
    padding: 50px 0 !important;
    background: #F8FAFC !important;
    border-bottom: 1px solid #E2E8F0 !important;
}
.investor-testimonials h2 {
    font-size: 24px !important;
    font-weight: 700 !important;
    color: #0F172A !important;
    margin: 0 0 4px !important;
    font-family: 'Inter', sans-serif !important;
    text-align: center !important;
}
.investor-testimonials p {
    text-align: center !important;
    color: #6B7C93 !important;
    margin: 0 0 32px !important;
}
.investor-testimonials-grid {
    display: grid !important;
    grid-template-columns: 1fr 1fr !important;
    gap: 24px !important;
}
.investor-testimonial {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 12px !important;
    padding: 24px !important;
    transition: all 0.3s ease !important;
}
.investor-testimonial:hover {
    border-color: rgba(57,255,20,0.3) !important;
    box-shadow: 0 4px 20px rgba(57,255,20,0.06) !important;
}
.investor-testimonial p {
    font-size: 15px !important;
    line-height: 1.7 !important;
    color: #1E293B !important;
    font-style: italic !important;
    text-align: left !important;
    margin: 0 0 12px !important;
}
.investor-testimonial footer {
    font-style: normal !important;
}
.investor-testimonial footer strong {
    display: block !important;
    color: #0F172A !important;
    font-size: 14px !important;
}
.investor-testimonial footer span {
    display: block !important;
    color: #6B7C93 !important;
    font-size: 13px !important;
}
.investor-testimonial-project {
    margin-top: 4px !important;
}
.investor-stars {
    color: #FFD700 !important;
    font-size: 13px !important;
    margin-top: 6px !important;
    display: flex !important;
    align-items: center !important;
    gap: 2px !important;
}
.investor-rating {
    color: #6B7C93 !important;
    font-size: 12px !important;
    margin-left: 4px !important;
}

/* ---- PROJECTS ---- */
.investor-projects {
    padding: 50px 0 !important;
    background: #FFFFFF !important;
    border-bottom: 1px solid #E2E8F0 !important;
}
.investor-projects h2 {
    font-size: 24px !important;
    font-weight: 700 !important;
    color: #0F172A !important;
    margin: 0 0 4px !important;
    font-family: 'Inter', sans-serif !important;
    text-align: center !important;
}
.investor-projects p {
    text-align: center !important;
    color: #6B7C93 !important;
    margin: 0 0 32px !important;
}
.investor-projects-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 24px !important;
}
.investor-project {
    background: #F8FAFC !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 12px !important;
    overflow: hidden !important;
    transition: all 0.3s ease !important;
}
.investor-project:hover {
    border-color: rgba(57,255,20,0.3) !important;
    transform: translateY(-4px) !important;
    box-shadow: 0 8px 24px rgba(57,255,20,0.06) !important;
}
.investor-project-image {
    height: 140px !important;
    overflow: hidden !important;
    background: #E2E8F0 !important;
}
.investor-project-image img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
}
.investor-project-content {
    padding: 16px 20px 20px !important;
}
.investor-project-cat {
    display: inline-block !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    padding: 2px 10px !important;
    background: rgba(57,255,20,0.08) !important;
    color: #27B80E !important;
    border-radius: 4px !important;
    margin-bottom: 8px !important;
}
.investor-project-content h4 {
    font-size: 16px !important;
    font-weight: 600 !important;
    color: #0F172A !important;
    margin: 0 0 6px !important;
    font-family: 'Inter', sans-serif !important;
}
.investor-project-content p {
    font-size: 13px !important;
    color: #6B7C93 !important;
    line-height: 1.6 !important;
    text-align: left !important;
    margin: 0 0 10px !important;
}
.investor-project-client {
    display: block !important;
    font-size: 12px !important;
    color: #94A3B8 !important;
    margin-bottom: 10px !important;
}
.investor-project-link {
    color: #39FF14 !important;
    font-weight: 600 !important;
    font-size: 13px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}
.investor-project-link:hover {
    color: #27B80E !important;
    text-decoration: underline !important;
}

.investor-view-all {
    text-align: center !important;
    margin-top: 28px !important;
}
.investor-link {
    color: #39FF14 !important;
    font-weight: 600 !important;
    font-size: 15px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}
.investor-link:hover {
    color: #27B80E !important;
    text-decoration: underline !important;
}

/* ---- COMPANY ---- */
.investor-company {
    padding: 50px 0 !important;
    background: #F8FAFC !important;
    border-bottom: 1px solid #E2E8F0 !important;
}
.investor-company h2 {
    font-size: 24px !important;
    font-weight: 700 !important;
    color: #0F172A !important;
    margin: 0 0 28px !important;
    font-family: 'Inter', sans-serif !important;
    text-align: center !important;
}
.investor-company-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 16px !important;
    max-width: 700px !important;
    margin: 0 auto !important;
}
.investor-company-item {
    background: #FFFFFF !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 10px !important;
    padding: 16px 20px !important;
    text-align: center !important;
    transition: all 0.3s ease !important;
}
.investor-company-item:hover {
    border-color: rgba(57,255,20,0.3) !important;
}
.investor-company-label {
    display: block !important;
    font-size: 11px !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    color: #94A3B8 !important;
    font-weight: 600 !important;
}
.investor-company-value {
    display: block !important;
    font-size: 16px !important;
    font-weight: 700 !important;
    color: #0F172A !important;
    margin-top: 4px !important;
}

/* ---- CONTACT ---- */
.investor-contact {
    padding: 60px 0 !important;
    background: #0F172A !important;
}
.investor-contact-inner {
    text-align: center !important;
    max-width: 600px !important;
    margin: 0 auto !important;
}
.investor-contact-inner h2 {
    font-size: 28px !important;
    font-weight: 700 !important;
    color: #FFFFFF !important;
    margin: 0 0 8px !important;
    font-family: 'Inter', sans-serif !important;
}
.investor-contact-inner p {
    color: rgba(255,255,255,0.5) !important;
    font-size: 16px !important;
    margin: 0 0 24px !important;
}
.investor-contact-details {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    gap: 24px !important;
    margin-bottom: 28px !important;
}
.investor-contact-link {
    color: #39FF14 !important;
    font-size: 16px !important;
    font-weight: 500 !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}
.investor-contact-link:hover {
    color: #2DE010 !important;
    text-decoration: underline !important;
}
.investor-contact-actions {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: center !important;
    gap: 14px !important;
}
.investor-cta-btn {
    display: inline-block !important;
    padding: 14px 36px !important;
    background: #39FF14 !important;
    color: #0F172A !important;
    border-radius: 8px !important;
    font-weight: 600 !important;
    font-size: 15px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}
.investor-cta-btn:hover {
    background: #2DE010 !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 8px 30px rgba(57,255,20,0.2) !important;
}
.investor-cta-btn-outline {
    background: transparent !important;
    color: #FFFFFF !important;
    border: 1.5px solid rgba(255,255,255,0.2) !important;
}
.investor-cta-btn-outline:hover {
    background: rgba(255,255,255,0.05) !important;
    border-color: rgba(255,255,255,0.4) !important;
    box-shadow: none !important;
    transform: translateY(-2px) !important;
}

/* ---- PRINT ---- */
.investor-print {
    padding: 20px 0 !important;
    background: #FFFFFF !important;
    text-align: center !important;
    border-top: 1px solid #E2E8F0 !important;
}
.investor-print-btn {
    display: inline-block !important;
    padding: 10px 28px !important;
    background: #F8FAFC !important;
    border: 1px solid #E2E8F0 !important;
    border-radius: 8px !important;
    font-size: 14px !important;
    font-weight: 600 !important;
    color: #0F172A !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    margin-right: 16px !important;
}
.investor-print-btn:hover {
    background: #0F172A !important;
    color: #FFFFFF !important;
    border-color: #0F172A !important;
}
.investor-print-link {
    color: #6B7C93 !important;
    font-size: 14px !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
}
.investor-print-link:hover {
    color: #0F172A !important;
    text-decoration: underline !important;
}

/* ============================================
   RESPONSIVE
   ============================================ */
@media (max-width: 991px) {
    .investor-metrics-grid {
        grid-template-columns: repeat(4, 1fr) !important;
    }
    .investor-testimonials-grid {
        grid-template-columns: 1fr !important;
    }
    .investor-projects-grid {
        grid-template-columns: 1fr 1fr !important;
    }
}

@media (max-width: 768px) {
    .investor-hero h1 {
        font-size: 30px !important;
    }
    .investor-metrics-grid {
        grid-template-columns: 1fr 1fr !important;
        row-gap: 16px !important;
    }
    .investor-metric-divider {
        display: none !important;
    }
    .investor-projects-grid {
        grid-template-columns: 1fr !important;
    }
    .investor-company-grid {
        grid-template-columns: 1fr 1fr !important;
    }
    .investor-contact-details {
        flex-direction: column !important;
        gap: 12px !important;
    }
    .investor-contact-actions {
        flex-direction: column !important;
        align-items: center !important;
    }
    .investor-cta-btn {
        width: 100% !important;
        text-align: center !important;
    }
}

@media (max-width: 480px) {
    .investor-container {
        padding: 0 16px !important;
    }
    .investor-hero h1 {
        font-size: 24px !important;
    }
    .investor-metrics-grid {
        grid-template-columns: 1fr !important;
        gap: 12px !important;
    }
    .investor-metric {
        padding: 12px !important;
        background: #F8FAFC !important;
        border-radius: 8px !important;
    }
    .investor-clients-grid {
        gap: 12px !important;
    }
    .investor-client {
        padding: 8px 16px !important;
        font-size: 13px !important;
    }
    .investor-sectors-grid {
        gap: 8px !important;
    }
    .investor-sector {
        font-size: 12px !important;
        padding: 6px 14px !important;
    }
    .investor-company-grid {
        grid-template-columns: 1fr !important;
    }
    .investor-testimonial {
        padding: 18px !important;
    }
    .investor-testimonial p {
        font-size: 14px !important;
    }
    .investor-print-btn {
        width: 100% !important;
        margin-right: 0 !important;
        margin-bottom: 12px !important;
    }
    .investor-print-link {
        display: block !important;
    }
}

@media print {
    .investor-hero {
        background: #FFFFFF !important;
        border-bottom: 2px solid #E2E8F0 !important;
    }
    .investor-hero h1 {
        color: #0F172A !important;
    }
    .investor-hero p {
        color: #6B7C93 !important;
    }
    .investor-contact {
        background: #F8FAFC !important;
        border-top: 2px solid #E2E8F0 !important;
    }
    .investor-contact-inner h2 {
        color: #0F172A !important;
    }
    .investor-contact-inner p {
        color: #6B7C93 !important;
    }
    .investor-contact-link {
        color: #0F172A !important;
    }
    .investor-cta-btn {
        background: #0F172A !important;
        color: #FFFFFF !important;
    }
    .investor-cta-btn-outline {
        border-color: #0F172A !important;
        color: #0F172A !important;
    }
    .investor-print {
        display: none !important;
    }
    .investor-metric-divider {
        background: #E2E8F0 !important;
    }
    .investor-client {
        border-color: #E2E8F0 !important;
        background: #FFFFFF !important;
    }
    .investor-testimonial {
        border-color: #E2E8F0 !important;
        background: #FFFFFF !important;
    }
    .investor-project {
        border-color: #E2E8F0 !important;
        background: #FFFFFF !important;
    }
    .investor-company-item {
        border-color: #E2E8F0 !important;
        background: #FFFFFF !important;
    }
    .investor-sector {
        border-color: #E2E8F0 !important;
        background: #F8FAFC !important;
    }
}
</style>

@endsection