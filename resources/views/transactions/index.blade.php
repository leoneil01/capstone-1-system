@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Transaction Id</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Total</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->payment }}</td>
                        <td>{{ $transaction->total }}</td>
                        <td>{{ $transaction->discount_name ?? 'None' }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#showTransaction{{ $transaction->transaction_id }}">View</button>
                                <a href="/admin/transaction/edit/{{ $transaction->transaction_id }}"
                                    class="btn btn-outline-primary">Edit</a>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#deleteTransaction{{ $transaction->transaction_id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @include('transactions.show')
                    @include('transactions.delete')
                @endforeach
            </tbody>
        </table>
    </div>
        {{-- @extends('transactions.show')
        @extends('transactions.delete') --}}
@endsection
