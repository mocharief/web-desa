<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>


<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Slider</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('admin/gambarslider/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/manageslider'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Judul*</label>
              <div class="col-9">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Slider" required>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tipe File* </label>
              <div class="col-9">
                <select name="tipe" id="tipe" class="form-control" required>
                  <option value="1">Image</option>
                  <option value="2">Video</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">File* </label>
              <div class="col-9">
                <input type="file" name="data" class="form-control" required>
                <h6>Extensi yang diizinkan Image (jpg, png, gif, jpeg), Video (mp4)</h6>
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




</section>
<!-- /.content -->
</div>

<?php $this->Endsection(); ?>