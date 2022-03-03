<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-9">
    <div class="container">
        <div class="page-title-content">
            <h2>Kebudayaan</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Beranda 
                    </a>
                </li>

                <li class="active">Kebudayaan</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Events Area -->
<section class="events-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Kebudayaan di Desa <?= $logo['nama_desa']; ?></h3>
        </div>

        <div class="row justify-content-center">
            <?php foreach ($budayaList as $bl) : ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-event-box ">
                    <a href="<?= base_url('/kebudayaan/detail/' . $bl['id_budaya']); ?>">
                        <img src="<?= base_url('public/admin/images/budaya/' . $logo['kddesa'] . '/' . $bl['data']); ?>" alt="Images">
                    </a>

                    <div class="event-content">
                        <ul>
                            <li>
                                <?= $bl['kategori']; ?>
                                <span><?= date("d F Y H:i", strtotime($bl['tgl_posting'])); ?> </span>
                            </li>
                        </ul>
                        <h3>
                            <a href="<?= base_url('/kebudayaan/detail/' . $bl['id_budaya']); ?>">
                                <?= $bl['judul']; ?>
                            </a>
                        </h3>
                        <p><i class="ri-chat-3-line"></i><?= $bl['slug']; ?></p>
                        <a href="<?= base_url('/kebudayaan/detail/' . $bl['id_budaya']); ?>" class="read-more">
                            Baca selengkapnya
                            <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- <div class="col-12">
                <div class="pagination-area">
                    <span class="page-numbers current" aria-current="page">1</span>
                    <a href="#" class="page-numbers">2</a>
                    <a href="#" class="page-numbers">3</a>
                    
                    <a href="#" class="next page-numbers">
                        <i class="ri-arrow-right-line"></i>
                    </a>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!-- End Events Area -->

<?php $this->Endsection(); ?>