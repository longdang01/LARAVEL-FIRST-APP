<?php

namespace App\Http\Controllers;

use App\Models\BillExport;
use App\Models\Customer;
use Illuminate\Http\Request;

class BillExportController extends Controller
{
    public function index()
    {
        $db = BillExport::all();
        $customers = Customer::all();

        return view('admin.bill-export.index', ['billExports' => $db, 
        'customers' => $customers]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? BillExport::find($id) : null;
        
        $customers = Customer::all();

        return view('admin.bill-export.edit', ['billExport' => $db, 'customers' => $customers]);
    }

    public function create(Request $request)
    {
        $bill = new BillExport();
        $bill->id_kh= $request->customer;
        $bill->date_order= $request->dateOrder;
        $bill->tong_tien = $request->totalPrice;
        $bill->payment= $request->payment;
        $bill->status = $request->status;
        $bill->note = $request->note;

        $bill->save();

        return redirect()->to('/admin/bill-export');
    }

    public function update(Request $request)
    {
        $db = BillExport::find($request->id);

        $db->id_kh= $request->customer;
        $db->date_order= $request->dateOrder;
        $db->tong_tien = $request->totalPrice;
        $db->payment= $request->payment;
        $db->status = $request->status;
        $db->note = $request->note;

        $db->save();
        return redirect()->to('/admin/bill-export');
    }

    public function delete($id)
    {
        $db = BillExport::find($id)->delete();
        return redirect()->to('/admin/bill-export');
    }
}
