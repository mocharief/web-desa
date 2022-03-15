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

          <h4 class="page-title">Data Calon Pemilih</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"> <i class="fas fa-print"></i> &nbsp; Cetak</button>
          <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?php echo base_url('admin/pemilih/cetaksemua'); ?>" method="post" class="form-horizontal" target="_blank">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Cetak Data Pemilih</h4>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-12">

                        <div class="form-group">

                          <label for="field-1" class="control-label">Centang kotak berikut apabila NIK/No. KK ingin disensor</label>
                          <div class="col-10">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck1" name="sensor" value="1">
                              <label class="custom-control-label" for="customCheck1">Sensor No KK / NIK</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Cetak</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-info btn-sm waves-effect waves-light" data-toggle="modal" data-target="#unduh"> <i class="fas fa-download"></i> &nbsp; Unduh</button>
          <div id="unduh" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?php echo base_url('admin/pemilih/unduhsemua'); ?>" method="post" class="form-horizontal" target="_blank">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Unduh Data Pemilih</h4>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">

                          <label for="field-1" class="control-label">Centang kotak berikut apabila NIK/No. KK ingin disensor</label>
                          <div class="col-10">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="customCheck2" name="sensor" value="1">
                              <label class="custom-control-label" for="customCheck2">Sensor No KK / NIK</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Unduh</button>
                  </div>
                </form>
              </div>
            </div>
          </div>


          <h4 class="page-title" style="text-align: center;">Data Calon Pemilih pada tanggal <span id="tanggalwaktu"></h4>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>No KK</th>
                <th>Dusun</th>
                <th>RT</th>
                <th>RW</th>
                <th>Pendidikan Dalam KK</th>
                <th>Umur pada <span id="tanggal"></span></th>
                <th>Pekerjaan</th>
                <th>Status Kawin</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php $query   = $db->query('SELECT penduduk.*,kk.no_kk,dusun.namadusun,rw.rw,rt.rt,pendidikan_kk.nama_pendidikan_kk,pekerjaan.nama_pekerjaan from penduduk JOIN dusun ON dusun.id_dusun = penduduk.id_dusun JOIN rw ON rw.id_rw = penduduk.id_rw JOIN rt ON rt.id_rt = penduduk.id_rt JOIN pendidikan_kk ON pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk JOIN pekerjaan ON pekerjaan.id_pekerjaan = penduduk.id_pekerjaan JOIN kk ON kk.id_kk = penduduk.id_kk Where penduduk.kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(penduduk.tanggallahir) >= 17');

              $results = $query->getResultArray();
              foreach ($results as $p) : ?>
                <?php
                $tanggal = new DateTime($p['tanggallahir']);
                // tanggal hari ini
                $today = new DateTime('today');

                // tahun
                $y = $today->diff($tanggal)->y;
                ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['no_kk']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['namadusun']; ?></td>
                  <td style="vertical-align: middle;"><?= $p['rw']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['rt']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama_pendidikan_kk']; ?></td>
                  <td style="vertical-align: middle; text-align: center;"><?= $y;  ?> Tahun</td>

                  <td style="vertical-align: middle;"><?= $p['nama_pekerjaan']; ?></td>
                  <td style="vertical-align: middle;"><?php if ($p['status_kawin'] == '1') {
                                                        echo "Belum Kawin";
                                                      } else if ($p['status_kawin'] == '2') {
                                                        echo "Belum Kawin";
                                                      } else if ($p['status_kawin'] == '3') {
                                                        echo "Cerai Hidup";
                                                      } else if ($p['status_kawin'] == '4') {
                                                        echo "Cerai Mati";
                                                      }


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