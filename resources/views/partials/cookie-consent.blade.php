<!-- ============================================ -->
<!-- COOKIE CONSENT BANNER - Sofel Labs Theme -->
<!-- Neon Green + Forest Green + White -->
<!-- ============================================ -->

@if(config('app.env') === 'production' || true)
<div id="cookie-banner" style="position:fixed; bottom:0; left:0; right:0; z-index:99999; font-family:'Gill Sans Nova','Inter',sans-serif; transform:translateY(0); transition:transform 0.5s ease;">
    <div style="background:linear-gradient(135deg, #0F172A 0%, #1a2a1a 100%); padding:24px 20px; border-top:4px solid #39FF14; box-shadow:0 -8px 40px rgba(57,255,20,0.08);">
        <div style="max-width:1200px; margin:0 auto; display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:20px;">
            
            <!-- Left: Text -->
            <div style="flex:1; min-width:250px;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:6px;">
                    <span style="font-size:28px;">🍪</span>
                    <span style="font-size:14px; font-weight:700; color:#39FF14; letter-spacing:1px; text-transform:uppercase; font-family:'Gill Sans Nova',sans-serif;">Cookie Consent</span>
                </div>
                <p style="margin:0; font-size:14px; color:#94A3B8; line-height:1.6; max-width:600px; font-family:'Gill Sans Nova',sans-serif;">
                    We use cookies to enhance your experience, personalize content, and analyze our traffic. 
                    <a href="/privacy-policy" style="color:#39FF14; text-decoration:none; font-weight:500; border-bottom:1px solid rgba(57,255,20,0.2); transition:border-color 0.3s;">
                        Learn more
                    </a>
                </p>
            </div>
            
            <!-- Right: Buttons -->
            <div style="display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                <!-- Settings Button -->
                <button onclick="showCookieSettings()" style="padding:8px 20px; background:transparent; border:1px solid #2a4a2a; border-radius:8px; color:#94A3B8; font-size:13px; font-weight:500; cursor:pointer; transition:all 0.3s; font-family:'Gill Sans Nova',sans-serif;">
                    ⚙️ Settings
                </button>
                
                <!-- Decline Button -->
                <button onclick="declineCookies()" style="padding:8px 24px; background:transparent; border:1px solid #2a4a2a; border-radius:8px; color:#94A3B8; font-size:13px; font-weight:500; cursor:pointer; transition:all 0.3s; font-family:'Gill Sans Nova',sans-serif;">
                    Decline
                </button>
                
                <!-- Accept Button -->
                <button onclick="acceptAllCookies()" style="padding:10px 32px; background:linear-gradient(135deg, #39FF14, #1a7a0a); border:none; border-radius:8px; color:#0F172A; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.3s; box-shadow:0 4px 20px rgba(57,255,20,0.2); font-family:'Gill Sans Nova',sans-serif;">
                    Accept All
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Cookie Settings Modal -->
<div id="cookie-settings" style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(15,23,42,0.85); backdrop-filter:blur(8px); z-index:100000; align-items:center; justify-content:center;">
    <div style="background:#FFFFFF; border-radius:16px; max-width:500px; width:90%; padding:32px 28px; box-shadow:0 20px 60px rgba(0,0,0,0.4); max-height:90vh; overflow-y:auto; border:1px solid rgba(57,255,20,0.1);">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
            <h2 style="font-size:22px; font-weight:700; color:#0F172A; margin:0; font-family:'Gill Sans Nova',sans-serif;">
                🍪 Cookie Settings
            </h2>
            <button onclick="closeCookieSettings()" style="background:none; border:none; font-size:24px; color:#94A3B8; cursor:pointer; padding:4px 8px; transition:color 0.3s;">
                ✕
            </button>
        </div>
        
        <p style="color:#4B5563; font-size:14px; line-height:1.6; margin-bottom:24px; font-family:'Gill Sans Nova',sans-serif;">
            Choose which cookies you want to allow. Essential cookies are always enabled.
        </p>
        
        <!-- Essential Cookies -->
        <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #F1F5F9;">
            <div>
                <h4 style="font-size:15px; font-weight:600; color:#0F172A; margin:0; font-family:'Gill Sans Nova',sans-serif;">Essential</h4>
                <p style="font-size:13px; color:#6B7C93; margin:4px 0 0; font-family:'Gill Sans Nova',sans-serif;">Always enabled for site functionality</p>
            </div>
            <span style="background:#E2E8F0; padding:2px 12px; border-radius:4px; font-size:12px; color:#475569; font-weight:600; font-family:'Gill Sans Nova',sans-serif;">Always On</span>
        </div>
        
        <!-- Analytics Cookies -->
        <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #F1F5F9;">
            <div>
                <h4 style="font-size:15px; font-weight:600; color:#0F172A; margin:0; font-family:'Gill Sans Nova',sans-serif;">Analytics</h4>
                <p style="font-size:13px; color:#6B7C93; margin:4px 0 0; font-family:'Gill Sans Nova',sans-serif;">Help us understand how you use our site</p>
            </div>
            <label style="position:relative; display:inline-block; width:50px; height:28px;">
                <input type="checkbox" id="analytics-cookies" checked style="opacity:0; width:0; height:0;">
                <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background:#E2E8F0; border-radius:14px; transition:0.3s; box-shadow:inset 0 2px 4px rgba(0,0,0,0.05);"></span>
                <span style="position:absolute; cursor:pointer; top:3px; left:3px; width:22px; height:22px; background:#FFFFFF; border-radius:50%; transition:0.3s; box-shadow:0 2px 4px rgba(0,0,0,0.1);"></span>
            </label>
        </div>
        
        <!-- Marketing Cookies -->
        <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #F1F5F9;">
            <div>
                <h4 style="font-size:15px; font-weight:600; color:#0F172A; margin:0; font-family:'Gill Sans Nova',sans-serif;">Marketing</h4>
                <p style="font-size:13px; color:#6B7C93; margin:4px 0 0; font-family:'Gill Sans Nova',sans-serif;">Show relevant ads and content</p>
            </div>
            <label style="position:relative; display:inline-block; width:50px; height:28px;">
                <input type="checkbox" id="marketing-cookies" checked style="opacity:0; width:0; height:0;">
                <span style="position:absolute; cursor:pointer; top:0; left:0; right:0; bottom:0; background:#E2E8F0; border-radius:14px; transition:0.3s; box-shadow:inset 0 2px 4px rgba(0,0,0,0.05);"></span>
                <span style="position:absolute; cursor:pointer; top:3px; left:3px; width:22px; height:22px; background:#FFFFFF; border-radius:50%; transition:0.3s; box-shadow:0 2px 4px rgba(0,0,0,0.1);"></span>
            </label>
        </div>
        
        <!-- Save Button -->
        <button onclick="saveCookieSettings()" style="width:100%; padding:12px; margin-top:20px; background:linear-gradient(135deg, #39FF14, #1a7a0a); border:none; border-radius:8px; color:#0F172A; font-size:15px; font-weight:600; cursor:pointer; transition:all 0.3s; font-family:'Gill Sans Nova',sans-serif; box-shadow:0 4px 16px rgba(57,255,20,0.15);">
            Save Preferences
        </button>
    </div>
