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

          <h4 class="page-title">Data Pesan</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->




    <div class="row">
      <div class="col-lg-12">
        <div class="card-box">
          <div class="tabs-vertical-env">
            <div class="row">
              <div class="col-sm-2">
                <div class="nav flex-column nav-pills tabs-vertical" role="tablist" aria-orientation="vertical">
                  <a class="nav-link mb-1 active" id="v-home-tab" data-toggle="pill" href="#v-home" role="tab" aria-controls="v-home" aria-selected="true">
                    <span class="d-inline-block">Pesan Masuk</span>
                  </a>
                  <a class="nav-link mb-1" id="v-profile-tab" data-toggle="pill" href="#v-profile" role="tab" aria-controls="v-profile" aria-selected="false">
                    <span class="d-inline-block">Pesan Keluar</span>
                  </a>

                </div>
              </div>
              <div class="col-sm-10">
                <div class="tab-content pt-0">
                  <div class="tab-pane fade active show" id="v-home" role="tabpanel" aria-labelledby="v-home-tab">
                    <div class="col-md-12">
                      <div class="card-box table-responsive">
                        <a href="<?php echo base_url('/tulispesan'); ?>">
                          <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                            <i class="fas fa-plus"></i> &nbsp; Tulis Pesan
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

                        <br>
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                          <thead>
                            <tr>
                              <th style="width: 2%;">No</th>
                              <th style="width: 15%;">Aksi</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Pesan</th>
                              <th>Status</th>
                              <th>Tanggal Pengiriman</th>



                            </tr>
                          </thead>


                          <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pesan as $p) : ?>
                              <tr>

                                <td style="vertical-align: middle;"><?= $i++; ?></td>
                                <td style="vertical-align: middle;">
                                  <a href="<?php echo base_url('balaspesan/' . $p['id_pesan']); ?>"><button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Balas Pesan">
                                      <i class="fas fa-comment"></i>
                                    </button>
                                  </a>
                                  <a href="<?php echo base_url('viewpesan/' . $p['id_pesan']); ?>"><button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                      <i class="fas fa-eye"></i>
                                    </button>
                                  </a>
                                  <form action="<?= base_url('deletepesan/' . $p['id_pesan']); ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-sm " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                                      <i class="fas fa-trash"></i>
                                    </button>

                                  </form>
                                </td>



                                <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                                <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                                <td style="vertical-align: middle;"> <?= $p['pesan']; ?></td>
                                <td style="vertical-align: middle;">
                                  <?php if ($p['status'] == 0) {
                                    echo "Belum Dibaca";
                                  } else {
                                    echo "Sudah Dibaca";
                                  }

                                  ?>
                                </td>
                                <td style="vertical-align: middle;">
                                  <?php
                                  $dt = explode('-', $p['tgl_kirim']);
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
                  <div class="tab-pane fade" id="v-profile" role="tabpanel" aria-labelledby="v-profile-tab">
                    <div class="col-md-12">
                      <div class="card-box table-responsive">
                        <a href="<?php echo base_url('/tulispesan'); ?>">
                          <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                            <i class="fas fa-plus"></i> &nbsp; Tulis Pesan
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

                        <br>
                        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                          <thead>
                            <tr>
                              <th style="width: 2%;">No</th>
                              <th style="width: 15%;">Aksi</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Pesan</th>
                              <th>Tanggal Pengiriman</th>
                              <th>Status</th>


                            </tr>
                          </thead>


                          <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pesankeluar as $p) : ?>
                              <tr>

                                <td style="vertical-align: middle;"><?= $i++; ?></td>
                                <td style="vertical-align: middle;">

                                  <a href="<?php echo base_url('viewpesankeluar/' . $p['id_pesankeluar']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                      <i class="fas fa-eye"></i>
                                    </button>
                                  </a>
                                  <form action="<?= base_url('deletepesankeluar/' . $p['id_pesankeluar']); ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                                      <i class="fas fa-trash"></i>
                                    </button>

                                  </form>
                                </td>



                                <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                                <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                                <td style="vertical-align: middle;"> <?= $p['pesan']; ?></td>

                                <td style="vertical-align: middle;">
                                  <?php
                                  $dt = explode('-', $p['tgl_kirim']);
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
                                <td style="vertical-align: middle;">
                                  <?php if ($p['status'] == 0) {
                                    echo "Belum Dibaca";
                                  } else {
                                    echo "Sudah Dibaca";
                                  }

                                  ?>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
      </div> <!-- end col -->


    </div>



  </div>
  <!-- end row -->

</div> <!-- end container-fluid -->





<!-- /.content-wrapper -->

<?php $this->Endsection(); ?>