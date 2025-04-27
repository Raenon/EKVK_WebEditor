<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompanyController extends Controller
{
    public function index(Companies $company)
    {
        return view("company.index", [
            "company" => $company
        ]);
    }
}
