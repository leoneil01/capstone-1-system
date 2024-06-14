@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        <form action="">
            <div class="col mb-5">
                <div class="row mb-3">
                    <label class="col" for="supplier_name">Transaction Number:</label>
                    <input class="col" type="text" id="supplier_name" name="supplier_name" value="123456789">
                </div>
                <div class="row mb-3">
                    <label class="col" for="date">Date</label>
                    <input class="col" type="date" id="date" name="date" value="January 1, 2024">
                </div>
            </div>
            <button class="btn-simple">Save</button>
            <a href="/admin/transactions" class="btn-simple-cancel">Cancel</a>
        </form>
    </div>
@endsection
