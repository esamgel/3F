@extends('layouts.3fcustom')

@section('content')
	<div class="container">
	<h1>Edit the Account </h1>

<form method="POST" action="/account/{{ $account->id }}">

  <div class="form-group">
      <div class="col-lg-2 control-label">Name:</div>
          <div class="col-lg-2"><input name="name" class="form-control" value="{{$account->name}}"></input></div>
      <div class="col-lg-1 control-label">Type: </div>
          <div class="col-lg-2">
            <select name="type" type="text" class="form-control" value="{{$account->type}}">
                <option value="saving">saving</option>
                <option value="loan">loan</option>
            </select></div>
      <div class="col-lg-2 control-label">Description:</div>
          <div class="col-lg-10"><textarea name="description" class="form-control" value="{{$account->description}}">{{$account->description}}</textarea></div>

					{{-- hidden value of account id--}}.
					<input name="client_id" type="hidden" value="{{$account->client_id}}">

	<div class="form-group">
		<div class="col-lg-10 col-lg-offset-2"><button type="submit" name="update" class="btn btn-primary">Update </button></div>
	</div>
{{ csrf_field() }}
</form>



</div>

@stop
