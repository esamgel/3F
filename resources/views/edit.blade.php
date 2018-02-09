@extends('layouts.app')

{{-- // this will add laravel’s default navbar to your page --}}

@section('content')

<div class="container">
<h1>Edit the Transaction</h1>

<form method="POST" action="/transaction/{{ $transaction->id }}">

<div class="form-group">
  Description: <textarea name="description" class="form-control">{{$transaction->description }}</textarea>
  Type: <select name="type" type="text" class="form-control" value="{{$transaction->type }}">
          <option value="debit">Debit</option>
          <option value="credit">Credit</option>
        </select>
  Amount: <input name="amount" type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" class="form-control" value="{{$transaction->amount }}"></input>
</div>


<div class="form-group">
  <button type="submit" name="update" class="btn btn-primary">Update transaction</button>
</div>
{{ csrf_field() }}
</form>



</div>
@endsection
