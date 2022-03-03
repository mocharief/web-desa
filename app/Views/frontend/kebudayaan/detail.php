<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-9">
    <div class="container">
        <div class="page-title-content">
            <h2>Detail</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Beranda 
                    </a>
                </li>

                <li>
                    <a href="<?= base_url('/kebudayaan'); ?>">
                        Kebudayaan 
                    </a>
                </li>

                <li class="active">Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Event Details Area -->
<section class="event-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="event-content event-content-two">
                    <div class="event-date">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-annual">
                                    <h4>Kategori:</h4>
                                    <span><?= $budayaDetail['kategori']; ?></span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="single-annual">
                                    <h4>Tanggal Posting:</h4>
                                    <span><?= date("d F Y H:i", strtotime($budayaDetail['tgl_posting'])); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <img style="width: -webkit-fill-available;" src="<?= base_url('public/admin/images/budaya/' . $logo['kddesa'] . '/' . $budayaDetail['data']); ?>" alt="Image">
                </div>

                <div class="event-content one">
                    <h3><?= $budayaDetail['judul']; ?></h3>
                </div>

                <div class="event-content event-content-three">
                    <?= $budayaDetail['isi']; ?>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="event-widget-sidebar">
                    <div class="our-another-slider owl-theme owl-carousel">
                        <?php foreach ($budayaList as $bl) : ?>
                        <div class="single-another">
                            <h3>Kebudayaan lainnya</h3>

                            <div class="single-event-box another-content">
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
                                    <h4>
                                        <a href="<?= base_url('/kebudayaan/detail/' . $bl['id_budaya']); ?>">
                                            <?= $bl['judul']; ?>
                                        </a>
                                    </h4>
                                    <p><i class="ri-chat-3-line"></i><?= $bl['slug']; ?></p>
                                    <a href="<?= base_url('/kebudayaan/detail/' . $bl['id_budaya']); ?>" class="read-more">
                                        Baca selengkapnya
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Event Details Area -->

<?php $this->Endsection(); ?>