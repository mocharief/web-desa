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

          <h4 class="page-title">Data Pengguna Layanan Mandiri</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('pengguna/update/' . $pendaftaran['id_pendaftar']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managependaftaran'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>


            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Penduduk</label>
              <div class="col-9">
                <input type="hidden" name="namalama" class="form-control" value="<?= $pendaftaran['id']; ?>" readonly>
                <input type="text" class="form-control" value=" <?php foreach ($penduduk as $d) : ?><?php if ($pendaftaran['id'] == $d['id']) { ?>  <?= $d['nama']; ?> - <?= $d['nik']; ?> <?php } ?> <?php endforeach; ?>" readonly>


              </div>
            </div>
            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No Wa</label>
              <div class="col-9">
                <input type="text" class="form-control" value="<?= $pendaftaran['no_wa']; ?>">


              </div>
            </div>
            <input type="hidden" class="form-control" id="nik" name="nik" value="<?= $pendaftaran['nik']; ?>" required autocomplete="off">

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pin</label>
              <div class="col-9">
                <input type="text" class="form-control" id="pin" name="pin" maxlength="6" placeholder="Pin Warga" required autocomplete="off">



                <h6> *) 6 (enam) karakter.</h6>
                <h6>**) Silakan dicatat atau di ingat dengan baik, kode pin ini sangat rahasia, dan hanya bisa diatur sekali ini lalu setelah itu hanya bisa di reset saja.</h6>
                <h6>***) Silakan Kembali jika tidak ingin merubah Pin ataupun Reset Pin.
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