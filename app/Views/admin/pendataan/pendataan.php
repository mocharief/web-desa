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

          <h4 class="page-title">Data Pendataan Covid 19</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <a href="<?php echo base_url('/tambahpemudik'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
              <i class="fas fa-plus"></i> &nbsp; Tambah Warga Pemudik
            </button>

          </a>
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
                <th>NIK</th>
                <th>Nama </th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Alamat </th>
                <th>Asal Pemudik</th>
                <th>Tanggal Tiba</th>
                <th>Tujuan Pemudik</th>
                <th>Kontak</th>
                <th>Status</th>
                <th>Keluhan</th>
                <th>Wajib Pantau</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($pendataan as $p) : ?>
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
                    <a href="<?php echo base_url('editpemudik/' . $p['id_terdata']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button></a>
                    <form action="<?= base_url('deletepemudik/' . $p['id_terdata']); ?>" method="post" class="d-inline">
                      <?= csrf_field(); ?>
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                        <i class="fas fa-trash"></i>
                      </button>

                    </form>
                  </td>
                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                  <td style="vertical-align: middle;"> <?= $y; ?> Tahun</td>
                  <td style="vertical-align: middle;"><?php if ($p['sex'] == '1') {
                                                        echo "Laki - Laki";
                                                      } else if ($p['sex'] == '2') {
                                                        echo "Perempuan";
                                                      }

                                                      ?></td>
                  <td style="vertical-align: middle;"> <?= $p['alamat_sekarang']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['asal_mudik']; ?></td>
                  <td style="vertical-align: middle;"> <?php
                                                        $dt = explode('-', $p['tgl_datang']);
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
                  <td style="vertical-align: middle;"> <?php if ($p['tujuan_mudik'] == '1') {
                                                          echo "Liburan";
                                                        } else if ($p['tujuan_mudik'] == '2') {
                                                          echo "Menjenguk Keluarga";
                                                        } else if ($p['tujuan_mudik'] == '3') {
                                                          echo "Pulang Kampung";
                                                        } else if ($p['tujuan_mudik'] == '4') {
                                                          echo "Dll";
                                                        }

                                                        ?></td>
                  <td style="vertical-align: middle;"> <?= $p['no_hp']; ?> / <?= $p['email_penduduk']; ?></td>
                  <td style="vertical-align: middle;"><?php if ($p['status_covid'] == '1') {
                                                        echo "ODP";
                                                      } else if ($p['status_covid'] == '2') {
                                                        echo "PDP";
                                                      } else if ($p['status_covid'] == '3') {
                                                        echo "ODR";
                                                      } else if ($p['status_covid'] == '4') {
                                                        echo "OTG";
                                                      } else if ($p['status_covid'] == '5') {
                                                        echo "Positif Covid-19";
                                                      } else if ($p['status_covid'] == '6') {
                                                        echo "DLL";
                                                      }
                                                      ?></td>
                  <td style="vertical-align: middle;"> <?= $p['keluhan_kesehatan']; ?></td>
                  <td style="vertical-align: middle;"><?php if ($p['wajib_pantau'] == '1') {
                                                        echo "Ya";
                                                      } else if ($p['wajib_pantau'] == '2') {
                                                        echo "Tidak";
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