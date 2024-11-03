<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">





            <li class="dropdown d-none d-lg-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                    <i class="fe-maximize noti-icon"></i>
                </a>
            </li>






            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="pro-user-name ms-1">
                        {{ Auth::user()->name }} <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown">
                    <!-- Header -->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>

                    <!-- Profile Link -->
                    <a href="{{ route('profile.edit') }}" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>My Account</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- Logout Form -->
                    <a class="dropdown-item notify-item">
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <i class="fe-log-out"></i>
                            <button type="submit" class="btn btn-link text-decoration-none p-0">Logout</button>
                        </form>
                    </a>
                </div>
            </li>


            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon"></i>
                </a>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-light.jpg') }}" alt="" height="22">
                    <!-- <span class="logo-lg-text-light">UBold</span> -->
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-light.jpg') }}" alt="" height="20">
                    <!-- <span class="logo-lg-text-light">U</span> -->
                </span>
            </a>

            <a href="index.html" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-light.jpg') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                     <a href="{{ route('/') }}">   <img id="logo" src="{{ asset('assets/images/logo-light.jpg') }}" alt="" style="height: 70px ;width:200px"></a>
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light"  onclick="removeImage()" >
                    <i class="fe-menu"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>

        </ul>
        <div class="clearfix"   style="color: gold"></div>
    </div>
</div>
