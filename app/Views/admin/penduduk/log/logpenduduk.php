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

          <h4 class="page-title">Log Data Penduduk</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">

      <div class="col-md-3 col-sm-6">
        <a href="<?php echo base_url('/managependuduk'); ?>">
          <button type="button" class="btn btn-success btn-sm waves-effect waves-light" style="width: 100%;">
            <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Penduduk
          </button>

        </a>
      </div>
      <br> <br>
      <div class="col-12">
        <div class="card-box table-responsive">
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-info">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>

          <br>
          <form action="<?= base_url('/logpenduduk'); ?>" method="post" class="form-horizontal">
            <?= csrf_field(); ?>
            <div class="form-group row">
              <div class="col-3">
                <select name="statusdasar" id="statusdasar" class="form-control">
                  <option value="">Jenis Peristiwa</option>
                  <option <?php if ($statusdasar == 2) {
                            echo 'selected';
                          } ?> value="2">Meninggal
                  </option>
                  <option <?php if ($statusdasar == 3) {
                            echo 'selected';
                          } ?> value="3">Pindah
                  </option>
                  <option <?php if ($statusdasar == 4) {
                            echo 'selected';
                          } ?> value="4">Hilang
                  </option>
                </select>
              </div>
              <div class="col-6">
                <button type="submit" class="btn btn-info waves-effect waves-light">Filter</button>
              </div>
            </div>
          </form>
          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>

                <th style="width: 2%;">No</th>
                <th>Aksi</th>
                <th>Foto</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Dusun</th>
                <th>RW</th>
                <th>RT</th>
                <th>Umur</th>
                <th>Status Menjadi</th>
                <th>Tgl Peristiwa</th>
                <th>Catatan Peristiwa</th>
              </tr>
            </thead>


            <tbody>

              <?php $i = 1; ?>
              <?php if ($statusdasar == '') {
                $query   = $db->query('SELECT log_penduduk.*, penduduk.*,kk.no_kk,dusun.namadusun,rw.rw,rt.rt,pendidikan_kk.nama_pendidikan_kk,pekerjaan.nama_pekerjaan from log_penduduk JOIN penduduk ON penduduk.id =  log_penduduk.id JOIN dusun ON dusun.id_dusun = penduduk.id_dusun JOIN rw ON rw.id_rw = penduduk.id_rw JOIN rt ON rt.id_rt = penduduk.id_rt JOIN pendidikan_kk ON pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk JOIN pekerjaan ON pekerjaan.id_pekerjaan = penduduk.id_pekerjaan JOIN kk ON kk.id_kk = penduduk.id_kk Where log_penduduk.kddesa=' . $kddesa . ' AND log_penduduk.id_peristiwa != 1');
              } else if ($statusdasar == 2) {
                $query   = $db->query('SELECT log_penduduk.*, penduduk.*,kk.no_kk,dusun.namadusun,rw.rw,rt.rt,pendidikan_kk.nama_pendidikan_kk,pekerjaan.nama_pekerjaan from log_penduduk JOIN penduduk ON penduduk.id =  log_penduduk.id JOIN dusun ON dusun.id_dusun = penduduk.id_dusun JOIN rw ON rw.id_rw = penduduk.id_rw JOIN rt ON rt.id_rt = penduduk.id_rt JOIN pendidikan_kk ON pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk JOIN pekerjaan ON pekerjaan.id_pekerjaan = penduduk.id_pekerjaan JOIN kk ON kk.id_kk = penduduk.id_kk Where log_penduduk.kddesa=' . $kddesa . ' AND log_penduduk.id_peristiwa = 2');
              } else if ($statusdasar == 3) {
                $query   = $db->query('SELECT log_penduduk.*, penduduk.*,kk.no_kk,dusun.namadusun,rw.rw,rt.rt,pendidikan_kk.nama_pendidikan_kk,pekerjaan.nama_pekerjaan from log_penduduk JOIN penduduk ON penduduk.id =  log_penduduk.id JOIN dusun ON dusun.id_dusun = penduduk.id_dusun JOIN rw ON rw.id_rw = penduduk.id_rw JOIN rt ON rt.id_rt = penduduk.id_rt JOIN pendidikan_kk ON pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk JOIN pekerjaan ON pekerjaan.id_pekerjaan = penduduk.id_pekerjaan JOIN kk ON kk.id_kk = penduduk.id_kk Where log_penduduk.kddesa=' . $kddesa . ' AND log_penduduk.id_peristiwa =  3');
              } else if ($statusdasar == 4) {
                $query   = $db->query('SELECT log_penduduk.*, penduduk.*,kk.no_kk,dusun.namadusun,rw.rw,rt.rt,pendidikan_kk.nama_pendidikan_kk,pekerjaan.nama_pekerjaan from log_penduduk JOIN penduduk ON penduduk.id =  log_penduduk.id JOIN dusun ON dusun.id_dusun = penduduk.id_dusun JOIN rw ON rw.id_rw = penduduk.id_rw JOIN rt ON rt.id_rt = penduduk.id_rt JOIN pendidikan_kk ON pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk JOIN pekerjaan ON pekerjaan.id_pekerjaan = penduduk.id_pekerjaan JOIN kk ON kk.id_kk = penduduk.id_kk Where log_penduduk.kddesa=' . $kddesa . ' AND log_penduduk.id_peristiwa =  4');
              }
              $results = $query->getResultArray();
              foreach ($results as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('editlog/' . $p['id_log']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <a href="<?php echo base_url('restorestatus/' . $p['id_log']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kembalikan Status">
                        <i class="fas fa-sync"></i>
                      </button></a>
                  </td>

                  <td style="vertical-align: middle; width:2%;">
                    <?php if ($p['foto'] != '') {
                    ?>
                      <img src="<?php echo base_url('public/admin/images/penduduk/' . $p['foto']) ?>" width="100%" />
                    <?php } else {
                    ?>
                      <img src="<?php echo base_url('public/admin/images/penduduk/penduduk.png') ?>" width="100%" />
                    <?php
                    } ?>
                  </td>

                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['namadusun']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['rw']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['rt']; ?></td>
                  <td style="vertical-align: middle;"> <?php
                                                        $tanggal = new DateTime($p['tanggallahir']);
                                                        // tanggal hari ini
                                                        $today = new DateTime('today');

                                                        // tahun
                                                        $y = $today->diff($tanggal)->y;
                                                        ?><?= $y; ?> Tahun</td>
                  <td style="vertical-align: middle;">
                    <?php if ($p['status_dasar'] == 2) {
                      echo 'Meninggal';
                    } ?>
                    <?php if ($p['status_dasar'] == 3) {
                      echo 'Pindah';
                    } ?>
                    <?php if ($p['status_dasar'] == 4) {
                      echo 'Hilang';
                    } ?>
                  </td>
                  <td style="vertical-align: middle;"> <?php
                                                        $dt = explode('-', $p['tgl_peristiwa']);
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
                  <td style="vertical-align: middle;"> <?= $p['catatan']; ?></td>
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









<?php $this->Endsection(); ?>