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
    <form action="<?php echo base_url('penduduk/update/' . $penduduk['id']); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">

        <div class="col-md-3">
          <div class="card-box">

            <br> <br>


            <div class="form-group row">

              <div class="col-12" style="text-align: center;">

                <?php if ($penduduk['foto'] != '') {
                ?>
                  <img src="<?php echo base_url('public/admin/images/penduduk/' . $penduduk['foto']) ?>" width="60%" />
                <?php } else {
                ?>
                  <img src="<?php echo base_url('public/admin/images/penduduk/penduduk.png') ?>" width="60%" />
                <?php
                } ?>

                <label style="text-align: center; color: red;" for="inputEmail3" class="col-12 col-form-label">
                  <h6>(Kosongkan jika Foto tidak diubah)</h6>
                </label>
                <div class="col-12" style="text-align: center;">
                  <input type="hidden" id="namalama" name="namalama" value="<?php echo $penduduk['foto']; ?>">
                  <input type="file" name="gambar" class="form-control">
                </div>

              </div>


            </div>

          </div>
        </div>
        <div class="col-md-9">
          <div class="card-box">
            <a href="<?= base_url('/managependuduk'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Penduduk
              </button></a>
            <a href="<?php echo base_url('viewkeluarga/' . $penduduk['id_kk']); ?>"><button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Daftar Anggota Kepala Keluarga
              </button></a>
            <br> <br>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4" class="col-form-label">NIK</label>
                <input type="text" class="form-control" id="inputEmail4" name="nik" placeholder="NIK" required maxlength="16" value="<?= $penduduk['nik']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Nama Lengkap (Tanpa Gelar)</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required value="<?= $penduduk['nama']; ?>">
              </div>
            </div>
            <div class="form-row">

              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Hubungan Dalam Keluarga</label>
                <select name="hubungan" id="hubungan" class="form-control" required>
                  <option value="">Pilih Hubungan Keluarga</option>
                  <?php foreach ($hubungan as $d) : ?>
                    <option value="<?php echo $d['id_hubungan'] ?>" <?php if ($penduduk['kk_level'] == $d['id_hubungan']) {
                                                                      echo "selected";
                                                                    } ?>>
                      <?php echo $d['nama_hubungan'] ?></option>

                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Jenis Kelamin</label>
                <select name="jk" id="jk" class="form-control" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option <?php if ($penduduk['sex'] == 1) {
                            echo 'selected';
                          } ?> value="1">Laki - Laki
                  </option>
                  <option <?php if ($penduduk['sex'] == 2) {
                            echo 'selected';
                          } ?> value="2">Perempuan
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Agama</label>
                <select name="agama" id="agama" class="form-control" required>
                  <option value="">Pilih Agama</option>
                  <?php foreach ($agama as $d) : ?>
                    <option value="<?php echo $d['agama_id'] ?>" <?php if ($penduduk['agama_id'] == $d['agama_id']) {
                                                                    echo "selected";
                                                                  } ?>>
                      <?php echo $d['agama'] ?></option>

                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <br>
            <h5>Data Kelahiran :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">No Akta Kelahiran</label>
                <input type="text" class="form-control" name="no_akta" id="no_akta" placeholder="No Akta Kelahiran" value="<?= $penduduk['akta_lahir']; ?>">
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4" class="col-form-label">Tempat Lahir</label>
                <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" placeholder="Tempat Lahir" required value="<?= $penduduk['tempatlahir']; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tanggallahir" id="tanggallahir" placeholder="Tanggal Lahir" required value="<?= $penduduk['tanggallahir']; ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Waktu Kelahiran</label>
                <input id="timepicker2" class="form-control" name="waktulahir" placeholder="Waktu Lahir" value="<?= $penduduk['waktu_lahir']; ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Tempat Dilahirkan</label>
                <select name="tempatdilahirkan" id="tempatdilahirkan" class="form-control">
                  <option value="">Pilih Tempat Dilahirkan</option>
                  <option <?php if ($penduduk['tempat_dilahirkan'] == 1) {
                            echo 'selected';
                          } ?> value="1">RS/RB
                  </option>
                  <option <?php if ($penduduk['tempat_dilahirkan'] == 2) {
                            echo 'selected';
                          } ?> value="2">Puskesmas
                  </option>
                  <option <?php if ($penduduk['tempat_dilahirkan'] == 3) {
                            echo 'selected';
                          } ?> value="3">Polindes
                  </option>
                  <option <?php if ($penduduk['tempat_dilahirkan'] == 4) {
                            echo 'selected';
                          } ?> value="4">Rumah
                  </option>
                  <option <?php if ($penduduk['tempat_dilahirkan'] == 5) {
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
                  <option <?php if ($penduduk['jenis_kelahiran'] == 1) {
                            echo 'selected';
                          } ?> value="1">Tunggal
                  </option>
                  <option <?php if ($penduduk['jenis_kelahiran'] == 2) {
                            echo 'selected';
                          } ?> value="2">Kembar 2
                  </option>
                  <option <?php if ($penduduk['jenis_kelahiran'] == 3) {
                            echo 'selected';
                          } ?> value="3">Kembar 3
                  </option>
                  <option <?php if ($penduduk['jenis_kelahiran'] == 4) {
                            echo 'selected';
                          } ?> value="4">Kembar 4
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Anak Ke (Isi dengan Angka)</label>
                <input type="text" class="form-control" id="anakke" name="anakke" placeholder="Anak Ke" maxlength="2" required value="<?= $penduduk['kelahiran_anak_ke']; ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Penolong Kelahiran</label>
                <select name="penolong" id="penolong" class="form-control">
                  <option value="">Pilih Penolong Kelahiran</option>
                  <option <?php if ($penduduk['penolong_kelahiran'] == 1) {
                            echo 'selected';
                          } ?> value="1">Dokter
                  </option>
                  <option <?php if ($penduduk['penolong_kelahiran'] == 2) {
                            echo 'selected';
                          } ?> value="2">Bidan Perawat
                  </option>
                  <option <?php if ($penduduk['penolong_kelahiran'] == 3) {
                            echo 'selected';
                          } ?> value="3">Dukun Beranak
                  </option>
                  <option <?php if ($penduduk['penolong_kelahiran'] == 4) {
                            echo 'selected';
                          } ?> value="4">Lainnya
                  </option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Berat Lahir (gram)</label>
                <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat Lahir" maxlength="5" value="<?= $penduduk['berat_lahir']; ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Panjang Lahir (cm)</label>
                <input type="text" class="form-control" name="panjang" id="panjang" placeholder="Panjang Lahir" maxlength="3" value="<?= $penduduk['panjang_lahir']; ?>">
              </div>
            </div>
            <h5>Pendidikan dan Pekerjaan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Pendidikan Dalam KK</label>
                <select name="pendidikankk" id="pendidikankk" class="form-control" required>
                  <option value="">Pilih Pendidikan Dalam KK</option>
                  <?php foreach ($pendidikankk as $d) : ?>
                    <option value="<?php echo $d['id_pendidikan_kk'] ?>" <?php if ($penduduk['id_pendidikan_kk'] == $d['id_pendidikan_kk']) {
                                                                            echo "selected";
                                                                          } ?>>
                      <?php echo $d['nama_pendidikan_kk'] ?></option>

                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Pendidikan ynag sedang ditempuh</label>
                <select name="pendidikan" id="pendidikan" class="form-control" required>
                  <option value="">Pilih Pendidikan Sedang ditempuh</option>
                  <?php foreach ($pendidikan as $d) : ?>
                    <option value="<?php echo $d['id_pendidikan'] ?>" <?php if ($penduduk['pendidikan_sedang_id'] == $d['id_pendidikan']) {
                                                                        echo "selected";
                                                                      } ?>>
                      <?php echo $d['nama_pendidikan'] ?></option>

                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Pekerjaan</label>
                <select name="pekerjaan" id="pekerjaan" class="form-control" required>
                  <option value="">Pilih Pekerjaan</option>
                  <?php foreach ($pekerjaan as $d) : ?>
                    <option value="<?php echo $d['id_pekerjaan'] ?>" <?php if ($penduduk['id_pekerjaan'] == $d['id_pekerjaan']) {
                                                                        echo "selected";
                                                                      } ?>>
                      <?php echo $d['nama_pekerjaan'] ?></option>

                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <h5>Data Kewarganegaraan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Status Kewarganegaraan</label>
                <select name="kewarganegaraan" id="kewarganegaraan" class="form-control" required>
                  <option value="">Pilih Status Kewarganegaraan</option>
                  <option <?php if ($penduduk['warganegara_id'] == 1) {
                            echo 'selected';
                          } ?> value="1">WNI
                  </option>
                  <option <?php if ($penduduk['warganegara_id'] == 2) {
                            echo 'selected';
                          } ?> value="2">WNA
                  </option>
                  <option <?php if ($penduduk['warganegara_id'] == 3) {
                            echo 'selected';
                          } ?> value="3">Dua Kewarganegaraan
                  </option>

                </select>
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4" class="col-form-label">No Passport</label>
                <input type="text" class="form-control" name="pasport" id="pasport" placeholder="No Passport" value="<?= $penduduk['dokumen_pasport']; ?>">
                <h6>*) Kosongkan Jika Kewarganegaraan WNI</h6>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Tgl Berakhir Pasport</label>
                <input type="date" class="form-control" name="tglpasport" id="tglpasport" placeholder="Tgl Berakhir Pasport" value="<?= $penduduk['tanggal_akhir_paspor']; ?>">
                <h6>*) Kosongkan Jika Kewarganegaraan WNI</h6>
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4" class="col-form-label">Nomor KITAS/KITAP</label>
                <input type="text" class="form-control" name="kitas" id="kitas" placeholder="Nomor KITAS/KITAP" value="<?= $penduduk['dokumen_kitas']; ?>">
                <h6>*) Kosongkan Jika Kewarganegaraan WNI</h6>
              </div>
            </div>
            <h5>Data Orang Tua :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">NIK Ayah</label>
                <input type="text" class="form-control" name="nikayah" id="nikayah" placeholder="NIK Ayah" value="<?= $penduduk['ayah_nik']; ?>">
              </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4" class="col-form-label">Nama Ayah</label>
                <input type="text" class="form-control" name="namaayah" id="namaayah" placeholder="Nama Ayah" value="<?= $penduduk['nama_ayah']; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">NIK Ibu</label>
                <input type="text" class="form-control" name="nikibu" id="nikibu" placeholder="NIK Ibu" value="<?= $penduduk['ibu_nik']; ?>">
              </div>
              <div class="form-group col-md-9">
                <label for="inputPassword4" class="col-form-label">Nama Ibu</label>
                <input type="text" class="form-control" name="namaibu" id="namaibu" placeholder="Nama Ibu" value="<?= $penduduk['nama_ibu']; ?>">
              </div>
            </div>
            <h5>Alamat :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Dusun</label>
                <select name="dusun" id="dusun" class="form-control  <?= ($validation->hasError('dusun')) ? 'is-invalid' : '';  ?>" autofocus>
                  <option value="">Pilih Dusun</option>
                  <?php foreach ($dusun as $d) : ?>

                    <option value="<?= $d['id_dusun']; ?>"><?= $d['namadusun']; ?></option>


                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('dusun'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">RW</label>
                <select name="rw" id="rw" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : '';  ?>" autofocus>


                </select>
                <div class="invalid-feedback">
                  <b><?= $validation->getError('rw'); ?></b>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">RT</label>
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
                <input type="text" class="form-control" name="telp" id="telp" placeholder="No Telepon" value="<?= $penduduk['telepon']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Alamat Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Alamat Email" value="<?= $penduduk['email']; ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Alamat Sebelumnya</label>
                <input type="text" class="form-control" name="alamatsebelumnya" id="alamatsebelumnya" placeholder="Alamat Sebelumnya" value="<?= $penduduk['alamat_sebelumnya']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Alamat Sekarang</label>
                <input type="text" class="form-control" name="alamatsekarang" id="alamatsekarang" placeholder="Alamat Sekarang" value="<?= $penduduk['alamat_sekarang']; ?>">
              </div>
            </div>
            <h5>Status Perkawinan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Status Perkawinan</label>
                <select name="kawin" id="kawin" class="form-control" required>
                  <option value="">Pilih Status Perkawinan</option>
                  <option <?php if ($penduduk['status_kawin'] == 1) {
                            echo 'selected';
                          } ?> value="1">Belum Kawin
                  </option>
                  <option <?php if ($penduduk['status_kawin'] == 2) {
                            echo 'selected';
                          } ?> value="2">Kawin
                  </option>
                  <option <?php if ($penduduk['status_kawin'] == 3) {
                            echo 'selected';
                          } ?> value="3">Cerai Hidup
                  </option>
                  <option <?php if ($penduduk['status_kawin'] == 4) {
                            echo 'selected';
                          } ?> value="4">Cerai Mati
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">No Akta Nikah</label>
                <input type="text" class="form-control" name="aktanikah" id="aktanikah" placeholder="No Akta Nikah" value="<?= $penduduk['akta_perkawinan']; ?>">
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Tanggal Perkawinan</label>
                <input type="date" class="form-control" name="tglkawin" id="tglkawin" placeholder="Tanggal Perkawinan" value="<?= $penduduk['tanggalperkawinan']; ?>">
                <h6>(Wajib diisi Jika Status Perkawinan Kawin) </h6>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">No Akta Perceraian</label>
                <input type="text" class="form-control" name="aktacerai" id="aktacerai" placeholder="No Akta Perceraian" value="<?= $penduduk['akta_perceraian']; ?>">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4" class="col-form-label">Tanggal Perceraian</label>
                <input type="date" class="form-control" name="tglcerai" id="tglcerai" placeholder="Tanggal Perceraian" value="<?= $penduduk['tanggalperceraian']; ?>">
                <h6>(Wajib diisi Jika Status Perkawinan Cerai) </h6>
              </div>
            </div>
            <h5>Data Kesehatan :</h5>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="col-form-label">Golongan Darah</label>
                <select name="golongan" id="golongan" class="form-control" required>
                  <option value="">Pilih Golongan Darah</option>
                  <?php foreach ($golongan as $d) : ?>
                    <option value="<?php echo $d['id_golongan'] ?>" <?php if ($penduduk['id_golongan'] == $d['id_golongan']) {
                                                                      echo "selected";
                                                                    } ?>>
                      <?php echo $d['nama_golongan'] ?></option>

                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Cacat</label>
                <select name="cacat" id="cacat" class="form-control" required>
                  <option value="">Pilih Jenis Cacat</option>
                  <option <?php if ($penduduk['cacat_id'] == 1) {
                            echo 'selected';
                          } ?> value="1">Cacat Fisik
                  </option>
                  <option <?php if ($penduduk['cacat_id'] == 2) {
                            echo 'selected';
                          } ?> value="2">Cacat Netra/Buta
                  </option>
                  <option <?php if ($penduduk['cacat_id'] == 3) {
                            echo 'selected';
                          } ?> value="3">Cacat Rungu/Wicara
                  </option>
                  <option <?php if ($penduduk['cacat_id'] == 4) {
                            echo 'selected';
                          } ?> value="4">Cacat Mental/Jiwa
                  </option>
                  <option <?php if ($penduduk['cacat_id'] == 5) {
                            echo 'selected';
                          } ?> value="5">Cacat Fisik dan Mental
                  </option>
                  <option <?php if ($penduduk['cacat_id'] == 6) {
                            echo 'selected';
                          } ?> value="6">Cacat Lainnya
                  </option>
                  <option <?php if ($penduduk['cacat_id'] == 7) {
                            echo 'selected';
                          } ?> value="7">Tidak Cacat
                  </option>

                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Sakit Menahun</label>
                <select name="sakit" id="sakit" class="form-control" required>
                  <option value="">Pilih Sakit Menahun</option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 1) {
                            echo 'selected';
                          } ?> value="1">Tidak Sakit
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 2) {
                            echo 'selected';
                          } ?> value="2">Jantung
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 3) {
                            echo 'selected';
                          } ?> value="3">Lever
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 4) {
                            echo 'selected';
                          } ?> value="4">Paru - Paru
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 5) {
                            echo 'selected';
                          } ?> value="5">Kangker
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 6) {
                            echo 'selected';
                          } ?> value="6">Stroke
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 7) {
                            echo 'selected';
                          } ?> value="7">Diabetes
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 8) {
                            echo 'selected';
                          } ?> value="8">Ginjal
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 9) {
                            echo 'selected';
                          } ?> value="9">Malaria
                  </option>
                  <option <?php if ($penduduk['sakit_menahun_id'] == 10) {
                            echo 'selected';
                          } ?> value="10">Lainnya
                  </option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="inputPassword4" class="col-form-label">Status Kehamilan</label>
                <select name="hamil" id="hamil" class="form-control">
                  <option value="">Pilih Kehamilan</option>
                  <option <?php if ($penduduk['hamil'] == 1) {
                            echo 'selected';
                          } ?> value="1">Tidak Hamil
                  </option>
                  <option <?php if ($penduduk['hamil'] == 2) {
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