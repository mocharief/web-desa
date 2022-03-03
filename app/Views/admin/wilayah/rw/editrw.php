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

          <h4 class="page-title">Data Wilayah Administratif RW <?= $rw['rw']; ?></h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/rw/update/' . $rw['id_rw']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('viewrw/' . $rw['id_dusun']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">RW</label>
              <div class="col-9">
                <input type="text" class="form-control" id="rw" name="rw" value="<?= $rw['rw']; ?>">
              </div>
            </div>

            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kepala RW Sebelumnya</label>
              <div class="col-9">
                <input type="text" name="namalama" class="form-control" value="<?= $rw['kepala_rw']; ?>" readonly>
                <input type="hidden" class="form-control" id="id_dusun" name="id_dusun" value="<?= $rw['id_dusun']; ?>" required>



              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kepala RW Sekarang</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2">
                  <option>Pilih </option>
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