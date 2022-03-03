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

          <h4 class="page-title">Data Aparat Pemerintahan</h4>
        </div>
      </div>
    </div>
    <form action="<?php echo base_url('admin/pemerintahan/simpan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
      <?= csrf_field(); ?>
      <div class="row">


        <div class="col-md-12">
          <div class="card-box">
            <a href="<?= base_url('/managepemerintahan'); ?>"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke daftar Aparat Pemerintahan
              </button></a>
            <br> <br>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nik / Nama Penduduk</label>
              <div class="col-9">
                <select name="nama" id="nama" class="form-control" data-toggle="select2" required onchange='changeValue(this.value)'>

                  <option>-- Pilih Nik / Nama Penduduk --</option>
                  <?php $query   = $db->query('SELECT id, nik, nama, tempatlahir, sex, agama_id, id_pendidikan_kk, tanggallahir from penduduk Where id NOT IN(SELECT id FROM aparat) AND kddesa=' . $kddesa);

                  $results = $query->getResultArray();
                  $jsArray1 = "var prdName1 = new Array();\n";
                  foreach ($results as $d) : ?>

                    <option name="id" value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                    <?php $jsArray1 .= "prdName1['" . $d['id'] . "'] = {nik:'" . addslashes($d['nik']) . "', namaaparat:'" . addslashes($d['nama']) . "', tempatlahir:'" . addslashes($d['tempatlahir']) . "', jk:'" . addslashes($d['sex']) . "',  tanggallahir:'" . addslashes($d['tanggallahir']) . "',agama:'" . addslashes($d['agama_id']) . "', pendidikan:'" . addslashes($d['id_pendidikan_kk']) . "'};\n"; ?>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
              <div class="col-9">
                <input type="text" class="form-control" id="namaaparat" name="namaaparat" required placeholder="Nama" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIK</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nik" name="nik" required placeholder="Nik" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIPD</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nipd" name="nipd" required placeholder="NIPD">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">NIP</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nip" name="nip" required placeholder="NIP">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tempat Lahir</label>
              <div class="col-9">
                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" required placeholder="Tempat Lahhir" readonly>
              </div>
            </div>

            <input type="hidden" class="form-control" id="tanggallahir" name="tanggallahir" required placeholder="Tanggal Lahir" readonly>

            <input type="hidden" class="form-control" id="jk" name="jk" required placeholder="Jenis Kelamin" readonly>

            <input type="hidden" class="form-control" id="pendidikan" name="pendidikan" required placeholder="Pendidikan" readonly>

            <input type="hidden" class="form-control" id="agama" name="agama" required placeholder="Agama" readonly>

            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Pangkat / Golongan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="pangkat" name="pangkat" required placeholder="Pangkat / Golongan">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">No SK Pengangkatan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="skp" name="skp" required placeholder="No SK Pengangkatan">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Tanggal SK Pengangkatan</label>
              <div class="col-3">
                <input type="date" class="form-control" id="tglsk" name="tglsk" required placeholder="Tanggal SK Pengangkatan">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-3 col-form-label">Jabatan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="jabatan" name="jabatan" required placeholder="Jabatan">
              </div>
            </div>
            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>">
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
  <?php echo $jsArray1; ?>


  function changeValue(id) {
    document.getElementById('nik').value = prdName1[id].nik;
    document.getElementById('namaaparat').value = prdName1[id].namaaparat;
    document.getElementById('tempatlahir').value = prdName1[id].tempatlahir;
    document.getElementById('tanggallahir').value = prdName1[id].tanggallahir;
    document.getElementById('jk').value = prdName1[id].jk;
    document.getElementById('agama').value = prdName1[id].agama;
    document.getElementById('pendidikan').value = prdName1[id].pendidikan;
  };
</script>

<?php $this->Endsection(); ?>