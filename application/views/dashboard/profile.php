<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="row">
        <div class="col-lg">
            <?= form_open_multipart('dashboard/people/edit') ?>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="username" name="username">
                </div>
            </div>

            <div class="form-group row">
                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="Nama" name="name">
                </div>
            </div>

            <div class="form-group row">
                <label for="Foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets_2/img/undraw_profil/') . $user['image']; ?>" class=" img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <label for="image" class="form-label"></label>
                            <input class="form-control" name="image" type="file" id="image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </div>
    </div>

</div>