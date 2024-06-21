<div class="modal fade" id="deleteTransaction{{$transaction->transaction_id}}" tabindex="-1" aria-labelledby="deleteTransactionLabel{{$transaction->transaction_id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTransactionLabel{{$transaction->transaction_id}}">Delete Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/admin/transaction/destroy/{{$transaction->transaction_id}}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this transaction?
                </div>
                <div class="modal-footer">
                    <button class="btn-simple">Yes</button>
                    <button class="btn-simple">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
