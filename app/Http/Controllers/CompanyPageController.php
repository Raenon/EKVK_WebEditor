<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Users;
use App\Models\Invite;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateCompaniesRequest;
use App\Models\UserCompany;

class CompanyPageController extends Controller
{
    public function index(Companies $company)
    {
        return view("companyPage.index", [
            "company" => $company
        ]);
    }

    public function invite(Request $request)
    {
        if (Auth::check()) {
            $user = Users::where('username', $request->username)->first();

            if (Auth::user()->username != $request->username) {
                if ($user && $request->companyID) {
                    Invite::create([
                        'company_id' => $request->companyID,
                        'user_id' => $user->id,
                        'accepted' => null
                    ]);

                    return redirect()->back()->with('alert', "$user->username successfully invited");

                } else {
                    return redirect()->back()->with('alert', "User or Company does not exist!");
                }

            } else {
                return redirect()->back()->with('alert', "You cant invite yourself!");
            }
        }

    }

    public function listUsers(Companies $company)
    {
        //
    }

    public function edit(Companies $company)
    {
        return view('companyPage.edit',[
            'company' => $company
        ]);
    }

    public function update(UpdateCompaniesRequest $request, Companies $company)
    {
        $company->update(['company_name' => $request->company_name]);
        return redirect()->route('account')->with('alert', 'Group name changed!');
    }


    public function destroy(Companies $company)
    {
        $company->delete();
        return back()->with("success", $company->username . " törlése megtörtént");
    }

    public function promote(Users $user, Companies $company)
    {
        /* $userCompany = UserCompany::where( 'user_id',$user->id)->where('company_id', $company->company_id);
        dd($userCompany);
        $userCompany::update([
            'company_admin' => 1
        ]);*/

        return redirect()->back()/* ->with('alert', 'Member promoted!') */;
    }
}
