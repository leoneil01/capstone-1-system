<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidenav.css')}}">
    <link rel="stylesheet" href="{{asset('css/topbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/cards.css')}}">
    <link rel="stylesheet" href="{{asset('css/buttons.css')}}">
    <link rel="stylesheet" href="{{asset('css/table.css')}}">
</head>
<body>

    <div class="admin-page">
        @yield('admin-content')
    </div>

    <div class="cashier-page">
        @yield('cashier-content')
    </div>

    <div class="login-page">
        @yield('login')
    </div>

    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

    @include('sweetalert::alert')
</body>
</html>