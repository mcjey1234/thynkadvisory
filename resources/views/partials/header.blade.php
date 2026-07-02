<!-- ============================================ -->
<!-- MAIN HEADER — WITH SUBMENUS FIX -->
<!-- ============================================ -->
<header class="sf-header-main">
    <div class="sf-header-inner">
        <div class="sf-header-brand">
            <a href="{{ route('home') }}">
                <img src="{{ asset('wp-content/uploads/images/logo.png') }}" alt="Sofel Labs">
            </a>
        </div>
        <nav class="sf-nav-wrapper">
            <button class="sf-nav-toggle" aria-label="Toggle Menu" aria-expanded="false">
                <span class="sf-toggle-bar"></span>
                <span class="sf-toggle-bar"></span>
                <span class="sf-toggle-bar"></span>
            </button>
            <ul class="sf-nav-list">
                @php
                    // Sort menus by display_order
                    $sortedMenus = isset($headerMenus) ? $headerMenus->sortBy('display_order') : collect();
                    
                    // Define custom order for main menu items (by label)
                    $menuOrder = ['How It Works', 'Methodology', 'About Us', 'Services', 'Locations', 'Team_Members', 'Milestone', 'Contact us'];
                    
                    // Get ALL parent items (parent_id == 0) - regardless of menu_type
                    $mainItems = $sortedMenus->filter(function($menu) {
                        return $menu->parent_id == 0;
                    })->sortBy(function($menu) use ($menuOrder) {
                        $index = array_search($menu->label, $menuOrder);
                        return $index === false ? 999 : $index;
                    });
                    
                    // Get ALL sub-items (parent_id > 0)
                    $subItems = $sortedMenus->filter(function($menu) {
                        return $menu->parent_id > 0;
                    })->groupBy('parent_id');
                @endphp

                @if($mainItems->count() > 0)
                    @foreach($mainItems as $menu)
                        @php
                            // Check if this menu has children (submenus)
                            $hasChildren = isset($subItems[$menu->id]) && $subItems[$menu->id]->count() > 0;
                            // Get the children (submenu items)
                            $children = $hasChildren ? $subItems[$menu->id]->sortBy('display_order') : collect();
                        @endphp

                        @if($hasChildren)
                            <!-- Menu with Submenus (Dropdown) -->
                            <li class="sf-nav-item sf-nav-item--has-dropdown">
                                <a href="{{ $menu->full_url ?? '#' }}" class="{{ request()->is($menu->url) ? 'sf-nav-active' : '' }}">
                                    @if($menu->icon)
                                        <i class="{{ $menu->icon }}"></i>
                                    @endif
                                    {{ $menu->label }}
                                    <span class="sf-dropdown-arrow">▾</span>
                                </a>
                                <!-- Submenu Dropdown -->
                                <ul class="sf-dropdown-menu">
                                    @foreach($children as $child)
                                        <li>
                                            <a href="{{ $child->full_url ?? '#' }}" class="{{ request()->is($child->url) ? 'sf-nav-active' : '' }}">
                                                @if($child->icon)
                                                    <i class="{{ $child->icon }}"></i>
                                                @endif
                                                {{ $child->label }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <!-- Simple Menu Item (No Submenu) -->
                            <li class="sf-nav-item">
                                <a href="{{ $menu->full_url ?? '#' }}" class="{{ request()->is($menu->url) ? 'sf-nav-active' : '' }}">
                                    @if($menu->icon)
                                        <i class="{{ $menu->icon }}"></i>
                                    @endif
                                    {{ $menu->label }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @else
                    <!-- Fallback menu if database is empty -->
                    <li class="sf-nav-item"><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'sf-nav-active' : '' }}">How It Works</a></li>
                    <li class="sf-nav-item"><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'sf-nav-active' : '' }}">About Us</a></li>
                    <li class="sf-nav-item"><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'sf-nav-active' : '' }}">Services</a></li>
                    <li class="sf-nav-item"><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'sf-nav-active' : '' }}">Contact us</a></li>
                    <li class="sf-nav-item"><a href="{{ route('kenya') }}" class="{{ request()->routeIs('kenya') ? 'sf-nav-active' : '' }}">🇰🇪 Kenya</a></li>
                    <li class="sf-nav-item"><a href="{{ route('usa') }}" class="{{ request()->routeIs('usa') ? 'sf-nav-active' : '' }}">🇺🇸 USA</a></li>
                    <li class="sf-nav-item"><a href="{{ route('africa') }}" class="{{ request()->routeIs('africa') ? 'sf-nav-active' : '' }}">🌍 Africa</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>

