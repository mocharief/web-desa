<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Penerima Bantuan</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('penerima/update/' . $penerima['id_penerima']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('viewpenerima/' . $penerima['id_program']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>
            <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">
              <thead>
                <tr>
                  <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">Rincian Program</th>


                </tr>
              </thead>


              <tbody>


                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Program</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $penerima['nama_program']; ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Sasaran Program</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;">
                    <?php if ($penerima['sasaran'] == '1') {
                      echo "Penduduk / Perorangan";
                    } else if ($penerima['sasaran'] == '2') {
                      echo "Keluarga - KK";
                    } else if ($penerima['sasaran'] == '3') {
                      echo "UMKM";
                    }

                    ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Masa Berlaku </td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;">
                    <?php
                    $dt = explode('-', $penerima['tgl1']);
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

                    ?> -
                    <?php
                    $dt = explode('-', $penerima['tgl2']);
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
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Keterangan</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $penerima['keterangan']; ?></td>
                </tr>
              </tbody>
            </table>
            <br><br>
            <h5>Tambah Peserta Bantuan</h5>
            <hr>
            <input type="hidden" class="form-control" id="id_program" name="id_program" required placeholder="Nama UMKM" required value="<?= $penerima['id_program'] ?>">

            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Penduduk</label>
              <div class="col-9">

                <input type="text" class="form-control" value=" <?php foreach ($penduduk as $d) : ?><?php if ($penerima['id'] == $d['id']) { ?>  <?= $d['nama']; ?> - <?= $d['nik']; ?> <?php } ?> <?php endforeach; ?>" readonly>


              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No Peserta</label>
              <div class="col-9">
                <input type="text" class="form-control" id="no_peserta" name="no_peserta" value="<?= $penerima['no_peserta']; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Gambar Kartu Peserta</label>
              <div class="col-9">
                <input type="hidden" class="form-control" id="namalama" name="namalama" value="<?= $penerima['foto']; ?>">
                <?php if ($penerima['foto'] != '') {
                ?>
                  <img src="<?= base_url('public/admin/images/penerima/' . $penerima['foto']); ?>" width="20%">
                <?php  } else {
                  echo "Kartu Peserta Belum di Upload";
                }
                ?>
                <br> <br>
                <input type="file" name="gambar" class="form-control">
                <span>*) Kosongkan jika tidak ingin mengunggah gambar</span>
              </div>
            </div>
            <div class="form-group mb-0 justify-content-end row">
              <div class="col-9">
                <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
              </div>
            </div>
          </div>
        </div>


      </div>
    </form>
  </div>
</div>

<?php $this->Endsection(); ?>