<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Account;
use App\Client;
use App\Balance;

class AccountsController extends Controller
{
    public function index(Client $client)
    {
        if (Auth::check() && Auth::user()->role == '1')
        {

            return view('welcome', compact('client'));
        }
        else {
            return view('auth.login');
        }
    }

    public function list(Client $client)
    {
        if (Auth::check() && Auth::user()->role == '1')
        {
            $accounts = DB::table('accounts')->get();
    
            return view('accountlist', compact('accounts'));
        }
        else {
            return view('auth.login');
        }
    }

    public function add(Client $client)
    {
        return view('addaccount', compact('client'));
    }

    public function create(Request $request)
    {
        $account = new Account();

        $account -> name = $request->name;
        $account -> type = $request->type;
        $account -> description = $request->description;
        $account -> client_id = $request->client_id;
        $account -> save();
    
        $client = new Client();
        $client -> id = $request->client_id;

        return view('welcome', compact('client'));
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
        $client = new Client();
        $client->id = $account->client_id;

        if(isset($_POST['delete']))
        {

            $account->delete();
            return view('welcome', compact('client'));
        }
        else{
          $account -> name = $request->name;
          $account -> type = $request->type;
          $account -> description = $request->description;
          $account -> client_id = $request->client_id;
          $account -> save();

          return view('welcome', compact('client'));
        }
    }
}
