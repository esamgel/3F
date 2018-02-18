@extends('layouts.3fcustom')

{{-- // this will add laravel’s default navbar to your page --}}

@section('content')
<div class="container">
                <h2>Create New Client</h2>

<form method="POST" action="/client">

    <div class="form-group">
        <div class="col-lg-2 control-label">First Name:</div>
            <div class="col-lg-2"><input name="first_name" type="text" class="form-control" value="{{$client->first_name}}"></input></div>
        <div class="col-lg-2 control-label">Last Name:</div>
            <div class="col-lg-2"><input name="last_name" type="text" class="form-control" value="{{$client->last_name}}"></input></div>
        <div class="col-lg-2 control-label">User id:</div>
            <div class="col-lg-2"><input name="user_id" type="number" class="form-control" value="{{$client->user_id}}"></input></div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Update</button></div>
    </div>
{{ csrf_field() }}
</form>

@endsection
