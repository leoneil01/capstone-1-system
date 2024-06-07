<div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createUserLabel">View User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div>
                        <img src="{{ asset('images/default_profile_image.jpg') }}" id="image" alt="User Image">
                    </div>
                    <div>
                        <label for="new-image">Upload Image:</label>
                        <input id="new-image" type="file">
                    </div>
                    <div>
                        <label for="fullname">Fullname:</label>
                        <input type="text" id="fullname">
                    </div>
                    <div>
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender">
                            <option value="1" selected>Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div>
                        <label for="role">Role:</label>
                        <select name="role" id="role">
                            <option value="1" selected>Admin</option>
                            <option value="2">Cashier</option>
                        </select>
                    </div>
                    <div>
                        <label for="address">Address:</label>
                        <input type="text" id="address">
                    </div>
                    <div>
                        <label for="birthdate">Birthdate:</label>
                        <input type="date" id="birthdate">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="text" id="email"></div>
                    <div>
                        <label for="username">Username</label>
                        <input type="text" id="username">
                    </div>
                    <button class="btn-simple">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
