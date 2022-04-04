<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $db = Staff::all();

        return view('admin.staff.index', ['staffs' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Staff::find($id) : null;
        
        return view('admin.staff.edit', ['staff' => $db]);
    }

    public function create(Request $request)
    {
        $staff = new Staff();

        $staff->ten_nhanvien = $request->name;
        $staff->gioitinh = $request->gender;
        $staff->ngaysinh = $request->dateOfBirth;
        $staff->quequan = $request->address;
        $staff->sdt = $request->phone;
        $staff->email = $request->email;
        $staff->capbac = $request->level;

        $staff->save();

        return redirect()->to('/admin/staff');
    }

    public function update(Request $request)
    {
        $db = Staff::find($request->id);
        $db->ten_nhanvien = $request->name;
        $db->gioitinh = $request->gender;
        $db->ngaysinh = $request->dateOfBirth;
        $db->quequan = $request->address;
        $db->sdt = $request->phone;
        $db->email = $request->email;
        $db->capbac = $request->level;

        $db->save();
        return redirect()->to('/admin/staff');
    }

    public function delete($id)
    {
        $db = Staff::find($id)->delete();
        return redirect()->to('/admin/staff');
    }
}
