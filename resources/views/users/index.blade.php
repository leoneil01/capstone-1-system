@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Fullname</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Role</th>
                    <th scope="col">Address</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Dela Cruz</td>
                    <td>Male</td>
                    <td>Admin</td>
                    <td>Roxas City</td>
                    <td>01/01/2024</td>
                    <td>juan@gmail.com</td>
                    <td>juan</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#showUser">View</button>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#editUser">Edit</button>
                            <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#deleteUser">Delete</button>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@extends('users.show')
@extends('users.edit')
@extends('users.delete')
@endsection
