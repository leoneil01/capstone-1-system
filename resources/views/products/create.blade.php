<div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div>
                        <label for="new-image">Upload Image:</label>
                        <input id="new-image" type="file">
                    </div>
                    <div>
                        <label for="product-name">Product Name:</label>
                        <input type="text" id="product-name">
                    </div>
                    <div>
                        <label for="supplier">Supplier:</label>
                        <select name="supplier" id="supplier">
                            <option value="1">S1</option>
                            <option value="2">S2</option>
                        </select>
                    </div>
                    <div>
                        <label for="category">Category:</label>
                        <select name="category" id="category">
                            <option value="1">c1</option>
                            <option value="2">c2</option>
                        </select>
                    </div>
                    <div>
                        <label for="brand">Brand:</label>
                        <input type="text" id="brand">
                    </div>
                    <div>
                        <label for="barcode">Barcode:</label>
                        <input type="text" id="barcode">
                    </div>
                    <div>
                        <label for="price">Price:</label>
                        <input type="text" id="price">
                    </div>
                    <div>
                        <label for="stock">Stock:</label>
                        <input type="text" id="stock">
                    </div>
                    <button class="btn-simple">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
