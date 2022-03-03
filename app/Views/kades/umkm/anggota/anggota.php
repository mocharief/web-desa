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

          <h4 class="page-title">Data Anggota UMKM</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?= base_url('/manageumkm'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali
            </button></a>
          <a href="<?php echo base_url('tambahanggota/' . $umkm['id_umkm']); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Anggota
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
          <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">Data UMKM</th>


              </tr>
            </thead>


            <tbody>


              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama UMKM</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $umkm['nama_umkm']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kode UMKM</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $umkm['kode']; ?></td>
              </tr>
              <?php $query   = $db->query('SELECT * from kat_umkm Where id_kat=' . $umkm['id_kat']);
              $results = $query->getResultArray();
              foreach ($results as $p) : ?>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kategori UMKM</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $p['kategori']; ?></td>
                </tr>

              <?php endforeach; ?>

              <?php $query   = $db->query('SELECT * from penduduk Where id=' . $umkm['id']);
              $results = $query->getResultArray();
              foreach ($results as $p) : ?>
                <tr>
                  <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Ketua UMKM</td>
                  <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                  <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $p['nama']; ?></td>
                </tr>

              <?php endforeach; ?>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Deskripsi UMKM</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $umkm['deskripsi']; ?></td>
              </tr>
            </tbody>
          </table>
          <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 10%;">Aksi</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tempat/ Tanggal Lahir</th>
                <th>Umur (Tahun)</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Keterangan</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($anggota as $p) : ?>
                <?php $tanggal = new DateTime($p['tanggallahir']);
                // tanggal hari ini
                $today = new DateTime('today');

                // tahun
                $y = $today->diff($tanggal)->y;
                ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>

                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('editanggota/' . $p['id_anggota']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deleteanggota/' . $p['id_anggota']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" class="form-control" id="id_umkm" name="id_umkm" value="<?= $p['id_umkm']; ?>" required>
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>


                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['tempatlahir']; ?>/<?= $p['tanggallahir']; ?></td>
                  <td style="vertical-align: middle; text-align: center;"> <?= $y; ?></td>
                  <td style="vertical-align: middle;"><?php if ($p['sex'] == '1') {
                                                        echo "Laki - Laki";
                                                      } else if ($p['sex'] == '2') {
                                                        echo "Perempuan";
                                                      }

                                                      ?></td>
                  <td style="vertical-align: middle;"> <?= $p['alamat_sekarang']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['keterangan']; ?></td>
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