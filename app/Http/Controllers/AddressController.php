<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::paginate(10);
        $addressCompName=[];

        foreach ($addresses as $address) {
            $company = Company::find($address['company_id']);
            $addressCompName[$address['id']] = $company['name'];
        }

        return view("addresses.addresses")
            ->with('addresses', $addresses)
            ->with('addressCompName', $addressCompName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comps = Company::all();
        return view("addresses.address_create")->with('comps', $comps);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adr = new Address();

        $adr->latitude = $request->latitude;
        $adr->longitude = $request->longitude;
        $adr->company_id = $request->company_id;
        
        $adr->save();
        Session::flash('msg_success', 'Adress Successfully Added');

        return redirect()->Route('adrshow', ['id' => $adr['id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = Address::find($id);
        $comp = Company::find($address['company_id']);

        return view("addresses.address_show")
            ->with('address', $address)
            ->with('comp', $comp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);
        $comps = Company::all();
        return view("addresses.address_edit")
            ->with('address', $address)
            ->with('comps', $comps);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $address = Address::find($request->id);

        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->company_id = $request->company_id;
        $address->save();

        Session::flash('msg_success', 'Adress Info Successfully Updated');
        return redirect()->Route('adrshow', ['id' => $address['id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Address::destroy($id);
        Session::flash('msg_success', 'Adress Deleted');
        return redirect()->back();
    }
}
