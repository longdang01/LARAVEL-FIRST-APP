<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use \Datetime;

class ApiNewsController extends Controller
{
    public function index()
    {
        return News::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $news = new News();

        $news->title = $request->title;
        $news->content = $request->content;
        $news->image = '';

        $news->save();

        return $news;
    }

    public function show($id)
    {
        return News::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = News::find($request->id_new);
        $db->title = $request->title;
        $db->content = $request->content;
        $db->image = '';

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return 'deleted';
    }
}
