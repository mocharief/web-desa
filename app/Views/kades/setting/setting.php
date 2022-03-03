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

          <h4 class="page-title">Data Tanda Tangan</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <?php if ($totalsetting < 1) {

          ?>
            <a href="<?php echo base_url('/tambahsetting'); ?>">
              <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-plus"></i> &nbsp; Tambah Data
              </button>
            <?php } else {
            echo "";
          } ?>


            </a>
            <br> <br>
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
                  <th style="width: 7%;">Aksi</th>
                  <th>Nama</th>

                </tr>
              </thead>


              <tbody>
                <?php $i = 1; ?>

                <tr>
                  <?php if ($setting != 0) {
                  ?>
                    <td style="vertical-align: middle;"><?= $i++; ?></td>
                    <td style="vertical-align: middle;">

                      <a href="<?php echo base_url('editsetting/' . $setting['id_setting']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                          <i class="fas fa-edit"></i>
                        </button></a>
                    </td>
                  <?php  } else {
                  ?>
                    <td style="vertical-align: middle;"></td>
                    <td style="vertical-align: middle;"></td>
                  <?php   } ?>



                  <td style="vertical-align: middle;"> <?= $setting['nama']; ?></td>

                </tr>

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