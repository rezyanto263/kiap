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
                        <th>No.</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Spesialis</th>
                        <th>Kontak</th>
                        <th>info</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($data_dokter as $key) :
                    ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $key['nip'] ?></td>
                            <td><?= $key['nama_dokter'] ?></td>
                            <td><?php if ($key['spesialis'] == 'kandungan') {
                                    # code...
                                    echo 'Kandungan';
                                } else if ($key['spesialis'] == 'anak') {
                                    # code...
                                    echo 'Anak';
                                } else if ($key['spesialis'] == 'ibu') {
                                    echo 'Ibu';
                                } else {
                                    echo '--';
                                }
                                ?></td>
                            <td><?= $key['kontak'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['nip']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn delete -->
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['nip']; ?>">
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

    <?php
    $id = 1;
    foreach ($data_dokter as $row) : $id++;
    ?>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?= $row['nip']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_dokter') ?>" method="post">

                            <input class="form-control" type="text" value="<?= $row['nip'] ?>" name="nip" hidden>
                            

                            <div class="form-group">
                                <label for="spesialis">Spesialis</label>
                                <select name="spesialis" id="" class="form-control" required>
                                    <option class="form-control" value="">-- Spesialis --</option>
                                    <option value="kandungan" <?= $row['spesialis'] == 'kandungan' ? 'selected' : '' ?>>Kandungan</option>
                                    <option value="anak" <?= $row['spesialis'] == 'anak' ? 'selected' : '' ?>>Anak</option>
                                    <option value="ibu" <?= $row['spesialis'] == 'ibu' ? 'selected' : '' ?>>Ibu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" required placeholder="Masukkan Nama" class="form-control" value="<?= $row['nama_dokter'] ?>">
                            </div>

                            <script>
                                function isNumberKey(evt) {
                                    var kodeASCII = (evt.which) ? evt.which : event.keyCode
                                    if (kodeASCII > 31 && (kodeASCII < 48 || kodeASCII > 57)){
                                    return false;
                                    }
                                    return true;
                                }
                            </script>

                            <div class="form-group">
                                <label for="kontak">No. Telp</label>
                                <input type="text" onkeypress="return isNumberKey(event)" name="kontak" required placeholder="Masukkan No. Telp" class="form-control" value="<?= $row['kontak'] ?>">
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
    $id = 1;
    foreach ($data_dokter as $row) : $id++;
    ?>
        <div class="modal fade" id="hapusModal<?= $row['nip']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nik" value="<?= $row['nip'] ?>">
                        Anda yakin ingin menghapus data ini?
                        Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= base_url() ?>dashboard/people/hapus_dokter/<?= $row['nip'] ?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end Modal Hapus -->

    <!-- modal tambah -->

    <div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- modal content-->
                <div class="modal-body">
                    <?= form_open_multipart('dashboard/people/tambah_dokter'); ?>

                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" placeholder="Masukkan NIP" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="spesialis">Spesialis</label>
                        <select name="spesialis" id="" required class="form-control">
                            <option class="form-control" value="">-- Spesialis --</option>
                            <option value="kandungan">Kandungan</option>
                            <option value="anak">Anak</option>
                            <option value="ibu">Ibu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" required placeholder="Masukkan Nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="kontak">No. Telp</label>
                        <input type="text" name="kontak" placeholder="Masukkan No. Telp" class="form-control">
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


</div>