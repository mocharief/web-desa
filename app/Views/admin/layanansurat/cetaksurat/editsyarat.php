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

          <h4 class="page-title">Daftar Persyaratan Surat</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/syarat/update/' . $syarat['ref_syarat_id']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-8">
          <div class="card-box">
            <a href="<?= base_url('/managepersyaratan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Dokumen</label>
              <div class="col-9">
                <input type="text" class="form-control" id="dokumen" name="dokumen" value="<?= $syarat['ref_syarat_nama']; ?>">
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