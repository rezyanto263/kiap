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

        <button type="submit" class="btn button">Login</button>
</div>

<div>
    <p class="mb-0">Belum punya akun? <a href="<?php echo base_url('register-ibu') ?>" class="link">Daftar Akun</a></p>
</div>
</form>
<!-- End Content -->

</div>
</div>
</div>
</div>
</div>
</section>
<?= $this->session->flashdata('message') ?>
<?= $this->session->flashdata('register-succes') ?>