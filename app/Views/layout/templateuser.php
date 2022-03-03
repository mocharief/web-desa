<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Layanan Mandiri Desa <?= $logo['nama_desa']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <?php if ($logo['logo'] == '') {
    ?>
        <link rel="shortcut icon" href="<?= base_url('public/admin/images/identitas/sumedang.png'); ?>">
    <?php } else {

    ?>
        <link rel="shortcut icon" href="<?= base_url('public/admin/images/identitas/' . $logo['logo']); ?>">
    <?php } ?>


    <link href="<?= base_url('public/admin/libs/lightbox2/lightbox.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- C3 Chart css -->
    <link href="<?= base_url('public/admin/libs/c3/c3.min.css'); ?>" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="<?= base_url('public/admin/css/bootstrap.min.css '); ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?= base_url('public/admin/css/icons.min.css '); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/admin/css/app.min.css '); ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />

</head>

<body data-layout="horizontal">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Navigation Bar-->
        <header id="topnav">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">
                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link  waves-effect waves-light" href="<?= base_url('surat'); ?>" role="button">
                                <i class="dripicons-download noti-icon"></i>
                                <span class="badge badge-pink rounded-circle noti-icon-badge"><?= $permohonan; ?></span>
                            </a>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link waves-effect waves-light" href="<?= base_url('pesanuser'); ?>" role="button">
                                <i class="dripicons-mail noti-icon"></i>
                                <span class="badge badge-pink rounded-circle noti-icon-badge"><?= $pesanmasuk; ?></span>
                            </a>
                        </li>
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                    <?= $user['nama']; ?><i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->

                                <!-- item-->
                                <a href="<?php echo base_url('/userkeluar'); ?>" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Keluar</span>
                                </a>

                            </div>
                        </li>




                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">

                        <a href="index.html" class="logo text-center logo-dark">
                            <span class="logo-lg">
                                <?php if ($logo['logo'] == '') {
                                    echo "<img  src='" .  base_url('public/admin/images/identitas/sumedang.png') . "' width='40px'><br> <br>";
                                } else {
                                    echo "<img  src='" .  base_url('public/admin/images/identitas/' . $logo['logo']) . "' width='40px'><br> <br> ";
                                } ?>
                            </span>

                        </a>


                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>

            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li>
                                <a href="<?= base_url('user'); ?>">
                                    <i class="fas fa-user"></i>
                                    <span> Profil </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('surat'); ?>">
                                    <i class="mdi mdi-file-word-box"></i>
                                    <span> Surat </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('pesanuser'); ?>">
                                    <i class="fas fa-envelope"></i>
                                    <span> Pesan </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('dokumenuser'); ?>">
                                    <i class="fas fa-database"></i>
                                    <span> Dokumen </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('programbantuan'); ?>">
                                    <i class="fas fa-hands-helping"></i>
                                    <span> Bantuan </span>
                                </a>
                            </li>

                        </ul>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <br>
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6">
                            <a href="<?= base_url('user'); ?>">
                                <div class="card-box widget-user">
                                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                        <i class="fas fa-user avatar-title font-30 text-white"></i>
                                    </div>
                                    <div class="wid-u-info">
                                        <h5 class="mt-3 mb-1"> Profil Penduduk</h5>
                                        <div class="user-position">
                                            <span class="text-info font-secondary">User</span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <a href="<?= base_url('surat'); ?>">
                                <div class="card-box widget-user">
                                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                        <i class="mdi mdi-file-word-box avatar-title font-30 text-white"></i>
                                    </div>
                                    <div class="wid-u-info">
                                        <h5 class="mt-3 mb-1"> Layanan Surat</h5>
                                        <div class="user-position">
                                            <span class="text-info font-secondary">Surat</span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <a href="<?= base_url('pesanuser'); ?>">
                                <div class="card-box widget-user">
                                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                        <i class="fas fa-envelope avatar-title font-30 text-white"></i>
                                    </div>
                                    <div class="wid-u-info">
                                        <h5 class="mt-3 mb-1">Pesan</h5>
                                        <div class="user-position">
                                            <span class="text-info font-secondary">Pesan</span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <div class="col-xl-3 col-sm-6">
                            <a href="<?= base_url('programbantuan'); ?>">
                                <div class="card-box widget-user">
                                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                                        <i class="fas fa-hands-helping avatar-title font-30 text-white"></i>
                                    </div>
                                    <div class="wid-u-info">
                                        <h5 class="mt-3 mb-1">Program Bantuan</h5>
                                        <div class="user-position">
                                            <span class="text-info font-secondary">Bantuan</span>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        </div>


                    </div>
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Menu Halaman User</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card-box">
                                <center>
                                    <img src="<?php echo base_url('public/admin/images/penduduk/penduduk.png') ?>" width="100%" />
                                </center>

                                <br><br>
                                <a href="<?php echo base_url('/gantipin'); ?>">
                                    <button type="button" class="btn btn-dark  waves-effect waves-light" style="width: 100%; text-align: left;">
                                        <i class="fas fa-key"></i> &nbsp; Ganti Pin
                                    </button>
                                </a>
                                <br><br>
                                <a href="<?php echo base_url('/userkeluar'); ?>">
                                    <button type="button" class="btn btn-danger  waves-effect waves-light" style="width: 100%; text-align: left;">
                                        <i class="mdi mdi-logout"></i> &nbsp; Keluar
                                    </button>
                                </a>
                            </div>
                        </div>

                        <?php $this->rendersection('isi'); ?>

                    </div>
                    <!-- END wrapper -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    2017 - 2019 &copy; Adminox theme by <a href="#">Coderthemes</a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>
                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>


                <!-- Vendor js -->
                <script src="<?= base_url('public/admin/js/vendor.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/js/app.min.js'); ?>"></script>



                <script src="<?= base_url('public/admin/js/pages/dashboard.init.js'); ?>"></script>

                <!--datatables-->
                <script src="<?= base_url('public/admin/libs/datatables/jquery.dataTables.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/dataTables.buttons.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/buttons.bootstrap4.min.js'); ?>"></script>

                <script src="<?= base_url('public/admin/libs/datatables/buttons.html5.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/buttons.print.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/buttons.colVis.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/dataTables.responsive.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/datatables/responsive.bootstrap4.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/js/pages/datatables.init.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/select2/select2.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/js/pages/form-advanced.init.js'); ?>"></script>
                <!-- App js -->

                <script src="<?= base_url('public/admin/ckeditor/ckeditor.js'); ?>"></script>
                <script>
                    CKEDITOR.replace('ckeditor', {
                        height: 460
                    });
                </script>

                <script>
                    $(function() {
                        $("#example").DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,

                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

                    });
                </script>
                <script src="<?= base_url('public/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/bootstrap-timepicker/bootstrap-timepicker.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/clockpicker/bootstrap-clockpicker.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.js'); ?>"></script>
                <script src="<?= base_url('public/admin/libs/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

                <!-- Init js-->
                <script src="<?= base_url('public/admin/js/pages/form-pickers.init.js'); ?>"></script>

                <script>
                    var dt = new Date();
                    document.getElementById("tanggalwaktu").innerHTML = (("0" + dt.getDate()).slice(-2)) + "-" + (("0" + (dt.getMonth() + 1)).slice(-2)) + "-" + (dt.getFullYear());
                </script>
                <script>
                    var dt = new Date();
                    document.getElementById("tanggal").innerHTML = (("0" + dt.getDate()).slice(-2)) + "-" + (("0" + (dt.getMonth() + 1)).slice(-2)) + "-" + (dt.getFullYear());
                </script>
                <script src="<?= base_url('public/admin/libs/lightbox2/lightbox.min.js'); ?>"></script>
</body>

</html>