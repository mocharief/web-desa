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

          <h4 class="page-title">Data Penduduk</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('admin/penduduk/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">

        <div class="col-md-3">
          <div class="card-box">

            <br> <br>


            <div class="form-group row">

              <div class="col-12" style="text-align: center;">

                <img src="<?= base_url(' public/admin/images/penduduk/penduduk.png'); ?>" width="60%">

                <label style="text-align: center; color: red;" for="inputEmail3" class="col-12 col-form-label">
                  <h6>(Kosongkan jika Foto tidak diubah)</h6>
                </label>
                <div class="col-12" style="text-align: center;">
                  <input type="file" name="gambar" class="form-control">
                </div>

              </div>


            </div>

          </div>
        </div>
        <div class="col-md-9">
          <div class="card-box">
            <a href="<?= base_url('/managependuduk'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke daftar Penduduk
              </button></a>

            <br> <br>
            <h6>.* Wajib diisi</h6>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4" class="col-form-label">NIK* </label>
                <input type="text" class="form-control  <?= ($validation->hasError('nik')) ? 'is-invalid' : '';  ?>" id="inputEmail4" name="nik" placeholder="NIK" value="<?= old('nik'); ?>" maxlength="16">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('nik'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Nama Lengkap (Tanpa Gelar)*</label>
                <input type="text" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : '';  ?>" name="nama" placeholder="Nama Lengkap" value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                  <b> <?= $validation->getError('nama'); ?></b>
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" placeholder="Kota" value="<?= $kddesa; ?>">

            <div class="form-row">

              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Hubungan Dalam Keluarga*</label>
                <select name="hubungan" id="hubungan" class="form-control  <?= ($validation->hasError('hubungan')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Hubungan Keluarga</option>
                  <?php foreach ($hubungan as $d) : ?>
                    <option value="<?php echo $d['id_hubungan'] ?>" <?php if (old('hubungan') == $d['id_hubungan']) {
                                                                      echo "selected";
                                                                    } ?>>
                      <?php echo $d['nama_hubungan'] ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('hubungan'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Jenis Kelamin*</label>
                <select name="jk" id="jk" class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option <?php if (old('jk') == 1) {
                            echo 'selected';
                          } ?> value="1">Laki - Laki
                  </option>
                  <option <?php if (old('jk') == 2) {
                            echo 'selected';
                          } ?> value="2">Perempuan
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('jk'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Agama*</label>
                <select name="agama" id="agama" class="form-control  <?= ($validation->hasError('agama')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Agama</option>
                  <?php foreach ($agama as $d) : ?>
                    <option value="<?php echo $d['agama_id'] ?>" <?php if (old('agama') == $d['agama_id']) {
                                                                    echo "selected";
                                                                  } ?>>
                      <?php echo $d['agama'] ?></option>

                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('agama'); ?></b>
                </div>
              </div>
            </div>
            <br>
            <h5>Data Kelahiran :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">No Akta Kelahiran</label>
                <input type="text" class="form-control" name="no_akta" id="no_akta" placeholder="No Akta Kelahiran" value="<?= old('no_akta'); ?>">
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4" class="col-form-label">Tempat Lahir*</label>
                <input type="text" class="form-control  <?= ($validation->hasError('tempatlahir')) ? 'is-invalid' : '';  ?>" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir" autofocus value="<?= old('tempatlahir'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('tempatlahir'); ?></b>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Tanggal Lahir*</label>
                <input type="date" class="form-control  <?= ($validation->hasError('tanggallahir')) ? 'is-invalid' : '';  ?>" name="tanggallahir" id="tanggallahir" placeholder="Tanggal Lahir" autofocus value="<?= old('tanggallahir'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('tanggallahir'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Waktu Kelahiran</label>
                <input id="timepicker2" class="form-control" name="waktulahir" placeholder="Waktu Lahir" value="<?= old('waktulahir'); ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Tempat Dilahirkan</label>
                <select name="tempatdilahirkan" id="tempatdilahirkan" class="form-control">
                  <option value="">Pilih Tempat Dilahirkan</option>
                  <option <?php if (old('tempatdilahirkan') == 1) {
                            echo 'selected';
                          } ?> value="1">RS/RB
                  </option>
                  <option <?php if (old('tempatdilahirkan') == 2) {
                            echo 'selected';
                          } ?> value="2">Puskesmas
                  </option>
                  <option <?php if (old('tempatdilahirkan') == 3) {
                            echo 'selected';
                          } ?> value="3">Polindes
                  </option>
                  <option <?php if (old('tempatdilahirkan') == 4) {
                            echo 'selected';
                          } ?> value="4">Rumah
                  </option>
                  <option <?php if (old('tempatdilahirkan') == 5) {
                            echo 'selected';
                          } ?> value="5">Lainnya
                  </option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Jenis Kelahiran</label>
                <select name="jeniskelahiran" id="jeniskelahiran" class="form-control">
                  <option value="">Pilih Jenis Kelahiran</option>
                  <option <?php if (old('jeniskelahiran') == 1) {
                            echo 'selected';
                          } ?> value="1">Tunggal
                  </option>
                  <option <?php if (old('jeniskelahiran') == 2) {
                            echo 'selected';
                          } ?> value="2">Kembar 2
                  </option>
                  <option <?php if (old('jeniskelahiran') == 3) {
                            echo 'selected';
                          } ?> value="3">Kembar 3
                  </option>
                  <option <?php if (old('jeniskelahiran') == 4) {
                            echo 'selected';
                          } ?> value="4">Kembar 4
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Anak Ke (Isi dengan Angka)</label>
                <input type="text" class="form-control" id="anakke" name="anakke" placeholder="Anak Ke" maxlength="2" autofocus value="<?= old('anakke'); ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Penolong Kelahiran</label>
                <select name="penolong" id="penolong" class="form-control">
                  <option value="">Pilih Penolong Kelahiran</option>
                  <option <?php if (old('penolong') == 1) {
                            echo 'selected';
                          } ?> value="1">Dokter
                  </option>
                  <option <?php if (old('penolong') == 2) {
                            echo 'selected';
                          } ?> value="2">Bidan Perawat
                  </option>
                  <option <?php if (old('penolong') == 3) {
                            echo 'selected';
                          } ?> value="3">Dukun Beranak
                  </option>
                  <option <?php if (old('penolong') == 4) {
                            echo 'selected';
                          } ?> value="4">Lainnya
                  </option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Berat Lahir (gram)</label>
                <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat Lahir" maxlength="5" value="<?= old('berat'); ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Panjang Lahir (cm)</label>
                <input type="text" class="form-control" name="panjang" id="panjang" placeholder="Panjang Lahir" maxlength="3" value="<?= old('panjang'); ?>">
              </div>
            </div>
            <h5>Pendidikan dan Pekerjaan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Pendidikan Dalam KK*</label>
                <select name="pendidikankk" id="pendidikankk" class="form-control  <?= ($validation->hasError('pendidikankk')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Pendidikan Dalam KK</option>
                  <?php foreach ($pendidikankk as $d) : ?>
                    <option value="<?php echo $d['id_pendidikan_kk'] ?>" <?php if (old('pendidikankk') == $d['id_pendidikan_kk']) {
                                                                            echo "selected";
                                                                          } ?>>
                      <?php echo $d['nama_pendidikan_kk'] ?></option>

                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('pendidikankk'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Pendidikan ynag sedang ditempuh*</label>
                <select name="pendidikan" id="pendidikan" class="form-control <?= ($validation->hasError('pendidikan')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Pendidikan Sedang ditempuh</option>
                  <?php foreach ($pendidikan as $d) : ?>
                    <option value="<?php echo $d['id_pendidikan'] ?>" <?php if (old('pendidikan') == $d['id_pendidikan']) {
                                                                        echo "selected";
                                                                      } ?>>
                      <?php echo $d['nama_pendidikan'] ?></option>


                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('pendidikan'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Pekerjaan*</label>
                <select name="pekerjaan" id="pekerjaan" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Pekerjaan</option>
                  <?php foreach ($pekerjaan as $d) : ?>
                    <option value="<?php echo $d['id_pekerjaan'] ?>" <?php if (old('pekerjaan') == $d['id_pekerjaan']) {
                                                                        echo "selected";
                                                                      } ?>>
                      <?php echo $d['nama_pekerjaan'] ?></option>


                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('pekerjaan'); ?></b>
                </div>
              </div>
            </div>
            <h5>Data Kewarganegaraan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Status Kewarganegaraan*</label>
                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control  <?= ($validation->hasError('kewarganegaraan')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Status Kewarganegaraan</option>
                  <option <?php if (old('kewarganegaraan') == 1) {
                            echo 'selected';
                          } ?> value="1">WNI
                  </option>
                  <option <?php if (old('kewarganegaraan') == 2) {
                            echo 'selected';
                          } ?> value="2">WNA
                  </option>
                  <option <?php if (old('kewarganegaraan') == 3) {
                            echo 'selected';
                          } ?> value="3">Dua Kewarganegaraan
                  </option>

                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('kewarganegaraan'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4" class="col-form-label">No Passport</label>
                <input type="text" class="form-control" name="pasport" id="pasport" placeholder="No Passport" value="<?= old('pasport'); ?>">
                <h6>*) Kosongkan Jika Kewarganegaraan WNI</h6>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Tgl Berakhir Pasport</label>
                <input type="date" class="form-control" name="tglpasport" id="tglpasport" placeholder="Tgl Berakhir Pasport" value="<?= old('tglpasport'); ?>">
                <h6>*) Kosongkan Jika Kewarganegaraan WNI</h6>
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4" class="col-form-label">Nomor KITAS/KITAP</label>
                <input type="text" class="form-control" name="kitas" id="kitas" placeholder="Nomor KITAS/KITAP" value="<?= old('kitas'); ?>">
                <h6>*) Kosongkan Jika Kewarganegaraan WNI</h6>
              </div>
            </div>
            <h5>Data Orang Tua :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">NIK Ayah</label>
                <input type="text" class="form-control <?= ($validation->hasError('nikayah')) ? 'is-invalid' : '';  ?>" name="nikayah" id="nikayah" placeholder="NIK Ayah" maxlength="16" value="<?= old('nikayah'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('nikayah'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4" class="col-form-label">Nama Ayah</label>
                <input type="text" class="form-control" name="namaayah" id="namaayah" placeholder="Nama Ayah" value="<?= old('namaayah'); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">NIK Ibu</label>
                <input type="text" class="form-control <?= ($validation->hasError('nikibu')) ? 'is-invalid' : '';  ?>" name="nikibu" id="nikibu" placeholder="NIK Ibu" maxlength="16" value="<?= old('nikibu'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('nikibu'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4" class="col-form-label">Nama Ibu</label>
                <input type="text" class="form-control" name="namaibu" id="namaibu" placeholder="Nama Ibu" value="<?= old('namaibu'); ?>">
              </div>
            </div>
            <h5>Alamat :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Dusun*</label>
                <select name="dusun" id="dusun" class="form-control <?= ($validation->hasError('dusun')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Dusun</option>
                  <?php foreach ($dusun as $d) : ?>
                    <option value="<?php echo $d['id_dusun'] ?>" <?php if (old('dusun') == $d['id_dusun']) {
                                                                    echo "selected";
                                                                  } ?>>
                      <?php echo $d['namadusun'] ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('dusun'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">RW*</label>
                <select name="rw" id="rw" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : '';  ?>" autofocus>


                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('rw'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">RT*</label>
                <select name="rt" id="rt" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : '';  ?>" autofocus>


                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('rt'); ?></b>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">No Telepon</label>
                <input type="text" class="form-control" name="telp" id="telp" placeholder="No Telepon" value="<?= old('telp'); ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Alamat Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" value="<?= old('email'); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Alamat Sebelumnya</label>
                <input type="text" class="form-control" name="alamatsebelumnya" id="alamatsebelumnya" placeholder="Alamat Sebelumnya" value="<?= old('alamatsebelumnya'); ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Alamat Sekarang*</label>
                <input type="text" class="form-control  <?= ($validation->hasError('alamatsekarang')) ? 'is-invalid' : '';  ?>" name="alamatsekarang" id="alamatsekarang" placeholder="Alamat Sekarang" autofocus value="<?= old('alamatsekarang'); ?>">
                <div class="invalid-feedback">
                  <b><?= $validation->getError('alamatsekarang'); ?></b>
                </div>
              </div>
            </div>
            <h5>Status Perkawinan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Status Perkawinan*</label>
                <select name="kawin" id="kawin" class="form-control <?= ($validation->hasError('kawin')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Status Perkawinan</option>
                  <option <?php if (old('kawin') == 1) {
                            echo 'selected';
                          } ?> value="1">Belum Kawin
                  </option>
                  <option <?php if (old('kawin') == 2) {
                            echo 'selected';
                          } ?> value="2">Kawin
                  </option>
                  <option <?php if (old('kawin') == 3) {
                            echo 'selected';
                          } ?> value="3">Cerai Hidup
                  </option>
                  <option <?php if (old('kawin') == 4) {
                            echo 'selected';
                          } ?> value="4">Cerai Mati
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('kawin'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">No Akta Nikah</label>
                <input type="text" class="form-control" name="aktanikah" id="aktanikah" placeholder="No Akta Nikah" value="<?= old('aktanikah'); ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Tanggal Perkawinan</label>
                <input type="date" class="form-control" name="tglkawin" id="tglkawin" placeholder="Tanggal Perkawinan" value="<?= old('tglkawin'); ?>">
                <h6>(Wajib diisi Jika Status Perkawinan Kawin) </h6>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">No Akta Perceraian</label>
                <input type="text" class="form-control" name="aktacerai" id="aktacerai" placeholder="No Akta Perceraian" value="<?= old('aktacerai'); ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Tanggal Perceraian</label>
                <input type="date" class="form-control" name="tglcerai" id="tglcerai" placeholder="Tanggal Perceraian" value="<?= old('tglcerai'); ?>">
                <h6>(Wajib diisi Jika Status Perkawinan Cerai) </h6>
              </div>
            </div>
            <h5>Data Kesehatan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Golongan Darah*</label>
                <select name="golongan" id="golongan" class="form-control  <?= ($validation->hasError('golongan')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Golongan Darah</option>
                  <?php foreach ($golongan as $d) : ?>
                    <option value="<?php echo $d['id_golongan'] ?>" <?php if (old('golongan') == $d['id_golongan']) {
                                                                      echo "selected";
                                                                    } ?>>
                      <?php echo $d['nama_golongan'] ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('golongan'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Cacat*</label>
                <select name="cacat" id="cacat" class="form-control  <?= ($validation->hasError('cacat')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Jenis Cacat</option>
                  <option <?php if (old('cacat') == 1) {
                            echo 'selected';
                          } ?> value="1">Cacat Fisik
                  </option>
                  <option <?php if (old('cacat') == 2) {
                            echo 'selected';
                          } ?> value="2">Cacat Netra/Buta
                  </option>
                  <option <?php if (old('cacat') == 3) {
                            echo 'selected';
                          } ?> value="3">Cacat Rungu/Wicara
                  </option>
                  <option <?php if (old('cacat') == 4) {
                            echo 'selected';
                          } ?> value="4">Cacat Mental/Jiwa
                  </option>
                  <option <?php if (old('cacat') == 5) {
                            echo 'selected';
                          } ?> value="5">Cacat Fisik dan Mental
                  </option>
                  <option <?php if (old('cacat') == 6) {
                            echo 'selected';
                          } ?> value="6">Cacat Lainnya
                  </option>
                  <option <?php if (old('cacat') == 7) {
                            echo 'selected';
                          } ?> value="7">Tidak Cacat
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('cacat'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Sakit Menahun*</label>
                <select name="sakit" id="sakit" class="form-control  <?= ($validation->hasError('sakit')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Sakit Menahun</option>

                  <option <?php if (old('sakit') == 1) {
                            echo 'selected';
                          } ?> value="1">Tidak Sakit
                  </option>
                  <option <?php if (old('sakit')  == 2) {
                            echo 'selected';
                          } ?> value="2">Jantung
                  </option>
                  <option <?php if (old('sakit')  == 3) {
                            echo 'selected';
                          } ?> value="3">Lever
                  </option>
                  <option <?php if (old('sakit')  == 4) {
                            echo 'selected';
                          } ?> value="4">Paru - Paru
                  </option>
                  <option <?php if (old('sakit')  == 5) {
                            echo 'selected';
                          } ?> value="5">Kangker
                  </option>
                  <option <?php if (old('sakit')  == 6) {
                            echo 'selected';
                          } ?> value="6">Stroke
                  </option>
                  <option <?php if (old('sakit')  == 7) {
                            echo 'selected';
                          } ?> value="7">Diabetes
                  </option>
                  <option <?php if (old('sakit')  == 8) {
                            echo 'selected';
                          } ?> value="8">Ginjal
                  </option>
                  <option <?php if (old('sakit')  == 9) {
                            echo 'selected';
                          } ?> value="9">Malaria
                  </option>
                  <option <?php if (old('sakit')  == 10) {
                            echo 'selected';
                          } ?> value="10">Lainnya
                  </option>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('sakit'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Status Kehamilan</label>
                <select name="hamil" id="hamil" class="form-control">
                  <option value="">Pilih Kehamilan</option>
                  <option <?php if (old('hamil') == 1) {
                            echo 'selected';
                          } ?> value="1">Tidak Hamil
                  </option>
                  <option <?php if (old('hamil') == 2) {
                            echo 'selected';
                          } ?> value="2">Hamil
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">

              </div>
              <div class="form-group col-md-4">

              </div>
              <div class="form-group mb-0 justify-content-end row">
                <div class="col-9">
                  <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </form>
  </div>
</div>



<?php $this->Endsection(); ?>