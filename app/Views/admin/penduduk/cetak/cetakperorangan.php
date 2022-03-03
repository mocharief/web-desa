<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Halaman Admin Desa <?= $logo['nama_desa']; ?></title>
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


  <link href="<?= base_url('public/admin/libs/datatables/dataTables.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/admin/libs/datatables/buttons.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/admin/libs/datatables/responsive.bootstrap4.css'); ?>" rel="stylesheet" type="text/css" />


  <!-- App css -->
  <link href="<?= base_url('public/admin/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
  <link href="<?= base_url('public/admin/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/admin/css/app.min.css'); ?>" rel="stylesheet" type="text/css" id="app-stylesheet" />
  <link href="<?= base_url('public/admin/libs/select2/select2.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/admin/libs/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet" type="text/css" />

  <link href="<?= base_url('public/admin/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/admin/libs/clockpicker/bootstrap-clockpicker.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('public/admin/libs/bootstrap-timepicker/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/admin/libs/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('public/admin/libs/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet" type="text/css" />


</head>

<body>
  <!-- Right Sidebar -->


  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">

            <h4 class="page-title">Biodata Penduduk</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->



      <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
          <div class="card-box table-responsive">
            <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" onclick="printDiv('printMe')">
              <i class="fas fa-download"></i> &nbsp; Cetak
            </button>
            <br> <br>
            <style>
              body {
                -webkit-print-color-adjust: exact !important;
              }
            </style>
            <script type="text/javascript">
              function printDiv(divName) {

                var printContents = document.getElementById(divName).innerHTML;
                var originalContens = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContens;
              }
            </script>
            <?= csrf_field(); ?>
            <div class="row">

              <div class="col-12" id="printMe">

                <div class="block">
                  <div class="block-content">
                    <div class="row">
                      <label class="col-12" style="text-align: center;">
                        <?php if ($logo['logo'] == '') {
                          echo "<img src='" .  base_url('public/admin/images/identitas/sumedang.png') . "' width='20%'>
           <br> <br>";
                        } else {
                          echo "
                <img src='" .  base_url('public/admin/images/identitas/' . $logo['logo']) . "' width='20%'>
           <br> <br> ";
                        } ?>
                        <h5 style="text-transform: uppercase; padding-top: 2px; font-size: 22px;"> BIODATA PENDUDUK WARGA NEGARA INDONESIA</h5>
                        <h5 style="text-transform: uppercase; padding-top: 2px; font-size: 22px;"> Kab. <?= $logo['nama_kabupaten']; ?>, Kec. <?= $logo['nama_kecamatan']; ?> , Desa <?= $logo['nama_desa']; ?></h5>
                      </label>

                    </div>
                    <hr style="size: 20px;border-width: 7px; border-color: black;">
                    <div class="row">
                      <label class="col-1">

                      </label>
                      <label class="col-4">
                        <h3 class="font-w300" style="font-size: 18px;">Nama</h3>
                        <h3 class="font-w300" style="font-size: 18px;">NIK/No KTP </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Tempat/ Tanggal Lahir </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Jenis Kelamin</h3>
                        <h3 class="font-w300" style="font-size: 18px;">Akta Lahir </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Agama </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Pendidikan Terakhir </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Pekerjaan </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Golongan Darah </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Status Kawin </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Hubungan Dalam Keluarga </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Warga Negara </h3>
                        <h3 class="font-w300" style="font-size: 18px;">NIK Ayah </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Nama Ayah </h3>
                        <h3 class="font-w300" style="font-size: 18px;">NIK Ibu </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Nama Ibu </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Status Kependudukan </h3>
                        <h3 class="font-w300" style="font-size: 18px;">Alamat </h3>
                      </label>
                      <div class="col-7">

                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nik']; ?>/ <?= $penduduk['no_kk']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['tempatlahir']; ?> /
                          <?php
                          $dt = explode('-', $penduduk['tanggallahir']);
                          if ($dt[1] == '01') {
                            $month = 'Januari';
                          }
                          if ($dt[1] == '02') {
                            $month = 'Februari';
                          }
                          if ($dt[1] == '03') {
                            $month = 'Maret';
                          }
                          if ($dt[1] == '04') {
                            $month = 'April';
                          }
                          if ($dt[1] == '05') {
                            $month = 'Mei';
                          }
                          if ($dt[1] == '06') {
                            $month = 'Juni';
                          }
                          if ($dt[1] == '07') {
                            $month = 'Juli';
                          }
                          if ($dt[1] == '08') {
                            $month = 'Agustus';
                          }
                          if ($dt[1] == '09') {
                            $month = 'September';
                          }
                          if ($dt[1] == '10') {
                            $month = 'Oktober';
                          }
                          if ($dt[1] == '11') {
                            $month = 'November';
                          }
                          if ($dt[1] == '12') {
                            $month = 'Desember';
                          }
                          echo   $dt[2] . ' ' . $month . ' ' . $dt[0];

                          ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?php if ($penduduk['sex'] == '1') {
                                                                                    echo "Laki - Laki";
                                                                                  } else if ($penduduk['sex'] == '2') {
                                                                                    echo "Perempuan";
                                                                                  }

                                                                                  ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['akta_lahir']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['agama']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama_pendidikan_kk']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama_pekerjaan']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama_golongan']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?php if ($penduduk['status_kawin'] == 1) {
                                                                                    echo 'Belum Kawin';
                                                                                  } ?>
                          <?php if ($penduduk['status_kawin'] == 2) {
                            echo 'Kawin';
                          } ?>
                          <?php if ($penduduk['status_kawin'] == 3) {
                            echo 'Cerai Hidup';
                          } ?>

                          <?php if ($penduduk['status_kawin'] == 4) {
                            echo 'Cerai Mati';
                          } ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama_hubungan']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?php if ($penduduk['warganegara_id'] == 1) {
                                                                                    echo 'WNI';
                                                                                  } ?>
                          <?php if ($penduduk['warganegara_id'] == 2) {
                            echo 'WNA';
                          } ?>
                          <?php if ($penduduk['warganegara_id'] == 3) {
                            echo 'Dua Kewarganegaraan';
                          } ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['ayah_nik']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama_ayah']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['ibu_nik']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama_ibu']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?php if ($penduduk['status'] == 1) {
                                                                                    echo 'Tetap';
                                                                                  } ?>
                          <?php if ($penduduk['status'] == 2) {
                            echo 'Tidak Tetap';
                          } ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['nama']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 18px;"> : &nbsp; <?= $penduduk['alamat_sekarang']; ?> RT/RW <?= $penduduk['rt']; ?>/ <?= $penduduk['rw']; ?> Desa <?= $logo['nama_desa']; ?> Kec. <?= $logo['nama_kecamatan']; ?> Kab. <?= $logo['nama_kabupaten']; ?> Provinsi <?= $logo['nama_propinsi']; ?> </h3>
                        </h3>
                        <br><br>
                        <div class="col-9">
                          <h3 class="font-w300" style="font-size: 18px;">
                            <center><?= $logo['nama_desa']; ?>, <span id="tanggalwaktu"></span><br>
                              a.n Kepala Desa <?= $logo['nama_desa']; ?>,
                              <br><br>

                              <br><br> <br><br> <br><br>
                              <?= $logo['nama_kepala_desa']; ?><br>
                              NIP : <?= $logo['nip_kepala_desa']; ?>
                            </center>
                          </h3>
                        </div>
                      </div>
                    </div>

                    <br>



                  </div>
                </div>
              </div>

            </div>


          </div>

        </div>
        <div class="col-2">
        </div>
      </div>
    </div>
    <!-- end row -->

  </div> <!-- end container-fluid -->

  </div> <!-- end content -->


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
  <script src="<?= base_url('public/admin/libs/parsleyjs/parsley.min.js'); ?>"></script>

  <!-- Validation init js-->
  <script src="<?= base_url('public/admin/js/pages/form-validation.init.js'); ?>"></script>
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

</body>

</html>


<!-- end Footer -->