<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    function index()
    {
        $user_id = auth()->user()->id;
        $projects = Project::where('user_id', $user_id)->paginate(3);
        return view('project.index', ['projects' => $projects]);
    }
    function create()
    {
        return view('project.create');
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required|max:255',
            'description' => 'required',
            'stack' => 'required',
            'gitlink' => 'nullable|max:255',
            'live_url' => 'nullable|max:90',
        ]);

        // columns name	description	github_link	live_url	technology	user_id	
        $project = new Project();
        $project->name = $request->project_name;
        $project->description = $request->description;
        $project->technology = $request->stack;
        $project->github_link = $request->gitlink;
        $project->live_url = $request->live_url;
        $project->user_id = auth()->user()->id;
        if ($project->save()) {
            return Redirect::to('/project/create')->with('success', 'Project Added Successfully');
        } else {
            return Redirect::to('/project/create')->with('error', 'Unable to add project');
        }
    }
    function search()
    {
    }

    function showAllProjects()
    {
        $projects = Project::all()->paginate(10);
        return view('project', ['projects', $projects]);
    }
}
