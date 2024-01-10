<div class="col-12 col-md-8 col-lg-6 col-xl-5">
    <div class="card text-black shadow-lg" style="border-radius: 1rem; background-color: #FFFFFF ;">
        <div class="card-body p-5 text-center ">
            <img  class="m-auto p-0 rounded-circle" src="<?= base_url('assets/img/logo.png'); ?>" style="width: 80px; height: 80px; box-shadow: 0px 0px 12px 0px rgba(247, 88, 170, 0.6)" alt="">                
            <!-- Content -->
            <div class="mb-4 mt-4 pb-2">
                <p class="text-black mb-3">Masukkan NIK dan Password anda</p>



                <form action="<?php echo base_url('auth') ?>" method="post">

                    <div class="mb-4 text-start">
                        <input type="text" class="form-control" placeholder="NIK" name="username" value="">
                        <?= form_error('username', '<small class="text-danger pl-5">', '</small>') ?>
                    </div>

                    <div class="mb-4 text-start">
                        <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-5">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn button d-flex justify-content-center align-items-center w-100">Login</button>
                </form>
            </div>

            <div>
                <p class="mb-0">Belum punya akun? <a href="<?php echo base_url('register-ibu') ?>" class="link">Daftar Akun</a></p>
            </div>
            <!-- End Content -->

        </div>
    </div>
</div>
</div>
</div>
</section>
<?= $this->session->flashdata('message') ?>
<?= $this->session->flashdata('register-succes') ?>