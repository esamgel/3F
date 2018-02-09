@extends('layouts.app')

{{-- //this will add laravel’s default navbar to your page --}}

@section('content')

<div class="container">
                @if (Auth::check())
                        <h2>Transactions record</h2>
                        <a href="/transaction" class="btn btn-primary">Add new Transaction</a>
                        <table class="table">
                            <thead><tr>
                                <th colspan="1">Descriptions</th>
                                <th colspan="1">Type</th>
                                <th colspan="1">Amount</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($user->transactions as $transaction)
                            <tr>

                                    <td>{{$transaction->description}}</td>
                                    <td>{{$transaction->type}}</td>
                                    <td>{{$transaction->amount}}</td>

                                <td>

                                    <form action="/transaction/{{$transaction->id}}">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
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
