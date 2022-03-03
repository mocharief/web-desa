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

          <h4 class="page-title">Data Kebudayaan</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('budaya/update/' . $budaya['id_budaya']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managekebudayaan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-4 col-form-label">Judul*</label>
              <div class="col-8">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul budaya" value="<?php echo $budaya['judul']; ?>" required>
              </div>
            </div>
            <div class=" form-group  row">
              <label for="inputEmail3" class="col-4 col-form-label">Kategori*</label>
              <div class="col-8">
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">Pilih Kategori</option>
                  <?php foreach ($kat as $d) : ?>
                    <option value="<?php echo $d['id_kat'] ?>" <?php if ($budaya['id_kat'] == $d['id_kat']) {
                                                                  echo "selected";
                                                                } ?>>
                      <?php echo $d['kategori'] ?>
                    <?php endforeach; ?>

                </select>
              </div>
            </div>
            <div class=" form-group  row">
              <label for="inputEmail3" class="col-4 col-form-label">Kategori*</label>
              <div class="col-8">
                <select name="tipe" id="tipe" class="form-control" required>


                  <option value="1" <?php if ($budaya['tipe'] == "1") {
                                      echo "selected";
                                    } ?>>
                    Image</option>
                  <option value="2" <?php if ($budaya['tipe'] == "2") {
                                      echo "selected";
                                    } ?>>
                    Video</option>

                </select>
              </div>
            </div>
            <input type="hidden" id="namalama" name="namalama" value="<?php echo $budaya['data']; ?>">
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" placeholder="Nama Kategori" autocomplete="off" value="<?= $kddesa; ?>">
            <div class="form-group row">
              <label for="inputEmail3" class="col-4 col-form-label">File Sebelumnya </label>
              <div class="col-8">
                <?php if ($budaya['data'] == '') {
                  echo " <h6>Tidak Ada Data</h6>";
                } else {
                  if ($budaya['tipe'] == '1') {
                    echo "<div class='input-group'>
                <img src='" .  base_url('public/admin/images/budaya/' . $kddesa . '/' . $budaya['data']) . "' width='40%'>
              </div>  <br> ";
                  } else {
                    echo "<div class='input-group'>
                <video src='" .  base_url('public/admin/images/budaya/' . $kddesa . '/'  . $budaya['data']) . "' width='40%'>
              </div> </video> <br> ";
                  }
                } ?>
              </div>

            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-4 col-form-label"> </label>

              <div class="col-8">
                <input type="file" name="data" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-4 col-form-label">Deskripsi* </label>
              <div class="col-8">
                <textarea type="text" id="ckeditor" class="form-control" name="isi" required><?php echo $budaya['isi']; ?></textarea>
              </div>
            </div>
            <div class="form-group mb-0 justify-content-end row">
              <div class="col-8">
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