<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-...your-integrity-hash-here..." crossorigin="anonymous">

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
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-...your-integrity-hash-here..." crossorigin="anonymous"></script>
<script src="{{ asset('assets/admins/js/lib/iconify-icon.min.js') }}"></script>

<!-- Nhúng Font Icon -->
<script src="{{ asset('assets/clients/js/font-fontawesome-ae333ffef2.js')}}"></script>
</html>
