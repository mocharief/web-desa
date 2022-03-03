<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">


    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Profil Admin</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo base_url('/profil/updatepassword/' . $profil['id']); ?>" method="post" class="form-material">
          <?= csrf_field(); ?>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">New Password</label>
              <input type="text" class=" form-control" id="password" name="password" placeholder="Isikan Password Baru Anda" autocomplete="off" required>
            </div>

            <!-- /.card-body -->
            <div class="row"">
          <div class=" card-footer" style="background-color: transparent">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="card-footer" style="background-color: transparent">
              <a href="<?php echo base_url('/profil'); ?>"><button type="button" class="btn btn-primary">Cancel </button></a>
            </div>
          </div>
        </form>
      </div>
      <!-- /.card -->
  </div>

  </section>
  <!-- /.content -->
</div>

<?php $this->Endsection(); ?>