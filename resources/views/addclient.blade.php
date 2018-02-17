@extends('layouts.app')

@section('content')
<div class="container">
                <h2>Create New Client</h2>

<form method="POST" action="/client">

    <div class="form-group">
        <div class="col-lg-2 control-label">First Name:</div>
            <div class="col-lg-2"><input name="first_name" type="text" class="form-control"></input></div>
        <div class="col-lg-2 control-label">Last Name:</div>
            <div class="col-lg-2"><input name="last_name" type="text" class="form-control"></input></div>
        <div class="col-lg-2 control-label">User id: unassigned</div>
            <div class="col-lg-2"><input name="user_id" type="hidden" value="-1" class="form-control"></input></div>
    </div>

    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Create</button></div>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection
