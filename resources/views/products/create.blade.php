<div class="modal fade" id="createProduct" tabindex="-1" aria-labelledby="createProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductLabel">Create Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="">
                    <div class="row mb-5">
                        <div class="col mb-3">
                            <div>
                                <img src="{{ asset('images/sample_image.jpg') }}" id="image"
                                    alt="User Image">
                            </div>
                            <div>
                                <label for="new-image">Upload Image:</label>
                                <input id="new-image" type="file">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3">
                                <label class="col" for="product-name">Product Name:</label>
                                <input class="col" type="text" id="product-name">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="supplier">Supplier:</label>
                                <select class="col" name="supplier" id="supplier">
                                    <option value="1">S1</option>
                                    <option value="2">S2</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="category">Category:</label>
                                <select class="col" name="category" id="category">
                                    <option value="1">c1</option>
                                    <option value="2">c2</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="brand">Brand:</label>
                                <input class="col" type="text" id="brand">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="barcode">Barcode:</label>
                                <input class="col" type="text" id="barcode">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="price">Price:</label>
                                <input class="col" type="text" id="price">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="stock">Stock:</label>
                                <input class="col" type="text" id="stock">
                            </div>
                        </div>
                    </div>
                    <button class="btn-simple">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
