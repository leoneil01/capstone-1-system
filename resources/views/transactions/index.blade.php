@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <div class="card-header">
                <form action="" method="post">
                    <input type="text" class="input-search" placeholder="Search Transaction...">
                    <button class="btn-search"><x-fas-search class="fas-icon" /></button>
                </form>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Transaction Id</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Total</th>
                    <th scope="col">Cash</th>
                    <th scope="col">Change</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->transaction_id}}</td>
                        <td>{{$transaction->payment}}</td>
                        <td>{{$transaction->total}}</td>
                        <td>{{$transaction->cash}}</td>
                        <td>{{$transaction->change}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#showTransaction">View</button>
                                <a href="/admin/transaction/edit" class="btn btn-outline-primary">Edit</a>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#deleteTransaction">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @extends('transactions.show')
    @extends('transactions.delete')
@endsection
