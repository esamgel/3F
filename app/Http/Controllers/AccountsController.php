<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Account;

class AccountsController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->role == '1')
        {
            $user = Auth::user();
            return view('welcome', compact('user'));
        }
        else {
            return view('auth.login');
        }
    }

    public function add()
    {
        return view('addaccount');
    }

    public function create(Request $request)
    {
        $account = new Account();
        $account -> name = $request->name;
        $account -> type = $request->type;
        $account -> description = $request->description;
        $account -> user_id = Auth::id();
        $account -> save();
        return redirect('/');
    }

    public function edit(Account $account)
    {
        if (Auth::check() && Auth::user()->role == '1')
        {
            return view('editaccount', compact('account'));
        }
        else {
            return redirect('/');
        }
    }

    public function update(Request $request, Account $account)
    {
        if(isset($_POST['delete']))
        {
            $account->delete();
            return redirect('/');
        }
        else{
          $account -> name = $request->name;
          $account -> type = $request->type;
          $account -> description = $request->description;
          $account -> user_id = Auth::id();
          $account -> save();
          return redirect('/');
        }
    }
}
