<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Account;
use App\Balance;
use Auth;

class BalancesController extends Controller
{

  public function list(Account $account)
  {
    if (Auth::check() && Auth::user()->role == '1')
    {
        $user = Auth::user();

        //if ($account->type == 'saving')
            //getsum($account, 'saving');
      //  if ($account->type == 'loan')
          //  getsum($account, 'loan');

        return view('balancelist', compact('account'));
    }
  }

  public function add(Account $account)
  {

      return view('add', compact('account'));
  }

  public function total(Account $account)
  {

      $total = DB::table('transactions')
        ->where('transactions.account_id', '=', $account->id)
        ->sum('transactions.amount');
          //->join('categories', 'transactions.category_id', '=', 'categories.id')

      //$record = Balance::where('account_id', '=', Input::get('$account->id'))->first();
      $balance = new Balance();

      if((Balance::find($account->id)) == NULL)
      {
          //$balance = new Balance();
          $balance->saving_bal = 0;
          $balance->loan_bal = 0;
          $balance->repaid_bal = 0;
          $balance->debit_bal = 0;
          $balance->credit_bal = 0;
          $balance->account_id = $account->id;
          $balance->user_id = $account->user_id;
          $balance->save();
      }

      if($account->type == 'saving')
          $key = 'saving_bal';
      if($account->type == 'loan')
          $key = 'loan_bal';
      if($account->type == 'repayment')
          $key = 'repaid_bal';
      if($account->type == 'debit')
          $key = 'debit_bal';
      if($account->type == 'credit')
          $key = 'credit_bal';

      $balance = Balance::find($account->id);
      $balance->$key = $total;
      $balance->save();

      return view('balancelist', compact('account'));
  }

  public function update(Request $request, Account $account)
  {
      if(isset($_POST['delete'])){

          $balance = new Balance();
          $balance->account_id = $account->id;
          $balance->delete();
          //return view('transactionlist',compact('account'));
      }
      else {

            //if ($account->type == 'saving')
          //      getsum($account, 'saving');
          //  if ($account->type == 'loan')
          //      getsum($account, 'loan');
        //  $balance->$key = $total;
        //  $balance->account_id = $transaction->account_id;
        //  $balance->user_id = $transaction->user_id;
        //  $balance->save();
          //return redirect('/');
      }
  }
}
