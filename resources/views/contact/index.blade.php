@extends('layouts.public')

@section('title', 'Contact Us - Sofel Labs')
@section('body_class', 'page-contact')

@section('content')

<!-- ============================================ -->
<!-- CONTACT HERO BANNER -->
<!-- ============================================ -->
<section class="sf-contact-hero" style="background-image: url('{{ asset('wp-content/uploads/images/contact-bg.jpg') }}');">
    <div class="sf-contact-hero-overlay"></div>
    <div class="sf-container">
        <div class="sf-contact-hero-content">
            <span class="sf-contact-hero-badge">Get in Touch</span>
            <h1 class="sf-contact-hero-title">Let's <span class="sf-text-neon">Connect</span></h1>
            <p class="sf-contact-hero-subtitle">Have a question or want to discuss a project? We'd love to hear from you.</p>
            <div class="sf-contact-hero-line"></div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CONTACT SECTION -->
<!-- ============================================ -->
<section class="sf-contact-section">
    <div class="sf-container">
        <div class="sf-contact-grid">
            <!-- Left: Contact Information -->
            <div class="sf-contact-info">
                <div class="sf-contact-info-header">
                    <span class="sf-contact-info-badge">Contact Information</span>
                    <h2 class="sf-contact-info-title">Get in <span class="sf-text-neon">Touch</span></h2>
                    <p class="sf-contact-info-text">We're here to help and answer any questions you might have. We look forward to hearing from you.</p>
                </div>

                <div class="sf-contact-details">
                    <div class="sf-contact-item">
                        <div class="sf-contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="sf-contact-item-content">
                            <h4 class="sf-contact-item-title">Address</h4>
                            <p class="sf-contact-item-text">Nairobi County, Kenya</p>
                        </div>
                    </div>
                    <div class="sf-contact-item">
                        <div class="sf-contact-icon"><i class="fas fa-envelope"></i></div>
                        <div class="sf-contact-item-content">
                            <h4 class="sf-contact-item-title">Email</h4>
                            <p class="sf-contact-item-text"><a href="mailto:mcjey103@gmail.com">mcjey103@gmail.com</a></p>
                        </div>
                    </div>
                    <div class="sf-contact-item">
                        <div class="sf-contact-icon"><i class="fas fa-phone"></i></div>
                        <div class="sf-contact-item-content">
                            <h4 class="sf-contact-item-title">Phone</h4>
                            <p class="sf-contact-item-text"><a href="tel:+254700000000">+254 700 000 000</a></p>
                        </div>
                    </div>
                    <div class="sf-contact-item">
                        <div class="sf-contact-icon"><i class="fas fa-clock"></i></div>
                        <div class="sf-contact-item-content">
                            <h4 class="sf-contact-item-title">Working Hours</h4>
                            <p class="sf-contact-item-text">Mon - Fri: 8:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                </div>

                <div class="sf-contact-social">
                    <h4 class="sf-contact-social-title">Follow Us</h4>
                    <div class="sf-contact-social-links">
                        <a href="https://www.linkedin.com/in/mwangikamau/" target="_blank" class="sf-social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://twitter.com/sofellabs" target="_blank" class="sf-social-link"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/sofellabs" target="_blank" class="sf-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.youtube.com/@sofellabs" target="_blank" class="sf-social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <!-- Right: Contact Form & Consultation -->
            <div class="sf-contact-right">
                <!-- Contact Form -->
                <div class="sf-contact-form">
                    <div class="sf-contact-form-header">
                        <span class="sf-contact-form-badge">Send a Message</span>
                        <h2 class="sf-contact-form-title">We'd Love to <span class="sf-text-neon">Hear From You</span></h2>
                        <p class="sf-contact-form-text">Fill in the form below and we'll get back to you as soon as possible.</p>
                    </div>

                    @if(session('success'))
                    <div class="sf-alert sf-alert-success">
                        <i class="fas fa-check-circle"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="sf-alert sf-alert-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST" class="sf-form">
                        @csrf

                        <div class="sf-form-row">
                            <div class="sf-form-group">
                                <label for="name" class="sf-form-label">Full Name <span class="sf-form-required">*</span></label>
                                <input type="text" id="name" name="name" class="sf-form-control @error('name') sf-form-error @enderror" placeholder="John Doe" value="{{ old('name') }}" required>
                                @error('name')
                                <span class="sf-form-error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sf-form-group">
                                <label for="email" class="sf-form-label">Email Address <span class="sf-form-required">*</span></label>
                                <input type="email" id="email" name="email" class="sf-form-control @error('email') sf-form-error @enderror" placeholder="john@example.com" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="sf-form-error-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sf-form-row">
                            <div class="sf-form-group">
                                <label for="phone" class="sf-form-label">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="sf-form-control @error('phone') sf-form-error @enderror" placeholder="+254 700 000 000" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="sf-form-error-text">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="sf-form-group">
                                <label for="subject" class="sf-form-label">Subject <span class="sf-form-required">*</span></label>
                                <input type="text" id="subject" name="subject" class="sf-form-control @error('subject') sf-form-error @enderror" placeholder="How can we help?" value="{{ old('subject') }}" required>
                                @error('subject')
                                <span class="sf-form-error-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="sf-form-group">
                            <label for="message" class="sf-form-label">Message <span class="sf-form-required">*</span></label>
                            <textarea id="message" name="message" class="sf-form-control sf-form-textarea @error('message') sf-form-error @enderror" placeholder="Write your message here..." rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                            <span class="sf-form-error-text">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="sf-form-submit">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Book a Consultation -->
                <div class="sf-consultation">
                    <div class="sf-consultation-divider">
                        <span class="sf-divider-line"></span>
                        <span class="sf-divider-text">or</span>
                        <span class="sf-divider-line"></span>
                    </div>

                    <div class="sf-consultation-content">
                        <div class="sf-consultation-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="sf-consultation-title">Book a Consultation</h3>
                        <p class="sf-consultation-text">Schedule a 30-minute discovery call to discuss your project, goals, and how we can help.</p>
                        <a href="https://cal.com/sofellabs" target="_blank" class="sf-consultation-btn">
                            <i class="fas fa-calendar-alt"></i>
                            Book Your Free Consultation
                            <span class="sf-btn-arrow">→</span>
                        </a>
                        <div class="sf-consultation-features">
                            <div class="sf-consultation-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>30-minute discovery call</span>
                            </div>
                            <div class="sf-consultation-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>No obligation, free consultation</span>
                            </div>
                            <div class="sf-consultation-feature">
                                <i class="fas fa-check-circle"></i>
                                <span>Get expert advice tailored to your needs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- CONTACT CTA -->
