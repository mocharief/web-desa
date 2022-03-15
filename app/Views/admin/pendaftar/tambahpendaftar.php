<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>
<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Pengguna Layanan Mandiri</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('/admin/pendaftar/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class=" row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managependaftaran'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali
              </button></a>
            <br> <br>



            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama Penduduk</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2" onchange='changeValue(this.value)'>
                  <option>-- Cari secara NIK/ Nama Penduduk-- </option>

                  <?php $query   = $db->query('SELECT * from penduduk Where id NOT IN(SELECT id FROM pendaftar) AND kddesa=' . $kddesa);

                  $results = $query->getResultArray();
                  $jsArray = "var prdName = new Array();\n";
                  foreach ($results as $d) : ?>
                    <option name="id" value="<?= $d['id']; ?>"><?= $d['nik']; ?> | <?= $d['nama']; ?></option>
                    <?php $jsArray .= "prdName['" . $d['id'] . "'] = {nik:'" . addslashes($d['nik']) . "'};\n"; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <input type="hidden" class="form-control" id="nik" name="nik" placeholder="Pin Warga" required autocomplete="off">
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No WA</label>
              <div class="col-9">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">+62</span>
                  </div>
                  <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="No WA" required autocomplete="off" maxlength="13">
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pin</label>
              <div class="col-9">
                <input type="text" class="form-control" id="pin" name="pin" maxlength="6" placeholder="Pin Warga" required autocomplete="off">



                <h6> *) 6 (enam) karakter.</h6>
                <h6>**) Silakan dicatat atau di ingat dengan baik, kode pin ini sangat rahasia, dan hanya bisa diatur sekali ini lalu setelah itu hanya bisa di reset saja.</h6>
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
<script type="text/javascript">
  <?php echo $jsArray; ?>

  function changeValue(id) {
    document.getElementById('nik').value = prdName[id].nik;

  };
</script>
<?php $this->Endsection(); ?>