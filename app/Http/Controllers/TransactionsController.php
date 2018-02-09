<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Transaction;

class TransactionsController extends Controller
{
  public function index()
  {
      $user = Auth::user();
      return view('welcome', compact('user'));
  }

  public function add()
  {
      return view('add');
  }

  public function create(Request $request)
  {

        $transaction = new Transaction();
        $transaction -> date = $request->date;
        $transaction -> description = $request->description;
        $transaction -> type = $request->type;
        $transaction -> amount = $request->amount;
        $transaction -> user_id = Auth::id();
        $transaction -> save();
        return redirect('/');

  }

  public function edit(Transaction $transaction)
  {
      if(Auth::check() && Auth::user()->id == $transaction->user_id)
      {
          return view('edit', compact('transaction'));
      }
      else {
          return redirect('/');
      }
  }

  public function update(Request $request, Transaction $transaction)
  {
      if(isset($_POST['delete'])){
          $transaction->delete();
          /** return redirect('/'); **/
          return response()->json(['success'=>"Transaction Deleted successfully.", $transaction->id]);

      }
      else {
          $transaction->date = $request->date;
          $transaction->description = $request->description;
          $transaction->type = $request->type;
          $transaction->amount = $request->amount;
          $transaction->save();
          return redirect('/');
      }
  }
}
