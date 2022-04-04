<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $db = Product::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.product.index', ['products' => $db, 
        'categories' => $categories, 'suppliers' => $suppliers]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Product::find($id) : null;
        
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('admin.product.edit', ['product' => $db, 'categories' => $categories,
        'suppliers' => $suppliers]);
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

        return redirect()->to('/admin/product');
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
        return redirect()->to('/admin/product');
    }

    public function delete($id)
    {
        $db = Product::find($id)->delete();
        return redirect()->to('/admin/product');
    }
}
