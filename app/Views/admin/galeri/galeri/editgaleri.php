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

          <h4 class="page-title">Data Galeri</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/galeri/update/' . $galeri['id_galeri']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?php echo base_url('viewgaleri/' . $galeri['id_album']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Judul</label>
              <div class="col-9">
                <input type="text" class="form-control" id="judul" name="judul" required value="<?= $galeri['judul']; ?>">
              </div>
            </div>

            <input type="hidden" class="form-control" id="id_album" name="id_album" value="<?= $galeri['id_album']; ?>" required>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $galeri['kddesa']; ?>" required>
            <input type="hidden" class="form-control" id="namalama" name="namalama" value="<?= $galeri['foto']; ?>" required>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label"></label>
              <div class="col-9">

                <img src="<?= base_url('public/admin/images/galeri/' . $galeri['kddesa'] . '/' . $galeri['foto']); ?>" width="20%">

              </div>

            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Ganti Foto</label>
              <div class="col-9">
                <input type="file" name="gambar" class="form-control">
                <h6>*) Kosongkan Jika Foto tidak Diubah</h6>
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