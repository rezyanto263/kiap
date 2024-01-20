<!-- Main Section Start -->
<main class="panduan-page">
    <div class="container">
        <div class="row mt-3 mb-5">
    
            <!-- Side Menu Start -->
            <div class="col-lg-3 justify-content-end bg-white">
                <div class="overflow-y-auto panduan-menu sticky-top px-2 pb-3" style="cursor: auto;top: 105px; border-right: 2px solid rgb(248, 117, 170, 0.6);width: 250px;">
                    <h3 class="text-center py-3" style="font-family: 'Hedvig Letter Serif'; font-weight: bold; color: #F875AA;">Menu Panduan</h3>
                    <div class="accordion accordion-flush" id="accordionFlushExample" style="padding-bottom: 100px;">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Ibu
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="nav flex-column nav-pills custom-pills m-0 rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button class="nav-link active" id="v-panduan-home-tab" data-bs-toggle="pill" data-bs-target="#v-panduan-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" hidden>Home</button>
                                            <?php foreach($panduan as $key) : 
                                                if ($key['kategori']=='ibu') {
                                            ?>
                                            <button class="nav-link mb-2 mx-0 text-start btn-sidebar-panduan" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                                                <?= $key['judul'] ?>
                                            </button>
                                            <?php }endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                    Balita
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                <?php foreach($panduan as $key) : 
                                        if ($key['kategori']=='balita') {
                                    ?>
                                    <button class="nav-link mb-2 mx-0 text-start" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                                        <?= $key['judul'] ?>
                                    </button>
                                    <?php }endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Anak - anak
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                <?php foreach($panduan as $key) : 
                                        if ($key['kategori']=='anak') {
                                    ?>
                                    <button class="nav-link mb-2 mx-0 text-start" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                                        <?= $key['judul'] ?>
                                    </button>
                                    <?php }endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Remaja
                                </button>
                            </h2>
                            <div id="flush-collapseFour" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                <?php foreach($panduan as $key) : 
                                        if ($key['kategori']=='remaja') {
                                    ?>
                                    <button class="nav-link mb-2 mx-0 text-start" id="v-panduan<?= $key['id'] ?>-tab" data-bs-toggle="pill" data-bs-target="#v-panduan<?= $key['id'] ?>" type="button" role="tab" aria-controls="v-panduan<?= $key['id'] ?>" aria-selected="false">
                                        <?= $key['judul'] ?>
                                    </button>
                                    <?php }endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side Menu End -->
    