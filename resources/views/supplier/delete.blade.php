<div class="modal fade" id="deleteSupplier{{$supplier->supplier_id}}" tabindex="-1" aria-labelledby="deleteSupplierLabel{{$supplier->supplier_id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteSupplierLabel{{$supplier->supplier_id}}">Delete Supplier</h5>
            </div>
            <form action="/admin/supplier/destroy/{{$supplier->supplier_id}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this supplier?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-simple">Yes</button>
                    <button class="btn-simple-cancel" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
