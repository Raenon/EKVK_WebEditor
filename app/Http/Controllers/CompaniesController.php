<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Http\Requests\StoreCompaniesRequest;
use App\Http\Requests\UpdateCompaniesRequest;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCompaniesRequest $request)
    {
        $company = new Companies();
        $company->company_name = $request->company_name;
        $company->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Companies $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Companies $company)
    {
        return view('admin.company.edit',[
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaniesRequest $request, Companies $company)
    {
        $company->update($request->all());
        return redirect()->route("admin");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Companies $company)
    {
        $company->delete();
        return back()->with("success", $company->username . " törlése megtörtént");
    }

    public function restore($id){

        $company = Companies::withTrashed()->find($id);
        $company->restore();
        return back()->with("success", $company->name . " helyreállítása megtörtént");
    }
}
