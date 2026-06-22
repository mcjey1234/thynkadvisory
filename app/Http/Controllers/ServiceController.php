<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    /**
     * Display the Services page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all active services ordered by display_order
        $services = Service::active()->ordered()->get();
        
        return view('services.index', compact('services'));
    }

    /**
     * Display a single service detail
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $service = Service::active()->findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Display service by slug or title
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function detail($slug)
    {
        $service = Service::active()->where('title', $slug)->firstOrFail();
        return view('services.show', compact('service'));
    }
}