<!-- ============================================ -->
<section class="sf-contact-cta">
    <div class="sf-container">
        <div class="sf-contact-cta-content">
            <h2 class="sf-contact-cta-title">Ready to <span class="sf-text-neon">Transform</span> Your Learning?</h2>
            <p class="sf-contact-cta-text">Let's work together to create learning experiences that deliver real results.</p>
            <a href="mailto:mcjey103@gmail.com" class="sf-contact-cta-btn">
                Email Us Directly <span class="sf-cta-arrow">→</span>
            </a>
        </div>
    </div>
</section>

<!-- ============================================ -->
<!-- STYLES — Contact Page with Theme Colors -->
<!-- ============================================ -->
<style>
    .sf-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
    }
    .sf-text-neon {
        color: #39FF14 !important;
    }

    /* ---- Hero ---- */
    .sf-contact-hero {
        position: relative !important;
        padding: 120px 0 !important;
        background-size: cover !important;
        background-position: center !important;
        background-repeat: no-repeat !important;
        min-height: 450px !important;
        display: flex !important;
        align-items: center !important;
    }
    .sf-contact-hero-overlay {
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        background: linear-gradient(135deg, rgba(10, 6, 16, 0.88) 0%, rgba(26, 10, 24, 0.78) 100%) !important;
    }
    .sf-contact-hero-content {
        position: relative !important;
        z-index: 1 !important;
        max-width: 700px !important;
    }
    .sf-contact-hero-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 3px !important;
        color: #39FF14 !important;
        background: rgba(57, 255, 20, 0.08) !important;
        padding: 6px 22px !important;
        border-radius: 20px !important;
        margin-bottom: 18px !important;
    }
    .sf-contact-hero-title {
        font-size: 52px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
        line-height: 1.15 !important;
    }
    .sf-contact-hero-subtitle {
        font-size: 20px !important;
        color: rgba(255, 255, 255, 0.5) !important;
        margin: 0 0 20px 0 !important;
        font-weight: 300 !important;
        line-height: 1.6 !important;
    }
    .sf-contact-hero-line {
        width: 60px !important;
        height: 3px !important;
        background: #39FF14 !important;
        border-radius: 4px !important;
        margin-top: 8px !important;
    }

    /* ---- Contact Section ---- */
    .sf-contact-section {
        padding: 80px 0 !important;
        background: #FFFFFF !important;
    }
    .sf-contact-grid {
        display: grid !important;
        grid-template-columns: 1fr 1.5fr !important;
        gap: 60px !important;
        align-items: start !important;
    }

    /* ---- Contact Info ---- */
    .sf-contact-info-header {
        margin-bottom: 32px !important;
    }
    .sf-contact-info-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #39FF14 !important;
        margin-bottom: 12px !important;
    }
    .sf-contact-info-title {
        font-size: 34px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
        letter-spacing: -0.5px !important;
    }
    .sf-contact-info-text {
        font-size: 16px !important;
        line-height: 1.7 !important;
        color: #6B7C93 !important;
        margin: 0 !important;
    }
    .sf-contact-details {
        display: flex !important;
        flex-direction: column !important;
        gap: 18px !important;
        margin-bottom: 32px !important;
    }
    .sf-contact-item {
        display: flex !important;
        align-items: flex-start !important;
        gap: 16px !important;
        padding: 16px 20px !important;
        background: #F8FAFC !important;
        border-radius: 12px !important;
        transition: all 0.3s ease !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .sf-contact-item:hover {
        background: #F1F5F9 !important;
        transform: translateX(4px) !important;
    }
    .sf-contact-icon {
        width: 44px !important;
        height: 44px !important;
        border-radius: 50% !important;
        background: rgba(57, 255, 20, 0.06) !important;
        color: #39FF14 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        flex-shrink: 0 !important;
    }
    .sf-contact-item-content {
        flex: 1 !important;
    }
    .sf-contact-item-title {
        font-size: 14px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-contact-item-text {
        font-size: 14px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
    }
    .sf-contact-item-text a {
        color: #6B7C93 !important;
        text-decoration: none !important;
        transition: color 0.3s ease !important;
    }
    .sf-contact-item-text a:hover {
        color: #39FF14 !important;
    }
    .sf-contact-social {
        padding-top: 20px !important;
        border-top: 1px solid rgba(0, 0, 0, 0.03) !important;
    }
    .sf-contact-social-title {
        font-size: 14px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-contact-social-links {
        display: flex !important;
        gap: 10px !important;
    }
    .sf-social-link {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 44px !important;
        height: 44px !important;
        border-radius: 50% !important;
        border: 1px solid rgba(0, 0, 0, 0.04) !important;
        color: #6B7C93 !important;
        font-size: 16px !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
    }
    .sf-social-link:hover {
        background: #39FF14 !important;
        border-color: #39FF14 !important;
        color: #0F172A !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 16px rgba(57, 255, 20, 0.1) !important;
    }

    /* ---- Contact Right Column ---- */
    .sf-contact-right {
        display: flex !important;
        flex-direction: column !important;
        gap: 32px !important;
    }

    /* ---- Contact Form ---- */
    .sf-contact-form {
        background: #F8FAFC !important;
        padding: 40px 36px !important;
        border-radius: 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.02) !important;
    }
    .sf-contact-form-header {
        margin-bottom: 28px !important;
    }
    .sf-contact-form-badge {
        display: inline-block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        text-transform: uppercase !important;
        letter-spacing: 2.5px !important;
        color: #39FF14 !important;
        margin-bottom: 8px !important;
    }
    .sf-contact-form-title {
        font-size: 28px !important;
        font-weight: 700 !important;
        color: #0F172A !important;
        margin: 0 0 8px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-contact-form-text {
        font-size: 15px !important;
        color: #6B7C93 !important;
        margin: 0 !important;
    }
    .sf-form {
        display: flex !important;
        flex-direction: column !important;
        gap: 18px !important;
    }
    .sf-form-row {
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 18px !important;
    }
    .sf-form-group {
        display: flex !important;
        flex-direction: column !important;
        gap: 6px !important;
    }
    .sf-form-label {
        font-size: 14px !important;
        font-weight: 500 !important;
        color: #0F172A !important;
    }
    .sf-form-required {
        color: #06B6D4 !important;
    }
    .sf-form-control {
        padding: 12px 16px !important;
        border: 1px solid rgba(0, 0, 0, 0.06) !important;
        border-radius: 8px !important;
        font-size: 15px !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        transition: all 0.3s ease !important;
        background: #FFFFFF !important;
        color: #0F172A !important;
        outline: none !important;
        width: 100% !important;
    }
    .sf-form-control:focus {
        border-color: #39FF14 !important;
        box-shadow: 0 0 0 3px rgba(57, 255, 20, 0.04) !important;
    }
    .sf-form-control.sf-form-error {
        border-color: #06B6D4 !important;
    }
    .sf-form-textarea {
        resize: vertical !important;
        min-height: 120px !important;
    }
    .sf-form-error-text {
        font-size: 13px !important;
        color: #06B6D4 !important;
        margin-top: 4px !important;
    }
    .sf-form-submit {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
        padding: 14px 36px !important;
        background: #39FF14 !important;
        color: #0F172A !important;
        border: none !important;
        border-radius: 8px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        margin-top: 4px !important;
        width: fit-content !important;
    }
    .sf-form-submit:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(57, 255, 20, 0.12) !important;
    }
    .sf-form-submit i {
        font-size: 16px !important;
    }
    .sf-alert {
        padding: 14px 18px !important;
        border-radius: 8px !important;
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        margin-bottom: 20px !important;
        font-size: 15px !important;
    }
    .sf-alert-success {
        background: rgba(57, 255, 20, 0.04) !important;
        border: 1px solid rgba(57, 255, 20, 0.08) !important;
        color: #39FF14 !important;
    }
    .sf-alert-success i {
        font-size: 20px !important;
    }
    .sf-alert-error {
        background: rgba(6, 182, 212, 0.04) !important;
        border: 1px solid rgba(6, 182, 212, 0.08) !important;
        color: #06B6D4 !important;
    }
    .sf-alert-error i {
        font-size: 20px !important;
    }

    /* ---- Consultation ---- */
    .sf-consultation {
        background: #FFFFFF !important;
        border-radius: 16px !important;
        border: 2px solid rgba(57, 255, 20, 0.06) !important;
        padding: 32px 28px !important;
        position: relative !important;
        overflow: hidden !important;
    }
    .sf-consultation::before {
        content: '' !important;
        position: absolute !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        height: 4px !important;
        background: linear-gradient(90deg, #39FF14, #06B6D4) !important;
    }

    .sf-consultation-divider {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 16px !important;
        margin-bottom: 24px !important;
    }
    .sf-divider-line {
        flex: 1 !important;
        height: 1px !important;
        background: rgba(0, 0, 0, 0.04) !important;
    }
    .sf-divider-text {
        font-size: 12px !important;
        text-transform: uppercase !important;
        letter-spacing: 2px !important;
        color: #6B7C93 !important;
        font-weight: 500 !important;
    }

    .sf-consultation-icon {
        width: 64px !important;
        height: 64px !important;
        border-radius: 50% !important;
        background: rgba(57, 255, 20, 0.06) !important;
        color: #39FF14 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 28px !important;
        margin: 0 auto 16px !important;
    }
    .sf-consultation-title {
        font-size: 22px !important;
        font-weight: 600 !important;
        color: #0F172A !important;
        text-align: center !important;
        margin: 0 0 8px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-consultation-text {
        font-size: 15px !important;
        color: #6B7C93 !important;
        text-align: center !important;
        margin: 0 0 20px 0 !important;
        line-height: 1.6 !important;
    }
    .sf-consultation-btn {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 12px !important;
        padding: 14px 32px !important;
        background: #39FF14 !important;
        color: #0F172A !important;
        border: none !important;
        border-radius: 8px !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', sans-serif !important;
        transition: all 0.3s ease !important;
        width: 100% !important;
        margin-bottom: 20px !important;
    }
    .sf-consultation-btn:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(57, 255, 20, 0.12) !important;
    }
    .sf-consultation-btn .sf-btn-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }
    .sf-consultation-btn:hover .sf-btn-arrow {
        transform: translateX(4px) !important;
    }
    .sf-consultation-features {
        display: flex !important;
        flex-direction: column !important;
        gap: 8px !important;
    }
    .sf-consultation-feature {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        font-size: 14px !important;
        color: #4B5563 !important;
    }
    .sf-consultation-feature i {
        color: #39FF14 !important;
        font-size: 16px !important;
        flex-shrink: 0 !important;
    }

    /* ---- CTA ---- */
    .sf-contact-cta {
        padding: 80px 0 !important;
        background: #0F172A !important;
        border-top: 1px solid rgba(255, 255, 255, 0.02) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.02) !important;
        position: relative !important;
        overflow: hidden !important;
    }
    .sf-contact-cta-content {
        text-align: center !important;
        max-width: 700px !important;
        margin: 0 auto !important;
        position: relative !important;
        z-index: 1 !important;
    }
    .sf-contact-cta-title {
        font-size: 36px !important;
        font-weight: 700 !important;
        color: #FFFFFF !important;
        margin: 0 0 12px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }
    .sf-contact-cta-text {
        font-size: 18px !important;
        color: rgba(255, 255, 255, 0.4) !important;
        margin: 0 0 28px 0 !important;
        font-weight: 300 !important;
    }
    .sf-contact-cta-btn {
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
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
    .sf-contact-cta-btn:hover {
        background: #2DE010 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 30px rgba(57, 255, 20, 0.12) !important;
    }
    .sf-cta-arrow {
        display: inline-block !important;
        transition: transform 0.3s ease !important;
    }
    .sf-contact-cta-btn:hover .sf-cta-arrow {
        transform: translateX(4px) !important;
    }

    /* ---- Responsive ---- */
    @media (max-width: 991px) {
        .sf-contact-grid {
            grid-template-columns: 1fr !important;
            gap: 40px !important;
        }
        .sf-contact-hero-title {
            font-size: 40px !important;
        }
        .sf-contact-info-title {
            font-size: 30px !important;
        }
        .sf-contact-form-title {
            font-size: 26px !important;
        }
    }
    @media (max-width: 768px) {
        .sf-contact-hero {
            padding: 80px 0 !important;
            min-height: 350px !important;
        }
        .sf-contact-hero-title {
            font-size: 32px !important;
        }
        .sf-contact-hero-subtitle {
            font-size: 17px !important;
        }
        .sf-contact-section {
            padding: 60px 0 !important;
        }
        .sf-contact-form {
            padding: 28px 20px !important;
        }
        .sf-form-row {
            grid-template-columns: 1fr !important;
        }
        .sf-contact-details {
            gap: 14px !important;
        }
        .sf-contact-item {
            padding: 14px 16px !important;
        }
        .sf-consultation {
            padding: 24px 18px !important;
        }
        .sf-consultation-title {
            font-size: 20px !important;
        }
        .sf-contact-cta {
            padding: 60px 0 !important;
        }
        .sf-contact-cta-title {
            font-size: 28px !important;
        }
        .sf-contact-cta-text {
            font-size: 16px !important;
        }
    }
    @media (max-width: 480px) {
        .sf-container {
            padding: 0 16px !important;
        }
        .sf-contact-hero-title {
            font-size: 26px !important;
        }
        .sf-contact-hero-subtitle {
            font-size: 15px !important;
        }
        .sf-contact-hero-badge {
            font-size: 11px !important;
            padding: 4px 16px !important;
        }
        .sf-contact-hero-line {
            width: 40px !important;
            height: 2px !important;
        }
        .sf-contact-info-title {
            font-size: 26px !important;
        }
        .sf-contact-info-text {
            font-size: 14px !important;
        }
        .sf-contact-form-title {
            font-size: 22px !important;
        }
        .sf-contact-form-text {
            font-size: 14px !important;
        }
        .sf-form-control {
            font-size: 14px !important;
            padding: 10px 14px !important;
        }
        .sf-form-submit {
            width: 100% !important;
            justify-content: center !important;
        }
        .sf-consultation-title {
            font-size: 18px !important;
        }
        .sf-consultation-text {
            font-size: 14px !important;
        }
        .sf-consultation-btn {
            font-size: 14px !important;
            padding: 12px 24px !important;
        }
        .sf-contact-cta-title {
            font-size: 24px !important;
        }
        .sf-contact-cta-btn {
            padding: 12px 32px !important;
            font-size: 15px !important;
        }
    }
</style>

@endsection