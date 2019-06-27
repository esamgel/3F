<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Client;

class ClientsController extends Controller
{
  public function list()
  {
      if (Auth::check() && Auth::user()->role == '1')
      {
          $clients = DB::table('clients')->get();
          return view('clientlist', compact('clients'));
      }
      else {
          return view('auth.login');
      }
  }

  public function add()
  {
      return view('addclient', compact('client'));
  }

  public function create(Request $request)
  {
      $client = new Client();
      $client -> first_name = $request->first_name;
      $client -> last_name = $request->last_name;
      $client -> user_id = $request->user_id;
      $client->save();
      return redirect('/');
  }

  public function edit(Client $client)
  {
      if (Auth::check() && Auth::user()->role == '1')
      {
          return view('editclient', compact('client'));
      }
      else {
          return redirect('/');
      }
  }

  public function update(Request $request, Client $client)
  {
      if(isset($_POST['delete']))
      {
          $client->delete();
          return redirect('/');
      }
      else{
        $client -> first_name = $request->first_name;
        $client -> last_name = $request->last_name;
        $client -> user_id = $request->user_id;
        $client -> save();
        return redirect('/');
      }
  }

}
