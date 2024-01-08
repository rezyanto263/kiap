<!-- Main Start -->
<main class="container p-3">

    <form method="post">
        <div class="row d-flex">
            <div class="col-md-4 mb-3">
                <div class="card p-4 h-100">
                    <div class="card-body d-flex justify-content-center align-items-center h-100">
                        <div>
                            <h5 class="text-center m-0">Profile</h5>
                            
                            <img src="<?= base_url('assets/img/profile.jpeg'); ?>" class="rounded-circle my-3" width="200px" height="200px" >
                                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card p-4">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input readonly type="text" class="form-control" id="nik" placeholder="NIK" name="nik" minlength="16" maxlength="16" required value="">
                        </div>  
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ibu</label>
                            <input readonly type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required value="">
                        </div>   
                        <div class="mb-3">
                            <label for="suami" class="form-label">Nama Suami</label>
                            <input readonly type="text" class="form-control" id="suami" placeholder="Nama Suami" name="suami" required value="">
                        </div>   
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input readonly type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" required value="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input readonly type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" required value="">
                                </div> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="golongan_darah" class="form-label" >Golongan Darah</label>
                                    <input readonly name="golongan_darah" id="golongan_darah" class="form-control" value="">
                                </div> 
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <input readonly name="agama" id="agama" class="form-control" value="">
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
                            <input readonly type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" required value="">
                        </div>  
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" rows="5" required> </textarea>
                        </div>  
                    </div>
                </div>
            </div>
            <div class="col mb-3">
                <div class="card p-4 h-100">
                    <div class="card-body d-flex flex-column"> 
                        <div class="mb-3">
                            <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                            <input readonly name="pendidikan" id="pendidikan" class="form-control" value="">
                        </div> 
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input readonly type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" required value="">
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
</main>
<!-- Main End -->