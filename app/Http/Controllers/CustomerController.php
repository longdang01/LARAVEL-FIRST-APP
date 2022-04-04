<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $db = Customer::all();

        return view('admin.customer.index', ['customers' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Customer::find($id) : null;
        
        return view('admin.customer.edit', ['customer' => $db]);
    }

    public function create(Request $request)
    {
        $customer = new Customer();

        $customer->ten_kh = $request->name;
        $customer->email = $request->email;
        $customer->dia_chi = $request->address;
        $customer->sdt = $request->phone;
        $customer->note = $request->note;

        $customer->save();

        return redirect()->to('/admin/customer');
    }

    public function update(Request $request)
    {
        $db = Customer::find($request->id);
        $db->ten_kh = $request->name;
        $db->email = $request->email;
        $db->dia_chi = $request->address;
        $db->sdt = $request->phone;
        $db->note = $request->note;

        $db->save();
        return redirect()->to('/admin/customer');
    }

    public function delete($id)
    {
        $db = Customer::find($id)->delete();
        return redirect()->to('/admin/customer');
    }
}
