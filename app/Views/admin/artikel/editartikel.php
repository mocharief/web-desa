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

          <h4 class="page-title">Data artikel</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('artikel/update/' . $artikel['id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-8">
          <div class="card-box">
            <a href="<?= base_url('/manageartikel'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group">
              <label for="inputEmail3" class="col-6 col-form-label">Judul * (Wajib Diisi)</label>
              <div class="col-12">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul artikel" value="<?php echo $artikel['judul']; ?>" required>
              </div>
            </div>
            <div class=" form-group">
              <label for="inputEmail3" class="col-6 col-form-label">Kategori * (Wajib Diisi)</label>
              <div class="col-12">
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">Pilih Kategori</option>
                  <?php foreach ($kat as $d) : ?>
                    <option value="<?php echo $d['id_kat'] ?>" <?php if ($artikel['id_kat'] == $d['id_kat']) {
                                                                  echo "selected";
                                                                } ?>>
                      <?php echo $d['kategori'] ?>
                    <?php endforeach; ?>

                </select>
              </div>
            </div>
            <input type="hidden" id="namalama" name="namalama" value="<?php echo $artikel['gambar']; ?>">
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

            <div class="form-group">
              <label for="inputEmail3" class="col-6 col-form-label">Gambar Utama </label>
              <div class="col-12">
                <?php if ($artikel['gambar'] == '') {
                  echo " <h6>Tidak Ada Gambar</h6>";
                } else {
                  echo "<div class='input-group'>
                <img src='" .  base_url('public/admin/images/artikel/' . $kddesa . '/' . $artikel['gambar']) . "' width='40%'>
              </div>  <br> ";
                } ?>
              </div>

              <div class="col-12">
                <input type="file" name="gambar" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-6 col-form-label">Isi artikel * (Wajib Diisi)</label>
              <div class="col-12">
                <textarea type="text" id="ckeditor" class="form-control" name="isi" required><?php echo $artikel['isi']; ?></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class=" col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="card-widgets">

                <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="true" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>

              </div>
              <h5 class="card-title mb-0">Unggah Gambar Tambahan</h5>

              <div id="cardCollpase1" class="collapse pt-3">


                <div class="form-group row">
                  <label for="inputEmail3" class="col-12 col-form-label">Gambar Tambahan</label>
                  <div class="col-9">
                    <input type="hidden" id="namalama1" name="namalama1" value="<?php echo $artikel['gambar1']; ?>">
                    <?php if ($artikel['gambar1'] == '') {
                      echo " <h6>Tidak Ada Gambar</h6>";
                    } else {
                      echo "<div class='input-group'>
                <img src='" .  base_url('public/admin/images/artikel/' . $artikel['gambar1']) . "' width='40%'>
              </div> <br> ";
                    } ?>
                  </div>
                  <div class="col-9">
                    <input type="file" name="gambar1" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-12 col-form-label">Gambar Tambahan</label>
                  <div class="col-9">
                    <input type="hidden" id="namalama2" name="namalama2" value="<?php echo $artikel['gambar2']; ?>">
                    <?php if ($artikel['gambar2'] == '') {
                      echo " <h6>Tidak Ada Gambar</h6>";
                    } else {
                      echo "<div class='input-group'>
                <img src='" .  base_url('public/admin/images/artikel/' . $artikel['gambar2']) . "' width='40%'>
              </div> <br> ";
                    } ?>
                  </div>
                  <div class="col-9">
                    <input type="file" name="gambar2" class="form-control">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputEmail3" class="col-12 col-form-label">Gambar Tambahan</label>
                  <div class="col-9">
                    <input type="hidden" id="namalama3" name="namalama3" value="<?php echo $artikel['gambar3']; ?>">
                    <?php if ($artikel['gambar3'] == '') {
                      echo " <h6>Tidak Ada Gambar</h6>";
                    } else {
                      echo "<div class='input-group'>
                <img src='" .  base_url('public/admin/images/artikel/' . $artikel['gambar3']) . "' width='40%'>
              </div> <br> ";
                    } ?>
                  </div>
                  <div class="col-9">
                    <input type="file" name="gambar3" class="form-control">
                  </div>
                </div>



              </div>
            </div>

          </div>
          <div class="card-box">
            <h4 class="header-title mb-4">Pengaturan Lainnya</h4>


            <div class="form-group row">
              <div class="col-12">
                <input type="hidden" id="namalama4" name="namalama4" value="<?php echo $artikel['dokumen']; ?>">
                <?php if ($artikel['dokumen'] == '') {
                  echo " <h6>Tidak Ada Data</h6>";
                } else {
                ?>

                  <label for="inputEmail3" class="col-12 col-form-label"><?php echo $artikel['dokumen']; ?></label>
                <?php  } ?>
              </div>
              <label for="inputEmail3" class="col-3 col-form-label">Dokumen</label>

              <div class="col-9">
                <input type="file" name="dokumen" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Dokumen</label>
              <div class="col-9">
                <input type="text" class="form-control" id="namadokumen" name="namadokumen" value="<?php echo $artikel['nama_dokumen']; ?>">
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