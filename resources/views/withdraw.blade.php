@extends('layouts.admin')
@section('content')
<input type="hidden" id="availBalance" value="{{ route('availBalance') }}" />
    <div class="row" style="margin-right: calc(5.5 * var(--vz-gutter-x));margin-left: calc(5.5 * var(--vz-gutter-x));">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Withdraw Money</h4>
                    <div class="flex-shrink-0">
                        <div class="form-check form-switch form-switch-right form-switch-md">
                            <label id="availBalanceLabel" class="form-label text-muted">Avail Balance: {{ isset($balance) ? $balance : '0.00' }}</label>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="live-preview">
                        <form id="withdrawForm" method="post" novalidate action="{{ route('amountWithdraw') }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input type="text" class="form-control numbersOnly" placeholder="Enter amount to withdraw"
                                            id="amount" name="amount" autocomplete="off">
                                            <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <button type="submit" class="form-control btn btn-primary">Withdraw</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@push('css')
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script src="{{ asset('assets/js/pages/sweetalerts.init.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/withdraw.js?v=1' . date('ymd')) }}"></script>
@endpush