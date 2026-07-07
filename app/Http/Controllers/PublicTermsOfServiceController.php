<?php

namespace App\Http\Controllers;

use App\Models\TermsOfService;
use Illuminate\Http\Request;

class PublicTermsOfServiceController extends BaseController
{
    public function index()
    {
        $termsOfService = TermsOfService::where('is_active', true)
            ->latest('effective_date')
            ->first();
            
        return view('terms-of-service', compact('termsOfService'));
    }
}
