<!-- ============================================ -->
<!-- FOOTER — Refined & Polished -->
<!-- ============================================ -->
<footer class="sl-footer" role="contentinfo">
    <!-- Main Footer Content -->
    <div class="sl-footer-main">
        <div class="sl-footer-container">
            <!-- Left Column: Site Map -->
            <div class="sl-footer-col">
                <h4 class="sl-footer-heading">Site Map</h4>
                <nav class="sl-footer-nav" aria-label="Footer Navigation">
                    <ul class="sl-footer-menu">
                        <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'sl-footer-active' : '' }}">How It Works</a></li>
                        <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'sl-footer-active' : '' }}">Contact Us</a></li>
                        <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'sl-footer-active' : '' }}">What We Do</a></li>
                        <li><a href="{{ route('kenya') }}">🇰🇪 Kenya</a></li>
                        <li><a href="{{ route('usa') }}">🇺🇸 USA</a></li>
                        <li><a href="{{ route('africa') }}">🌍 Africa</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Right Column: Newsletter Signup -->
            <div class="sl-footer-col">
                <h4 class="sl-footer-heading">Get Updates</h4>
                <p class="sl-footer-text">Subscribe to receive insights, case studies, and practical tips on gamification and instructional design.</p>

                <!-- Success/Error Messages -->
                <div id="footer-subscription-message"></div>

                <form id="sl-footer-form" class="sl-footer-form">
                    @csrf
                    <div class="sl-form-group">
                        <label for="sl-footer-email" class="sl-form-label">Email Address <span class="sl-form-required">*</span></label>
                        <div class="sl-form-row">
                            <input type="email" id="sl-footer-email" class="sl-form-input" name="email" placeholder="you@company.com" required aria-required="true">
                            <button type="submit" class="sl-form-btn">Subscribe</button>
                        </div>
                    </div>
                </form>

                <!-- Social Links -->
                <div class="sl-footer-social">
                    <a href="https://www.linkedin.com/in/mwangikamau/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://twitter.com/sofellabs" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.facebook.com/sofellabs" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.youtube.com/@sofellabs" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="sl-footer-bottom">
        <div class="sl-footer-container">
            <div class="sl-footer-bottom-content">
                <span class="sl-footer-copyright">&copy; {{ date('Y') }} Sofel Labs. All rights reserved.</span>
                <div class="sl-footer-legal">
                    <a href="/privacy-policy">Privacy Policy</a>
                    <span class="sl-footer-dot">·</span>
                    <a href="/terms-of-service">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ============================================ -->
