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

          <h4 class="page-title">Data Pemantauan Covid 19</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-md-3">

        <div class="card-box">
          <form action="<?php echo base_url('admin/pemantauan/simpan'); ?>" method="post" class="form-horizontal">
            <?= csrf_field(); ?>
            <div class="row">

              <?php
              $today = new DateTime('today');
              ?>
              <h4 class="header-title mb-2">Form Pemantauan <br> Tanggal <span id="tgl"></span></h4>

              <div class="form-group row">
                <label for="inputPassword3" class="col-12 col-form-label">Nik/ Nama</label>
                <div class="col-12">
                  <select name="nama" id="nama" class="form-control" data-toggle="select2">
                    <option>-- NIK/ Nama Penduduk-- </option>
                    <?php foreach ($pendataan as $d) : ?>
                      <option value="<?= $d['id']; ?>"><?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-12 col-form-label">Suhu Tubuh</label>
                <div class="col-12">
                  <input type="text" class="form-control" name="suhu_tubuh" placeholder="36,75" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-12 col-form-label">Centang</label>
                <div class="col-2">
                </div>
                <div class="col-10">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="batuk" value="Ya">
                    <label class="custom-control-label" for="customCheck1">Batuk</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="flu" value="Ya">
                    <label class="custom-control-label" for="customCheck2">Flu</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="sesak" value="Ya">
                    <label class="custom-control-label" for="customCheck3">Sesak Nafas</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-12 col-form-label">Keluhan Lain</label>
                <div class="col-12">
                  <textarea type="text" class="form-control" name="keluhan" placeholder="Keluhan Lain"></textarea>
                </div>
              </div>
              <div class="form-group mb-0 justify-content-end row">
                <div class="col-12">
                  <button type="submit" class="btn btn-success waves-effect waves-light">Tambah</button>
                </div>
              </div>

            </div>


        </div>
        </form>
      </div>
      <div class="col-9">
        <div class="card-box table-responsive">
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
                <th>H+</th>
                <th>Tanggal Tiba</th>
                <th>Tanggal Pantau</th>
                <th>NIK</th>
                <th>Nama </th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Suhu </th>
                <th>Batuk</th>
                <th>Flu</th>
                <th>Sesak</th>
                <th>Keluhan</th>
                <th>Status</th>

              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($pemantauan as $p) : ?>
                <?php
                $tanggal = new DateTime($p['tanggallahir']);
                // tanggal hari ini
                $today = new DateTime('today');

                // tahun
                $y = $today->diff($tanggal)->y;
                ?>

                <tr>



                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">

                    <form action="<?= base_url('deletepemantauan/' . $p['id_pantau']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>
                  <?php $query   = $db->query('SELECT * from covid_pemudik Where id=' . $p['id']);
                  $results = $query->getResultArray();
                  foreach ($results as $l) : ?>
                    <?php
                    $tiba = new DateTime($l['tgl_datang']);
                    // tanggal hari ini
                    $today = new DateTime('today');

                    // tahun
                    $t = $today->diff($tiba)->d;
                    ?>
                    <td style="vertical-align: middle;"> H+<?= $t; ?></td>


                    <td style="vertical-align: middle;">
                      <?php
                      $dt = explode('-', $l['tgl_datang']);
                      if ($dt[1] == '01') {
                        $month = 'Januari';
                      }
                      if ($dt[1] == '02') {
                        $month = 'Februari';
                      }
                      if ($dt[1] == '03') {
                        $month = 'Maret';
                      }
                      if ($dt[1] == '04') {
                        $month = 'April';
                      }
                      if ($dt[1] == '05') {
                        $month = 'Mei';
                      }
                      if ($dt[1] == '06') {
                        $month = 'Juni';
                      }
                      if ($dt[1] == '07') {
                        $month = 'Juli';
                      }
                      if ($dt[1] == '08') {
                        $month = 'Agustus';
                      }
                      if ($dt[1] == '09') {
                        $month = 'September';
                      }
                      if ($dt[1] == '10') {
                        $month = 'Oktober';
                      }
                      if ($dt[1] == '11') {
                        $month = 'November';
                      }
                      if ($dt[1] == '12') {
                        $month = 'Desember';
                      }
                      echo   $dt[2] . ' ' . $month . ' ' . $dt[0];

                      ?></td>

                    <td style="vertical-align: middle;"> <?= $p['tanggal_jam']; ?></td>
                    <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                    <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                    <td style="vertical-align: middle;"> <?= $y; ?> Tahun</td>
                    <td style="vertical-align: middle;"><?php if ($p['sex'] == '1') {
                                                          echo "Laki - Laki";
                                                        } else if ($p['sex'] == '2') {
                                                          echo "Perempuan";
                                                        }

                                                        ?></td>
                    <td style="vertical-align: middle;"> <?= $p['suhu_tubuh']; ?> &deg;C</td>
                    <td style="vertical-align: middle;"> <?= $p['batuk']; ?></td>
                    <td style="vertical-align: middle;"> <?= $p['flu']; ?></td>
                    <td style="vertical-align: middle;"> <?= $p['sesak_nafas']; ?></td>
                    <td style="vertical-align: middle;"> <?= $p['keluhan_lain']; ?></td>
                    <td style="vertical-align: middle;"><?php if ($l['status_covid'] == '1') {
                                                          echo "ODP";
                                                        } else if ($l['status_covid'] == '2') {
                                                          echo "PDP";
                                                        } else if ($l['status_covid'] == '3') {
                                                          echo "ODR";
                                                        } else if ($l['status_covid'] == '4') {
                                                          echo "OTG";
                                                        } else if ($l['status_covid'] == '5') {
                                                          echo "Positif Covid-19";
                                                        } else if ($l['status_covid'] == '6') {
                                                          echo "DLL";
                                                        }
                                                        ?></td>
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



<!-- end Footer -->


<?php $this->Endsection(); ?>