<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends BaseController
{
    public function index()
    {
        $testimonials = Testimonial::published()
            ->orderBy('display_order', 'asc')
            ->get();
            
        $featured = Testimonial::published()
            ->featured()
            ->first();

        return view('partials.testimonials', compact('testimonials', 'featured'));
    }
}
