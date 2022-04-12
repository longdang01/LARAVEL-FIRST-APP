<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;
use \Datetime;

class ApiSlideController extends Controller
{
    public function index()
    {
        return Slide::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $slide = new Slide();

        $slide->link = $request->link;
        $slide->image = '';

        $slide->save();

        return $slide;
    }

    public function show($id)
    {
        return Slide::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Slide::find($request->id_slide);
        $db->link = $request->link;
        $db->image = '';

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Slide::findOrFail($id)->delete();
        return 'deleted';
    }
}
