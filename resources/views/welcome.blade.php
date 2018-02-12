@extends('layouts.app')

@section('content')
<div class="container">
                @if (Auth::check())
                        <h2>Account List</h2>
                        <a href="/account" class="btn btn-primary">Add new Account</a>
                        <table class="table">
                            <thead><tr>
                                <th colspan="1">Acc#</th>
                                <th colspan="1">Account Name</th>
                                <th colspan="1">Type</th>
                                <th colspan="2">Description</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($user->accounts as $account)
                            <tr>
                              <td>
                                  {{$account->id}}
                              </td>
                                <td>
                                    {{$account->name}}
                                </td>
                                <td>
                                    {{$account->type}}
                                </td>
                                <td>
                                    {{$account->description}}
                                </td>
                                <td>
                                    <a href="/transactionlist/{{$account->id}}" class="btn btn-primary btn-sm">View Transactions</a>
                                </td>
                                <td>
                                    <a href="/balancelist/{{$account->id}}" class="btn btn-primary btn-sm"> Veiw Balance</a>
                                </td>
                                <td>
                                    <form action="/account/{{$account->id}}">
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
