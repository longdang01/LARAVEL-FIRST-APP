<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use \Datetime;

class ApiAccountController extends Controller
{
    public function index()
    {
        return Account::all();
    }

    public function create(Request $request) {  }

    public function store(Request $request)
    {
        $account = new Account();

        $account->full_name= $request->full_name;
        $account->users_name= $request->users_name;   
        $account->email= $request->email;   
        $account->password= $request->password;   
        $account->phone= $request->phone;   
        $account->address= $request->address;   
        $account->image = '';   
        $account->Delet = $request->Delet;   

        $account->save();

        return $account;
    }

    public function show($id)
    {
        return Account::findOrFail($id);
    }

    public function edit($id) { }

    public function update(Request $request)
    {
        $db = Account::find($request->id);
        $db->full_name= $request->full_name;
        $db->users_name= $request->users_name;   
        $db->email= $request->email;   
        $db->password= $request->password;   
        $db->phone= $request->phone;   
        $db->address= $request->address;   
        $db->image = '';   
        $db->Delet = $request->Delet;   

        $db->save();

        return $db;
    }

    public function destroy($id)
    {
        Account::findOrFail($id)->delete();
        return 'deleted';
    }
}
