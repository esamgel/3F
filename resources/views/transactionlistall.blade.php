@extends('layouts.3fcustom')

{{-- //this will add laravel’s default navbar to your page --}}

@section('content')

                @if (Auth::check())
                        <h2>All Transactions history</h2>
                        {{-- <div > Account#:  {{$account->id}} </div> --}}
                        {{-- <a href="/addtrans/{{$account->id}}" class="btn btn-primary btn-sm">Add new Transaction</a> --}}
                        <div class="table-responsive">
                          <table class="table table-striped table-sm">
                            <thead><tr>
                                <th colspan="1">Date</th>
                                <th colspan="1">Descriptions</th>
                                <th colspan="1">Type</th>
                                <th colspan="1">Amount</th>
                                <th colspan="1"></th>
                                <th colspan="1"></th>
                            </tr>
                        </thead>
                        <tbody>@foreach($transactions as $transaction)
                            <tr>
                                  <td>{{$transaction->date}}</td>
                                  <td>{{$transaction->description}}</td>
                                  <td>{{$transaction->type}}</td>
                                  <td>{{$transaction->amount}}</td>

                                <td>
                                    <form action="/uptransaction/{{$transaction->id}}">
                                        <button type="submit" name="edit" class="btn btn-secondary btn-sm" >Edit</button>
                                        <button type="submit" name="delete" formmethod="POST" class="btn btn-danger btn-sm">
                                        X</button>
                                        {{ csrf_field() }}
                                    </form>
                                </td>
                            </tr>


                        @endforeach</tbody>
                        </table>
                      </div>
                @else
                    <h3>You need to log in. <a href="/login">Click here to login</a></h3>
                @endif



@endsection
