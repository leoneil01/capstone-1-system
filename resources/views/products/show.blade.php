<div class="modal fade" id="showProduct{{ $product->product_id }}" tabindex="-1" aria-labelledby="showProductLabel{{ $product->product_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductLabel{{ $product->product_id }}">View Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col">
                    <div class="row d-flex justify-content-center align-items-center">
                        <img src="{{ $product->product_image ? asset('storage/img/product/' . $product->product_image) : asset('images/image-gallery.png') }}" id="preview_image" alt="Product Image" width="200">
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <label class="col" for="product-name{{ $product->product_id }}">Product Name:</label>
                        <input class="col" type="text" id="product-name{{ $product->product_id }}" value="{{ $product->product_name }}" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="supplier{{ $product->product_id }}">Supplier:</label>
                        <input class="col" type="text" id="supplier{{ $product->product_id }}" value="{{ $product->supplier_name }}" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="category{{ $product->product_id }}">Category:</label>
                        <input class="col" type="text" id="category{{ $product->product_id }}" value="{{ $product->category_name }}" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="brand{{ $product->product_id }}">Brand:</label>
                        <input class="col" type="text" id="brand{{ $product->product_id }}" value="{{ $product->brand_name }}" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="barcode{{ $product->product_id }}">Barcode:</label>
                        <input class="col" type="text" id="barcode{{ $product->product_id }}" value="{{ $product->barcode }}" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="price{{ $product->product_id }}">Price:</label>
                        <input class="col" type="text" id="price{{ $product->product_id }}" value="{{ $product->unit_price }}" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="stock{{ $product->product_id }}">Stock:</label>
                        <input class="col" type="text" id="stock{{ $product->product_id }}" value="{{ $product->unit_in_stock }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>