@extends('layout.main')
@section('content')
    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card border-0 bg-dark-alpha text-white" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="images/carousel/1.png" class="d-block w-100 img-fluid rounded-start" alt="..."
                                    draggable="false">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Inventory Management</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/carousel/2.png" class="d-block w-100 img-fluid rounded-start"
                                    alt="..." draggable="false">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Customizable Reporting</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="images/carousel/3.png" class="d-block w-100 img-fluid rounded-start"
                                    alt="..." draggable="false">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>User-Friendly Interface</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <div class="card-body">
                        <h1 class="card-title">Laravel POS System</h1>
                        <p class="card-text">Please select your role.</p>
                        <div class="d-flex flex-row flex-wrap justify-content-center">
                            <button>Admin</button>
                            <button>Cashier</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
