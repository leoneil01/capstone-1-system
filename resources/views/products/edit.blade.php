@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        <form action="">
            <div class="row mb-5">
                <div class="col mb-3">
                    <div>
                        <img class="img-display" src="{{ asset('images/sample_image.jpg') }}" id="image"
                            alt="Product Image">
                    </div>
                    <div>
                        <label for="new-image">Upload Image:</label>
                        <input id="new-image" type="file">
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="row mb-3">
                        <label class="col" for="product-name">Product Name:</label>
                        <input class="col" type="text" id="product-name" value="Milo">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="supplier">Supplier:</label>
                        <select class="col" name="supplier" id="supplier">
                            <option value="1" selected>S1</option>
                            <option value="2">S2</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="category">Category:</label>
                        <select class="col" name="category" id="category">
                            <option value="1" selected>c1</option>
                            <option value="2">c2</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="brand">Brand:</label>
                        <input class="col" type="text" id="brand" value="Nestle">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="barcode">Barcode:</label>
                        <input class="col" type="text" id="barcode" value="12121212121">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="price">Price:</label>
                        <input class="col" type="text" id="price" value="12.00">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="stock">Stock:</label>
                        <input class="col" type="text" id="stock" value="500">
                    </div>
                </div>
            </div>
            <button class="btn-simple">Save</button>
            <a href="/admin/products" class="btn-simple-cancel">Cancel</a>
        </form>
    </div>
@endsection
