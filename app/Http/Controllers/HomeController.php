<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Share menus and banners globally with all views
     */
    public function __construct()
    {
        // Debug: Log that constructor is called
        Log::info('HomeController constructor called');
        
        // ============================================ -->
        // FIX: Get ALL header menus (including submenus) -->
        // ============================================ -->
        $headerMenus = Menu::where('is_active', 1)
            ->where('position', 'header')
            ->orderBy('display_order', 'asc')
            ->get();  // ← REMOVED the parent_id filter
        
        // Debug: Log the results
        Log::info('Total header menus found: ' . $headerMenus->count());
        Log::info('Main menus (parent_id=0): ' . $headerMenus->where('parent_id', 0)->count());
        Log::info('Sub menus (parent_id>0): ' . $headerMenus->where('parent_id', '>', 0)->count());
        
        // Get active banners
        $banners = Banner::active()
            ->orderBy('id', 'asc')
            ->get();
        
        Log::info('Banners found: ' . $banners->count());
        
        // Get first banner for hero section
        $heroBanner = Banner::active()
            ->orderBy('id', 'asc')
            ->first();
        
        // Share with all views
        view()->share('headerMenus', $headerMenus);
        view()->share('banners', $banners);
        view()->share('heroBanner', $heroBanner);
        view()->share('footerMenus', collect());
        view()->share('socialMenus', collect());
    }

    /**
     * Home page
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Contact page
     */
    public function contact()
    {
        return view('home');
    }

    /**
     * Services page
     */
    public function services()
    {
        return view('home');
    }

    /**
     * Kenya page
     */
    public function kenya()
    {
        return view('home');
    }

    /**
     * USA page
     */
    public function usa()
    {
        return view('home');
    }

    /**
     * Africa page
     */
    public function africa()
    {
        return view('home');
    }
}