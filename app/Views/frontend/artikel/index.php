<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-15">
    <div class="container">
        <div class="page-title-content">
            <h2>Artikel</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Beranda 
                    </a>
                </li>

                <li class="active">Artikel</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Post Area -->
<section class="blog-post-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php foreach ($artikelList as $al) : ?>
                    <div class="col-lg-12 col-md-6">
                        <div class="single-blog-box">
                            <a href="<?= base_url('/artikel/detail/' . $al['id']); ?>">
                                <img style="width: -webkit-fill-available;" src="<?= base_url('public/admin/images/artikel/' . $logo['kddesa'] . '/' . $al['gambar']); ?>" alt="Images">
                            </a>

                            <div class="blog-content">
                                <ul>
                                    <li>
                                        <a href="<?= base_url('/artikel?kat=' . $al['kategori']); ?>">
                                            <i class="ri-layout-grid-line"></i>
                                            <?= $al['kategori']; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="ri-calendar-line"></i>
                                        <?= date("d F Y H:i", strtotime($al['tgl_upload'])); ?> 
                                    </li>
                                </ul>
                                <h3>
                                    <a href="<?= base_url('/artikel/detail/' . $al['id']); ?>">
                                        <?= $al['judul']; ?>
                                    </a>
                                </h3>
                                <p><?= $al['slug']; ?></p>
                                <a href="<?= base_url('/artikel/detail/' . $al['id']); ?>" class="read-more">
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
                        <h3>Kategori</h3>

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
<!-- End Blog Post Area -->

<?php $this->Endsection(); ?>