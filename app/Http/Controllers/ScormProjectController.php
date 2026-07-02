<?php

namespace App\Http\Controllers;

use App\Models\ScormProject;
use Illuminate\Http\Request;

class ScormProjectController extends BaseController
{
    public function index()
    {
        $projects = ScormProject::published()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('scorm.index', compact('projects'));
    }

    public function show($id)
    {
        $project = ScormProject::findOrFail($id);
        $project->increment('views');

        $related = ScormProject::published()
            ->where('id', '!=', $project->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('scorm.show', compact('project', 'related'));
    }

    public function play($id)
    {
        $project = ScormProject::findOrFail($id);
        return view('scorm.play', compact('project'));
    }
}
