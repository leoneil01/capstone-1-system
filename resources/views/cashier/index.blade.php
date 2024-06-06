@extends('layout.main')
@section('cashier-content')
    <div class="topbar">
        <div class="topbar-header">
            <img src="{{ asset('images/temporary_logo.png') }}" alt="Logo" class="topbar-logo" draggable="false">
            <h3 class="topbar-title">ShopNinja</h3>
        </div>
        <div class="user">
            <span class="fullname">Full Name</span>
            <img src="{{ asset('images/default_profile_image.jpg') }}" alt="User Image" class="user-img" draggable="false">
        </div>
    </div>


    <div class="side-panel">
        <div class="order-list">
            <ul>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
                <li>
                    <img src="{{asset("images/sample_image.jpg")}}" alt="Product Image" draggable="false">
                    <div class="product-details">
                        <h1>Milo</h1>
                        <h2>12.00</h2>
                    </div>
                    <p>Qty: x5</p>
                </li>
            </ul>
        </div>
        <div class="calculator">
            <div>
                <label for="total">Total: </label>
                <input class="text-white" type="text" id="total" value="0.00" disabled>
            </div>
            <div>
                <label for="cash">Cash: </label>
                <input class="text-green" type="text" id="cash" value="0.00">
            </div>
            <div>
                <label for="change">Change: </label>
                <input class="text-danger" type="text" id="change" value="0.00" disabled>
            </div>
        </div>
        <div class="footer">
            <button class="btn-simple">Genderate Receipt</button>
        </div>
    </div>
@endsection
