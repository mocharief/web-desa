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

          <h4 class="page-title">Data Anggota Keluarga</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">

          <button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"> <i class="fas fa-plus"></i> &nbsp;Tambah Anggota Keluarga</button>

          <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?php echo base_url('admin/kk/simpankeluarga'); ?>" method="post" class="form-horizontal">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Anggota Keluarga</h4>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="field-3" name="id_kk" value="<?= $kk['id_kk']; ?>" required>

                          <label for="field-1" class="control-label">Penduduk yang tidak Memiliki KK</label>
                          <select name="nama" id="nama" class="form-control" data-toggle="select2" required>
                            <option value="">Pilih </option>
                            <?php $query   = $db->query('SELECT * from penduduk Where id NOT IN(SELECT id FROM kk)  AND id_kk = 0 AND kddesa=' . $kddesa);
                            $results = $query->getResultArray();
                            foreach ($results as $d) : ?>
                              <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>

                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="field-1" class="control-label">Hubungan Keluarga</label>
                          <select name="hubungan" id="hubungan" class="form-control" data-toggle="select2" required>
                            <option value="">Pilih </option>
                            <?php $query   = $db->query('SELECT * from hubungan Where id_hubungan NOT IN ("1") ');
                            $results = $query->getResultArray();
                            foreach ($results as $d) : ?>
                              <option value="<?= $d['id_hubungan']; ?>"><?= $d['nama_hubungan']; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <a href="<?php echo base_url('viewkk/' . $kk['id_kk']); ?>">
            <button type="button" class="btn btn-purple btn-sm waves-effect waves-light">
              <i class="fas fa-file"></i> &nbsp; Kartu Keluarga
            </button>

          </a>
          <a href="<?= base_url('/managekeluarga'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Kepala Keluarga
            </button></a>

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
          <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">Rincian Keluarga</th>


              </tr>
            </thead>


            <tbody>


              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> No Kartu Keluarga (KK)</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $kk['no_kk']; ?></td>
              </tr>

              <?php $query   = $db->query('SELECT * from kk JOIN penduduk ON kk.id = penduduk.id Where penduduk.id_kk=' . $kk['id_kk']);
              $results = $query->getResultArray();
              foreach ($results as $j) : ?>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Kepala Keluarga</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $j['nama']; ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Alamat</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $j['alamat_sekarang']; ?></td>
                </tr>
              <?php endforeach; ?>


              </tr>
            </tbody>
          </table>
          <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 10%;">Aksi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat/ Tanggal Lahir</th>

                <th>Jenis Kelamin</th>
                <th>Hubungan</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($keluarga as $p) : ?>

                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>

                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('editpenduduk/' . $p['id']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <?php if ($p['kk_level'] != '1') {
                    ?>



                      <button type="button" class="btn btn-dark btn-xs waves-effect waves-light" data-toggle="modal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Hubungan" data-target="#edithubungan<?= $p['id']; ?>"> <i class="icon-link"></i> </button>

                      <div id="edithubungan<?= $p['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form action="<?php echo base_url('kk/updatehubungan/' . $p['id']); ?>" method="post" class="form-horizontal">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Tambah Anggota Keluarga</h4>
                              </div>
                              <div class="modal-body">


                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label for="field-1" class="control-label">Hubungan Keluarga</label>
                                      <br>
                                      <input type="hidden" class="form-control" id="id_kk" name="id_kk" value="<?= $p['id_kk']; ?>" required>
                                      <select name="hubungan" id="hubungan" class="form-control" data-toggle="select2" required>
                                        <option value="">Pilih </option>
                                        <?php $query   = $db->query('SELECT * from hubungan Where id_hubungan NOT IN ("1") ');
                                        $results = $query->getResultArray();
                                        foreach ($results as $d) : ?>
                                          <option value="<?php echo $d['id_hubungan'] ?>" <?php if ($p['kk_level'] == $d['id_hubungan']) {
                                                                                            echo "selected";
                                                                                          } ?>>
                                            <?php echo $d['nama_hubungan'] ?></option>

                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>




                      <form action="<?= base_url('deletekeluarga/' . $p['id']); ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $p['id']; ?>" required>
                        <input type="hidden" class="form-control" id="id_kk" name="id_kk" value="<?= $p['id_kk']; ?>" required>
                        <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Bukan Anggota Keluarga Ini">
                          <i class="fas fa-times"></i>
                        </button>

                      </form>
                    <?php } else {
                      echo "";
                    } ?>


                  </td>


                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['tempatlahir']; ?>/
                    <?php
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

                  <td style="vertical-align: middle;">
                    <?php if ($p['sex'] == '1') {
                      echo "Laki - Laki";
                    } else if ($p['sex'] == '2') {
                      echo "Perempuan";
                    }

                    ?></td>

                  <td style="vertical-align: middle;">
                    <?php foreach ($hubungan as $d) : ?>
                      <?php if ($p['kk_level'] == $d['id_hubungan']) {
                      ?>
                        <?php echo $d['nama_hubungan']; ?>

                      <?php } ?>

                    <?php endforeach; ?>
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