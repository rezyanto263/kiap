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
                        <th>Tanggal Vaksinasi</th>
                        <th>NIK Anak</th>
                        <th>Nama Anak</th>
                        <th>Usia Anak</th>
                        <th>Vaksin</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Catatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($vaksin as $key) :
                        $cekAnak = $this->M_riwayat->cekSatuRiwayat('anak', 'nik_anak', $key['nik_anak'])->row_array();
                        $tgl_lahir1=$cekAnak['tgl_lahir'];
                        $tgl_vaksin = new DateTime($key['tgl_vaksin']);
                        $tgl_lahir = new DateTime($tgl_lahir1);
                        $umur = $tgl_vaksin->diff($tgl_lahir);
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= date('d-m-Y', strtotime($key['tgl_vaksin'])) ?></td>
                            <td><?= $key['nik_anak'] ?></td>
                            <td><?= $key['nama_anak'] ?></td>
                            <td><?= $umur->y.'&nbsp'.' Tahun '.$umur->m.'&nbsp'.' Bulan '.$umur->d.'&nbsp'.' Hari' ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td><?= $key['jenis'] ?></td>
                            <td><?= $key['deskripsi'] ?></td>
                            <td><?= $key['catatan'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn delete -->
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id']; ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<!-- Modal Tambah data -->
<div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/tambah_riwayat_vaksin'); ?>
                <div class="row">

                    <div class="form-group">
                        <label for="id_periksa">Daftar Pemeriksaan</label>
                        <select class="form-select" name="id_periksa" id="id_periksa" required>
                            <option selected disabled style="display: none;">-- ID | Tanggal | NIK Ibu | Nama Ibu --</option>
                            <?php foreach ($daftar_periksa as $key) {
                                if ($key['kategori']=='Anak') {
                                    echo '<option value="'.$key['id_periksa'].'">'.$key['id_periksa'].' | '.$key['tanggal_periksa'].' | '.$key['nik_ibu'].' | '.$key['nama_ibu'].'</option>';
                                }
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_vaksin">Tanggal Vaksin</label>
                        <input type="date" class="form-control" name="tgl_vaksin">
                    </div>

                    <div class="form-group">
                        <label for="vaksin">Vaksin</label>
                        <select name="id_vaksin" id="id_vaksin" class="form-select" required>
                            <option selected disabled hidden>-- Vaksin --</option>
                            <?php foreach ($j_vaksin as $key) {
                                echo '<option value="'.$key['id_vaksin'].'">'.$key['nama'].'</option>';
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nik_anak">Anak</label>
                        <select name="nik_anak" placeholder="" class="form-select" required>
                            <option selected hidden disabled>-- Anak --</option>
                            <?php foreach ($daftar_periksa as $key) { 
                                foreach ($anak as $value) {
                                    if (($key['nik_ibu']==$value['nik_ibu']) && ($key['kategori']=='Anak')) {
                                echo '<option value="'.$value['nik_anak'].'">'.$key['id_periksa'].' | '.$value['nama_anak'].'</option>';
                            }}} ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" name="catatan" id="catatan" rows="3"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- end modal content-->

        </div>
    </div>
</div>


<!-- Modal Edit data -->
<?php 
foreach ($tb_r_vaksin as $row) :
?>

<div class="modal fade bd-example-modal-lg" id="editModal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/edit_riwayat_vaksin'); ?>
                <div class="row">

                    <input type="number" name="id" value="<?= $row['id'] ?>" hidden>
                    <input type="number" name="id_periksa" value="<?= $row['id_periksa'] ?>" hidden>

                    <div class="form-group">
                        <label for="tgl_vaksin">Tanggal Vaksin</label>
                        <input type="date" class="form-control" name="tgl_vaksin" value="<?= $row['tgl_vaksin'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="vaksin">Vaksin</label>
                        <select name="id_vaksin" id="id_vaksin" class="form-select" required>
                            <option selected disabled hidden>-- Vaksin --</option>
                            <?php foreach ($j_vaksin as $key) {
                            ?>
                                <option value="<?=$key['id_vaksin']?>" <?=($row['id_vaksin']==$key['id_vaksin'])?'selected':''?>><?=$key['nama']?></option>;
                            <?php
                            } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nik_anak">Anak</label>
                        <select name="nik_anak" placeholder="" class="form-select" required>
                            <option selected hidden disabled>-- Anak --</option>
                            <?php foreach ($daftar_periksa as $key) { 
                                foreach ($anak as $value) {
                                    if (($key['nik_ibu']==$value['nik_ibu']) && ($key['kategori']=='Anak') && ($key['id_periksa']==$row['id_periksa'])) {
                            ?>
                                <option value="<?=$value['nik_anak']?>" <?=($row['nik_anak']==$value['nik_anak'])?'selected':''?>><?=$key['id_periksa']?> | <?=$value['nama_anak']?></option>;
                            <?php
                            }}} ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" name="catatan" id="catatan" rows="3"><?= $row['catatan'] ?></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
            <!-- end modal content-->

        </div>
    </div>
</div>

<?php endforeach; ?>


<!-- Modal Hapus  -->
<?php
foreach ($tb_r_vaksin as $row) :
?>
    <div class="modal fade" id="hapusModal<?= $row['id']; ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    Anda yakin ingin menghapus data ini?
                    Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>dashboard/riwayat/hapus_riwayat_vaksin/<?= $row['id'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->