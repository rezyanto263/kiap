                <div class="mb-4 mt-4 pb-2">
                    <div class="mb-5">
                        <h2 class="font_hedvig fw-bold mb-2 text-uppercase">Daftar Akun</h2>
                    </div>
                    <!-- <p class="text-black mb-5">Masukkan NIK </p> -->
                    <form action="<?php echo base_url('register-ibu') ?>" method="post">

                        <div class="mb-4 text-start">
                            <input type="text" id="nama" class="form-control" placeholder="Nama Ibu" name="nama" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class="text-danger" pl-5>', '</small>') ?>
                        </div>

                        <div class="mb-4 text-start">
                            <input type="text" class="form-control" placeholder="NIK" name="nik" value="<?= set_value('nik_ibu') ?>" onkeypress="return isNumberKey(event)">
                            <?= form_error('nik', '<small class="text-danger pl-5">', '</small>') ?>
                        </div>

                        <div class="mb-4 text-start">
                            <input type="text" class="form-control" name="tgl_lahir" onfocus="(this.type='date')" onblur="if (this.value==''){this.type='text'}" placeholder="Tanggal Lahir" value="<?= set_value('tgl_lahir') ?>">
                            <?= form_error('tgl_lahir', '<small class="text-danger pl-5">', '</small>') ?>
                        </div>
                        
                        <div class="mb-4 text-start">
                            <select class="form-select active" name="gol_darah" id="gol_darah" value="<?= set_value('gol_darah'); ?>" style="border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                                <option disabled selected style="display: none;">Pilih Golongan Darah</option>
                                <option value="A">A</option>
                                <option value="AB">AB</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                            </select>
                            <?= form_error('gol_darah', '<small class="text-danger pl-5">', '</small>') ?>
                        </div>
                        
                        <div class="mb-4 text-start custom-input">
                            <input type="numeric" id="no_telp" class="form-control" placeholder="No. Handphone" name="no_telp" value="<?= set_value('no_telp')?>" onkeypress="return isNumberKey(event)">
                            <?= form_error('no_telp', '<small class="text-danger pl-5">', '</small>') ?>
                        </div>
                        
                        <div class="mb-4 text-start custom-input">
                            <select class="form-select active" name="agama" id="agama" value="<?= set_value('agama'); ?>" style="border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                                <option disabled selected style="display: none;">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Konghuchu">Konghuchu</option>
                            </select>
                            <?= form_error('agama', '<small class="text-danger pl-5">', '</small>') ?>
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

                        <div class="mb-4 custom-ig text-start">
                            <div class="input-group">
                                <input type="numeric" id="no_telp" class="form-control" placeholder="No. Handphone" name="no_telp" value="<?= set_value('no_telp')?>" onkeypress="return isNumberKey(event)">
                                <select class="form-select" name="agama" id="agama" value="<?= set_value('agama'); ?>" style="border-top-right-radius: 0.375rem; border-bottom-right-radius: 0.375rem;">
                                    <option disabled selected style="display: none;">Pilih Agama</option>
                                    <option value="islam">Islam</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="konghuchu">Konghuchu</option>
                                </select>
                            </div>
                            <div class="d-flex justify-content-between p-0">
                                <p class="m-0 p-0"><?= form_error('no_telp', '<small class="text-danger pl-5">', '</small>') ?></p>
                                <p class="m-0 p-0"><?= form_error('agama', '<small class="text-danger pl-5">', '</small>') ?></p>
                            </div>
                        </div>
                        
                        <div class="mb-4 text-start">
                            <input type="text" id="alamat" class="form-control" placeholder="Alamat" name="alamat" value="<?= set_value('alamat') ?>">
                            <?= form_error('alamat', '<small class="text-danger" pl-5>', '</small>') ?>
                        </div>

                        <div class="mb-4 text-start">
                            <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                            <?= form_error('password', '<small class="text-danger pl-5">', '</small>') ?>
                        </div>
                        
                        <button type="submit" class="btn button">Daftar</button>
                </div>

                <div>
                    <p class="mb-0">Sudah punya akun? <a href="<?php echo base_url('auth') ?>" class="link">Masuk</a>
                    </p>
                </div>
                </form>

                </div>
                </div>
                </div>
                </div>
                </div>
                </section>