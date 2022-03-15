<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>


<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Salinan Kartu Keluarga</h4>
        </div>
      </div>
    </div>

    <?= csrf_field(); ?>
    <div class="row">
      <div class="col-md-12">
        <div class="card-box">
          <a href="<?php echo base_url('viewkeluarga/' . $kk['id_kk']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Anggota Keluarga
            </button></a>
          <a href="<?php echo base_url('managekeluarga'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Kepala Keluarga
            </button></a>
          <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" onclick="printDiv('printMe')">
            <i class="fas fa-print"></i> &nbsp; Cetak
          </button>
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
      <div class="col-md-12" id="printMe">
        <div class="card-box">
          <h3 style="text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">SALINAN KARTU KELUARGA</h3>
          <h5 style="text-align: center; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">No. <?= $kk['no_kk']; ?></h5>
          <br>
          <table class="dt-responsive nowrap" style="width: 100%;">
            <tbody>


              <tr>

                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> ALAMAT</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;">
                  <?= $alamat['namadusun']; ?>
                </td>
                <td style="vertical-align: middle; width: 30%; color: black; font-weight: bold; font-size: smaller;"> </td>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> KABUPATEN</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;"> <?= $identitas['nama_kabupaten']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> RT / RW</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;"> <?= $alamat['rt']; ?> / <?= $alamat['rw']; ?></td>
                <td style="vertical-align: middle; width: 30%; color: black; font-weight: bold; font-size: smaller;"> </td>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> KODE POS</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;"> <?= $identitas['kode_pos']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> DESA / KELURAHAN</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;"> <?= $identitas['nama_desa']; ?></td>
                <td style="vertical-align: middle; width: 30%; color: black; font-weight: bold; font-size: smaller;"> </td>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> PROVINSI</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;"> <?= $identitas['nama_propinsi']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> KECAMATAN</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold; font-size: smaller;"> a</td>
                <td style="vertical-align: middle; width: 30%; color: black; font-weight: bold; font-size: smaller;"> </td>
                <td style="vertical-align: middle; width: 15%; color: black; font-weight: bold; font-size: smaller;"> JUMLAH ANGGOTA</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold; font-size: smaller;"> :</td>

                <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where id_kk=' . $kk['id_kk']);
                $results = $query->getRowArray();
                foreach ($results as $l) : ?>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $l; ?></td>
                <?php endforeach; ?>
              </tr>
            </tbody>
          </table>
          <br>
          <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%; font-size: smaller;text-align: center;">No</th>
                <th style="font-size: smaller; text-align: center;">Nama Lengkap</th>
                <th style="font-size: smaller;text-align: center;">Nik</th>
                <th style="font-size: smaller;text-align: center;">Jenis Kelamin</th>
                <th style="font-size: smaller;text-align: center;">Tempat Lahir</th>
                <th style="font-size: smaller;text-align: center;">Tanggal Lahir</th>
                <th style="font-size: smaller;text-align: center;">Agama</th>
                <th style="font-size: smaller;text-align: center;">Pendidikan</th>
                <th style="font-size: smaller;text-align: center;">Jenis Pekerjaan</th>
                <th style="font-size: smaller;text-align: center;">Golongan Darah</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($keluarga as $p) : ?>
                <tr>

                  <td style="vertical-align: middle; font-size: smaller;"><?= $i++; ?></td>
                  <td style="vertical-align: middle; font-size: smaller;"><?= $p['nama']; ?></td>
                  <td style="vertical-align: middle; font-size: smaller;"><?= $p['nik']; ?></td>
                  <td style="vertical-align: middle; font-size: smaller;">
                    <?php if ($p['sex'] == '1') {
                      echo "Laki - Laki";
                    } else if ($p['sex'] == '2') {
                      echo "Perempuan";
                    }

                    ?></td>
                  <td style="vertical-align: middle; font-size: smaller;"><?= $p['tempatlahir']; ?></td>

                  <td style="vertical-align: middle; font-size: smaller;">
                    <?php
                    $dt = explode('-', $p['tanggallahir']);
                    echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                    ?></td>
                  <td style="vertical-align: middle; font-size: smaller;">
                    <?php foreach ($agama as $d) : ?>
                      <?php if ($p['agama_id'] == $d['agama_id']) {
                      ?>
                        <?php echo $d['agama']; ?>

                      <?php } ?>

                    <?php endforeach; ?></td>

                  <td style="vertical-align: middle; font-size: smaller;">
                    <?php if ($p['sex'] == '1') {
                      echo "Laki - Laki";
                    } else if ($p['sex'] == '2') {
                      echo "Perempuan";
                    }

                    ?></td>

                  <td style="vertical-align: middle; font-size: smaller;">
                    <?php foreach ($pekerjaan as $d) : ?>
                      <?php if ($p['id_pekerjaan'] == $d['id_pekerjaan']) {
                      ?>
                        <?php echo $d['nama_pekerjaan']; ?>

                      <?php } ?>

                    <?php endforeach; ?>
                  </td>
                  <td style="vertical-align: middle; font-size: smaller; text-align: center;">
                    <?php foreach ($golongan as $d) : ?>
                      <?php if ($p['id_golongan'] == $d['id_golongan']) {
                      ?>
                        <?php echo $d['nama_golongan']; ?>

                      <?php } ?>

                    <?php endforeach; ?>
                  </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%; font-size: smaller;text-align: center;">No</th>
                <th style="font-size: smaller;text-align: center;">Status Perkawinan</th>
                <th style="font-size: smaller;text-align: center;">Tanggal Perkawinan</th>
                <th style="font-size: smaller;text-align: center;">Status Hubungan dalam Keluarga</th>
                <th style="font-size: smaller;text-align: center;">Kewarganegaraan</th>
                <th style="font-size: smaller;text-align: center;">No Pasport</th>
                <th style="font-size: smaller;text-align: center;">No. KITAS/KITAP</th>
                <th style="font-size: smaller;text-align: center;">Nama Ayah</th>
                <th style="font-size: smaller;text-align: center;">Nama Ibu</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($keluarga as $p) : ?>

                <tr>

                  <td style="vertical-align: middle; font-size: smaller;"><?= $i++; ?></td>
                  <td style="vertical-align: middle; font-size: smaller;">
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
                  <td style="vertical-align: middle; font-size: smaller; text-align: center;">

                    <?php if ($p['tanggalperkawinan'] != 0) {
                    ?>
                      <?php $dt = explode('-', $p['tanggalperkawinan']);
                      echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                      ?>
                    <?php } else {
                      echo "-";
                    } ?>

                  </td>
                  <td style="vertical-align: middle; font-size: smaller;"> <?php foreach ($hubungan as $d) : ?>
                      <?php if ($p['kk_level'] == $d['id_hubungan']) {
                      ?>
                        <?php echo $d['nama_hubungan']; ?>

                      <?php } ?>

                    <?php endforeach; ?>

                  </td>
                  <td style="vertical-align: middle; text-align: center; font-size: smaller;">
                    <?php if ($p['warganegara_id'] == 1) {
                      echo 'WNI';
                    } ?>
                    <?php if ($p['warganegara_id'] == 2) {
                      echo 'WNA';
                    } ?>
                    <?php if ($p['warganegara_id'] == 3) {
                      echo 'Dua Kewarganegaraan';
                    } ?>
                  </td>
                  <td style="vertical-align: middle;font-size: smaller;"><?= $p['dokumen_pasport']; ?></td>
                  <td style="vertical-align: middle;font-size: smaller;"><?= $p['dokumen_kitas']; ?></td>
                  <td style="vertical-align: middle;font-size: smaller;"><?= $p['nama_ayah']; ?></td>
                  <td style="vertical-align: middle;font-size: smaller;"><?= $p['nama_ibu']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>



<?php $this->Endsection(); ?>