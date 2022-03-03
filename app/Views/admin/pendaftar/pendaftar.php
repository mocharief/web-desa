<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Pendaftar Layanan</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">

      <div class="col-md-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('/tambahpengguna'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Layanan Mandiri
            </button>

          </a>
          <br> <br>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="mdi mdi-check-all mr-2"></i>
              <?= session()->getFlashdata('pesan'); ?>
            </div>

          <?php endif; ?>

          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 10%;">Aksi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Tanggal Pendaftaran</th>



              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pendaftaran as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="https://api.whatsapp.com/send?phone=<?= $p['no_wa']; ?>&text= Saya Dari Admin Desa <?= $logo['nama_desa']; ?> Ingin Memberitahukan Bahwa PIN Akses Anda Adalah <?php echo md5($p['pin']); ?>" target="_blank"><button type=" button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kirim PIN Via WA">
                        <i class="mdi mdi-whatsapp"></i>
                      </button>
                    </a>
                    <a href="<?php echo base_url('editpengguna/' . $p['id_pendaftar']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Atur PIN">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    <form action="<?= base_url('deletepengguna/' . $p['id_pendaftar']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>



                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;">
                    <?php if ($p['status'] == 0) {
                      echo "Pendaftar Baru";
                    } else {
                      echo "Sudah diatur Pin";
                    }

                    ?>
                  </td>
                  <td style="vertical-align: middle;">
                    <?php
                    $dt = explode('-', $p['tgl_buat']);
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

                    ?>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- end row -->

  </div> <!-- end container-fluid -->

</div> <!-- end content -->


<!-- /.content-wrapper -->

<?php $this->Endsection(); ?>