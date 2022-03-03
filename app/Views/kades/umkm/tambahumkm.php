<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data UMKM</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/admin/umkm/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/manageumkm'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama UMKM</label>
              <div class="col-9">
                <input type="text" class="form-control" id="umkm" name="umkm" required placeholder="Nama UMKM" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kode UMKM</label>
              <div class="col-9">
                <input type="text" class="form-control" id="kode" name="kode" required placeholder="Kode UMKM">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kategori</label>
              <div class="col-9">
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">Pilih Kategori UMKM</option>
                  <?php foreach ($kat as $d) : ?>
                    <option value="<?= $d['id_kat']; ?>"><?= $d['kategori']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Ketua UMKM</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2" required>
                  <option>Pilih Ketua UMKM</option>
                  <?php foreach ($penduduk as $d) : ?>
                    <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Deskripsi UMKM</label>
              <div class="col-9">
                <textarea type="text" rows="5" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi UMKM"></textarea>
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