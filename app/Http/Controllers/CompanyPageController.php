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
        $userCompanies = UserCompany::where('company_id', $company->id)->get()->toArray();


        return view("companyPage.index", [
            "company" => $company,
            "userCompanies" => $userCompanies
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
        return redirect()->route('welcome')->with("success", $company->company_name . " törlése megtörtént");
    }

    public function promote(Users $user, Companies $company)
    {
        UserCompany::where([['user_id', '=', $user->id], ['company_id', '=', $company->id] ])->update(['company_admin' => 1]);
       return redirect()->back()->with('alert', $user->name . 'Member promoted!');
    }

    public function demote(Users $user, Companies $company)
    {
        if (Auth::user()->id == $user->id) {
          return redirect()->back()->with('alert', "Cant demote yourself");
        }
        UserCompany::where([['user_id', '=', $user->id], ['company_id', '=', $company->id] ])->update(['company_admin' => 0]);
       return redirect()->back()->with('alert',  'Member Demoted!');
    }

    public function kick(Users $user, Companies $company)
    {
        if (Auth::user()->id == $user->id) {
          return redirect()->back()->with('alert', "Cant kick yourself");
        }

        UserCompany::where([['user_id', '=', $user->id], ['company_id', '=', $company->id] ])->delete();
       return redirect()->back()->with('alert', $user->name . 'Member kicked!');
    }
}
