<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-10">
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
                    <a href="<?= base_url('/artikel'); ?>">
                        Artikel 
                    </a>
                </li>

                <li class="active">Detail</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Details Area -->
<section class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <div class="blog-details-img">
                        <img style="width: -webkit-fill-available;" src="<?= base_url('public/admin/images/artikel/' . $logo['kddesa'] . '/' . $artikelDetail['gambar']); ?>" alt="Images">
                    </div>

                    <div class="blog-top-content">
                        <div class="news-content">
                            <ul class="admin">
                                <li>
                                    <a href="<?= base_url('/artikel?kat=' . $artikelDetail['kategori']); ?>">
                                        <i class="ri-layout-grid-line"></i>
                                        <?= $artikelDetail['kategori']; ?>
                                    </a>
                                </li>
                                <li>
                                    <i class="ri-calendar-line"></i>
                                    <?= date("d F Y H:i", strtotime($artikelDetail['tgl_upload'])); ?> 
                                </li>
                            </ul>
                            
                            <h3><?= $artikelDetail['judul']; ?></h3>

                            <?= $artikelDetail['isi']; ?>
                        </div>
                        <div class="row pt-5">
                            <?php if(!empty($artikelDetail['gambar1'])) { ?>
                                <div class="col-md-6 p-3" style="display: flex;">
                                    <img  src="<?= base_url('public/admin/images/artikel/' . $logo['kddesa'] . '/' . $artikelDetail['gambar1']); ?>" alt="Images">
                                </div>
                            <?php }?>

                            <?php if(!empty($artikelDetail['gambar2'])) { ?>
                                <div class="col-md-6 p-3" style="display: flex;">
                                    <img src="<?= base_url('public/admin/images/artikel/' . $logo['kddesa'] . '/' . $artikelDetail['gambar2']); ?>" alt="Images">
                                </div>
                            <?php }?>

                            <?php if(!empty($artikelDetail['gambar3'])) { ?>
                                <div class="col-md-6 p-3" style="display: flex;">
                                    <img style="width: -webkit-fill-available;" src="<?= base_url('public/admin/images/artikel/' . $logo['kddesa'] . '/' . $artikelDetail['gambar2']); ?>" alt="Images">
                                </div>
                            <?php }?>

                            <?php if(!empty($artikelDetail['dokumen'])) { ?>
                                <div class="col-md-12 p-5 text-center">
                                    <a target="_blank" href="<?= base_url('public/admin/images/artikel/dokumen/' . $logo['kddesa'] . '/' . $artikelDetail['dokumen']); ?>">
                                        <h3>
                                            <?php if(empty($artikelDetail['nama_dokumen'])) { ?>
                                                <i class="ri-file-fill"></i> <?= $artikelDetail['dokumen']; ?>
                                            <?php } else { ?> 
                                                <i class="ri-file-fill"></i> <?= $artikelDetail['nama_dokumen']; ?>
                                            <?php } ?>
                                        </h3>
                                    </a>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="widget-sidebar pl-15">
                    <div class="sidebar-widget search">
                        <form class="search-form">
                            <input class="form-control" name="search" placeholder="Search..." type="text">
                            <button class="search-button" type="submit">
                                <i class="ri-search-line"></i>
                            </button>
                        </form>	
                    </div>

                    <div class="sidebar-widget categories">
                        <h3>Categories</h3>

                        <ul>
                            <?php foreach ($katArtikelList as $ka) : ?>
                            <li>
                                <a href="<?= base_url('/artikel?kat=' . $ka['kategori']); ?>">
                                    <?= $ka['kategori']; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Details Area -->

<?php $this->Endsection(); ?>