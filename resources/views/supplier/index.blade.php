@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <div class="card-header">
                {{-- <form action="" method="post">
                    <input type="text" class="input-search" placeholder="Search suppliers...">
                    <button class="btn-search"><x-fas-search class="fas-icon" /></button>
                </form> --}}
                <button class="action" data-bs-toggle="modal" data-bs-target="#createSupplier">
                    Add Supplier
                    <x-fas-plus class="fas-icon" />
                </button>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->supplier_name }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#showSupplier{{ $supplier->supplier_id }}">View</button>
                                <a href="/admin/supplier/edit/{{ $supplier->supplier_id }}" class="btn btn-outline-primary">Edit</a>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#deleteSupplier">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @include('supplier.show')
                    @include('supplier.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @extends('supplier.create')
@endsection
