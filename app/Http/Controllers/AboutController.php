<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    /**
     * Display the About Us page
     * Fetches dynamic content from the database only
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch the first active About Us record from database
        $about = AboutUs::where('is_active', true)->first();
        
        // Return the view with the fetched data
        return view('about.index', compact('about'));
    }
}