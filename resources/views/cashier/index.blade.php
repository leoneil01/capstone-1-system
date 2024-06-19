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

    <div class="side-panel row p-3">
        <div class="col">
            <div>
                <label for="barcode">Barcode:</label>
                <input type="number" id="barcode" name="barcode" readonly>
            </div>
            Cart:
            <div class="order-list">
                <ul>
                    <!-- Cart items -->
                    @for ($i = 0; $i < 8; $i++)
                        <li>
                            <img src="{{ asset('images/sample_image.jpg') }}" alt="Product Image" draggable="false">
                            <div class="product-details">
                                <h1>Milo</h1>
                                <h2>12.00</h2>
                            </div>
                            <p>Qty:</p>
                            <input class="text-center" type="number" id="quantity" value="1" readonly>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="row">
                <div class="col">
                    <label class="row" for="payment">Payment</label>
                    <select class="row" name="payment" id="payment">
                        <option value="cash" selected>Cash</option>
                        <option value="gcash">G-Cash</option>
                        <option value="paypal">PayPal</option>
                        <option value="credit_card">Credit Card</option>
                    </select>
                </div>
                <div class="col">
                    <label class="row" for="discount">Discount</label>
                    <select class="row" name="discount" id="discount">
                        <option value="none" selected>None</option>
                        <option value="10%">Senior Citizen</option>
                        <option value="50%">50% Sale</option>
                        <option value="5%">Loyal Customer Discount</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="calculator col">
            <div class="row">
                <label for="total" class="col">Total: </label>
                <input class="text-white col" type="text" id="total" value="0.00" disabled>
            </div>
            <div class="row">
                <label for="cash" class="col">Cash: </label>
                <input class="text-green col" type="number" id="cash" value="0.00" readonly>
            </div>
            <div class="row">
                <label for="change" class="col">Change: </label>
                <input class="text-danger col" type="text" id="change" value="0.00" disabled>
            </div>

            <!-- On-screen number keys -->
            <div class="num-keys-grid mb-3">
                @for ($i = 1; $i <= 9; $i++)
                    <button class="num-key" data-value="{{ $i }}">{{ $i }}</button>
                @endfor
                <button class="num-key" data-value="0">0</button>
                <button class="num-key" data-value=".">.</button>
                <button class="num-key" data-value="C">C</button>
            </div>
            <div class="row">
                <button class="btn-simple-cancel col">Hold</button>
                <button class="btn-simple col">Generate Receipt</button>
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
            let activeInput = document.getElementById('cash');

            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('focus', function() {
                    activeInput = this;
                })
            })

            cashInput.addEventListener('click', function() {
                activeInput = cashInput;
            })

            function updateInput(value) {
                console.log(value)
                if (value === 'C') {
                    if (activeInput.id == 'cash') {
                        activeInput.value = '0.00'
                    } else {
                        activeInput.value = '';
                    }
                } else {
                    if (activeInput.value === '0.00' && activeInput.id == 'cash') {
                        activeInput.value = value;
                    } else {
                        activeInput.value += value;
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
                if (!isNaN(key) || key === '.') {
                    updateInput(key);
                }

                if (key === 'Enter') {
                    if (activeInput.id == 'cash') {
                        activeInput.value = '0.00';
                    } else {
                        activeInput.value = ''

                    }
                }
            });
        });
    </script>
@endsection
