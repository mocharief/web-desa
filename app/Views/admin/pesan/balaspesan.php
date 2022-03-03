<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Pesan</h4>
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




            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Penduduk</label>
              <div class="col-9">
                <input type="hidden" name="nama" class="form-control" value="<?= $pesan['id']; ?>" readonly>
                <input type="text" class="form-control" value=" <?php foreach ($penduduk as $d) : ?><?php if ($pesan['id'] == $d['id']) { ?>  <?= $d['nama']; ?> - <?= $d['nik']; ?> <?php } ?> <?php endforeach; ?>" readonly>


              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pesan</label>
              <div class="col-9">
                <textarea type="text" rows="9" class="form-control" placeholder="Isi Pesan" required autocomplete="off" readonly><?= $pesan['pesan']; ?></textarea>




              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pesan Balasan</label>
              <div class="col-9">
                <textarea type="text" rows="9" class="form-control" id="pesan" name="pesan" placeholder="Isi Pesan Balasan" required autocomplete="off"></textarea>




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