<div class="modal fade" id="showTransaction{{$transaction->transaction_id}}" tabindex="-1" aria-labelledby="showTransactionLabel{{$transaction->transaction_id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showTransactionLabel{{$transaction->transaction_id}}">View Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="col mb-5">
                        <div class="row mb-3">
                            <label class="col" for="transaction_id">Transaction ID:</label>
                            <input class="col" type="text" id="transaction_id" name="transaction_id" value="{{$transaction->transaction_id}}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="payment">Payment:</label>
                            <input class="col" type="text" id="payment" name="payment" value="{{$transaction->payment}}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="total">Total:</label>
                            <input class="col" type="text" id="total" name="total" value="{{$transaction->total}}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="cash">Cash:</label>
                            <input class="col" type="text" id="cash" name="cash" value="{{$transaction->cash}}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="change">Change</label>
                            <input class="col" type="text" id="change" name="change" value="{{$transaction->change}}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="date">Date:</label>
                            <input class="col" type="text" id="date" name="date" value="{{$transaction->created_at}}" disabled>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
