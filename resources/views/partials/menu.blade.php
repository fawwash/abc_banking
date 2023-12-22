@stack('menu_start')
 <div class="app-menu navbar-menu">
            <div class="navbar-brand-box">
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('home') }}">
                                <i class="bx bx-home"></i> <span>Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('deposit') }}">
                                <i class="bx bx-cloud-upload"></i> <span>Deposit</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('withdraw') }}">
                                <i class="bx bx-cloud-download"></i> <span>Withdraw</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('transfer') }}">
                                <i class="bx bx-transfer"></i> <span>Transfer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('statement') }}">
                                <i class="bx bx-file"></i> <span>Statement</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('logout') }}">
                                <i class="bx bx-exit"></i> <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
            <div class="vertical-overlay"></div>
        </div>
@stack('menu_end')