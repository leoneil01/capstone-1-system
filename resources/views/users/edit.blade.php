@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        <form action="">
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
                        <label class="col" for="fullname">Fullname:</label>
                        <input class="col" type="text" id="fullname" value="Juan Dela Cruz">
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
                        <input class="col" type="text" id="address" value="Roxas City">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="birthdate">Birthdate:</label>
                        <input class="col" type="date" id="birthdate">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="email">Email</label>
                        <input class="col" type="text" id="email" value="juan@gmail.com">
                    </div>
                    <div class="row mb-3">
                        <label class="col" for="username">Username</label>
                        <input class="col" type="text" id="username" value="juan">
                    </div>
                </div>
            </div>
            <button class="btn-simple">Save</button>
            <a class="btn-simple-cancel" href="/admin/users">Cancel</a>
        </form>
    </div>
@endsection
