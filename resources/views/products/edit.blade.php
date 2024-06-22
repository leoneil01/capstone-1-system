@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        <form action="/admin/product/update/{{ $product->product_id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-5">
                <div class="col">
                    <div class="row d-flex justify-content-center align-items-center">
                        <img src="{{ asset('images/sample_image.jpg') }}" alt="Product Image" width="200">
                    </div>
                </div>
                <div class="col">
                    <div class="row mb-3">
                        <label class="col" for="product-name">Product Name:</label>
                        <input class="col form-control" type="text" id="product-name" value="{{ $product->product_name }}"
                            name="product_name">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="supplier_id">Supplier:</label>
                        <select class="col form-control" name="supplier_id" id="supplier_id" required>
                            <option selected>Select supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->supplier_id }}"
                                    {{ $supplier->supplier_id == $product->supplier_id ? 'selected' : '' }}>{{ $supplier->supplier_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="category_id">Category:</label>
                        <select class="col form-control" name="category_id" id="category_id" required>
                            <option selected>Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}"
                                    {{ $category->category_id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="brand_id">Brand:</label>
                        <select class="col form-control" name="brand_id" id="brand_id" required>
                            <option selected>Select brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->brand_id }}"
                                    {{ $brand->brand_id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="barcode">Barcode:</label>
                        <input class="col form-control" type="text" id="barcode" value="{{ $product->barcode }}" name="barcode">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="price">Price:</label>
                        <input class="col form-control" type="text" id="price" value="{{ $product->unit_price }}"
                            name="unit_price">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="stock">Stock:</label>
                        <input class="col form-control" type="text" id="stock" value="{{ $product->unit_in_stock }}"
                            name="unit_in_stock">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-simple">Save</button>
        </form>
    </div>
@endsection
