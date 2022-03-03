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

          <h4 class="page-title">Data Slider</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('/tambahslider'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Slider
            </button>

          </a>
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
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 12%;">Aksi</th>
                <th>Judul</th>

                <th>File</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($slider as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>

                  <td style="vertical-align: middle;"> <a href="<?php echo base_url('gambarslider/' . $p['id']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deleteslider/' . $p['id']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>


                  <td style="vertical-align: middle;"> <?= $p['judul']; ?></td>
                  <td style="vertical-align: middle;">
                    <?php if ($p['tipe'] == '1') {
                      echo "<img src='" .  base_url('public/admin/images/slider/' . $kddesa . '/' . $p['file']) . "' width='30%'>
              </div>  <br> ";
                    } else {
                      echo "<video controls src='" .  base_url('public/admin/images/slider/' . $kddesa . '/' . $p['file']) . "' width='40%'>
              </div> </video> <br> ";
                    }
                    ?></td>


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