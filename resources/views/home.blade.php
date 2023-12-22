@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="profile-foreground position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg">
            <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
        <div class="row g-4">
            <div class="col-auto">
                <div class="avatar-lg">
                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                </div>
            </div>
            <!--end col-->
            <div class="col">
                <div class="p-2">
                    <h3 class="text-white mb-1">{{ Cookie::get('name') }}</h3>
                    <p class="text-white text-opacity-75">ABC Bank User</p>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>
                <div class="d-flex profile-wrapper">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted">
                    <div class="tab-pane active" id="overview-tab" role="tabpanel">
                        <div class="row">
                            <div class="col-xxl-3">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">First Name :</th>
                                                        <td class="text-muted">{{ Cookie::get('name') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Email :</th>
                                                        <td class="text-muted">{{ Cookie::get('email') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted">India
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Balance :</th>
                                                        <td class="text-muted"> {{ isset($balance) ? $balance : '0.00' }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>


@endsection

 

@push('css')

 

<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/fontawesome-v6.css') }}" rel="stylesheet" type="text/css" />

@endpush

@push('js')

<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/select2.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ asset('assets/js/pages/sweetalerts.init.js') }}"></script>
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
// Sweetalert//
$(document).on('click', '#delete-supplier-list', function() {
    Swal.fire({
        title: 'Are you sure?',       
        icon: "warning",
        input: "text",
        inputPlaceholder: "Type 'yes' to confirm",
        showCancelButton: true,
        confirmButtonClass: "btn btn-danger w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-light w-xs mt-2",
        confirmButtonText: "Yes, Delete",
        buttonsStyling: false,
        showCloseButton: true,
    })

    Swal.fire({
        title: 'Are you sure?',       
        icon: "warning",
        input: "text",
        inputPlaceholder: "Type 'yes' to confirm",
        showCancelButton: true,
        confirmButtonClass: "btn btn-danger w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-light w-xs mt-2",
        confirmButtonText: "Yes, Delete",
        buttonsStyling: false,
        showCloseButton: true,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
            Swal.fire({
                title: 'Done',
                text: 'Deleted successfully',
                icon: 'success', // You can use 'success', 'error', 'warning', 'info', etc.
                confirmButtonText: 'OK',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (result.isDenied) {
            // Swal.fire('', '', 'info')
            
        }
        })
    })


$(document).on('click', '#inactive-supplier-list', function() {
    Swal.fire({
        title: 'Are you sure?',      
        icon: "warning",
        input: "text",
        inputPlaceholder: "Type 'yes' to Inactive",
        showCancelButton: true,
        confirmButtonClass: "btn btn-danger w-xs me-2 mt-2",
        cancelButtonClass: "btn btn-light w-xs mt-2",
        confirmButtonText: "Yes, Inactive",
        buttonsStyling: false,
        showCloseButton: true,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
            Swal.fire({
                title: 'Done',
                text: 'Inactive successfully',
                icon: 'success', // You can use 'success', 'error', 'warning', 'info', etc.
                confirmButtonText: 'OK',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (result.isDenied) {
            // Swal.fire('', '', 'info')
            
        }
        })
})

var client_table = $('#example').DataTable({
    "columnDefs": [
        { "orderable": false, "targets": [0, 6] }
    ],
    "order": [[1, "desc"]],
});


</script>
</body>
@endpush