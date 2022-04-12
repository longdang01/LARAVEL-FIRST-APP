<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Migration;
use \Datetime;

class ApiMigrationController extends Controller
{
    public function index()
    {
        return Migration::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $migration = new Migration();

        $migration->migration = $request->migration;
        $migration->batch = $request->batch;

        $migration->save();

        return $migration;
    }

    public function show($id)
    {
        return Migration::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Migration::find($request->id);
        $db->migration = $request->migration;
        $db->batch = $request->batch;

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Migration::findOrFail($id)->delete();
        return 'deleted';
    }
}
