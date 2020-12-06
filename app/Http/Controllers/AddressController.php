<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $addresses = Address::paginate(10);
        $companyName = [];

        foreach ($addresses as $address) {
            $company = Company::find($address['company_id']);
            $companyName[$address['id']] = $company['name'];
        }

        return view("addresses.addresses")
            ->with('addresses', $addresses)
            ->with('companyName', $companyName);
    }

    public function create()
    {
        $companies = Company::all();
        return view("addresses.address_create")->with('companies', $companies);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);


        if ($validator->fails()) {
            Session::flash('msg_success', 'latitude or longitude format is wrong');
            return redirect()->back();
        } else {
            $address = new Address();
            $address->latitude = $request->latitude;
            $address->longitude = $request->longitude;
            $address->company_id = $request->company_id;
            $address->save();

            Session::flash('msg_success', 'Adress Successfully Added');

            return redirect()->Route('adrshow', ['id' => $address['id']]);
        }

    }

    public function show($id)
    {
        $address = Address::find($id);
        $company = Company::find($address['company_id']);

        return view("addresses.address_show")
            ->with('address', $address)
            ->with('company', $company);
    }

    public function edit($id)
    {
        $address = Address::find($id);
        $companies = Company::all();
        return view("addresses.address_edit")
            ->with('address', $address)
            ->with('companies', $companies);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => ['required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitude' => ['required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/']
        ]);

        if ($validator->fails()) {
            Session::flash('msg_success', 'latitude or longitude format is wrong');
            return redirect()->back();
        } else {
            $address = Address::find($request->id);

            $address->latitude = $request->latitude;
            $address->longitude = $request->longitude;
            $address->company_id = $request->company_id;
            $address->save();
    
            Session::flash('msg_success', 'Adress Info Successfully Updated');
            return redirect()->Route('adrshow', ['id' => $address['id']]);
        }
    }

    public function destroy($id)
    {
        Address::destroy($id);
        Session::flash('msg_success', 'Adress Deleted');
        return redirect()->back();
    }
}
