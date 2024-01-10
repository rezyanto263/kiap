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
                        <th>Pasien</th>
                        <th>Keluhan</th>
                        <th>Keterangan</th>
                        <th>Catatan</th>
                        <th>Anak</th>
                        <th>Ibu</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($r_periksa as $key) : $id++
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= $key['pasien'] ?></td>
                            <td><?= $key['keluhan'] ?></td>
                            <td><?= $key['keterangan'] ?></td>
                            <td><?= $key['catatan'] ?></td>
                            <td><?= $key['nik_anak'] ?></td>
                            <td><?= $key['nik_ibu'] ?></td>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Ibu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/add_rpemeriksaan'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_periksa">No. Pemeriksaan</label>
                            <select name="id_periksa" id="" class="form-control" required>
                                <option disabled hidden selected>-- No pemeriksaan --</option>
                                <?php foreach ($data_periksa->result() as $value) {
                                    echo "<option value=" . $value->id_periksa . ">" . $value->id_periksa . "</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="keluhan">Keluhan</label>
                            <textarea type="textarea" name="keluhan" placeholder="Keluhan" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="textarea" name="keterangan" placeholder="Keterangan" class="form-control" required></textarea>
                        </div>


                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <textarea name="catatan" placeholder="Catatan" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="pasien">Pasien</label>
                            <input name="pasien" type="text" placeholder="Pasien" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="nik_anak">Anak</label>
                            <select name="nik_anak" placeholder="" class="form-select" required>
                                <option selected hidden disabled style="display: none;">-- Anak --</option>
                                <?php foreach ($anak->result() as $value) { ?>
                                    <option value="<?= $value->nik_anak ?>">
                                        <?= $value->nama_anak ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nik_ibu">Ibu</label>
                            <select name="nik_ibu" placeholder="" class="form-select" required>
                                <option selected hidden disabled style="display: none;">-- Ibu --</option>
                                <?php foreach ($ibu->result() as $value) { ?>
                                    <option value="<?= $value->nik_ibu ?>">
                                        <?= $value->nama_ibu ?>
                                    </option>
                                <?php } ?>
                            </select>
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

<!-- Modal edit-->
<?php
$id = 0;
foreach ($r_periksa as $row) : $id++;
?>

    <div class="modal fade" id="editModal<?= $row['id_periksa']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/riwayat/edit_periksa') ?>" method="post">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id_periksa">No. Pemeriksaan</label>
                                    <select name="id_periksa" id="" class="form-control" required>
                                        <option disabled hidden selected>-- No pemeriksaan --</option>
                                        <?php foreach ($data_periksa->result() as $value) { ?>
                                            <option value="<?= $value->id_periksa ?>" <?= $value->id_periksa == $row['id_periksa'] ? "selected" : '' ?>>
                                                <?= $value->id_periksa ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea type="textarea" name="keluhan" placeholder="Keluhan" class="form-control" required><?= $row['keluhan'] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea type="textarea" name="keterangan" placeholder="Keterangan" class="form-control" required><?= $row['keterangan'] ?></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="catatan">Catatan</label>
                                    <textarea name="catatan" placeholder="Catatan" class="form-control" required><?= $row['catatan'] ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="pasien">Pasien</label>
                                    <input name="pasien" type="text" placeholder="Pasien" class="form-control" value="<?= $row['pasien'] ?>" required></input>
                                </div>

                                <div class="form-group">
                                    <label for="nik_anak">Anak</label>
                                    <select name="nik_anak" placeholder="" class="form-select" required>
                                        <option selected hidden disabled style="display: none;">-- Anak --</option>
                                        <?php foreach ($anak->result() as $value) { ?>
                                            <option value="<?= $value->nik_anak ?>" <?= $value->nik_anak == $row['nik_anak'] ? "selected" : '' ?>>
                                                <?= $value->nama_anak ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nik_ibu">Ibu</label>
                                    <select name="nik_ibu" placeholder="" class="form-select" required>
                                        <option selected hidden disabled style="display: none;">-- Ibu --</option>
                                        <?php foreach ($ibu->result() as $value) { ?>
                                            <option value="<?= $value->nik_ibu ?>" <?= $value->nik_ibu == $row['nik_ibu'] ? "selected" : '' ?>>
                                                <?= $value->nama_ibu ?>
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