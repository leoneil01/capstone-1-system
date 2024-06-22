@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/admin/user/update/{{ $user->user_id }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-5">
                <div class="col mb-3">
                    <div>
                        <img class="img-display" src="{{ asset('images/default_profile_image.jpg') }}" id="image"
                            alt="User Image">
                    </div>
                    <div>
                        <label for="new-image">Upload Image:</label>
                        <input id="new-image" type="file">
                    </div>
                </div>
                <div class="col">
                    <div class="row mb-3">
                        <label class="col" for="first_name">First Name:</label>
                        <input class="col" type="text" id="first_name" value="{{ $user->first_name }}"
                            name="first_name">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="middle_name">Middle Name:</label>
                        <input class="col" type="text" id="middle_name" value="{{ $user->middle_name }}"
                            name="middle_name">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="last_name">Last Name:</label>
                        <input class="col" type="text" id="last_name" value="{{ $user->last_name }}" name="last_name">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="gender_id">Gender:</label>
                        <select class="col" name="gender_id" id="gender_id">
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->gender_id }}"
                                    {{ $user->gender_id == $gender->gender_id ? 'selected' : '' }}>{{ $gender->gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="role_id">Role:</label>
                        <select class="col" name="role_id" id="role_id">
                            @foreach ($roles as $role)
                                <option value="{{ $role->role_id }}"
                                    {{ $user->role_id == $role->role_id ? 'selected' : '' }}>{{ $role->role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="address">Address:</label>
                        <input class="col" type="text" id="address" name="address" value="{{ $user->address }}">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="birth_date">Birthdate:</label>
                        <input class="col" type="date" id="birth_date" name="birth_date"
                            value="{{ $user->birth_date }}">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="email_address">Email</label>
                        <input class="col" type="text" id="email_address" name="email_address"
                            value="{{ $user->email_address }}">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="username">Username</label>
                        <input class="col" type="text" id="username" name="username" value="{{ $user->username }}">
                    </div>
                </div>
            </div>
            <button class="btn-simple">Save</button>
            <a class="btn-simple-cancel" href="/admin/users">Cancel</a>
        </form>
    </div>
@endsection
