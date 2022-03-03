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

          <h4 class="page-title">Data Galeri Album <?= $album['judul']; ?></h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">

      <div class="col-md-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('managealbum'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Album
            </button></a>
          <a href="<?php echo base_url('tambahgaleri/' . $album['id_album']); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Galeri
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

          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 15%;">Aksi</th>
                <th style="width: 25%;  text-align: center;">Foto</th>
                <th style="text-align: center;">Judul</th>



              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($galeri as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('editgaleri/' . $p['id_galeri']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button>
                    </a>
                    <form action="<?= base_url('deletegaleri/' . $p['id_galeri']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" class="form-control" id="id_album" name="id_album" value="<?= $p['id_album']; ?>" required>
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>


                  <td style="vertical-align: middle; text-align: center;">
                    <img src="<?= base_url('public/admin/images/galeri/' . $p['kddesa'] . '/' . $p['foto']); ?>" width="40%">
                  </td>
                  <td style=" vertical-align: middle;"> <?= $p['judul']; ?>
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