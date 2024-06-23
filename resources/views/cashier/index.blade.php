@extends('layout.main')
@section('cashier-content')
    <div class="topbar">
        <div class="topbar-header">
            <img src="{{ asset('images/temporary_logo.png') }}" alt="Logo" class="topbar-logo" draggable="false">
            <h3 class="topbar-title">ShopNinja</h3>
        </div>
        <div class="user">
            <span class="fullname">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
            <img src="{{ asset('images/default_profile_image.jpg') }}" alt="User Image" class="user-img" draggable="false">
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
                        <input class="text-green col" type="text" id="cash" value="0.00" name="cash" readonly>
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

    <style>
        .num-keys-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 10px;
            min-width: 250px;
            align-self: center;
        }

        .num-key {
            padding: 20px;
            font-size: 18px;
            text-align: center;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .num-key:hover {
            background-color: #e0e0e0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cashInput = document.getElementById('cash');
            const numKeys = document.querySelectorAll('.num-key');
            const changeInput = document.getElementById('change');
            const originalTotalPrice = document.getElementById('originalTotalPrice')
            const totalInput = document.getElementById('total');
            const discount = document.getElementById('discount');
            let activeInput = document.getElementById('cash');
            let change = 0.00;

            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('focus', function() {
                    if (input.id !== "change" && input.id !== "total") {
                        activeInput = this;
                    }
                })
            })

            function computeChange() {
                if (activeInput.id == "cash") {
                    change = cashInput.value - totalInput.value;
                    if (change > 0) {
                        changeInput.value = change.toFixed(2);
                    } else {
                        changeInput.value = "0.00"
                    }
                }
            }

            discount.addEventListener('change', function() {
                totalInput.value = originalTotalPrice.value
                const selectedOption = discount.selectedOptions[0];
                const discountValue = selectedOption.getAttribute(
                    'data-discount'
                    ); //This reset the total price each time the user change the value of discount
                if (discountValue) { //Checks if the value is not set to none
                    console.log('select')
                    const discountPrice = parseFloat(totalInput.value) * parseFloat(discountValue);
                    console.log(discountPrice);
                    totalInput.value = (parseFloat(totalInput.value) - discountPrice).toFixed(2);
                }

                computeChange(); //Automatically computes the change
            })

            cashInput.addEventListener('click', function() {
                activeInput = cashInput;
            })

            function updateInput(value) {
                console.log(value)
                if (value === 'C') {
                    if (activeInput.id == 'cash') {
                        activeInput.value = '0.00'
                        changeInput.value = '0.00'
                    } else {
                        activeInput.value = '';
                    }
                } else {
                    if (activeInput.value === '0.00' && activeInput.id == 'cash') {
                        activeInput.value = value;
                    } else {
                        activeInput.value += value;
                        computeChange();
                    }
                }
            }

            numKeys.forEach(key => {
                key.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    updateInput(value);
                });
            });

            document.addEventListener('keydown', function(event) {
                const key = event.key;
                if (activeInput.id == 'cash') {
                    if (key === 'Backspace') {
                        activeInput.value = activeInput.value.slice(0, -1);
                        computeChange();
                    }

                    if (!isNaN(key) || key === '.') {
                        updateInput(key);
                    }
                }
            });
        });
    </script>
@endsection
