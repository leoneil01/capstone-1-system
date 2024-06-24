@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <div class="card-header">
            <form action="/admin/products" method="get">
                <input type="text" class="input-search" placeholder="Search..." name="search">
                <button type="submit" class="btn-search"><x-fas-search class="fas-icon" /></button>
            </form>
            <button class="action" data-bs-toggle="modal" data-bs-target="#createProduct">
                Add Product
                <x-fas-plus class="fas-icon" />
            </button>
        </div>
        {{-- @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->unit_price }}</td>
                        <td>{{ $product->unit_in_stock }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#showProduct{{ $product->product_id }}">View</button>
                                <a href="/admin/product/edit/{{ $product->product_id }}"
                                    class="btn btn-outline-primary">Edit</a>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#deleteProduct{{ $product->product_id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @include('products.show', ['product' => $product])
                    @include('products.delete', ['product' => $product])
                @endforeach
            </tbody>
        </table>
        <div class="paginator">
            {{ $products->links() }}
        </div>
    </div>
    @extends('products.create')
@endsection
