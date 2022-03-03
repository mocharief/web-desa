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

          <h4 class="page-title">Data Wilayah Administratif Dusun</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/dusun/update/' . $dusun['id_dusun']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managewilayah'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Dusun</label>
              <div class="col-9">
                <input type="text" class="form-control" id="dusun" name="dusun" value="<?= $dusun['namadusun']; ?>">
              </div>
            </div>

            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kepala Dusun Sebelumnya</label>
              <div class="col-9">

                <input type="text" class="form-control" name="namalama" value="<?= $dusun['kepala_dusun']; ?> " readonly>


              </div>
            </div>

            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Kepala Dusun Sekarang</label>
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