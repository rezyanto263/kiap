<!-- Main Start -->
<main class="container p-3">

    <form method="post">
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
                            <input type="text" class="form-control" id="nik" placeholder="NIK" name="nik" minlength="16" maxlength="16" required value="">
                        </div>  
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required value="">
                        </div>   
                        <div class="mb-3">
                            <label for="suami" class="form-label">Nama Suami</label>
                            <input type="text" class="form-control" id="suami" placeholder="Nama Suami" name="suami" required value="">
                        </div>   
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat Lahir" name="tempat_lahir" required value="">
                                </div> 
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" required value="">
                                </div> 
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="golongan_darah" class="form-label" >Golongan Darah</label>
                                    <select name="golongan_darah" id="golongan_darah" class="form-select">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select name="agama" id="agama" class="form-select">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghuchu">Konghuchu</option>
                                        <option value="Lainnya">Lainnya</option>
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
                            <input type="text" class="form-control" id="telepon" placeholder="Telepon" name="telepon" required value="">
                        </div>  
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" rows="5" required></textarea>
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
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div> 
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" placeholder="Pekerjaan" name="pekerjaan" required value="">
                        </div>
                        <div class="row mt-auto" id="btn-bar">
                            <div class="col">
                                <a href="?module=index" class="btn btn-danger w-100">Batal</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary w-100" name="update_profil" value="1">Simpan</button>
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
                    <button type="submit" class="btn btn-primary" name="update_foto" value="1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Photo Profile Modal End -->