<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductLabel">View Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div><img src="{{ asset('images/sample_image.jpg') }}" id="image" alt="Product Image"></div>
                    <div><label for="new-image">Upload Image:</label><input id="new-image" type="file"></div>
                    <div><label for="product-name">Product Name:</label><input type="text" id="product-name"
                            value="Milo"></div>
                    <div><label for="supplier">Supplier:</label><input type="text" id="supplier" value="Nestle">
                    </div>
                    <div><label for="category">Category:</label><input type="text" id="category"
                            value="Powedered Milk">
                    </div>
                    <div><label for="brand">Brand:</label><input type="text" id="brand" value="Nestle"></div>
                    <div><label for="barcode">Barcode:</label><input type="text" id="barcode" value="12121212121">
                    </div>
                    <div><label for="price">Price:</label><input type="text" id="price" value="12.00"></div>
                    <div><label for="stock">Stock:</label><input type="text" id="stock" value="500"></div>
                    <button class="btn-simple">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
