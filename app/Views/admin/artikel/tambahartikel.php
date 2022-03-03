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
    <form action="<?php echo base_url('admin/artikel/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul artikel" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-6 col-form-label">Kategori * (Wajib Diisi)</label>
              <div class="col-12">
                <select name="kategori" id="kategori" class="form-control" required>
                  <option value="">Pilih Kategori</option>
                  <?php foreach ($kat as $d) : ?>
                    <option value="<?= $d['id_kat']; ?>"><?= $d['kategori']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

            <div class="form-group row">
              <label for="inputEmail3" class="col-12 col-form-label">Gambar Utama * (Wajib Diisi)</label>
              <div class="col-9">
                <input type="file" name="gambar" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-6 col-form-label">Isi artikel * (Wajib Diisi)</label>
              <div class="col-12">
                <textarea type="text" id="ckeditor" class="form-control" name="isi" required></textarea>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-4">
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
                    <input type="file" name="gambar1" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-12 col-form-label">Gambar Tambahan</label>
                  <div class="col-9">
                    <input type="file" name="gambar2" class="form-control">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-12 col-form-label">Gambar Tambahan</label>
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
              <label for="inputEmail3" class="col-3 col-form-label">Dokumen</label>
              <div class="col-9">
                <input type="file" name="dokumen" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Dokumen</label>
              <div class="col-9">
                <input type="text" class="form-control" id="namadokumen" name="namadokumen">
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