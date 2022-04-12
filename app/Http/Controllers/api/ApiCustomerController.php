<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use \Datetime;

class ApiCustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->ten_kh = $request->ten_kh;
        $customer->email = $request->email;
        $customer->dia_chi = $request->dia_chi;
        $customer->sdt = $request->sdt;
        $customer->note = $request->note;

        $customer->save();

        return $customer;
    }

    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Customer::find($request->id);
        $db->ten_kh = $request->ten_kh;
        $db->email = $request->email;
        $db->dia_chi = $request->dia_chi;
        $db->sdt = $request->sdt;
        $db->note = $request->note;

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();
        return 'deleted';
    }
}
