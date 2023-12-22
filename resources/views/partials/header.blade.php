@stack('header_start')
<div id="layout-wrapper">
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header p-0 cmp-hdr-drp-blo">
            <div class="d-flex">
                
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <!-- <img src="{{ url('assets/images/logo-sm.png')}}" alt="" height="22"> -->
                        </span>
                        <span class="logo-lg">
                            <!-- <img src="{{ url('assets/images/logo-dark.png')}}" alt="" height="17"> -->
                        </span>
                    </a>
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <!-- <img src="{{ url('assets/images/logo-sm.png')}}" alt="" height="22"> -->
                        </span>
                        <span class="logo-lg">
                            <!-- <img src="{{ url('assets/images/logo-light.png')}}" alt="" height="17"> -->
                        </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 fs-16 header-item horizontal-menu-btn topnav-hamburger ctl-res-ham-ico" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
            </div>
            <div class="d-flex align-items-center">
            <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-bell fs-22"></i>
                        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger lineHeightNormal">3<span class="visually-hidden">unread messages</span></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 ctl-nav-ovr-hid ctl-wid-drp-res" aria-labelledby="page-header-notifications-dropdown">

                        <div class="dropdown-head bg-primary bg-pattern rounded-top">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                    </div>
                                    <div class="col-auto dropdown-tabs">
                                        <span class="badge bg-light-subtle text-body fs-13"> 4 New</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn d-flex gap-2 " id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            {{-- <div class="avatar-title bg-light text-success rounded-circle">
                                {{ strtoupper(substr(Cookie::get('name'), 0, 1)) }}
                            </div> --}}
                            <div class="avatar-title bg-light text-muted rounded-circle">
                            <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="Header Avatar">                            </div>                            
                            <span class="text-end ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text usernamefield lineHeightNormal">
                                    {{ Cookie::get('name') }}
                                </span>
                                <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                    ABC Bank
                                </span>
                            </span>
                        </span>
                        
                    </button>
                    <div class="dropdown-menu dropdown-menu-end ctl-hdr-log-drp ctl-wid-drp-res">

                        <h6 class="dropdown-header">Welcome {{ Cookie::get('name') }}</h6>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                            <span class="align-middle" data-key="t-logout">Logout</span>
                        </a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@include('partials.abc-menu')
</div>
@stack('header_end')