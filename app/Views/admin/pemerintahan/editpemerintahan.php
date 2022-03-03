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

          <h4 class="page-title">Data Aparat Pemerintahan</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('pemerintahan/update/' . $pemerintahan['pamong_id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managepemerintahan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke daftar Aparat Pemerintahan
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
              <div class="col-9">
                <input type="hidden" class="form-control" id="id" name="id" required placeholder="Nama" value="<?= $pemerintahan['id']; ?>">
                <input type="text" class="form-control" id="namaaparat" name="namaaparat" required placeholder="Nama" value="<?= $pemerintahan['pamong_nama']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIK</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nik" name="nik" required placeholder="Nik" value="<?= $pemerintahan['pamong_nik']; ?>" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIPD</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nipd" name="nipd" required placeholder="NIPD" value="<?= $pemerintahan['pamong_nipd']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIP</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nip" name="nip" required placeholder="NIP" value="<?= $pemerintahan['pamong_nip']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tempat Lahhir</label>
              <div class="col-9">
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required placeholder="Tempat Lahhir" value="<?= $pemerintahan['pamong_tempatlahir']; ?>" readonly>
              </div>
            </div>


            <input type="hidden" class="form-control" id="tanggallahir" name="tanggallahir" required placeholder="Tanggal Lahir" value="<?= $pemerintahan['pamong_tanggallahir']; ?>">

            <input type="hidden" class="form-control" id="jk" name="jk" required placeholder="Jenis Kelamin" value="<?= $pemerintahan['pamong_sex']; ?>">

            <input type="hidden" class="form-control" id="pendidikan" name="pendidikan" required placeholder="Pendidikan" value="<?= $pemerintahan['pamong_pendidikan']; ?>">

            <input type="hidden" class="form-control" id="agama" name="agama" required placeholder="Agama" value="<?= $pemerintahan['pamong_agama']; ?>">


            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pangkat / Golongan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="pangkat" name="pangkat" required placeholder="Pangkat / Golongan" value="<?= $pemerintahan['pamong_pangkat']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No SK Pengangkatan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="skp" name="skp" required placeholder="No SK Pengangkatan" value="<?= $pemerintahan['pamong_nosk']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tanggal SK Pengangkatan</label>
              <div class="col-3">
                <input type="date" class="form-control" id="tglsk" name="tglsk" required placeholder="Tanggal SK Pengangkatan" value="<?= $pemerintahan['pamong_tglsk']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Jabatan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="jabatan" name="jabatan" required placeholder="Jabatan" value="<?= $pemerintahan['jabatan']; ?>">
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