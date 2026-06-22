<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends BaseController
{
    /**
     * Display the Team page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all active team members ordered by display_order
        $teamMembers = TeamMember::active()->get();
        
        return view('team.index', compact('teamMembers'));
    }

    /**
     * Display a single team member detail
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $member = TeamMember::active()->findOrFail($id);
        return view('team.show', compact('member'));
    }
}