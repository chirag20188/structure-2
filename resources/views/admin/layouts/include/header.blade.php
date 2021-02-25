
    <div class="topbar">
        <div class="topbar-left	d-none d-lg-block">
            <div class="text-center">
                <a href="{{ route('admin.dashboard')}}" class="logo"><img src="{{ asset('admin-assets/images/logo.svg')}}" height="50" alt="logo"></a>
            </div>
        </div>

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admin-assets/images/logo.svg')}}" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                        <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a> -->
                        <a class="dropdown-item" href="{{ route('admin.change-password')}}"><span class="badge badge-success mt-1 float-right"></span><i class="mdi mdi-settings m-r-5 text-muted"></i> Change Password</a>
                        <a class="dropdown-item" href="{{ route('admin.logout')}}"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                    </div>
                </li>
            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="list-inline-item">
                    <button type="button" class="button-menu-mobile open-left waves-effect">
                        <i class="ion-navicon"></i>
                    </button>
                </li>
            </ul>
            <div class="clearfix"></div>
        </nav>
    </div>