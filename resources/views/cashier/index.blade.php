@extends('layout.main')
@section('cashier-content')
    <link rel="stylesheet" href="{{ asset('css/cashier.css') }}">
    <div class="topbar">
        <div class="topbar-header">
            <img src="{{ asset('images/temporary_logo.png') }}" alt="Logo" class="topbar-logo" draggable="false">
            <h3 class="topbar-title">ShopNinja</h3>
        </div>
        <div class="user" id="user">
            <span class="fullname user-select-none">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
            <img src="{{ asset('images/default_profile_image.jpg') }}" alt="User Image" class="user-img" draggable="false">
            <div class="menu" id="menu">
                <div class="menu-options">
                    <ul>
                        <a data-bs-toggle="modal" data-bs-target="#editProfile">
                            <li>Edit Profile</li>
                        </a>
                        <a data-bs-toggle="modal" data-bs-target="#logout">
                            <li>Logout</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="cashier-panel p-3">
        <div class="row">
            @include('include.messages')
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <form action="/cashier/add-to-cart" method="post" id="checkoutForm">
                        @csrf
                        <label for="barcode">Barcode:</label>
                        <input type="text" id="barcode" name="barcode">
                        <input type="submit" value="Add" class="btn-simple">
                    </form>
                </div>
                Cart:
                <div class="order-list">
                    <ul>
                        <!-- Cart items -->
                        @foreach ($cart as $item)
                            <li id="item">
                                <img src="{{ asset('images/sample_image.jpg') }}" alt="Product Image" draggable="false">
                                <div class="product-details">
                                    <h1>{{ $item->product_name }}</h1>
                                    <h2 id="unit-price">{{ $item->unit_price }}</h2>
                                </div>
                                <p>Qty:</p>
                                <form action="/cashier/edit-qty/{{ $item->item_id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <input class="text-center quantity-input" type="text" id="quantity"
                                        value="{{ $item->qty }}" name="qty" style="width: 50px">
                                </form>
                                <form action="/cashier/remove-item/{{ $item->item_id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-simple-cancel">Remove</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col card-list-container">
                @foreach ($products as $product)
                    <li class="card-item">
                        <form action="/cashier/add-to-cart" method="post">
                            @csrf
                            <div><img src="{{ asset('images/sample_image.jpg') }}" alt="Product Image" draggable="false"
                                    width="50px"></div>
                            <div>{{ $product->product_name }}</div>
                            <div>{{ $product->unit_price }}</div>
                            <input type="hidden" value="{{ $product->barcode }}" name="barcode">
                            <div><button type="submit" class="btn-simple">Add</button></div>
                        </form>
                    </li>
                @endforeach
            </div>
            <div class="col calculator p-3">
                <form action="/cashier/create-transaction" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label class="row" for="payment">Payment</label>
                            <select class="row" name="payment_id" id="payment">
                                @foreach ($payments as $payment)
                                    <option value="{{ $payment->payment_id }}"
                                        {{ $payment->payment_name == 'Cash' ? selected : '' }}>
                                        {{ $payment->payment }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label class="row" for="discount">Discount</label>
                            <select class="row" name="discount_id" id="discount">
                                <option value="" selected>None</option>
                                @foreach ($discounts as $discount)
                                    <option value="{{ $discount->discount_id }}"
                                        data-discount="{{ $discount->discount }}">{{ $discount->discount_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="total" class="col">Total: </label>
                        <input type="hidden" id="originalTotalPrice" value="{{ $totalPrice }}">
                        <input class="text-white col" type="text" id="total"
                            value="{{ $totalPrice ? $totalPrice : '0.00' }}" name="total" readonly>
                    </div>
                    <div class="row">
                        <label for="cash" class="col">Cash: </label>
                        <input class="text-green col" type="text" id="cash" value="0.00" name="cash"
                            readonly>
                    </div>
                    <div class="row">
                        <label for="change" class="col">Change: </label>
                        <input class="text-danger col" type="text" id="change" value="0.00" name="change"
                            readonly>
                    </div>

                    <!-- On-screen number keys -->
                    <div class="num-keys-grid mb-3">
                        @for ($i = 1; $i <= 9; $i++)
                            <button type="button" class="num-key"
                                data-value="{{ $i }}">{{ $i }}</button>
                        @endfor
                        <button type="button" class="num-key" data-value="0">0</button>
                        <button type="button" class="num-key" data-value=".">.</button>
                        <button type="button" class="num-key" data-value="C">C</button>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn-simple col" onclick="printReceipt()">Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('cashier.edit')
    @include('cashier.logout')

    <style>
        .toggle-menu {
            display: block;
        }
    </style>

    <script src="{{ asset('js/cashier.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btn = document.getElementById('user');
            let menu = document.getElementById('menu');

            btn.style.cursor = 'pointer'

            btn.addEventListener('click', function() {
                console.log('toggle')
                menu.classList.toggle('toggle-menu');
            })
        });
    </script>
@endsection
