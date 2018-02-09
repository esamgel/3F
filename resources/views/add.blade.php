@extends('layouts.app')

{{-- //this will add laravel’s default navbar to your page --}}

@section('content')

<div class="container">
                <h2>Add New Transaction</h2>

<form method="POST" action="/transaction">

    <div class="form-group">
        Description: <textarea name="description" class="form-control" value="contribution fee"></textarea>
        Type: <select name="type" type="text" class="form-control">
                <option value="debit">Debit</option>
                <option value="credit">Credit</option>
              </select>
        Amount: <input name="amount" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control"></input>

    </div>


    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add Transaction</button>
    </div>
{{ csrf_field() }}
</form>


</div>

@endsection
