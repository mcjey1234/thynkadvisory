<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        // Get ALL header menus (including submenus)
        $headerMenus = Menu::where('is_active', 1)
            ->where('position', 'header')
            ->orderBy('display_order', 'asc')
            ->get();
        
        // Share menus with all views
        view()->share('headerMenus', $headerMenus);
    }
}