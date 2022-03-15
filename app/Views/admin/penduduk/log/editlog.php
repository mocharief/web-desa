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

          <h4 class="page-title">Data Log Penduduk</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('penduduk/updatelog/' . $log['id_log']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/logpenduduk'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Log Penduduk
              </button></a>
            <br> <br>


            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Status Dasar</label>
              <div class="col-9">
                <input type="hidden" name="namalama" class="form-control" value="<?= $log['id_peristiwa']; ?>" readonly>
                <input type="text" class="form-control" value="<?php if ($log['id_peristiwa'] == 2) {
                                                                  echo 'Meninggal';
                                                                } ?><?php if ($log['id_peristiwa'] == 3) {
                                                                                        echo 'Pindah';
                                                                                      } ?><?php if ($log['id_peristiwa'] == 4) {
                                                                                            echo 'Hilang';
                                                                                          } ?>" readonly>


              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tanggal Peristiwa</label>
              <div class="col-9">
                <input type="date" class="form-control" id="tgl1" name="tgl1" value="<?= $log['tgl_peristiwa']; ?>">

              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tanggal Lapor</label>
              <div class="col-9">
                <input type="date" class="form-control" id="tgl2" name="tgl2" value="<?= $log['tgl_lapor']; ?>">

              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Catatan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="catatan" name="catatan" placeholder="catatan"><?= $log['catatan']; ?></textarea>
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