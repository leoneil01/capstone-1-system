@extends('layout.main')
@section('content')
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->first_name . " " . substr($user->middle_name, 0, 1) . ". " . $user->last_name}}</td>
                    <td>No</td>
                    <td>Powdered Drink</td>
                    <td>Nestle</td>
                    <td>50122115</td>
                    <td>12.00</td>
                    <td>100</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-outline-primary">View</a>
                            <a href="#" class="btn btn-outline-primary">Edit</a>
                            <a href="#" class="btn btn-outline-primary">Delete</a>
                        </div>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
