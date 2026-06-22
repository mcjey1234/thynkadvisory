<style>
    /* ===== SHINY CHARCOAL SIDEBAR WITH INCREASED CUSTOM WIDTH ===== */
    
    /* 1. Enhanced Width Container Setup */
    .fi-sidebar {
        width: 20rem !important; 
        background-image: linear-gradient(
            135deg, 
            rgb(24, 28, 36) 0%,   
            rgb(17, 24, 39) 50%,  
            rgb(31, 41, 55) 100%  
        ) !important;
        background-color: rgb(17, 24, 39) !important;
        border-right: 1px solid rgba(255, 255, 255, 0.12) !important;
        box-shadow: 
            inset -1px 0 0 rgba(255, 255, 255, 0.05),
            5px 0 25px rgba(0, 0, 0, 0.45) !important;
        transition: width 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* ===== CRITICAL COLLAPSED STATE LEFT-ALIGNMENT FIXES ===== */
    .fi-sidebar-collapsed .fi-sidebar {
        width: 5rem !important; 
    }

    /* Forces collapsed menu item containers to align flush left instead of centering */
    .fi-sidebar-collapsed .fi-sidebar-nav {
        padding-left: 0 !important;
        padding-right: 0 !important;
        align-items: flex-start !important;
    }

    /* Force link buttons to strip out inner spacing and hug the left wall */
    .fi-sidebar-collapsed .fi-sidebar-item-button {
        padding-left: 0.75rem !important; /* Minimal breathing space from the absolute left border edge */
        padding-right: 0 !important;
        justify-content: flex-start !important;
        width: 100% !important;
        border-radius: 0 4px 4px 0 !important; /* Flat on left, classic rounding on right */
    }

    /* Force the navigation icons inside collapsed items to stick left */
    .fi-sidebar-collapsed .fi-sidebar-item-icon {
        margin-left: 0 !important;
        margin-right: auto !important;
    }

    /* Forces logo image wrapper container to left-align when hidden/collapsed */
    .fi-sidebar-collapsed .admin-logo-wrapper {
        justify-content: flex-start !important;
        padding-left: 0.75rem !important; /* Perfect left alignment match with menu icons */
        padding-right: 0 !important;
    }

    .fi-sidebar-collapsed .admin-logo-image {
        height: 28px !important;
        margin-left: 0 !important;
    }

    /* 2. Universal Sidebar Link Items (Menus, About Us, Contact, etc.) */
    .fi-sidebar-item-button {
        border-radius: 4px !important;
        padding: 0.65rem 1rem !important; 
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* INACTIVE text: Force pure bright white text for maximum visibility */
    .fi-sidebar-item-button:not(.fi-active) {
        color: rgb(255, 255, 255) !important; 
        font-weight: 600 !important;
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.6) !important; 
    }
    
    /* INACTIVE sub-text span elements inside children links */
    .fi-sidebar-item-button:not(.fi-active) span {
        color: rgb(255, 255, 255) !important;
        opacity: 1 !important; 
    }
    
    /* Inactive Link Icons: Bright Silver */
    .fi-sidebar-item-button:not(.fi-active) .fi-sidebar-item-icon {
        color: rgb(229, 231, 235) !important;
    }

    /* Hover State: Brilliant Satin Glass Layer */
    .fi-sidebar-item-button:not(.fi-active):hover {
        background-color: rgba(255, 255, 255, 0.15) !important;
        color: rgb(255, 255, 255) !important;
        box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.2);
    }

    /* 3. ACTIVE SUBCONTENT FOCUS STATE (Beautiful Shiny Yellow to Red Gradient) */
    .fi-sidebar-item-button.fi-active {
        background-image: linear-gradient(
            90deg, 
            rgba(245, 158, 11, 0.35) 0%,   
            rgba(239, 68, 68, 0.2) 70%,    
            rgba(239, 68, 68, 0.05) 100%   
        ) !important;
        background-color: rgba(24, 28, 36, 0.9) !important;
        border-left: 4px solid rgb(251, 191, 36) !important; 
        color: rgb(255, 255, 255) !important; 
        font-weight: 800 !important;
        box-shadow: 
            inset 0 1px 0 rgba(251, 191, 36, 0.3),
            inset -1px -1px 0 rgba(239, 68, 68, 0.2);
    }

    .fi-sidebar-item-button.fi-active span {
        color: rgb(255, 255, 255) !important;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.6) !important;
    }

    .fi-sidebar-item-button.fi-active .fi-sidebar-item-icon {
        color: rgb(251, 191, 36) !important; 
        filter: drop-shadow(0 0 6px rgb(251, 191, 36)); 
    }

    /* 4. Navigation Group Headers (Header Management, Content Management, etc.) */
    .fi-sidebar-group-label {
        color: rgb(255, 255, 255) !important; 
        font-weight: 800 !important;
        font-size: 0.72rem !important;
        letter-spacing: 0.12em !important;
        text-transform: uppercase !important;
        text-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
        padding-bottom: 0.25rem !important;
        margin-top: 1.25rem !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08); 
    }

    /* ===== LOGO HEADER CONTAINER ===== */
    .admin-logo-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        width: 100%;
        border-bottom: 1px solid rgba(255, 255, 255, 0.12);
    }

    .admin-logo-image {
        width: auto;
        height: 52px; 
        object-fit: contain;
        transition: filter 0.3s ease;
    }

    .logo-light-mode {
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.15));
    }

    .logo-dark-mode {
        filter: brightness(0) invert(1) drop-shadow(0 0 8px rgba(255,255,255,0.2));
    }
</style>

<div class="admin-logo-wrapper">
    @if(($mode ?? 'light') === 'dark')
        <img src="{{ asset('storage/banners/01KVFFM5NR51Q48REZMKP9F3H5.png') }}" 
             alt="Sofel Labs" 
             class="admin-logo-image logo-dark-mode"
             loading="eager">
    @else
        <img src="{{ asset('storage/banners/01KVFFM5NR51Q48REZMKP9F3H5.png') }}" 
             alt="Sofel Labs" 
             class="admin-logo-image logo-light-mode"
             loading="eager">
    @endif
</div>
