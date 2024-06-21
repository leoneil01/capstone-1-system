<div class="modal fade" id="showSupplier{{ $supplier->supplier_id }}" tabindex="-1" aria-labelledby="showSupplierLabel{{ $supplier->supplier_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showSupplierLabel{{ $supplier->supplier_id }}">View Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="">
                    <div class="col mb-5">
                    <div class="row mb-3">
                        <label class="col" for="supplier_name">Supplier:</label>
                        <input class="col" type="text" id="supplier_name" name="supplier_name" value="{{ $supplier->supplier_name }}" disabled>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="contact_name">Contact Name:</label>
                        <input class="col" type="text" id="contact_name" name="contact_name" value="{{ $supplier->contact_name }}" disabled>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="address">Address:</label>
                        <input class="col" type="text" id="address" name="address" value="{{ $supplier->address }}" disabled>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="postal_code">Postal Code:</label>
                        <input class="col" type="text" id="postal_code" name="postal_code" value="{{ $supplier->postal_code }}" disabled></div>
                    <div class="row mb-3">
                        <label class="col" for="country">Country:</label>
                        <input class="col" type="text" id="country" name="country" value="{{ $supplier->country }}" disabled>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="contact_number">Contact Number:</label>
                        <input class="col" type="text" id="contact_number" name="contact_number" value="{{ $supplier->contact_number }}" disabled>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
