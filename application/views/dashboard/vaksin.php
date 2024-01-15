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
                        <th>ID Vaksin</th>
                        <th>Nama Vaksin</th>
                        <th>Jenis</th>
                        <th>Deskripsi</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($j_vaksin as $key) :
                    ?>
                        <tr>
                            <td><?= $key['id_vaksin'] ?></td>
                            <td><?= $key['nama'] ?></td>
                            <td><?= $key['jenis'] ?></td>
                            <td><?= $key['deskripsi'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_vaksin']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn delete -->
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id_vaksin']; ?>">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Vaksin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/tambah_jenis_vaksin'); ?>

                        <div class="form-group">
                            <label for="nama">Nama Vaksin</label>
                            <input name="nama" placeholder="Nama Vaksin" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="jenis">Jenis Vaksin</label>
                            <input name="jenis" placeholder="Jenis Vaksin" class="form-control" required></input>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" rows="3" placeholder="Deskripsi Vaksin" class="form-control" required></textarea>
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
foreach ($j_vaksin as $row) :
?>

<div class="modal fade bd-example-modal-lg" id="editModal<?= $row['id_vaksin']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Vaksin</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/edit_jenis_vaksin'); ?>

                    <input class="form-control" type="number" name="id_vaksin" value="<?= $row['id_vaksin']; ?>" hidden>
                    <div class="form-group">
                        <label for="id_vaksin">ID Vaksin</label>
                        <input class="form-control" type="number" name="id_vaksin" value="<?= $row['id_vaksin']; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Vaksin</label>
                        <input name="nama" placeholder="Nama Vaksin" class="form-control" value="<?= $row['nama']; ?>" required></input>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Vaksin</label>
                        <input name="jenis" placeholder="Jenis Vaksin" class="form-control" value="<?= $row['jenis']; ?>" required></input>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="3" placeholder="Deskripsi Vaksin" class="form-control" required><?= $row['deskripsi']; ?></textarea>
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
<?php endforeach; ?>


<!-- Modal Hapus  -->
<?php
foreach ($j_vaksin as $row) :
?>
    <div class="modal fade" id="hapusModal<?= $row['id_vaksin']; ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_vaksin" value="<?= $row['id_vaksin'] ?>">
                    Anda yakin ingin menghapus data ini?
                    Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>dashboard/riwayat/hapus_jenis_vaksin/<?= $row['id_vaksin'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->