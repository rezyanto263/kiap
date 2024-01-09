<!-- Main Start -->
<main class="container p-3">

    <form action="<?= base_url('user/profil/edit_profil')?>" method="post">
        <div class="row d-flex">
            <div class="col-md-4 mb-3">
                <div class="card p-4 h-100">
                    <div class="card-body d-flex justify-content-center align-items-center h-100">
                        <div>
                            <h5 class="text-center m-0">Profile</h5>
                            
                            <img src="" class="rounded-circle my-3" width="200px" height="200px" >
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-secondary d-block" data-bs-toggle="modal" data-bs-target="#editPhoto">
                                    Edit Foto
                                </button>   
                            </div>                   
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik_ibu" minlength="16" maxlength="16" required value="<?= $ibu['nik_ibu']; ?>">
                        </div>  
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama_ibu" required value="<?= $ibu['nama_ibu']; ?>">
                        </div>   
                        <div class="mb-3">
                            <label for="suami" class="form-label">Nama Suami</label>
                            <input type="text" class="form-control" id="suami" placeholder="Nama Suami" name="nama_suami" required value="<?= $ibu['nama_suami']; ?>">
                        </div>   
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" required value="<?= ($ibu['tempat_lahir']=='')?'-':$ibu['tempat_lahir']; ?>">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" required value="<?= $ibu['tgl_lahir']; ?>">
                                </div> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="golongan_darah" class="form-label" >Golongan Darah</label>
                                    <select name="gol_darah" id="gol_darah" class="form-select">
                                        <option value="A" <?= ($ibu['gol_darah']=='A')?'selected':'' ?>>A</option>
                                        <option value="AB" <?= ($ibu['gol_darah']=='AB')?'selected':'' ?>>AB</option>
                                        <option value="B" <?= ($ibu['gol_darah']=='B')?'selected':'' ?>>B</option>
                                        <option value="O" <?= ($ibu['gol_darah']=='O')?'selected':'' ?>>O</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" id="agama" class="form-select">
                                        <option value="Islam" <?= ($ibu['agama']=='Islam')?'selected':'' ?>>Islam</option>
                                        <option value="Kristen" <?= ($ibu['agama']=='Kristen')?'selected':'' ?>>Kristen</option>
                                        <option value="Katolik" <?= ($ibu['agama']=='Katolik')?'selected':'' ?>>Katolik</option>
                                        <option value="Buddha" <?= ($ibu['agama']=='Buddha')?'selected':'' ?>>Buddha</option>
                                        <option value="Hindu" <?= ($ibu['agama']=='Hindu')?'selected':'' ?>>Hindu</option>
                                        <option value="Konghuchu" <?= ($ibu['agama']=='Konghuchu')?'selected':'' ?>>Konghuchu</option>
                                    </select>
                                </div> 
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mb-3">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="no_telp" required value="<?= $ibu['no_telp']; ?>">
                        </div>  
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" rows="5" required><?= $ibu['alamat']; ?></textarea>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card p-4 h-100">
                    <div class="card-body d-flex flex-column"> 
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan" id="pendidikan" class="form-select">
                                <option selected hidden disabled>-- Pendidikan Terakhir --</option>
                                <option value="SD"<?= ($ibu['pendidikan']=='SD')?'selected':'' ?>>SD</option>
                                <option value="SMP"<?= ($ibu['pendidikan']=='SMP')?'selected':'' ?>>SMP</option>
                                <option value="SMA/SMK"<?= ($ibu['pendidikan']=='SMA')?'selected':'' ?>>SMA/SMK</option>
                                <option value="D3"<?= ($ibu['pendidikan']=='D3')?'selected':'' ?>>D3</option>
                                <option value="S1"<?= ($ibu['pendidikan']=='S1')?'selected':'' ?>>S1</option>
                                <option value="S2"<?= ($ibu['pendidikan']=='S2')?'selected':'' ?>>S2</option>
                                <option value="S3"<?= ($ibu['pendidikan']=='S3')?'selected':'' ?>>S3</option>
                                <option value="Lainnya"<?= ($ibu['pendidikan']=='Lainnya')?'selected':'' ?>>Lainnya</option>
                            </select>
                        </div> 
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" required value="<?= $ibu['pekerjaan']; ?>">
                        </div>
                        <div class="row mt-auto" id="btn-bar">
                            <div class="col">
                                <a href="<?= base_url('profile'); ?>" class="btn btn-danger w-100">Batal</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100">Simpan</button>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<!-- Main End -->
<!-- Edit Photo Profile Modal Start -->
<div class="modal fade" id="editPhoto" tabindex="-1" aria-labelledby="editPhotoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editPhotoLabel">Edit Foto Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control" type="file" id="formFile" name="foto" accept="image/*">                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Photo Profile Modal End -->