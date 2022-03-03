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

          <h4 class="page-title">Data Pendataan Covid 19</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('admin/pendataan/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managependataan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke Pendataan Covid-19
              </button></a>
            <br> <br>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">NIK / Nama</label>

              </div>
              <div class="form-group col-md-4">

                <select name="nama" id="nama" class="form-control" data-toggle="select2">
                  <option>-- Cari secara NIK/ Nama Penduduk-- </option>
                  <?php foreach ($penduduk as $d) : ?>
                    <option value="<?= $d['id']; ?>"><?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group col-md-5">

                <a href="<?= base_url('/datapemudik'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                    <i class="fas fa-plus"></i> &nbsp; Tambah Penduduk Non Domisili
                  </button>
                </a>
                <h6>Untuk penduduk pendatang/tidak tetap. Masukkan data di sini.</h6>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Asal Pemudik / Tiba Tanggal</label>

              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="asal_mudik" name="asal_mudik" placeholder="Kota" required>

              </div>
              <div class="form-group col-md-5">

                <input type="date" class="form-control" id="tgl_tiba" name="tgl_tiba" placeholder="Nama Penduduk" required>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Tujuan Mudik / Durasi Mudik</label>

              </div>
              <div class="form-group col-md-4">

                <select name="tujuan_mudik" id="tujuan_mudik" class="form-control" required>
                  <option value="">-- Pilih Tujuan Mudik --</option>
                  <option value="1">Liburan</option>
                  <option value="2">Menjenguk Keluarga</option>
                  <option value="3">Pulang Kampung</option>
                  <option value="4">Dll</option>
                </select>
              </div>
              <div class="form-group col-md-5">

                <input type="text" class="form-control" id="durasi_mudik" name="durasi_mudik" placeholder="Jumlah Hari (angka)" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Kontak Pemudik (Hp/Email)</label>

              </div>
              <div class="form-group col-md-4">
                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" required>

              </div>
              <div class="form-group col-md-5">

                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Status Covid</label>
              <div class="col-9">
                <select name="status_covid" id="status_covid" class="form-control" required>
                  <option value="">Pilih Status Covid</option>
                  <option value="1">Orang dalam Pemantauan (ODP)</option>
                  <option value="2">Pasien dalam Pengawasan (PDP)</option>
                  <option value="3">Orang dalam Resiko (ODR)</option>
                  <option value="4">Orang tanpa Gejala (OTG)</option>
                  <option value="5">Positif Covid-19</option>
                  <option value="6">DLL</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword4" class="col-3  col-form-label">Apakah Wajib di Pantau</label>
              <div class="col-9">
                <select name="wajib_pantau" id="wajib_pantau" class="form-control" required>

                  <option value="1">Ya</option>
                  <option value="2">Tidak</option>

                </select>
                <h6>Jika ya, daftar warga ini masuk dalam daftar warga yang dipantau di menu Pemantauan.</h6>
              </div>
            </div>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keluhan Kesehatan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keluhan" name="keluhan" placeholder="Keluhan Kesehatan"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="6" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan"></textarea>
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