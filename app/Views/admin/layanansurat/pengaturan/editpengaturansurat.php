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

          <h4 class="page-title">Format Surat Desa</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/pengaturansurat/update/' . $pengaturansurat['id_format_surat']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managepengaturan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kode Surat</label>
              <div class="col-9">
                <input type="text" class="form-control" id="kode" name="kode" value="<?= $pengaturansurat['kode_surat']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class=" col-3 col-form-label">Tampilkan Di Layanan Mandiri</label>
              <div class="col-9">
                <select name="mandiri" id="mandiri" class="form-control">
                  <option value="">Pilih Status</option>
                  <option <?php if ($pengaturansurat['mandiri'] == 1) {
                            echo 'selected';
                          } ?> value="1">Aktif
                  </option>
                  <option <?php if ($pengaturansurat['mandiri'] == 0) {
                            echo 'selected';
                          } ?> value="0">Tidak Aktif
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class=" col-3 col-form-label">Persyaratan</label>
              <div class="col-9">
                <?php foreach ($persyaratan as $p) : ?>
                  <div class="custom-control custom-checkbox">


                    <input type="checkbox" class="custom-control-input" id="customCheck<?= $p['ref_syarat_id']; ?>" name="id_syarat[]" value="<?= $p['ref_syarat_id']; ?>" <?php foreach ($syarat as $s) : ?> <?php if ($s['id_syarat'] == $p['ref_syarat_id']) {
                                                                                                                                                                                                                echo 'checked="checked"';
                                                                                                                                                                                                              } else {
                                                                                                                                                                                                                echo "";
                                                                                                                                                                                                              } ?><?php endforeach; ?>>
                    <label class="custom-control-label" for="customCheck<?= $p['ref_syarat_id']; ?>"><?= $p['ref_syarat_nama']; ?></label>

                  </div>

                <?php endforeach; ?>
              </div>
            </div>
            <input type="hidden" name="id_format_surat" value="<?= $pengaturansurat['id_format_surat']; ?>">
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Masa Berlaku</label>
              <div class="col-1">
                <input type="number" class="form-control" id="masa_berlaku" name="masa_berlaku" value="<?= $pengaturansurat['masa_berlaku']; ?>" min="1" max="31">
                <h6>Max 1 - 31</h6>
              </div>
              <div class="col-3">
                <select name="satuan_masa_berlaku" id="satuan_masa_berlaku" class="form-control" required>

                  <option <?php if ($pengaturansurat['satuan_masa_berlaku'] == "DAY") {
                            echo 'selected';
                          } ?> value="DAY">HARI
                  </option>
                  <option <?php if ($pengaturansurat['satuan_masa_berlaku'] == "WEEK") {
                            echo 'selected';
                          } ?> value="WEEK">MINGGU
                  </option>
                  <option <?php if ($pengaturansurat['satuan_masa_berlaku'] == "MONTH") {
                            echo 'selected';
                          } ?> value="MONTH">BULAN
                  </option>
                  <option <?php if ($pengaturansurat['satuan_masa_berlaku'] == "YEAR") {
                            echo 'selected';
                          } ?> value="YEAR">TAHUN
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