<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">

        <!-- Card Ibu -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href=<?php echo base_url("dashboard/People/tb_ibu") ?> class="card border-left-primary shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Daftar Ibu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_ibu; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Petugas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url("dashboard/People/tb_kader") ?>" class="card border-left-success shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Daftar Petugas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kader; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Petugas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url("dashboard/People/tb_anak") ?>" class="card border-left-warning shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Daftar Anak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_anak; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url("dashboard/People/tb_dokter") ?>" class="card border-left-success shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Daftar Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_anak; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Card Petugas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Vaksin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">21</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->