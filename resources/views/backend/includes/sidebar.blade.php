<!-- Sidemenu -->
<div class="main-sidebar main-sidebar-sticky side-menu">
    <div class="sidemenu-logo">
        <a class="main-logo" href="index.html">
            <img src="{{asset('/public/images/logo-wide.png')}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{asset('/public/images/logo-wide-white.png')}}" class="header-brand-img icon-logo" alt="logo">
            <img src="{{asset('/public/images/logo-wide.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
            <img src="{{asset('/public/images/favicon.ico')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
        </a>
    </div>
    <div class="main-sidebar-body">
        <ul class="nav">
            <li class="nav-header"><span class="nav-label">Dashboard</span></li>
            <li class="nav-item">
                <a class="nav-link" href="#"><span class="shape1"></span><span class="shape2"></span>
                    <i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                    <i class="ti-settings sidemenu-icon"></i>
                    <span class="sidemenu-label">PRIVILEGES</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('admin.roles.index')}}">ROLES</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="{{route('admin.permissions.index')}}">PERMISSION</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"><span class="shape1"></span>
                    <span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Users</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span>
                    <i class="ti-mobile sidemenu-icon"></i>
                    <span class="sidemenu-label">Devices</span><i class="angle fe fe-chevron-right"></i></a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="#">All Devices</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="#">Available Devices</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="#">Assigned Devices</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="#">Historical</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- End Sidemenu -->        <!-- Main Header-->
