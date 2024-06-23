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
        <div class="card-info">
            <div class="card-label">
                Top Selling Product:
            </div>
            <div class="card-result">
                {{$topSellingProduct ? $topSellingProduct->product_name : 'No Sales'}} <span class="card-sub-result">{{$topSellingProduct ? 'Stock:'.number_format($topSellingProduct->total_qty) : ''}}</span>
            </div>
        </div>
    </div>
    </script>
@endsection
