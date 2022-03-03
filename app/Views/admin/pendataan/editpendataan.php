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

          <h4 class="page-title">Data Pendataan Covid 19</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('pemudik/update/' . $pendataan['id_terdata']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">

            <a href="<?= base_url('/managependataan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Pendataan Covid-19
              </button></a>
            <br> <br>
            <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">


              <thead>
                <tr>
                  <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">Ubah Data Pemudik</th>


                </tr>
              </thead>


              <tbody>

                <?php foreach ($penduduk as $d) : ?>
                  <?php if ($pendataan['id'] == $d['id']) { ?>
                    <tr>
                      <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NIK</td>
                      <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                      <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $d['nik']; ?></td>
                    </tr>
                    <tr>
                      <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NAMA</td>
                      <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                      <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $d['nama']; ?></td>
                    </tr>
                    <input type="hidden" name="namalama" class="form-control" value="<?= $pendataan['id']; ?>" readonly>

                  <?php } ?>
                <?php endforeach; ?>
              </tbody>

            </table>


            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Asal Pemudik / Tiba Tanggal</label>

              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="asal_mudik" name="asal_mudik" value="<?= $pendataan['asal_mudik']; ?>" required>

              </div>
              <div class="form-group col-md-5">

                <input type="date" class="form-control" id="tgl_tiba" name="tgl_tiba" placeholder="Nama Penduduk" value="<?= $pendataan['tgl_datang']; ?>" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Tujuan Mudik / Durasi Mudik</label>

              </div>
              <div class="form-group col-md-4">

                <select name="tujuan_mudik" id="tujuan_mudik" class="form-control" required>
                  <option value="">-- Pilih Tujuan Mudik --</option>
                  <option <?php if ($pendataan['tujuan_mudik'] == 1) {
                            echo 'selected';
                          } ?> value="1">Liburan
                  </option>
                  <option <?php if ($pendataan['tujuan_mudik'] == 2) {
                            echo 'selected';
                          } ?> value="2">Menjenguk Keluarga
                  </option>
                  <option <?php if ($pendataan['tujuan_mudik'] == 3) {
                            echo 'selected';
                          } ?> value="3">Pulang Kampung
                  </option>
                  <option <?php if ($pendataan['tujuan_mudik'] == 4) {
                            echo 'selected';
                          } ?> value="4">Dll
                  </option>
                </select>
              </div>
              <div class="form-group col-md-5">

                <input type="text" class="form-control" id="durasi_mudik" name="durasi_mudik" placeholder="Jumlah Hari (angka)" value="<?= $pendataan['durasi_mudik']; ?>" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Kontak Pemudik (Hp/Email)</label>

              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $pendataan['no_hp']; ?>" required>

              </div>
              <div class="form-group col-md-5">

                <input type="email" class="form-control" id="email" name="email" value="<?= $pendataan['email_penduduk']; ?>">
              </div>
            </div>
            <div class=" form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Status Covid</label>
              <div class="col-9">
                <select name="status_covid" id="status_covid" class="form-control" required>
                  <option value="">Pilih Status Covid</option>
                  <option <?php if ($pendataan['status_covid'] == 1) {
                            echo 'selected';
                          } ?> value="1">Orang dalam Pemantauan (ODP)
                  </option>
                  <option <?php if ($pendataan['status_covid'] == 2) {
                            echo 'selected';
                          } ?> value="2">Pasien dalam Pengawasan (PDP)
                  </option>
                  <option <?php if ($pendataan['status_covid'] == 3) {
                            echo 'selected';
                          } ?> value="3">Orang dalam Resiko (ODR)
                  </option>
                  <option <?php if ($pendataan['status_covid'] == 4) {
                            echo 'selected';
                          } ?> value="4">Orang tanpa Gejala (OTG)
                  </option>
                  <option <?php if ($pendataan['status_covid'] == 5) {
                            echo 'selected';
                          } ?> value="5">Positif Covid-19
                  </option>
                  <option <?php if ($pendataan['status_covid'] == 6) {
                            echo 'selected';
                          } ?> value="6">DLL
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Apakah Wajib di Pantau</label>
              <div class="col-9">
                <select name="wajib_pantau" id="wajib_pantau" class="form-control" required>

                  <option <?php if ($pendataan['wajib_pantau'] == 1) {
                            echo 'selected';
                          } ?> value="1">Ya
                  </option>
                  <option <?php if ($pendataan['wajib_pantau'] == 2) {
                            echo 'selected';
                          } ?> value="2">Tidak
                  </option>
                </select>
                <h6>Jika ya, daftar warga ini masuk dalam daftar warga yang dipantau di menu Pemantauan.</h6>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keluhan Kesehatan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keluhan" name="keluhan"><?= $pendataan['keluhan_kesehatan']; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keterangan" name="keterangan"><?= $pendataan['keterangan']; ?></textarea>
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