<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;

class ChatGPTController extends Controller
{
    public function getSiteInfo()
    {
        return response()->json([
            'success' => true,
            'name' => 'THYNK Advisory',
            'description' => 'Digital solutions for apps, web, GIS, and gamified learning',
            'services' => Service::where('is_active', 1)->get(),
            'testimonials' => Testimonial::where('is_published', 1)->get(),
            'quick_facts' => [
                'founded' => '2020',
                'founder' => 'Jared Ogutu',
                'programs_shipped' => '40+',
                'continents_served' => '3',
                'completion_rate' => '92%',
                'client_satisfaction' => '5/5'
            ],
            'contact' => [
                'email' => 'info@thinkadvisory.com',
                'phone' => '+254 757 275 827',
                'location' => 'Kenya, USA, Africa',
                'website' => 'https://thynkadvisory.co.ke'
            ]
        ]);
    }
}
