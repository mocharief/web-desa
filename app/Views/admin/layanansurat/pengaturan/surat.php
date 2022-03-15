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

          <h4 class="page-title">Format Surat Desa</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-md-12">
        <div class="card-box table-responsive">

          <br> <br>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <i class="mdi mdi-check-all mr-2"></i>
              <?= session()->getFlashdata('pesan'); ?>
            </div>

          <?php endif; ?>

          <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 7%;">Aksi</th>
                <th style="width: 10%; text-align: center;">Kode Surat</th>
                <th style="width: 25%; text-align: center;">Nama Surat</th>
                <th style="width: 15%; text-align: center;">Ditampilkan Dilayanan Mandiri</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($pengaturan as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;"> <a href="<?php echo base_url('edit_format_surat/' . $p['id_format_surat']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                  </td>
                  <td style="vertical-align: middle; text-align: center;"> <?= $p['kode_surat']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama_surat']; ?></td>
                  <td style="vertical-align: middle; text-align: center;">
                    <?php if ($p['mandiri'] == 1) {
                      echo 'Aktif';
                    } ?>
                    <?php if ($p['mandiri'] == 0) {
                      echo 'Tidak Aktif';
                    } ?>
                  </td>
                </tr>
              <?php endforeach; ?>
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