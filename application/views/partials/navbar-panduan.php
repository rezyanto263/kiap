<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg sticky-top navbar-dark shadow-sm" style="background-color: #f875aa;">
    <div class="container">
        <button class="btn btn-panduan px-3 py-2 m-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fa-solid fa-book-open-reader fs-5 m-0"></i>
        </button>
        <a class="navbar-brand d-flex" href="<?= base_url('home'); ?>">
            <img src="<?= base_url('assets/'); ?>img/logo.png" class="nav-logo mb-1 me-sm-2 rounded-circle" style="background-color: white; width: 50px; height: 50px;" alt="">
            <p class="nav-name-panduan m-0 p-0" style="color: white; font-family: 'Hedvig Letters Serif'; font-weight: 700; font-size: 35px;">K I A P</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link active" style="color: white;" aria-current="page" href="<?= base_url('home'); ?>">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color: white;" href="<?= base_url('about'); ?>">Tentang</a>
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
                    <a class="nav-link" style="color: white;" href="<?= base_url('panduan'); ?>">
                        Panduan
                    </a>
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
                            <img class="rounded-circle ms-3 d-inline border border-3" width="50px" height="50px" src="<?= base_url('image/'); ?><?= ($this->session->userdata('foto')=='')?'profile-placeholder.jpg':$this->session->userdata('foto')?>" alt="">
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

<!-- Offcanvas Panduan Start -->
<div class="offcanvas offcanvas-start" style="width: 75dvw;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title fw-bold" id="offcanvasExampleLabel" style="font-family: 'Hedvig Letter Serif'; color: #F758AA;"><i class="fa-solid fa-book-open-reader fs-4 mb-2 me-2"></i>    Menu Panduan</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="w-100 p-2 rounded fs-5 fw-bold text-white" style="background-color: #F758AA;">
            <i class="fa-solid fa-person-breastfeeding me-2 ms-1" ></i>
            Ibu
        </div>
        <div class="nav flex-column nav-pills custom-pills m-0 rounded ms-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-panduan-home-tab" data-bs-toggle="pill" data-bs-target="#v-panduan-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" hidden>Home</button>
            <?php foreach($panduan as $key) : 
                if ($key['kategori']=='ibu') {
            ?>
            <button class="nav-link my-2 mx-0 text-start btn-sidebar-panduan" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                <?= $key['judul'] ?>
            </button>
            <?php }endforeach; ?>
        </div>

        <div class="w-100 p-2 rounded fs-5 fw-bold text-white mt-3" style="background-color: #F758AA;">
            <i class="fa-solid fa-baby me-2 ms-1" ></i>
            Balita
        </div>
        <div class="nav flex-column nav-pills custom-pills m-0 rounded ms-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-panduan-home-tab" data-bs-toggle="pill" data-bs-target="#v-panduan-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" hidden>Home</button>
            <?php foreach($panduan as $key) : 
                if ($key['kategori']=='balita') {
            ?>
            <button class="nav-link my-2 mx-0 text-start btn-sidebar-panduan" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                <?= $key['judul'] ?>
            </button>
            <?php }endforeach; ?>
        </div>

        <div class="w-100 p-2 rounded fs-5 fw-bold text-white mt-3" style="background-color: #F758AA;">
            <i class="fa-solid fa-children me-2" ></i>
            Anak - Anak
        </div>
        <div class="nav flex-column nav-pills custom-pills m-0 rounded ms-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-panduan-home-tab" data-bs-toggle="pill" data-bs-target="#v-panduan-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" hidden>Home</button>
            <?php foreach($panduan as $key) : 
                if ($key['kategori']=='anak') {
            ?>
            <button class="nav-link my-2 mx-0 text-start btn-sidebar-panduan" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                <?= $key['judul'] ?>
            </button>
            <?php }endforeach; ?>
        </div>

        <div class="w-100 p-2 rounded fs-5 fw-bold text-white mt-3" style="background-color: #F758AA;">
            <i class="fa-solid fa-person fs-3 me-2 ms-1" ></i>
            Remaja
        </div>
        <div class="nav flex-column nav-pills custom-pills m-0 rounded ms-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active" id="v-panduan-home-tab" data-bs-toggle="pill" data-bs-target="#v-panduan-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" hidden>Home</button>
            <?php foreach($panduan as $key) : 
                if ($key['kategori']=='remaja') {
            ?>
            <button class="nav-link my-2 mx-0 text-start btn-sidebar-panduan" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                <?= $key['judul'] ?>
            </button>
            <?php }endforeach; ?>
        </div>
    </div>
</div>
<!-- Offcanvas Panduan End -->