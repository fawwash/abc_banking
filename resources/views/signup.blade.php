@extends('layouts.registration')
@section('title', 'ABC bank - Signup Page')
@section('registration')
        <input type="hidden" id="signin_link" value="{{ route('signin') }}" />
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-black">Create New Account</h5>
                                    <p class="text-muted">Get your ABC Bank account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation registration" autocomplete="off" method="POST" novalidate action="{{ route('company_registration') }}">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter email address" autocomplete="off" aria-autocomplete="none" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password<span class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" autocomplete="new-password" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirm-password-input" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                            <div class="position-relative auth-pass-inputgroup">
                                                <input type="password" class="form-control pe-5 password-input" name="confirm_password" id="confirm-password-input" onpaste="return false" placeholder="Enter password" autocomplete="false" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="confirm-password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                        </div>

                                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                            <h5 class="fs-13">Password must contain:</h5>
                                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)</p>
                                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter (A-Z)</p>
                                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-theme-bg w-100" type="submit">Sign Up</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="{{ route('signin') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
@stack('scripts')
@push('css')
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('js')
<script src="{{ asset('assets/js/pages/sweetalerts.init.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/passowrd-create.init.js') }}"></script>
<script src="{{asset('js/registration/signup.js?v=1')}}"></script>
@endpush