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
                        <th>No</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Kategori</th>
                        <th>NIK Ibu</th>
                        <th>Nama Ibu</th>
                        <th>Petugas</th>
                        <th>Dokter</th>
                        <th>Ruangan</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($dataPeriksa as $key) : $id++
                    ?>
                        <tr>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= date('d - m - Y', strtotime($key['tanggal_periksa'])) ?></td>
                            <td><?= $key['kategori'] ?></td>
                            <td><?= $key['nik_ibu'] ?></td>
                            <td><?= $key['nama_ibu'] ?></td>
                            <td><?= $key['nama_petugas'] ?></td>
                            <td><?= $key['nama_dokter'] ?></td>
                            <td><?= $key['nama_ruangan'] ?></td>
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

<!-- Modal Tambah Daftar Periksa -->
<div class="modal fade bd-example-modal-lg" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Periksa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <form action="<?= base_url('dashboard/riwayat/tambah_daftar_periksa')?>" method="post">

                    <input type="number" name="id_petugas" value="<?= $this->session->userdata('id_petugas'); ?>" hidden>

                    <div class="form-group">
                        <label for="keterangan">NIK Ibu</label>
                        <input class="form-control" type="text" name="nik_ibu" id="nik_ibu" required>
                    </div>

                    <div class="form-group">
                        <label class="m-0" for="kategori">Kategori</label>
                        <div class="m-0 p-0">
                            <p class="d-inline-flex gap-1">
                                <div class="btn-group d-flex justify-content-center" role="group" aria-label="Basic checkbox toggle button group">
                                    <input type="checkbox" name="kategori1" value="1" class="btn-check" id="btncheck1" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btncheck1" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" style="width:115px; border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;">Kandungan</label>

                                    <input type="checkbox" name="kategori2" value="1" class="btn-check" id="btncheck2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btncheck2" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" style="width:115px;">Ibu</label>

                                    <input type="checkbox" name="kategori3" value="1" class="btn-check" id="btncheck3" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="btncheck3" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" style="width:115px;">Anak</label>
                                </div>
                            </p>
                            <div class="row">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <hr style="border: 1.5px solid #0d6efd;">
                                    <div class="form-group">
                                        <label for="catatan">Dokter Spesialis Kandungan</label>
                                        <select class="form-select" name="nip_dokter1" id="nip">
                                            <?php foreach ($dataDokter as $key ) {
                                                if ($key['spesialis']=='kandungan') {
                                                    echo '<option value="'.$key['nip'].'">'.$key['nama_dokter'].'</option>';
                                                }
                                            }  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Ruangan Periksa Kandungan</label>
                                        <select class="form-select" name="id_ruangan1" id="nip">
                                            <?php foreach ($dataRuangan as $key ) {
                                                if ($key['kategori']=='Kandungan') {
                                                    echo '<option value="'.$key['id_ruangan'].'">'.$key["nama_ruangan"].'</option>';   
                                                }
                                            }  ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="collapse multi-collapse" id="multiCollapseExample2">
                                    <hr style="border: 1.5px solid #0d6efd;">
                                    <div class="form-group">
                                        <label for="catatan">Dokter Spesialis Ibu</label>
                                        <select class="form-select" name="nip_dokter2" id="nip">
                                            <?php foreach ($dataDokter as $key ) {
                                                if ($key['spesialis']=='ibu') {
                                                    echo '<option value="'.$key['nip'].'">'.$key['nama_dokter'].'</option>';
                                                }
                                            }  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Ruangan Periksa Ibu</label>
                                        <select class="form-select" name="id_ruangan2" id="nip">
                                            <?php foreach ($dataRuangan as $key ) {
                                                if ($key['kategori']=='Ibu') {
                                                    echo '<option value="'.$key['id_ruangan'].'">'.$key["nama_ruangan"].'</option>';   
                                                }
                                            }  ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="collapse multi-collapse" id="multiCollapseExample3">
                                    <hr style="border: 1.5px solid #0d6efd;">
                                    <div class="form-group">
                                        <label for="catatan">Dokter Spesialis Anak</label>
                                        <select class="form-select" name="nip_dokter3" id="nip">
                                            <?php foreach ($dataDokter as $key ) {
                                                if ($key['spesialis']=='anak') {
                                                    echo '<option value="'.$key['nip'].'">'.$key['nama_dokter'].'</option>';
                                                }
                                            }  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Ruangan Periksa Anak</label>
                                        <select class="form-select" name="id_ruangan3" id="nip">
                                            <?php foreach ($dataRuangan as $key ) {
                                                if ($key['kategori']=='Anak') {
                                                    echo '<option value="'.$key['id_ruangan'].'">'.$key["nama_ruangan"].'</option>';   
                                                }
                                            }  ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
            <!-- end modal content-->

        </div>
    </div>
</div>

