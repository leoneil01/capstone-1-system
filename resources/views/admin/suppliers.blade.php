@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Id</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Category</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Milo</td>
                    <td>Nestle</td>
                    <td>Powdered Drink</td>
                    <td>Nestle</td>
                    <td>50122115</td>
                    <td>12.00</td>
                    <td>100</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-outline-primary">View</a>
                            <a href="#" class="btn btn-outline-primary">Edit</a>
                            <a href="#" class="btn btn-outline-primary">Delete</a>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
