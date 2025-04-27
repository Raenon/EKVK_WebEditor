<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Users;
use App\Models\Invite;

class CompanyPageController extends Controller
{
    public function index(Companies $company)
    {
        return view("company.index", [
            "company" => $company
        ]);
    }

    public function invite(Request $request)
    {
        $user = Users::where('username',  $request->username)->first();
        if($user && $request->companyID){


            Invite::create([
                'company_id' => $request->companyID,
                'user_id' => $user->id,
                'accepted' => null
            ]);

            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
