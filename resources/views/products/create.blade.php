<div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="/admin/product/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col mb-3">
                            <div>
                                <img src="{{ asset('images/sample_image.jpg') }}" id="image" alt="Product Image">
                            </div>
                            <div>
                                <label for="product_image">Upload Image:</label>
                                <input id="product_image" type="file" name="product_image" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3">
                                <label class="col" for="product_name">Product Name:</label>
                                <input class="col form-control" type="text" id="product_name" name="product_name" required>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="supplier_id">Supplier:</label>
                                <select class="col form-control" name="supplier_id" id="supplier_id" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->supplier_id }}">{{ $product->supplier_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="category_id">Category:</label>
                                <select class="col form-control" name="category_id" id="category_id" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->category_id }}">{{ $product->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="brand_id">Brand:</label>
                                <select class="col form-control" name="brand_id" id="brand_id" required>
                                    @foreach($products as $product)
                                        <option value="{{ $product->brand_id }}">{{ $product->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="barcode">Barcode:</label>
                                <input class="col form-control" type="text" id="barcode" name="barcode" required>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="unit_price">Price:</label>
                                <input class="col form-control" type="text" id="unit_price" name="unit_price" required>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="unit_in_stock">Stock:</label>
                                <input class="col form-control" type="text" id="unit_in_stock" name="unit_in_stock" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-simple">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>