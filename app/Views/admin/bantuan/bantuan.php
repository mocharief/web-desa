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

          <h4 class="page-title">Data Program Bantuan</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('/tambahbantuan'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Program Bantuan
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
                <th>Aksi</th>
                <th>Nama Program</th>
                <th>Asal Dana </th>
                <th>Masa Berlaku</th>
                <th>Jumlah Peserta</th>
                <th>Sasaran </th>
                <th>Status</th>


              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($bantuan as $p) : ?>

                <tr>



                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('viewpenerima/' . $p['id_program']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Data Penerima Bantuan">
                        <i class="fas fa-eye"></i>
                      </button>
                    </a><a href="<?php echo base_url('editbantuan/' . $p['id_program']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletebantuan/' . $p['id_program']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <input type="hidden" class="form-control" id="id_program" name="id_program" value="<?= $p['id_program']; ?>" required>
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>
                  <td style="vertical-align: middle;"> <?= $p['nama_program']; ?></td>
                  <td style="vertical-align: middle;"><?php if ($p['asaldana'] == '1') {
                                                        echo "Pusat";
                                                      } else if ($p['asaldana'] == '2') {
                                                        echo "Provinsi";
                                                      } else if ($p['asaldana'] == '3') {
                                                        echo "Kab/Kota";
                                                      } else if ($p['asaldana'] == '4') {
                                                        echo "Dana Desa";
                                                      } else if ($p['asaldana'] == '5') {
                                                        echo "Lainnya";
                                                      }

                                                      ?> </td>
                  <td style="vertical-align: middle;"><?php
                                                      $dt = explode('-', $p['tgl1']);
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

                                                      ?> - <?php
                                                            $dt = explode('-', $p['tgl2']);
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

                                                            ?> </td>
                  <?php $query   = $db->query('SELECT COUNT(*) from penerima Where id_program=' . $p['id_program']);
                  $results = $query->getRowArray();
                  foreach ($results as $d) : ?>
                    <td style="vertical-align: middle; text-align: center;"> <?= $d; ?></td>
                  <?php endforeach; ?>
                  <td style="vertical-align: middle;"><?php if ($p['sasaran'] == '1') {
                                                        echo "Penduduk / Perorangan";
                                                      } else if ($p['sasaran'] == '2') {
                                                        echo "Keluarga - KK";
                                                      } else if ($p['sasaran'] == '3') {
                                                        echo "UMKM";
                                                      }

                                                      ?></td>
                  <td style="vertical-align: middle;"><?php if ($p['status'] == '1') {
                                                        echo "Aktif";
                                                      } else if ($p['status'] == '2') {
                                                        echo "Tidak Aktif";
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




<!-- end Footer -->


<?php $this->Endsection(); ?>