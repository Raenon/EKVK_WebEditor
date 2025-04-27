<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Companies;
use App\Models\UserCompany;
use App\Models\UserRole;
use App\Models\Invite;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Requests\StoreCompaniesRequest;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $invites = Invite::all()->where('user_id', $user->id);
            $companies = Companies::all();

            /* dd($invites);
             */
            return view("account.index", [
                "user" => $user,
                "invites" => $invites,
                "companies" => $companies
            ]);
        } else {
            return redirect(route('welcome'))->with('alert', 'You are not logged in!');
        }
    }

    public function inviteHandler(UpdateUsersRequest $request, Invite $invite)
    {
        switch ($request->input('invite')) {
            case '0':
                $invite->update([
                    "accepted" => 0
                ]);
                $invite->delete();

                return redirect()->back();

            case '1':
                $invite->update([
                    "accepted" => 1
                ]);

                UserCompany::create([
                    'user_id' => $invite->user_id,
                    'company_id' => $invite->company_id,
                    'company_admin' => 0
                ]);

                $invite->delete();
                return redirect()->back();

            default:
                return redirect()->back();
        }
    }

    public function update(UpdateUsersRequest $request, Users $user)
    {
        $user->update($request->all());
        return redirect()->route("account");
    }

    public function storeCompany(StoreCompaniesRequest $request)
    {
        $user = Auth::user();

        Companies::create($request->all());
        $company = Companies::orderBy('created_at', 'desc')->first();

        UserRole::where('user_id', $user->id)->where('role_id', '!=', '1')->update([
            'role_id' => 3
        ]);


        UserCompany::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'company_admin' => 1
        ]);
        return redirect()->route("account");
    }

    public function deactivate(Users $user)
    {
        Auth::logout();
        $user->delete();
        return redirect()->route("welcome");

    }

}
