<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use \Datetime;

class ApiProductController extends Controller
{
    public function index()
    {
        // return [Product::all(), Category::all(), Supplier::all()];
        return [Product::with('category')->with('supplier')->get(), Category::all(), Supplier::all()];
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name= $request->name;
        $product->unit_price = $request->unit_price;
        $product->id_loai_sp= 1;
        $product->id_ncc = 1;
        $product->mota_sp= '123';
        $product->so_luong = 10;
        $product->Delet = 0;
        $product->created_at = new Datetime();

        $product->save();

        return $product;
    }

    public function show($id)
    {
        return Product::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Product::find($request->id);
        $db->name= $request->name;
        $db->unit_price = $request->unit_price;
        $db->updated_at = new Datetime();
        // $db->id_loai_sp= $request->category;
        // $db->id_ncc = $request->supplier;
        // $db->mota_sp= $request->description;
        // $db->so_luong = $request->amount;
        // $db->Delet = 0;

        $db->save();
        return $db;
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return 'deleted';
    }
}
