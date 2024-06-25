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
                            <label class="col" for="fullname{{ $user->user_id }}">Fullname:</label>
                            <input class="col form-control" type="text" id="fullname{{ $user->user_id }}" value="{{ $user->first_name . ($user->middle_name ? ' ' . ucfirst($user->middle_name[0]) . '. ' : ' ') . $user->last_name }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="gender{{ $user->user_id }}">Gender:</label>
                            <input class="col form-control" type="text" id="gender{{ $user->user_id }}" value="{{ $user->gender }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="role{{ $user->user_id }}">Role:</label>
                            <input class="col form-control" type="text" id="role{{ $user->user_id }}" value="{{ $user->role }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="address{{ $user->user_id }}">Address:</label>
                            <input class="col form-control" type="text" id="address{{ $user->user_id }}" value="{{ $user->address }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="birthdate{{ $user->user_id }}">Birthdate:</label>
                            <input class="col form-control" type="date" id="birthdate{{ $user->user_id }}" value="{{ $user->birth_date }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="email{{ $user->user_id }}">Email:</label>
                            <input class="col form-control" type="email" id="email{{ $user->user_id }}" value="{{ $user->email_address }}" disabled>
                        </div>
                        <div class="row mb-3">
                            <label class="col" for="username{{ $user->user_id }}">Username:</label>
                            <input class="col form-control" type="text" id="username{{ $user->user_id }}" value="{{ $user->username }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
