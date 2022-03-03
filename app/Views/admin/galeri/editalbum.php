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

          <h4 class="page-title">Data Galeri Album</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('album/update/' . $album['id_album']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-8">
          <div class="card-box">
            <a href="<?= base_url('/managealbum'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-5 col-form-label">Judul</label>
              <div class="col-7">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Album" value="<?php echo $album['judul']; ?>" required>
              </div>
            </div>
            <div class=" form-group row">
              <label for="inputEmail3" class="col-5 col-form-label">Kategori</label>
              <div class="col-7">
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">Pilih Kategori</option>
                  <?php foreach ($kat as $d) : ?>
                    <option value="<?php echo $d['id_kat'] ?>" <?php if ($album['id_kat'] == $d['id_kat']) {
                                                                  echo "selected";
                                                                } ?>>
                      <?php echo $d['kategori'] ?>
                    <?php endforeach; ?>

                </select>
              </div>
            </div>

            <div class="form-group mb-0 justify-content-end row">
              <div class="col-7">
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