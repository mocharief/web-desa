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
          <a href="<?php echo base_url('/tambahumkm'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah UMKM
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
                <th style="width: 15%;">Aksi</th>
                <th>Nama UMKM</th>
                <th>Ketua UMKM</th>
                <th>Kategori UMKM</th>
                <th>Jumlah Anggota</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($umkm as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>

                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('viewanggota/' . $p['id_umkm']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Data Anggota">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a><a href="<?php echo base_url('editumkm/' . $p['id_umkm']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deleteumkm/' . $p['id_umkm']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>


                  <td style="vertical-align: middle;"> <?= $p['nama_umkm']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle; "> <?= $p['kategori']; ?></td>
                  <?php $query   = $db->query('SELECT COUNT(*) from anggotaumkm Where id_umkm=' . $p['id_umkm']);
                  $results = $query->getRowArray();
                  foreach ($results as $p) : ?>
                    <td style="vertical-align: middle;text-align: center;"> <?= $p;  ?></td>
                  <?php endforeach; ?>
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