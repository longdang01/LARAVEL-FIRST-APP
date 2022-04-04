<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Account;
use App\Models\Product;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $db = Feedback::all();
        $accounts = Account::all();
        $products = Product::all();

        return view('admin.feedback.index', ['feedbacks' => $db, 
        'accounts' => $accounts ,'products' => $products]);
    }
    
    public function show($id)
    {
        $db = ($id != 0) ? Feedback::find($id) : null;
        
        $accounts = Account::all();
        $products = Product::all();

        return view('admin.feedback.edit', ['feedback' => $db, 
        'accounts' => $accounts ,'products' => $products]);
    }

    public function create(Request $request)
    {
        $fb = new Feedback();
        $fb->id_tk= $request->account;
        $fb->id_sp= $request->product;
        $fb->level= $request->level;
        $fb->note = $request->note;

        $fb->save();

        return redirect()->to('/admin/feedback');
    }

    public function update(Request $request)
    {
        $db = Feedback::find($request->id);
        $db->id_tk= $request->account;
        $db->id_sp= $request->product;
        $db->level= $request->level;
        $db->note = $request->note;
        $db->save();
        return redirect()->to('/admin/feedback');
    }

    public function delete($id)
    {
        $db = Feedback::find($id)->delete();
        return redirect()->to('/admin/feedback');
    }
}
