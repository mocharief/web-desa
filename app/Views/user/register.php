<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Pengajuan Layanan Mandiri </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('public/admin/images/identitas/sumedang.png'); ?>">


    <!-- App css -->
    <link href="<?= base_url('public/admin/css/bootstrap.min.css '); ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?= base_url('public/admin/css/icons.min.css '); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('public/admin/css/app.min.css '); ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />


</head>

<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        <a href="index.html"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                            <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <img class="rounded-circle" src="<?php echo base_url(' public/admin/images/identitas/sumedang.png'); ?>" width="20%">
                                        <br> <br>
                                    </div>
                                    <center>
                                        <h3 class=" text-uppercase mb-1 mt-2">Selamat Datang</h3>
                                        <h5 class="text-uppercase mb-1 mt-2">Halaman Pengajuan Pelayanan Mandiri </h5>
                                    </center>
                                </div>
                                <form class="form-horizontal" action="<?php echo base_url('/user/login/pengajuan'); ?>" method="post">

                                    <?php if (session()->getFlashdata('msg')) { ?>
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <?php echo session()->getFlashdata('msg') ?>
                                        </div>
                                    <?php } ?>

                                    <div class="account-content mt-4">

                                        <br>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <input class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '';  ?>" type="text" name="nik" placeholder="NIK" autocomplete="">
                                                <div class="invalid-feedback">
                                                    <b><?= $validation->getError('nik'); ?></b>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                                    </div>
                                                    <input class="form-control <?= ($validation->hasError('no_wa')) ? 'is-invalid' : '';  ?>" type="text" id="no_wa" name="no_wa" placeholder="No Wa" maxlength="13" autocomplete="">
                                                    <div class="invalid-feedback">
                                                        <b><?= $validation->getError('no_wa'); ?></b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row text-center mt-2">
                                            <div class="col-12">
                                                <input class="btn btn-md btn-block btn-primary waves-effect waves-light" name="daftar" type="submit" value="Ajukan Permohonan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <h6>Sudah Punya Akun ? <a href="<?php echo base_url('layananmandiri'); ?>"> Ke Halaman Login</a></h6>
                                        </div>
                                    </div>


                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?= base_url('public/admin/js/vendor.min.js'); ?>"></script>
    <script src="<?= base_url('public/admin/js/app.min.js'); ?>"></script>

</body>

</html>