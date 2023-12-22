@extends('layouts.registration')
@section('title', 'ABC Bank - Login Page')
@section('registration')
    <div class="auth-page-wrapper pt-5">
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            
                            @if($errors->any())
                            <div class="col-12">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger mb-xl-0 fade_msg" role="alert">{{$error}}</div>
                                @endforeach
                            </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="col-12">
                                <div class="alert alert-danger mb-xl-0 fade_msg" role="alert">{{session('error')}}</div>
                            </div>
                            @endif
                            
                            @if(!empty($status))
                            <div class="col-12">
                               <div class="alert alert-danger mb-xl-0 fade_msg" role="alert">{{$status}}</div>
                            </div>
                            @endif
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-black">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to ABC Bank.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{ route('authenticate') }}" class="login" method="post" nautocomplete="off">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input type="text" class="form-control" autocomplete="off" name="email" id="username" placeholder="Enter username" >
                                        </div>

                                        <div class="mb-3 company_list" style="display:none;">
                                            <label class="form-label" for="password-input">Company</label>
                                            <select class="form-control select2" id="countryValidation-feedback" name="company_id" required>
                                                <option value="">Select Company</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" class="form-control pe-5 password-input" name="password"  placeholder="Enter password"  id="password-input" autocomplete="new-password" aria-autocomplete="list">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="remember" type="checkbox" value="1" id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-theme-bg w-100" type="submit">Sign In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account ? <a href="{{ route('signup') }}" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@stack('css')
@push('css')
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@stack('scripts')
@push('js')
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/pages/password-addon.init.js')}}"></script>
    <script src="{{asset('js/login/signin.js?v=8')}}"></script>
@endpush

