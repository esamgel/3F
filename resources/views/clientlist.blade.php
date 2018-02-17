@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                        <h2>Clients List</h2>
                        <a href="/client" class="btn btn-primary">Add new Client</a>
                        <table class="table">
                            <thead><tr>
                                <th colspan="1">Id#</th>
                                <th colspan="1">first Name</th>
                                <th colspan="1">Last Name</th>
                                <th colspan="1">user_id</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($client as $client)
                            <tr>
                              <td>
                                  {{$client->id}}
                              </td>
                                <td>
                                    {{$client->first_name}}
                                </td>
                                <td>
                                    {{$client->last_name}}
                                </td>
                                <td>
                                    {{$client->user_id}}
                                </td>
                                <td>
                                    <a href="/accountlist/{{$client->id}}" class="btn btn-primary btn-sm">View Accounts</a>
                                </td>
                                <td>
                                    <a href="/balancelist/{{$client->id}}" class="btn btn-primary btn-sm"> Veiw Balance</a>
                                </td>
                                <td>
                                    <form action="/client/{{$client->id}}">
                                        <button type="submit" name="edit" class="btn btn-secondary btn-sm">Edit</button>
                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger btn-sm">Delete</button>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>


                        @endforeach</tbody>
                        </table>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif

</div>
@endsection
