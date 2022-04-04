<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $db = Category::all();

        return view('admin.category.index', ['categories' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Category::find($id) : null;
        
        return view('admin.category.edit', ['category' => $db]);
    }

    public function create(Request $request)
    {
        $category = new Category();

        $category->tenloai= $request->name;
        $category->Delet= $request->delet;

        $category->save();

        return redirect()->to('/admin/category');
    }

    public function update(Request $request)
    {
        $db = Category::find($request->id);
        $db->tenloai = $request->name;
        $db->Delet = $request->delet;

        $db->save();
        return redirect()->to('/admin/category');
    }

    public function delete($id)
    {
        $db = Category::find($id)->delete();
        return redirect()->to('/admin/category');
    }
}
