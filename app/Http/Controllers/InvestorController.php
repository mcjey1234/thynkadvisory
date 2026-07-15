<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Models\Project;
use Illuminate\Http\Request;

class InvestorController extends BaseController
{
    public function index()
    {
        // Get featured testimonials (limit to 6)
        $testimonials = Testimonial::published()
            ->orderBy('display_order', 'asc')
            ->limit(6)
            ->get();

        // Get featured projects (limit to 6)
        $projects = Project::published()
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Fallback: if no featured projects, get latest
        if ($projects->count() < 3) {
            $projects = Project::published()
                ->orderBy('created_at', 'desc')
                ->limit(6)
                ->get();
        }

        return view('pages.investor', compact('testimonials', 'projects'));
    }
}