<!-- ============================================ -->
<!-- STICKY HEADER — WITH SUBMENUS FIX -->
<!-- ============================================ -->
<div id="sf-sticky-nav">
    <div class="sf-header-inner">
        <div class="sf-header-brand">
            <a href="{{ route('home') }}">
                <img src="{{ asset('wp-content/uploads/images/logo.png') }}" alt="Sofel Labs">
            </a>
        </div>
        <nav class="sf-nav-wrapper">
            <button class="sf-nav-toggle" aria-label="Toggle Menu" aria-expanded="false">
                <span class="sf-toggle-bar"></span>
                <span class="sf-toggle-bar"></span>
                <span class="sf-toggle-bar"></span>
            </button>
            <ul class="sf-nav-list">
                @php
                    // Reuse the same sorted menus for sticky header
                    $sortedMenusSticky = isset($headerMenus) ? $headerMenus->sortBy('display_order') : collect();
                    $menuOrderSticky = ['How It Works', 'Methodology', 'About Us', 'Services', 'Locations', 'Team_Members', 'Milestone', 'Contact us'];
                    
                    $mainItemsSticky = $sortedMenusSticky->filter(function($menu) {
                        return $menu->parent_id == 0;
                    })->sortBy(function($menu) use ($menuOrderSticky) {
                        $index = array_search($menu->label, $menuOrderSticky);
                        return $index === false ? 999 : $index;
                    });
                    
                    $subItemsSticky = $sortedMenusSticky->filter(function($menu) {
                        return $menu->parent_id > 0;
                    })->groupBy('parent_id');
                @endphp

                @if($mainItemsSticky->count() > 0)
                    @foreach($mainItemsSticky as $menu)
                        @php
                            $hasChildren = isset($subItemsSticky[$menu->id]) && $subItemsSticky[$menu->id]->count() > 0;
                            $children = $hasChildren ? $subItemsSticky[$menu->id]->sortBy('display_order') : collect();
                        @endphp

                        @if($hasChildren)
                            <li class="sf-nav-item sf-nav-item--has-dropdown">
                                <a href="{{ $menu->full_url ?? '#' }}" class="{{ request()->is($menu->url) ? 'sf-nav-active' : '' }}">
                                    @if($menu->icon)
                                        <i class="{{ $menu->icon }}"></i>
                                    @endif
                                    {{ $menu->label }}
                                    <span class="sf-dropdown-arrow">▾</span>
                                </a>
                                <ul class="sf-dropdown-menu">
                                    @foreach($children as $child)
                                        <li>
                                            <a href="{{ $child->full_url ?? '#' }}" class="{{ request()->is($child->url) ? 'sf-nav-active' : '' }}">
                                                @if($child->icon)
                                                    <i class="{{ $child->icon }}"></i>
                                                @endif
                                                {{ $child->label }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="sf-nav-item">
                                <a href="{{ $menu->full_url ?? '#' }}" class="{{ request()->is($menu->url) ? 'sf-nav-active' : '' }}">
                                    @if($menu->icon)
                                        <i class="{{ $menu->icon }}"></i>
                                    @endif
                                    {{ $menu->label }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @else
                    <li class="sf-nav-item"><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'sf-nav-active' : '' }}">How It Works</a></li>
                    <li class="sf-nav-item"><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'sf-nav-active' : '' }}">About Us</a></li>
                    <li class="sf-nav-item"><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'sf-nav-active' : '' }}">Services</a></li>
                    <li class="sf-nav-item"><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'sf-nav-active' : '' }}">Contact us</a></li>
                    <li class="sf-nav-item"><a href="{{ route('kenya') }}" class="{{ request()->routeIs('kenya') ? 'sf-nav-active' : '' }}">🇰🇪 Kenya</a></li>
                    <li class="sf-nav-item"><a href="{{ route('usa') }}" class="{{ request()->routeIs('usa') ? 'sf-nav-active' : '' }}">🇺🇸 USA</a></li>
                    <li class="sf-nav-item"><a href="{{ route('africa') }}" class="{{ request()->routeIs('africa') ? 'sf-nav-active' : '' }}">🌍 Africa</a></li>
                @endif
            </ul>
        </nav>
    </div>
