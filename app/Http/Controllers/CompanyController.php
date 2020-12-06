<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companies = Company::paginate(10);
        return view("companies.companies")->with('companies', $companies);
    }

    public function create()
    {
        return view("companies.company_create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'internet_address' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('msg_success', 'company name or internet address cannot be empty');
            return redirect()->back();
        } else {
            $company = new Company();

            $company->name = $request->name;
            $company->internet_address = $request->internet_address;
            $company->save();
            Session::flash('msg_success', 'Company Successfully Added');
            return redirect()->Route('comshow', ['id' => $company['id']]);
        }
    }

    public function show($id)
    {
        $company = Company::find($id);
        $addresses = Company::find($id)->addresses()->get();
        $people = Company::find($id)->people()->get();

        return view("companies.company_show")
            ->with('company', $company)
            ->with('addresses', $addresses)
            ->with('people', $people);
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view("companies.company_edit")->with('company', $company);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'internet_address' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            Session::flash('msg_success', 'company name or internet address cannot be empty');
            return redirect()->back();
        } else {
            $company = Company::find($request->id);
            $company->name = $request->name;
            $company->internet_address = $request->internet_address;

            $company->save();
            Session::flash('msg_success', 'Company Info Successfully Updated');
            return redirect()->Route('comshow', ['id' => $company['id']]);
        }
    }

    public function destroy($id)
    {
        Company::destroy($id);
        Session::flash('msg_success', 'Company Deleted');
        return redirect()->back();
    }

    public function search(Request $req)
    {
        $str = $req->search;
        if (strlen($str) >= 4) {
            $results = Company::where('name', 'like', '%' . $str . '%')
                ->orWhere('internet_address', 'like', '%' . $str . '%')
                ->paginate(10);

            return view("companies.companies")->with('companies', $results);
        } else {
            Session::flash('msg_success', 'minimum 4 character needed');
            return redirect()->Route('comindex');
        }
    }
}
