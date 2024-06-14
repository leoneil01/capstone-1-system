<div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="createUserLabel">Add User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="">
                    @csrf
                    <div class="row mb-5">
                        <div class="col mb-3">
                            <div>
                                <img src="{{ asset('images/default_profile_image.jpg') }}" id="image"
                                    alt="User Image">
                            </div>
                            <div>
                                <label for="new-image">Upload Image:</label>
                                <input id="new-image" type="file">
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3">
                                <label class="col" for="fullname">Fullname:</label>
                                <input class="col" type="text" id="fullname">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="gender">Gender:</label>
                                <select class="col" name="gender" id="gender">
                                    <option value="1" selected>Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="role">Role:</label>
                                <select class="col" name="role" id="role">
                                    <option value="1" selected>Admin</option>
                                    <option value="2">Cashier</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="address">Address:</label>
                                <input class="col" type="text" id="address">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="birthdate">Birthdate:</label>
                                <input class="col" type="date" id="birthdate">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="email">Email</label>
                                <input  class="col"type="text" id="email">
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="username">Username</label>
                                <input class="col" type="text" id="username">
                            </div>
                        </div>
                    </div>
                    <button class="btn-simple">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
