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

          <h4 class="page-title">Data Program Bantuan</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('admin/bantuan/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managebantuan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke daftar Program Bantuan
              </button></a>
            <br> <br>


            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Sasaran Program</label>
              <div class="col-9">
                <select name="sasaran" id="sasaran" class="form-control <?= ($validation->hasError('sasaran')) ? 'is-invalid' : '';  ?>">
                  <option value="">Pilih Sasaran Program</option>
                  <option <?php if (old('sasaran') == 1) {
                            echo 'selected';
                          } ?> value="1">Penduduk / Perorangan
                  </option>
                  <option <?php if (old('sasaran') == 2) {
                            echo 'selected';
                          } ?> value="2">Keluarga - KK
                  </option>
                  <option <?php if (old('sasaran') == 3) {
                            echo 'selected';
                          } ?> value="3">UMKM
                  </option>

                </select>
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('sasaran'); ?></b>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Program</label>
              <div class="col-9">
                <input type="text" class="form-control <?= ($validation->hasError('namaprogram')) ? 'is-invalid' : '';  ?>" id="namaprogram" name="namaprogram" placeholder="Nama Program" value="<?= old('namaprogram'); ?>">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('namaprogram'); ?></b>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Isi Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan"><?= old('keterangan'); ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Asal Dana</label>
              <div class="col-9">
                <select name="asaldana" id="asaldana" class="form-control <?= ($validation->hasError('asaldana')) ? 'is-invalid' : '';  ?>">
                  <option value="">Pilih Asal Dana</option>
                  <option <?php if (old('asaldana') == 1) {
                            echo 'selected';
                          } ?> value="1">Pusat
                  </option>
                  <option <?php if (old('asaldana') == 2) {
                            echo 'selected';
                          } ?> value="2">Provinsi
                  </option>
                  <option <?php if (old('asaldana') == 3) {
                            echo 'selected';
                          } ?> value="3">Kab/Kota
                  </option>
                  <option <?php if (old('asaldana') == 4) {
                            echo 'selected';
                          } ?> value="4">Dana Desa
                  </option>
                  <option <?php if (old('asaldana') == 5) {
                            echo 'selected';
                          } ?> value="5">Lainnya
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('asaldana'); ?></b>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Rentang waktu</label>
              <div class="col-9">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input type="date" class="form-control <?= ($validation->hasError('tgl1')) ? 'is-invalid' : '';  ?>" id="inputEmail4" name="tgl1" placeholder="NIK" value="<?= old('tgl1'); ?>">
                    <div class="invalid-feedback">
                      <b> <?= $validation->getError('tgl1'); ?></b>
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                  <label for="inputPassword4" class="col-1 col-form-label" style="text-align: center;"> - </label>

                  <div class="form-group col-md-4">
                    <input type="date" class="form-control <?= ($validation->hasError('tgl2')) ? 'is-invalid' : '';  ?>" name="tgl2" placeholder="Nama Lengkap" value="<?= old('tgl2'); ?>">
                    <div class="invalid-feedback">
                      <b> <?= $validation->getError('tgl2'); ?></b>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Status</label>
              <div class="col-9">
                <select name="status" id="status" class="form-control  <?= ($validation->hasError('status')) ? 'is-invalid' : '';  ?>">
                  <option value="">Pilih Status</option>
                  <option <?php if (old('status') == 1) {
                            echo 'selected';
                          } ?> value="1">Aktif
                  </option>
                  <option <?php if (old('status') == 2) {
                            echo 'selected';
                          } ?> value="2">Tidak Aktif
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('status'); ?></b>
                </div>
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