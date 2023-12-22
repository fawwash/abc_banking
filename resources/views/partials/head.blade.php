<head>
    @stack('head_start')
    <title>ABC Bank @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta content="ABC Bank" name="description" />
    <meta content="ABC Bank" name="ABC Bank" />
    
    <link href="{{ url('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/custom.css?v=4')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets/css/custom-responsive.css?v=5')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom-admin.css?v=262') }}" rel="stylesheet" type="text/css" />
    @stack('css')
    @stack('internalStyles')
    @stack('head_end')
</head>