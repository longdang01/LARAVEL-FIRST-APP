<?php

namespace App\Http\Controllers;

use App\Models\BillExportDetail;
use App\Models\BillExport;
use App\Models\Product;
use Illuminate\Http\Request;

class BillExportDetailController extends Controller
{
    public function index()
    {
        $db = BillExportDetail::all();
        $billExports = BillExport::all();
        $products = Product::all();

        return view('admin.bill-export-detail.index', ['billExportDetails' => $db, 
        'billExports' => $billExports, 'products' => $products]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? BillExportDetail::find($id) : null;
        
        $billExports = BillExport::all();
        $products = Product::all();

        return view('admin.bill-export-detail.edit', ['billExportDetail' => $db,
        'billExports' => $billExports, 'products' => $products]);
    }

    public function create(Request $request)
    {
        $bill = new BillExportDetail();
        $bill->id_bill_ban= $request->billExport;
        $bill->id_sp= $request->product;
        $bill->sl = $request->amount;

        $bill->save();

        return redirect()->to('/admin/bill-export-detail');
    }

    public function update(Request $request)
    {
        $db = BillExportDetail::find($request->id);

        $db->id_bill_ban= $request->billExport;
        $db->id_sp= $request->product;
        $db->sl = $request->amount;

        $db->save();
        return redirect()->to('/admin/bill-export-detail');
    }

    public function delete($id)
    {
        $db = BillExportDetail::find($id)->delete();
        return redirect()->to('/admin/bill-export-detail');
    }
}
