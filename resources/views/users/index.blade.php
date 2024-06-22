@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg">
        <table class="table">
            <div class="card-header">
                <form action="" method="post">
                    @csrf
                    <input type="text" class="input-search" placeholder="Search user...">
                    <button class="btn-search"><x-fas-search class="fas-icon" /></button>
                </form>
                <button class="action" data-bs-toggle="modal" data-bs-target="#createUser">
                    Add User
                    <x-fas-plus class="fas-icon" />
                </button>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Fullname</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email_address }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#showUser{{ $user->user_id }}">View</button>
                                <a href="/admin/user/edit/{{ $user->user_id }}" class="btn btn-outline-primary">Edit</a>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#deleteUser{{ $user->user_id }}">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @include('users.show')
                    @include('users.delete')
                @endforeach
            </tbody>
        </table>
    </div>
    @extends('users.create')
@endsection
