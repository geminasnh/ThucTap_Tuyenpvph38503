<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>

    <!-- Nhúng Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css')}}">

    <!--css-->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css')}}">

    @yield('css')
</head>
<body>

<!--header-->
@include('clients.blocks.header')

<!--Main-->
@yield('content')

<!--footer-->
@include('clients.blocks.footer')

</body>
@yield('js')
<script src="{{ asset('assets/clients/js/bootstrap.bundle.min.js')}}"></script>

<!-- Nhúng Font Icon -->
<script src="{{ asset('assets/clients/js/font-fontawesome-ae333ffef2.js')}}"></script>
</html>
