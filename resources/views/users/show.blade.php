<div class="modal fade" id="showUser{{ $user->user_id }}" tabindex="-1" aria-labelledby="showUserLabel{{ $user->user_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="showUserLabel{{ $user->user_id }}">View User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <img src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : asset('images/image-gallery.png') }}" id="preview_image" alt="User Image" width="200">
                    </div>
                    <div class="col">
                        <div class="row mb-3">
                            <label class="col" for="fullname">Fullname:</label>
                            <input class="col form-control" type="text" id="fullname" value="{{ $user->first_name . ($user->middle_name ? ' ' . ucfirst($user->middle_name[0]) . '. ' : ' ') . $user->last_name }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="gender">Gender:</label>
                            <input class="col form-control" type="text" id="gender" value="{{ $user->gender }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="role">Role:</label>
                            <input class="col form-control" type="text" id="role" value="{{ $user->role }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="address">Address:</label>
                            <input class="col form-control" type="text" id="address" value="{{ $user->address }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="birthdate">Birthdate:</label>
                            <input class="col form-control" type="date" id="birth_date" value="{{ $user->birth_date }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="email">Email:</label>
                            <input class="col form-control" type="email" id="email_address" value="{{ $user->email_address }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="username">Username:</label>
                            <input class="col form-control" type="text" id="username" value="{{ $user->username }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
