<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data UMKM</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">

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
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 12%;">Aksi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <tr>

                <td style="vertical-align: middle;"><?= $i++; ?></td>
                <td style="vertical-align: middle;">
                  <a href="<?php echo base_url('editakun/' . $akun['id_users']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                      <i class="fas fa-edit"></i>
                    </button></a>
                  <a href="<?php echo base_url('ubahpassword/' . $akun['id_users']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Password">
                      <i class="fas fa-lock"></i>
                    </button></a>
                </td>

                <td style="vertical-align: middle;"> <?= $akun['nik']; ?></td>
                <td style="vertical-align: middle;"> <?= $akun['nama']; ?></td>
                <td style="vertical-align: middle;"> <?= $akun['username']; ?></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end row -->
    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <h4 class="page-title">Data Akun Kepala Desa</h4>
          <br>
          <?php if ($totalkades < 1) {
          ?>
            <a href="<?php echo base_url('/tambahkades'); ?>">
              <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-plus"></i> &nbsp; Tambah Akun
              </button>

            </a>
            <br>
          <?php  } else {
            echo "";
          } ?>
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
          <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <?php if ($akunkades['status'] == 0) {
                ?>
                  <th style="width: 7%;">Aksi</th>
                <?php  }
                ?>
                <th>NIK</th>
                <th>Nama</th>
                <th>Username</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <tr>
                <?php if ($akunkades != 0) {
                ?>
                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <?php if ($akunkades['status'] == 0) {
                  ?> <td style="vertical-align: middle;">

                      <form action="<?= base_url('deletekades/' . $akunkades['id_kades']); ?>" method="post" class="d-inline">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                          <i class="fas fa-trash"></i>
                        </button>

                      </form>

                    </td>
                  <?php  }
                  ?>
                <?php  } else {
                ?>
                  <td style="vertical-align: middle;"></td>
                  <td style="vertical-align: middle;"></td>
                <?php   } ?>
                <td style="vertical-align: middle;"> <?= $akunkades['nik']; ?></td>
                <td style="vertical-align: middle;"> <?= $akunkades['nama']; ?></td>
                <td style="vertical-align: middle;"> <?= $akunkades['username']; ?></td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div> <!-- end container-fluid -->

</div> <!-- end content -->



<!-- /.content-wrapper -->

<?php $this->Endsection(); ?>