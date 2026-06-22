<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends BaseController
{
    /**
     * Display the Milestones page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all active milestones ordered by display_order
        $milestones = Milestone::active()->get();
        
        return view('milestones.index', compact('milestones'));
    }
}