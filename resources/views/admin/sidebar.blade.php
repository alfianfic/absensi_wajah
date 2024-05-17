        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ auth()->user()->nama }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/absensi">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Presensi</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/kelola_karyawan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Karyawan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/kelola_jadwal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jadwal</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/menu_gaji">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Gaji</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/gaji_lembur">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Lembur</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/validasi_izin">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Validasi Surat</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
