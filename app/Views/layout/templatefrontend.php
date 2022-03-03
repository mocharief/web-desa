<!doctype html>
<html lang="zxx">
    
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/bootstrap.min.css'); ?>">
		<!-- Owl Theme Default Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/owl.theme.default.min.css'); ?>">
		<!-- Owl Carousel Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/owl.carousel.min.css'); ?>">
		<!-- Remixicon CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/remixicon.css'); ?>">
		<!-- Flaticon CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/flaticon.css'); ?>">
		<!-- Meanmenu Min CSS -->
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/meanmenu.min.css'); ?>">
		<!-- Animate Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/animate.min.css'); ?>">
		<!-- Magnific Popup Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/magnific-popup.min.css'); ?>">
		<!-- Odometer Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/odometer.min.css'); ?>">
		<!-- Date Picker Min CSS --> 
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/date-picker.min.css'); ?>">
		<!-- Style CSS -->
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/style.css'); ?>">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="<?= base_url('public/frontend/assets/css/responsive.css'); ?>">
		
		<!-- Favicon -->
        <?php if ($logo['logo'] == '') {
        ?>
            <link rel="icon" type="image/png" href="<?= base_url('public/admin/images/identitas/sumedang.png'); ?>">
        <?php } else {
        ?>
            <link rel="icon" type="image/png" href="<?= base_url('public/admin/images/identitas/' . $logo['logo']); ?>">
        <?php } ?>
		<!-- Title -->
		<title>Desa <?= $logo['nama_desa'] ?></title>
    </head>

    <body>
		<!-- Start Preloader Area -->
		<div class="preloader">
			<div class="lds-ripple">
				<div class="pl-spark-1 pl-spark-2"></div>
			</div>
		</div>
		<!-- End Preloader Area -->
		
		<!-- Start Header Area -->
		<header class="header-area">
			<!-- Start Top Header -->
			<div class="top-header">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-12 col-md-12">
                            <marquee style="color: #ffffff;">
                                INI TEXT BERJALAN
                            </marquee>
                        </div>
					</div>
				</div>
			</div>
			<!-- Start Top Header -->
			
			<!-- Start Navbar Area -->
			<div class="navbar-area">
                <div class="mobile-responsive-nav">
                    <div class="container">
                        <div class="mobile-responsive-menu">
                            <div class="logo">
                                <a href="<?= base_url(); ?>">
                                    <?php if ($logo['logo'] == null) {
                                    ?>
                                        <img style="height: 60px; margin-left: 20px;" src="<?= base_url('public/admin/images/identitas/sumedang.png'); ?>" alt="logo">
                                    <?php } else {
                                    ?>
                                        <img style="height: 60px; margin-left: 20px;" src="<?= base_url('public/admin/images/identitas/' . $logo['logo']); ?>" alt="logo">
                                    <?php } ?>
								</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="desktop-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand" href="<?= base_url(); ?>">
                                <?php if ($logo['logo'] == '') {
                                ?>
                                    <img style="height: 60px; margin-left: 20px;" src="<?= base_url('public/admin/images/identitas/sumedang.png'); ?>" alt="logo">
                                <?php } else {
                                ?>
                                    <img style="height: 60px; margin-left: 20px;" src="<?= base_url('public/admin/images/identitas/' . $logo['logo']); ?>" alt="logo">
                                <?php } ?>
                            </a>

                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item <?= ($activemenu == 'beranda') ? 'active' : '' ?>">
										<a href="<?= base_url(); ?>" class="nav-link">Beranda</a>
									</li>
                                    <li class="nav-item <?= ($activemenu == 'profil') ? 'active' : '' ?>">
										<a href="<?= base_url('/profil'); ?>" class="nav-link">Profil Desa</a>
									</li>
                                    <li class="nav-item <?= ($activemenu == 'galeri') ? 'active' : '' ?>">
										<a href="<?= base_url('/galeri/0'); ?>" class="nav-link">Galeri</a>
									</li>
                                    <li class="nav-item <?= ($activemenu == 'kebudayaan') ? 'active' : '' ?>">
										<a href="<?= base_url('/kebudayaan'); ?>" class="nav-link">Kebudayaan</a>
									</li>
                                    <li class="nav-item <?= ($activemenu == 'artikel') ? 'active' : '' ?>">
										<a href="<?= base_url('/artikel'); ?>" class="nav-link">Artikel</a>
									</li>
                                </ul>

                                <div class="others-options">
									<ul>
										<li>
											<div class="option-item">
												<i class="search-btn ri-search-line"></i>
												<i class="close-btn ri-close-line"></i>
												
												<div class="search-overlay search-popup">
													<div class='search-box'>
														<form class="search-form">
															<input class="search-input" name="search" placeholder="Pencarian" type="text">
			
															<button class="search-button" type="submit">
																<i class="ri-search-line"></i>
															</button>
														</form>
													</div>
												</div>
											</div>
										</li>
										<li>
											<a href="#" class="call">
												<i class="ri-phone-fill"></i>
												<?= $logo['telepon']; ?>
											</a>
										</li>
									</ul>
                                </div>
                            </div>
                        </nav>
                    </div>
				</div>
				
				<div class="others-option-for-responsive">
					<div class="container">
						<div class="dot-menu">
							<div class="inner">
								<div class="circle circle-one"></div>
								<div class="circle circle-two"></div>
								<div class="circle circle-three"></div>
							</div>
						</div>
						
						<div class="container">
							<div class="option-inner">
								<div class="others-option justify-content-center d-flex align-items-center">
									<ul>
										<li>
											<div class="option-item">
												<i class="search-btn ri-search-line"></i>
												<i class="close-btn ri-close-line"></i>
												
												<div class="search-overlay search-popup">
													<div class='search-box'>
														<form class="search-form">
															<input class="search-input" name="search" placeholder="Pencarian" type="text">
			
															<button class="search-button" type="submit">
																<i class="ri-search-line"></i>
															</button>
														</form>
													</div>
												</div>
											</div>
										</li>
										<li>
                                            <a href="#" class="call">
												<i class="ri-phone-fill"></i>
												<?= $logo['telepon']; ?>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
			<!-- End Navbar Area -->
		</header>
		<!-- End Header Area -->

        <?php $this->rendersection('isi'); ?>

		<!-- Start Footer Area -->
		<footer class="footer-area pt-100 pb-70">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="single-footer-widget single-bg">
                            <a href="<?= base_url(); ?>" class="logo">
                                <?php if ($logo['logo'] == '') {
                                ?>
                                    <img style="width: 10%;" src="<?= base_url('public/admin/images/identitas/sumedang.png'); ?>" alt="Image">
                                <?php } else {
                                ?>
                                    <img style="width: 10%;" src="<?= base_url('public/admin/images/identitas/' . $logo['logo']); ?>" alt="Image">
                                <?php } ?>
                            </a>

							<p><?= 'Desa ' . $logo['nama_desa'] . ', Kecamatan ' . $logo['nama_kecamatan'] . ', Kabupaten ' . $logo['nama_kabupaten'] . ', ' . $logo['nama_propinsi'] . ' ' . $logo['kode_pos'];?></p> 

							<ul class="social-icon">
								<li>
									<a href="https://www.facebook.com/" target="_blank">
										<i class="ri-facebook-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://www.instagram.com/" target="_blank">
										<i class="ri-instagram-line"></i>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/" target="_blank">
										<i class="ri-twitter-fill"></i>
									</a>
								</li>
								<li>
									<a href="https://twitter.com/" target="_blank">
										<i class="ri-linkedin-box-fill"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<div class="single-footer-widget">
							<h3>Hubungi kami</h3>

							<ul class="address">
								<li>
									<i class="ri-map-pin-fill"></i>
									<?= $logo['alamat_kantor']; ?>
								</li>
								<li>
									<i class="ri-mail-open-fill"></i>
									<a href="#"><span class="__cf_email__" data-cfemail=""><?= $logo['email_desa']; ?></span></a>
								</li>
                                <li>
									<i class="ri-global-fill"></i>
									<?= $logo['website']; ?>
								</li>
								<li class="location">
									<i class="ri-phone-fill"></i>
									<a href="#"><?= $logo['telepon']; ?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="shape footer-shape-1">
				<img src="<?= base_url('public/frontend/assets/images/footer-shape-1.png'); ?>" alt="Image">
			</div>

			<div class="shape footer-shape-2">
				<img src="<?= base_url('public/frontend/assets/images/footer-shape-2.png'); ?>" alt="Image">
			</div>
		</footer>
		<!-- End Footer Area -->

		<!-- Start Copy Right Area -->
		<div class="copy-right-area">
			<div class="container">
				<p>
					Copyright <i class="ri-copyright-line"></i>2022 Digitech.
				</p>
			</div>
		</div>
		<!-- End Copy Right Area -->
		
		<!-- Start Go Top Area -->
		<div class="go-top">
			<i class="ri-arrow-up-s-fill"></i>
			<i class="ri-arrow-up-s-fill"></i>
		</div>
		<!-- End Go Top Area -->
		

        <!-- Jquery Min JS -->
        <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
        <script src="<?= base_url('public/frontend/assets/js/jquery.min.js'); ?>"></script> 
        <!-- Bootstrap Bundle Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/bootstrap.bundle.min.js'); ?>"></script>
        <!-- Meanmenu Min JS -->
		<script src="<?= base_url('public/frontend/assets/js/meanmenu.min.js'); ?>"></script>
		<!-- Owl Carousel Min JS -->
		<script src="<?= base_url('public/frontend/assets/js/owl.carousel.min.js'); ?>"></script>
		<!-- Owl Carousel Thumbs Min JS -->
		<script src="<?= base_url('public/frontend/assets/js/carousel-thumbs.min.js'); ?>"></script>
		<!-- Wow Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/wow.min.js'); ?>"></script>
		<!-- Magnific Popup Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/magnific-popup.min.js'); ?>"></script>
		<!-- Appear Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/appear.min.js'); ?>"></script>
		<!-- Odometer Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/odometer.min.js'); ?>"></script>
		<!-- Mixitup Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/mixitup.min.js'); ?>"></script>
		<!-- Bootstrap Datepicker Min JS -->
        <script src="<?= base_url('public/frontend/assets/js/bootstrap-datepicker.min.js'); ?>"></script>
		<!-- Form Validator Min JS -->
		<script src="<?= base_url('public/frontend/assets/js/form-validator.min.js'); ?>"></script>
		<!-- Contact JS -->
		<script src="<?= base_url('public/frontend/assets/js/contact-form-script.js'); ?>"></script>
		<!-- Ajaxchimp Min JS -->
		<script src="<?= base_url('public/frontend/assets/js/ajaxchimp.min.js'); ?>"></script>
        <!-- Custom JS -->
		<script src="<?= base_url('public/frontend/assets/js/custom.js'); ?>"></script>
    </body>
</html>