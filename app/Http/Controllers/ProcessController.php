<?php

namespace App\Http\Controllers;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessController extends BaseController
{
    /**
     * Display the Process page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all active processes ordered by display_order
        $processes = Process::active()->ordered()->get();
        
        return view('process.index', compact('processes'));
    }
}