</div>

<!-- ============================================ -->
<!-- STYLES — NAVIGATION STYLES -->
<!-- ============================================ -->
<style>
    /* ============================================
       SF NAVIGATION — White · Luminous Green
       ============================================ */

    /* ---------- RESET / BASE ---------- */
    .sf-header-main,
    #sf-sticky-nav {
        font-family: 'Gill Sans Nova', 'Gill Sans', 'Gill Sans MT', sans-serif !important;
    }

    /* ---------- MAIN HEADER ---------- */
    .sf-header-main {
        background: #ffffff !important;
        border-bottom: 1px solid #E2E8F0 !important;
        padding: 0.2rem 0 !important;
        position: relative !important;
        z-index: 100 !important;
        box-shadow: 0 2px 6px rgba(0,0,0,0.04) !important;
    }

    .sf-header-inner {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 16px !important;
        display: flex !important;
        flex-wrap: nowrap !important;
        justify-content: space-between !important;
        align-items: center !important;
        min-height: 70px !important;
    }

    .sf-header-brand {
        flex-shrink: 0 !important;
        display: flex !important;
        align-items: center !important;
    }

    /* ---- LOGO ---- */
    .sf-header-brand img {
        height: 90px !important;
        width: auto !important;
        display: block !important;
        object-fit: contain !important;
    }

    /* ---------- NAV ---------- */
    .sf-nav-wrapper {
        display: flex !important;
        align-items: center !important;
        margin-left: auto !important;
        flex-shrink: 0 !important;
        float: right !important;
    }

    .sf-nav-list {
        display: flex !important;
        flex-wrap: nowrap !important;
        justify-content: flex-end !important;
        align-items: center !important;
        list-style: none !important;
        margin: 0 !important;
        padding: 0 !important;
        gap: 4px !important;
        float: right !important;
    }

    .sf-nav-item {
        position: relative !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .sf-nav-item > a {
        display: flex !important;
        align-items: center !important;
        gap: 5px !important;
        padding: 8px 16px !important;
        text-decoration: none !important;
        color: #0F172A !important;
        font-weight: 400 !important;
        font-size: 14px !important;
        transition: all 0.25s ease !important;
        border-radius: 6px !important;
        position: relative !important;
        letter-spacing: 0.3px !important;
        white-space: nowrap !important;
    }

    .sf-nav-item + .sf-nav-item {
        margin-left: 0 !important;
    }

    .sf-nav-item > a i {
        font-size: 14px !important;
        color: #27B80E !important;
    }

    .sf-nav-item > a .sf-dropdown-arrow {
        font-size: 10px !important;
        margin-left: 3px !important;
        transition: transform 0.3s ease !important;
        color: #94A3B8 !important;
    }

    .sf-nav-item:hover > a .sf-dropdown-arrow {
        transform: rotate(180deg) !important;
        color: #27B80E !important;
    }

    .sf-nav-item > a:hover {
        color: #27B80E !important;
        background: rgba(57,255,20,0.06) !important;
    }

    .sf-nav-item > a.sf-nav-active {
        color: #27B80E !important;
        background: rgba(57,255,20,0.08) !important;
    }

    .sf-nav-item > a.sf-nav-active::after {
        content: '' !important;
        position: absolute !important;
        bottom: 4px !important;
        left: 16px !important;
        right: 16px !important;
        height: 2px !important;
        background: #39FF14 !important;
        border-radius: 2px !important;
    }

    /* ---------- DROPDOWN MENU ---------- */
    .sf-nav-item--has-dropdown {
        position: relative !important;
    }

    .sf-dropdown-menu {
        display: none !important;
        position: absolute !important;
        top: calc(100% + 10px) !important;
        left: 50% !important;
        transform: translateX(-50%) !important;
        background: #ffffff !important;
        min-width: 220px !important;
        box-shadow: 0 8px 30px rgba(0,0,0,0.10) !important;
        padding: 8px 0 !important;
        list-style: none !important;
        z-index: 9999 !important;
        border-radius: 10px !important;
        border: 1px solid #E2E8F0 !important;
        opacity: 0 !important;
        visibility: hidden !important;
        transition: opacity 0.3s ease, visibility 0.3s ease, top 0.3s ease !important;
        pointer-events: none !important;
    }

    .sf-nav-item--has-dropdown:hover .sf-dropdown-menu,
    .sf-dropdown-menu:hover {
        display: block !important;
        opacity: 1 !important;
        visibility: visible !important;
        top: calc(100% + 6px) !important;
        pointer-events: auto !important;
    }

    .sf-nav-item--has-dropdown::after {
        content: '' !important;
        position: absolute !important;
        top: 100% !important;
        left: 0 !important;
        right: 0 !important;
        height: 15px !important;
        z-index: 9998 !important;
        pointer-events: none !important;
    }

    .sf-nav-item--has-dropdown:hover::after {
        pointer-events: auto !important;
    }

    .sf-nav-item--has-dropdown:not(:hover) .sf-dropdown-menu {
        transition-delay: 0.3s !important;
    }

    .sf-nav-item--has-dropdown:hover .sf-dropdown-menu {
        transition-delay: 0s !important;
    }

    .sf-nav-item:last-child .sf-dropdown-menu,
    .sf-nav-item:nth-last-child(2) .sf-dropdown-menu {
        left: auto !important;
        right: 0 !important;
        transform: none !important;
    }

    .sf-nav-item:last-child .sf-dropdown-menu::before,
    .sf-nav-item:nth-last-child(2) .sf-dropdown-menu::before {
        left: auto !important;
        right: 24px !important;
        transform: rotate(45deg) !important;
    }

    .sf-dropdown-menu::before {
        content: '' !important;
        position: absolute !important;
        top: -6px !important;
        left: 50% !important;
        transform: translateX(-50%) rotate(45deg) !important;
        width: 12px !important;
        height: 12px !important;
        background: #ffffff !important;
        border-left: 1px solid #E2E8F0 !important;
        border-top: 1px solid #E2E8F0 !important;
    }

    .sf-dropdown-menu li {
        margin: 0 !important;
        padding: 0 !important;
        list-style: none !important;
    }

    .sf-dropdown-menu li a {
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        padding: 8px 20px !important;
        color: #0F172A !important;
        text-decoration: none !important;
        font-size: 13px !important;
        font-weight: 300 !important;
        transition: all 0.25s ease !important;
        border-left: 3px solid transparent !important;
    }

    .sf-dropdown-menu li a:hover {
        background: rgba(57,255,20,0.06) !important;
        color: #27B80E !important;
        border-left-color: #39FF14 !important;
    }

    .sf-dropdown-menu li a i {
        margin-right: 6px !important;
        width: 16px !important;
        text-align: center !important;
        color: #27B80E !important;
        font-size: 13px !important;
    }

    .sf-dropdown-menu li a.sf-nav-active {
        color: #27B80E !important;
        background: rgba(57,255,20,0.07) !important;
        border-left-color: #39FF14 !important;
    }

    /* ---------- MOBILE TOGGLE ---------- */
    .sf-nav-toggle {
        display: none !important;
        flex-direction: column !important;
        justify-content: center !important;
        gap: 5px !important;
        background: none !important;
        border: none !important;
        cursor: pointer !important;
        padding: 8px !important;
        margin-left: 14px !important;
        flex-shrink: 0 !important;
    }

    .sf-toggle-bar {
        display: block !important;
        width: 25px !important;
        height: 2px !important;
        background: #0F172A !important;
        transition: all 0.3s ease !important;
        border-radius: 2px !important;
    }

    .sf-nav-toggle:hover .sf-toggle-bar {
        background: #39FF14 !important;
    }

    /* ---------- STICKY HEADER ---------- */
    #sf-sticky-nav {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        background: #0F172A !important;
        padding: 0.2rem 0 !important;
        box-shadow: 0 2px 20px rgba(0,0,0,0.15) !important;
        transform: translateY(-150px) !important;
        opacity: 0 !important;
        visibility: hidden !important;
        transition: all 0.4s ease !important;
        z-index: 9999 !important;
    }

    #sf-sticky-nav.sf-sticky-visible {
        transform: translateY(0) !important;
        opacity: 1 !important;
        visibility: visible !important;
    }

    #sf-sticky-nav .sf-header-inner {
        min-height: 55px !important;
    }

    /* ---- Sticky Logo ---- */
    #sf-sticky-nav .sf-header-brand img {
        height: 50px !important;
        width: auto !important;
        object-fit: contain !important;
    }

    #sf-sticky-nav .sf-nav-wrapper {
        margin-left: auto !important;
        float: right !important;
    }

    #sf-sticky-nav .sf-nav-list {
        gap: 4px !important;
    }

    #sf-sticky-nav .sf-nav-item > a {
        color: #ffffff !important;
        padding: 6px 14px !important;
        font-size: 13px !important;
    }

    #sf-sticky-nav .sf-nav-item > a:hover {
        color: #39FF14 !important;
        background: rgba(57,255,20,0.08) !important;
    }

    #sf-sticky-nav .sf-nav-item > a.sf-nav-active {
        color: #39FF14 !important;
        background: rgba(57,255,20,0.08) !important;
    }

    #sf-sticky-nav .sf-nav-item > a .sf-dropdown-arrow {
        color: #64748B !important;
    }

    #sf-sticky-nav .sf-nav-item:hover > a .sf-dropdown-arrow {
        color: #39FF14 !important;
    }

    #sf-sticky-nav .sf-nav-item > a i {
        color: #39FF14 !important;
    }

    #sf-sticky-nav .sf-dropdown-menu {
        background: #0F172A !important;
        border-color: #1E293B !important;
    }

    #sf-sticky-nav .sf-dropdown-menu::before {
        background: #0F172A !important;
        border-left-color: #1E293B !important;
        border-top-color: #1E293B !important;
    }

    #sf-sticky-nav .sf-dropdown-menu li a {
        color: #CBD5E1 !important;
        border-left-color: transparent !important;
        font-size: 13px !important;
        padding: 8px 18px !important;
    }

    #sf-sticky-nav .sf-dropdown-menu li a:hover {
        background: rgba(57,255,20,0.07) !important;
        color: #39FF14 !important;
        border-left-color: #39FF14 !important;
    }

    #sf-sticky-nav .sf-dropdown-menu li a i {
        color: #39FF14 !important;
    }

    #sf-sticky-nav .sf-dropdown-menu li a.sf-nav-active {
        color: #39FF14 !important;
        background: rgba(57,255,20,0.07) !important;
        border-left-color: #39FF14 !important;
    }

    #sf-sticky-nav .sf-nav-toggle .sf-toggle-bar {
        background: #ffffff !important;
    }

    #sf-sticky-nav .sf-nav-toggle:hover .sf-toggle-bar {
        background: #39FF14 !important;
    }

    /* ============================================
       RESPONSIVE — Mobile
       ============================================ */
    @media (max-width: 991px) {
        .sf-header-inner {
            flex-wrap: nowrap !important;
            min-height: 60px !important;
        }

        .sf-nav-toggle {
            display: flex !important;
        }

        .sf-nav-wrapper {
            margin-left: auto !important;
            float: none !important;
        }

        .sf-nav-list {
            display: none !important;
            flex-direction: column !important;
            justify-content: flex-start !important;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            right: 0 !important;
            background: #ffffff !important;
            padding: 15px 0 !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08) !important;
            border-top: 1px solid #E2E8F0 !important;
            max-height: 80vh !important;
            overflow-y: auto !important;
            width: 100% !important;
            gap: 0 !important;
            float: none !important;
        }

        .sf-nav-list.sf-nav-open {
            display: flex !important;
        }

        .sf-nav-item {
            width: 100% !important;
        }

        .sf-nav-item + .sf-nav-item {
            margin-left: 0 !important;
        }

        .sf-nav-item > a {
            padding: 12px 24px !important;
            border-bottom: 1px solid #F1F5F9 !important;
            border-radius: 0 !important;
            justify-content: space-between !important;
            white-space: normal !important;
            font-size: 14px !important;
            color: #0F172A !important;
        }

        .sf-nav-item > a .sf-dropdown-arrow {
            transform: rotate(-90deg) !important;
        }

        .sf-nav-item:hover > a .sf-dropdown-arrow {
            transform: rotate(0deg) !important;
        }

        .sf-nav-item > a.sf-nav-active::after {
            display: none !important;
        }

        .sf-dropdown-menu,
        .sf-nav-item:last-child .sf-dropdown-menu,
        .sf-nav-item:nth-last-child(2) .sf-dropdown-menu {
            position: static !important;
            box-shadow: none !important;
            border: none !important;
            padding: 0 0 0 24px !important;
            background: transparent !important;
            border-radius: 0 !important;
            opacity: 1 !important;
            visibility: visible !important;
            transform: none !important;
            left: auto !important;
            right: auto !important;
            display: none !important;
            width: 100% !important;
        }

        .sf-dropdown-menu::before,
        .sf-nav-item:last-child .sf-dropdown-menu::before,
        .sf-nav-item:nth-last-child(2) .sf-dropdown-menu::before {
            display: none !important;
        }

        .sf-nav-item.sf-dropdown-open .sf-dropdown-menu {
            display: block !important;
        }

        .sf-dropdown-menu li a {
            padding: 10px 16px !important;
            border-left: none !important;
            font-size: 13px !important;
            color: #4B5563 !important;
        }

        .sf-dropdown-menu li a:hover {
            border-left: none !important;
            color: #27B80E !important;
            background: rgba(57,255,20,0.05) !important;
        }

        /* Sticky mobile */
        #sf-sticky-nav .sf-nav-list {
            background: #0F172A !important;
            border-top-color: #1E293B !important;
        }

        #sf-sticky-nav .sf-nav-item > a {
            border-bottom-color: #1E293B !important;
            color: #ffffff !important;
        }

        #sf-sticky-nav .sf-dropdown-menu li a {
            color: #CBD5E1 !important;
        }

        #sf-sticky-nav .sf-dropdown-menu li a:hover {
            background: rgba(57,255,20,0.07) !important;
            color: #39FF14 !important;
        }
    }

    @media (max-width: 768px) {
        .sf-header-inner {
            min-height: 56px !important;
        }

        .sf-header-brand img {
            height: 55px !important;
        }

        #sf-sticky-nav .sf-header-brand img {
            height: 40px !important;
        }

        .sf-nav-item > a {
            font-size: 13px !important;
            padding: 10px 16px !important;
        }
    }

    @media (max-width: 480px) {
        .sf-header-inner {
            padding: 0 12px !important;
            min-height: 52px !important;
        }

        .sf-header-brand img {
            height: 45px !important;
        }

        #sf-sticky-nav .sf-header-brand img {
            height: 32px !important;
        }

        .sf-nav-toggle {
            margin-left: 8px !important;
            padding: 6px !important;
        }

        .sf-toggle-bar {
            width: 22px !important;
        }
    }

    @media (max-width: 360px) {
        .sf-header-brand img {
            height: 38px !important;
        }
        #sf-sticky-nav .sf-header-brand img {
            height: 28px !important;
        }
        .sf-nav-item > a {
            font-size: 12px !important;
            padding: 8px 14px !important;
        }
    }
