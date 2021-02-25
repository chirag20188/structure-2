    
    <div class="left side-menu">
        <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
            <i class="ion-close"></i>
        </button>

        <div class="left-side-logo d-block d-lg-none">
            <div class="text-center">
                
                <a href="index.html" class="logo"><img src="{{ asset('admin-assets/images/logo-dark.png') }}" height="20" alt="logo"></a>
            </div>
        </div>

        <div class="sidebar-inner slimscrollleft">
            
            <div id="sidebar-menu">
                <ul>
                    <li class="menu-title">Main</li>

                    <li>
                        <a href="{{ route('admin.dashboard')}}" class="waves-effect">
                            <i class="dripicons-meter"></i>
                            <span> Dashboard <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.user.list')}}" class="waves-effect">
                            <i class="mdi mdi-account-plus"></i>
                            <span> Users <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.faq.list')}}" class="waves-effect">
                            <i class="mdi mdi-help-circle"></i>
                            <span> FAQs <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.image.list')}}" class="waves-effect">
                            <i class="mdi mdi-file-image"></i>
                            <span> Image Upload <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.cms.list')}}" class="waves-effect">
                            <i class="mdi mdi-book-open-page-variant"></i>
                            <span> Cms <span class="badge badge-success badge-pill float-right"></span></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- end sidebarinner -->
    </div>