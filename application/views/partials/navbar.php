
<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow-sm" style="background-color: #f875aa;">
    <div class="container">

        <a class="navbar-brand d-flex" href="<?= base_url('home');  ?>">
            <img src="<?= base_url('assets/'); ?>img/logo.png" class="nav-logo mb-1 me-2 rounded-circle" style="background-color: white; width: 50px; height: 50px;" alt="">
            <p class="nav-name-main m-0 p-0" style="color: white; font-family: 'Hedvig Letters Serif'; font-weight: 700; font-size: 35px;">K I A P</p>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav m-auto">

                <li class="nav-item">
                    <a class="nav-link" style="color: white;" aria-current="page" href="<?= base_url('home'); ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="#">Tentang</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: white;" href="<?= base_url('riwayat'); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Riwayat
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('riwayat'); ?>#pemeriksaan">Pemeriksaan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('riwayat'); ?>#pertumbuhan">Pertumbuhan</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('riwayat'); ?>#vaksin">Vaksin</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="color: white;" href="<?= base_url('panduan'); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Panduan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('panduan'); ?>">Anak</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('panduan'); ?>">Ibu</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown nav-sm-profile">
                    <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="<?= base_url('profil'); ?>">Profil</a></li>
                        <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                        <hr class="dropdown-divider m-0">
                        <li><a class="dropdown-item" style="color: rgb(255, 39, 39) !important;" href="<?= base_url('auth/logout'); ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar Akun</a></li>
                    </ul>
                </li>

            </ul>

            <div class="d-inline">
                <form class="input-group border-1 border-white rounded" role="search">
                    <input class="form-control border-0 custom-search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-light border-0" type="submit"><i class="fa fa-search" style="color: #F875AA;"></i></button>
                </form>
            </div>

            <div>
                <ul class="navbar-nav nav-md-profile">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="rounded-circle ms-3 d-inline border border-3" width="50" src="<?= base_url('assets/');?>img/profile.jpeg" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('profil'); ?>">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Pengaturan</a></li>
                            <hr class="dropdown-divider m-0">
                            <li><a class="dropdown-item" style="color: rgb(255, 39, 39) !important;" href="<?= base_url('auth/logout'); ?>"><i class="fa-solid fa-right-from-bracket me-2"></i>Keluar Akun</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>
<!-- Navbar End -->