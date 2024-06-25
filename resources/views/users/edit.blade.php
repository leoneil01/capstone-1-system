@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        {{-- @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="/admin/user/update/{{ $user->user_id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-5">
                <div class="col mb-3">
                    <div>
                        <img src="{{ $user->user_image ? asset('storage/img/user/' . $user->user_image) : asset('images/default_profile_image.jpg') }}" id="preview_image" alt="User Image" width="300">
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
                        <input class="col form-control" type="text" id="first_name" value="{{ old('first_name', $user->first_name) }}" name="first_name">
                        @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="middle_name">Middle Name:</label>
                        <input class="col form-control" type="text" id="middle_name" value="{{ old('middle_name', $user->middle_name) }}" name="middle_name">
                        @error('middle_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="last_name">Last Name:</label>
                        <input class="col form-control" type="text" id="last_name" value="{{ old('last_name', $user->last_name) }}" name="last_name">
                        @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="gender_id">Gender:</label>
                        <select class="col form-control" name="gender_id" id="gender_id">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->gender_id }}"
                                    {{ $gender->gender_id == $user->gender_id ? 'selected' : '' }}>{{ $gender->gender }}
                                </option>
                            @endforeach
                        </select>
                        @error('gender_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="role_id">Role:</label>
                        <select class="col form-control" name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}"
                                    {{ $role->role_id == $user->role_id ? 'selected' : '' }}>{{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                        @error('role_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="address">Address:</label>
                        <input class="col form-control" type="text" id="address" name="address" value="{{ old('address', $user->address) }}">
                        @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="birth_date">Birthdate:</label>
                        <input class="col form-control" type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
                        @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="email_address">Email:</label>
                        <input class="col form-control" type="email" id="email_address" name="email_address" value="{{ old('email_address', $user->email_address) }}">
                        @error('email_address') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="username">Username:</label>
                        <input class="col form-control" type="text" id="username" name="username" value="{{ old('username', $user->username) }}">
                        @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-simple">Save</button>
            <a class="btn-simple-cancel" href="/admin/users">Cancel</a>
        </form>
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
@endsection
