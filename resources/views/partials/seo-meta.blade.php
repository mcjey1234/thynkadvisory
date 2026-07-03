<!-- Primary Meta Tags -->
<title>@yield('title', 'THYNK Advisory — Mobile & Web Apps · Geospatial · Design · Deployment')</title>
<meta name="title" content="@yield('title', 'THYNK Advisory — Mobile & Web Apps · Geospatial · Design · Deployment')">
<meta name="description" content="@yield('description', 'THYNK Advisory delivers end-to-end digital solutions: mobile apps, web applications, geospatial & GIS, instructional design, and deployment in Kenya and across Africa.')">
<meta name="keywords" content="mobile app development Kenya, web development Nairobi, GIS solutions Africa, geospatial services, eLearning platforms, instructional design, gamification, Android development, iOS development, Flutter, React Native, Laravel Kenya">
<meta name="author" content="THYNK Advisory">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large">
<meta name="googlebot" content="index, follow">
<meta name="language" content="English">
<meta name="revisit-after" content="7 days">
<link rel="canonical" href="{{ url()->current() }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title', 'THYNK Advisory — Mobile & Web Apps · Geospatial · Design · Deployment')">
<meta property="og:description" content="@yield('description', 'THYNK Advisory delivers end-to-end digital solutions: mobile apps, web applications, geospatial & GIS, instructional design, and deployment in Kenya and across Africa.')">
<meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
<meta property="og:site_name" content="THYNK Advisory">
<meta property="og:locale" content="en_KE">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="@yield('title', 'THYNK Advisory — Mobile & Web Apps · Geospatial · Design · Deployment')">
<meta name="twitter:description" content="@yield('description', 'THYNK Advisory delivers end-to-end digital solutions: mobile apps, web applications, geospatial & GIS, instructional design, and deployment in Kenya and across Africa.')">
<meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

<!-- JSON-LD: Organization Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "THYNK Advisory",
    "url": "https://thynkadvisory.co.ke",
    "logo": "{{ asset('images/logo.png') }}",
    "description": "End-to-end digital solutions provider in Kenya. Specializing in mobile apps, web applications, GIS, and instructional design.",
    "address": {
        "@type": "PostalAddress",
        "addressCountry": "KE",
        "addressLocality": "Nairobi"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "Sales",
        "email": "hello@thynkadvisory.co.ke",
        "availableLanguage": ["English", "Swahili"]
    },
    "sameAs": [
        "https://twitter.com/thynkadvisory",
        "https://linkedin.com/company/thynk-advisory"
    ]
}
</script>

<!-- JSON-LD: Website Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "THYNK Advisory",
    "url": "https://thynkadvisory.co.ke",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://thynkadvisory.co.ke/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

<!-- JSON-LD: Service Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Digital Solutions Provider",
    "description": "Mobile app development, web applications, GIS solutions, and instructional design services.",
    "provider": {
        "@type": "Organization",
        "name": "THYNK Advisory"
    },
    "serviceType": "Mobile Development, Web Development, GIS, eLearning",
    "areaServed": {
        "@type": "Country",
        "name": "Kenya"
    }
}
</script>

<!-- Verification -->
<meta name="google-site-verification" content="{{ env('GOOGLE_VERIFICATION', '') }}">
<meta name="msvalidate.01" content="{{ env('BING_VERIFICATION', '') }}">
