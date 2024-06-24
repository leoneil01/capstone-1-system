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
                                <img src="{{ $product->product_image ? asset('storage/img/product/' . $product->product_image) : asset('images/image-gallery.png') }}" id="preview_image" alt="Product Image" width="200">
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
                                    <option selected>Select supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->supplier_id }}">{{ $supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="category_id">Category:</label>
                                <select class="col form-control" name="category_id" id="category_id" required>
                                    <option selected>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="brand_id">Brand:</label>
                                <select class="col form-control" name="brand_id" id="brand_id" required>
                                    <option selected>Select brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
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
                    <a class="btn-simple-cancel" href="/admin/products">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('product_image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>