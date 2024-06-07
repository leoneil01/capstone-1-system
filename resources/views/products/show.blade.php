<div class="modal fade" id="showProduct" tabindex="-1" aria-labelledby="showProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductLabel">View Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div><img src="{{asset("images/sample_image.jpg")}}" id="image" alt="Product Image"></div>
                <div><label for="product-name">Product Name:</label><input type="text" id="product-name" value="Milo" disabled></div>
                <div><label for="supplier">Supplier:</label><input type="text" id="supplier" value="Nestle" disabled></div>
                <div><label for="category">Category:</label><input type="text" id="category" value="Powedered Milk" disabled></div>
                <div><label for="brand">Brand:</label><input type="text" id="brand" value="Nestle" disabled></div>
                <div><label for="barcode">Barcode:</label><input type="text" id="barcode" value="12121212121" disabled></div>
                <div><label for="price">Price:</label><input type="text" id="price" value="12.00" disabled></div>
                <div><label for="stock">Stock:</label><input type="text" id="stock" value="500" disabled></div>
            </div>
        </div>
    </div>
</div>
