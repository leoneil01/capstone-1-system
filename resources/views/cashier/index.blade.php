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
                <input type="text" id="barcode" name="barcode">
            </div>
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
                            <p>Qty: x5</p>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        <div class="calculator col">
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
            <div>
                <button class="btn-simple-cancel">Hold</button>
                <button class="btn-simple align-self-center">Generate Receipt</button>     
            </div>

            <!-- On-screen number keys -->
            <div class="num-keys-grid">
                @for ($i = 1; $i <= 9; $i++)
                    <button class="num-key" data-value="{{ $i }}">{{ $i }}</button>
                @endfor
                <button class="num-key" data-value="0">0</button>
                <button class="num-key" data-value=".">.</button>
                <button class="num-key" data-value="C">C</button>
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

            function updateCashInput(value) {
                if (value === 'C') {
                    cashInput.value = '0.00';
                } else {
                    if (cashInput.value === '0.00') {
                        cashInput.value = value;
                    } else {
                        cashInput.value += value;
                    }
                }
            }

            numKeys.forEach(key => {
                key.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    updateCashInput(value);
                });
            });

            document.addEventListener('keydown', function(event) {
                const key = event.key;
                if (!isNaN(key) || key === '.') {
                    updateCashInput(key);
                }
                if (key === 'Enter') {
                    cashInput.value = '0.00';
                }
            });
        });
    </script>
@endsection
