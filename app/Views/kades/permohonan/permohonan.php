<?php $this->extend('layout/templatekades'); ?>
<?php $this->section('isi'); ?>

<!-- Right Sidebar -->


<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Permohonan Surat</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <br>
          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-info">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>


          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th>Aksi</th>
                <th>NIK</th>
                <th>Nama Penduduk</th>
                <th>Jenis Surat</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($permohonansurat as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <?php if ($p['status'] == '1') {
                    ?>
                      <a href="<?php echo base_url('periksapermohonan/' . $p['id_permohonan']); ?>"><button type="button" class="btn btn-info btn-xs waves-effect waves-light" disabled>
                          <span><i class="dripicons-loading"></i> </span> Sedang Diperiksa
                        </button></a>
                    <?php } else if ($p['status'] == '2') {
                    ?>
                      <a href="<?= base_url('approve/' . $p['id_permohonan']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve Permohonan">
                          <span><i class="fas fa-check"></i> </span> Approve Permohonan
                        </button></a>
                      <a href="<?= base_url('' . $p['url_kades'] . '/' . $p['id_permohonan']); ?>"><button type=" button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Permohonan">
                          <span><i class="fas fa-eye"></i> </span>
                        </button></a>
                    <?php } else if ($p['status'] == '3') {
                    ?>
                      <a href=""><button type="button" class="btn btn-warning btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik Jika sudah diambil" disabled>
                          <span><i class="dripicons-thumbs-up"></i> </span> Approved
                        </button></a>
                      <a href="<?= base_url('' . $p['url_kades'] . '/' . $p['id_permohonan']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Permohonan">
                          <span><i class="fas fa-eye"></i> </span>
                        </button></a>

                    <?php } else if ($p['status'] == '4') {
                    ?>
                      <?php if ($p['id_surat'] == '17') {
                      ?>
                        <a href=""><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik Jika akta Sudah Selesai" disabled>
                            <span><i class="dripicons-checkmark"></i></span> Akta Selesai
                          </button></a>
                      <?php } else {
                      ?>
                        <a href=""><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sudah Diambil" disabled>
                            <span><i class="dripicons-checkmark"></i> </span> Sudah Terkirim
                          </button></a>
                      <?php  }  ?>

                      <a href="<?= base_url('' . $p['url_kades'] . '/' . $p['id_permohonan']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Permohonan">
                          <span><i class="fas fa-eye"></i> </span>
                        </button></a>
                    <?php } else if ($p['status'] == '5') {
                    ?>
                      <a href=""><button type="button" class="btn btn-dark btn-xs waves-effect waves-light" disabled>
                          <span><i class="dripicons-wrong"></i> </span>Permohonan Ditolak
                        </button></a>

                    <?php } else if ($p['status'] == '6') {
                    ?>
                      <a href=""><button type="button" class="btn btn-danger btn-xs waves-effect waves-light" disabled>
                          <span><i class="dripicons-wrong"></i> </span> Dibatalkan
                        </button></a>
                    <?php }
                    ?>

                  </td>


                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama_surat']; ?></td>

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