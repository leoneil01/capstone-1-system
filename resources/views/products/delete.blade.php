<div class="modal fade" id="deleteProduct{{ $product->product_id }}" tabindex="-1" aria-labelledby="deleteProductLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductLabel">Delete Product</h5>
            </div>
            <form action="/admin/product/destroy/{{ $product->product_id }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this product?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-simple">Yes</button>
                    <button type="button" class="btn-simple-cancel" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
