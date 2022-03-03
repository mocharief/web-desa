<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Edit Headline</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card-box">
          <form action="<?php echo base_url('/text/updatetext/' . $text['id']); ?>" method="post" class="form-horizontal">
            <?= csrf_field(); ?>
            <div class="row">


              <div class="col-md-12">
                <div class="card-box">
                  <a href="<?= base_url('/managetext'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                      <i class="fas fa-arrow-left"></i> &nbsp; Kembali
                    </button></a>
                  <br> <br>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Isi Text Berjalan</label>
                    <div class="col-9">
                      <textarea rows="6" type="text" class="form-control" id="isi" name="isi" placeholder="Isi Text BErjalan"><?= $text['isi']; ?></textarea>
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
      </div> <!-- end col -->


    </div>
    <!-- /.content-wrapper -->
  </div>
  <?php $this->Endsection(); ?>