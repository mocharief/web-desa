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
    <form action="<?php echo base_url('admin/pendataan/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managependataan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Pendataan Covid-19
              </button></a>
            <br> <br>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">NIK / Nama</label>

              </div>
              <div class="form-group col-md-9">

                <select name="nama" id="nama" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : '';  ?>" data-toggle="select2">
                  <option>-- Cari secara NIK/ Nama Penduduk-- </option>
                  <?php foreach ($penduduk as $d) : ?>
                    <option value="<?php echo $d['id'] ?>" <?php if (old('nama') == $d['id']) {
                                                              echo "selected";
                                                            } ?>>
                      <?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('nama'); ?></b>
                </div>
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Asal Pemudik / Tiba Tanggal</label>

              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control  <?= ($validation->hasError('asal_mudik')) ? 'is-invalid' : '';  ?>" id="asal_mudik" name="asal_mudik" placeholder="Kota" value="<?= old('asal_mudik'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('asal_mudik'); ?></b>
                </div>
              </div>

              <input type="hidden" class="form-control" id="kddesa" name="kddesa" placeholder="Kota" value="<?= $kddesa; ?>">


              <div class="form-group col-md-5">

                <input type="date" class="form-control  <?= ($validation->hasError('tgl_tiba')) ? 'is-invalid' : '';  ?>" id="tgl_tiba" name="tgl_tiba" placeholder="Nama Penduduk" value="<?= old('tgl_tiba'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('tgl_tiba'); ?></b>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Tujuan Mudik / Durasi Mudik</label>

              </div>
              <div class="form-group col-md-4">

                <select name="tujuan_mudik" id="tujuan_mudik" class="form-control  <?= ($validation->hasError('tujuan_mudik')) ? 'is-invalid' : '';  ?>">
                  <option value="">-- Pilih Tujuan Mudik --</option>
                  <option <?php if (old('tujuan_mudik') == 1) {
                            echo 'selected';
                          } ?> value="1">Liburan
                  </option>
                  <option <?php if (old('tujuan_mudik') == 2) {
                            echo 'selected';
                          } ?> value="2">Menjenguk Keluarga
                  </option>
                  <option <?php if (old('tujuan_mudik') == 3) {
                            echo 'selected';
                          } ?> value="3">Pulang Kampung
                  </option>
                  <option <?php if (old('tujuan_mudik') == 4) {
                            echo 'selected';
                          } ?> value="4">Dll
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('tujuan_mudik'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-5">

                <input type="text" class="form-control  <?= ($validation->hasError('durasi_mudik')) ? 'is-invalid' : '';  ?>" id="durasi_mudik" name="durasi_mudik" placeholder="Jumlah Hari (angka)" maxlength="3" value="<?= old('durasi_mudik'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('durasi_mudik'); ?></b>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Kontak Pemudik (Hp/Email)</label>

              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control  <?= ($validation->hasError('no_hp')) ? 'is-invalid' : '';  ?>" id="no_hp" name="no_hp" placeholder="No HP" value="<?= old('no_hp'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('no_hp'); ?></b>
                </div>

              </div>
              <div class="form-group col-md-5">

                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= old('email'); ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Status Covid</label>
              <div class="col-9">
                <select name="status_covid" id="status_covid" class="form-control  <?= ($validation->hasError('status_covid')) ? 'is-invalid' : '';  ?>">
                  <option value="">Pilih Status Covid</option>
                  <option <?php if (old('status_covid') == 1) {
                            echo 'selected';
                          } ?> value="1">Orang dalam Pemantauan (ODP)
                  </option>
                  <option <?php if (old('status_covid') == 2) {
                            echo 'selected';
                          } ?> value="2">Pasien dalam Pengawasan (PDP
                  </option>
                  <option <?php if (old('status_covid') == 3) {
                            echo 'selected';
                          } ?> value="3">Orang dalam Resiko (ODR)
                  </option>
                  <option <?php if (old('status_covid') == 4) {
                            echo 'selected';
                          } ?> value="4">Orang tanpa Gejala (OTG)
                  </option>
                  <option <?php if (old('status_covid') == 5) {
                            echo 'selected';
                          } ?> value="5">Positif Covid-19
                  </option>
                  <option <?php if (old('status_covid') == 6) {
                            echo 'selected';
                          } ?> value="6">Dll
                  </option>

                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('status_covid'); ?></b>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Apakah Wajib di Pantau</label>
              <div class="col-9">
                <select name="wajib_pantau" id="wajib_pantau" class="form-control  <?= ($validation->hasError('wajib_pantau')) ? 'is-invalid' : '';  ?>">

                  <option value="1">Ya</option>
                  <option value="2">Tidak</option>

                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('wajib_pantau'); ?></b>
                </div>
                <h6>Jika ya, daftar warga ini masuk dalam daftar warga yang dipantau di menu Pemantauan.</h6>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keluhan Kesehatan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan Kesehatan"><?= old('keluhan'); ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"><?= old('keterangan'); ?></textarea>
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