<div class="modal fade" id="createSupplier" tabindex="-1" aria-labelledby="createSupplierLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSupplierLabel">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="/admin/supplier/store" method="post">
                    @csrf
                    <div class="col mb-5">
                        <div class="row mb-3">
                            <label class="col" for="supplier_name">Supplier:</label>
                            <input class="col" type="text" id="supplier_name" name="supplier_name" required>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="contact_name">Contact Name:</label>
                            <input class="col" type="text" id="contact_name" name="contact_name" required>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="address">Address:</label>
                            <input class="col" type="text" id="address" name="address" required>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="postal_code">Postal Code:</label>
                            <input class="col" type="text" id="postal_code" name="postal_code" required>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="country">Country:</label>
                            <input class="col" type="text" id="country" name="country" required>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="contact_number">Contact Number:</label>
                            <input class="col" type="text" id="contact_number" name="contact_number" required>
                        </div>
                    </div>
                    <button type="submit" class="btn-simple">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
