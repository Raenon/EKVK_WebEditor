<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use App\Models\Companies;
use App\Models\UserCompany;
use App\Models\UserRole;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Requests\StoreCompaniesRequest;

class AccountController extends Controller
{

    public function index(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();



            return view("account.index", [
                "user" => $user,
            ]);
        }
        else{
            return redirect(route('welcome'))->with('alert', 'You are not logged in!');
        }
    }

    public function update(UpdateUsersRequest $request, Users $user)
    {
       /*  dd($user, $request); */
        $user->update($request->all());
        return redirect()->route("account");
    }

    public function storeCompany(StoreCompaniesRequest $request)
    {
       $user = Auth::user();

       Companies::create($request->all());
        $company  = Companies::orderBy('created_at','desc')->first();

        UserRole::where('user_id',$user->id)->where('role_id', '!=' ,'1')->update([
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
