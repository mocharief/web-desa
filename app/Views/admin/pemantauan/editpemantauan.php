<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
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
    <form action="<?php echo base_url('bantuan/update/' . $bantuan['id_program']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managebantuan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke daftar Program Bantuan
              </button></a>
            <br> <br>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Sasaran Program</label>
              <div class="col-9">
                <input type="hidden" name="namalama" class="form-control" value="<?= $bantuan['sasaran']; ?>" readonly>
                <input type="text" class="form-control" value="<?php if ($bantuan['sasaran'] == '1') {
                                                                  echo "Penduduk / Perorangan";
                                                                } else if ($bantuan['sasaran'] == '2') {
                                                                  echo "Keluarga - KK";
                                                                } else if ($bantuan['sasaran'] == '3') {
                                                                  echo "UMKM";
                                                                }

                                                                ?>" readonly>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Program</label>
              <div class="col-9">
                <input type="text" class="form-control" id="namaprogram" name="namaprogram" placeholder="Nama Program" value="<?= $bantuan['nama_program']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Isi Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan"><?= $bantuan['keterangan']; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Asal Dana</label>
              <div class="col-9">
                <select name="asaldana" id="asaldana" class="form-control" required>
                  <option value="">Pilih Asal Dana</option>
                  <option <?php if ($bantuan['status'] == 1) {
                            echo 'selected';
                          } ?> value="1">Pusat
                  </option>
                  <option <?php if ($bantuan['status'] == 2) {
                            echo 'selected';
                          } ?> value="2">Provinsi
                  </option>
                  <option <?php if ($bantuan['status'] == 3) {
                            echo 'selected';
                          } ?> value="3">Kab/Kota
                  </option>
                  <option <?php if ($bantuan['status'] == 4) {
                            echo 'selected';
                          } ?> value="4">Dana Desa
                  </option>
                  <option <?php if ($bantuan['status'] == 5) {
                            echo 'selected';
                          } ?> value="5">Lainnya
                  </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Rentang waktu</label>
              <div class="col-9">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <input type="date" class="form-control" id="inputEmail4" name="tgl1" placeholder="NIK" value="<?= $bantuan['tgl1'];  ?>">
                  </div>

                  <label for="inputPassword4" class="col-1 col-form-label" style="text-align: center;"> - </label>

                  <div class="form-group col-md-4">
                    <input type="date" class="form-control" name="tgl2" value="<?= $bantuan['tgl2'];  ?>" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Status</label>
              <div class="col-9">
                <select name="status" id="status" class="form-control" required>
                  <option value="">Pilih Status</option>
                  <option <?php if ($bantuan['status'] == 1) {
                            echo 'selected';
                          } ?> value="1">Aktif
                  </option>
                  <option <?php if ($bantuan['status'] == 2) {
                            echo 'selected';
                          } ?> value="2">Tidak Aktif
                  </option>


                </select>
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