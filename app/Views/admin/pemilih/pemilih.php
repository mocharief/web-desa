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
          <form method="get">
            <label>PILIH TANGGAL</label>
            <input type="date" name="tanggal">
            <input type="submit" value="FILTER">
          </form>

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