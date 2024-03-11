<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::to('login-assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ URL::to('login-assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ URL::to('login-assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::to('login-assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ URL::to('login-assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ URL::to('login-assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ URL::to('login-assets/css/theme.css') }}">
    {{-- message toastr --}}
    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap"
        rel="stylesheet">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
    <style>
        @media only screen and (max-width: 767px) {
            #bg {
                display: none;
            }

            h2 {
                margin-top: 100px;
            }
        }
    </style>

</head>

<body>
    <main class="main" id="top">
        @yield('content')
    </main>
    <script src="{{ URL::to('login-assets/vendors/popperjs/popper.min.js') }}"></script>
    <script src="{{ URL::to('login-assets/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('login-assets/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ URL::to('login-assets/js/theme.js') }}"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap"
        rel="stylesheet">
    @yield('script')
</body>

</html>
