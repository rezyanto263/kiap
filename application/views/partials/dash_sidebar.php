<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href=<?php echo base_url("dashboard") ?>>
                <div class="sidebar-brand-icon bg-white rounded-circle" style="box-shadow: 0 0 8px 1px rgba(248, 117, 170, 0.6);">
                    <img src="<?= base_url('assets/img/logo.png')?>" alt="" style="width: 48px; height: 48px;">
                </div>
                <div class="sidebar-brand-text mx-3 fs-2" style="font-family: 'Hedvig Letter Serif'; text-shadow:  0px 0px 10px rgba(248, 117, 170, 0.8);">K I A P</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading ">
                Admin
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href=<?php echo base_url("dashboard") ?>>
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
                    <i class="fas fa-fw fa-solid fa-user-nurse"></i>
                    <span>User</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar:</h6>
                        <a class="collapse-item" href="<?= base_url('dashboard/people/tb_kader') ?>">Petugas</a>
                        <a class="collapse-item" href="<?= base_url('dashboard/people/tb_dokter') ?>">Dokter</a>
                    </div>
                </div>
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
                    <i class="fas fa-fw fa-solid fa-hospital-user"></i>
                    <span>Pasien</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar:</h6>
                        <a class="collapse-item" href="<?= base_url('dashboard/people/tb_ibu') ?>">Ibu</a>
                        <a class="collapse-item" href="<?= base_url('dashboard/people/tb_anak') ?>">Anak</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Riwayat
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-solid fa-book-medical"></i>
                    <span>Riwayat</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar:</h6>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/riwayat/daftar_periksa") ?>">Daftar Periksa</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/riwayat/pemeriksaan") ?>">Pemeriksaan</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/riwayat/pertumbuhan") ?>">Pertumbuhan</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/riwayat/vaksin") ?>">Riwayat Vaksin</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/riwayat/jenis_vaksin") ?>">Vaksin</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Panduan
            </div>

            <li class="nav-item">
                <a href="#" class="nav-link colapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-solid fa-book-open"></i>
                    <span>Panduan</span>
                </a>
                <div class="collapse" id="collapseFive" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Daftar:</h6>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/panduan/panduan_ibu") ?>">Ibu</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/panduan/panduan_balita") ?>">Balita</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/panduan/panduan_anak") ?>">Anak</a>
                        <a class="collapse-item" href="<?php echo base_url("dashboard/panduan/panduan_remaja") ?>">Remaja</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class=" sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->