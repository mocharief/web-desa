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
    <form action="<?php echo base_url('admin/budaya/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managekebudayaan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Judul*</label>
              <div class="col-9">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Kebudayaan" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kategori*</label>
              <div class="col-9">
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">Pilih Kategori</option>
                  <?php foreach ($kat as $d) : ?>
                    <option value="<?= $d['id_kat']; ?>"><?= $d['kategori']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">File Upload</label>
              <div class="col-9">
                <div class="mt-3">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" onclick="alamat_url();">
                    <label class="custom-control-label" for="customRadio1">Link URL</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" onclick="file();">
                    <label class="custom-control-label" for="customRadio2">File</label>
                  </div>
                </div>

              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Link URL </label>
              <div class="col-9">
                <input type="text" class="form-control" id="link" name="link" placeholder="Link URL" required>
              </div>
            </div>
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
                <input type="file" name="data" id="data" class="form-control" required>
                <h6>Extensi yang diizinkan Image (jpg, png, gif, jpeg), Video (mp4)</h6>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" placeholder="Nama Kategori" autocomplete="off" value="<?= $kddesa; ?>">

            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Deskripsi*</label>
              <div class="col-9">
                <textarea type="text" id="ckeditor" class="form-control" name="isi" required></textarea>
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

<script type="text/javascript">
  function alamat_url() {
    var cb = document.getElementById("link");
    var cb1 = document.getElementById("tipe");
    var cb2 = document.getElementById("data");

    if (document.getElementById("customRadio1").checked == true) {
      cb.disabled = false;
      cb1.disabled = true;
      cb2.disabled = true;
    } else {
      cb.disabled = true;
      cb1.disabled = false;
      cb2.disabled = false;
    }

  }

  function file() {
    var cb = document.getElementById("link");
    var cb1 = document.getElementById("tipe");
    var cb2 = document.getElementById("data");

    if (document.getElementById("customRadio2").checked == true) {
      cb.disabled = true;
      cb1.disabled = false;
      cb2.disabled = false;
    } else {
      cb.disabled = true;
      cb1.disabled = false;
      cb2.disabled = false;
    }

  }
</script>


<?php $this->Endsection(); ?>