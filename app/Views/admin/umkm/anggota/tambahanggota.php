<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Anggota UMKM</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/admin/umkm/simpananggota'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('viewanggota/' . $umkm['id_umkm']); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>


            <input type="hidden" class="form-control" id="id_umkm" name="id_umkm" required placeholder="Nama UMKM" required value="<?= $umkm['id_umkm'] ?>">
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" required placeholder="Nama UMKM" required value="<?= $umkm['kddesa'] ?>">


            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Anggota UMKM</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2" required>
                  <option>Pilih Nama Anggota UMKM</option>
                  <?php $query   = $db->query('SELECT * from penduduk Where id NOT IN(SELECT id FROM anggotaumkm) AND kddesa=' . $kddesa);

                  $results = $query->getResultArray();
                  foreach ($results as $d) : ?>
                    <option value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Keterangan</label>
              <div class="col-9">
                <textarea type="text" rows="5" class="form-control" id="ket" name="ket" placeholder="Ket."></textarea>
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