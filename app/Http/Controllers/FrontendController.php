<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $projects = Project::withCount('featureRequests')->get();

        return view('home', compact('projects'));
    }

    public function selectProject(Request $request)
    {
        $request->validate(['project' => 'required|exists:projects,slug']);

        $project_exists = Project::whereSlug($request->project)->exists();

        if ($project_exists) {
            return redirect()->route('feature.requests', $request->project);
        }

        return back()->with('error', 'Project does not exist');

        // $projects = Project::withCount('featureRequests')->get();

        // return view('home', compact('projects'));
    }

    public function requests(Project $project)
    {
        $projects = Project::withCount('featureRequests')->get();

        return view('project-feature', compact('project', 'projects'));
    }
}
