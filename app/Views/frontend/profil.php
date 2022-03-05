<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
    <div class="container">
        <div class="page-title-content">
            <h2>Profil Desa</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Beranda 
                    </a>
                </li>

                <li class="active">Profil Desa</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Map Area -->
<div class="map-area pb-100">
    <?= $logo['map']; ?>
</div>
<!-- End Map Area -->

<!-- Stat Who We Are Area -->
<section class="who-we-are-area pt-100 pb-70">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="who-we-are-img pr-15">
                    <img src="<?= base_url('public/admin/images/identitas'. $logo['kddesa'] . '/' . $logo['kantor_desa']);?>" alt="Image">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="who-we-are-content pl-15">
                    <span class="top-title">Siapa kami</span>
                    <h2><?= $slider[0]['judul']; ?></h2>

                    <h3>Kepala Desa : <?= $logo['nama_kepala_desa']; ?></h3>
                    <br>
                    <h4>Data Dusun : </h4>
                    <ul>
                        <?php foreach ($dusunList as $dl) : ?>
                            <li><?= $dl['namadusun'] . ' (Kepala Dusun : ' . $dl['kepala_dusun'] . ')' ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Who We Are Area -->

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
		</div>
	</div>
</section>
<!-- End Discover Area -->

<!-- Start City Councilor Area -->
<section class="city-councillor-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <h2>Aparat Pemerintahan</h2>
        </div>
        <?php foreach ($pemerintahan as $p) : ?>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="single-councillor">
                    <img src="<?= base_url('public/frontend/assets/images/user_logo.svg'); ?>" alt="Image">

                    <div class="councillor-content">
                        <h3><?= $p['pamong_nama']; ?></h3>
                        <span><?= $p['jabatan']; ?></span>

                        <ul>
                            <li style="color: #000;font-weight: bold;">
                                NIP : <br>
                                <?= $p['pamong_nip']; ?>
                            </li>
                            <li style="color: #000;font-weight: bold;">
                                NIPD : <br>
                                <?= $p['pamong_nipd']; ?>
                            </li>
                            <li style="color: #000;font-weight: bold;">
                                NIK : <br>
                                <?= $p['pamong_nik']; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- End City Councilor Area -->

<!-- Section Statistik -->

<!-- End section Statistik -->

<?php $this->Endsection(); ?>