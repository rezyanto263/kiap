<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID Periksa</th>
                        <th>Pasien</th>
                        <th>NIK Anak</th>
                        <th>NIK Ibu</th>
                        <th>Keluhan</th>
                        <th>Keterangan</th>
                        <th>Catatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($pemeriksaan as $key) : $id++
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= $key['pasien'] ?></td>
                            <td><?= $key['nik_anak'] ?></td>
                            <td><?= $key['nik_ibu'] ?></td>
                            <td><?= $key['keluhan'] ?></td>
                            <td><?= $key['keterangan'] ?></td>
                            <td><?= $key['catatan'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_periksa']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id_periksa']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>



<!-- Modal Tambah data -->
<div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah <?= $title; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <form action="<?= base_url('dashboard/riwayat/tambah_riwayat_pemeriksaan')?>" method="post">

                <div class="row">
                    <div class="form-group">
                        <label for="id_periksa">Data Pemeriksaan</label>
                        <select name="id_periksa" id="" class="form-control" required>
                            <option disabled hidden selected>-- ID | Tanggal | NIK Ibu | Nama Ibu | Kategori --</option>
                            <?php foreach ($daftar_periksa as $value) {
                                    foreach($ibu as $key) {
                                        if (($value['nik_ibu']==$key['nik_ibu'])) {
                                echo '<option value="'.$value['id_periksa'].'">'.$value['id_periksa'].' | '.date('d-m-Y', strtotime($value['tanggal_periksa'])).' | '.$value['nik_ibu'].' | '.$key['nama_ibu'].' | '.$value['kategori'].'</option>';
                            }}} ?>
                        </select>
                    </div>
                </div>
                <p class="text-warning">*sesuaikan nomor daftar periksa dengan nomor daftar periksa pasien</p>
                <div class="row">
                    <div class="form-group">
                        <label for="pasien">Pasien</label>
                        <p class="d-inline-flex gap-1">
                            <div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" name="pasien1" value="Ibu" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck1" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" style="width:115px; border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;">Ibu</label>

                                <input type="checkbox" name="pasien2" value="Anak" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck2" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" style="width:115px;">Anak</label>
                            </div>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <hr style="border: 1.5px solid #0d6efd;">
                            <div class="form-group">
                                <label for="nik_ibu">Ibu</label>
                                <select name="nik_ibu" placeholder="" class="form-select" required>
                                    <option selected>-- Ibu --</option>
                                    <?php foreach ($daftar_periksa as $value) {
                                        if ($value['kategori'] != 'Anak') {
                                            echo '<option value="'.$value['nik_ibu'].'">'.$value['id_periksa'].' | '.$value['nama_ibu'].'</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <hr style="border: 1.5px solid #0d6efd;">
                            <div class="form-group">
                                <label for="nik_anak">Anak</label>
                                <select name="nik_anak" placeholder="" class="form-select" required>
                                    <option selected>-- Anak --</option>
                                    <?php 
                                    foreach ($daftar_periksa as $value) {
                                        foreach ($anak as $key) {
                                            if (($value['nik_ibu']==$key['nik_ibu']) && ($value['kategori'] == 'Anak')) {
                                            echo '<option value="'.$key['nik_anak'].'">'.$value['id_periksa'].' | '.$key['nama_anak'].'</option>';
                                            }
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class=" collapse multi-collapse" id="multiCollapseExample1">
                            <div class="form-group">
                                <label for="keluhan">Keluhan Ibu</label>
                                <textarea type="textarea" name="keluhani" placeholder="Keluhan" class="form-control"  style="height: 83px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan Ibu</label>
                                <textarea type="textarea" name="keterangani" placeholder="Keterangan" class="form-control"  style="height: 100px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="catatan">Catatan Ibu</label>
                                <textarea type="textarea" name="catatani" placeholder="Catatan" class="form-control"  style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <div class="form-group">
                                <label for="keluhan">Keluhan Anak</label>
                                <textarea type="textarea" name="keluhana" placeholder="Keluhan" class="form-control" style="height: 83px;"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan Anak</label>
                                <textarea type="textarea" name="keterangana" placeholder="Keterangan" class="form-control" style="height: 100px;"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="catatan">Catatan Anak</label>
                                <textarea name="catatana" placeholder="Catatan" class="form-control" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" value="submit" class="btn btn-primary"/>
                </div>
                </form>
            </div>
            <!-- end modal content-->

        </div>
    </div>
</div>

<!-- Modal edit-->
<?php

foreach ($tb_pemeriksaan as $row) :
?>

    <div class="modal fade" id="editModal<?= $row['id_periksa']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/riwayat/edit_riwayat_pemeriksaan') ?>" method="post">
                        
                        <input class="form-control" type="text" name="id" value="<?= $row['id_periksa']; ?>" hidden>

                        <div class="form-group" <?= (!is_null($row['nik_anak']))?'hidden':'' ?>>
                            <label for="nik_ibu">Ibu</label>
                            <select name="nik_ibu" id="nik_ibu" class="form-select" disabled>
                                <option selected hidden disabled>-- Ibu --</option>
                                <?php foreach ($daftar_periksa as $key) {
                                    foreach ($ibu as $value) {
                                        if ($key['nik_ibu']==$value['nik_ibu']) {
                                ?>
                                    <option value="<?= $key['nik_ibu']; ?>" <?= ($key['nik_ibu']==$row['nik_ibu'])?'selected':''; ?>><?= $key['id_periksa']; ?> | <?=$value['nama_ibu']; ?></option>
                                <?php
                                }}} ?>
                            </select>
                        </div>

                        <div class="form-group" <?= is_null($row['nik_anak'])?'hidden':''; ?>>
                            <label for="nik_anak">Anak</label>
                            <select name="nik_anak" placeholder="" class="form-select" required>
                                <option selected hidden disabled style="display: none;">-- Anak --</option>
                                <?php foreach ($anak as $value) { 
                                        foreach ($daftar_periksa as $key) {
                                            if (($key['kategori']=='Anak')&&($key['nik_ibu']==$value['nik_ibu'])&&($key['id_periksa']==$row['id_periksa'])) {
                                ?>
                                    <option value="<?= $value['nik_anak'] ?>" <?= (($value['nik_anak'] == $row['nik_anak'])&&($key['id_periksa']==$row['id_periksa'])) ? "selected" : '' ?>>
                                        <?= $key['id_periksa'] ?> | <?= $value['nama_anak'] ?> 
                                    </option>
                                <?php }}} ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keluhan">Keluhan</label>
                            <textarea type="textarea" name="keluhan" placeholder="Keluhan" class="form-control" style="height: 83px;"><?= $row['keluhan']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="textarea" name="keterangan" placeholder="Keterangan" class="form-control" style="height: 100px;"><?= $row['keterangan']; ?></textarea>
                        </div>


                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" placeholder="Catatan" class="form-control" style="height: 100px;"><?= $row['catatan']; ?></textarea>
                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                    <!-- end form -->
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<!-- end Modal edit-->

<!-- Modal Hapus  -->
<?php
foreach ($tb_pemeriksaan as $row) :
?>
    <div class="modal fade" id="hapusModal<?= $row['id_periksa']; ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $row['id_periksa'] ?>">
                    Anda yakin ingin menghapus data ini?
                    Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>dashboard/riwayat/hapus_riwayat_pertumbuhan/<?= $row['id_periksa'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->