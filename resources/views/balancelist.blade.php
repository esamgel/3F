@extends('layouts.3fcustom')

@section('content')
<div class="container">
                @if (Auth::check())
                        <h2>Balances List</h2>
                        {{-- <a href="/task" class="btn btn-primary">Add new Task</a> --}}
                        <table class="table">
                            <thead><tr>
                                <th colspan="1">id</th>
                                <th colspan="1">Saving balance</th>
                                <th colspan="1">Loan balance</th>
                                <th colspan="1">repayment balance</th>
                                <th colspan="1">debit balance</th>
                                <th colspan="1">credit balance</th>
                                <th colspan="1">account_id</th>
                                <th colspan="1">client_id</th>
                            </tr>
                        </thead>
                        <tbody>@foreach($account->balances as $balance)
                            <tr>
                                <td>{{$balance->id}}</td>
                                <td>{{$balance->saving_bal}}</td>
                                <td>{{$balance->loan_bal}}</td>
                                <td>{{$balance->repaid_bal}}</td>
                                <td>{{$balance->debit_bal}}</td>
                                <td>{{$balance->credit_bal}}</td>
                                <td>{{$balance->account_id}}</td>
                                <td>{{$balance->client_id}}</td>
                                <td>

                             {{--  <form action="/task/{{$task->id}}">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger">Delete</button>
                                        {{ csrf_field() }}
                                    </form>  --}}
                                </td>
                            </tr>


                        @endforeach</tbody>
                        </table>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif

</div>
@endsection
