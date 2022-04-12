<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use \Datetime;

class ApiCategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $category = new Category();

        $category->tenloai= $request->tenloai;
        $category->Delet= $request->Delet;

        $category->save();

        return $category;
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Category::find($request->id);
        $db->tenloai = $request->tenloai;
        $db->Delet = $request->Delet;

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return 'deleted';
    }
}
