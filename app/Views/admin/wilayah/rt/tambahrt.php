<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Wilayah Administratif RT - RW <?= $rw['rw']; ?></h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/admin/wilayah/simpanrt'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?php echo base_url('viewrt/' . $rw['id_rw']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">RT</label>
              <div class="col-9">
                <input type="text" class="form-control" id="rt" name="rt" required>
              </div>
            </div>

            <input type="hidden" class="form-control" id="id_rw" name="id_rw" value="<?= $rw['id_rw']; ?>" required>
            <input type="hidden" class="form-control" id="id_dusun" name="id_dusun" value="<?= $rw['id_dusun']; ?>" required>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value=" <?= $kddesa; ?>" required>


            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kepala RT</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2">
                  <option value="">Pilih </option>
                  <?php foreach ($penduduk as $d) : ?>
                    <option value="<?= $d['nama']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                  <?php endforeach; ?>
                </select>
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