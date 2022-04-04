<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ApiProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function create(Request $request)
    {
        $product = new Product();
        $product->name= $request->name;
        $product->id_loai_sp= $request->category;
        $product->id_ncc = $request->supplier;
        $product->mota_sp= $request->description;
        $product->so_luong = $request->amount;
        $product->Delet = 0;

        $product->save();

        return $product;
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $db = Product::find($request->id);
        $db->name= $request->name;
        $db->id_loai_sp= $request->category;
        $db->id_ncc = $request->supplier;
        $db->mota_sp= $request->description;
        $db->so_luong = $request->amount;
        $db->Delet = 0;

        $db->save();
        return $db;
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return 'deleted';
    }
}
