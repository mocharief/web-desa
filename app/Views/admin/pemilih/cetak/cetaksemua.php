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
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">

            <h4 class="page-title">Data Pemilih</h4>
            <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" onclick="printDiv('printMe')">
              <i class="fas fa-print"></i> &nbsp; Cetak
            </button>
            <br> <br>

            <script type="text/javascript">
              function printDiv(divName) {

                var printContents = document.getElementById(divName).innerHTML;
                var originalContens = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContens;

              }
            </script>

          </div>
        </div>
      </div>
      <!-- end page title -->



      <div class="row">
        <div class="col-12" id="printMe">
          <label class="col-12" style="text-align: center;">
            <?php if ($logo['logo'] == '') {
              echo "<img src='" .  base_url('public/admin/images/identitas/sumedang.png') . "' width='10%'>
           <br> <br>";
            } else {
              echo "
                <img src='" .  base_url('public/admin/images/identitas/' . $logo['logo']) . "' width='10%'>
           <br> <br> ";
            } ?>
            <h5 style="text-transform: uppercase; padding-top: 2px; font-size: 18px;"> PENDUDUK WARGA NEGARA INDONESIA</h5>
            <h5 style="text-transform: uppercase; padding-top: 2px; font-size: 18px;"> Kab. <?= $logo['nama_kabupaten']; ?>, Kec. <?= $logo['nama_kecamatan']; ?> , Desa <?= $logo['nama_desa']; ?></h5>
            <h5 style="text-transform: uppercase; padding-top: 2px; font-size: 16px;"> Daftar Pemilih Sementara Desa <?= $logo['nama_desa']; ?></h5>
          </label>

          <br> <br>
          <table class="table table-bordered table-responsive" style="width: 100%;">


            <thead style="background-color: aquamarine;">
              <tr>

                <th style="width: 2%;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center; vertical-align: middle; ">No</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle; ">No KK</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Nama</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">NIK</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Dusun</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Rw</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Rt</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Jenis Kelamin</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Tempat Lahir</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Tanggal Lahir</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Umur</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Pendidikan (Dlm KK)</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Pekerjaan</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Kawin</th>
              </tr>
            </thead>


            <tbody>

              <?php $i = 1; ?>
              <?php $query   = $db->query('SELECT penduduk.*,kk.no_kk,dusun.namadusun,rw.rw,rt.rt,pendidikan_kk.nama_pendidikan_kk,pekerjaan.nama_pekerjaan,agama.agama from penduduk JOIN dusun ON dusun.id_dusun = penduduk.id_dusun JOIN rw ON rw.id_rw = penduduk.id_rw JOIN rt ON rt.id_rt = penduduk.id_rt JOIN pendidikan_kk ON pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk JOIN pekerjaan ON pekerjaan.id_pekerjaan = penduduk.id_pekerjaan JOIN kk ON kk.id_kk = penduduk.id_kk JOIN agama ON agama.agama_id = penduduk.agama_id Where penduduk.kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(penduduk.tanggallahir) >= 17');

              $results = $query->getResultArray();
              foreach ($results as $p) : ?>

                <tr>

                  <td style="vertical-align: middle; text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center; color: black; "><?= $i++; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;">
                    <?php if ($sensor == 1) {
                      echo substr($p['no_kk'], 0, 8) . 'xxxxxxxx';
                    } else {
                    ?>
                      <?= $p['no_kk']; ?>
                    <?php } ?>

                  </td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;">
                    <?php if ($sensor == 1) {
                      echo substr($p['nik'], 0, 8) . 'xxxxxxxx';
                    } else {
                    ?>
                      <?= $p['nik']; ?>
                    <?php } ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"> <?= $p['namadusun']; ?></td>
                  <td style="vertical-align: middle; text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"><?= $p['rw']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"> <?= $p['rt']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;">
                    <?php if ($p['sex'] == 1) {
                      echo 'Laki - Laki';
                    } ?>
                    <?php if ($p['sex'] == 2) {
                      echo 'Perempuan';
                    } ?> </td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center;color: black;"> <?= $p['tempatlahir']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center;color: black;"> <?php
                                                                                                                                                    $dt = explode('-', $p['tanggallahir']);
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

                                                                                                                                                    ?></td>
                  <td style="vertical-align: middle; text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center;color: black;"> <?php
                                                                                                                                                      $tanggal = new DateTime($p['tanggallahir']);
                                                                                                                                                      // tanggal hari ini
                                                                                                                                                      $today = new DateTime('today');

                                                                                                                                                      // tahun
                                                                                                                                                      $y = $today->diff($tanggal)->y;
                                                                                                                                                      ?> <?= $y; ?> Tahun</td>

                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center;color: black;"> <?= $p['nama_pendidikan_kk']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center;color: black;"> <?= $p['nama_pekerjaan']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center;color: black;">
                    <?php if ($p['status_kawin'] == 1) {
                      echo 'Belum Kawin';
                    } ?>
                    <?php if ($p['status_kawin'] == 2) {
                      echo 'Kawin';
                    } ?>
                    <?php if ($p['status_kawin'] == 3) {
                      echo 'Cerai Hidup';
                    } ?>
                    <?php if ($p['status_kawin'] == 4) {
                      echo 'Cerai Mati';
                    } ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>


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