<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-text mx-3">A.I.M</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    @if(Auth::user()->role_id >= 3)

        <li class="nav-item">
            <a class="nav-link" href="{{ route(Auth::user()->role->name. '.users.index') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Users</span></a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link" href="{{ route(Auth::user()->role->name.'.fields.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Fields</span></a>
    </li>
    @if(Auth::user()->role_id >= 3)
    <li class="nav-item">
        <a class="nav-link" href="{{ route(Auth::user()->role->name.'.roles.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Roles</span></a>
    </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{ route(Auth::user()->role->name.'.teams.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Teams</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
