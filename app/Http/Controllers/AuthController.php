<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use  App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "Usersname" => [ "required", "string", "max:255" ],
            "email" => [ "required", "email", "max:255"],
            "password" => ["required", "string", "min:8", "confirmed" ],
            "UsersType" => ["required", "numeric", "min:1", "max:2"]
        ],
        [
            "Usersname.required" => "A felhasználó nevet ki kell tölteni"
            // TODO: Validation errors
        ]);

        $Users = new Users();
        $Users-> Usersname = $request->Usersname;
        $Users-> email = $request->email;
        $Users-> password = Hash::make($request->password);
        $Users-> UsersType = $request->UsersType;
        $Users->save();
        return view('welcome')->with("message" , "Sikeres regisztráció");

    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => [ "required", "email", "max:255"],
            "password" => ["required", "string", "min:8"]
        ]);

        $Users = Users::where('email', $request->email)->first();


        if(!$Users){
            dd("Users hiba");
            return back()->withErrors('message', 'Nem egyezik az email vagy a jelszó');
        }

        if (Hash::check($request->password, $Users->password)){
            dd(Hash::make($request->password));
            return back()->withErrors('message', 'Nem egyezik az email vagy a jelszó');
        }

        Auth::login($Users);
        return view('welcome')->with('message', 'Sikeres bejelentkezés');
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
