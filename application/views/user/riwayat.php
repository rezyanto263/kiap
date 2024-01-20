<!-- Main Content Start -->
<main class="riwayat-page">

<!-- Pemeriksaan Start -->
<section class="pemeriksaan" id="pemeriksaan">
    <div class="container-xxl px-lg-5">
        <div class="row pt-3 pb-5">
            <h4 class="display-4 text-center fw-bold" style="font-family: 'Hedvig Letter Serif'; color: #F875AA; text-shadow: 1px 1px rgba(0, 0, 0, 0.2);">Pemeriksaan</h4>
            <div class="owl-carousel owl-theme">
                <div class="col">
                    <?php $i=0; foreach($pemeriksaan as $row) { ?>
                    <?php if ($i%2 == 0 && $i!=0) {echo '</div><div class="col">';} ?>
                        <div class="item">
                            <a class="card shadow-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $i ?>">
                                <span class="position-absolute top-50 end-0 translate-middle p-1 rounded-circle d-flex justify-content-center align-items-center" style="background-color: #F875AA; color: #FFFFFF; width: 25px; height: 25px;">
                                    <?= ($row['pasien']=='Ibu')?'<i class="fa-solid fa-person-breastfeeding p-0 m-0"></i>':'<i class="fa-solid fa-baby p-0 m-0"></i>' ?>
                                </span> 
                                <div class="card-title text-center fw-bold m-0 p-1">
                                    <?= $this->M_riwayat->tanggal_indo($row['tanggal_periksa']) ?>
                                </div>
                                <div class="card-body py-2" style="font-size: 12px;">
                                    <p class="card-text">
                                        <span class="fw-bold">DOKTER</span><br>
                                            <?= $row['nama_dokter'] ?><br><br>
                                        <span class="fw-bold">KELUHAN</span><br>
                                        <?= $row['keluhan'] ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    <?php $i++;} ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Pemeriksaan End -->

<!-- Modal -->

