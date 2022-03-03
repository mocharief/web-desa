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

          <h4 class="page-title">Identitas Desa</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">

          <a href="<?php echo base_url('editidentitas/' . $logo['id']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light">
              <i class="fas fa-edit"></i> &nbsp; Edit Profil Desa
            </button></a>



          <br> <br>
          <center>

            <?php if ($logo['kantor_desa'] == '') {
              echo " ";
            } else {
              echo "
                <img src='" .  base_url('public/admin/images/identitas/' . $logo['kantor_desa']) . "' width='40%'>
           <br> <br> ";
            } ?>

            <h3>Identitas <?= $logo['nama_desa']; ?></h3>

          </center>

          <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">DESA</th>


              </tr>
            </thead>


            <tbody>


              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nama_desa']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kode Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['kode_desa']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kode Pos Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['kode_pos']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Kepala Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nama_kepala_desa']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NIP Kepala Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nip_kepala_desa']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Alamat Kantor Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['alamat_kantor']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Email Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['email_desa']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> No Telepon Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['telepon']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Website Desa</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['website']; ?></td>
              </tr>

            </tbody>
            <thead>
              <tr>
                <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">KECAMATAN</th>


              </tr>
            </thead>


            <tbody>

              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Kecamatan</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nama_kecamatan']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kode Kecamatan</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['kode_kecamatan']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Camat</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nama_kepala_camat']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NIP Camat</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nip_kepala_camat']; ?></td>
              </tr>


            </tbody>
            <thead>
              <tr>
                <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">KABUPATEN</th>


              </tr>
            </thead>


            <tbody>


              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Kabupaten</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nama_kabupaten']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kode Kabupaten</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['kode_kabupaten']; ?></td>
              </tr>



              <thead>
                <tr>
                  <th colspan="3" style="vertical-align: middle; width: 20%; color: black; font-weight: bold; font-size: larger; background-color: #64c5b1;">PROVINSI</th>


                </tr>
              </thead>


            <tbody>


              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Provinsi</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['nama_propinsi']; ?></td>
              </tr>
              <tr>
                <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Kode Provinsi</td>
                <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $logo['kode_propinsi']; ?></td>
              </tr>



            </tbody>
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