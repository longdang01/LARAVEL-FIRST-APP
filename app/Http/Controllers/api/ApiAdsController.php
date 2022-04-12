<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Illuminate\Http\Request;
use \Datetime;

class ApiAdsController extends Controller
{
    public function index()
    {
        return Ads::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $ads = new Ads();

        $ads->tittle = $request->tittle;
        $ads->image = '';
        $ads->note = $request->note;

        $ads->save();

        return $ads;
    }

    public function show($id)
    {
        return Ads::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Ads::find($request->id);
        $db->tittle = $request->tittle;
        $db->image = '';
        $db->note = $request->note;

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Ads::findOrFail($id)->delete();
        return 'deleted';
    }
}
