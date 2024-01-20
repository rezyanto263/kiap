            <!-- Content Start -->
            <div class="col-lg-9 ps-lg-4" style="text-align: justify; cursor: auto;">
            <div class="tab-content p-2 rounded" id="v-pills-tabContent" style="background-color: #F7F7F7;">
                <div class="tab-pane fade show active" id="v-panduan-home" role="tabpanel" aria-labelledby="v-panduan-home-tab" tabindex="0">
                    <img src="<?= base_url('assets/img/banner-welcome-panduan.jpeg') ?>" alt="" class="w-100 rounded mb-3">
                    <h5 class="text-center fw-bold mb-3" style="font-size: 25px; color: #F758AA; font-family: 'Hedvig Letter Serif';">Selamat datang di halaman Panduan Kesehatan Ibu dan Anak kami!</h5>
                    Kami dengan tulus menyambut Anda untuk menjelajahi sumber informasi yang dirancang khusus untuk memberikan panduan seputar kesehatan ibu dan anak. Di sini, kami berkomitmen untuk menyajikan informasi yang relevan, terkini, dan dapat dipercaya guna memberikan dukungan bagi perjalanan kesehatan Anda dan keluarga. Mulai dari perawatan ibu hamil hingga tumbuh kembang anak, temukan artikel, tips, dan saran kesehatan yang akan membantu Anda membuat keputusan yang tepat untuk kebahagiaan dan kesejahteraan keluarga Anda. Selamat membaca dan selalu prioritaskan kesehatan keluarga!
                </div>
                <?php foreach($panduan as $key) : ?>
                <div class="tab-pane fade" id="v-panduan<?= $key['id'] ?>" role="tabpanel" aria-labelledby="v-panduan<?= $key['id'] ?>-tab" tabindex="0">
                    <div>
                        <img src="<?= base_url('image/')?><?= $key['foto'] ?>" alt="" class="w-100 mb-4 rounded" height="400px">  
                    </div>
                    <pre style="white-space:pre-wrap;"><?= $key['isi'] ?></pre>
                </div>
                <?php endforeach; ?>
            </div>
            </div>
            <!-- Content End -->
    
        </div>
    </div> 
    <!-- Main Section End -->
</main>