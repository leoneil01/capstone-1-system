@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <div class="card-header">
                <form action="" method="post">
                    <input type="text" class="input-search" placeholder="Search suppliers...">
                    <button class="btn-search"><x-fas-search class="fas-icon" /></button>
                </form>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Transaction Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123456789</td>
                    <td>Janury 1, 2024</td>
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
            </tbody>
        </table>
    </div>
@extends('transactions.show')
@extends('transactions.delete')
@endsection
