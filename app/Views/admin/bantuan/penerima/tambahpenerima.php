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
    <form action="<?php echo base_url('/admin/bantuan/simpanpenerima'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('viewpenerima/' . $bantuan['id_program']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
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
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $bantuan['nama_program']; ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Sasaran Program</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;">
                    <?php if ($bantuan['sasaran'] == '1') {
                      echo "Penduduk / Perorangan";
                    } else if ($bantuan['sasaran'] == '2') {
                      echo "Keluarga - KK";
                    } else if ($bantuan['sasaran'] == '3') {
                      echo "UMKM";
                    }

                    ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Masa Berlaku </td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;">
                    <?php
                    $dt = explode('-', $bantuan['tgl1']);
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
                    $dt = explode('-', $bantuan['tgl2']);
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
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $bantuan['keterangan']; ?></td>
                </tr>
              </tbody>
            </table>
            <br><br>
            <h5>Tambah Peserta Bantuan</h5>
            <hr>
            <input type="hidden" class="form-control" id="id_program" name="id_program" required placeholder="Nama UMKM" required value="<?= $bantuan['id_program'] ?>">


            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Penduduk</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2" required>
                  <option>Pilih Nama Penduduk</option>
                  <?php if ($bantuan['sasaran'] == '1') {
                  ?>
                    <?php $query   = $db->query('SELECT id, nik, nama from penduduk Where id NOT IN(SELECT id FROM penerima) AND kddesa=' . $kddesa);

                    $results = $query->getResultArray();
                    foreach ($results as $d) : ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                    <?php endforeach; ?>
                  <?php } else if ($bantuan['sasaran'] == '2') {
                  ?>
                    <?php foreach ($kk as $d) : ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                    <?php endforeach; ?>
                  <?php
                  } else if ($bantuan['sasaran'] == '3') {
                  ?>
                    <?php foreach ($umkm as $d) : ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                    <?php endforeach; ?>
                  <?php
                  }


                  ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No Peserta</label>
              <div class="col-9">
                <input type="text" class="form-control" id="no_peserta" name="no_peserta" placeholder="NO Peserta" required>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Gambar Kartu Peserta</label>
              <div class="col-9">
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
<script>
  $('#kewarganegaraan').on('change', (event) => {
    getPenduduk(event.target.value).then(penduduk => {
      $('#nik').val(penduduk.nik);
      $('#nama').val(penduduk.nama);
      $('#alamat').val(penduduk.alamat);
    });
  });

  async function getPenduduk(id) {
    let response = await fetch('/api/bantuan/' + id)
    let data = await response.json();
    return data;

  }
</script>
<?php $this->Endsection(); ?>