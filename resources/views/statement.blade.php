@extends('layouts.admin')
@section('content')
<input type="hidden" id="getTransactionData" value="{{ route('getTransactionData') }}" />
<div class="card" id="contactList">
    <div class="card-header">
        <div class="row align-items-center g-3">
            <div class="col-md-3">
                <h5 class="card-title mb-0">All Transactions</h5>
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="table-responsive table-card">
            <table class="table align-middle table-nowrap" id="statementTable">
                <thead class="table-light text-muted">
                    <tr>
                        <th>#</th>
                        <th>DATETIME</th>
                        <th>AMOUNT</th>
                        <th>TYPE</th>
                        <th>DETAILS</th>
                        <th>BALANCE</th>
                    </tr>
                    <!--end tr-->
                </thead>
                <tbody class="list form-check-all">
                </tbody>
            </table>
            <!--end table-->
        
    </div>
    <!--end card-body-->
</div>
@endsection

@push('css')
    <link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('js')
    <script src="{{ asset('assets/js/pages/sweetalerts.init.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ asset('js/statement.js?v=1' . date('ymd')) }}"></script>
@endpush