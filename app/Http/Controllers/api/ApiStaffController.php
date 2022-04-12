<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use \Datetime;

class ApiStaffController extends Controller
{
    public function index()
    {
        return Staff::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $staff = new Staff();

        $staff->ten_nhanvien = $request->ten_nhanvien;
        $staff->gioitinh = $request->gioitinh;
        $staff->ngaysinh = substr($request->ngaysinh, 0, 10);
        $staff->quequan = $request->quequan;
        $staff->sdt = $request->sdt;
        $staff->email = $request->email;
        $staff->capbac = $request->capbac;

        $staff->save();

        return $staff;
    }

    public function show($id)
    {
        return Staff::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Staff::find($request->id);
        $db->ten_nhanvien = $request->ten_nhanvien;
        $db->gioitinh = $request->gioitinh;
        $db->ngaysinh = substr($request->ngaysinh, 0, 10);
        $db->quequan = $request->quequan;
        $db->sdt = $request->sdt;
        $db->email = $request->email;
        $db->capbac = $request->capbac;

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Staff::findOrFail($id)->delete();
        return 'deleted';
    }
}
