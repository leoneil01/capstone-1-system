@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-info-container">
        <div class="card-info">
            <div class="card-label">
                Total Sales:
            </div>
            <div class="card-result">
                {{number_format($totalSales)}}
            </div>
        </div>
        <div class="card-info">
            <div class="card-label">
                Products:
            </div>
            <div class="card-result">
                {{number_format($totalProducts)}}
            </div>
        </div>
        <div class="card-info">
            <div class="card-label">
                Transactions:
            </div>
            <div class="card-result">
                {{number_format($totalTransactions)}}
            </div>
        </div>
        <div class="card-info">
            <div class="card-label">
                Lowest Unit Stock:
            </div>
            <div class="card-result">
                {{$lowStockProduct->product_name}} <span class="card-sub-result">Stock: {{number_format($lowStockProduct->unit_in_stock)}}</span>
            </div>
        </div>
    </div>
    </script>
@endsection
