<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="user_id" content="{{ auth()->user()->id }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <!-- App css -->


    <link href="{{asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/vanillatoasts.css')}}" rel="stylesheet">
    <!--App css leads -->
    <link href="{{asset('libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Table datatable css -->
    <link href="{{asset('libs/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables/scroller.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables/dataTables.colVis.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables/fixedColumns.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->

    <link href="{{asset('libs/nestable2/jquery.nestable.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />

    @stack('css')
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <script>
        setTimeout(function(){
            window.VanillaToasts.create({

                // notification title
                title: 'HEllo World',

                // notification message
                text: 'This toast will hide after 5000ms or when you click it',

                // success, info, warning, error   / optional parameter
                type: 'warning',

                // path to notification icon
                icon: '/images/22.jpg',

                // topRight, topLeft, topCenter, bottomRight, bottomLeft, bottomCenter
                positionClass: 'topRight',

                // auto dismiss after 5000ms

            });

        },3000)
    </script>

</head>
<body>


<div id="wrapper">
    @include('partials.navbar')
    @include('partials.aside')
    <div class="content-page">
        @include('partials.success')
        @include('partials.errors')
        @yield('content')
    </div>
    @include('layouts.footer')
</div>

<script src="{{asset('js/vendor.min.js')}}"></script>

<!-- leads-->

<script src="{{asset('libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
<!-- Datatable plugin js -->
<script src="{{asset('libs/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('libs/datatables/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('libs/datatables/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('libs/datatables/buttons.html5.min.js')}}"></script>
<script src="{{asset('libs/datatables/buttons.print.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('libs/datatables/dataTables.fixedColumns.min.js')}}"></script>
<script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('libs/pdfmake/vfs_fonts.js')}}"></script>
<!-- Datatables init -->
<script src="{{asset('js/pages/datatables.init.js')}}"></script>
<script src="{{asset('libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{asset('libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('libs/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('libs/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('js/pages/sweetalerts.init.js')}}"></script>
<!-- Init js-->
<script src="{{asset('js/pages/form-pickers.init.js')}}"></script>

@stack('script')

<!-- App js -->
<script src="{{asset('js/app.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>


</body>
</html>
