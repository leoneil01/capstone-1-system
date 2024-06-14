@extends('layout.main')
@section('admin-content')
    @include('include.sidenav')
    @include('include.topbar')
    <div class="card-lg p-5">
        <form action="">
            <div class="col mb-5">
                <div class="row mb-3">
                    <label class="col" for="supplier_name">Supplier:</label>
                    <input class="col" type="text" id="supplier_name" name="supplier_name" value="Coca-Cola Beverages">
                </div>
                <div class="row mb-3">
                    <label class="col" for="contact_name">Contact Name:</label>
                    <input class="col" type="date" id="contact_name" name="contact_name" value="Prof. Kian Willms Sr.">
                </div>
                <div class="row mb-3">
                    <label class="col" for="address">Address:</label>
                    <input class="col" type="text" id="address" name="address" value="Taguig, Manila">
                </div>
                <div class="row mb-3">
                    <label class="col" for="postal_code">Postal Code:</label>
                    <input class="col" type="text" id="postal_code" name="postal_code" value="04988-1221">
                </div>
                <div class="row mb-3">
                    <label class="col" for="country">Country:</label>
                    <input class="col" type="text" id="country" name="country" value="Philippines">
                </div>
                <div class="row mb-3">
                    <label class="col" for="contact_number">Contact Number:</label>
                    <input class="col" type="text" id="contact_number" name="contact_number" value="(208) 838-2983">
                </div>
            </div>
            <button type="submit" class="btn-simple">Save</button>
            <a href="/admin/suppliers" class="btn-simple-cancel">Cancel</a>
        </form>
    </div>
@endsection
