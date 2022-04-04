<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $db = Store::all();
        $products = Product::all();

        return view('admin.store.index', ['stores' => $db, 
        'products' => $products]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Store::find($id) : null;
        
        $products = Product::all();

        return view('admin.store.edit', ['store' => $db, 
        'products' => $products]);
    }

    public function create(Request $request)
    {
        $store = new Store();
        $store->id_sp= $request->product;
        $store->sl= $request->amount;

        $store->save();

        return redirect()->to('/admin/store');
    }

    public function update(Request $request)
    {
        $db = Store::find($request->id);
        $db->id_sp= $request->product;
        $db->sl= $request->amount;

        $db->save();
        return redirect()->to('/admin/store');
    }

    public function delete($id)
    {
        $db = Store::find($id)->delete();
        return redirect()->to('/admin/store');
    }
}
