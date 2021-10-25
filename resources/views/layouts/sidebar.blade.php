    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-mosque"></i>
            </div>
            <div class="sidebar-brand-text mx-4">Mashola Saiful Anama</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        
        @if (Auth::check())
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        @endif
        
        @if (Auth::check());
        <!-- Divider -->
        <hr class="sidebar-divider">
        
        <!-- Heading -->
        <div class="sidebar-heading">
            Keuangan
        </div>
        
        
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Dana Kas</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen</h6>
                    <a class="collapse-item" href="{{ route('kas-pemasukan.index') }}">Pemasukan</a>
                    <a class="collapse-item" href="{{ route('kas-pengeluaran.index') }}">Pengeluaran</a>
                    <a class="collapse-item" href="{{ route('kas-rekap.index') }}">Rekapitulasi</a>
                </div>
            </div>
        </li>
        @endif

        @if (Auth::check())
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Dana Sosial</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen</h6>
                    <a class="collapse-item" href="{{ route('dana-pemasukan.index') }}">Pemasukan</a>
                    <a class="collapse-item" href="{{ route('dana-pengeluaran.index') }}">Pengeluaran</a>
                    <a class="collapse-item" href="{{ route('dana-rekapitulasi.index') }}">Rekapitulasi</a>
                </div>
            </div>
        </li>
        @endif

        @if (Auth::check() && Auth::user()->level == 'admin')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data Users
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Users</span>
            </a>
            <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen</h6>
                    <a class="collapse-item" href="{{ route('users.index') }}">Kelola Data Users</a>
                </div>
        </li>
        @endif

        @if (Auth::check())
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Laporan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Manajemen</h6>
                    <a class="collapse-item" href="{{ route('laporan-kas.index') }}">Laporan Kas</a>
                    <a class="collapse-item" href="{{ route('laporan-dana-sosial.index') }}">Laporan Dana Sosial</a>
                </div>
        </li>
        @endif

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
