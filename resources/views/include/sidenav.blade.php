<div class="sidenav">
    <div class="sidenav-header">
        <img src="{{ asset('images/temporary_logo.png') }}" alt="Logo" class="logo" draggable="false">
        <h3 class="logo-title">ShopNinja</h3>
    </div>
    <hr>
    <ul>
        <li>
            <a href="/admin">
                <span class="sidenav-icon"><x-fas-home class="fas-icon" /></span>
                <span class="sidenav-title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="/admin/products">
                <span class="sidenav-icon"><x-fas-boxes class="fas-icon" /></span>
                <span class="sidenav-title">Products</span>
            </a>
        </li>
        <li>
            <a href="/admin/users">
                <span class="sidenav-icon"><x-fas-user-alt class="fas-icon" /></span>
                <span class="sidenav-title">Users</span>
            </a>
        </li>
        <li>
            <a href="/admin/supplier">
                <span class="sidenav-icon"><x-fas-truck-ramp-box class="fas-icon" /></span>
                <span class="sidenav-title">Supplier</span>
            </a>
        </li>
        <li>
            <a href="/admin/transaction">
                <span class="sidenav-icon"><x-fas-receipt class="fas-icon" /></span>
                <span class="sidenav-title">Transactions</span>
            </a>
        </li>
        <li class="/admin/signout">
            <a href="#">
                <span class="sidenav-icon"><x-fas-sign-out-alt class="fas-icon" /></span>
                <span class="sidenav-title">Sign out</span>
            </a>
        </li>
    </ul>
</div>
