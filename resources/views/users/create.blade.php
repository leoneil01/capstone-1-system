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
                                <img src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : asset('images/default_profile_image.jpg') }}" id="preview_image" alt="User Image" width="300">
                            </div>
                            <div>
                                <label for="user_image">Upload Image:</label>
                                <input id="user_image" type="file">
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
                                    <option selected>Select gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{$gender->gender_id}}">{{$gender->gender}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="role">Role:</label>
                                <select class="col" name="role" id="role">
                                    <option selected>Select role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->role_id}}">{{$role->role}}</option>
                                    @endforeach
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

<script>
    document.getElementById('user_image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview_image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>