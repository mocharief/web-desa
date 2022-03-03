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

          <h4 class="page-title">Data Anggota UMKM</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/anggota/update/' . $anggota['id_anggota']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('viewanggota/' . $anggota['id_umkm']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Anggota UMKM</label>
              <div class="col-9">
                <input type="hidden" name="namalama" class="form-control" value="<?= $anggota['id']; ?>" readonly>
                <input type="hidden" class="form-control" id="id_umkm" name="id_umkm" value="<?= $anggota['id_umkm']; ?>" required>
                <input type="text" class="form-control" value=" <?php foreach ($penduduk as $d) : ?><?php if ($anggota['id'] == $d['id']) { ?>  <?= $d['nama']; ?> - <?= $d['nik']; ?> <?php } ?> <?php endforeach; ?>" readonly>


              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="5" class="form-control" id="ket" name="keterangan" placeholder="Ket."><?= $anggota['keterangan']; ?></textarea>
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