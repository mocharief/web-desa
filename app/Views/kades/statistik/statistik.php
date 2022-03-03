<?php $this->extend('layout/templatekades'); ?>
<?php $this->section('isi'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Statistik Penduduk</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->




    <div class="row">
      <div class="col-lg-12">
        <div class="card-box">
          <div class="tabs-vertical-env">
            <div class="row">
              <div class="col-sm-3">
                <div class="card-body">
                  <div class="card-widgets">
                    <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="true" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                  </div>
                  <h5 class="card-title mb-0">Kategori</h5>
                  <div id="cardCollpase1" class="collapse pt-3">
                    <div class="nav flex-column nav-pills tabs-vertical" role="tablist" aria-orientation="vertical">
                      <a class="nav-link mb-1" id="v-kelompok-tab" data-toggle="pill" href="#v-kelompok" role="tab" aria-controls="v-kelompok" aria-selected="false">
                        <span class="d-inline-block">Umur (Kelompok)</span>
                      </a>
                      <a class="nav-link mb-1" id="v-pendidikankk-tab" data-toggle="pill" href="#v-pendidikankk" role="tab" aria-controls="v-pendidikankk" aria-selected="false">
                        <span class="d-inline-block">Pendidikan Dalam KK</span>
                      </a>
                      <a class="nav-link mb-1" id="v-pendidikan-tab" data-toggle="pill" href="#v-pendidikan" role="tab" aria-controls="v-pendidikan" aria-selected="false">
                        <span class="d-inline-block">Pendidikan sedang Ditempuh</span>
                      </a>
                      <a class="nav-link mb-1" id="v-pekerjaan-tab" data-toggle="pill" href="#v-pekerjaan" role="tab" aria-controls="v-pekerjaan" aria-selected="false">
                        <span class="d-inline-block">Pekerjaan</span>
                      </a>
                      <a class="nav-link mb-1" id="v-statuskawin-tab" data-toggle="pill" href="#v-statuskawin" role="tab" aria-controls="v-statuskawin" aria-selected="false">
                        <span class="d-inline-block">Status Perkawinan</span>
                      </a>
                      <a class="nav-link mb-1" id="v-agama-tab" data-toggle="pill" href="#v-agama" role="tab" aria-controls="v-agama" aria-selected="false">
                        <span class="d-inline-block">Agama</span>
                      </a>
                      <a class="nav-link mb-1" id="v-jk-tab" data-toggle="pill" href="#v-jk" role="tab" aria-controls="v-jk" aria-selected="false">
                        <span class="d-inline-block">Jenis Kelamin</span>
                      </a>
                      <a class="nav-link mb-1" id="v-wn-tab" data-toggle="pill" href="#v-wn" role="tab" aria-controls="v-wn" aria-selected="false">
                        <span class="d-inline-block">Warga Negara</span>
                      </a>
                      <a class="nav-link mb-1" id="v-gd-tab" data-toggle="pill" href="#v-gd" role="tab" aria-controls="v-gd" aria-selected="false">
                        <span class="d-inline-block">Golongan Darah</span>
                      </a>
                      <a class="nav-link mb-1" id="v-pc-tab" data-toggle="pill" href="#v-pc" role="tab" aria-controls="v-pc" aria-selected="false">
                        <span class="d-inline-block">Penyandang Cacat</span>
                      </a>
                      <a class="nav-link mb-1" id="v-sm-tab" data-toggle="pill" href="#v-sm" role="tab" aria-controls="v-sm" aria-selected="false">
                        <span class="d-inline-block">Sakit Menahun</span>
                      </a>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-9">
                <div class="tab-content pt-0">
                  <div class="tab-pane fade active show" id="v-kelompok" role="tabpanel" aria-labelledby="v-kelompok-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">

                        <figure class="highcharts-figure">
                          <div id="container"></div>
                        </figure>

                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Umur (Kelompok)</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;">Balita (0 - 5)</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) <= 5');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>

                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where  sex = 1 AND  kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) <= 5');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where  sex = 2 AND kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) <= 5');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;"> Anak - Anak (5 - 17)</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND  YEAR(curdate()) - YEAR(tanggallahir) >  5 AND YEAR(curdate()) - YEAR(tanggallahir) <=  17');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND YEAR(curdate()) - YEAR(tanggallahir) >  5 AND YEAR(curdate()) - YEAR(tanggallahir) <=  17');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND YEAR(curdate()) - YEAR(tanggallahir) >  5 AND YEAR(curdate()) - YEAR(tanggallahir) <=  17');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;"> Dewasa (18 - 30)</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) >  17 AND YEAR(curdate()) - YEAR(tanggallahir) <=  30');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND YEAR(curdate()) - YEAR(tanggallahir) >  17 AND YEAR(curdate()) - YEAR(tanggallahir) <=  30');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND YEAR(curdate()) - YEAR(tanggallahir) >  17 AND YEAR(curdate()) - YEAR(tanggallahir) <=  30');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">4</td>
                            <td style="vertical-align: middle;"> Tua (31 - 120)</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where  kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) >  30 AND YEAR(curdate()) - YEAR(tanggallahir) <=  120');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND YEAR(curdate()) - YEAR(tanggallahir) >  30 AND YEAR(curdate()) - YEAR(tanggallahir) <=  120');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND YEAR(curdate()) - YEAR(tanggallahir) >  30 AND YEAR(curdate()) - YEAR(tanggallahir) <=  120');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND tanggallahir= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND tanggallahir = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND tanggallahir = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND tanggallahir != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND tanggallahir != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND tanggallahir != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pendidikankk" role="tabpanel" aria-labelledby="v-pendidikankk-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">

                        <figure class="highcharts-figure">
                          <div id="container2"></div>
                        </figure>

                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Pendidikan Dalam KK</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>


                          </tr>
                        </thead>


                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($pendidikankk as $p) : ?>
                            <tr>

                              <td style="vertical-align: middle;"><?= $i++; ?></td>
                              <td style="vertical-align: middle;"> <?= $p['nama_pendidikan_kk']; ?></td>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk  Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=' . $p['id_pendidikan_kk']);
                              $results = $query->getRowArray();
                              foreach ($results as $j) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                              <?php endforeach; ?>

                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_pendidikan_kk=' . $p['id_pendidikan_kk']);
                              $results = $query->getRowArray();
                              foreach ($results as $l) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                              <?php endforeach; ?>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_pendidikan_kk=' . $p['id_pendidikan_kk']);
                              $results = $query->getRowArray();
                              foreach ($results as $pr) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                              <?php endforeach; ?>

                            </tr>
                          <?php endforeach; ?>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_pendidikan_kk= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_pendidikan_kk= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_pendidikan_kk != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_pendidikan_kk != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pendidikan" role="tabpanel" aria-labelledby="v-pendidikan-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container3"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Pendidikan Sedang Ditempuh</h4> <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>


                          </tr>
                        </thead>


                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($pendidikan as $p) : ?>
                            <tr>

                              <td style="vertical-align: middle;"><?= $i++; ?></td>
                              <td style="vertical-align: middle;"> <?= $p['nama_pendidikan']; ?></td>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=' . $p['id_pendidikan']);
                              $results = $query->getRowArray();
                              foreach ($results as $j) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                              <?php endforeach; ?>

                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND pendidikan_sedang_id=' . $p['id_pendidikan']);
                              $results = $query->getRowArray();
                              foreach ($results as $l) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                              <?php endforeach; ?>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND pendidikan_sedang_id=' . $p['id_pendidikan']);
                              $results = $query->getRowArray();
                              foreach ($results as $pr) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                              <?php endforeach; ?>

                            </tr>
                          <?php endforeach; ?>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND pendidikan_sedang_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND pendidikan_sedang_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk WHERE kddesa=' . $kddesa . ' AND pendidikan_sedang_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND pendidikan_sedang_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND pendidikan_sedang_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pekerjaan" role="tabpanel" aria-labelledby="v-pekerjaan-tab">

                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Pekerjaan</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>


                          </tr>
                        </thead>


                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($pekerjaan as $p) : ?>
                            <tr>

                              <td style="vertical-align: middle;"><?= $i++; ?></td>
                              <td style="vertical-align: middle;"> <?= $p['nama_pekerjaan']; ?></td>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pekerjaan=' . $p['id_pekerjaan']);
                              $results = $query->getRowArray();
                              foreach ($results as $j) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                              <?php endforeach; ?>

                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_pekerjaan=' . $p['id_pekerjaan']);
                              $results = $query->getRowArray();
                              foreach ($results as $l) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                              <?php endforeach; ?>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_pekerjaan=' . $p['id_pekerjaan']);
                              $results = $query->getRowArray();
                              foreach ($results as $pr) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                              <?php endforeach; ?>

                            </tr>
                          <?php endforeach; ?>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pekerjaan= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_pekerjaan= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_pekerjaan= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pekerjaan != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_pekerjaan != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_pekerjaan != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-statuskawin" role="tabpanel" aria-labelledby="v-statuskawin-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container5"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Status Kawin</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;"> Belum Kawin</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND status_kawin = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND status_kawin = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;"> Kawin</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND status_kawin = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND status_kawin = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;"> Cerai Hidup</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND status_kawin = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND status_kawin = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">4</td>
                            <td style="vertical-align: middle;"> Cerai Mati</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND status_kawin = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND status_kawin = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND status_kawin= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND status_kawin= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND status_kawin != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND status_kawin != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-agama" role="tabpanel" aria-labelledby="v-agama-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container6"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Agama</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>


                          </tr>
                        </thead>


                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($agama as $p) : ?>
                            <tr>

                              <td style="vertical-align: middle;"><?= $i++; ?></td>
                              <td style="vertical-align: middle;"> <?= $p['agama']; ?></td>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=' . $p['agama_id']);
                              $results = $query->getRowArray();
                              foreach ($results as $j) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                              <?php endforeach; ?>

                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND agama_id=' . $p['agama_id']);
                              $results = $query->getRowArray();
                              foreach ($results as $l) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                              <?php endforeach; ?>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND agama_id=' . $p['agama_id']);
                              $results = $query->getRowArray();
                              foreach ($results as $pr) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                              <?php endforeach; ?>

                            </tr>
                          <?php endforeach; ?>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where  kddesa=' . $kddesa . ' AND agama_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND agama_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND agama_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND agama_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND agama_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-jk" role="tabpanel" aria-labelledby="v-jk-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container7"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Jenis Kelamin</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;"> Laki - Laki</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;"> Perempuan</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>



                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>



                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-wn" role="tabpanel" aria-labelledby="v-wn-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container8"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Warga Negara</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;">WNI</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND warganegara_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND warganegara_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;"> WNA</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND warganegara_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND warganegara_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;"> Dua Kewarganegaraan</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND warganegara_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND warganegara_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND warganegara_id = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND warganegara_id = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND warganegara_id != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND warganegara_id != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-gd" role="tabpanel" aria-labelledby="v-gd-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container10"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Golongan Darah</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>


                          </tr>
                        </thead>


                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($golongan as $p) : ?>
                            <tr>

                              <td style="vertical-align: middle;"><?= $i++; ?></td>
                              <td style="vertical-align: middle;"> <?= $p['nama_golongan']; ?></td>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=' . $p['id_golongan']);
                              $results = $query->getRowArray();
                              foreach ($results as $j) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                              <?php endforeach; ?>

                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_golongan=' . $p['id_golongan']);
                              $results = $query->getRowArray();
                              foreach ($results as $l) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                              <?php endforeach; ?>
                              <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_golongan=' . $p['id_golongan']);
                              $results = $query->getRowArray();
                              foreach ($results as $pr) : ?>
                                <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                              <?php endforeach; ?>

                            </tr>

                          <?php endforeach; ?>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_golongan = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_golongan = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND id_golongan != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND id_golongan != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pc" role="tabpanel" aria-labelledby="v-pc-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container11"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Penyandang Cacat </h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;">Cacat Fisik</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;">Cacat Netra/Buta</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;">Cacat Rungu/Wicara </td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">4</td>
                            <td style="vertical-align: middle;">Cacat Mental/Jiwa</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">5</td>
                            <td style="vertical-align: middle;">Cacat Fisik dan Mental</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 5');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 5');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 5');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">6</td>
                            <td style="vertical-align: middle;">Cacat Lainnya </td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 6');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 6');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 6');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">7</td>
                            <td style="vertical-align: middle;">Tidak Cacat</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id = 7');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = 7');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = 7');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND cacat_id != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND cacat_id != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-sm" role="tabpanel" aria-labelledby="v-sm-tab">
                    <div class="card-body">
                      <div class="card-widgets">
                        <a data-toggle="collapse" href="#cardCollpase2" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
                      </div>
                      <h5 class="card-title mb-0">Grafik</h5>
                      <div id="cardCollpase2" class="collapse pt-3 show">
                        <figure class="highcharts-figure">
                          <div id="container12"></div>
                        </figure>
                      </div>
                    </div>
                    <br>
                    <h4 style="text-align: center;">Data Kependudukan Menurut Sakit Menahun</h4>
                    <br> <br>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                        <thead>
                          <tr>
                            <th style="width: 2%;">No</th>
                            <th style="text-align: center;">Jenis Kelompok</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Laki - Laki</th>
                            <th style="text-align: center;">Perempuan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="vertical-align: middle;">1</td>
                            <td style="vertical-align: middle;">Tidak Sakit</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 1');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">2</td>
                            <td style="vertical-align: middle;">Jantung</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 2');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">3</td>
                            <td style="vertical-align: middle;">Lever </td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 3');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">4</td>
                            <td style="vertical-align: middle;">Paru - Paru</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 4');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">5</td>
                            <td style="vertical-align: middle;">Kangker</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 5');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 5');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 5');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">6</td>
                            <td style="vertical-align: middle;">Stroke </td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 6');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 6');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 6');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">7</td>
                            <td style="vertical-align: middle;">Diabetes</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 7');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 7');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 7');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">8</td>
                            <td style="vertical-align: middle;">Ginjal</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 8');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 8');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 8');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">9</td>
                            <td style="vertical-align: middle;">Malaria </td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 9');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 9');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 9');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>
                            <td style="vertical-align: middle;">10</td>
                            <td style="vertical-align: middle;">Lainnya</td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id = 10');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $j; ?> </td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = 10');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $l; ?></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = 10');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><?= $pr; ?></td>
                            <?php endforeach; ?>
                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total Belum Mengisi</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where  kddesa=' . $kddesa . ' AND sakit_menahun_id= ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id = ""');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                          <tr>


                            <td colspan="2" style="vertical-align: middle; text-align: center;"><b>Total</b></td>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where  kddesa=' . $kddesa . ' AND sakit_menahun_id != ""');
                            $results = $query->getRowArray();
                            foreach ($results as $j) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $j; ?> </b></td>
                            <?php endforeach; ?>

                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 1 AND sakit_menahun_id != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $l) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $l; ?></b></td>
                            <?php endforeach; ?>
                            <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex = 2 AND sakit_menahun_id != "" ');
                            $results = $query->getRowArray();
                            foreach ($results as $pr) : ?>
                              <td style="vertical-align: middle; text-align: center;"><b><?= $pr; ?></b></td>
                            <?php endforeach; ?>

                          </tr>
                        </tbody>
                      </table>
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
<script>
  // Create the chart
  Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Usia'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "Balita (0 - 5)",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) <= 5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Anak - Anak (5 - 17)",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) >  5 AND YEAR(curdate()) - YEAR(tanggallahir) <=  17');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Dewasa (18 - 30)",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) >  17 AND YEAR(curdate()) - YEAR(tanggallahir) <=  30');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Tua (31- 120)",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND YEAR(curdate()) - YEAR(tanggallahir) >  30 AND YEAR(curdate()) - YEAR(tanggallahir) <=  120');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container2', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Pendidikan Dalam KK'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category',

    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        pointPadding: -0.1,
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "TIDAK / BELUM SEKOLAH",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "BELUM TAMAT SD/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "TAMAT SD / SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SLTP/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SLTA / SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "DIPLOMA I / II",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=6');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "AKADEMI/ DIPLOMA III/S. MUDA",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=7');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "DIPLOMA IV/ STRATA I",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=8');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "STRATA II",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=9');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "STRATA III",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_pendidikan_kk=10');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container3', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Pendidikan Sedang DItempuh'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category',

    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        pointPadding: -0.1,
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "BELUM MASUK TK/KELOMPOK BERMAIN",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG TK/KELOMPOK BERMAIN",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "TIDAK PERNAH SEKOLAH",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG SD/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "TIDAK TAMAT SD/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG SLTP/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=6');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG SLTA/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=7');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG  D-1/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=8');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG D-2/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=9');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG D-3/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=10');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG S-1/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=11');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG S-2/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=12');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG S-3/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=13');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG SLB A/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=14');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG SLB B/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=15');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "SEDANG SLB C/SEDERAJAT",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=16');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "TIDAK DAPAT MEMBACA DAN MENULIS HURUF LATIN/ARAB",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=17');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "TIDAK SEDANG SEKOLAH",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND pendidikan_sedang_id=18');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },

      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container5', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Status Kawin'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "Belum Kawin",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Kawin",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cerai Hidup",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cerai Mati",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND status_kawin=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container6', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Agama'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "Islam",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Kristen",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Khatolik",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Buddha",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Hindu",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Kong Hu Chu",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND agama_id=6');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container7', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Jenis Kelamin'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "Laki - Laki",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Perempuan",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sex=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },

      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container8', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Warga Negara'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "WNI",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "WNA",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Dua Kewarganegaraan",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND warganegara_id=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
      ]
    }],
  });
