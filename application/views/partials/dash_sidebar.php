<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?php echo base_url("dashboard") ?>>
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">KIAp<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading ">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href=<?php echo base_url("dashboard/dashboard") ?>>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar:</h6>
                        <a class="collapse-item" href="<?= base_url('dashboard/People/tb_kader') ?>">Petugas</a>
                        <a class="collapse-item" href="<?= base_url('dashboard/People/tb_dokter') ?>">Dokter</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=<?php echo base_url("dashboard/people/profile") ?>>
                    <i class="fas fa-user "></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pasien
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pasien</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar:</h6>
                        <a class="collapse-item" href="<?= base_url('dashboard/People/tb_ibu') ?>">Ibu</a>
                        <a class="collapse-item" href="<?= base_url('dashboard/People/tb_anak') ?>">Anak</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href=<?php echo base_url("dashboard/Riwayat/riwayat") ?>>
                    <i class="fas fa-fw "></i>
                    <span>Riwayat</span>
                </a>
                <a class="nav-link" href=<?php echo base_url("dashboard/Riwayat/vaksin") ?>>
                    <i class="fas fa-fw "></i>
                    <span>Vaksinasi</span>
                </a>
                <a class="nav-link" href=<?php echo base_url("dashboard/Riwayat/h_pemeriksaan") ?>>
                    <i class="fas fa-fw "></i>
                    <span>Hasil Pemeriksaan</span>
                </a>
                <a class="nav-link" href=<?php echo base_url("dashboard/Riwayat/pemeriksaan") ?>>
                    <i class="fas fa-fw "></i>
                    <span>Pemeriksaan</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->