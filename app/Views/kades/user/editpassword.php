<?php $this->extend('layout/templatekades'); ?>
<?php $this->section('isi'); ?>


<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Profil Admin</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/akun/updatepasswordkades/' . $akun['id_kades']); ?>" method="post" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">

        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/profilkades'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>

            <br> <br>
            <?php if (session()->getFlashdata('msg')) : ?>
              <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-check-all mr-2"></i>
                <?= session()->getFlashdata('msg'); ?>
              </div>

            <?php endif; ?>

            <br>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Password Lama</label>
              <div class="col-9">
                <input type="password" class="form-control" name="passwordlama" id="passwordlama" placeholder="Password Lama" maxlength="10">
                <br>
                <input type="checkbox" onclick="myFunction()"> Show Password
              </div>

            </div>
            <div class=" form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Password Baru</label>
              <div class="col-9">
                <input type="password" class="form-control" name="passwordbaru" id="passwordbaru" maxlength="10" placeholder="Password Baru Max 10 Karakter">
                <br>
                <input type="checkbox" onclick="myFunction1()"> Show Password
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
    var x = document.getElementById("passwordlama");

    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }

  }
</script>
<script>
  function myFunction1() {

    var y = document.getElementById("passwordbaru");


    if (y.type === "password") {
      y.type = "text";
    } else {
      y.type = "password";
    }

  }
</script>


<?php $this->Endsection(); ?>