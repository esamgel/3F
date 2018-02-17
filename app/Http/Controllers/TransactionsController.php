<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transaction;
use App\Account;
use App\Balance;

class TransactionsController extends Controller
{
  public function list(Account $account)
  {
    if (Auth::check() && Auth::user()->role == '1')
    {
        $user = Auth::user();
        $transaction = new Transaction();
        $transaction->account_id = $account->id;

        return view('transactionlist', compact('account'));
    }
  }

  public function add(Account $account)
  {

      return view('add', compact('account'));
  }

  public function create(Request $request)
  {
        $account = New Account();
        $transaction = new Transaction();
        $transaction -> date = $request->date;
        $transaction -> description = $request->description;
        $transaction -> type = $request->type;
        $transaction -> amount = $request->amount;
        $transaction -> account_id = $request->account_id;
        $transaction -> save();
        $account->id = $request->account_id;
        return view('transactionlist', compact('account'));

  }

  public function edit(Transaction $transaction)
  {
      if(Auth::check() && Auth::user()->role == '1' )
      {
          return view('edit', compact('transaction'));
      }
      else {
          return redirect('/');
      }
  }

  public function update(Request $request, Transaction $transaction)
  {

    $account = new Account();
    $account->id = $transaction->account_id;

      if(isset($_POST['delete'])){

          $transaction->delete();
          return view('transactionlist',compact('account'));

      }
      else {
          $transaction->date = $request->date;
          $transaction->description = $request->description;
          $transaction->type = $request->type;
          $transaction->amount = $request->amount;
          $transaction->save();
          return view('transactionlist', compact('account'));
      }
  }
}
