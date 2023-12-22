<!doctype html>
<html lang="{{app()->getLocale()}}" data-layout="vertical" data-layout-style="default" data-layout-position="fixed" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-layout-width="fluid">
@include('partials.head')
<body>
@stack('body_start')
@include('partials.header')
<div class="main-content theme-btn-col">
@include('partials.tab-content')
{{-- <footer class="footer">
        <div class="text-center">
            <p class="mb-0 text-muted">&copy;
                <script>document.write(new Date().getFullYear())</script> 
                {{ Cookie::get('company_name') }}
            </p>
        </div>
    </footer> --}}
</div>
@stack('body_end')

<script src="{{ url('assets/libs/jquery/jquery-v3.7.0.min.js')}}"></script>
<script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('assets/js/layout.js')}}"></script>
<script src="{{ url('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ url('assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{ url('assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{ url('assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{ url('assets/js/plugins.js?v='.date('ymd'))}}"></script>
<script src="{{ url('assets/js/app.js')}}"></script>
<script src="{{ url('js/common.js?v=7'.date('ymd'))}}"></script>
@stack('js')
@stack('scripts')
</body>
</html>