<?php 
foreach ($tb_periksa as $periksa) {
?>

<!-- Modal Edit Daftar Periksa -->
<div class="modal fade bd-example-modal-lg" id="editModal<?= $periksa['id_periksa']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Periksa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <form action="<?= base_url('dashboard/riwayat/edit_daftar_periksa')?>" method="post">

                    <input type="number" name="id_periksa" value="<?= $periksa['id_periksa']; ?>" hidden>
                    <input type="number" name="id_petugas" value="<?= $this->session->userdata('id_petugas'); ?>" hidden>
                    <div class="form-group">
                        <label for="keterangan">Tanggal Periksa</label>
                        <input class="form-control" type="text" name="tanggal_periksa" value="<?= date('l, d - m - Y', strtotime($periksa['tanggal_periksa'])); ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">NIK Ibu</label>
                        <input class="form-control" type="text" name="nik_ibu" id="nik_ibu" value="<?= $periksa['nik_ibu']; ?>" required>
                    </div>

                    <?php if ($periksa['kategori']=='Kandungan') { ?>
                        <div class="form-group">
                            <label for="catatan">Dokter Spesialis Kandungan</label>
                            <select class="form-select" name="nip_dokter1" id="nip">
                                <?php foreach ($dataDokter as $key ) {
                                    if ($key['spesialis']=='kandungan') {
                                        if ($periksa['nip_dokter']==$key['nip']) {
                                            echo '<option value="'.$key['nip'].'" selected>'.$key["nama_dokter"].'</option>';
                                        } else {
                                            echo '<option value="'.$key['nip'].'">'.$key["nama_dokter"].'</option>';
                                        }
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="catatan">Ruangan Periksa Kandungan</label>
                            <select class="form-select" name="id_ruangan1" id="nip">
                                <?php foreach ($dataRuangan as $key ) {
                                    if ($key['kategori']=='Kandungan') {
                                        if ($periksa['id_ruangan']==$key['id_ruangan']) {
                                            echo '<option value="'.$key['id_ruangan'].'" selected>'.$key["nama_ruangan"].'</option>';
                                        } else {
                                            echo '<option value="'.$key['id_ruangan'].'">'.$key["nama_ruangan"].'</option>';
                                        }
                                    }
                                }  ?>
                            </select>
                        </div>
                    <?php } ?>    
                    <?php if ($periksa['kategori']=='Ibu') { ?>
                            <div class="form-group">
                                <label for="catatan">Dokter Spesialis Ibu</label>
                                <select class="form-select" name="nip_dokter2" id="nip">
                                    <?php foreach ($dataDokter as $key ) {
                                        if ($key['spesialis']=='ibu') {
                                            if ($periksa['nip_dokter']==$key['nip']) {
                                                echo '<option value="'.$key['nip'].'" selected>'.$key["nama_dokter"].'</option>';
                                            } else {
                                                echo '<option value="'.$key['nip'].'">'.$key["nama_dokter"].'</option>';
                                            }
                                        }
                                    }  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Ruangan Periksa Ibu</label>
                                <select class="form-select" name="id_ruangan2" id="nip">
                                    <?php foreach ($dataRuangan as $key ) {
                                        if ($key['kategori']=='Ibu') {
                                            if ($periksa['id_ruangan']==$key['id_ruangan']) {
                                                echo '<option value="'.$key['id_ruangan'].'" selected>'.$key["nama_ruangan"].'</option>';
                                            } else {
                                                echo '<option value="'.$key['id_ruangan'].'">'.$key["nama_ruangan"].'</option>';
                                            }
                                        }
                                    }  ?>
                                </select>
                            </div>
                    <?php } ?>
                    <?php if ($periksa['kategori']=='Anak') { ?>
                            <div class="form-group">
                                <label for="catatan">Dokter Spesialis Anak</label>
                                <select class="form-select" name="nip_dokter3" id="nip">
                                    <?php foreach ($dataDokter as $key ) {
                                        if ($key['spesialis']=='anak') {
                                            if ($periksa['nip_dokter']==$key['nip']) {
                                                echo '<option value="'.$key['nip'].'" selected>'.$key['nama_dokter'].'</option>';
                                            } else {
                                                echo '<option value="'.$key['nip'].'">'.$key['nama_dokter'].'</option>';
                                            }
                                        }
                                    }  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Ruangan Periksa Anak</label>
                                <select class="form-select" name="id_ruangan3" id="nip">
                                    <?php foreach ($dataRuangan as $key ) {
                                        if ($key['kategori']=='Anak') {
                                            if ($periksa['id_ruangan']==$key['id_ruangan']) {
                                                echo '<option value="'.$key['id_ruangan'].'" selected>'.$key["nama_ruangan"].'</option>';
                                            } else {
                                                echo '<option value="'.$key['id_ruangan'].'">'.$key["nama_ruangan"].'</option>';
                                            }
                                        }
                                    }  ?>
                                </select>
                            </div>
                    <?php } ?>


                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
            <!-- end modal content-->

        </div>
    </div>
</div>
<?php } ?>

<!-- Modal Hapus  -->
<?php
$id = 1;
foreach ($tb_periksa as $periksa) : $id++;
?>
    <div class="modal fade" id="hapusModal<?= $periksa['id_periksa']; ?>" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="nik" value="<?= $periksa['id_periksa'] ?>">
                    Anda yakin ingin menghapus data ini?
                    Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url() ?>dashboard/riwayat/hapus_daftar_periksa/<?= $periksa['id_periksa'] ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- end Modal Hapus -->