</style>

<!-- ============================================ -->
<!-- SCRIPTS — NAVIGATION FUNCTIONALITY - IMPROVED -->
<!-- ============================================ -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== MOBILE TOGGLE =====
        const toggles = document.querySelectorAll('.sf-nav-toggle');

        toggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const menu = this.closest('.sf-nav-wrapper').querySelector('.sf-nav-list');
                const isOpen = menu.classList.contains('sf-nav-open');

                menu.classList.toggle('sf-nav-open');
                this.setAttribute('aria-expanded', !isOpen ? 'true' : 'false');

                const bars = this.querySelectorAll('.sf-toggle-bar');
                if (!isOpen) {
                    bars[0].style.transform = 'rotate(45deg) translate(4px, 4px)';
                    bars[1].style.opacity = '0';
                    bars[2].style.transform = 'rotate(-45deg) translate(4px, -4px)';
                } else {
                    bars[0].style.transform = 'rotate(0) translate(0, 0)';
                    bars[1].style.opacity = '1';
                    bars[2].style.transform = 'rotate(0) translate(0, 0)';
                }
            });
        });

        // ===== DROPDOWN TOGGLE (mobile & desktop) - IMPROVED =====
        document.querySelectorAll('.sf-nav-item--has-dropdown > a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 991) {
                    e.preventDefault();
                    const parent = this.closest('.sf-nav-item--has-dropdown');
                    const wasOpen = parent.classList.contains('sf-dropdown-open');
                    
                    // Close all other dropdowns
                    document.querySelectorAll('.sf-nav-item--has-dropdown.sf-dropdown-open').forEach(item => {
                        if (item !== parent) {
                            item.classList.remove('sf-dropdown-open');
                        }
                    });
                    
                    parent.classList.toggle('sf-dropdown-open');

                    const arrow = this.querySelector('.sf-dropdown-arrow');
                    if (arrow) {
                        arrow.style.transform = parent.classList.contains('sf-dropdown-open') ? 'rotate(0deg)' : 'rotate(-90deg)';
                    }
                }
            });
        });

        // ===== DESKTOP DROPDOWN - IMPROVED WITH TIMER =====
        if (window.innerWidth > 991) {
            document.querySelectorAll('.sf-nav-item--has-dropdown').forEach(item => {
                let hoverTimer;
                
                item.addEventListener('mouseenter', function() {
                    clearTimeout(hoverTimer);
                    const menu = this.querySelector('.sf-dropdown-menu');
                    if (menu) {
                        menu.style.display = 'block';
                        menu.style.opacity = '1';
                        menu.style.visibility = 'visible';
                        menu.style.pointerEvents = 'auto';
                    }
                });
                
                item.addEventListener('mouseleave', function(e) {
                    const menu = this.querySelector('.sf-dropdown-menu');
                    const relatedTarget = e.relatedTarget;
                    
                    // Check if mouse is going to the dropdown menu
                    if (menu && menu.contains(relatedTarget)) {
                        return;
                    }
                    
                    hoverTimer = setTimeout(() => {
                        if (menu) {
                            menu.style.display = 'none';
                            menu.style.opacity = '0';
                            menu.style.visibility = 'hidden';
                            menu.style.pointerEvents = 'none';
                        }
                    }, 300);
                });
            });
            
            // Keep dropdown open when hovering over it
            document.querySelectorAll('.sf-dropdown-menu').forEach(menu => {
                menu.addEventListener('mouseenter', function() {
                    this.style.display = 'block';
                    this.style.opacity = '1';
                    this.style.visibility = 'visible';
                    this.style.pointerEvents = 'auto';
                });
                
                menu.addEventListener('mouseleave', function(e) {
                    const parent = this.closest('.sf-nav-item--has-dropdown');
                    if (parent) {
                        setTimeout(() => {
                            this.style.display = 'none';
                            this.style.opacity = '0';
                            this.style.visibility = 'hidden';
                            this.style.pointerEvents = 'none';
                        }, 300);
                    }
                });
            });
        }

        // ===== CLOSE ON LINK CLICK (non-dropdown) =====
        document.querySelectorAll('.sf-nav-list .sf-nav-item:not(.sf-nav-item--has-dropdown) a').forEach(link => {
            link.addEventListener('click', function() {
                const menu = this.closest('.sf-nav-list');
                const toggle = menu.closest('.sf-nav-wrapper').querySelector('.sf-nav-toggle');

                if (menu.classList.contains('sf-nav-open')) {
                    menu.classList.remove('sf-nav-open');
                    if (toggle) {
                        toggle.setAttribute('aria-expanded', 'false');
                        const bars = toggle.querySelectorAll('.sf-toggle-bar');
                        bars[0].style.transform = 'rotate(0) translate(0, 0)';
                        bars[1].style.opacity = '1';
                        bars[2].style.transform = 'rotate(0) translate(0, 0)';
                    }
                }
            });
        });

        // ===== CLOSE ON OUTSIDE CLICK =====
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.sf-nav-wrapper')) {
                document.querySelectorAll('.sf-nav-list.sf-nav-open').forEach(menu => {
                    menu.classList.remove('sf-nav-open');
                    const toggle = menu.closest('.sf-nav-wrapper').querySelector('.sf-nav-toggle');
                    if (toggle) {
                        toggle.setAttribute('aria-expanded', 'false');
                        const bars = toggle.querySelectorAll('.sf-toggle-bar');
                        bars[0].style.transform = 'rotate(0) translate(0, 0)';
                        bars[1].style.opacity = '1';
                        bars[2].style.transform = 'rotate(0) translate(0, 0)';
                    }
                });
            }
        });

        // ===== CLOSE ON RESIZE =====
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) {
                document.querySelectorAll('.sf-nav-list.sf-nav-open').forEach(menu => {
                    menu.classList.remove('sf-nav-open');
                });
                document.querySelectorAll('.sf-nav-item--has-dropdown.sf-dropdown-open').forEach(item => {
                    item.classList.remove('sf-dropdown-open');
                });
                document.querySelectorAll('.sf-nav-toggle').forEach(toggle => {
                    toggle.setAttribute('aria-expanded', 'false');
                    const bars = toggle.querySelectorAll('.sf-toggle-bar');
                    bars[0].style.transform = 'rotate(0) translate(0, 0)';
                    bars[1].style.opacity = '1';
                    bars[2].style.transform = 'rotate(0) translate(0, 0)';
                });
            }
        });

        // ===== STICKY HEADER =====
        const sticky = document.getElementById('sf-sticky-nav');
        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            if (currentScroll > 100 && currentScroll > lastScroll) {
                sticky.classList.add('sf-sticky-visible');
            } else if (currentScroll < lastScroll || currentScroll <= 100) {
                sticky.classList.remove('sf-sticky-visible');
            }

            if (currentScroll === 0) {
                sticky.classList.remove('sf-sticky-visible');
            }

            lastScroll = currentScroll;
        }, { passive: true });
    });
</script>