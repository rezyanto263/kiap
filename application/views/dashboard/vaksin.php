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
                        <th>Nama Vaksin</th>
                        <th>No. Periksa</th>
                        <th>No. Anak</th>
                        <th>Tanggal Vaksinasi</th>
                        <th>Usia Vaksinasi</th>
                        <th>info</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    <?php
                    $id = 1;
                    foreach ($riwayat as $key) :
                    ?>
                        <tr>
                            <td><?= $key['id_vaksin'] ?></td>
                            <td><?= $key['nama_vaksin'] ?></td>
                            <td><?= $key['id_periksa'] ?></td>
                            <td><?= $key['nik_anak'] ?></td>
                            <td><?= date('d - m - Y', strtotime($key['tgl_vaksin'])) ?></td>
                            <td><?= $key['usia_vaksin'] ?></td>
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