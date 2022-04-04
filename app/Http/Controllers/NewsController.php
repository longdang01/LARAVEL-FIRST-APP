<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $db = News::all();

        return view('admin.news.index', ['newss' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? News::find($id) : null;
        
        return view('admin.news.edit', ['news' => $db]);
    }

    public function create(Request $request)
    {
        $news = new News();

        $news->title = $request->title;
        $news->content = $request->content;
        $news->image = $request->image;

        $news->save();

        return redirect()->to('/admin/news');
    }

    public function update(Request $request)
    {
        $db = News::find($request->id);
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = $request->image;

        $db->save();
        return redirect()->to('/admin/news');
    }

    public function delete($id)
    {
        $db = News::find($id)->delete();
        return redirect()->to('/admin/news');
    }
}