</div>

<!-- Toggle Switch Styles -->
<style>
    #analytics-cookies:checked + span {
        background: linear-gradient(135deg, #39FF14, #1a7a0a) !important;
    }
    #analytics-cookies:checked + span + span {
        transform: translateX(22px) !important;
    }
    #marketing-cookies:checked + span {
        background: linear-gradient(135deg, #39FF14, #1a7a0a) !important;
    }
    #marketing-cookies:checked + span + span {
        transform: translateX(22px) !important;
    }
    
    @media (max-width: 768px) {
        #cookie-banner > div {
            padding: 20px 16px !important;
        }
        #cookie-banner > div > div {
            flex-direction: column !important;
            align-items: stretch !important;
        }
        #cookie-banner button {
            width: 100% !important;
            justify-content: center !important;
        }
    }
</style>

<!-- Cookie Consent Script -->
<script>
    // Check if consent was already given
    const cookieConsent = localStorage.getItem('cookieConsent');
    
    if (cookieConsent === 'true' || cookieConsent === 'false') {
        document.getElementById('cookie-banner').style.display = 'none';
    }
    
    function acceptAllCookies() {
        localStorage.setItem('cookieConsent', 'true');
        localStorage.setItem('analyticsCookies', 'true');
        localStorage.setItem('marketingCookies', 'true');
        document.getElementById('cookie-banner').style.display = 'none';
        // Reload to load tracking scripts
        location.reload();
    }
    
    function declineCookies() {
        localStorage.setItem('cookieConsent', 'false');
        localStorage.setItem('analyticsCookies', 'false');
        localStorage.setItem('marketingCookies', 'false');
        document.getElementById('cookie-banner').style.display = 'none';
        location.reload();
    }
    
    function showCookieSettings() {
        document.getElementById('cookie-settings').style.display = 'flex';
    }
    
    function closeCookieSettings() {
        document.getElementById('cookie-settings').style.display = 'none';
    }
    
    function saveCookieSettings() {
        const analytics = document.getElementById('analytics-cookies').checked;
        const marketing = document.getElementById('marketing-cookies').checked;
        
        localStorage.setItem('cookieConsent', 'true');
        localStorage.setItem('analyticsCookies', analytics ? 'true' : 'false');
        localStorage.setItem('marketingCookies', marketing ? 'true' : 'false');
        
        document.getElementById('cookie-settings').style.display = 'none';
        document.getElementById('cookie-banner').style.display = 'none';
        location.reload();
    }
    
    // Load saved settings
    document.addEventListener('DOMContentLoaded', function() {
        const analyticsSetting = localStorage.getItem('analyticsCookies');
        const marketingSetting = localStorage.getItem('marketingCookies');
        
        if (analyticsSetting !== null) {
            document.getElementById('analytics-cookies').checked = analyticsSetting === 'true';
        }
        if (marketingSetting !== null) {
            document.getElementById('marketing-cookies').checked = marketingSetting === 'true';
        }
    });
</script>
@endif
