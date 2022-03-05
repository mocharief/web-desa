<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Hero Slider Area -->
<section class="hero-slider-area">
	<div class="hero-slider owl-theme owl-carousel"  data-slider-id="1">
		<?php foreach ($slider as $sl) : ?>
		<div class="hero-slider-item">
			<div class="d-table">
				<div class="d-table-cell">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="hero-slider-content pr-15">
									<span class="top-title">Selamat Datang di Portal Web Desa <?= $logo['nama_desa']; ?></span>
									<h2><?= $sl['judul']; ?></h2>
									<br>
									<div class="slider-btn">
										<a href="<?= base_url('/profil') ?>" class="default-btn">
											Lihat selengkapnya
										</a>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								
								<?php if ($sl['tipe'] == '1') {
										echo "<div class='slider-img pl-15'><img src='" .  base_url('public/admin/images/slider/' . $sl['kddesa'] . '/' . $sl['file']) . "' 	alt='Image'></div>";
									} else {
										echo "<video autoplay loop src='" 
										.  base_url('public/admin/images/slider/' . $sl['kddesa'] . '/' . $sl['file']) 
										. "' width='100%'></video>";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-shape">
				<img src="<?= base_url('public/frontend/assets/images/slider/slider-shape.png'); ?>" alt="Image">
			</div>
		</div>
		<?php endforeach; ?>
	</div>
	
	<!-- Start Carousel Thumbs -->
	<div class="thumbs-wrap">
		<div class="owl-thumbs hero-slider-thumb" data-slider-id="1">
			<?php if(count($slider) > 1){?>
				<?php for ($x = 1; $x <= count($slider); $x++) { ?>
					<div class="owl-thumb-item">
						<span><?= $x; ?></span>
					</div>
				<?php } ?>
			<?php }?>
		</div>
	</div>
	<!-- End Carousel Thumbs -->
</section>
<!-- End Hero Slide Area -->

<!-- Start Services Area -->
<section class="services-area pt-100 pb-70">
	<div class="container">
		<div class="section-title">
			<h2>Pelayanan Kami</h2>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6">
				<div class="single-services-box">
					<span class="flaticon-group"></span>

					<h3>
						<a href="services-details.html">
							Pelayanan Mandiri
						</a>
					</h3>

					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, repudiandae magni iure debitis fuga est quis non beatae expedita in consectetur, molestias corrupti, sunt eveniet.</p>

					<div class="services-shape">
						<img src="<?= base_url('public/frontend/assets/images/services-shape.png'); ?>" alt="Image">
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single-services-box">
					<span class="flaticon-buildings"></span>

					<h3>
						<a href="services-details.html">
							Pelayanan Umum
						</a>
					</h3>

					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, repudiandae magni iure debitis fuga est quis non beatae expedita in consectetur, molestias corrupti, sunt eveniet.</p>

					<div class="services-shape">
						<img src="<?= base_url('public/frontend/assets/images/services-shape.png'); ?>" alt="Image">
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single-services-box">
					<span class="flaticon-government"></span>

					<h3>
						<a href="services-details.html">
							Pemantauan Covid-19
						</a>
					</h3>

					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, repudiandae magni iure debitis fuga est quis non beatae expedita in consectetur, molestias corrupti, sunt eveniet.</p>

					<div class="services-shape">
						<img src="<?= base_url('public/frontend/assets/images/services-shape.png'); ?>" alt="Image">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Services Area -->

<!-- Start Discover Area -->
<section class="discover-area discover-area-style-two pb-100">
	<div class="container">
		<div class="discover-bg pt-100">
			<div class="counter-bg">
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="single-counter">
							<div class="count-title">
								<h2>
									<span class="odometer" data-count="<?= $penduduk; ?>">00</span> 
								</h2>
								<h4>Jumlah Penduduk</h4>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6">
						<div class="single-counter">
							<div class="count-title">
								<h2>
									<span class="odometer" data-count="<?= $dusun; ?>">00</span> 
								</h2>
								<h4>Total Dusun</h4>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6">
						<div class="single-counter">
							<div class="count-title">
								<h2>
									<span class="odometer" data-count="<?= $budaya; ?>">00</span> 
								</h2>
								<h4>Total Kebudayaan</h4>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-sm-6">
						<div class="single-counter">
							<div class="count-title">
								<h2>
									<span class="odometer" data-count="<?= $umkm; ?>">00</span> 
								</h2>
								<h4>Total UMKM</h4>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="section-title green-title">
				<h2>Ayo kunjungi desa kami</h2>
				<p><?= $slider[0]['judul']; ?></p>
			</div>

			<div class="row">
				<div class="col-lg-6 pr-0">
					<div class="discover-content">
						<h2><?= $budayaList[0]['judul'];?></h2>
						<?= $budayaList[0]['isi'];?>
					</div>
				</div>

				<div class="col-lg-6 pl-0">
					<img style="width: -webkit-fill-available;" src="<?= base_url('public/admin/images/budaya/' . $logo['kddesa'] . '/' . $budayaList[0]['data']); ?>" alt="Images">	
				</div>
			</div>

			<div class="shape discover-shape-1">
				<img src="<?= base_url('public/frontend/assets/images/discover-shape-1.png'); ?>" alt="Image">
			</div>

			<div class="shape discover-shape-2">
				<img src="<?= base_url('public/frontend/assets/images/discover-shape-2.png'); ?>" alt="Image">
			</div>
		</div>
	</div>
</section>
<!-- End Discover Area -->

<!-- Start Project Area -->
<section class="project-area bg-color pt-100 pb-70">
	<div class="container-fluid p-0">
		<div class="section-title">
			<h2>Album</h2>
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

<!-- Start Events Area -->
<section class="events-area pt-100 pb-70">
	<div class="container">
		<div class="section-title">
			<h2>Kebudayaan</h2>
		</div>

		<div class="row justify-content-center">
			<?php $i = 0 ?>
			<?php foreach ($budayaList as $bl) : ?>
			<?php if($i < 6) { ?>
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
			<?php }
			$i++; ?>
            <?php endforeach; ?>
		</div>
	</div>
</section>
<!-- End Events Area -->

<!-- Start Blog Area -->
<section class="blog-area bg-color pt-100 pb-70">
	<div class="container">
		<div class="section-title">
			<h2>Artikel</h2>
		</div>

		<div class="row justify-content-center">
			<?php $i = 0 ?>
			<?php foreach ($artikelList as $al) : ?>
			<?php if($i < 6) { ?>
			<div class="col-lg-4 col-md-6">
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
			<?php }
			$i++; ?>
			<?php endforeach; ?>
		</div>
	</div>

	<div class="shape blog-shape-1">
		<img src="<?= base_url('public/frontend/assets/images/blog/blog-shape-1.png'); ?>" alt="Image">
	</div>

	<div class="shape blog-shape-2">
		<img src="<?= base_url('public/frontend/assets/images/blog/blog-shape-2.png'); ?>" alt="Image">
	</div>
</section>
<!-- End Blog Area -->

<!-- Start Counter Are Area -->
<section class="counter-area pb-5">
	<div class="container">
		<div class="section-title">
			<h2>Data Kasus Covid-19</h2>
		</div>

		<div class="counter-bg">
			<div class="row">
				<div class="col-lg-4 col-sm-6">
					<div class="single-counter">
						<div class="count-title">
							<h2>
								<span class="odometer" data-count="<?=count(array_filter($pendataan, function($pd) { return $pd['status_covid'] == 1; }));?>">00</span> 
							</h2>
							<h4>Orang Dalam Pemantauan (ODP)</h4>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="single-counter">
						<div class="count-title">
							<h2>
								<span class="odometer" data-count="<?=count(array_filter($pendataan, function($pd) { return $pd['status_covid'] == 2; }));?>">00</span> 
							</h2>
							<h4>Pasien dalam Pengawasan (PDP)</h4>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="single-counter">
						<div class="count-title">
							<h2>
								<span class="odometer" data-count="<?=count(array_filter($pendataan, function($pd) { return $pd['status_covid'] == 3; }));?>">00</span> 
							</h2>
							<h4>Orang dalam Resiko (ODR)</h4>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="single-counter">
						<div class="count-title">
							<h2>
								<span class="odometer" data-count="<?=count(array_filter($pendataan, function($pd) { return $pd['status_covid'] == 4; }));?>">00</span> 
							</h2>
							<h4>Orang tanpa Gejala (OTG)</h4>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="single-counter">
						<div class="count-title">
							<h2>
								<span class="odometer" data-count="<?=count(array_filter($pendataan, function($pd) { return $pd['status_covid'] == 5; }));?>">00</span> 
							</h2>
							<h4>Positif Covid-19</h4>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="single-counter">
						<div class="count-title">
							<h2>
								<span class="odometer" data-count="<?=count(array_filter($pendataan, function($pd) { return $pd['status_covid'] == 6; }));?>">00</span> 
							</h2>
							<h4>Lainnya</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Counter Area -->

<?php $this->Endsection(); ?>