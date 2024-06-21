@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        <form action="/admin/transaction/update/{{$transaction->transaction_id}}" method="post">
            @csrf
            @method('PUT')
            <div class="col mb-5">
                <div class="row mb-3">
                    <label class="col" for="payment">Payment:</label>
                    <input class="col" type="text" id="payment" name="payment" value="{{$transaction->payment}}">
                </div>
                <div class="row mb-3">
                    <label class="col" for="total">Total:</label>
                    <input class="col" type="text" id="total" name="total" value="{{$transaction->total}}">
                </div>
                <div class="row mb-3">
                    <label class="col" for="cash">Cash:</label>
                    <input class="col" type="text" id="cash" name="cash" value="{{$transaction->cash}}">
                </div>
                <div class="row mb-3">
                    <label class="col" for="change">Change</label>
                    <input class="col" type="text" id="change" name="change" value="{{$transaction->change}}">
                </div>
                <div class="row mb-3">
                    <label class="col" for="date">Date:</label>
                    <input class="col" type="text" id="date" name="date" value="{{$transaction->created_at}}">
                </div>
            </div>
            <button class="btn-simple">Save</button>
            <a href="/admin/transactions" class="btn-simple-cancel">Cancel</a>
        </form>
    </div>
@endsection
