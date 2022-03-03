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

          <h4 class="page-title">Data Kategori artikel</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-md-4">

        <div class="card-box">
          <form action="<?php echo base_url('/admin/artikel/tambahkat'); ?>" method="post" class="form-horizontal">
            <?= csrf_field(); ?>
            <div class="row">




              <h4 class="header-title mb-4">Tambah Kategori</h4>

              <div class="form-group row">
                <label for="inputPassword3" class="col-3 col-form-label">Kategori</label>
                <div class="col-9">
                  <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Nama Kategori" autocomplete="off" required>
                </div>
              </div>
              <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>
              <div class="form-group mb-0 justify-content-end row">
                <div class="col-9">
                  <button type="submit" class="btn btn-success waves-effect waves-light">Tambah</button>
                </div>
              </div>

            </div>


        </div>
        </form>
      </div>
      <div class="col-md-8">
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
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>

                <th style="width: 75%;">Kategori</th>
                <th>Aksi</th>


              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($kat as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>



                  <td style="vertical-align: middle;"> <?= $p['kategori']; ?></td>

                  <td style="vertical-align: middle;"> <a href="<?php echo base_url('admin/artikel/editkategori/' . $p['id_kat']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletekategori/' . $p['id_kat']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
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