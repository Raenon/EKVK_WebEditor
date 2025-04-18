<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all()->sortBy("id");
        return view("test.admin.user.index", ["users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $user)
    {
        return view('test.admin.user.edit',[
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, Users $user)
    {
        $user->update($request->all());
        return redirect()->route("user.index")->with("success", $user->username . " frissítése megtörtént");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $user)
    {
        $user->delete();
        return back()->with("success", $user->username . " törlése megtörtént");
    }
}
