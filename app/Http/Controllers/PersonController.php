<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $people = Person::paginate(10);

        $companyName = [];

        foreach ($people as $person) {
            $company = Company::find($person['company_id']);
            $companyName[$person['id']] = $company['name'];
        }

        return view("people.people")
            ->with('people', $people)
            ->with('companyName', $companyName);
    }

    public function create()
    {
        $companies = Company::all();
        return view("people.person_create")->with('companies', $companies);
    }

    public function store(Request $request)
    {
        $request['phone'] = str_replace(' ', '', $request['phone']);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|regex:/[0-9]{10}/',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $person = new Person();

            $person->name = $request->name;
            $person->lastname = $request->lastname;
            $person->email = $request->email;
            $person->phone = $request->phone;
            $person->company_id = $request->company_id;

            $person->save();
            Session::flash('msg_success', 'Person Successfully Added');

            return redirect()->Route('pshow', ['id' => $person['id']]);
        }
    }

    public function show($id)
    {
        $person = Person::find($id);
        $company = Company::find($person['company_id']);

        return view("people.person_show")
            ->with('person', $person)
            ->with('company', $company);
    }

    public function edit($id)
    {
        $person = Person::find($id);
        $companies = Company::all();
        return view("people.person_edit")
            ->with('person', $person)
            ->with('companies', $companies);
    }

    public function update(Request $request)
    {
        $request['phone'] = str_replace(' ', '', $request['phone']);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|regex:/[0-9]{10}/',
            'company_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $person = Person::find($request->id);

            $person->name = $request->name;
            $person->lastname = $request->lastname;
            $person->email = $request->email;
            $person->phone = $request->phone;
            $person->company_id = $request->company_id;
            $person->save();

            Session::flash('msg_success', 'Person Info Successfully Updated');
            return redirect()->Route('pshow', ['id' => $person['id']]);
        }
    }

    public function destroy($id)
    {
        Person::destroy($id);
        Session::flash('msg_success', 'Person Deleted');
        return redirect()->back();
    }

    public function search(Request $req)
    {
        $str = $req->search;
        if (strlen($str) >= 4) {

            $results = Person::where('name', 'like', '%' . $str . '%')
                ->orWhere('lastname', 'like', '%' . $str . '%')
                ->orWhere('email', 'like', '%' . $str . '%')
                ->orWhere('phone', 'like', '%' . $str . '%')
                ->paginate(10);

            $companyName = [];

            foreach ($results as $person) {
                $company = Company::find($person['company_id']);
                $companyName[$person['id']] = $company['name'];
            }

            return view("people.people")
                ->with('people', $results)
                ->with('companyName', $companyName);
        } else {
            Session::flash('msg_success', 'minimum 4 character needed');
            return redirect()->Route('pindex');
        }
    }
}
