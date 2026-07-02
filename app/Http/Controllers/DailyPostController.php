<?php

namespace App\Http\Controllers;

use App\Models\DailyPost;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DailyPostController extends BaseController  // ← Changed to extend BaseController
{
    /**
     * Display the daily digest page
     */
    public function index(Request $request)
    {
        // Get today's posts
        $today = Carbon::today();
        
        // If date is provided in query string, use that
        if ($request->has('date')) {
            $today = Carbon::parse($request->date);
        }
        
        // Get posts for the selected date
        $posts = DailyPost::whereDate('post_date', $today)
            ->where('is_published', true)
            ->orderBy('created_at', 'asc')
            ->get();
        
        // Get latest posts for sidebar/archive
        $recentPosts = DailyPost::where('is_published', true)
            ->orderBy('post_date', 'desc')
            ->limit(7)
            ->get();
        
        // Get featured post (if any)
        $featured = DailyPost::where('is_published', true)
            ->where('type', 'featured')
            ->latest()
            ->first();
        
        // Get all available dates for archive
        $archiveDates = DailyPost::where('is_published', true)
            ->select('post_date')
            ->distinct()
            ->orderBy('post_date', 'desc')
            ->limit(30)
            ->get()
            ->pluck('post_date');
        
        // Get random tip of the day
        $tipOfTheDay = DailyPost::where('is_published', true)
            ->where('type', 'tip')
            ->inRandomOrder()
            ->first();
        
        return view('daily-digest.index', compact(
            'posts',
            'today',
            'recentPosts',
            'featured',
            'archiveDates',
            'tipOfTheDay'
        ));
    }
    
    /**
     * Show a specific daily post
     */
    public function show($date)
    {
        $date = Carbon::parse($date);
        
        $post = DailyPost::whereDate('post_date', $date)
            ->where('is_published', true)
            ->first();
        
        if (!$post) {
            abort(404);
        }
        
        return view('daily-digest.show', compact('post'));
    }
}