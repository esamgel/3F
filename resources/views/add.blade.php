@extends('layouts.app')

{{-- //this will add laravel’s default navbar to your page --}}

@section('content')

<div class="container">
                <h2>Add New Transaction</h2>
                  <div class="col-lg-1 control-label">accountid#:{{$account->id}}</div>

<form method="POST" action="/transaction">

    <div class="form-group">
        <div class="col-lg-1 control-label">Date:</div>
            <div class="col-lg-2"><input type="date" name="date" max="" class="form-control"></input></div>

        <div class="col-lg-2 control-label">Description:</div>
            <div class="col-lg-10"><textarea name="description" class="form-control" value="contribution fee"> </textarea></div>
        <div class="col-lg-1 control-label">Type: </div>
            <div class="col-lg-2">
              <select name="type" type="text" class="form-control">
                  <option value="debit">Debit</option>
                  <option value="credit">Credit</option>
              </select></div>
        <div class="col-lg-1 control-label">Amount: </div>
            <div class="col-lg-2"><input name="amount" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control"></input></div>

        <input type="hidden" name="account_id" value="{{$account->id}}"></input>
    </div>


    <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2"><button type="submit" class="btn btn-primary">Submit </button>
          </div>
    </div>
{{ csrf_field() }}
</form>


</div>

@endsection
