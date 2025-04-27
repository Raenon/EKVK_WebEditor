<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectsRequest $request)
    {
        $project = new Projects();
        /* $project->user_id = $request->user_id; */
        $project->project_name = $request->project_name;
        $project->project_description = $request->project_description;
        $project->data = null;
        $project->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Projects $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $project)
    {
        return view('admin.user.edit',[
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectsRequest $request, Projects $project)
    {
        $project->update($request->all());
        return redirect()->route("admin");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $project)
    {
        $project->delete();
        return back()->with("success", $project->username . " törlése megtörtént");
    }

    public function restore($id){

        $project = Projects::withTrashed()->find($id);
        $project->restore();
        return back();
    }
}
