<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-4">
    <div class="container">
        <div class="page-title-content">
            <h2>Galeri</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Beranda 
                    </a>
                </li>

                <li class="active">Galeri</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Project Area -->
<section class="project-area pb-70 pt-5">
    <div class="container-fluid p-0">
        <div class="section-title">
            <h3>Album</h3>
        </div>

        <div class="project-slider owl-carousel owl-theme">
            <?php foreach ($albumList as $al) : ?>
            <div class="single-project" style="margin: -13px auto 25px;">
                <img src="<?= base_url('public/frontend/assets/images/photo-album.jpg'); ?>" alt="Image">

                <div class="project-content">
                    <a href="<?= base_url('/galeri/' . $al['id_album']); ?>"><?= $al['judul'] ?></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Project Area -->

<!-- Start Gallery Area -->
<div class="gallery-area gallery-popup pt-5 pb-70">
    <div class="container">
        <div class="row">
            <?php if(empty($albumDetail)) {?>
                <?php echo('<div class="col-md-12 text-center"><h4> Silahkan pilih album untuk melihat galeri </h4></div>') ?>
            <?php } else { ?>
                <?php echo '<div class="section-title"><h4>' . $albumDetail['judul'] . '</h4></div>' ?>
                <?php if(empty($galeri)) { ?>
                    <?php echo('<div class="col-md-12 text-center"><h4 style="color:#ff0000;"> Belum ada foto </h4></div>') ?>
                <?php } else { ?>
                    <?php foreach ($galeri as $p) : ?>
                        <?php echo '<div class="col-lg-6 col-md-6 mix business"><div class="gallery-item"><img src="'
                            . base_url('public/admin/images/galeri/' . $p['kddesa'] . '/' . $p['foto']) . '" alt="Image">'
                            . '<div class="gallery-item-content"><a href="'
                            . base_url('public/admin/images/galeri/' . $p['kddesa'] . '/' . $p['foto']) . '">'
                            . $p['judul'] . '</a><span>'
                            . '<span></div></div></div>';
                        ?>
                    <?php endforeach; ?>
                <?php } ?>

            <?php } ?>
        </div>
    </div>
</div>
<!-- End Gallery Area -->

<?php $this->Endsection(); ?>