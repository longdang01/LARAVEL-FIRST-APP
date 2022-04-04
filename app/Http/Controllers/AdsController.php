<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $db = Ads::all();

        return view('admin.ads.index', ['adss' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Ads::find($id) : null;
        
        return view('admin.ads.edit', ['ads' => $db]);
    }

    public function create(Request $request)
    {
        $ads = new Ads();

        $ads->tittle= $request->title;
        $ads->image= $request->image;
        $ads->note= $request->note;

        $ads->save();

        return redirect()->to('/admin/ads');
    }

    public function update(Request $request)
    {
        $db = Ads::find($request->id);
        $db->tittle= $request->title;
        $db->image= $request->image;
        $db->note= $request->note;

        $db->save();
        return redirect()->to('/admin/ads');
    }

    public function delete($id)
    {
        $db = Ads::find($id)->delete();
        return redirect()->to('/admin/ads');
    }
}
