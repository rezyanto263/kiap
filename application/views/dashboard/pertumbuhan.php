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
                        <th>NIK Anak</th>
                        <th>Nama Anak</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Lingkar Kepala</th>
                        <th>Status Gizi</th>
                        <th>Catatan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($pertumbuhan as $key) :
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= $key['nik_anak'] ?></td>
                            <td><?= $key['nama_anak'] ?></td>
                            <td><?= $key['bb'] ?>kg</td>
                            <td><?= $key['tb'] ?>cm</td>
                            <td><?= $key['lk'] ?>kg</td>
                            <td><?= $key['status_gizi'] ?></td>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Riwayat Pertumbuhan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/tambah_riwayat_pertumbuhan'); ?>
                <div class="row">

                    
                    <div class="form-group">
                        <label for="id_periksa">Data Pemeriksaan</label>
                        <select name="id_periksa" id="" class="form-select" required>
                            <option disabled hidden selected>-- ID | Tanggal | NIK Ibu | Nama Ibu --</option>
                            <?php foreach ($daftar_periksa as $value) {
                                    if (($value['kategori']=='Anak')) {
                                echo '<option value="' . $value['id_periksa'] .'">'.$value['id_periksa'].' | '.date('d-m-Y', strtotime($value['tanggal_periksa'])).' | '.$value['nik_ibu'].' | '.$value['nama_ibu'].'</option>';
                            }} ?>
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

                    <div class="col-md-6">

                    <div class="form-group">
                            <label for="tb">Tinggi Badan</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="tb" placeholder="Tinggi Badan" class="form-control" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bb">Berat Badan</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="bb" placeholder="Berat Badan" class="form-control" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">kg</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bb">Lingkar Kepala</label>
                            <div class="input-group">
                                <input type="number" step="0.01" name="lk" placeholder="Lingkar Kepala" class="form-control" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">cm</span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="gizi">Status Gizi</label>
                            <input name="gizi" placeholder="Status Gizi" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea type="text" name="catatan" rows="5" placeholder="Catatan" class="form-control" required></textarea>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
$id = 1;
foreach ($tb_pertumbuhan as $row) : $id++;
?>

    <!-- Modal -->
    <div class="modal fade" id="editModal<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/riwayat/edit_riwayat_pertumbuhan') ?>" method="post">
                        
                        <div class="row">

                            <input class="form-control" type="text" value="<?= $row['id'] ?>" name="id" hidden>
                            <input class="form-control" type="text" value="<?= $row['id_periksa'] ?>" name="id_periksa" hidden>

                            <div class="form-group">
                                <label for="nik_anak">Anak</label>
                                <select name="nik_anak" placeholder="" class="form-select" required>
                                    <option selected hidden disabled>-- Anak --</option>
                                    <?php foreach ($daftar_periksa as $key) { 
                                        foreach ($anak as $value) {
                                            if (($key['nik_ibu']==$value['nik_ibu']) && ($key['kategori']=='Anak') && ($key['id_periksa']==$row['id_periksa'])) {
                                    ?>
                                                <option value="<?=$value['nik_anak']?>" <?=($row['nik_anak']==$value['nik_anak'])?'selected':''?>><?=$key['id_periksa']?> | <?=$value['nama_anak']?></option>
                                    <?php }}} ?>
                                </select>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="tb">Tinggi Badan</label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" name="tb" placeholder="Tinggi Badan" class="form-control" value="<?= $row['tb'] ?>" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="bb">Berat Badan</label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" name="bb" placeholder="Berat Badan" class="form-control" value="<?= $row['bb'] ?>" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">kg</span>
                                    </div>
                                </div>
        
                                <div class="form-group">
                                    <label for="bb">Lingkar Kepala</label>
                                    <div class="input-group">
                                        <input type="number" step="0.01" name="lk" placeholder="Lingkar Kepala" class="form-control" value="<?= $row['lk'] ?>" aria-describedby="basic-addon2">
                                        <span class="input-group-text" id="basic-addon2">cm</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="gizi">Status Gizi</label>
                                    <input name="gizi" placeholder="Status Gizi" class="form-control" value="<?= $row['status_gizi']; ?>" required></input>
                                </div>
        
                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea type="text" name="catatan" rows="5" placeholder="Catatan" class="form-control" required><?= $row['catatan'] ?></textarea>
                                </div>

                            </div>

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
foreach ($tb_pertumbuhan as $row) :
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
                    <a class="btn btn-danger" href="<?= base_url() ?>dashboard/riwayat/hapus_riwayat_pertumbuhan/<?= $row['id'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->