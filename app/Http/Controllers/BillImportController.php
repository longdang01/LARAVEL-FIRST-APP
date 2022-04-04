<?php

namespace App\Http\Controllers;

use App\Models\BillImport;
use App\Models\Supplier;
use App\Models\Staff;
use Illuminate\Http\Request;

class BillImportController extends Controller
{
    public function index()
    {
        $db = BillImport::all();
        $suppliers = Supplier::all();
        $staffs = Staff::all();

        return view('admin.bill-import.index', ['billImports' => $db, 
        'suppliers' => $suppliers, 'staffs' => $staffs]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? BillImport::find($id) : null;
        
        $suppliers = Supplier::all();
        $staffs = Staff::all();

        return view('admin.bill-import.edit', ['billImport' => $db,
        'suppliers' => $suppliers, 'staffs' => $staffs]);
    }

    public function create(Request $request)
    {
        $bill = new BillImport();
        $bill->id_ncc= $request->supplier;
        $bill->id_nhanvien= $request->staff;
        $bill->date_order = $request->dateOrder;
        $bill->tong_tien= $request->totalPrice;
        $bill->thanh_toan = $request->checkout;
        $bill->note = $request->note;

        $bill->save();

        return redirect()->to('/admin/bill-import');
    }

    public function update(Request $request)
    {
        $db = BillImport::find($request->id);

        $db->id_ncc= $request->supplier;
        $db->id_nhanvien= $request->staff;
        $db->date_order = $request->dateOrder;
        $db->tong_tien= $request->totalPrice;
        $db->thanh_toan = $request->checkout;
        $db->note = $request->note;

        $db->save();
        return redirect()->to('/admin/bill-import');
    }

    public function delete($id)
    {
        $db = BillImport::find($id)->delete();
        return redirect()->to('/admin/bill-import');
    }
}