<?php $i=0; foreach($pemeriksaan as $key) { ?>
<div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header shadow-sm" style="color: #FFFFFF; background-color: #F875AA;">
                <h1 class="modal-title fs-lg-4 fs-5 fw-bold" id="exampleModalLabel"><?= $this->M_riwayat->tanggal_indo($key['tanggal_periksa']) ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-lg-5 px-3 py-2">
                <div class="row py-1 text-center">
                    <h5 class="fw-bold">DOKTER</h5>
                    <p><?= $key['nama_dokter'] ?></p>
                </div>
                <div class="row py-1 text-center" <?= ($key['pasien']=='Ibu')?'hidden':''; ?>>
                    <h5 class="fw-bold">PASIEN</h5>
                    <p><?= $key['nama_anak'] ?></p>
                </div>
                <div class="row py-1 text-center" >
                    <h5 class="fw-bold">KELUHAN</h5>
                    <p><?= $key['keluhan'] ?></p>
                </div>
                <div class="row py-1" >
                    <h5 class="fw-bold text-center">KETERANGAN</h5>
                    <p style="text-align: justify;"><?= $key['keterangan'] ?></p>
                </div>
                <div class="row py-1">
                    <h5 class="fw-bold text-center">CATATAN</h5>
                    <p style="text-align: justify;"><?= $key['catatan'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $i++;} ?>

<!-- Pertumbuhan Start -->
<section class="pertumbuhan" id="pertumbuhan">
    <div class="container">
            <h4 class="display-4 text-center fw-bold pt-3" style="font-family: 'Hedvig Letter Serif'; color: #F875AA; text-shadow: 1px 1px rgba(0, 0, 0, 0.2);">Pertumbuhan</h4>
        <div class="row p-md-5 p-2 pt-md-2 pt-2 d-flex justify-content-center">
            <?php 
                foreach ($pertumbuhan as $key) { 
            ?>
            <h5 class="text-center fw-bold" style="font-family: 'Hedvig Letter Serif'; color: #F875AA; text-shadow: 1px 1px rgba(0, 0, 0, 0.2);"><?= $key['nama_anak'] ?></h5>
            <canvas class="p-lg-5 p-3 border bg-white rounded" id="<?= $key['nik_anak'] ?>" style="box-shadow: 0px 1px 8px 0px rgba(0, 0, 0, 0.3);"></canvas>
            
            <?php } ?>
        </div>
        <div class="row d-flex justify-content-center p-md-5 p-2 pt-md-2 pt-2">
            <div class="table-responsive rounded p-0 bg-white" style="outline: 3px solid rgb(248, 117, 170, 0.6); box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.3);">
                <table class="table table-bordered table-hover rounded">
                    <thead class="align-middle text-center">
                        <tr>
                            <th class="fw-bold" rowspan="2">UMUR</th>
                            <th class="fw-bold" colspan="2">Berat Badan (kg)</th>
                            <th class="fw-bold" colspan="2">Panjang Badan (cm)</th>
                            <th class="fw-bold" colspan="2">Tinggi Badan (cm)</th>
                        </tr>
                        <tr>
                            <th>Laki - Laki</th>
                            <th>Perempuan</th>
                            <th>Laki - Laki</th>
                            <th>Perempuan</th>
                            <th>Laki - Laki</th>
                            <th>Perempuan</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        <tr>
                            <td>1 Bulan</td>
                            <td>3,3 - 5,7</td>
                            <td>3,2 - 5,5</td>
                            <td>50,8 - 56,8</td>
                            <td>49,8 - 57,6</td>
                            <td>35 - 39,5</td>
                            <td>34,1 - 38,7</td>
                        </tr>
                        <tr>
                            <td>1 Bulan</td>
                            <td>3,3 - 5,7</td>
                            <td>3,2 - 5,5</td>
                            <td>50,8 - 56,8</td>
                            <td>49,8 - 57,6</td>
                            <td>35 - 39,5</td>
                            <td>34,1 - 38,7</td>
                        </tr>
                        <tr>
                            <td>1 Bulan</td>
                            <td>3,3 - 5,7</td>
                            <td>3,2 - 5,5</td>
                            <td>50,8 - 56,8</td>
                            <td>49,8 - 57,6</td>
                            <td>35 - 39,5</td>
                            <td>34,1 - 38,7</td>
                        </tr>
                        <tr>
                            <td>1 Bulan</td>
                            <td>3,3 - 5,7</td>
                            <td>3,2 - 5,5</td>
                            <td>50,8 - 56,8</td>
                            <td>49,8 - 57,6</td>
                            <td>35 - 39,5</td>
                            <td>34,1 - 38,7</td>
                        </tr>
                        <tr>
                            <td>1 Bulan</td>
                            <td>3,3 - 5,7</td>
                            <td>3,2 - 5,5</td>
                            <td>50,8 - 56,8</td>
                            <td>49,8 - 57,6</td>
                            <td>35 - 39,5</td>
                            <td>34,1 - 38,7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Pertumbuhan End -->

<!-- Vaksin Start -->
<section class="vaksin" id="vaksin">
    <div class="container py-5 p-md-5 p-2 pt-md-2 pt-2">
        <h4 class="display-4 text-center fw-bold" style="font-family: 'Hedvig Letter Serif'; color: #F875AA; text-shadow: 1px 1px rgba(0, 0, 0, 0.2);">Vaksin</h4>
        <div class="table-responsive rounded bg-white" style="outline: 3px solid rgb(248, 117, 170, 0.6); box-shadow: 0 1px 8px 0 rgba(0, 0, 0, 0.3);">
            <table class="table table-bordered table-hover rounded">
                <thead class="align-middle text-center">
                    <tr>
                        <th class="fw-bold">NO</th>
                        <th class="fw-bold">Tanggal</th>
                        <th class="fw-bold">Usia</th>
                        <th class="fw-bold">Nama Vaksin</th>
                        <th class="fw-bold">Jenis</th>
                        <th class="fw-bold">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach($vaksin as $key) { ?>
                        <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><?= $this->M_riwayat->tanggal_indo($key['tgl_vaksin']) ?></td>
                            <td class="text-center"><?= $key['usia_vaksin'] ?></td>
                            <td class="text-center"><?= $key['nama'] ?></td>
                            <td class="text-center"><?= $key['jenis'] ?></td>
                            <td><?= $key['catatan'] ?></td>
                        </tr>
                    <?php $i++;} ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Vaksin End -->

</main>
<!-- Main Content End -->