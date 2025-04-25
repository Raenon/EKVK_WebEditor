<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Users;
use App\Models\Projects;

class AdminController extends Controller
{
    public function index()
    {
        $users = Users::withTrashed()->get()->sortBy("id");
        $companies = Companies::withTrashed()->get()->sortBy("id");
        $projects = Projects::withTrashed()->get()->sortBy("id");

        return view("admin.index", ["users" => $users, "companies" => $companies, "projects" => $projects]);
    }
}
