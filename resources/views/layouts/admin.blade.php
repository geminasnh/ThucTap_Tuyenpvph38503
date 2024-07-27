<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets/admins/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/editor.quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/full-calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/lib/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/style.css') }}">

    <title>Admin Dashboard</title>
</head>
<body>
<aside class="sidebar">
    @include('admins.blocks.sidebar')
</aside>
<main class="dashboard-main">

    <div class="navbar-header">
        @include('admins.blocks.header')
    </div>

    <div class="dashboard-main-body">
        @yield('content')
    </div>

    <footer class="d-footer">
        @include('admins.blocks.footer')
    </footer>
</main>

@yield('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('assets/admins/js/lib/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/iconify-icon.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/jquery-jvectormap-2.0.5.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/magnifc-popup.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/lib/slick.min.js') }}"></script>
<script src="{{ asset('assets/admins/js/app.js') }}"></script>
<script src="{{ asset('assets/admins/js/homeOneChart.js') }}"></script>

</body>
</html>
