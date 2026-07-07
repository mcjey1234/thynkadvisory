<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PublicPrivacyPolicyController extends BaseController
{
    public function index()
    {
        $privacyPolicy = PrivacyPolicy::where('is_active', true)
            ->latest('effective_date')
            ->first();
            
        return view('privacy-policy', compact('privacyPolicy'));
    }
}
