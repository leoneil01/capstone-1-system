@extends('layout.main')
@extends('login.admin')
@extends('login.cashier')
@section('login')
    <title>Mongpong Elementary School System</title>
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card border-0 bg-dark-alpha text-white card-responsive" style="max-width: 900px;">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/carousel/mongponglogo.png" class="d-block w-100 img-fluid rounded-start" alt="..."
                                    draggable="false">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                    <div class="card-body">
                        <h1 class="card-title">Mongpong Elementary School</h1>
                        <p class="card-text">Please select your role.</p>
                        <div class="d-flex flex-row flex-wrap justify-content-center">
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#adminLoginModal"><x-fas-user-tie class="fas-icon"/>Admin</button>
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#cashierLoginModal"><x-fas-user-graduate class="fas-icon" />Teacher</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
