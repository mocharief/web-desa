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

          <h4 class="page-title">Data Penduduk</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('/tambahpenduduk'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Penduduk Domisili
            </button>

          </a>


          <div class="btn-group">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false"> <i class=" far fa-arrow-alt-circle-down"></i> &nbsp; Pilih Aksi Lainnya</button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Dropdown link</a>
              <a class="dropdown-item" href="#">Dropdown link</a>
            </div>
          </div>
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
                <th>Aksi</th>
                <th>Foto</th>
                <th>Nik</th>
                <th>Nama</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Alamat</th>

              </tr>
            </thead>


            <tbody>

              <?php $i = 1; ?>
              <?php foreach ($penduduk as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('editpenduduk/' . $p['id']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletependuduk/' . $p['id']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>

                  <td style="vertical-align: middle; width:2%;">
                    <?php if ($p['foto'] != '') {
                    ?>
                      <img src="<?php echo base_url('public/admin/images/penduduk/' . $p['foto']) ?>" width="100%" />
                    <?php } else {
                    ?>
                      <img src="<?php echo base_url('public/admin/images/penduduk/penduduk.png') ?>" width="100%" />
                    <?php
                    } ?>
                  </td>

                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama_ayah']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama_ibu']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['alamat_sekarang']; ?></td>

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