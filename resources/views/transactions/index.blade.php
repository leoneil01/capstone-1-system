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
                <button class="action" data-bs-toggle="modal" data-bs-target="#createSupplier">
                    Add Supplier
                    <x-fas-plus class="fas-icon" />
                </button>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Coca-Cola Beverages</td>
                    <td>Taguig, Manila</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#showSupplier">View</button>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editSupplier">Edit</button>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#deleteSupplier">Delete</button>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@extends('supplier.create')
@extends('supplier.show')
@extends('supplier.edit')
@extends('supplier.delete')
@endsection
