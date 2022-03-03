<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>


<!-- Content Wrapper. Contains page content -->

<!-- Main content -->
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data artikel</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('identitas/update/' . $identitas['id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-4">
          <div class="card-box">

            <br> <br>
            <input type="hidden" id="namalama" name="namalama" value="<?php echo $identitas['logo']; ?>">

            <div class="form-group row">

              <div class="col-12" style="text-align: center;">

                <?php if ($identitas['logo'] == '') {
                  echo "<img src='" .  base_url('public/admin/images/identitas/sumedang.png') . "' width='40%'>
           <br> <br>";
                } else {
                  echo "
                <img src='" .  base_url('public/admin/images/identitas/' . $identitas['logo']) . "' width='40%'>
           <br> <br> ";
                } ?>
              </div>

              <label style="text-align: center;" for="inputEmail3" class="col-12 col-form-label">Lambang Desa </label>
              <label style="text-align: center; color: red;" for="inputEmail3" class="col-12 col-form-label">(Kosongkan jika Lambang tidak diubah) </label>
              <div class="col-12" style="text-align: center;">
                <input type="file" name="gambar" class="form-control">
              </div>

            </div>


          </div>
          <div class="card-box">

            <br> <br>
            <input type="hidden" id="namalama2" name="namalama2" value="<?php echo $identitas['kantor_desa']; ?>">
            <input type="hidden" id="kddesa" name="kddesa" value="<?php echo $identitas['kddesa']; ?>">

            <div class="form-group row">

              <div class="col-12" style="text-align: center;">

                <?php if ($identitas['kantor_desa'] == '') {
                  echo " <h6>Tidak Ada Foto</h6>";
                } else {
                  echo "
                <img src='" .  base_url('public/admin/images/identitas/' . $identitas['kantor_desa']) . "' width='100%'>
           <br> <br> ";
                } ?>
              </div>

              <label style="text-align: center;" for="inputEmail3" class="col-12 col-form-label">Kantor Desa </label>
              <label style="text-align: center; color: red;" for="inputEmail3" class="col-12 col-form-label">(Kosongkan jika Foto tidak diubah) </label>
              <div class="col-12" style="text-align: center;">
                <input type="file" name="gambar2" class="form-control">
              </div>

            </div>


          </div>
        </div>
        <div class="col-md-8">

          <div class="card-box">
            <a href="<?= base_url('/manageidentitas'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Profil Desa
              </button></a>
            <br> <br>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nama_desa" value="<?php echo $identitas['nama_desa']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Kode Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="kode_desa" value="<?php echo $identitas['kode_desa']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Kode Pos Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="kode_pos" value="<?php echo $identitas['kode_pos']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Kepala Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nama_kepala_desa" value="<?php echo $identitas['nama_kepala_desa']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">NIP Kepala Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nip_kepala_desa" value="<?php echo $identitas['nip_kepala_desa']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Alamat Kantor Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="alamat_kantor" value="<?php echo $identitas['alamat_kantor']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Email Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="email_desa" value="<?php echo $identitas['email_desa']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">No Telepon Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="telepon" value="<?php echo $identitas['telepon']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Website Desa</label>
              <div class="col-9">
                <input type="text" class="form-control" name="website" value="<?php echo $identitas['website']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Kecamatan</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nama_kecamatan" value="<?php echo $identitas['nama_kecamatan']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Kode Kecamatan</label>
              <div class="col-9">
                <input type="text" class="form-control" name="kode_kecamatan" value="<?php echo $identitas['kode_kecamatan']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Camat</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nama_kepala_camat" value="<?php echo $identitas['nama_kepala_camat']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">NIP Camat</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nip_kepala_camat" value="<?php echo $identitas['nip_kepala_camat']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Kabupaten</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nama_kabupaten" value="<?php echo $identitas['nama_kabupaten']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Kode Kabupaten</label>
              <div class="col-9">
                <input type="text" class="form-control" name="kode_kabupaten" value="<?php echo $identitas['kode_kabupaten']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Nama Provinsi</label>
              <div class="col-9">
                <input type="text" class="form-control" name="nama_propinsi" value="<?php echo $identitas['nama_propinsi']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-3 col-form-label">Kode Provinsi</label>
              <div class="col-9">
                <input type="text" class="form-control" name="kode_propinsi" value="<?php echo $identitas['kode_propinsi']; ?>">
              </div>
            </div>
            <div class="form-group mb-0 justify-content-end row">
              <div class="col-9">
                <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
              </div>
            </div>

          </div>
        </div>

      </div>
    </form>
  </div>
</div>




<?php $this->Endsection(); ?>