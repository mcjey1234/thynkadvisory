<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Thynk Advisory')</title>

{{-- ===== CSRF TOKEN ===== --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8335787923057820"
     crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Gill+Sans+Nova:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,600,700&display=fallback" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- ===== ALL EXTERNAL CSS FROM RAW HTML ===== -->
    <!-- Astra Theme -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/themes/astra/assets/css/minified/main.min.css?ver=3.7.7" media="all">
    
    <!-- WordPress Emoji & Global Styles -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-includes/css/dashicons.min.css?ver=7.0" media="all">
    
    <!-- Elementor Core -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.48.0" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/frontend.min.css?ver=4.0.9" media="all">
    
    <!-- Elementor Pro -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor-pro/assets/css/frontend.min.css?ver=3.22.1" media="all">
    
    <!-- Elementor Animations -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/animations/styles/fadeInUp.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/animations/styles/fadeIn.min.css?ver=4.0.9" media="all">
    
    <!-- Elementor Widgets -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/widget-heading.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/widget-image.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/conditionals/shapes.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/widget-icon-list.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/widget-testimonial.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/widget-social-icons.min.css?ver=4.0.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/css/conditionals/apple-webkit.min.css?ver=4.0.9" media="all">
    
    <!-- Elementor Uploads (Your Page CSS) -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/css/post-10677.css?ver=1779820702" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/css/post-12381.css?ver=1779820702" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/css/post-12225.css?ver=1779820702" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/css/post-10872.css?ver=1779820702" media="all">
    
    <!-- Font Awesome (from Elementor) -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/font-awesome/css/font-awesome.min.css?ver=4.7.0" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/font-awesome/css/all.min.css?ver=5.15.3" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/font-awesome/css/v4-shims.min.css?ver=4.0.9" media="all">
    
    <!-- Happy Addons -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/happy-elementor-addons/assets/fonts/style.min.css?ver=3.21.4" media="all">
    
    <!-- WPForms -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/wpforms-lite/assets/css/frontend/classic/wpforms-full.min.css?ver=1.10.0.5" media="all">
    
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/themes/42comets/style.css?ver=1.0.0" media="all">
    
    <!-- Elementor Custom CSS (from raw HTML) -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/google-fonts/css/roboto.css?ver=1744826369" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/google-fonts/css/robotoslab.css?ver=1744826370" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/google-fonts/css/cabin.css?ver=1744826371" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/google-fonts/css/alegreyasans.css?ver=1744828576" media="all">
    
    <!-- Additional Icons -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css?ver=5.15.3" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/font-awesome/css/solid.min.css?ver=5.15.3" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/elementor/assets/lib/font-awesome/css/brands.min.css?ver=5.15.3" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/happy-elementor-addons/assets/fonts/style.min.css?ver=3.21.4" media="all">
    
    <!-- Sticky Header Effects -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/sticky-header-effects-for-elementor/assets/css/she-header-style.css?ver=2.1.8" media="all">
    
    <!-- ECSS Styles -->
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/plugins/ele-custom-skin/assets/css/ecs-style.css?ver=3.1.9" media="all">
    <link rel="stylesheet" href="{{ url('/') }}/wp-content/uploads/elementor/css/post-11464.css?ver=1645476402" media="all">
    
    <!-- ===== ASTRA THEME INLINE CSS ===== -->
    <style id="astra-theme-css-inline-css">
    html{font-size:112.5%;}a,.page-title{color:#40bac8;}a:hover,a:focus{color:#40bac8;}body,button,input,select,textarea,.ast-button,.ast-custom-button{font-family:'Cabin',sans-serif;font-weight:400;font-size:18px;font-size:1rem;}blockquote{color:#000000;}h1,.entry-content h1,h2,.entry-content h2,h3,.entry-content h3,h4,.entry-content h4,h5,.entry-content h5,h6,.entry-content h6,.site-title,.site-title a{font-family:'Cabin',sans-serif;font-weight:400;}.site-title{font-size:35px;font-size:1.9444444444444rem;display:block;}.ast-archive-description .ast-archive-title{font-size:40px;font-size:2.2222222222222rem;}.site-header .site-description{font-size:15px;font-size:0.83333333333333rem;display:none;}.entry-title{font-size:30px;font-size:1.6666666666667rem;}h1,.entry-content h1{font-size:40px;font-size:2.2222222222222rem;font-weight:400;font-family:'Cabin',sans-serif;}h2,.entry-content h2{font-size:30px;font-size:1.6666666666667rem;font-weight:400;font-family:'Cabin',sans-serif;}h3,.entry-content h3{font-size:25px;font-size:1.3888888888889rem;font-weight:400;font-family:'Cabin',sans-serif;}h4,.entry-content h4{font-size:20px;font-size:1.1111111111111rem;font-weight:400;font-family:'Cabin',sans-serif;}h5,.entry-content h5{font-size:18px;font-size:1rem;font-weight:400;font-family:'Cabin',sans-serif;}h6,.entry-content h6{font-size:15px;font-size:0.83333333333333rem;font-weight:400;font-family:'Cabin',sans-serif;}.ast-single-post .entry-title,.page-title{font-size:30px;font-size:1.6666666666667rem;}::selection{background-color:#40bac8;color:#000000;}body,h1,.entry-title a,.entry-content h1,h2,.entry-content h2,h3,.entry-content h3,h4,.entry-content h4,h5,.entry-content h5,h6,.entry-content h6{color:#404040;}.tagcloud a:hover,.tagcloud a:focus,.tagcloud a.current-item{color:#000000;border-color:#40bac8;background-color:#40bac8;}input:focus,input[type="text"]:focus,input[type="email"]:focus,input[type="url"]:focus,input[type="password"]:focus,input[type="reset"]:focus,input[type="search"]:focus,textarea:focus{border-color:#40bac8;}input[type="radio"]:checked,input[type=reset],input[type="checkbox"]:checked,input[type="checkbox"]:hover:checked,input[type="checkbox"]:focus:checked,input[type=range]::-webkit-slider-thumb{border-color:#40bac8;background-color:#40bac8;box-shadow:none;}.site-footer a:hover + .post-count,.site-footer a:focus + .post-count{background:#40bac8;border-color:#40bac8;}.single .nav-links .nav-previous,.single .nav-links .nav-next{color:#40bac8;}.entry-meta,.entry-meta *{line-height:1.45;color:#40bac8;}.entry-meta a:hover,.entry-meta a:hover *,.entry-meta a:focus,.entry-meta a:focus *,.page-links > .page-link,.page-links .page-link:hover,.post-navigation a:hover{color:#40bac8;}#cat option,.secondary .calendar_wrap thead a,.secondary .calendar_wrap thead a:visited{color:#40bac8;}.secondary .calendar_wrap #today,.ast-progress-val span{background:#40bac8;}.secondary a:hover + .post-count,.secondary a:focus + .post-count{background:#40bac8;border-color:#40bac8;}.calendar_wrap #today > a{color:#000000;}.page-links .page-link,.single .post-navigation a{color:#40bac8;}.ast-archive-title{color:#404040;}.widget-title{font-size:25px;font-size:1.3888888888889rem;color:#404040;}.ast-single-post .entry-content a,.ast-comment-content a:not(.ast-comment-edit-reply-wrap a){text-decoration:underline;}.ast-single-post .wp-block-button .wp-block-button__link,.ast-single-post .elementor-button-wrapper .elementor-button,.ast-single-post .entry-content .uagb-tab a,.ast-single-post .entry-content .uagb-ifb-cta a,.ast-single-post .entry-content .wp-block-uagb-buttons a,.ast-single-post .entry-content .uabb-module-content a,.ast-single-post .entry-content .uagb-post-grid a,.ast-single-post .entry-content .uagb-timeline a,.ast-single-post .entry-content .uagb-toc__wrap a,.ast-single-post .entry-content .uagb-taxomony-box a,.ast-single-post .entry-content .woocommerce a{text-decoration:none;}.ast-logo-title-inline .site-logo-img{padding-right:1em;}.site-logo-img img{ transition:all 0.2s linear;}.ast-page-builder-template .hentry {margin: 0;}.ast-page-builder-template .site-content > .ast-container {max-width: 100%;padding: 0;}.ast-page-builder-template .site-content #primary {padding: 0;margin: 0;}.ast-page-builder-template .no-results {text-align: center;margin: 4em auto;}.ast-page-builder-template .ast-pagination {padding: 2em;}.ast-page-builder-template .entry-header.ast-no-title.ast-no-thumbnail {margin-top: 0;}.ast-page-builder-template .entry-header.ast-header-without-markup {margin-top: 0;margin-bottom: 0;}.ast-page-builder-template .entry-header.ast-no-title.ast-no-meta {margin-bottom: 0;}.ast-page-builder-template.single .post-navigation {padding-bottom: 2em;}.ast-page-builder-template.single-post .site-content > .ast-container {max-width: 100%;}.ast-page-builder-template .entry-header {margin-top: 4em;margin-left: auto;margin-right: auto;padding-left: 20px;padding-right: 20px;}.ast-page-builder-template .ast-archive-description {margin-top: 4em;margin-left: auto;margin-right: auto;padding-left: 20px;padding-right: 20px;}.single.ast-page-builder-template .entry-header {padding-left: 20px;padding-right: 20px;}@media (max-width:921px){#ast-desktop-header{display:none;}}@media (min-width:921px){#ast-mobile-header{display:none;}}.wp-block-buttons.aligncenter{justify-content:center;}@media (min-width:1200px){.wp-block-group .has-background{padding:20px;}}@media (min-width:1200px){.ast-plain-container.ast-no-sidebar .entry-content .alignwide .wp-block-cover__inner-container,.ast-plain-container.ast-no-sidebar .entry-content .alignfull .wp-block-cover__inner-container{width:1540px;}}@media (min-width:1200px){.wp-block-cover-image.alignwide .wp-block-cover__inner-container,.wp-block-cover.alignwide .wp-block-cover__inner-container,.wp-block-cover-image.alignfull .wp-block-cover__inner-container,.wp-block-cover.alignfull .wp-block-cover__inner-container{width:100%;}}.ast-plain-container.ast-no-sidebar #primary{margin-top:0;margin-bottom:0;}@media (max-width:921px){.ast-theme-transparent-header #primary,.ast-theme-transparent-header #secondary{padding:0;}}.wp-block-columns{margin-bottom:unset;}.wp-block-image.size-full{margin:2rem 0;}.wp-block-separator.has-background{padding:0;}.wp-block-gallery{margin-bottom:1.6em;}.wp-block-group{padding-top:4em;padding-bottom:4em;}.wp-block-group__inner-container .wp-block-columns:last-child,.wp-block-group__inner-container :last-child,.wp-block-table table{margin-bottom:0;}.blocks-gallery-grid{width:100%;}.wp-block-navigation-link__content{padding:5px 0;}.wp-block-group .wp-block-group .has-text-align-center,.wp-block-group .wp-block-column .has-text-align-center{max-width:100%;}.has-text-align-center{margin:0 auto;}@media (max-width:1200px){.wp-block-group{padding:3em;}.wp-block-group .wp-block-group{padding:1.5em;}.wp-block-columns,.wp-block-column{margin:1rem 0;}}@media (min-width:921px){.wp-block-columns .wp-block-group{padding:2em;}}@media (max-width:544px){.wp-block-cover-image .wp-block-cover__inner-container,.wp-block-cover .wp-block-cover__inner-container{width:unset;}.wp-block-cover,.wp-block-cover-image{padding:2em 0;}.wp-block-group,.wp-block-cover{padding:2em;}.wp-block-media-text__media img,.wp-block-media-text__media video{width:unset;max-width:100%;}.wp-block-media-text.has-background .wp-block-media-text__content{padding:1em;}}@media (max-width:921px){.ast-plain-container.ast-no-sidebar #primary{padding:0;}}@media (min-width:544px){.entry-content .wp-block-media-text.has-media-on-the-right .wp-block-media-text__content{padding:0 8% 0 0;}.entry-content .wp-block-media-text .wp-block-media-text__content{padding:0 0 0 8%;}.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-left > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-right > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-left > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-right > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-right > *,.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-left > *{margin:0;}}@media (max-width:544px){.entry-content .wp-block-media-text .wp-block-media-text__content{padding:8% 0;}.wp-block-media-text .wp-block-media-text__media img{width:auto;max-width:100%;}}.wp-block-button.is-style-outline .wp-block-button__link{border-color:#40bac8;border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;}.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color),.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color){color:#40bac8;}.wp-block-button.is-style-outline .wp-block-button__link:hover,.wp-block-button.is-style-outline .wp-block-button__link:focus{color:var(--ast-global-color-5) !important;background-color:#40bac8;border-color:#40bac8;}.post-page-numbers.current .page-link,.ast-pagination .page-numbers.current{color:#000000;border-color:#40bac8;background-color:#40bac8;border-radius:2px;}@media (min-width:544px){.entry-content > .alignleft{margin-right:20px;}.entry-content > .alignright{margin-left:20px;}}.wp-block-button.is-style-outline .wp-block-button__link{border-top-width:0;border-right-width:0;border-bottom-width:0;border-left-width:0;}h1.widget-title{font-weight:400;}h2.widget-title{font-weight:400;}h3.widget-title{font-weight:400;}@media (max-width:921px){.ast-separate-container .ast-article-post,.ast-separate-container .ast-article-single{padding:1.5em 2.14em;}.ast-separate-container #primary,.ast-separate-container #secondary{padding:1.5em 0;}#primary,#secondary{padding:1.5em 0;margin:0;}.ast-left-sidebar #content > .ast-container{display:flex;flex-direction:column-reverse;width:100%;}.ast-author-box img.avatar{margin:20px 0 0 0;}}@media (min-width:922px){.ast-separate-container.ast-right-sidebar #primary,.ast-separate-container.ast-left-sidebar #primary{border:0;}.search-no-results.ast-separate-container #primary{margin-bottom:4em;}}.elementor-button-wrapper .elementor-button{border-style:solid;text-decoration:none;border-top-width:0;border-right-width:0;border-left-width:0;border-bottom-width:0;}body .elementor-button.elementor-size-sm,body .elementor-button.elementor-size-xs,body .elementor-button.elementor-size-md,body .elementor-button.elementor-size-lg,body .elementor-button.elementor-size-xl,body .elementor-button{border-radius:30px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;}.elementor-button-wrapper .elementor-button{border-color:#40bac8;background-color:#40bac8;}.elementor-button-wrapper .elementor-button:hover,.elementor-button-wrapper .elementor-button:focus{color:var(--ast-global-color-5);background-color:#40bac8;border-color:#40bac8;}.wp-block-button .wp-block-button__link ,.elementor-button-wrapper .elementor-button,.elementor-button-wrapper .elementor-button:visited{color:var(--ast-global-color-5);}.elementor-button-wrapper .elementor-button{font-family:inherit;font-weight:inherit;line-height:1;}.wp-block-button .wp-block-button__link:hover,.wp-block-button .wp-block-button__link:focus{color:var(--ast-global-color-5);background-color:#40bac8;border-color:#40bac8;}.wp-block-button .wp-block-button__link{border-style:solid;border-top-width:0;border-right-width:0;border-left-width:0;border-bottom-width:0;border-color:#40bac8;background-color:#40bac8;color:var(--ast-global-color-5);font-family:inherit;font-weight:inherit;line-height:1;border-radius:30px;}.wp-block-buttons .wp-block-button .wp-block-button__link{padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;}.menu-toggle,button,.ast-button,.ast-custom-button,.button,input#submit,input[type="button"],input[type="submit"],input[type="reset"],form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button,body .wp-block-file .wp-block-file__button{border-style:solid;border-top-width:0;border-right-width:0;border-left-width:0;border-bottom-width:0;color:var(--ast-global-color-5);border-color:#40bac8;background-color:#40bac8;border-radius:30px;padding-top:10px;padding-right:20px;padding-bottom:10px;padding-left:20px;font-family:inherit;font-weight:inherit;line-height:1;}button:focus,.menu-toggle:hover,button:hover,.ast-button:hover,.ast-custom-button:hover .button:hover,.ast-custom-button:hover ,input[type=reset]:hover,input[type=reset]:focus,input#submit:hover,input#submit:focus,input[type="button"]:hover,input[type="button"]:focus,input[type="submit"]:hover,input[type="submit"]:focus,form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:hover,form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:focus,body .wp-block-file .wp-block-file__button:hover,body .wp-block-file .wp-block-file__button:focus{color:var(--ast-global-color-5);background-color:#40bac8;border-color:#40bac8;}@media (min-width:544px){.ast-container{max-width:100%;}}@media (max-width:544px){.ast-separate-container .ast-article-post,.ast-separate-container .ast-article-single,.ast-separate-container .comments-title,.ast-separate-container .ast-archive-description{padding:1.5em 1em;}.ast-separate-container #content .ast-container{padding-left:0.54em;padding-right:0.54em;}.ast-separate-container .ast-comment-list li.depth-1{padding:1.5em 1em;margin-bottom:1.5em;}.ast-separate-container .ast-comment-list .bypostauthor{padding:.5em;}.ast-search-menu-icon.ast-dropdown-active .search-field{width:170px;}}@media (max-width:921px){.ast-mobile-header-stack .main-header-bar .ast-search-menu-icon{display:inline-block;}.ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon{margin:0;}.ast-comment-avatar-wrap img{max-width:2.5em;}.ast-separate-container .ast-comment-list li.depth-1{padding:1.5em 2.14em;}.ast-separate-container .comment-respond{padding:2em 2.14em;}.ast-comment-meta{padding:0 1.8888em 1.3333em;}}.entry-content > .wp-block-group,.entry-content > .wp-block-media-text,.entry-content > .wp-block-cover,.entry-content > .wp-block-columns{max-width:58em;width:calc(100% - 4em);margin-left:auto;margin-right:auto;}.entry-content [class*="__inner-container"] > .alignfull{max-width:100%;margin-left:0;margin-right:0;}.entry-content [class*="__inner-container"] > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright){margin-left:auto;margin-right:auto;}.entry-content [class*="__inner-container"] > *:not(.alignwide):not(p):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(iframe){max-width:50rem;width:100%;}@media (min-width:921px){.entry-content > .wp-block-group.alignwide.has-background,.entry-content > .wp-block-group.alignfull.has-background,.entry-content > .wp-block-cover.alignwide,.entry-content > .wp-block-cover.alignfull,.entry-content > .wp-block-columns.has-background.alignwide,.entry-content > .wp-block-columns.has-background.alignfull{margin-top:0;margin-bottom:0;padding:6em 4em;}.entry-content > .wp-block-columns.has-background{margin-bottom:0;}}@media (min-width:1200px){.entry-content .alignfull p{max-width:1500px;}.entry-content .alignfull{max-width:100%;width:100%;}.ast-page-builder-template .entry-content .alignwide,.entry-content [class*="__inner-container"] > .alignwide{max-width:1500px;margin-left:0;margin-right:0;}.entry-content .alignfull [class*="__inner-container"] > .alignwide{max-width:80rem;}}@media (min-width:545px){.site-main .entry-content > .alignwide{margin:0 auto;}.wp-block-group.has-background,.entry-content > .wp-block-cover,.entry-content > .wp-block-columns.has-background{padding:4em;margin-top:0;margin-bottom:0;}.entry-content .wp-block-media-text.alignfull .wp-block-media-text__content,.entry-content .wp-block-media-text.has-background .wp-block-media-text__content{padding:0 8%;}}@media (max-width:921px){.site-title{display:block;}.ast-archive-description .ast-archive-title{font-size:40px;}.site-header .site-description{display:none;}.entry-title{font-size:30px;}h1,.entry-content h1{font-size:30px;}h2,.entry-content h2{font-size:25px;}h3,.entry-content h3{font-size:20px;}.ast-single-post .entry-title,.page-title{font-size:30px;}}@media (max-width:544px){.site-title{display:block;}.ast-archive-description .ast-archive-title{font-size:40px;}.site-header .site-description{display:none;}.entry-title{font-size:30px;}h1,.entry-content h1{font-size:30px;}h2,.entry-content h2{font-size:25px;}h3,.entry-content h3{font-size:20px;}.ast-single-post .entry-title,.page-title{font-size:30px;}}@media (max-width:921px){html{font-size:102.6%;}}@media (max-width:544px){html{font-size:102.6%;}}@media (min-width:922px){.ast-container{max-width:1540px;}}@media (min-width:922px){.site-content .ast-container{display:flex;}}@media (max-width:921px){.site-content .ast-container{flex-direction:column;}}@media (min-width:922px){.main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover > .sub-menu,.main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus > .sub-menu{margin-left:-0px;}}.wp-block-search {margin-bottom: 20px;}.wp-block-site-tagline {margin-top: 20px;}form.wp-block-search .wp-block-search__input,.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper,.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper {border-color: #eaeaea;background: #fafafa;}.wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper .wp-block-search__input:focus,.wp-block-loginout input:focus {outline: thin dotted;}.wp-block-loginout input:focus {border-color: transparent;} form.wp-block-search .wp-block-search__inside-wrapper .wp-block-search__input {padding: 12px;}form.wp-block-search .wp-block-search__button svg {fill: currentColor;width: 20px;height: 20px;}.wp-block-loginout p label {display: block;}.wp-block-loginout p:not(.login-remember):not(.login-submit) input {width: 100%;}.wp-block-loginout .login-remember input {width: 1.1rem;height: 1.1rem;margin: 0 5px 4px 0;vertical-align: middle;}body .wp-block-file .wp-block-file__button {text-decoration: none;}blockquote {padding: 0 1.2em 1.2em;}.wp-block-file {display: flex;align-items: center;flex-wrap: wrap;justify-content: space-between;}.wp-block-pullquote {border: none;}.wp-block-pullquote blockquote::before {content: "\201D";font-family: "Helvetica",sans-serif;display: flex;transform: rotate( 180deg );font-size: 6rem;font-style: normal;line-height: 1;font-weight: bold;align-items: center;justify-content: center;}figure.wp-block-pullquote.is-style-solid-color blockquote {max-width: 100%;text-align: inherit;}ul.wp-block-categories-list.wp-block-categories,ul.wp-block-archives-list.wp-block-archives {list-style-type: none;}.wp-block-button__link {border: 2px solid currentColor;}ul,ol {margin-left: 20px;}figure.alignright figcaption {text-align: right;}:root .has-ast-global-color-0-color{color:var(--ast-global-color-0);}:root .has-ast-global-color-0-background-color{background-color:var(--ast-global-color-0);}:root .wp-block-button .has-ast-global-color-0-color{color:var(--ast-global-color-0);}:root .wp-block-button .has-ast-global-color-0-background-color{background-color:var(--ast-global-color-0);}:root .has-ast-global-color-1-color{color:var(--ast-global-color-1);}:root .has-ast-global-color-1-background-color{background-color:var(--ast-global-color-1);}:root .wp-block-button .has-ast-global-color-1-color{color:var(--ast-global-color-1);}:root .wp-block-button .has-ast-global-color-1-background-color{background-color:var(--ast-global-color-1);}:root .has-ast-global-color-2-color{color:var(--ast-global-color-2);}:root .has-ast-global-color-2-background-color{background-color:var(--ast-global-color-2);}:root .wp-block-button .has-ast-global-color-2-color{color:var(--ast-global-color-2);}:root .wp-block-button .has-ast-global-color-2-background-color{background-color:var(--ast-global-color-2);}:root .has-ast-global-color-3-color{color:var(--ast-global-color-3);}:root .has-ast-global-color-3-background-color{background-color:var(--ast-global-color-3);}:root .wp-block-button .has-ast-global-color-3-color{color:var(--ast-global-color-3);}:root .wp-block-button .has-ast-global-color-3-background-color{background-color:var(--ast-global-color-3);}:root .has-ast-global-color-4-color{color:var(--ast-global-color-4);}:root .has-ast-global-color-4-background-color{background-color:var(--ast-global-color-4);}:root .wp-block-button .has-ast-global-color-4-color{color:var(--ast-global-color-4);}:root .wp-block-button .has-ast-global-color-4-background-color{background-color:var(--ast-global-color-4);}:root .has-ast-global-color-5-color{color:var(--ast-global-color-5);}:root .has-ast-global-color-5-background-color{background-color:var(--ast-global-color-5);}:root .wp-block-button .has-ast-global-color-5-color{color:var(--ast-global-color-5);}:root .wp-block-button .has-ast-global-color-5-background-color{background-color:var(--ast-global-color-5);}:root .has-ast-global-color-6-color{color:var(--ast-global-color-6);}:root .has-ast-global-color-6-background-color{background-color:var(--ast-global-color-6);}:root .wp-block-button .has-ast-global-color-6-color{color:var(--ast-global-color-6);}:root .wp-block-button .has-ast-global-color-6-background-color{background-color:var(--ast-global-color-6);}:root .has-ast-global-color-7-color{color:var(--ast-global-color-7);}:root .has-ast-global-color-7-background-color{background-color:var(--ast-global-color-7);}:root .wp-block-button .has-ast-global-color-7-color{color:var(--ast-global-color-7);}:root .wp-block-button .has-ast-global-color-7-background-color{background-color:var(--ast-global-color-7);}:root .has-ast-global-color-8-color{color:var(--ast-global-color-8);}:root .has-ast-global-color-8-background-color{background-color:var(--ast-global-color-8);}:root .wp-block-button .has-ast-global-color-8-color{color:var(--ast-global-color-8);}:root .wp-block-button .has-ast-global-color-8-background-color{background-color:var(--ast-global-color-8);}:root{--ast-global-color-0:#0170B9;--ast-global-color-1:#3a3a3a;--ast-global-color-2:#3a3a3a;--ast-global-color-3:#4B4F58;--ast-global-color-4:#F5F5F5;--ast-global-color-5:#FFFFFF;--ast-global-color-6:#F2F5F7;--ast-global-color-7:#424242;--ast-global-color-8:#000000;}.ast-breadcrumbs .trail-browse,.ast-breadcrumbs .trail-items,.ast-breadcrumbs .trail-items li{display:inline-block;margin:0;padding:0;border:none;background:inherit;text-indent:0;}.ast-breadcrumbs .trail-browse{font-size:inherit;font-style:inherit;font-weight:inherit;color:inherit;}.ast-breadcrumbs .trail-items{list-style:none;}.trail-items li::after{padding:0 0.3em;content:"\00bb";}.trail-items li:last-of-type::after{display:none;}h1,.entry-content h1,h2,.entry-content h2,h3,.entry-content h3,h4,.entry-content h4,h5,.entry-content h5,h6,.entry-content h6{color:#404040;}.entry-title a{color:#404040;}@media (max-width:921px){.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-firstrow .ast-builder-grid-row > *:first-child,.ast-builder-grid-row-container.ast-builder-grid-row-tablet-3-lastrow .ast-builder-grid-row > *:last-child{grid-column:1 / -1;}}@media (max-width:544px){.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-firstrow .ast-builder-grid-row > *:first-child,.ast-builder-grid-row-container.ast-builder-grid-row-mobile-3-lastrow .ast-builder-grid-row > *:last-child{grid-column:1 / -1;}}.ast-builder-layout-element[data-section="title_tagline"]{display:flex;}@media (max-width:921px){.ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"]{display:flex;}}@media (max-width:544px){.ast-header-break-point .ast-builder-layout-element[data-section="title_tagline"]{display:flex;}}.elementor-widget-heading .elementor-heading-title{margin:0;}.elementor-post.elementor-grid-item.hentry{margin-bottom:0;}.woocommerce div.product .elementor-element.elementor-products-grid .related.products ul.products li.product,.elementor-element .elementor-wc-products .woocommerce[class*='columns-'] ul.products li.product{width:auto;margin:0;float:none;}.elementor-toc__list-wrapper{margin:0;}.ast-left-sidebar .elementor-section.elementor-section-stretched,.ast-right-sidebar .elementor-section.elementor-section-stretched{max-width:100%;left:0 !important;}.elementor-template-full-width .ast-container{display:block;}@media (max-width:544px){.elementor-element .elementor-wc-products .woocommerce[class*="columns-"] ul.products li.product{width:auto;margin:0;}.elementor-element .woocommerce .woocommerce-result-count{float:none;}}.ast-header-break-point .main-header-bar{border-bottom-width:1px;}@media (min-width:922px){.main-header-bar{border-bottom-width:1px;}}.ast-safari-browser-less-than-11 .main-header-menu .menu-item, .ast-safari-browser-less-than-11 .main-header-bar .ast-masthead-custom-menu-items{display:block;}.main-header-menu .menu-item, #astra-footer-menu .menu-item, .main-header-bar .ast-masthead-custom-menu-items{-js-display:flex;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-moz-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-orient:vertical;-webkit-box-direction:normal;-webkit-flex-direction:column;-moz-box-orient:vertical;-moz-box-direction:normal;-ms-flex-direction:column;flex-direction:column;}.main-header-menu > .menu-item > .menu-link, #astra-footer-menu > .menu-item > .menu-link{height:100%;-webkit-box-align:center;-webkit-align-items:center;-moz-box-align:center;-ms-flex-align:center;align-items:center;-js-display:flex;display:flex;}.ast-header-break-point .main-navigation ul .menu-item .menu-link .icon-arrow:first-of-type svg{top:.2em;margin-top:0px;margin-left:0px;width:.65em;transform:translate(0, -2px) rotateZ(270deg);}.ast-mobile-popup-content .ast-submenu-expanded > .ast-menu-toggle{transform:rotateX(180deg);}.ast-separate-container .blog-layout-1, .ast-separate-container .blog-layout-2, .ast-separate-container .blog-layout-3{background-color:transparent;background-image:none;}.ast-separate-container .ast-article-post{background-color:var(--ast-global-color-5);;background-image:none;;}@media (max-width:921px){.ast-separate-container .ast-article-post{background-color:var(--ast-global-color-5);;background-image:none;;}}@media (max-width:544px){.ast-separate-container .ast-article-post{background-color:var(--ast-global-color-5);;background-image:none;;}}.ast-separate-container .ast-article-single:not(.ast-related-post), .ast-separate-container .comments-area .comment-respond,.ast-separate-container .comments-area .ast-comment-list li, .ast-separate-container .ast-woocommerce-container, .ast-separate-container .error-404, .ast-separate-container .no-results, .single.ast-separate-container .ast-author-meta, .ast-separate-container .related-posts-title-wrapper, .ast-separate-container.ast-two-container #secondary .widget,.ast-separate-container .comments-count-wrapper, .ast-box-layout.ast-plain-container .site-content,.ast-padded-layout.ast-plain-container .site-content, .ast-separate-container .comments-area .comments-title{background-color:var(--ast-global-color-5);;background-image:none;;}@media (max-width:921px){.ast-separate-container .ast-article-single:not(.ast-related-post), .ast-separate-container .comments-area .comment-respond,.ast-separate-container .comments-area .ast-comment-list li, .ast-separate-container .ast-woocommerce-container, .ast-separate-container .error-404, .ast-separate-container .no-results, .single.ast-separate-container .ast-author-meta, .ast-separate-container .related-posts-title-wrapper, .ast-separate-container.ast-two-container #secondary .widget,.ast-separate-container .comments-count-wrapper, .ast-box-layout.ast-plain-container .site-content,.ast-padded-layout.ast-plain-container .site-content, .ast-separate-container .comments-area .comments-title{background-color:var(--ast-global-color-5);;background-image:none;;}}@media (max-width:544px){.ast-separate-container .ast-article-single:not(.ast-related-post), .ast-separate-container .comments-area .comment-respond,.ast-separate-container .comments-area .ast-comment-list li, .ast-separate-container .ast-woocommerce-container, .ast-separate-container .error-404, .ast-separate-container .no-results, .single.ast-separate-container .ast-author-meta, .ast-separate-container .related-posts-title-wrapper, .ast-separate-container.ast-two-container #secondary .widget,.ast-separate-container .comments-count-wrapper, .ast-box-layout.ast-plain-container .site-content,.ast-padded-layout.ast-plain-container .site-content, .ast-separate-container .comments-area .comments-title{background-color:var(--ast-global-color-5);;background-image:none;;}}.ast-mobile-header-content > *,.ast-desktop-header-content > * {padding: 10px 0;height: auto;}.ast-mobile-header-content > *:first-child,.ast-desktop-header-content > *:first-child {padding-top: 10px;}.ast-mobile-header-content > .ast-builder-menu,.ast-desktop-header-content > .ast-builder-menu {padding-top: 0;}.ast-mobile-header-content > *:last-child,.ast-desktop-header-content > *:last-child {padding-bottom: 0;}.ast-mobile-header-content .ast-search-menu-icon.ast-inline-search label,.ast-desktop-header-content .ast-search-menu-icon.ast-inline-search label {width: 100%;}.ast-desktop-header-content .main-header-bar-navigation .ast-submenu-expanded > .ast-menu-toggle::before {transform: rotateX(180deg);}#ast-desktop-header .ast-desktop-header-content,.ast-mobile-header-content .ast-search-icon,.ast-desktop-header-content .ast-search-icon,.ast-mobile-header-wrap .ast-mobile-header-content,.ast-main-header-nav-open.ast-popup-nav-open .ast-mobile-header-wrap .ast-mobile-header-content,.ast-main-header-nav-open.ast-popup-nav-open .ast-desktop-header-content {display: none;}.ast-main-header-nav-open.ast-header-break-point #ast-desktop-header .ast-desktop-header-content,.ast-main-header-nav-open.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content {display: block;}.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up > .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-up > .menu-item .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down > .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-slide-down > .menu-item .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-fade > .menu-item > .sub-menu,.ast-desktop .ast-desktop-header-content .astra-menu-animation-fade > .menu-item .menu-item > .sub-menu {opacity: 1;visibility: visible;}.ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation {width: unset;margin: unset;}.ast-mobile-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children > .ast-menu-toggle,.ast-desktop-header-content.content-align-flex-end .main-header-bar-navigation .menu-item-has-children > .ast-menu-toggle {left: calc( 20px - 0.907em);}.ast-mobile-header-content .ast-search-menu-icon,.ast-mobile-header-content .ast-search-menu-icon.slide-search,.ast-desktop-header-content .ast-search-menu-icon,.ast-desktop-header-content .ast-search-menu-icon.slide-search {width: 100%;position: relative;display: block;right: auto;transform: none;}.ast-mobile-header-content .ast-search-menu-icon.slide-search .search-form,.ast-mobile-header-content .ast-search-menu-icon .search-form,.ast-desktop-header-content .ast-search-menu-icon.slide-search .search-form,.ast-desktop-header-content .ast-search-menu-icon .search-form {right: 0;visibility: visible;opacity: 1;position: relative;top: auto;transform: none;padding: 0;display: block;overflow: hidden;}.ast-mobile-header-content .ast-search-menu-icon.ast-inline-search .search-field,.ast-mobile-header-content .ast-search-menu-icon .search-field,.ast-desktop-header-content .ast-search-menu-icon.ast-inline-search .search-field,.ast-desktop-header-content .ast-search-menu-icon .search-field {width: 100%;padding-right: 5.5em;}.ast-mobile-header-content .ast-search-menu-icon .search-submit,.ast-desktop-header-content .ast-search-menu-icon .search-submit {display: block;position: absolute;height: 100%;top: 0;right: 0;padding: 0 1em;border-radius: 0;}.ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation ul .sub-menu .menu-link {padding-left: 30px;}.ast-hfb-header.ast-default-menu-enable.ast-header-break-point .ast-mobile-header-wrap .ast-mobile-header-content .main-header-bar-navigation .sub-menu .menu-item .menu-item .menu-link {padding-left: 40px;}.ast-mobile-popup-drawer.active .ast-mobile-popup-inner{background-color:#ffffff;;}.ast-mobile-header-wrap .ast-mobile-header-content, .ast-desktop-header-content{background-color:#ffffff;;}.ast-mobile-popup-content > *, .ast-mobile-header-content > *, .ast-desktop-popup-content > *, .ast-desktop-header-content > *{padding-top:0;padding-bottom:0;}.content-align-flex-start .ast-builder-layout-element{justify-content:flex-start;}.content-align-flex-start .main-header-menu{text-align:left;}.ast-mobile-popup-drawer.active .menu-toggle-close{color:#3a3a3a;}.ast-mobile-header-wrap .ast-primary-header-bar,.ast-primary-header-bar .site-primary-header-wrap{min-height:70px;}.ast-desktop .ast-primary-header-bar .main-header-menu > .menu-item{line-height:70px;}@media (max-width:921px){#masthead .ast-mobile-header-wrap .ast-primary-header-bar,#masthead .ast-mobile-header-wrap .ast-below-header-bar{padding-left:20px;padding-right:20px;}}.ast-header-break-point .ast-primary-header-bar{border-bottom-width:1px;border-bottom-color:#eaeaea;border-bottom-style:solid;}@media (min-width:922px){.ast-primary-header-bar{border-bottom-width:1px;border-bottom-color:#eaeaea;border-bottom-style:solid;}}.ast-primary-header-bar{background-color:#ffffff;;}.ast-primary-header-bar{display:block;}@media (max-width:921px){.ast-header-break-point .ast-primary-header-bar{display:grid;}}@media (max-width:544px){.ast-header-break-point .ast-primary-header-bar{display:grid;}}[data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal{color:#40bac8;border:none;background:transparent;}[data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg{width:20px;height:20px;fill:#40bac8;}[data-section="section-header-mobile-trigger"] .ast-button-wrap .mobile-menu-wrap .mobile-menu{color:#40bac8;}.ast-builder-menu-mobile .main-navigation .menu-item > .menu-link{font-family:inherit;font-weight:inherit;}.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}.ast-builder-menu-mobile .main-navigation .menu-item-has-children > .menu-link:after{content:unset;}.ast-hfb-header .ast-builder-menu-mobile .main-header-menu, .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .menu-link, .ast-hfb-header .ast-builder-menu-mobile .main-navigation .menu-item .sub-menu .menu-link{border-style:none;}.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}@media (max-width:921px){.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}.ast-builder-menu-mobile .main-navigation .menu-item-has-children > .menu-link:after{content:unset;}}@media (max-width:544px){.ast-builder-menu-mobile .main-navigation .menu-item.menu-item-has-children > .ast-menu-toggle{top:0;}}.ast-builder-menu-mobile .main-navigation{display:block;}@media (max-width:921px){.ast-header-break-point .ast-builder-menu-mobile .main-navigation{display:block;}}@media (max-width:544px){.ast-header-break-point .ast-builder-menu-mobile .main-navigation{display:block;}}:root{--e-global-color-astglobalcolor0:#0170B9;--e-global-color-astglobalcolor1:#3a3a3a;--e-global-color-astglobalcolor2:#3a3a3a;--e-global-color-astglobalcolor3:#4B4F58;--e-global-color-astglobalcolor4:#F5F5F5;--e-global-color-astglobalcolor5:#FFFFFF;--e-global-color-astglobalcolor6:#F2F5F7;--e-global-color-astglobalcolor7:#424242;--e-global-color-astglobalcolor8:#000000;}
    </style>
    
    <!-- ===== ALL CSS INLINE (Fallback) ===== -->
    <style>
        /* Reset & Base */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
            font-weight: 300 !important;
            transition: opacity ease-in 0.2s;
            color: #404040;
            background: #fff;
        }
        body[unresolved] { opacity: 0; display: block; overflow: hidden; position: relative; }
        
        h1, h2, h3, h4, h5, h6 { font-weight: 400 !important; font-family: 'Cabin', sans-serif; }
        strong, b { font-weight: 600 !important; }
        
        /* Container */
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        
        /* ===== HEADER ===== */
        .site-header {
            background: #ffffff;
            border-bottom: 1px solid #eaeaea;
            padding: 1rem 0;
        }
        .site-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .site-header .logo img { height: 50px; }
        .site-header nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        .site-header nav a {
            text-decoration: none;
            color: #404040;
            font-weight: 300;
            font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif;
            transition: color 0.3s;
        }
        .site-header nav a:hover { color: #40bac8; }
        
        /* ===== STICKY HEADER ===== */
        #menuhopin {
            position: fixed;
            top: 0;
            width: 100%;
            transition: transform 0.4s ease, opacity 0.4s ease, visibility 0.4s ease;
            transform: translateY(-150px);
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            background-color: #404040;
            box-shadow: 0 2px 15px rgba(0,0,0,0.15);
        }
        #menuhopin.headershow {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }
        #menuhopin .container { min-height: 75px; display: flex; align-items: center; justify-content: space-between; }
        #menuhopin .logo img { max-height: 50px; width: auto; }
        #menuhopin nav ul { display: flex; list-style: none; gap: 2rem; }
        #menuhopin nav a { color: #fff; text-decoration: none; font-weight: 300; }
        #menuhopin nav a:hover { color: #40bac8; }
        
        /* ===== HERO ===== */
        .hero {
            background: linear-gradient(135deg, #40BAC8, #2D9AA8);
            padding: 4rem 0;
            color: #fff;
        }
        .hero .container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }
        .hero h1 { font-size: 3rem; font-weight: 700; margin-bottom: 1.5rem; }
        .hero p { font-size: 1.2rem; margin-bottom: 2rem; opacity: 0.9; }
        .hero .btn {
            display: inline-block;
            background: #fff;
            color: #40BAC8;
            padding: 0.75rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        .hero .btn:hover { transform: translateY(-2px); box-shadow: 0 4px 20px rgba(0,0,0,0.15); }
        .hero img { width: 100%; border-radius: 12px; }
        
        /* ===== PROBLEM SECTION ===== */
        .problem-section { padding: 4rem 0; background: #fff; }
        .problem-section .text-center { text-align: center; }
        .problem-section .text-center p { font-size: 22px; color: #404040; }
        .problem-section .text-center p strong { font-weight: 600; }
        .problem-section .sub-text { font-size: 18px; color: #666; max-width: 800px; margin: 20px auto; }
        .problem-section .highlight { font-size: 20px; color: #40BAC8; font-weight: 600; margin-top: 30px; }
        
        /* ===== PROBLEM/SOLUTION GRID ===== */
        .grid-section { padding: 3rem 0; background: #F8FAFC; }
        .grid-section .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .grid-section h2 { font-size: 2rem; margin-bottom: 1.5rem; color: #1e293b; }
        .grid-section ul { list-style: none; padding: 0; }
        .grid-section ul li {
            padding: 0.75rem 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .grid-section ul li:last-child { border-bottom: none; }
        .grid-section .fa-times { color: #EF4444; }
        .grid-section .fa-check { color: #22C55E; }
        
        /* ===== TESTIMONIAL ===== */
        .testimonial { padding: 4rem 0; background: #f5f9fa; text-align: center; }
        .testimonial blockquote {
            font-size: 1.5rem;
            color: #1e293b;
            max-width: 800px;
            margin: 0 auto 1rem;
            font-style: italic;
        }
        .testimonial cite { color: #64748B; }
        
        /* ===== HOW IT WORKS ===== */
        .how-it-works { padding: 4rem 0; background: #fff; }
        .how-it-works h2 { text-align: center; font-size: 2.5rem; margin-bottom: 3rem; }
        .how-it-works .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .how-it-works .step { text-align: center; padding: 2rem; }
        .how-it-works .step .number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .how-it-works .step .number.blue { color: #40BAC8; }
        .how-it-works .step .number.yellow { color: #F2C72E; }
        .how-it-works .step .number.pink { color: #E44481; }
        .how-it-works .step h3 { font-size: 1.25rem; font-weight: 600; color: #1e293b; }
        .how-it-works .step p { color: #64748B; }
        
        /* ===== PILLARS ===== */
        .pillars { padding: 4rem 0; background: #404040; color: #ccc; }
        .pillars .grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .pillars .pillar { text-align: center; padding: 2rem; }
        .pillars .pillar .icon { font-size: 3rem; margin-bottom: 1rem; }
        .pillars .pillar .icon.blue { color: #40BAC8; }
        .pillars .pillar .icon.yellow { color: #F2C72E; }
        .pillars .pillar .icon.pink { color: #E44481; }
        .pillars .pillar h3 { font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem; }
        .pillars .pillar h3.blue { color: #40BAC8; }
        .pillars .pillar h3.yellow { color: #F2C72E; }
        .pillars .pillar h3.pink { color: #E44481; }
        .pillars .pillar p { color: #ccc; }
        
        /* ===== FOUNDER ===== */
        .founder { padding: 4rem 0; background: #f5f5f5; }
        .founder .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        .founder .flex-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: start;
        }
        .founder .badge { color: #40BAC8; letter-spacing: 2px; font-size: 0.9rem; }
        .founder h2 { font-size: 42px; color: #1e293b; }
        .founder .subtitle { color: #40BAC8; font-size: 18px; font-weight: 500; }
        .founder .bio { color: #666; font-size: 17px; line-height: 1.8; }
        .founder .bio strong { color: #40BAC8; }
        .founder .quote {
            font-size: 26px;
            color: #40BAC8;
            font-weight: 300;
            line-height: 1.4;
            margin: 20px 0;
        }
        .founder img { width: 100%; border-radius: 12px; }
        .founder .social-links { display: flex; gap: 1rem; margin-top: 1rem; }
        .founder .social-links a {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid #333;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #333;
            transition: all 0.3s;
        }
        .founder .social-links a:hover {
            background: #40BAC8;
            border-color: #40BAC8;
            color: #fff;
        }
        
        /* ===== CTA SECTIONS ===== */
        .cta-dark {
            padding: 4rem 0;
            background: #404040;
            color: #fff;
            text-align: center;
        }
        .cta-dark h2 { font-size: 2.5rem; margin-bottom: 1rem; }
        .cta-dark p { font-size: 1.2rem; opacity: 0.8; margin-bottom: 2rem; }
        .cta-dark .btn {
            display: inline-block;
            background: #40BAC8;
            color: #fff;
            padding: 1rem 3rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
        }
        .cta-dark .btn:hover { background: #2D9AA8; }
        
        .cta-pink {
            padding: 4rem 0;
            background: #ED4484;
            color: #fff;
            text-align: center;
        }
        .cta-pink .flex-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .cta-pink h4 { letter-spacing: 2px; margin-bottom: 1rem; }
        .cta-pink p { font-size: 18px; opacity: 0.9; margin-bottom: 2rem; }
        .cta-pink .btn-white {
            display: inline-block;
            background: #fff;
            color: #ED4484;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
        }
        .cta-pink .btn-white:hover { background: #f0f0f0; }
        .cta-pink img { width: 100%; border-radius: 12px; }
        
        .cta-gold {
            padding: 4rem 0;
            background: #ED4484;
            color: #fff;
            text-align: center;
        }
        .cta-gold h4 { letter-spacing: 2px; margin-bottom: 1rem; }
        .cta-gold p { font-size: 18px; opacity: 0.9; max-width: 600px; margin: 0 auto 2rem; }
        .cta-gold .btn-gold {
            display: inline-block;
            background: #F2C72E;
            color: #1e293b;
            padding: 15px 40px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        .cta-gold .btn-gold:hover { background: #FFD700; transform: translateY(-2px); }
        
        /* ===== FOOTER ===== */
        .footer {
            background: #0F172A;
            color: #94A3B8;
            padding: 3rem 0;
        }
        .footer .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .footer .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        .footer h4 { color: #fff; margin-bottom: 1rem; }
        .footer ul { list-style: none; padding: 0; }
        .footer ul li { margin-bottom: 0.5rem; }
        .footer ul li a { color: #94A3B8; text-decoration: none; transition: color 0.3s; }
        .footer ul li a:hover { color: #fff; }
        .footer .social {
            display: flex;
            gap: 1rem;
        }
        .footer .social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94A3B8;
            transition: all 0.3s;
        }
        .footer .social a:hover {
            background: #40BAC8;
            border-color: #40BAC8;
            color: #fff;
        }
        .footer .bottom {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #1E293B;
            text-align: center;
        }
        
        /* ===== ELEMENTOR SUPPORT ===== */
        .elementor-section { position: relative; }
        .elementor-container { display: flex; margin: 0 auto; max-width: 1200px; padding: 0 20px; flex-wrap: wrap; }
        .elementor-column { position: relative; min-height: 1px; display: flex; }
        .elementor-column-gap-default > .elementor-column > .elementor-element-populated { padding: 10px; }
        .elementor-widget-wrap { width: 100%; flex-wrap: wrap; align-content: flex-start; display: flex; position: relative; }
        .elementor-widget { position: relative; width: 100%; flex-shrink: 0; }
        .elementor-widget-container { display: flex; flex-direction: column; width: 100%; }
        .elementor-col-100 { width: 100%; }
        .elementor-col-50 { width: 50%; }
        .elementor-col-33 { width: 33.33%; }
        .elementor-col-25 { width: 25%; }
        .elementor-col-75 { width: 75%; }
        .elementor-align-center { text-align: center; }
        .elementor-align-center .elementor-button { margin: 0 auto; }
        .elementor-align-right { text-align: right; }
        .elementor-align-left { text-align: left; }
        .elementor-inner-section { width: 100%; }
        .elementor-section-boxed > .elementor-container { max-width: 1200px; }
        .elementor-section-height-min-height { min-height: 400px; }
        .elementor-section-items-middle > .elementor-container { align-items: center; }
        .elementor-background-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; }

        /* Elementor Button */
        .elementor-button {
            display: inline-block;
            padding: 12px 24px;
            background: #40BAC8;
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .elementor-button:hover {
            background: #2D9AA8;
            transform: translateY(-2px);
        }
        .elementor-button-link { text-decoration: none; }
        .elementor-button-content-wrapper { display: flex; align-items: center; gap: 8px; }

        /* Elementor Icon List */
        .elementor-icon-list-items { list-style: none; padding: 0; margin: 0; }
        .elementor-icon-list-item { display: flex; align-items: center; gap: 12px; padding: 8px 0; }
        .elementor-icon-list-icon { flex-shrink: 0; width: 24px; text-align: center; }
        .elementor-icon-list-icon i { font-size: 18px; }
        .elementor-icon-list-text { flex: 1; }

        /* Elementor Heading */
        .elementor-heading-title { margin: 0; line-height: 1.2; }
        .elementor-size-default { font-size: 1.5rem; }

        /* Elementor Image */
        .elementor-widget-image { text-align: center; }
        .elementor-widget-image img { max-width: 100%; height: auto; display: inline-block; }
        .attachment-full { width: 100%; }

        /* Elementor Social Icons */
        .elementor-social-icons-wrapper { display: flex; gap: 10px; flex-wrap: wrap; }
        .elementor-grid { display: flex; flex-wrap: wrap; gap: 10px; }
        .elementor-grid-item { list-style: none; }
        .elementor-social-icon { display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; border-radius: 50%; border: 2px solid #333; color: #333; transition: all 0.3s; text-decoration: none; }
        .elementor-social-icon:hover { background: #40BAC8; border-color: #40BAC8; color: #fff; }
        .elementor-social-icon img { width: 24px; height: 24px; object-fit: contain; }
        .elementor-screen-only { position: absolute; width: 1px; height: 1px; overflow: hidden; }

        /* Elementor Shapes */
        .elementor-shape { position: absolute; left: 0; width: 100%; overflow: hidden; z-index: 2; pointer-events: none; }
        .elementor-shape-bottom { bottom: -1px; }
        .elementor-shape-top { top: -1px; }
        .elementor-shape svg { display: block; width: calc(100% + 1.3px); height: 100px; position: relative; left: 50%; transform: translateX(-50%); }
        .elementor-shape-fill { fill: currentColor; }

        /* Responsive Elementor */
        @media (max-width: 768px) {
            .elementor-col-50 { width: 100%; }
            .elementor-col-33 { width: 100%; }
            .elementor-col-25 { width: 100%; }
            .elementor-container { flex-direction: column; }
        }
        @media (max-width: 480px) {
            .elementor-col-50 { width: 100%; }
            .elementor-col-33 { width: 100%; }
            .elementor-col-25 { width: 100%; }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero .container { grid-template-columns: 1fr; text-align: center; }
            .grid-section .grid-2 { grid-template-columns: 1fr; }
            .how-it-works .grid-3 { grid-template-columns: 1fr; }
            .pillars .grid-4 { grid-template-columns: 1fr 1fr; }
            .founder .flex-2 { grid-template-columns: 1fr; }
            .cta-pink .flex-2 { grid-template-columns: 1fr; text-align: center; }
            .footer .grid-3 { grid-template-columns: 1fr; text-align: center; }
            .footer .social { justify-content: center; }
            .site-header nav ul { gap: 1rem; }
            #menuhopin nav ul { gap: 1rem; }
            .hero h1 { font-size: 2rem; }
        }
        @media (max-width: 480px) {
            .pillars .grid-4 { grid-template-columns: 1fr; }
            .site-header .container { flex-direction: column; gap: 1rem; }
            #menuhopin .container { flex-direction: column; gap: 0.5rem; }
            .hero h1 { font-size: 1.5rem; }
        }
    </style>
    
    <!-- ===== WP CUSTOM CSS ===== -->
    <style id="wp-custom-css">
        /* Mettre de la couleur sur le gras */
        .gras-jaune b, .gras-jaune strong{
            color:#F2C72E !important;
        }
        .gras-turquoise b, .gras-turquoise strong{
            color:#40BAC8 !important;
        }
        .gras-rose b, .gras-rose strong{
            color:#E44481 !important;
        }

        /* Ajustements pour le formulaire de bas de page */
        .wpforms-field label{
            color:#fff !important;
        }
        button[type=submit]{
            border-radius:25px !important;
            background-color:#40BAC8 !important;
            border:#40BAC8 !important;
            color:#fff !important;
        }
    </style>
    
    <!-- ===== SECTION BACKGROUND COLOR FIXES ===== -->
    <style>
        /* Hero Section - Teal Gradient */
        .elementor-element-9c6b7fa {
            background: linear-gradient(135deg, #40BAC8, #2D9AA8) !important;
            min-height: 400px;
            position: relative;
        }
        .elementor-element-9c6b7fa .elementor-background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ url('/') }}/wp-content/uploads/2021/10/BANNERAsset-6-8.png');
            background-size: cover;
            background-position: center;
            opacity: 0.3;
            z-index: 0;
        }
        
        /* Testimonial Section - Light Gray */
        .elementor-element-5e9b491c {
            background-color: #f5f9fa !important;
            padding: 60px 0;
            position: relative;
        }
        
        /* How It Works Section - White */
        .elementor-element-3a81f64 {
            background-color: #ffffff !important;
            padding: 60px 0;
        }
        
        /* Build Your Program CTA - Dark Gray */
        .elementor-element-7b5f1071 {
            background-color: #404040 !important;
            padding: 60px 0;
        }
        .elementor-element-7b5f1071 .elementor-heading-title,
        .elementor-element-7b5f1071 p {
            color: #ffffff !important;
        }
        
        /* Pillars Section - Dark Gray */
        .elementor-element-52c7229f {
            background-color: #404040 !important;
            padding: 60px 0;
        }
        .elementor-element-52c7229f .elementor-heading-title {
            color: #ffffff !important;
        }
        .elementor-element-52c7229f .elementor-heading-title[style*="color: #40BAC8"] {
            color: #40BAC8 !important;
        }
        .elementor-element-52c7229f .elementor-heading-title[style*="color: #F2C72E"] {
            color: #F2C72E !important;
        }
        .elementor-element-52c7229f .elementor-heading-title[style*="color: #E44481"] {
            color: #E44481 !important;
        }
        .elementor-element-52c7229f p {
            color: #ccc !important;
        }
        
        /* Founder Section - Light Gray */
        .elementor-element-1f9e3deb {
            background-color: #f5f5f5 !important;
            padding: 60px 0;
        }
        
        /* Effective Gamification Framework Section - Light Gray */
        .elementor-element-146b025a {
            background-color: #f5f9fa !important;
            padding: 60px 0;
            position: relative;
        }
        
        /* Ready to make learning stick? - Pink */
        .elementor-element-6c2262be {
            background-color: #ED4484 !important;
            padding: 60px 0;
            position: relative;
        }
        .elementor-element-6c2262be .elementor-heading-title,
        .elementor-element-6c2262be p {
            color: #ffffff !important;
        }
        .elementor-element-6c2262be .elementor-button {
            background-color: #ffffff !important;
            color: #ED4484 !important;
        }
        
        /* Get in touch section - Pink */
        .elementor-element-e1abe5a {
            background-color: #ED4484 !important;
            padding: 60px 0;
        }
        .elementor-element-e1abe5a .elementor-heading-title,
        .elementor-element-e1abe5a p {
            color: #ffffff !important;
        }
        
        /* Problem section text */
        .elementor-element-5c50590 p {
            color: #404040 !important;
        }
        .elementor-element-5c50590 p strong {
            color: #404040 !important;
        }
        .elementor-element-5c50590 p[style*="color: #40BAC8"] {
            color: #40BAC8 !important;
        }
        
        /* Fix for Elementor containers */
        .elementor-container {
            position: relative;
            z-index: 1;
        }
    </style>
    
    <!-- ===== STICKY HEADER FIX ===== -->
    <style>
        /* Fix for sticky header logo transition */
        #menuhopin {
            position: fixed;
            top: 0;
            width: 100%;
            -webkit-transition: transform 0.4s ease, opacity 0.4s ease, visibility 0.4s ease;
            transition: transform 0.4s ease, opacity 0.4s ease, visibility 0.4s ease;
            transform: translateY(-150px);
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            background-color: #404040;
            box-shadow: 0 2px 15px rgba(0,0,0,0.15);
        }

        #menuhopin.headershow {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
        }

        /* MAIN HEADER - make sure it's always visible when not covered by sticky */
        .elementor-location-header .elementor-section:first-of-type {
            position: relative;
            z-index: 100;
            transition: opacity 0.3s ease;
        }

        /* Fix for the main header being hidden behind sticky header */
        .elementor-location-header {
            position: relative;
            z-index: 100;
        }

        /* Sticky header specific */
        #menuhopin {
            z-index: 1000 !important;
        }

        /* Ensure main header content is not overlapped */
        .site-content {
            position: relative;
            z-index: 1;
        }

        .elementor-widget-theme-site-logo img {
            transition: all 0.3s ease-in-out !important;
        }

        #menuhopin .elementor-widget-theme-site-logo img {
            transition: all 0.3s ease-in-out !important;
        }

        #menuhopin.headershow .elementor-widget-theme-site-logo img {
            max-height: 50px;
            width: auto;
        }

        #menuhopin .elementor-container {
            min-height: 75px;
        }

        /* Problem section styling */
        #problem-list {
            padding: 40px 0;
        }

        #problem-list ul li {
            transition: all 0.3s ease;
            padding: 12px 15px !important;
            border-radius: 8px;
        }

        #problem-list ul li:hover {
            background-color: #f5f9fa;
            transform: translateX(5px);
        }

        #problem-list ul li:last-child {
            border-bottom: none !important;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            #problem-list .elementor-column {
                width: 100% !important;
            }
            #problem-list ul li {
                font-size: 16px !important;
            }
        }

        /* IMPORTANT: Fix main header visibility */
        .elementor-section[data-element_type="section"]:not(#menuhopin) {
            position: relative;
            z-index: 50;
        }

        /* Ensure the sticky header doesn't push content down */
        #menuhopin + * {
            margin-top: 0;
        }
    </style>
    
    <!-- ===== GILL SANS NOVA LIGHT FONT ===== -->
    <style>
        /* Apply Gill Sans Nova Light to the entire page */
        body, 
        h1, h2, h3, h4, h5, h6, 
        p, span, div, 
        button, input, textarea, 
        .entry-content, .elementor-widget {
            font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
            font-weight: 300 !important;
        }

        /* Headings can use a slightly heavier weight for emphasis */
        h1, h2, h3, h4, h5, h6,
        .elementor-heading-title {
            font-weight: 400 !important;
        }

        /* Bold text should use 600 or 700 */
        strong, b,
        .gras-jaune b, .gras-jaune strong,
        .gras-turquoise b, .gras-turquoise strong,
        .gras-rose b, .gras-rose strong {
            font-weight: 600 !important;
        }

        /* Navigation menu */
        .elementor-nav-menu .elementor-item {
            font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
            font-weight: 300 !important;
        }

        /* Buttons */
        .elementor-button,
        button,
        .wpforms-submit {
            font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
            font-weight: 400 !important;
        }
    </style>
    
    @stack('styles')
</head>
<body @yield('body_class', '')>
    <div class="hfeed site" id="page">
        @include('partials.header')
        
        <div id="content" class="site-content">
            @yield('content')
        </div>
        
        @include('partials.footer')
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Sticky Header
        jQuery(document).ready(function($) {
            var stickyHeader = $('#menuhopin');
            var lastScrollTop = 0;
            $(window).scroll(function() {
                var currentScrollTop = $(this).scrollTop();
                if (currentScrollTop > 100 && currentScrollTop > lastScrollTop) {
                    stickyHeader.addClass('headershow');
                } else if (currentScrollTop < lastScrollTop || currentScrollTop <= 100) {
                    stickyHeader.removeClass('headershow');
                }
                if (currentScrollTop === 0) {
                    stickyHeader.removeClass('headershow');
                }
                lastScrollTop = currentScrollTop;
            });
        });
    </script>
    @stack('scripts')

<!-- Cookie Consent -->
@include('partials.cookie-consent')
</body>
</html>