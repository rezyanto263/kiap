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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Ibu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- modal content-->
            <div class="modal-body">

                <?= form_open_multipart('dashboard/riwayat/tambah_daftar_periksa'); ?>
                
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <div>
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group" style="border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;">
                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck1" style="border-top-left-radius: 0.375rem; border-bottom-left-radius: 0.375rem;">Periksa</label>

                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck2">Pertumbuhan</label>

                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btncheck3">Vaksin</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="keterangan">NIK Ibu</label>
                        <input type="text" name="nik_ibu" id="nik_ibu" required>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Dokter</label>
                        <select name="nip_dokter" id="nip">
                            <?php foreach ($dataDokter as $key ) {
                                echo '<option value="'.$key['nip'].'">'.$key['nama_dokter'].'</option>';
                            }  ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="catatan">Ruangan</label>
                        <select name="id_ruangan" id="id_ruangan"></select>
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