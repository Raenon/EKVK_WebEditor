<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([

            "username" =>
            [
                "required",
                "string",
                "max:255"
            ],
            "email" =>
            [
                "required",
                "email",
                "max:255"
            ],
            "password" =>
            [
                "required",
                "string",
                Password::min(8)
                        ->numbers()
                        ->mixedCase(),
                "confirmed"
            ],
        ],
        [
            "username.required" => "A felhasználó nevet ki kell tölteni",
            "username.string" => "A felhasználó névnek kell karaktert tartalmaznia",
            "username.max:255" => "A fehasználó név túl hosszú",

            "email.required" => "Az email cimet ki kell tölteni",
            "email.email" => "Az email cim formátuma helytelen",
            "email.max:255" => "A fehasználó név túl hosszú",

            "password.required" => "A jelszót ki kell tölteni",
            "password.string" => "A jelszónak kell karaktert tartalmaznia",
            "password.confirmed" => "Nem egyeznek meg a jelszavak",
        ]);

        $Users = new Users();
        $Users-> username = $request->username;
        $Users-> email = $request->email;
        $Users-> password = Hash::make($request->password);
        $Users->save();

        UserRole::create([
            'user_id' => Users::orderBy('created_at','desc')->first()->id,
            'role_id' => 2,
        ]);

        return view('welcome')->with("alert" , "Sikeres regisztráció");

    }

    public function login(Request $request)
    {
        $request->validate([

            "email" =>
            [
                "required",
                "email",
                "max:255"
            ],
            "password" =>
            [
                "required",
                "string"
            ]

        ]);

        $Users = Users::where('email', $request->email)->first();


        if(!$Users){
            dd("Users hiba");
            return back()->withErrors('message', 'Nem egyezik az email vagy a jelszó');
        }
         if (! Hash::check($request->password, $Users->password)){
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
