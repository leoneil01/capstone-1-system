<div class="modal fade" id="showUser" tabindex="-1" aria-labelledby="showUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="showUserLabel">View User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="">
                    <div class="row">
                        <div class="col d-flex justify-content-center align-items-center">
                            <img class=".img-fluid" src="{{ asset('images/default_profile_image.jpg') }}" id="image" alt="User Image">
                        </div>
                        <div class="col">
                            <div class="row">
                                <label class="col" for="fullname">Fullname:</label>
                                <input class="col" type="text" id="fullname" value="Juan Dela Cruz" disabled>
                            </div>
                            <div class="row">
                                <label class="col" for="gender">Gender:</label>
                                <input class="col" name="gender" id="gender" value="Male" disabled>
                            </div>
                            <div class="row">
                                <label class="col" for="role">Role:</label>
                                <input class="col" name="role" id="role" value="Admin" disabled>
                            </div>
                            <div class="row">
                                <label class="col" for="address">Address:</label>
                                <input class="col" type="text" id="address" value="Roxas City" disabled>
                            </div>
                            <div class="row">
                                <label class="col" for="birthdate">Birthdate:</label>
                                <input class="col" type="date" id="birthdate" disabled>
                            </div>
                            <div class="row">
                                <label class="col" for="email">Email</label>
                                <input class="col" type="text" id="email" value="juan@gmail.com" disabled>
                            </div>
                            <div class="row">
                                <label class="col" for="username">Username</label>
                                <input class="col" type="text" id="username" value="juan" disabled>
                            </div class="row">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
