<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="{{env('APP_NAME')}}" name="description" />
    <meta content="Themesbrand" name="author" />
    @stack('css')
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/custom.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/custom-responsive.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    @stack('css')
    <style>
        div.error {
            width: 100%;
            margin-top: 0.25rem;
            font-size: .875em;
            color: var(--vz-form-invalid-color);
        }
        input:-webkit-autofill {
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
        }
    </style>

</head>
<body>
    <div class="auth-page-wrapper pt-5">
    <div id="preloader" style="display:none;">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!-- Content section-->
    @section('main-content')
    @show

    @section('registration')
    @show
   
    @include('layouts.includes.footer')

</div>
    @stack('scripts')
    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    
    <!-- validation init -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>
    <!-- password create init -->
    <script src="{{ asset('assets/js/pages/jquery.validate.min.js')}}"></script>
    @stack('js')
  
</body>
</html>

