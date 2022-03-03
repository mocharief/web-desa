<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Right Sidebar -->


<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Dokumen Penduduk</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?= base_url('/managedokumen'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Manage Dokumen
            </button></a>
          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 7%;">Aksi</th>
                <th>Nama Syarat </th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($dokumen as $p) : ?>

                <tr>



                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" data-toggle="modal" data-target="#<?= $p['slug']; ?>"> <i class="fas fa-eye"></i> &nbsp; View Dokumen</button>
                    <div id="<?= $p['slug']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog" style="max-height: max-content;">
                        <div class=" modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Dokumen</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <img src="<?= base_url('public/admin/dokumen/' . $p['id'] . '/' . $p['file']); ?> " width="100%">

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </td>
                  <td style="vertical-align: middle;"> <?= $p['ref_syarat_nama']; ?></td>
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




<!-- end Footer -->


<?php $this->Endsection(); ?>