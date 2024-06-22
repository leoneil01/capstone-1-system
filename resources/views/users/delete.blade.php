<div class="modal fade" id="deleteUser{{ $user->user_id }}" tabindex="-1"
    aria-labelledby="deleteUserLabel{{ $user->user_id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserLabel{{ $user->user_id }}">Delete User</h5>
            </div>
            <form action="/admin/user/destroy/{{ $user->user_id }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this user?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-simple">Yes</button>
                    <button class="btn-simple-cancel" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>
