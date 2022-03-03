<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Kirim Pesan</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/admin/pesan/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class=" row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managepesanmasuk'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>



            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Penduduk</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2">
                  <option>-- Cari secara NIK/ Nama Penduduk-- </option>
                  <?php foreach ($penduduk as $d) : ?>
                    <option value="<?= $d['id']; ?>"><?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pin</label>
              <div class="col-9">
                <textarea type="text" rows="9" class="form-control" id="pesan" name="pesan" placeholder="Isi Pesan" required autocomplete="off"></textarea>




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