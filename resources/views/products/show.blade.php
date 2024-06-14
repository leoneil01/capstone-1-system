<div class="modal fade" id="showProduct" tabindex="-1" aria-labelledby="showProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showProductLabel">View Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="col">
                    <div class="row d-flex justify-content-center align-items-center"><img
                            src="{{ asset('images/sample_image.jpg') }}" id="image" alt="Product Image"></div>
                </div>
                <div class="col">
                    <div class="row">
                        <label class="col" for="product-name">Product Name:</label>
                        <input class="col" type="text" id="product-name" value="Milo" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="supplier">Supplier:</label>
                        <input class="col" type="text" id="supplier" value="Nestle" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="category">Category:</label>
                        <input class="col" type="text" id="category" value="Powedered Milk" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="brand">Brand:</label>
                        <input class="col" type="text" id="brand" value="Nestle" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="barcode">Barcode:</label>
                        <input class="col" type="text" id="barcode" value="12121212121" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="price">Price:</label>
                        <input class="col" type="text" id="price" value="12.00" disabled>
                    </div>
                    <div class="row">
                        <label class="col" for="stock">Stock:</label>
                        <input class="col" type="text" id="stock" value="500" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
