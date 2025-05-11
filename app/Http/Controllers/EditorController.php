<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index(Projects $project)
    {
        return view("editor.index", [
            "project" => $project,
        ]);
    }




}
