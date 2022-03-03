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

          <h4 class="page-title">Profil Kades</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/admin/akun/simpan'); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/profiladmin'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIK</label>
              <div class="col-9">
                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '';  ?>" id="nik" name="nik" placeholder="NIK">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('nik'); ?></b>
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>">

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
              <div class="col-9">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '';  ?>" id="nama" name="nama" placeholder="Nama Lengkap">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('nama'); ?></b>
                </div>
              </div>
            </div>
            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Username</label>
              <div class="col-9">
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '';  ?>" id="username" name="username" placeholder="Username">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('username'); ?></b>
                </div>
              </div>
            </div>
            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Password</label>
              <div class="col-9">
                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '';  ?>" id="password" name="password" placeholder="Password">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('password'); ?></b>
                </div>
                <br>
                <input type="checkbox" onclick="myFunction()"> Show Password
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


<script>
  function myFunction() {
    var x = document.getElementById("password");

    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }
</script>

<?php $this->Endsection(); ?>