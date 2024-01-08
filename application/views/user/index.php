<!-- Main Content Start -->
<main>
    <!-- Jumbotron Start -->
    <section class="jumbotron" style="box-shadow: 0 10px 10px  rgba(0, 0, 0, 0.1)">
        <div class="container">

            <div class="row pt-5">

                <div class="col-lg-7 col-sm-12">
                    <div class="row pb-3 mb-3">
                        <h1 style="font-family: 'Hedvig Letters Serif'; font-weight: bold; text-shadow: 2px 2px rgba(0, 0, 0, 0.2);">Kesehatan Ibu dan Anak Pintar</h1>
                        <p style="text-align: justify;">Saatnya membentuk keluarga yang sehat dan bahagia! Temukan informasi kesehatan ibu dan anak yang terpercaya di KIAP dan mulailah langkah pertama menuju kehidupan yang lebih baik.</p>
                    </div>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="card card-antrian p-3 fw-bold shadow" style="color: #F875AA;">
                                <div class="card-header fw-bold rounded m-0 p-0" style="border-color: #F875AA; border-width: 2px;">
                                    Antrian Saat Ini
                                </div>
                                <div class="card-body p-0">
                                    <span class="nomor-antrian" style="font-family: 'Roboto Mono'; font-weight: 700; color: #00FF9D;">A01</span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="alert alert-light fw-bold m-0 shadow" style="color: #F875AA;padding: 0px; padding-top: 6px; padding-bottom: 6px;" role="alert">
                                    Mohon Tunggu Giliran Anda!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card card-antrian p-3 fw-bold shadow" style="color: #F875AA;">
                                <div class="card-header fw-bold rounded m-0 p-0" style="border-color: #F875AA; border-width: 2px;">
                                    Nomor Antrian Anda
                                </div>
                                <div class="card-body p-0">
                                    <span class="nomor-antrian" style="font-family: 'Roboto Mono'; font-weight: 700; color: #F875AA;">A05</span>
                                </div>
                            </div>
                            <div class="mt-2 d-grid">
                                <button class="btn btn-secondary fw-bold shadow" type="button" data-bs-toggle="modal" data-bs-target="#detail-antrian">
                                    <i class="fa-solid fa-file-invoice fs-5 me-1"></i>
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                        <p class="mt-3 mb-sm-5 px-lg-0">Ayo periksa sekarang! dengan cara daftarkan diri anda pada Kader yang bertugas!</p>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 d-flex justify-content-center align-items-center">
                    <img src="<?= base_url('assets/'); ?>img/jumbotron3.png" class="img-fluid jumbotron-img" alt="Logo KIAP">
                </div>

            </div>

        </div>
    </section>
    <!-- Jumbotron End -->

    <!-- Antrian Modal Start-->
    <div class="modal fade" id="detail-antrian" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modal-title">Detail Antrian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive rounded">
                        <table class="table table-bordered table-striped">
                            <tr class="text-center">
                                <th>Tanggal</th>
                                <td>21 November 2023</td>
                            </tr>
                            <tr class="text-center">
                                <th>Ruangan</th>
                                <td>01 (Anak)</td>
                            </tr>
                            <tr class="text-center">
                                <th>Dokter</th>
                                <td>Dr. Yessi Rahmawati Sp.OG(K)</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batalAntrian">Batalkan Antrian</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Antrian Modal End -->

    <!-- Batal Antrian Modal Start-->
    <div class="modal fade" id="batalAntrian" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="modal-title">Konfirmasi Pembatalan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>    
                </div>
                <div class="modal-body">
                    <p>Apakah anda sudah yakin ingin membatalkan antrian?</p>
                </div>
                <div class="modal-footer d-flex justify-content-between px-5">
                        <button class="btn btn-success" style="width: 100px;" data-bs-toggle="modal" data-bs-target="#detail-antrian">Kembali</button>
                        <button class="btn btn-danger" style="width: 100px;" data-bs-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Batal Antrian Modal End -->

    <!-- Riwayat Start -->
    <section class="riwayat">
        <div class="container text-center py-5">

            <h1 style="font-family: 'Hedvig Letters Serif'; font-weight: 700; text-shadow: 1px 1px rgba(0, 0, 0, 0.2);">Riwayat</h1>

            <ul class="nav nav-pills my-5 justify-content-center gap-md-5 gap-3" id="pills-tab" role="tablist">
                <li class="nav-item custom-nav-item" role="presentation" id="pemeriksaan-item">
                    <button class="nav-link custom-nav-link active rounded-pill" data-bs-toggle="pill" data-bs-target="#pemeriksaan" type="button" role="tab" aria-controls="pemeriksaan" aria-selected="true">Pemeriksaan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-nav-link rounded-pill" id="pertumbuhan-tab" data-bs-toggle="pill" data-bs-target="#pertumbuhan" type="button" role="tab" aria-controls="pertumbuhan" aria-selected="false">Pertumbuhan</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-nav-link rounded-pill" id="vaksin-tab" data-bs-toggle="pill" data-bs-target="#vaksin" type="button" role="tab" aria-controls="vaksin" aria-selected="false">Vaksin</button>
                </li>
            </ul>
            <div class="tab-content mb-5" id="pills-tabContent" style="box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.1);">
                <div class="tab-pane fade show active" id="pemeriksaan" role="tabpanel" aria-labelledby="pemeriksaan-tab" tabindex="0">

                    <div class="table-responsive custom-table rounded">

                        <table class="table table-bordered table-hover rounded">
                            <thead>
                                <tr class="sticky-top shadow-sm">
                                    <th class="fw-bold">NO</th>
                                    <th class="fw-bold">Tanggal</th>
                                    <th class="fw-bold">Dokter</th>
                                    <th class="fw-bold">Keterangan</th>
                                    <th class="fw-bold">Catatan</th>
                                    <th class="fw-bold">Catatan</th>
                                    <th class="fw-bold">Catatan</th>
                                </tr>
                            </thead>
                            <tbody class="text-start">
                                <tr style="text-align: justify;">
                                    <th>1</th>
                                    <td>21-Nov-2023</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita totam quam esse modi, labore maxime eligendi dolores tenetur nesciunt beatae. A dolorum cumque iure eveniet eos unde, atque debitis amet.</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita totam quam esse modi, labore maxime eligendi dolores tenetur nesciunt beatae. A dolorum cumque iure eveniet eos unde, atque debitis amet.</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita totam quam esse modi, labore maxime eligendi dolores tenetur nesciunt beatae. A dolorum cumque iure eveniet eos unde, atque debitis amet.</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita totam quam esse modi, labore maxime eligendi dolores tenetur nesciunt beatae. A dolorum cumque iure eveniet eos unde, atque debitis amet.</td>
                                    <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita totam quam esse modi, labore maxime eligendi dolores tenetur nesciunt beatae. A dolorum cumque iure eveniet eos unde, atque debitis amet.</td>
                                </tr>
                                <tr style="text-align: justify;">
                                    <th>2</th>
                                    <td>22-Jan-2023</td>
                                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In quaerat explicabo minima quia. Dolore et quibusdam dignissimos quam quasi animi, quae suscipit obcaecati ab consequatur natus ipsa odit quia nulla!</td>
                                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In quaerat explicabo minima quia. Dolore et quibusdam dignissimos quam quasi animi, quae suscipit obcaecati ab consequatur natus ipsa odit quia nulla!</td>
                                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In quaerat explicabo minima quia. Dolore et quibusdam dignissimos quam quasi animi, quae suscipit obcaecati ab consequatur natus ipsa odit quia nulla!</td>
                                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In quaerat explicabo minima quia. Dolore et quibusdam dignissimos quam quasi animi, quae suscipit obcaecati ab consequatur natus ipsa odit quia nulla!</td>
                                    <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In quaerat explicabo minima quia. Dolore et quibusdam dignissimos quam quasi animi, quae suscipit obcaecati ab consequatur natus ipsa odit quia nulla!</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="tab-pane fade" id="pertumbuhan" role="tabpanel" aria-labelledby="pertumbuhan-tab" tabindex="0">
                    <img src="<?= base_url('assets/'); ?>img/jumbotron1.png" alt="">
                </div>
                <div class="tab-pane fade" id="vaksin" role="tabpanel" aria-labelledby="vaksin-tab" tabindex="0">
                    <img src="<?= base_url('assets/'); ?>img/logo.png" alt="">
                </div>

            </div>

        </div>
    </section>
    <!-- Riwayat End -->

    <!-- Panduan Start -->
    <section class="panduan">
        <div class="container py-5">

            <h1 class="text-center" style="font-family: 'Hedvig Letter Serif'; font-weight: 700; color: #F875AA; text-shadow: 1px 1px rgba(0, 0, 0, 0.19);">Panduan</h1>
            <div class="owl-carousel owl-theme my-5">
                <div class="item">
                    <a class="card card-panduan shadow-sm" href="index.html">
                        <img src="<?= base_url('assets/'); ?>img/panduan-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a class="card card-panduan shadow-sm" href="panduan.html">
                        <img src="<?= base_url('assets/'); ?>img/panduan-2.jpeg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a class="card card-panduan shadow-sm" href="panduan.html">
                        <img src="<?= base_url('assets/'); ?>img/panduan-3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a class="card card-panduan shadow-sm" href="panduan.html">
                        <img src="<?= base_url('assets/'); ?>img/panduan-4.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a class="card card-panduan shadow-sm" href="panduan.html">
                        <img src="<?= base_url('assets/'); ?>img/panduan-5.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
                <div class="item">
                    <a class="card card-panduan shadow-sm" href="panduan.html">
                        <img src="<?= base_url('assets/'); ?>img/panduan-6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <!-- Panduan End -->

</main>
<!-- Main Content End -->