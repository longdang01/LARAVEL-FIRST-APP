<?php

namespace App\Http\Controllers;

use App\Models\BillImportDetail;
use App\Models\BillImport;
use App\Models\Product;
use Illuminate\Http\Request;

class BillImportDetailController extends Controller
{
    public function index()
    {
        $db = BillImportDetail::all();
        $billImports = BillImport::all();
        $products = Product::all();

        return view('admin.bill-import-detail.index', ['billImportDetails' => $db, 
        'billImports' => $billImports, 'products' => $products]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? BillImportDetail::find($id) : null;
        
        $billImports = BillImport::all();
        $products = Product::all();

        return view('admin.bill-import-detail.edit', ['billImportDetail' => $db,
        'billImports' => $billImports, 'products' => $products]);
    }

    public function create(Request $request)
    {
        $bill = new BillImportDetail();
        $bill->id_bill_nhap= $request->billImport;
        $bill->id_sp= $request->product;
        $bill->sl = $request->amount;
        $bill->don_vi= $request->unit;

        $bill->save();

        return redirect()->to('/admin/bill-import-detail');
    }

    public function update(Request $request)
    {
        $db = BillImportDetail::find($request->id);

        $db->id_bill_nhap= $request->billImport;
        $db->id_sp= $request->product;
        $db->sl = $request->amount;
        $db->don_vi= $request->unit;

        $db->save();
        return redirect()->to('/admin/bill-import-detail');
    }

    public function delete($id)
    {
        $db = BillImportDetail::find($id)->delete();
        return redirect()->to('/admin/bill-import-detail');
    }
}
