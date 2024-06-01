@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <div class="actions">
            <form action="" method="post">
                <input type="text" class="input-search" placeholder="Search..."><button class="btn-search"><x-fas-search
                        class="fas-icon" /></button>
            </form>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Category</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Barcode</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
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
<!--Floating Action Button-->
<button class="btn fab">Add Product<x-fas-plus class="fas-icon"/></button>
@endsection
