<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="{{ URL::to('assets/img/favicon.png') }}">
    <title>RIC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet"> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/animate.css') }}">

    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/style.css') }}">

    <!--Personalized Effects -->
    <link rel="stylesheet" href="{{ url('template-pagina-inicial/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/myStyle.css') }}">
  <!--  {{-- message toastr --}} -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap"
        rel="stylesheet">

    {{-- smart wizard --}}
    {{-- <link href="https://unpkg.com/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="{{ URL::to('stepper-assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ URL::to('stepper-assets/css/smart_wizard_all.css') }}" />
    {{-- <link rel="stylesheet" href="{{ URL::to('stepper-assets/css/bootstrap.min.css') }}"/> --}}
    {{-- <link rel="stylesheet" href="{{ URL::to('stepper-assets/css/myStyle.css') }}"/> --}}

    {{-- File Upload --}}
    <link rel="stylesheet" href="{{ URL::to('assets-filepond/filepond.min.css') }}">

    <style>
        a {
            text-decoration: none;
        }

        ul {
            list-style: none;
            text-decoration: none;
        }

        li {
            text-decoration: none;
        }

        .filepond--drop-label {
            background-color: #f7f7fa;
            border-radius: 10px;
            color: black;
        }
    </style>
    @yield('styles')
</head>

<body>


