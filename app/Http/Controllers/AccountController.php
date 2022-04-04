<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $db = Account::all();

        return view('admin.account.index', ['accounts' => $db]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Account::find($id) : null;
        
        return view('admin.account.edit', ['account' => $db]);
    }

    public function create(Request $request)
    {
        $account = new Account();

        $account->full_name= $request->fullName;
        $account->users_name= $request->userName;   
        $account->email= $request->email;   
        $account->password= $request->password;   
        $account->phone= $request->phone;   
        $account->address= $request->address;   
        $account->image = $request->image;   
        $account->Delet = $request->delet;   

        $account->save();

        return redirect()->to('/admin/account');
    }

    public function update(Request $request)
    {
        $db = Account::find($request->id);
        $db->full_name= $request->fullName;
        $db->users_name= $request->userName;   
        $db->email= $request->email;   
        $db->password= $request->password;   
        $db->phone= $request->phone;   
        $db->address= $request->address;   
        $db->image = $request->image;   
        $db->Delet = $request->delet;   

        $db->save();
        return redirect()->to('/admin/account');
    }

    public function delete($id)
    {
        $db = Account::find($id)->delete();
        return redirect()->to('/admin/account');
    }
}
