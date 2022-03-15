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

          <h4 class="page-title">Data Permohonan Surat</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?= base_url('/managepermohonan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
              <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Permohonan
            </button></a>
          <br> <br>

          <?= csrf_field(); ?>
          <div class="row">

            <div class="col-md-8">
              <div class="card-box">

                <h4 class="page-title">Data Pemohon</h4>
                <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputPassword4" class="col-form-label">Nik / Nama</label>

                  </div>
                  <div class="form-group col-md-9">
                    <input type="text" class="form-control" id="asal_mudik" name="asal_mudik" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card-box">

                <div class="card-body">
                  <div class="card-widgets">

                    <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="true" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>

                  </div>
                  <h4 class="page-title">Panduan </h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">

                  <div id="cardCollpase1" class="collapse pt-3">


                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-8">
              <div class="card-box">

                <h4 class="page-title">Kelengkapan Dokumen</h4>
                <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                  <thead>
                    <tr>
                      <th style="width: 2%;">No</th>
                      <th style="text-align: center;">Nama Dokumen</th>
                      <th style="text-align: center;">Dokumen</th>

                    </tr>
                  </thead>


                  <tbody>
                    <?php $i = 1; ?>

                    <?php $query   = $db->query('SELECT * FROM setting_syarat JOIN syarat_surat ON setting_syarat.id_syarat = syarat_surat.ref_syarat_id where setting_syarat.id_surat =' . $datapermohonan['id_surat'] . '');
                    $results = $query->getResultArray();
                    foreach ($results as $j) : ?>

                      <tr>

                        <td style="vertical-align: middle;"><?= $i++; ?></td>
                        <td style="vertical-align: middle;"><?= $j['ref_syarat_nama']; ?></td>
                        <td style="vertical-align: middle; text-align: center;">
                          <?php $query   = $db->query('SELECT * FROM dokumen JOIN syarat_surat ON dokumen.id_syarat = syarat_surat.ref_syarat_id JOIN permohonan_surat ON dokumen.id = permohonan_surat.id  where dokumen.id =' . $datapermohonan['id'] . ' AND dokumen.id_syarat =' . $j['ref_syarat_id']);
                          $results = $query->getRowArray();
                          ?>
                          <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" data-toggle="modal" data-target="#<?= $results['slug']; ?>"> <i class="fas fa-eye"></i> &nbsp; View Dokumen</button>
                          <div id="<?= $results['slug']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" style="max-height: max-content;">
                              <div class=" modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <h4 class="modal-title">Dokumen</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <img src="<?= base_url('public/admin/dokumen/' . $datapermohonan['id'] . '/' . $results['file']); ?> " width="100%">

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                        </td>

                      </tr>
                    <?php endforeach; ?>

                  </tbody>
                </table>

              </div>
            </div>

          </div>

          <div class=" row">

            <div class="col-md-12">
              <div class="card-box">
                <?php if ($datapermohonan['id_surat'] == 1) {  ?>
                  <h4 class="page-title">Surat Keterangan Pengantar</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_pengantar where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keterangan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keterangan" name="keterangan"><?= $sp['keterangan']; ?></textarea>
                        </div>
                      </div>
                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                <?php  } else if ($datapermohonan['id_surat'] == 5) { ?>

                  <h4 class="page-title">Surat Keterangan Jual Beli</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_jualbeli where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Jenis Barang</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" required value="<?= $m['jenis_barang']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Rincian Barang</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="rincian_barang" name="rincian_barang"><?= $m['rincian_barang']; ?></textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label" style="font-size: larger;"><b>Data Pembeli</b></label>
                        <div class="col-12">

                        </div>
                      </div>
                      <hr>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">NIK Pembeli</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="nik_pembeli" name="nik_pembeli" required value="<?= $m['nik_pembeli']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Nama Pembeli</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" required value="<?= $m['nama_pembeli']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Tempat / Tanggal Lahir Pembeli</label>
                        <div class="col-6">
                          <input type="text" class="form-control" id="tempatlahirpembeli" name="tempatlahirpembeli" required value="<?= $m['tempatlahirpembeli']; ?>">
                        </div>
                        <div class="col-6">
                          <input type="date" class="form-control" id="tgllahirpembeli" name="tgllahirpembeli" required value="<?= $m['tgllahirpembeli']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Jenis Kelamin Pembeli</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="jkpembeli" name="jkpembeli" required value="<?= $m['jkpembeli']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Alamat Pembeli</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="alamat_pembeli" name="alamat_pembeli"><?= $m['alamat_pembeli']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Pekerjaan Pembeli</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="pekerjaan_pembeli" name="pekerjaan_pembeli" required value="<?= $m['pekerjaan_pembeli']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keterangan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keterangan" name="keterangan"><?= $m['keterangan']; ?></textarea>
                        </div>
                      </div>
                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 6) { ?>
                  <h4 class="page-title">Surat Keterangan Catatan Kriminal</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_kriminal where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 10) { ?>
                  <h4 class="page-title">Surat Keterangan Kurang Mampu</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_tidakmampu where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 13) { ?>
                  <h4 class="page-title">Surat Keterangan Usaha</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_usaha where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Nama Usaha</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" required value="<?= $sp['nama_usaha']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 11) { ?>
                  <h4 class="page-title">Surat Pengantar Izin Keramaian</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_izin_keramaian where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Jenis Acara</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="jenis_acara" name="jenis_acara" required value="<?= $sp['jenis_acara']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 12) { ?>
                  <h4 class="page-title">Surat Pengantar Laporan Kehilangan</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_kehilangan where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Barang Yang Hilang</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="barang" name="barang" required value="<?= $sp['barang']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Rincian Barang</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="rincian_barang" name="rincian_barang" required><?= $sp['rincian_barang']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Rincian Kejadian</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="kejadian" name="kejadian" required><?= $sp['kejadian']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 9) { ?>
                  <h4 class="page-title">Surat Pengantar Perjalanan</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_jalan where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                <?php  } else if ($datapermohonan['id_surat'] == 15) { ?>
                  <h4 class="page-title">Surat Keterangan Domisili Usaha</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_domisili_usaha where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Nama Usaha</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" required value="<?= $sp['nama_usaha']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Alamat</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="alamat_usaha" name="alamat_usaha" required><?= $sp['alamat_usaha']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 17) { ?>
                  <h4 class="page-title">Surat Permohonan Akta</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_akta where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama Anak</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="nama_anak" name="nama_anak" required placeholder="Nama Anak" value="<?= $m['nama_anak']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="tempatlahiranak" name="tempatlahiranak" required placeholder="Tempat Lahir Anak" value="<?= $m['tempatlahiranak']; ?>">
                        </div>
                        <div class="col-4">
                          <input type="date" class="form-control" id="tgl_anak" name="tgl_anak" required placeholder="Tanggal Lahir Anak" value="<?= $m['tgl_anak']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Hari Lahir</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="harilahir" name="harilahir" required placeholder="Hari Lahir" value="<?= $m['hari_lahir']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Alamat Anak</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="alamatanak" name="alamatanak" required placeholder="Alamat Anak"><?= $m['alamat_anak']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-9">
                          <select name="jkanak" id="jkanak" class="form-control" required autofocus>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option <?php if ($m['jkanak'] == "Laki - Laki") {
                                      echo 'selected';
                                    } ?> value="Laki - Laki">Laki - Laki
                            </option>
                            <option <?php if ($m['jkanak'] == "Perempuan") {
                                      echo 'selected';
                                    } ?> value="Perempuan">Perempuan
                            </option>

                          </select>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama Ayah</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="nama_ayahanak" name="nama_ayahanak" required placeholder="Nama Ayah" value="<?= $m['nama_ayahanak']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama Ibu</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="nama_ibuanak" name="nama_ibuanak" required placeholder="Nama Ibu" value="<?= $m['nama_ibuanak']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Alamat Orang Tua</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="alamat_orangtua" name="alamat_orangtua" required placeholder="Alamat Orang Tua"><?= $m['alamat_orangtua']; ?></textarea>
                        </div>
                      </div>

                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 43) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan Kepemilikan Tanah</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_miliktanah where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Jenis Tanah</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="jenis_tanah" name="jenis_tanah" required value="<?php if ($m['jenis_tanah'] == "Tanah Darat") {
                                                                                                                        echo 'Tanah Darat';
                                                                                                                      } ?> <?php if ($m['jenis_tanah'] == "Tanah Sawah") {
                                                                                                                              echo 'Tanah Sawah';
                                                                                                                            } ?> <?php if ($m['jenis_tanah'] == "Tanah Bangunan") {
                                                                                                                                    echo 'Tanah Bangunan';
                                                                                                                                  } ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Luas Tanah</label>
                        <div class="col-9">
                          <input type="number" class="form-control" id="luas_tanah" name="luas_tanah" required placeholder="Luas Tanah (Dalam M2)" value="<?= $m['luas_tanah']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Bukti Kepemilikan</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="bukti_kepemilikan" name="bukti_kepemilikan" required value="<?php if ($m['bukti_kepemilikan'] == "Petok Lama") {
                                                                                                                                    echo 'Petok Lama';
                                                                                                                                  } ?> 
                                                                                                                                  <?php if ($m['bukti_kepemilikan'] == "Petok Baru") {
                                                                                                                                    echo 'Petok Baru';
                                                                                                                                  } ?>
                                                                                                                                  <?php if ($m['bukti_kepemilikan'] == "Sit Segel") {
                                                                                                                                    echo 'Sit Segel';
                                                                                                                                  } ?>
                                                                                                                                  <?php if ($m['bukti_kepemilikan'] == "Akta") {
                                                                                                                                    echo 'Akta';
                                                                                                                                  } ?>
                                                                                                                                  <?php if ($m['bukti_kepemilikan'] == "Copy") {
                                                                                                                                    echo 'Copy';
                                                                                                                                  } ?>
                                                                                                                                  <?php if ($m['bukti_kepemilikan'] == "Buku Krawangan Desa") {
                                                                                                                                    echo 'Buku Krawangan Desa';
                                                                                                                                  } ?>
                                                                                                                                  <?php if ($m['bukti_kepemilikan'] == "Lainnya") {
                                                                                                                                    echo 'Lainnya';
                                                                                                                                  } ?>" readonly>
                        </div>

                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">No Bukti / Atas Nama</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="no_buktikepemilikan" name="no_buktikepemilikan" required placeholder="No Bukti Kepemilikan" value="<?= $m['no_buktikepemilikan']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="atas_nama" name="atas_nama" required placeholder="Atas Nama" value="<?= $m['atas_nama']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Asal Kepemilikan Tanah</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="asal_kepemilikan_tanah" name="asal_kepemilikan_tanah" required value="<?php if ($m['asal_kepemilikan_tanah'] == "Yayasan") {
                                                                                                                                              echo 'Yayasan';
                                                                                                                                            } ?><?php if ($m['asal_kepemilikan_tanah'] == "Warisan") {
                                                                                                                                                  echo 'Warisan';
                                                                                                                                                } ?><?php if ($m['asal_kepemilikan_tanah'] == "Hibah") {
                                                                                                                                                      echo 'Hibah';
                                                                                                                                                    } ?><?php if ($m['asal_kepemilikan_tanah'] == "Jual Beli") {
                                                                                                                                                          echo 'Jual Beli';
                                                                                                                                                        } ?><?php if ($m['asal_kepemilikan_tanah'] == "Lainnya") {
                                                                                                                                                              echo 'Lainnya';
                                                                                                                                                            } ?>" readonly>

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Bukti Pendukung Kepemilikan</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="bukti_pendukung" name="bukti_pendukung" required placeholder="Bukti Pendukung Kepemilikan" value="<?= $m['bukti_pendukung']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Batas Utara / Batas Timur</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="batas_utara" name="batas_utara" required placeholder="Batas Utara" value="<?= $m['batas_utara']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="batas_timur" name="batas_timur" required placeholder=" Batas Timur" value="<?= $m['batas_timur']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Batas Barat / Batas Selatan</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="batas_barat" name="batas_barat" required placeholder="Batas Barat" value="<?= $m['batas_barat']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="batas_selatan" name="batas_selatan" required placeholder="Batas Selatan" value="<?= $m['batas_selatan']; ?>" readonly>
                        </div>
                      </div>

                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 7) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan KTP dalam Proses</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>


                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 8) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan Beda Identitas</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>
                    <?php $query   = $db->query('SELECT * FROM surat_bedaidentitas where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Identitas Dalam (Nama Kartu)</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="identitas" name="identitas" required placeholder="Identitas Dalam (Nama Kartu)" value="<?= $m['identitas']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">No Identitas</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="no_bedaidentitas" name="no_bedaidentitas" required placeholder="No Identitas" value="<?= $m['no_bedaidentitas']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="nama_bedaidentitas" name="nama_bedaidentitas" required placeholder="Nama Identitas" value="<?= $m['nama_bedaidentitas']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="tempat_bedaidentitas" name="tempat_bedaidentitas" required placeholder="Tempat Lahir " value="<?= $m['tempat_bedaidentitas']; ?>">
                        </div>
                        <div class="col-4">
                          <input type="date" class="form-control" id="tgl_bedaidentitas" name="tgl_bedaidentitas" required placeholder="Tanggal Lahir" value="<?= $m['tgl_bedaidentitas']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="jk_bedaidentitas" name="jk_bedaidentitas" required readonly placeholder="Tempat Lahir " value="<?= $m['jk_bedaidentitas']; ?>">

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Alamat</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="alamat_bedaidentitas" name="alamat_bedaidentitas" required placeholder="Alamat"><?= $m['alamat_bedaidentitas']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Agama</label>
                        <div class="col-9">

                          <input type="text" class="form-control" id="agama_bedaidentitas" name="agama_bedaidentitas" required readonly placeholder="Tempat Lahir " value="<?= $m['agama_bedaidentitas']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Pekerjaan</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="pekerjaan_bedaidentitas" name="pekerjaan_bedaidentitas" required placeholder="Pekerjaan" value="<?= $m['pekerjaan_bedaidentitas']; ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Keterangan</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="keterangan_bedaidentitas" name="keterangan_bedaidentitas" required placeholder="Keterangan"><?= $m['keterangan_bedaidentitas']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Perbedaan</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="perbedaan" name="perbedaan" required placeholder="Perbedaan" value="<?= $m['perbedaan']; ?>">
                        </div>
                      </div>
                    <?php endforeach; ?>
                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 14) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan JAMKESOS</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>
                    <?php $query   = $db->query('SELECT * FROM surat_jamkesos where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>


                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">No JAMKESOS</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="no_jamkesos" name="no_jamkesos" required placeholder="No JAMKESOS" value="<?= $m['no_jamkesos']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Keperluan</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required placeholder="Keperluan" readonly><?= $m['keperluan']; ?></textarea>
                        </div>
                      </div>

                    <?php endforeach; ?>
                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 42) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan Kepemilikan Kendaraan</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>
                    <?php $query   = $db->query('SELECT * FROM surat_milikkendaraan where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Merek / Tipe</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="merk" name="merk" required placeholder="Merk / Tipe" value="<?= $m['merk']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tahun Penerbitan / Warna</label>
                        <div class="col-4">
                          <input type="text" class="form-control " id="tahun_penerbitan" name="tahun_penerbitan" placeholder="Tahun Penerbitan" value="<?= $m['tahun_penerbitan']; ?>" maxlength="4" readonly>

                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="warna" name="warna" required placeholder="Warna" value="<?= $m['warna']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">No Polisi / No Mesin / No Rangka</label>
                        <div class="col-3">
                          <input type="text" class="form-control" id="nopol" name="nopol" required placeholder="No Polisi" value="<?= $m['nopol']; ?>" readonly>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="no_mesin" name="no_mesin" required placeholder="No Mesin" value="<?= $m['no_mesin']; ?>" readonly>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="no_rangka" name="no_rangka" required placeholder="No Rangka" value="<?= $m['no_rangka']; ?>" readonly>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">No BPKB / Bahan Bakar / Silinder (CC)</label>
                        <div class="col-3">
                          <input type="text" class="form-control" id="no_bpkb" name="no_bpkb" required placeholder="No BPKB" value="<?= $m['no_bpkb']; ?>" readonly>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" required placeholder="Bahan Bakar" value="<?= $m['bahan_bakar']; ?>" readonly>
                        </div>
                        <div class="col-3">
                          <input type="text" class="form-control" id="silinder" name="silinder" placeholder="Silinder (CC)" value="<?= $m['silinder']; ?>" readonly>

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Atas Nama</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="atas_milik" name="atas_milik" required placeholder="Atas Nama" value="<?= $m['atas_milik']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Keperluan</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required placeholder="Keperluan" readonly><?= $m['keperluan']; ?></textarea>
                        </div>
                      </div>

                    <?php endforeach; ?>
                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 24) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan Wali Hakim</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>


                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 21) { ?>
                  <h4 class="page-title">Surat Permohonan Keterangan Lahir Mati</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>
                    <?php $query   = $db->query('SELECT * FROM surat_lahirmati where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Hari Meninggal, Tanggal Meninggal</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="hari" name="hari" required placeholder="Hari Meninggal" value="<?= $m['hari']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="tglmati" name="tglmati" required placeholder="Tanggal Meninggal" value="<?php
                                                                                                                                              $dt = explode('-', $m['tglmati']);

                                                                                                                                              echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                                                                                              ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tempat Meninggal</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="tempatmeninggal" name="tempatmeninggal" required placeholder="Tempat Meninggal" value="<?= $m['tempatmeninggal']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Lama Kandungan (Bulan)</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="lamakandungan" name="lamakandungan" placeholder="Lama Kandungan" value="<?= $m['lamakandungan']; ?>" readonly>

                        </div>
                      </div>
                      <?php $query   = $db->query('SELECT * FROM penduduk where id =' . $m['ibu']);
                      $results = $query->getRowArray();
                      ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama Ibu</label>
                        <div class="col-9">
                          <input type="hidden" class="form-control" id="ibu" name="ibu" required placeholder="Nama Pelapor" value="<?= $m['ibu']; ?>" readonly>
                          <input type="text" class="form-control" required placeholder="Nama Pelapor" value="<?= $results['nama']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Hubungan Dengan yg Lahir Mati</label>
                        <div class="col-9">
                          <input type="text" class="form-control" id="hubungan" name="hubungan" required placeholder="Hubungan Dengan yg Lahir Mati" value="<?= $m['hubungan']; ?>" readonly>
                        </div>
                      </div>



                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 3) { ?>
                  <h4 class="page-title">Surat Permohonan Biodata Penduduk</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 23) { ?>
                  <h4 class="page-title">Surat Keterangan Pergi Kawin</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_kawin where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Tujuan</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="tujuan" name="tujuan" required value="<?= $sp['tujuan']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Keperluan</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required readonly><?= $sp['keperluan']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 18) { ?>
                  <h4 class="page-title">Surat Keterangan Pergi Kawin</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 26) { ?>
                  <h4 class="page-title">Surat Keterangan Cerai</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_cerai where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $sp) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Tanggal Cerai</label>
                        <div class="col-12">
                          <input type="text" class="form-control" id="tglcerai" name="tglcerai" required value="<?php $dt = explode('-', $sp['tglcerai']);
                                                                                                                echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0]; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label">Sebab - Sebab</label>
                        <div class="col-12">
                          <textarea type="text" rows="4" class="form-control" id="sebab" name="sebab" required readonly><?= $sp['sebab']; ?></textarea>
                        </div>
                      </div>


                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } else if ($datapermohonan['id_surat'] == 41) { ?>
                  <h4 class="page-title">Surat Kuasa</h4>
                  <hr style="size: 20px;border-width: 2px; border-color: burlywood;">
                  <form action="<?php echo base_url('/addpermohonan/' . $datapermohonan['id_permohonan']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Nik / Nama</label>
                      <div class="col-12">
                        <input type="text" class="form-control" value="<?= $datapermohonan['nik']; ?> / <?= $datapermohonan['nama']; ?>" required readonly>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $datapermohonan['id_permohonan']; ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $datapermohonan['id']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $datapermohonan['id_surat']; ?>" required>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">Tempat Tanggal Lahir</label>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?= $datapermohonan['tempatlahir']; ?>" required readonly>
                      </div>
                      <div class="col-6">
                        <input type="text" class="form-control" value="<?php
                                                                        $dt = explode('-', $datapermohonan['tanggallahir']);

                                                                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                                                                        ?>" required readonly>
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-12 col-form-label">No Surat</label>
                      <div class="col-12">
                        <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
                      </div>

                      <div class="col-12">
                        <h6>Format No Surat :<br> Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                      </div>
                      <div class="col-5">
                        <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));
                                                                                      if ($dt[1] == '01') {
                                                                                        $month = 'I';
                                                                                      }
                                                                                      if ($dt[1] == '02') {
                                                                                        $month = 'II';
                                                                                      }
                                                                                      if ($dt[1] == '03') {
                                                                                        $month = 'III';
                                                                                      }
                                                                                      if ($dt[1] == '04') {
                                                                                        $month = 'IV';
                                                                                      }
                                                                                      if ($dt[1] == '05') {
                                                                                        $month = 'V';
                                                                                      }
                                                                                      if ($dt[1] == '06') {
                                                                                        $month = 'VI';
                                                                                      }
                                                                                      if ($dt[1] == '07') {
                                                                                        $month = 'VII';
                                                                                      }
                                                                                      if ($dt[1] == '08') {
                                                                                        $month = 'VIII';
                                                                                      }
                                                                                      if ($dt[1] == '09') {
                                                                                        $month = 'IX';
                                                                                      }
                                                                                      if ($dt[1] == '10') {
                                                                                        $month = 'X';
                                                                                      }
                                                                                      if ($dt[1] == '11') {
                                                                                        $month = 'XI';
                                                                                      }
                                                                                      if ($dt[1] == '12') {
                                                                                        $month = 'XII';
                                                                                      }
                                                                                      echo    $month;

                                                                                      ?> " required readonly>
                        <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                      $dt = explode('-', date('Y-m-d'));

                                                                                      echo   $dt['0'];

                                                                                      ?> " required readonly>
                      </div>
                    </div>



                    <?php $query   = $db->query('SELECT * FROM surat_kuasa where id_permohonan =' . $datapermohonan['id_permohonan']);
                    $results = $query->getResultArray();
                    foreach ($results as $m) : ?>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nik </label>
                        <div class="col-9">
                          <input type="text" class="form-control" name="nik_penerima" id="nik_penerima" placeholder="NIK" value="<?= $m['nik_penerima']; ?>" maxlength="16" readonly>

                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                          <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="Nama" required value="<?= $m['nama_penerima']; ?>" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tempat, Tanggal Lahir</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="tempatlahirpenerima" name="tempatlahirpenerima" required placeholder="Tempat Lahir" value="<?= $m['tempatlahirpenerima']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="date" class="form-control" id="tgllahirpenerima" name="tgllahirpenerima" required placeholder="Tanggal Lahir" value="<?= $m['tgllahirpenerima']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Jenis Kelamin / Pekerjaan</label>
                        <div class="col-4">
                          <input name="jk_penerima" id="jk_penerima" class="form-control" value="<?php if ($m['jk_penerima'] == "Laki - Laki") {
                                                                                                    echo 'Laki - Laki';
                                                                                                  } ?>  <?php if ($m['jk_penerima'] == "Perempuan") {
                                                                                                          echo 'Perempuan';
                                                                                                        } ?> 
                     " readonly>
                        </div>
                        <?php $query   = $db->query('SELECT * FROM pekerjaan where id_pekerjaan =' . $m['id_pekerjaan']);
                        $results = $query->getResultArray();
                        foreach ($results as $p) : ?>
                          <div class="col-4">
                            <input type="hidden" class="form-control" id="id_pekerjaan" name="id_pekerjaan" required placeholder="Desa" value="<?= $p['id_pekerjaan']; ?>">

                            <input type="text" class="form-control" required placeholder="Desa" value="<?= $p['nama_pekerjaan']; ?>" readonly>


                          <?php endforeach; ?>

                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Alamat</label>
                        <div class="col-9">
                          <textarea type="text" rows="2" class="form-control" id="alamat_penerima" name="alamat_penerima" required placeholder="Alamat" readonly><?= $m['alamat_penerima']; ?></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Desa / Kecamatan </label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="desa_penerima" name="desa_penerima" required placeholder="Desa" value="<?= $m['desa_penerima']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="kec_penerima" name="kec_penerima" required placeholder="Kecamatan" value="<?= $m['kec_penerima']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Kabupaten / Provinsi</label>
                        <div class="col-4">
                          <input type="text" class="form-control" id="kab_penerima " name="kab_penerima" required placeholder="Kabupaten" value="<?= $m['kab_penerima']; ?>" readonly>
                        </div>
                        <div class="col-4">
                          <input type="text" class="form-control" id="prov_penerima" name="prov_penerima" required placeholder="Provinsi" value="<?= $m['prov_penerima']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Keperluan</label>
                        <div class="col-9">
                          <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required placeholder="Keperluan" readonly><?= $m['keperluan']; ?></textarea>
                        </div>
                      </div>



                    <?php endforeach; ?>

                    <div class="form-group mb-0 justify-content-end row">
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success waves-effect waves-light"> <span><i class="fas fa-check"></i> </span>Lulus Periksa</button>
                  </form>
                  <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#belumlengkap"> <span><i class="dripicons-wrong"></i> </span> Dokumen Belum Lengkap</button>
                  <div id="belumlengkap" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog" style="max-height: max-content;">
                      <div class=" modal-content">
                        <form action="<?= base_url('belumlengkap/' . $datapermohonan['id_permohonan']); ?>" method="post" class="form-horizontal">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Kirim Pesan</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <input type="hidden" class="form-control" id="field-3" name="id" required value="<?= $datapermohonan['id'] ?>">
                                  <label for="field-1" class="control-label">Pesan</label>
                                  <textarea type="text" rows="3" class="form-control" id="field-3" name="pesan" required></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Kirim</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                <?php  } ?>
              </div>
            </div>


          </div>

        </div>
      </div>

    </div>

  </div>
</div>
</div>
<!-- end row -->

</div> <!-- end container-fluid -->

</div> <!-- end content -->




<!-- end Footer -->


<?php $this->Endsection(); ?>