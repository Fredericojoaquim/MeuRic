<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::to('assets/img/favicon.png') }}">


    {{-- Site principal --}}
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap-datetimepicker.min.cs') }}s">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/simple-calendar/simple-calendar.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/multi-select-tag.css') }}">
    {{-- message toastr --}}
    <link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400&amp;display=swap"
        rel="stylesheet">
    <script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>

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

        .error {
            color: red;
        }
    </style>

    @stack('styles')
</head>

<body>
    <div class="main-wrapper">
        {{-- nav bar --}}
        @include('parts-admin.navbar')
        {{-- content page --}}
        {{-- side bar --}}
        @include('parts-admin.sidebar')
        {{-- content page --}}
        @yield('content')
        <footer>
            <p>Repositório institucional da computação - RIC. Copyright &copy; 2023</p>
        </footer>
    </div>
    <script src="{{ URL::to('assets/plugins/simple-calendar/jquery.simple-calendar.js') }}"></script>
    <script src="{{ URL::to('assets/js/calander.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery.validate.js') }}"></script>
    <script src="{{ URL::to('assets/js/jquery-validation@1.19.5_additional-methods.js') }}"></script>
    {{-- <script src="{{ URL::to('assets/js/form-validation.js') }}"></script> --}}
    <script src="{{ URL::to('assets/js/popper.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/feather.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ URL::to('assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/script.js') }}"></script>
    <script src="{{ URL::to('assets/js/multi-select-tag.js') }}"></script>

    <!-- Funcões personalizadas javascript-->
    <script>
        function erro_abrir_modal(mensagem) {
            if (mensagem)
                toastr["error"](
                    "Opps! Ocorreu algum erro, não foi possível realizar a operação no momento. Detalhes: " + mensagem,
                    "Alerta");
            else
                toastr["error"](
                    "Opps! Ocorreu algum erro, não foi possível realizar a operação no momento. Tente novamente mais tarde",
                    "Alerta");

        }

        function showErrorMessage(xhr, status, error) {
            if (xhr.responseText != "") {
                // console.log(xhr);
                try {
                    var jsonResponseText = $.parseJSON(xhr.responseText);
                    console.error("Detalhes do erro: " + JSON.stringify(jsonResponseText));
                    var jsonResponseStatus = '';
                    var message = '';
                    $.each(jsonResponseText, function(name, val) {
                        if (name == "message") {
                            message = val;
                            // jsonResponseStatus = $.parseJSON(JSON.stringify(val));
                            // $.each(jsonResponseStatus, function(name2, val2) {
                            //     if (name2 == "Message") {
                            //         message = val2;
                            //     }
                            // });
                        }
                    });
                } catch (ex) {
                    return '';
                }

                return message;
            }
        }
    </script>

    @yield('scripts')
</body>

</html>
