<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $db = Supplier::all();

        return view('admin.supplier.index', ['suppliers' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Supplier::find($id) : null;
        
        return view('admin.supplier.edit', ['supplier' => $db]);
    }

    public function create(Request $request)
    {
        $supplier = new Supplier();

        $supplier->ten_ncc = $request->name;
        $supplier->diachi_ncc = $request->address;
        $supplier->email = $request->email;
        $supplier->sdt = $request->phone;
        $supplier->Delet = $request->delet;

        $supplier->save();

        return redirect()->to('/admin/supplier');
    }

    public function update(Request $request)
    {
        $db = Supplier::find($request->id);
        $db->ten_ncc = $request->name;
        $db->diachi_ncc = $request->address;
        $db->email = $request->email;
        $db->sdt = $request->phone;
        $db->Delet = $request->delet;

        $db->save();
        return redirect()->to('/admin/supplier');
    }

    public function delete($id)
    {
        $db = Supplier::find($id)->delete();
        return redirect()->to('/admin/supplier');
    }
}
