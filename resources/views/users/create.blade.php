<div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="createUserLabel">Add User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="/admin/user/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col mb-3">
                            <div>
                                <img src="{{asset('images/default_profile_image.jpg') }}" id="preview_image" alt="User Image" width="300">
                            </div>
                            <div>
                                <label for="user_image">Upload Image:</label>
                                <input id="user_image" type="file" name="user_image">
                                @error('user_image') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="row mb-3">
                                <label class="col" for="first_name">First Name:</label>
                                <input class="col form-control" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}">
                                @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="middle_name">Middle Name:</label>
                                <input class="col form-control" type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}">
                                @error('middle_name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="last_name">Last Name:</label>
                                <input class="col form-control" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
                                @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="gender">Gender:</label>
                                <select class="col form-control" name="gender_id" id="gender">
                                    <option selected>Select gender</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->gender_id }}" {{ old('gender_id') == $gender->gender_id ? 'selected' : '' }}>{{ $gender->gender }}</option>
                                    @endforeach
                                </select>
                                @error('gender_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="role">Role:</label>
                                <select class="col form-control" name="role_id" id="role">
                                    <option selected>Select role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                @error('role_id') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="address">Address:</label>
                                <input class="col form-control" type="text" id="address" name="address" value="{{ old('address') }}">
                                @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="birthdate">Birthdate:</label>
                                <input class="col form-control" type="date" id="birthdate" name="birth_date" value="{{ old('birth_date') }}">
                                @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="email">Email:</label>
                                <input class="col form-control" type="email" id="email" name="email_address" value="{{ old('email_address') }}">
                                @error('email_address') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="username">Username:</label>
                                <input class="col form-control" type="text" id="username" name="username" value="{{ old('username') }}">
                                @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="password">Password:</label>
                                <input class="col form-control" type="password" id="password" name="password">
                                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col" for="password_confirmation">Confirm Password:</label>
                                <input class="col form-control" type="password" id="password_confirmation" name="password_confirmation">
                                @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-simple">Save</button>
                    <a class="btn-simple-cancel" href="/admin/users">Cancel</a>
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
