@extends('layouts.app')

@section('content')
<div class="container">
                <h2>Create New Account</h2>

<form method="POST" action="/account">

    <div class="form-group">
        <div class="col-lg-2 control-label">Name:</div>
            <div class="col-lg-2"><input name="name" class="form-control"></input></div>
        <div class="col-lg-1 control-label">Type: </div>
            <div class="col-lg-2">
              <select name="type" type="text" class="form-control">
                  <option value="saving">saving</option>
                  <option value="loan">loan</option>
              </select></div>
        <div class="col-lg-2 control-label">Description:</div>
            <div class="col-lg-10"><textarea name="description" class="form-control"></textarea></div>
    </div>


    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2"><button type="submit" class="btn btn-primary">Create Account</button></div>
    </div>
{{ csrf_field() }}
</form>


</div>
@endsection
