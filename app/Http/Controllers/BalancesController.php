<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Client;
use App\Balance;
use App\Account;
use Auth;

class BalancesController extends Controller
{

  public function list(Account $account)
  {
    if (Auth::check() && Auth::user()->role == '1')
    {
        $user = Auth::user();
        $balances = DB::table('balances')->get();

        return view('balancelistall', compact('balances'));
    }
  }

  public function add(Account $account)
  {

      return view('add', compact('account'));
  }

  public function total(Account $account)
  {
      $balance = new Balance();

      $total = DB::table('transactions')
        ->where('transactions.account_id', '=', $account->id)
        ->sum('transactions.amount');

      //query to lookup Balance record if already exist
      $balance = DB::table('Balances')->where([
          ['client_id', '=', $account->client_id],
          ['account_id', '=', $account->id]
        ])->first();


      if(is_NULL($balance)) //initial value when first balance record created
      {
          $balance = new Balance();
          $balance->saving_bal = 0;
          $balance->loan_bal = 0;
          $balance->repaid_bal = 0;
          $balance->debit_bal = 0;
          $balance->credit_bal = 0;
          $balance->account_id = $account->id;
          $balance->client_id = $account->client_id;
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

            //query to update existing balances record
            DB::table('Balances')
            ->where([
                ['client_id', '=', $account->client_id],
                ['account_id', '=', $account->id]
              ])
            ->update([$key => $total]);



      return view('balancelist', compact('account'));
  }

}
