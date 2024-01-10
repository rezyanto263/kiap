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
                            <th class="align-middle text-center">No</th>
                            <th class="align-middle text-center">NIK</th>
                            <th class="align-middle">Agama</th>
                            <th class="align-middle">Nama Ibu</th>
                            <th class="align-middle">Gol. Darah</th>
                            <th class="align-middle">No. Handphone</th>
                            <th class="align-middle">Pendidikan</th>
                            <th class="align-middle">Pekerjaan</th>
                            <th class="align-middle text-center">Alamat</th>
                            <th class="align-middle">Tempat Lahir</th>
                            <th class="align-middle">Tanggal Lahir</th>
                            <th class="align-middle">Nama Suami</th>
                            <th class="align-middle">Waktu Edit</th>
                            <td class="align-middle">Opsi</td>
                        </tr>
                    </thead>

                    <!-- proses memmanggil data dari tabel -->

                    <tbody>
                        <?php
                        $id = 1;
                        foreach ($data_ibu as $key) : ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $key['nik_ibu']; ?></td>
                                <td><?= $key['agama']; ?></td>
                                <td><?= $key['nama_ibu']; ?></td>
                                <td><?= $key['gol_darah']; ?></td>
                                <td><?= $key['no_telp']; ?></td>
                                <td><?= $key['pendidikan']; ?></td>
                                <td><?= $key['pekerjaan']; ?></td>
                                <td><?= $key['alamat']; ?></td>
                                <td><?= $key['tempat_lahir']; ?></td>
                                <td><?= date('d - m - Y', strtotime($key['tgl_lahir'])); ?></td>
                                <td><?= $key['nama_suami']; ?></td>
                                <td><?= date('d-m-Y H:i:s', strtotime($key['date_created'])); ?></td>
                                <td>
                                    <center>
                                        <!-- btn info -->
                                        <button class="btn btn-sm btn-info btn-circle" data-bs-toggle="modal" data-bs-target="#editModal<?= $key['nik_ibu']; ?>">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        <!-- btn hapus -->
                                        <button class="btn btn-sm btn-danger btn-circle" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $key['nik_ibu']; ?>">
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
    foreach ($data_ibu as $ibu) : $id++;
    ?>

        <!-- Modal edit-->
        <div class="modal fade" id="editModal<?= $ibu['nik_ibu']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('dashboard/people/edit_ibu') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control" value="<?= $ibu['nik_ibu'] ?>">
                                </div>
    
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select class="form-select" name="agama" id="agama" required>
                                        <option selected disabled style="display: none;">-- Agama --</option>
                                        <option value="Islam" <?= ($ibu['agama']=='Islam')?'selected':''; ?>>Islam</option>
                                        <option value="Hindu" <?= ($ibu['agama']=='Hindu')?'selected':''; ?>>Hindu</option>
                                        <option value="Buddha" <?= ($ibu['agama']=='Buddha')?'selected':''; ?>>Buddha</option>
                                        <option value="Kristen" <?= ($ibu['agama']=='Kristen')?'selected':''; ?>>Kristen</option>
                                        <option value="Katolik" <?= ($ibu['agama']=='Katolik')?'selected':''; ?>>Katolik</option>
                                        <option value="Konghuchu" <?= ($ibu['agama']=='Konghuchu')?'selected':''; ?>>Konghuchu</option>
                                    </select>
                                </div>
    
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" value="<?= $ibu['nama_ibu'] ?>" required>
                                </div>
    
                                <div class="form-group">
                                    <label for="gol_darah">Gol. Darah</label>
                                    <select class="form-select" name="gol_darah" id="gol_darah" required>
                                        <option selected hidden disabled>-- Golongan Darah --</option>
                                        <option value="A" <?= ($ibu['gol_darah']=='A')?'selected':''; ?>>A</option>
                                        <option value="AB" <?= ($ibu['gol_darah']=='AB')?'selected':''; ?>>AB</option>
                                        <option value="B" <?= ($ibu['gol_darah']=='B')?'selected':''; ?>>B</option>
                                        <option value="O" <?= ($ibu['gol_darah']=='O')?'selected':''; ?>>O</option>
                                    </select>
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
                                    <label for="no_telp">No. Handphone</label>
                                    <input type="number" name="no_telp" onkeypress="return isNumberKey(event)" placeholder="Masukkan No. Handphone" class="form-control" value="<?= $ibu['no_telp'] ?>" required>
                                </div>
    
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" class="form-control" value="<?= $ibu['pekerjaan'] ?>" required>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan Terakhir</label>
                                    <select class="form-select" name="pendidikan" id="pendidikan">
                                        <option value="-" <?= ($ibu['pendidikan']=='-')?'selected':''?> hidden  >-- Pendidikan Terakhir --</option>
                                        <option value="SD"<?= ($ibu['pendidikan']=='SD')?'selected':'' ?>>SD</option>
                                        <option value="SMP"<?= ($ibu['pendidikan']=='SD')?'selected':'' ?>>SMP</option>
                                        <option value="SMA/SMK"<?= ($ibu['pendidikan']=='SMA/SMK')?'selected':'' ?>>SMA/SMK</option>
                                        <option value="D3"<?= ($ibu['pendidikan']=='D3')?'selected':'' ?>>D3</option>
                                        <option value="S1"<?= ($ibu['pendidikan']=='S1')?'selected':'' ?>>S1</option>
                                        <option value="S2"<?= ($ibu['pendidikan']=='S2')?'selected':'' ?>>S2</option>
                                        <option value="S3"<?= ($ibu['pendidikan']=='S3')?'selected':'' ?>>S3</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control" value="<?= $ibu['tempat_lahir'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="<?= $ibu['tgl_lahir'] ?>" required>
                                </div>
        
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" value="<?= $ibu['alamat'] ?>" required>
                                </div>
        
                                <div class="form-group">
                                    <label for="nama_suami">Nama Suami</label>
                                    <input type="text" name="nama_suami" placeholder="Masukkan Nama Suami" class="form-control" value="<?= $ibu['nama_suami'] ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" placeholder="Masukkan Password" class="form-control" value="<?= $ibu['password'] ?>" required>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
    foreach ($data_ibu as $ibu) : $id++;
    ?>
        <div class="modal fade" id="hapusModal<?= $ibu['nik_ibu']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data?</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="nik" value="<?= $ibu['nik_ibu'] ?>">
                        Anda yakin ingin menghapus data ini?
                        Tindakan ini tidak dapat dibatalkan, pastikan Anda telah mempertimbangkan dengan cermat sebelum melanjutkan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= base_url() ?>dashboard/people/hapus_i_data/<?= $ibu['nik_ibu'] ?>">Hapus</a>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Ibu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- modal content-->
                <div class="modal-body">

                    <?= form_open_multipart('dashboard/people/proses_tambah_ibu'); ?>
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" placeholder="Masukkan NIK" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-select" name="agama" id="agama" required>
                                    <option selected disabled style="display: none;">-- Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </div>
        
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" placeholder="Masukkan Nama" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label for="gol_darah">Gol. Darah</label>
                                <select class="form-select" name="gol_darah" id="gol_darah" required>
                                    <option selected disabled style="display: none;">-- Golongan Darah --</option>
                                    <option value="A">A</option>
                                    <option value="AB">AB</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="no_telp">No. Handphone</label>
                                <input type="text" name="no_telp" onkeypress="return isNumberKey(event)" placeholder="Masukkan No. Handphone" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" placeholder="Masukkan Pekerjaan" class="form-control" required>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="pendidikan">Pendidikan Terakhir</label>
                                <select class="form-select" name="pendidikan" id="pendidikan">
                                    <option value="-" selected hidden>-- Pendidikan Terakhir --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="tempat">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" required>
                            </div>
        
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" placeholder="Masukkan Alamat" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="nama_suami">Nama Suami</label>
                                <input type="text" name="nama_suami" placeholder="Masukkan Nama Suami" class="form-control">
                            </div>
        
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" placeholder="Masukkan Password" class="form-control" required>
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
</div>
