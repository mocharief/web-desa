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

          <h4 class="page-title">Data Kepala Keluarga</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <button type="button" class="btn btn-success btn-sm waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal"> <i class="fas fa-plus"></i> &nbsp; Penduduk Kepala Keluarga</button>

          <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?php echo base_url('admin/kk/simpan'); ?>" method="post" class="form-horizontal">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Data Kepala Keluarga</h4>
                  </div>
                  <div class="modal-body">

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="hidden" class="form-control" id="field-3" name="id_kk" value="<?= $kode ?>" required>

                          <label for="field-1" class="control-label">Kepala Keluarga yang tidak Memiliki KK</label>
                          <select name="nama" id="nama" class="form-control" data-toggle="select2" required>
                            <option value="">Pilih </option>
                            <?php $query   = $db->query('SELECT * from penduduk Where id NOT IN(SELECT id FROM kk) AND kk_level = 1 AND id_kk = 0');
                            $results = $query->getResultArray();
                            foreach ($results as $d) : ?>

                              <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="field-3" class="control-label">No KK</label>
                          <input type="text" class="form-control" id="field-3" name="no_kk" placeholder="No KK" required>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#print"> <i class="fas fa-print"></i> &nbsp; Cetak</button>

          <div id="print" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="<?php echo base_url('admin/kk/simpan'); ?>" method="post" class="form-horizontal">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Cetak Data</h4>
                  </div>
                  <div class="modal-body">
                    <h6 style="text-decoration: underline;">Centang kotak berikut apabila NIK/No. KK ingin disensor</h6>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="field-3" class="control-label">No KK</label>
                          <input type="text" class="form-control" id="field-3" name="no_kk" placeholder="No KK" required>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                  </div>
                </form>
              </div>
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
                <th>No KK</th>

                <th>Kepala Keluarga</th>
                <th>Nik</th>

                <th>Jumlah Anggota Keluarga</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>RW</th>
                <th>RT</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($kk as $p) : ?>
                <tr>

                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('viewkeluarga/' . $p['id_kk']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Data Anggota Keluarga">
                        <i class="fas fa-file"></i>
                      </button>
                    </a>
                    <a href="<?php echo base_url('editkk/' . $p['id_kk']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit No KK">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletekk/' . $p['id_kk']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" name="nama" value="<?= $p['id']; ?>">
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
                  <td style="vertical-align: middle;"> <?= $p['no_kk']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <?php $query   = $db->query('SELECT COUNT(*) from penduduk Where id_kk=' . $p['id_kk']);
                  $results = $query->getRowArray();
                  foreach ($results as $l) : ?>
                    <td style="vertical-align: middle; text-align: center;"> <?= $l; ?></td>
                  <?php endforeach; ?>
                  <td style="vertical-align: middle;"> <?php if ($p['sex'] == 1) {
                                                          echo "Laki - Laki";
                                                        } else {
                                                          echo "Perempuan";
                                                        }
                                                        ?></td>
                  <td style="vertical-align: middle;"> <?= $p['alamat_sekarang']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['namadusun']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['rw']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['rt']; ?></td>
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