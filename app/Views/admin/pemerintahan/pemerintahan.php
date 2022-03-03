<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Right Sidebar -->


<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Pemeritahan</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('/tambahpemerintahan'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Aparat Pemerintahan
            </button>

          </a>
          <br> <br>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-info">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>

          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th>Aksi</th>
                <th>Nama, NIP/NIPD, NIK</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Pangkat/Golongan</th>
                <th>Pendidikan Terakhir</th>
                <th>No SK Pengangkatan</th>
                <th>Tanggal SK Pengangkatan</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pemerintahan as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('gantipemerintahan/' . $p['pamong_id']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ganti Data">
                        <i class="fas fa-retweet"></i>
                      </button></a>
                    <a href="<?php echo base_url('editpemerintahan/' . $p['pamong_id']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletepemerintahan/' . $p['pamong_id']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>


                  <td style="vertical-align: middle;"> <?= $p['pamong_nama']; ?><br>NIP :<?= $p['pamong_nip']; ?><br>NIPD :<?= $p['pamong_nipd']; ?><br>NIK :<?= $p['pamong_nik']; ?></td>

                  <td style="vertical-align: middle;"> <?= $p['pamong_tempatlahir']; ?>,
                    <?php
                    $dt = explode('-', $p['pamong_tanggallahir']);
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
                  <td style="vertical-align: middle;"> <?= $p['pamong_sex']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['jabatan']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['pamong_pangkat']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['pamong_pendidikan']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['pamong_nosk']; ?></td>
                  <td style="vertical-align: middle;">
                    <?php
                    $dt = explode('-', $p['pamong_tglsk']);
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




<!-- end Footer -->


<?php $this->Endsection(); ?>