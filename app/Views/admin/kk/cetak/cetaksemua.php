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

            <h4 class="page-title">Data Kepala Keluarga</h4>
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
            <h5 style="text-transform: uppercase; padding-top: 2px; font-size: 18px;"> Data Kepala Keluarga Desa <?= $logo['nama_desa']; ?></h5>
          </label>

          <br> <br>
          <table class="table table-bordered table-responsive" style="width: 100%;">


            <thead style="background-color: aquamarine;">
              <tr>

                <th style="width: 2%;text-transform: uppercase; font-size: x-small; padding: 5px; text-align: center; vertical-align: middle; ">No</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle; ">No KK</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Nama</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">NIK</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Jumlah Anggota Keluarga</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Jenis Kelamin</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Alamat</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">Dusun</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">RW</th>
                <th style="text-transform: uppercase; font-size: x-small;padding: 5px; text-align: center; vertical-align: middle;">RT</th>

              </tr>
            </thead>


            <tbody>

              <?php $i = 1; ?>
              <?php foreach ($kk as $p) : ?>
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
                  <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where id_kk=' . $p['id_kk']);
                  $results = $query->getRowArray();
                  foreach ($results as $l) : ?>
                    <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"><?= $l; ?></td>
                  <?php endforeach; ?>

                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;">
                    <?php if ($p['sex'] == 1) {
                      echo 'Laki - Laki';
                    } ?>
                    <?php if ($p['sex'] == 2) {
                      echo 'Perempuan';
                    } ?> </td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"> <?= $p['alamat_sekarang']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"> <?= $p['namadusun']; ?></td>
                  <td style="vertical-align: middle; text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"><?= $p['rw']; ?></td>
                  <td style="vertical-align: middle;text-transform: uppercase; font-size: x-small;  padding: 5px; text-align: center;color: black;"> <?= $p['rt']; ?></td>
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