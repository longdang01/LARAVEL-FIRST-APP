<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $db = Slide::all();

        return view('admin.slide.index', ['slides' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Slide::find($id) : null;
        
        return view('admin.slide.edit', ['slide' => $db]);
    }

    public function create(Request $request)
    {
        $slide = new Slide();

        $slide->link = $request->link;
        $slide->image = $request->image;

        $slide->save();

        return redirect()->to('/admin/slide');
    }

    public function update(Request $request)
    {
        $db = Slide::find($request->id);
        $db->link = $request->link;
        $db->image = $request->image;

        $db->save();
        return redirect()->to('/admin/slide');
    }

    public function delete($id)
    {
        $db = Slide::find($id)->delete();
        return redirect()->to('/admin/slide');
    }
}
