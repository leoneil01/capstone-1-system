<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                <form action="{{ route('cashier.profile.update', Auth::id()) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mb-5">
                        <div class="col-md-4 mb-3">
                            <div>
                                <img class="img-display" src="{{ Auth::user()->user_image ? asset('storage/img/user/' . Auth::user()->user_image) : asset('images/default_profile_image.jpg') }}" id="preview_image" alt="User Image">
                            </div>
                            <div class="mt-3">
                                <label for="user_image">Upload Image:</label>
                                <input id="user_image" type="file" name="user_image">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="first_name">First Name:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="first_name" value="{{ Auth::user()->first_name }}" name="first_name">
                                    @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="middle_name">Middle Name:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="middle_name" value="{{ Auth::user()->middle_name }}" name="middle_name">
                                    @error('middle_name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="last_name">Last Name:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="last_name" value="{{ Auth::user()->last_name }}" name="last_name">
                                    @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="gender_id">Gender:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gender_id" id="gender_id">
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->gender_id }}" {{ Auth::user()->gender_id == $gender->gender_id ? 'selected' : '' }}>
                                                {{ $gender->gender }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gender_id') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="address">Address:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="address" name="address" value="{{ Auth::user()->address }}">
                                    @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="birth_date">Birthdate:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="date" id="birth_date" name="birth_date" value="{{ Auth::user()->birth_date }}">
                                    @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="email_address">Email:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="email_address" name="email_address" value="{{ Auth::user()->email_address }}">
                                    @error('email_address') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label" for="username">Username:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="username" name="username" value="{{ Auth::user()->username }}">
                                    @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-simple">Save</button>
                    <button type="button" class="btn-simple-cancel" data-bs-dismiss="modal">Cancel</button>
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
