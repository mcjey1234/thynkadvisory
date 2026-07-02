<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends BaseController 
{
    /**
     * Display the booking page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('booking.index');
    }
}