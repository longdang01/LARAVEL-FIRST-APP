<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use \Datetime;

class ApiSupplierController extends Controller
{
    public function index()
    {
        return Supplier::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $supplier = new Supplier();

        $supplier->ten_ncc = $request->ten_ncc;
        $supplier->diachi_ncc = $request->diachi_ncc;
        $supplier->email = $request->email;
        $supplier->sdt = $request->sdt;
        $supplier->Delet = $request->Delet;
        $supplier->save();

        return $supplier;
    }

    public function show($id)
    {
        return Supplier::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Supplier::find($request->id);
        $db->ten_ncc = $request->ten_ncc;
        $db->diachi_ncc = $request->diachi_ncc;
        $db->email = $request->email;
        $db->sdt = $request->sdt;
        $db->Delet = $request->Delet;
        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Supplier::findOrFail($id)->delete();
        return 'deleted';
    }
}
