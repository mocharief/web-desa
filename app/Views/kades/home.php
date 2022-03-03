<?php $this->extend('layout/templatekades'); ?>
<?php $this->section('isi'); ?>


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard

                        <?= $logo['nama_desa']; ?>

                    </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <!-- end col -->

            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class="mdi mdi-account-multiple avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Penduduk</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?= $penduduk;  ?></span></h3>
                            <p class="m-0">Orang</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class=" mdi mdi-folder-open avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Dusun</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?= $dusun;  ?></span></h3>
                            <p class="m-0">Dusun</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end col -->
            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class=" mdi mdi-camera-wireless avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Kebudayaan</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?= $budaya;  ?></span></h3>
                            <p class="m-0">Kebudayaan</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class=" mdi mdi-file-image avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total Galeri</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?= $galeri;  ?></span></h3>
                            <p class="m-0">Galeri</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class=" mdi mdi-contact-mail avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total KK</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?= $kk;  ?></span></h3>
                            <p class="m-0">KK</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card-box widget-box-two widget-two-custom ">
                    <div class="media">
                        <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                            <i class=" mdi mdi-database-edit avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body">
                            <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Total UMKM</p>
                            <h3 class="font-weight-medium my-2"> <span data-plugin="counterup"><?= $umkm;  ?></span></h3>
                            <p class="m-0">UMKM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end container-fluid -->

</div> <!-- end content -->



<!-- Footer Start -->


<?php $this->Endsection(); ?>