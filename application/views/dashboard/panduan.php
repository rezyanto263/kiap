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
                        <th>No. </th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        <th>Isi</th>
                        <th>Kategori</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($getPanduan as $key) :
                    ?>
                        <tr>
                            <td><?= $id++ ?></td>
                            <td><?= $key['judul'] ?></td>
                            <td><?= $key['deskripsi'] ?></td>
                            <td><img src="<?= base_url('image/') ?><?= $key['foto'] ?>" alt="" width="100"></td>
                            <td><?= $key['isi'] ?></td>
                            <td><?= $key['kategori'] ?></td>
                            <td>
                                <center>
                                    <!-- btn info -->
                                    <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['id']; ?>">
                                        <i class="fas fa-info"></i></button>
                                    <!-- btn hapus -->
                                    <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['id']; ?>">
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah <?=$title;?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/panduan/add_panduan'); ?>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input name="judul" type="text" placeholder="Judul" class="form-control" required></input>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group ">
                            <label for="image">Foto</label>
                            <input class="form-control" name="userfile" type="file" id="image" size="20">
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label for="Deskripsi">Dekripsi</label>
                        <textarea type="textarea" name="deskripsi" placeholder="Masukkan Deskripsi" rows="4" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <textarea name="isi" placeholder="Isi" class="form-control" rows="4" required></textarea>
                    </div>

                    <input type="text" hidden name="kategori" value="<?= $setKategori ?>">

                        <!-- <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="kategori" placeholder="" class="form-select" required>
                                <option selected hidden disabled>-- Kategori --</option>
                                <option value="ibu">Ibu</option>
                                <option value="balita">Balita</option>
                                <option value="anak">Anak</option>
                            </select>
                        </div> -->

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
<!-- end modal tambah -->

<!-- Modal edit-->
<?php
$id = 0;
foreach ($getPanduan as $row) : $id++;
?>

    <div class="modal fade" id="editModal<?= $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit <?= $title; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('dashboard/panduan/edit_panduan') ?>" method="post">
                        <input type="text" name="id" hidden value="<?= $row['id'] ?>">

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input name="judul" type="text" placeholder="Judul" class="form-control" value="<?= $row['judul'] ?>" required></input>
                                </div>

                                <div class="form-group">
                                    <label for="Deskripsi">Dekripsi</label>
                                    <textarea type="textarea" name="deskripsi" placeholder="Masukkan Deskripsi" rows="4" class="form-control" required><?= $row['deskripsi'] ?></textarea>
                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('image/') . $row['foto']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <label for="image">Foto</label>
                                            <input class="form-control" name="userfile" type="file" value="<?= $row['foto'] ?>" id="image" size="20">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="isi">Isi</label>
                                    <input name="isi" type="text" placeholder="Isi" class="form-control" value="<?= $row['isi'] ?>" required></input>
                                </div>



                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select name="kategori" placeholder="" class="form-select" required>
                                        <option selected hidden disabled style="display: none;">-- Kategori --</option>
                                        <option value="ibu" <?= $row['kategori'] == 'ibu' ? 'selected' : '' ?>>Ibu</option>
                                        <option value="balita" <?= $row['kategori'] == 'balita' ? 'selected' : '' ?>>Balita</option>
                                        <option value="anak" <?= $row['kategori'] == 'anak' ? 'selected' : '' ?>>Anak</option>
                                        <option value="remaja" <?= $row['kategori'] == 'remaja' ? 'selected' : '' ?>>Remaja</option>
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