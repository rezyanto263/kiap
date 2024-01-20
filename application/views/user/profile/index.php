<!-- Main Start -->
<main class="profil-page">
    <div class="container p-3">
        <?= $this->session->flashdata('pesan'); ?>
        <form method="post">
            <div class="row d-flex">
                <div class="col-md-4 mb-3">
                    <div class="card p-4 h-100">
                        <div class="card-body d-flex justify-content-center align-items-center h-100">
                            <div>
                                <h5 class="text-center m-0">Profile</h5>
                                
                                <img src="<?= base_url('image/') ?><?= $ibu['foto']==''?'profile-placeholder.jpg':$ibu['foto'] ?>" class="rounded-circle my-3" width="200px" height="200px" >
                                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card p-4">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input readonly type="text" class="form-control" id="nik" placeholder="NIK" name="nik_ibu" minlength="16" maxlength="16" required value="<?= $ibu['nik_ibu']; ?>">
                            </div>  
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Ibu</label>
                                <input readonly type="text" class="form-control" id="nama" placeholder="Nama" name="nama_ibu" required value="<?= $ibu['nama_ibu']; ?>">
                            </div>   
                            <div class="mb-3">
                                <label for="suami" class="form-label">Nama Suami</label>
                                <input readonly type="text" class="form-control" id="suami" placeholder="-" name="nama_suami" required value="<?= $ibu['nama_suami']; ?>">
                            </div>   
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input readonly type="text" class="form-control" id="tempat_lahir" placeholder="-" name="tempat_lahir" required value="<?= $ibu['tempat_lahir']; ?>">
                                    </div> 
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input readonly type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" required value="<?= $ibu['tgl_lahir']; ?>">
                                    </div> 
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="golongan_darah" class="form-label" >Golongan Darah</label>
                                        <input readonly name="gol_darah" id="golongan_darah" class="form-control" value="<?= $ibu['gol_darah']; ?>">
                                    </div> 
                                </div>
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="agama" class="form-label">Agama</label>
                                        <input readonly name="agama" id="agama" class="form-control" value="<?= $ibu['agama']; ?>">
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
                                <input readonly type="text" class="form-control" id="telepon" placeholder="Telepon" name="no_telp" required value="<?= $ibu['no_telp']; ?>">
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
                                <input readonly name="pendidikan" id="pendidikan" placeholder="-" class="form-control" value="<?= $ibu['pendidikan']; ?>">
                            </div> 
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input readonly type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" required value="<?= $ibu['pekerjaan']; ?>">
                            </div>
                            <div class="row mt-auto" id="btn-bar">
                                <div class="col">
                                    <a href="<?= base_url('profil/edit'); ?>" class="btn btn-warning w-100">Edit</a>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- Main End -->