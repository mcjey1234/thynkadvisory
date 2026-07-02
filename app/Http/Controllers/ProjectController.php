<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        
        $query = Project::published();
        
        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }
        
        $projects = $query->orderBy('created_at', 'desc')->get();
        
        // Get categories for filter
        $categories = Project::published()
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->map(function($cat) {
                return [
                    'value' => $cat,
                    'label' => match($cat) {
                        'mobile' => '📱 Mobile Apps',
                        'web' => '🌐 Web Apps',
                        'design' => '🎨 Design',
                        default => '📦 Other',
                    }
                ];
            });

        return view('projects.index', compact('projects', 'categories', 'category'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $project->increment('views');
        
        $related = Project::published()
            ->where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->limit(4)
            ->get();

        return view('projects.show', compact('project', 'related'));
    }
}
