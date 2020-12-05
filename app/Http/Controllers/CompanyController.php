<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comps = Company::paginate(10);
        return view("companies.companies")->with('comps', $comps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("companies.company_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $com = new Company();

        $com->name = $request->name;
        $com->internet_address = $request->internet_address;
        $com->save();
        Session::flash('msg_success', 'Company Successfully Added');
        return view("companies.company_show")->with('com', $com);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $com = Company::find($id);

        return view("companies.company_show")->with('com', $com);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $com = Company::find($id);
        return view("companies.company_edit")->with('com', $com);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $com = Company::find($request->id);
        $com->name = $request->name;
        $com->internet_address = $request->internet_address;

        $com->save();
        Session::flash('msg_success', 'Company Info Successfully Updated');
        return redirect()->Route('comshow', ['id' => $com['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        Session::flash('msg_success', 'Company Deleted');
        return redirect()->back();
    }
}
