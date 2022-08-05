<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Yajra\DataTables\Facades\DataTables;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->edit(new Company());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        return $this->update($request, new Company());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
//        return view('admin.company.create_edit')->withTemplate($company);
        return view('admin.company.create_edit',['company' => $company]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        //$request->persist($company);
        Company::updateOrCreate(['id' => $company->id],$request->validated());
        return redirect(route('admin.home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->back();
    }

    public function dataTable(){
        $path = \App\Models\Company::getPhotoUrlPath();
        /////// Using || bes SQLite, but for SQL/MySQL CONCAT()
        $data = \DB::select("select id, name, address, '{$path}/' || logo as logo
            from companies");

        return DataTables::of($data)
            ->only(['id', 'name', 'address', 'logo'])
            ->make(true);
    }

}
