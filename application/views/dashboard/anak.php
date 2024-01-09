<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?>
                <button type="button" class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="example1" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK Anak</th>
                            <th>NIK Ibu</th>
                            <th>Nama Anak</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Tinggi Badan</th>
                            <th>Berat Badan</th>
                            <th>Lingkar Kepala</th>
                            <th>Waktu Edit</th>
                            <td>Opsi</td>
                        </tr>
                    </thead>

                    <!-- proses memmanggil data dari tabel -->

                    <tbody>
                        <?php
                        $id = 1;
                        foreach ($data_anak as $key) : ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $key['nik_anak']; ?></td>
                                <td><?= $key['nik_ibu']; ?></td>
                                <td><?= $key['nama_anak']; ?></td>
                                <td><?php if ($key['jenis_kelamin'] == 'L') {
                                        echo 'Laki-Laki';
                                    } else if ($key['jenis_kelamin'] == 'P') {
                                        echo 'Perempuan';
                                    } else {
                                        echo '--';
                                    };
                                    ?></td>
                                <td><?= date('d - m - Y', strtotime($key['tgl_lahir'])); ?></td>
                                <td><?= $key['tb_lahir']; ?> cm</td>
                                <td><?= $key['bb_lahir']; ?> kg</td>
                                <td><?= $key['lk_lahir']; ?> cm</td>
                                <td><?= $key['date_created']; ?></td>
                                <td>
                                    <center>
                                        <!-- btn info -->
                                        <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['nik_anak']; ?>">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        <!-- btn hapus -->
                                        <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['nik_anak']; ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </center>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php
    $id = 1;
    foreach ($data_anak as $anak) : $id++;
    ?>

        <!-- Modal edit-->
        <div class="modal fade" id="editModal<?= $anak['nik_anak']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_anak') ?>" method="post">
                            <div class="row">

                                <input type="text" name="nik_anak" placeholder="Masukkan NIK Anak" class="form-control" value="<?= $anak['nik_anak']?>" hidden required>

                                <div class="form-group">
                                    <label for="nik_ibu">NIK Ibu</label>
                                    <input type="text" name="nik_ibu" placeholder="Masukkan NIK Ibu" class="form-control" value="<?= $anak['nik_ibu']?>" required>
                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $anak['nama_anak'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $anak['tgl_lahir'] ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="form-control" required>
                                            <option selected hidden disabled class="form-control" value="">-- Jenis Kelamin --</option>
                                            <option value="L" <?= $anak['jenis_kelamin'] == "L" ? "selected" : null ?>>Laki-Laki</option>
                                            <option value="P" <?= $anak['jenis_kelamin'] == 'P' ? 'selected' : null ?>>Perempuan</option>
                                        </select>
                                    </div>

                                </div>
                                
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="tb_lahir">Tinggi Badan</label>
                                        <div class="input-group">
                                            <input type="text" name="tb_lahir" placeholder="Tinggi Badan" class="form-control" value="<?= $anak['tb_lahir'] ?>" aria-describedby="basic-addon1">
                                            <span class="input-group-text" id="basic-addon1">cm</span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="bb_lahir">Berat Badan</label>
                                        <div class="input-group">
                                            <input type="text" name="bb_lahir" placeholder="Berat Badan" class="form-control" value="<?= $anak['bb_lahir'] ?>" aria-describedby="basic-addon2">
                                            <span class="input-group-text" id="basic-addon2">kg</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="lk_lahir">Lingkar Kepala</label>
                                        <div class="input-group">
                                            <input type="text" name="lk_lahir" placeholder="Lingkar Kepala" class="form-control" value="<?= $anak['lk_lahir'] ?>" aria-describedby="basic-addon3">
                                            <span class="input-group-text" id="basic-addon3">cm</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <!-- end Modal edit-->

    <!-- Modal Hapus  -->
    <?php
    $id = 1;
    foreach ($data_anak as $anak) : $id++;
    ?>
        <div class="modal fade" id="hapusModal<?= $anak['nik_anak']; ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nik_anak" value="<?= $anak['nik_anak'] ?>">
                        Anda yakin ingin menghapus data ini?
                        Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= base_url() ?>dashboard/people/hapus_anak/<?= $anak['nik_anak'] ?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- end Modal Hapus -->

    <!-- Modal Tambah data -->
    <div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data anak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- modal content-->
                <div class="modal-body">
                    <?= form_open_multipart('dashboard/people/proses_tambah_anak'); ?>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik_anak">NIK Anak</label>
                                <input type="text" name="nik_anak" placeholder="Masukkan NIK Anak" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nik_ibu">NIK Ibu</label>
                                <input type="text" name="nik_ibu" placeholder="Masukkan NIK Ibu" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" required>
                            </div>

                        </div>
                        
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="tb_lahir">Tinggi Badan</label>
                                <input type="text" name="tb_lahir" placeholder="Tinggi Badan" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="bb_lahir">Berat Badan</label>
                                <input type="text" name="bb_lahir" placeholder="Berat Badan" class="form-control" >
                            </div>
                            
                            <div class="form-group">
                                <label for="lk_lahir">Lingkar Kepala</label>
                                <input type="text" name="lk_lahir" placeholder="Lingkar Kepala" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="form-control" required>
                                    <option class="form-control" selected disabled hidden>-- Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
                <!-- end modal content-->

            </div>
        </div>
    </div>



</div>