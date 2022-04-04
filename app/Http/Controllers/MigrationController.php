<?php

namespace App\Http\Controllers;

use App\Models\Migration;
use Illuminate\Http\Request;

class MigrationController extends Controller
{
    public function index()
    {
        $db = Migration::all();

        return view('admin.migration.index', ['migrations' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Migration::find($id) : null;
        
        return view('admin.migration.edit', ['migration' => $db]);
    }

    public function create(Request $request)
    {
        $migration = new Migration();

        $migration->migration = $request->migration;
        $migration->batch = $request->batch;

        $migration->save();

        return redirect()->to('/admin/migration');
    }

    public function update(Request $request)
    {
        $db = Migration::find($request->id);
        $db->migration = $request->migration;
        $db->batch = $request->batch;;

        $db->save();
        return redirect()->to('/admin/migration');
    }

    public function delete($id)
    {
        $db = Migration::find($id)->delete();
        return redirect()->to('/admin/migration');
    }
}
