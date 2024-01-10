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
                        <th>Vaksin</th>
                        <th>Tanggal Vaksinasi</th>
                        <th>Usia Vaksinasi</th>
                        <th>No. Anak</th>
                        <th>Info</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($vaksin as $key) :
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= $key['id_vaksin'] ?>. <?= $key['nama'] ?> </td>
                            <td><?= date('d - m - Y', strtotime($key['tgl_vaksin'])) ?></td>
                            <td><?= $key['usia_vaksin'] ?></td>
                            <td><?= $key['nik_anak'] ?>. <?= $key['nama_anak'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_periksa']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn delete -->
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id_periksa']; ?>">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/add_daftarPeriksa'); ?>
                <div class="row">


                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="id_periksa">No. Periksa</label>
                            <select class="form-select" name="id_periksa" id="id_periksa" required>
                                <option selected disabled style="display: none;">-- No. Ruangan --</option>
                                <?php foreach ($data_periksa->row() as $key) {
                                    echo "<option value=" . $key->id_periksa . ">" . $key->id_periksa . "</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="vaksin">Vaksin</label>
                            <select name="vaksin" id="vaksin" class="form-select" required>
                                <option selected disabled style="display: none;" value="">-- Vaksin --</option>
                                <?php foreach ($data_vaksin->result() as $key) {
                                    echo "<option value=" . $key->id_vaksin . ">" . $key->id_vaksin . ". " . $key->nama . "</option>";
                                } ?>
                            </select>
                        </div>


                    </div>

                    <div class="col-md-6 ">
                        <div class="form-group">
                            <label for="tgl">Tanggal Vaksin</label>
                            <input type="date" name="tgl" placeholder="" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nik_anak">Anak</label>
                            <select type="text" name="nik_anak" placeholder="" class="form-select" required>
                                <option selected disabled style="display: none;">-- Anak --</option>
                                <?php foreach ($anak->result() as $key) {
                                    echo "<option value=" . $key->nik_anak . ">" . $key->nik_anak . ". " . $key->nama_anak . "</option>";
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