</script>

<script>
  // Create the chart
  Highcharts.chart('container10', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Golongan Darah'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "A",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "B",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "AB",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "O",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "A+",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "A-",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=6');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "B+",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=7');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "B-",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=8');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "AB+",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=9');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "AB-",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=10');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "O+",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=11');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "O-",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=12');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Tidak Tahu",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND id_golongan=13');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container11', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Penyandang Cacat'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "Cacat Fisik",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cacat Fisik",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cacat Rungu/Wicara",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cacat Mental/Jiwa",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cacat Fisik dan Mental",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Cacat Lainnya	",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=6');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Tidak Cacat",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND cacat_id=7');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },

      ]
    }],
  });
</script>
<script>
  // Create the chart
  Highcharts.chart('container12', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Pengelompokan Menurut Sakit Menahun'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      }
    },
    xAxis: {
      type: 'category'
    },

    legend: {
      enabled: false
    },
    plotOptions: {
      series: {
        borderWidth: 1,
        dataLabels: {
          enabled: true,
          format: '{point.y} Orang'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> Orang<br/>'
    },

    series: [{
      name: "Jenis Kelompok",
      colorByPoint: true,
      data: [{
          name: "Tidak Sakit",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=1');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Jantung",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=2');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Lever",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=3');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Paru - Paru",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=4');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Kangker",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=5');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Stroke",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=6');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Diabetes",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=7');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Ginjal",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=8');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Malaria",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=9');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },
        {
          name: "Lainnya",
          y: <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where kddesa=' . $kddesa . ' AND sakit_menahun_id=10');
              $results = $query->getRowArray();
              foreach ($results as $j) : ?>

          <?= $j; ?> <?php endforeach; ?>,

        },

      ]
    }],
  });
</script>

<!-- /.content-wrapper -->

<?php $this->Endsection(); ?>