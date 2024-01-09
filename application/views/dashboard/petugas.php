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
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No.Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($data_petugas as $key) :
                    ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $key['username'] ?></td>
                            <td><?= $key['nama_petugas'] ?></td>
                            <td><?= $key['alamat'] ?></td>
                            <td><?= $key['no_telp'] ?></td>
                            <td><?php if ($key['jenis_kelamin'] == 'L') {
                                    echo 'Laki-Laki';
                                } else if ($key['jenis_kelamin'] == 'P') {
                                    echo 'Perempuan';
                                } else {
                                    echo '--';
                                };
                                ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id_petugas']; ?>">
                                        <i class="fas fa-info"></i>
                                    </button>
                                    <!-- btn delete -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id_petugas'] ?>">
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


    <!-- Modal edit-->
    <?php
    $id = 0;
    foreach ($data_petugas as $row) : $id++;
    ?>


        <div class="modal fade" id="editModal<?= $row['id_petugas']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_petugas') ?>" method="post">

                            <input type="text" value="<?= $row['id_petugas'] ?>" hidden name="id">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" placeholder="Masukkan Username" class="form-control" value="<?= $row['username'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $row['nama_petugas'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" value="<?= $row['alamat'] ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp">No. Telp</label>
                                        <input type="text" name="no_telp" placeholder="Masukkan No. Telp" class="form-control" value="<?= $row['no_telp'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" placeholder="Masukkan password" class="form-control" value="<?= $row['password'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis</label>
                                        <select name="jenis_kelamin" id="" class="form-control" required>
                                            <option class="form-control" value="" selected hidden disabled>-- Jenis Kelamin --</option>
                                            <option value="L" <?= $row['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                            <option value="P" <?= $row['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
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

    <!-- Modal Hapus  -->
    <?php
    $id = 1;
    foreach ($data_petugas as $row) : $id++;
    ?>
        <div class="modal fade" id="hapusModal<?= $row['id_petugas']; ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $row['id_petugas'] ?>">
                        Anda yakin ingin menghapus data ini?
                        Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= base_url() ?>dashboard/people/hapus_petugas/<?= $key['id_petugas'] ?>">Hapus</a>
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
                    <?= form_open_multipart('dashboard/people/proses_tambah_petugas'); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" placeholder="Masukkan Username" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_telp">No.telp</label>
                                <input type="text" name="no_telp" placeholder="Masukkan No.Telp" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" placeholder="Masukkan password" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control" required>
                                    <option class="form-control" value="" hidden selected disabled>-- Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close(); ?>
                    
                </div>
                
            </div>
            <!-- end modal content-->
        </div>
    </div>
</div>