<!-- STYLES — Refined Footer -->
<!-- ============================================ -->
<style>
    /* ============================================
       SL FOOTER — Clean · Professional · Dark
       ============================================ */

    /* ---- RESET ---- */
    .sl-footer {
        background-color: #0F172A !important;
        font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
        margin-top: 0 !important;
    }

    /* ---- MAIN FOOTER ---- */
    .sl-footer-main {
        padding: 60px 0 40px !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
    }

    .sl-footer-container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 24px !important;
        display: grid !important;
        grid-template-columns: 1fr 1fr !important;
        gap: 48px !important;
    }

    /* ---- COLUMNS ---- */
    .sl-footer-col {
        display: flex !important;
        flex-direction: column !important;
        gap: 16px !important;
    }

    /* ---- HEADINGS ---- */
    .sl-footer-heading {
        color: #FFFFFF !important;
        font-size: 18px !important;
        font-weight: 500 !important;
        letter-spacing: 0.5px !important;
        margin: 0 0 4px 0 !important;
        font-family: 'Cabin', 'Gill Sans Nova', sans-serif !important;
    }

    .sl-footer-text {
        color: #94A3B8 !important;
        font-size: 14px !important;
        line-height: 1.6 !important;
        margin: 0 0 4px 0 !important;
        max-width: 400px !important;
    }

    /* ---- NAVIGATION MENU ---- */
    .sl-footer-menu {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
        display: flex !important;
        flex-direction: column !important;
        gap: 6px !important;
    }

    .sl-footer-menu li {
        margin: 0 !important;
        padding: 0 !important;
    }

    .sl-footer-menu a {
        color: #94A3B8 !important;
        text-decoration: none !important;
        font-size: 15px !important;
        font-weight: 300 !important;
        transition: color 0.25s ease !important;
        display: inline-block !important;
        padding: 2px 0 !important;
        position: relative !important;
    }

    .sl-footer-menu a:hover {
        color: #40BAC8 !important;
    }

    .sl-footer-menu a.sl-footer-active {
        color: #40BAC8 !important;
    }

    /* ---- FORM ---- */
    .sl-footer-form {
        width: 100% !important;
        margin-top: 2px !important;
    }

    .sl-form-group {
        display: flex !important;
        flex-direction: column !important;
        gap: 8px !important;
        width: 100% !important;
    }

    .sl-form-label {
        color: #94A3B8 !important;
        font-size: 13px !important;
        font-weight: 400 !important;
        letter-spacing: 0.3px !important;
    }

    .sl-form-required {
        color: #ED4484 !important;
        margin-left: 2px !important;
    }

    .sl-form-row {
        display: flex !important;
        gap: 10px !important;
        width: 100% !important;
    }

    .sl-form-input {
        flex: 1 !important;
        padding: 12px 16px !important;
        border: 1px solid #1E293B !important;
        border-radius: 6px !important;
        background: rgba(255, 255, 255, 0.04) !important;
        color: #FFFFFF !important;
        font-size: 14px !important;
        font-family: inherit !important;
        transition: border-color 0.3s ease, box-shadow 0.3s ease !important;
        outline: none !important;
        min-width: 0 !important;
    }

    .sl-form-input::placeholder {
        color: #475569 !important;
        opacity: 1 !important;
    }

    .sl-form-input:focus {
        border-color: #40BAC8 !important;
        box-shadow: 0 0 0 3px rgba(64, 186, 200, 0.15) !important;
        background: rgba(255, 255, 255, 0.06) !important;
    }

    .sl-form-input:focus-visible {
        outline: none !important;
    }

    .sl-form-btn {
        padding: 12px 28px !important;
        background: #40BAC8 !important;
        color: #FFFFFF !important;
        border: none !important;
        border-radius: 6px !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        font-family: inherit !important;
        cursor: pointer !important;
        transition: all 0.3s ease !important;
        white-space: nowrap !important;
        flex-shrink: 0 !important;
    }

    .sl-form-btn:hover {
        background: #2D9AA8 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 16px rgba(64, 186, 200, 0.3) !important;
    }

    .sl-form-btn:active {
        transform: translateY(0) !important;
    }

    .sl-form-btn:disabled {
        opacity: 0.7 !important;
        cursor: not-allowed !important;
        transform: none !important;
    }

    .sl-form-success {
        background: rgba(64, 186, 200, 0.1) !important;
        border: 1px solid rgba(64, 186, 200, 0.2) !important;
        color: #40BAC8 !important;
        padding: 10px 14px !important;
        border-radius: 6px !important;
        font-size: 14px !important;
        display: none !important;
    }

    .sl-form-error {
        background: rgba(237, 68, 132, 0.1) !important;
        border: 1px solid rgba(237, 68, 132, 0.2) !important;
        color: #ED4484 !important;
        padding: 10px 14px !important;
        border-radius: 6px !important;
        font-size: 14px !important;
        display: none !important;
    }

    .sl-form-success.show,
    .sl-form-error.show {
        display: block !important;
    }

    /* ---- SOCIAL LINKS ---- */
    .sl-footer-social {
        display: flex !important;
        gap: 12px !important;
        margin-top: 8px !important;
    }

    .sl-footer-social a {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        width: 40px !important;
        height: 40px !important;
        border-radius: 50% !important;
        border: 1px solid #1E293B !important;
        color: #94A3B8 !important;
        font-size: 16px !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
    }

    .sl-footer-social a:hover {
        background: #40BAC8 !important;
        border-color: #40BAC8 !important;
        color: #FFFFFF !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 4px 16px rgba(64, 186, 200, 0.2) !important;
    }

    /* ---- BOTTOM BAR ---- */
    .sl-footer-bottom {
        background-color: #0A0F1A !important;
        padding: 18px 0 !important;
    }

    .sl-footer-bottom-content {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        flex-wrap: wrap !important;
        gap: 12px !important;
    }

    .sl-footer-copyright {
        color: #64748B !important;
        font-size: 13.5px !important;
        font-weight: 300 !important;
    }

    .sl-footer-legal {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        flex-wrap: wrap !important;
    }

    .sl-footer-legal a {
        color: #64748B !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 300 !important;
        transition: color 0.25s ease !important;
    }

    .sl-footer-legal a:hover {
        color: #94A3B8 !important;
    }

    .sl-footer-dot {
        color: #1E293B !important;
        font-size: 14px !important;
    }

    /* ---- MESSAGE STYLES ---- */
    #footer-subscription-message {
        margin-bottom: 8px !important;
    }

    .footer-msg-success {
        padding: 10px 14px !important;
        background: rgba(64, 186, 200, 0.08) !important;
        border: 1px solid rgba(64, 186, 200, 0.15) !important;
        border-radius: 6px !important;
        color: #40BAC8 !important;
        font-size: 14px !important;
        line-height: 1.5 !important;
    }

    .footer-msg-error {
        padding: 10px 14px !important;
        background: rgba(237, 68, 132, 0.08) !important;
        border: 1px solid rgba(237, 68, 132, 0.15) !important;
        border-radius: 6px !important;
        color: #ED4484 !important;
        font-size: 14px !important;
        line-height: 1.5 !important;
    }

    .footer-msg-info {
        padding: 10px 14px !important;
        background: rgba(255, 193, 7, 0.08) !important;
        border: 1px solid rgba(255, 193, 7, 0.15) !important;
        border-radius: 6px !important;
        color: #F59E0B !important;
        font-size: 14px !important;
        line-height: 1.5 !important;
    }

    /* ============================================
       RESPONSIVE
       ============================================ */
    @media (max-width: 991px) {
        .sl-footer-container {
            grid-template-columns: 1fr !important;
            gap: 36px !important;
        }

        .sl-footer-text {
            max-width: 100% !important;
        }

        .sl-footer-social {
            margin-top: 4px !important;
        }
    }

    @media (max-width: 768px) {
        .sl-footer-main {
            padding: 40px 0 28px !important;
        }

        .sl-footer-container {
            padding: 0 16px !important;
            gap: 28px !important;
        }

        .sl-footer-heading {
            font-size: 16px !important;
        }

        .sl-form-row {
            flex-direction: column !important;
        }

        .sl-form-btn {
            width: 100% !important;
            justify-content: center !important;
        }

        .sl-footer-bottom-content {
            flex-direction: column !important;
            text-align: center !important;
            gap: 8px !important;
        }

        .sl-footer-legal {
            justify-content: center !important;
        }
    }

    @media (max-width: 480px) {
        .sl-footer-main {
            padding: 30px 0 20px !important;
        }

        .sl-footer-container {
            padding: 0 12px !important;
            gap: 20px !important;
        }

        .sl-footer-menu a {
            font-size: 14px !important;
        }

        .sl-form-input {
            font-size: 13px !important;
            padding: 10px 14px !important;
        }

        .sl-form-btn {
            font-size: 13px !important;
            padding: 10px 20px !important;
        }

        .sl-footer-social a {
            width: 36px !important;
            height: 36px !important;
            font-size: 14px !important;
        }

        .sl-footer-copyright {
            font-size: 12px !important;
        }

        .sl-footer-legal a {
            font-size: 12px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- SCRIPTS — Form handling with AJAX -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const footerForm = document.getElementById('sl-footer-form');
    const messageDiv = document.getElementById('footer-subscription-message');
    const emailInput = document.getElementById('sl-footer-email');

    if (footerForm) {
        footerForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const email = emailInput.value.trim();
            const submitBtn = this.querySelector('.sl-form-btn');

            // Clear previous messages
            messageDiv.innerHTML = '';
            messageDiv.className = '';

            // Validate email
            if (!email || !email.includes('@') || !email.includes('.')) {
                emailInput.style.borderColor = '#ED4484';
                emailInput.focus();
                messageDiv.innerHTML = '<div class="footer-msg-error">Please enter a valid email address.</div>';
                return;
            }

            emailInput.style.borderColor = '#1E293B';

            // Show loading state
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Subscribing...';
            submitBtn.disabled = true;

            // Get CSRF token
            const token = document.querySelector('meta[name="csrf-token"]')?.content || '';

            // Send AJAX request
            fetch('/subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    source: 'footer'
                })
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;

                if (data.success) {
                    // Success
                    messageDiv.innerHTML = '<div class="footer-msg-success">✅ ' + data.message + '</div>';
                    emailInput.value = '';
                    emailInput.placeholder = 'Thanks for subscribing!';
                    setTimeout(function() {
                        emailInput.placeholder = 'you@company.com';
                    }, 3000);
                } else if (data.already_subscribed) {
                    // Already subscribed
                    messageDiv.innerHTML = '<div class="footer-msg-info">ℹ️ ' + data.message + '</div>';
                } else {
                    // Error
                    messageDiv.innerHTML = '<div class="footer-msg-error">❌ ' + (data.message || 'Something went wrong. Please try again.') + '</div>';
                }
            })
            .catch(error => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
                messageDiv.innerHTML = '<div class="footer-msg-error">❌ Network error. Please check your connection and try again.</div>';
                console.error('Subscription error:', error);
            });
        });

        // Reset border on focus
        if (emailInput) {
            emailInput.addEventListener('focus', function() {
                this.style.borderColor = '#40BAC8';
            });
            emailInput.addEventListener('blur', function() {
                if (!this.value.trim()) {
                    this.style.borderColor = '#1E293B';
                }
            });
        }
    }
});
</script>