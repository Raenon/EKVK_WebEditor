<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Users;
use App\Models\Projects;
use App\Models\UserCompany;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole(1)) {

            $users = Users::with('roles','companies')->withTrashed()->get()->sortBy("id");
            $companies = Companies::withTrashed()->get()->sortBy("id");
            $projects = Projects::withTrashed()->get()->sortBy("id");



            return view("admin.index", ["users" => $users, "companies" => $companies, "projects" => $projects]);
            }
            else{
                return redirect(route('welcome'))->with('alert', 'You do not have admin priviliges');
            }
        }
        return redirect(route('welcome'))->with('alert', 'You are not logged in!');

    }
}
