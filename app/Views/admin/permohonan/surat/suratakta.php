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


          <button type="button" class="btn btn-purple btn-sm waves-effect waves-light" onclick="printDiv('printMe')">
            <i class="fas fa-download"></i> &nbsp; Cetak
          </button>
          <br> <br>
          <style>
            body {
              -webkit-print-color-adjust: exact !important;
            }
          </style>
          <script type="text/javascript">
            function printDiv(divName) {

              var printContents = document.getElementById(divName).innerHTML;
              var originalContens = document.body.innerHTML;
              document.body.innerHTML = printContents;
              window.print();
              document.body.innerHTML = originalContens;
            }
          </script>
          <?= csrf_field(); ?>
          <div class="row">

            <div class="col-12" id="printMe">

              <div class="block">
                <div class="block-content">
                  <table width="100%">
                    <tr>
                      <td width="25%" align="right">
                        <?php if ($logo['logo'] == '') {
                          echo "<img src='" .  base_url('public/admin/images/identitas/sumedang.png') . "' width='50%'>
           <br> <br>";
                        } else {
                          echo "
                <img src='" .  base_url('public/admin/images/identitas/' . $logo['logo']) . "' width='50%'>
           <br> <br> ";
                        } ?>
                      </td>
                      <td width="75%" align="center">
                        <h4 style="text-transform: uppercase; padding-top: 2px; font-size: 28px;">PEMERINTAH KABUPATEN <?= $logo['nama_kabupaten']; ?> </h4>
                        <h4 style="text-transform: uppercase; padding-top: 2px; font-size: 28px;">KECAMATAN <?= $logo['nama_kecamatan']; ?></h4>
                        <h4 style="text-transform: uppercase; padding-top: 2px; font-size: 28px;">Desa <?= $logo['nama_desa']; ?></h4>
                        <h4 style="text-transform: uppercase;padding-top: 2px; font-size: 16px;"><?= $logo['alamat_kantor']; ?> Kode Pos : <?= $logo['kode_pos']; ?></h4>
                      </td>

                    </tr>
                  </table>
                  <hr style="size: 20px;border-width: 7px; border-color: black;">
                  <BR> <BR>
                  <div class="row">

                    <label class="col-1">
                      <h3 class="font-w300" style="font-size: 20px;">Nomor</h3>

                    </label>
                    <div class="col-11">

                      <h3 class="font-w300" style="font-size: 20px;"> : &nbsp;<?= $permohonansurat['kode_surat']; ?>/ <?= $permohonansurat['no_surat']; ?>/<?= $permohonansurat['bulan']; ?>/<?= $permohonansurat['tahun']; ?> </h3>
                      </h3>


                    </div>
                  </div>
                  <div class="row">

                    <label class="col-1">
                      <h3 class="font-w300" style="font-size: 20px;">Perihal</h3>
                    </label>
                    <div class="col-11">

                      <h3 class="font-w300" style="font-size: 20px;"> : &nbsp;Permohonan Akta Kelahiran </h3>
                      </h3>


                    </div>
                  </div>
                  <br>
                  <div class="row">

                    <label class="col-12">
                      <h3 class="font-w300" style="font-size: 20px;">Kepata Yth</h3>
                    </label>

                  </div>
                  <br>
                  <div class="row">

                    <label class="col-12">
                      <h3 class="font-w300" style="font-size: 20px;">Kepala Pengadilan Agama</h3>
                      <h3 class="font-w300" style="font-size: 20px;">Kabupaten <?= $logo['nama_kabupaten']; ?></h3>
                    </label>
                    <label class="col-12">

                    </label>
                  </div>

                  <br>
                  <div class="row">
                    <div class="col-12">
                      <h3 class="font-w300" style="font-size: 20px;">Yang bertanda tangan di bawah ini Kepala Desa <?= $logo['nama_desa']; ?>, Kecamatan <?= $logo['nama_kecamatan']; ?>, Kabupaten <?= $logo['nama_kabupaten']; ?>, Provinsi <?= $logo['nama_propinsi']; ?> menerangkan dengan sebenarnya bahwa :</h3>
                    </div>
                  </div>


                  <div class="row">
                    <label class="col-1">

                    </label>
                    <label class="col-4">
                      <h3 class="font-w300" style="font-size: 20px;">Nama</h3>
                      <h3 class="font-w300" style="font-size: 20px;">NIK/No KTP </h3>
                      <h3 class="font-w300" style="font-size: 20px;">Tempat/ Tanggal Lahir </h3>
                      <h3 class="font-w300" style="font-size: 20px;">Alamat </h3>
                    </label>
                    <div class="col-7">

                      <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $permohonansurat['nama']; ?> </h3>
                      <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $permohonansurat['nik']; ?> </h3>
                      <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $permohonansurat['tempatlahir']; ?> /
                        <?php
                        $dt = explode('-', $permohonansurat['tanggallahir']);
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

                        ?> </h3>
                      <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $permohonansurat['alamat_sekarang']; ?> RT/RW <?= $permohonansurat['rt']; ?>/ <?= $permohonansurat['rw']; ?> Desa <?= $logo['nama_desa']; ?> Kec. <?= $logo['nama_kecamatan']; ?> Kab. <?= $logo['nama_kabupaten']; ?> Provinsi <?= $logo['nama_propinsi']; ?> </h3>
                      </h3>

                    </div>
                  </div>

                  <div class="row">

                    <div class="col-12">
                      <h3 class="font-w300" style="font-size: 20px;">Mengajukan permohonan untuk diterbitkan penetapan Pengadilan Negeri sebagai persyaratan pencatatan peristiwa kelahiran dan penerbitan kutipan Akta Kelahiran atas nama: </h3>
                      </h3>
                    </div>
                  </div>

                  <?php $query   = $db->query('SELECT * FROM surat_akta where id_permohonan =' . $permohonansurat['id_permohonan']);
                  $results = $query->getResultArray();
                  foreach ($results as $m) : ?>
                    <div class="row">
                      <label class="col-1">
                      </label>
                      <label class="col-4">
                        <h3 class="font-w300" style="font-size: 20px;">Nama </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Tempat/ Tanggal Lahir </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Hari Lahir </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Jenis Kelamin </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Alamat </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Nama Ayah </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Nama Ibu </h3>
                        <h3 class="font-w300" style="font-size: 20px;">Alamat Orang Tua </h3>
                      </label>
                      <div class="col-7">
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['nama_anak']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['tempatlahiranak']; ?> /
                          <?php
                          $dt = explode('-', $m['tgl_anak']);
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

                          ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['hari_lahir']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['jkanak']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['alamat_anak']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['nama_ayahanak']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['nama_ibuanak']; ?> </h3>
                        <h3 class="font-w300" style="font-size: 20px;"> : &nbsp; <?= $m['alamat_orangtua']; ?> </h3>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-12">
                        <h3 class="font-w300" style="font-size: 20px;"> Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya. </h3>
                        </h3>
                      </div>
                    </div>

                  <?php endforeach; ?>
                  <br>
                  <div class="row">
                    <div class="col-7">


                    </div>
                    <div class="col-5">
                      <h3 class="font-w300" style="font-size: 20px;">
                        <center><?= $logo['nama_desa']; ?>, <?php
                                                            $dt = explode('-', $permohonansurat['updated']);
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

                                                            ?> <br>
                          a.n Kepala Desa <?= $logo['nama_desa']; ?>,
                          <br><br>
                          <?php if ($surat['status'] == 3 or $surat['status'] == 4) {
                          ?>
                            <?php $gambar = base64_decode($setting['file']);
                            ?>
                            <img src='<?php echo base_url('public/admin/images/file/3/2/' . $kddesa . '/' . $gambar); ?>' width="50%">
                          <?php } else {
                            echo " <br><br> <br><br><br><br><br>";
                          } ?>
                          <br><br>
                          <?= $logo['nama_kepala_desa']; ?><br>
                          NIP : <?= $logo['nip_kepala_desa']; ?>
                        </center>
                      </h3>
                    </div>
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