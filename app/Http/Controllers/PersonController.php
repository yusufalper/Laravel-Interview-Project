<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Person::paginate(10);
        $personCompName=[];

        foreach ($people as $person) {
            $company = Company::find($person['company_id']);
            $personCompName[$person['id']] = $company['name'];
        }

        return view("people.people")
            ->with('people', $people)
            ->with('personCompName', $personCompName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comps = Company::all();
        return view("people.person_create")->with('comps', $comps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::find($id);
        $comp = Company::find($person['company_id']);

        return view("people.person_show")
            ->with('person', $person)
            ->with('comp', $comp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $person = Person::find($id);
        $comps = Company::all();
        return view("people.person_edit")
            ->with('person', $person)
            ->with('comps', $comps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Person::destroy($id);
        Session::flash('msg_success', 'Person Deleted');
        return redirect()->back();
    }
}
