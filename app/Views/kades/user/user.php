<?php $this->extend('layout/templatekades'); ?>
<?php $this->section('isi'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Akun Kades</h4>
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
                  <a href="<?php echo base_url('editakunkades/' . $akun['id_kades']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                      <i class="fas fa-edit"></i>
                    </button></a>
                  <a href="<?php echo base_url('ubahpasswordkades/' . $akun['id_kades']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ubah Password">
                      <i class="fas fa-lock"></i>
                    </button></a>
                  <?php if ($akun['status'] == 0) {
                  ?>
                    <a href="<?php echo base_url('privasi/' . $akun['id_kades']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Privasi">
                        <i class=" mdi mdi-eye-off"></i>
                      </button></a>
                  <?php   } ?>

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

  </div> <!-- end container-fluid -->

</div> <!-- end content -->



<!-- /.content-wrapper -->

<?php $this->Endsection(); ?>