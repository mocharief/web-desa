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

          <h4 class="page-title">Cetak Layanan Surat</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-md-12">
        <div class="card-box table-responsive">
          <div class="form-group col-md-6">
            <label for="inputPassword4" class="col-form-label">Judul Surat</label>
            <select name="hubungan" id="hubungan" class="form-control" required autofocus data-toggle="select2">
              <option value="">-- Pilih Judul Surat --</option>
              <?php foreach ($pengaturan as $d) : ?>
                <option value="<?= $d['id_format_surat']; ?>"><?= $d['nama_surat']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 17%;">Aksi</th>
                <th style=" width: 50%;">Layanan Administrasi Surat (Daftar Favorit)</th>
                <th>Kode Surat</th>
                <th>Lampiran</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($favorit as $p) : ?>
                <tr>
                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('buatsurat/' . $p['id_format_surat']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Buat Surat">
                        <i class="mdi mdi-file-word-box"></i> Buat Surat
                      </button></a>
                    <a href="<?php echo base_url('nonfavorit/' . $p['id_format_surat']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Non Favorit">
                        <i class="fas fa-star"></i>
                      </button></a>

                  </td>

                  <td style="vertical-align: middle;"> <?= $p['nama_surat']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['kode_surat']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['lampiran']; ?></td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <br> <br>
          <table id="example" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 17%;">Aksi</th>
                <th style=" width: 50%;">Layanan Administrasi Surat</th>
                <th>Kode Surat</th>
                <th>Lampiran</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($nonfavorit as $p) : ?>
                <tr>
                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('buatsurat/' . $p['id_format_surat']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Buat Surat">
                        <i class="mdi mdi-file-word-box"></i> Buat Surat
                      </button></a>
                    <a href="<?php echo base_url('favorit/' . $p['id_format_surat']); ?>"><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Favorit">
                        <i class="far fa-star"></i>
                      </button></a>

                  </td>

                  <td style="vertical-align: middle;"> <?= $p['nama_surat']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['kode_surat']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['lampiran']; ?></td>

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