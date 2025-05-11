<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Models\Projects;

class ProjectPageController extends Controller
{
     public function index(Projects $project)
    {
        $uid = Auth::user()->id;
        $filteredProjects = $project::where('user_id', $uid)->get()->toArray();



        return view("project.index", [
            "projects" => $filteredProjects,

        ]);
    }

     public function create()
    {
        return view('project.create');
    }

     public function store(StoreProjectsRequest $request)
    {

        $project = new Projects();
        $project->user_id = Auth::user()->id;
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->project_data = null;
        $project->save();
        return redirect()->route('editor.index');
    }
}
