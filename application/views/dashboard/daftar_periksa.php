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
                        <th>No. Periksa</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Nik. Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Petugas</th>
                        <th>Dokter</th>
                        <th>Ruangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($periksa as $key) : $id++
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= date('d - m - Y', strtotime($key['tanggal_periksa'])) ?></td>
                            <td><?= $key['nik_ibu'] ?></td>
                            <td><?= $key['nama_ibu'] ?></td>
                            <td><?= $key['id_petugas'] ?>. <?= $key['nama_petugas'] ?></td>
                            <td><?= $key['nip_dokter'] ?>. <?= $key['nama_dokter'] ?></td>
                            <td><?= $key['id_ruangan'] ?>. <?= $key['nama_ruangan'] ?></td>
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
<!-- end -->

<!-- Modal Hapus  -->
<?php
$id = 1;
foreach ($periksa as $row) : $id++;
?>
    <div class="modal fade" id="hapusModal<?= $row['id_periksa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-danger" href="<?= base_url() ?>dashboard/riwayat/delete_daftarPeriksa/<?= $row['id_periksa'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->

<!-- Modal edit-->
<?php
$id = 0;
foreach ($periksa as $row) : $id++;
?>

    <div class="modal fade" id="editModal<?= $row['id_periksa']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/riwayat/edit_daftarPeriksa') ?>" method="post">

                        <div class="row">

                            <input type="hidden" name="id" value="<?= $row['id_periksa'] ?>">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="tgl">Tanggal periksa</label>
                                    <input type="date" name="tgl" placeholder="" class="form-control" value="<?= $row['tanggal_periksa'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="nik_ibu">Ibu</label>
                                    <select type="text" name="nik_ibu" placeholder="" class="form-select" required>
                                        <option selected hidden disabled style="display: none;">-- ibu --</option>
                                        <?php foreach ($ibu->result() as $value) { ?>
                                            <option value="<?= $value->nik_ibu ?>" <?= $value->nik_ibu == $row['nik_ibu'] ? "selected" : '' ?>>
                                                <?= $value->nama_ibu ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_ruangan">No. Ruangan</label>
                                    <select class="form-select" name="id_ruangan" id="id_ruangan" required>
                                        <option selected disabled style="display: none;">-- No. Ruangan --</option>
                                        <?php foreach ($ruangan->result() as $key => $value) { ?>
                                            <option value="<?= $value->id_ruangan ?>" <?= $value->id_ruangan == $row['id_ruangan'] ? "selected" : '' ?>>
                                                <?= $value->id_ruangan ?>. <?= $value->nama_ruangan ?>
                                            </option>
                                        <?php }  ?>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="dokter">Dokter</label>
                                    <select name="dokter" id="dokter" class="form-select" required>
                                        <option selected disabled style="display: none;">-- Dokter --</option>
                                        <?php foreach ($dokter->result() as $key) { ?>
                                            <option value="<?= $key->nip ?>" <?= $key->nip == $row['nip_dokter'] ? 'selected' : '' ?>>
                                                <?= $key->nip ?>. <?= $key->nama_dokter ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="petugas">Petugas</label>
                                    <select name="petugas" id="petugas" class="form-select" required>
                                        <option selected disabled style="display: none;">-- Petugas --</option>
                                        <?php foreach ($petugas->result() as $value) { ?>
                                            <option value="<?= $value->id_petugas ?>" <?= ($value->id_petugas == $row['id_petugas']) ? 'selected' : '' ?>>
                                                <?= $value->id_petugas ?>. <?= $value->nama_petugas ?>
                                            </option>
                                        <?php } ?>
                                    </select>
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

<!-- Modal Tambah data -->
<div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/add_daftarPeriksa'); ?>
                <div class="row">

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="tgl">Tanggal periksa</label>
                            <input type="date" name="tgl" placeholder="" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="nik_ibu">Ibu</label>
                            <select name="nik_ibu" class="form-select" required>
                                <option selected style="display: none;">-- ibu --</option>
                                <?php foreach ($ibu->result() as $key) { ?>
                                    <option value=" <?= $key->nik_ibu ?>"><?= $key->nik_ibu ?>. <?= $key->nama_ibu ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="divider"></div>
                    <div class="col-lg-4">

                        <div class="form-group">
                            <label for="id_ruangan">No. Ruangan</label>
                            <select class="form-select" name="id_ruangan" id="id_ruangan" required>
                                <option selected disabled style="display: none;">-- No. Ruangan --</option>
                                <?php foreach ($ruangan->result() as $key) {
                                    echo "<option value=" . $key->id_ruangan . ">" . $key->id_ruangan . ". " . $key->nama_ruangan . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="dokter">Dokter</label>
                            <select name="dokter" id="dokter" class="form-select" required>
                                <option selected disabled style="display: none;" value="">-- Dokter --</option>
                                <?php foreach ($dokter->result() as $key) {
                                    echo "<option value=" . $key->nip . ">" . $key->nip . ". " . $key->nama_dokter . "</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="petugas">Petugas</label>
                            <select name="petugas" id="petugas" class="form-select" required>
                                <option selected disabled style="display: none;" value="">-- Petugas --</option>
                                <?php foreach ($petugas->result() as $key) {
                                    echo "<option value=" . $key->id_petugas . ">" . $key->id_petugas . ". " . $key->nama_petugas . "</option>";
                                } ?>
                            </select>
                        </div>

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