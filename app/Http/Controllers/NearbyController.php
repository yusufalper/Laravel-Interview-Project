<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Support\Facades\Session;

class NearbyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        Session::flash('msg_success', 'Pick an address to scan nearby :');
        return redirect()->Route('adrindex');
    }

    public function list($id)
    {
        $address = Address::find($id);
        $company = $address->company;

        return view("nearby.nearby")
            ->with('address', $address)
            ->with('company', $company);
    }
}
