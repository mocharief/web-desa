<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Kepala Keluarga</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('kk/update/' . $kk['id_kk']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managekeluarga'); ?>"><button type=" button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No KK</label>
              <div class="col-9">
                <input type="text" class="form-control" id="no_kk" name="no_kk" value="<?= $kk['no_kk']; ?>" required>
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