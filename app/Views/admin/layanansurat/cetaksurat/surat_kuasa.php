<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Pembuatan Surat Kuasa</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="col-xl-12">
            <form action="<?php echo base_url('/admin/layanansurat/simpankuasa'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?= csrf_field(); ?>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card-box">

                            <a href="<?php echo base_url('/managecetaksurat'); ?>">
                                <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                                    <i class="fas fa-arrow-left"></i> &nbsp; Kembali Ke daftar Cetak Surat
                                </button>

                            </a>
                            <br> <br> <br> <br>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">No Surat</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" readonly>
                                    <h6>Format No Surat : Kode Surat / No Surat / Bulan Romawi / Tahun</h6>
                                </div>

                                <div class="col-5">
                                    <input type="hidden" class="form-control" name="bulan" value="<?php
                                                                                                    $dt = explode('-', date('Y-m-d'));
                                                                                                    if ($dt[1] == '01') {
                                                                                                        $month = 'I';
                                                                                                    }
                                                                                                    if ($dt[1] == '02') {
                                                                                                        $month = 'II';
                                                                                                    }
                                                                                                    if ($dt[1] == '03') {
                                                                                                        $month = 'III';
                                                                                                    }
                                                                                                    if ($dt[1] == '04') {
                                                                                                        $month = 'IV';
                                                                                                    }
                                                                                                    if ($dt[1] == '05') {
                                                                                                        $month = 'V';
                                                                                                    }
                                                                                                    if ($dt[1] == '06') {
                                                                                                        $month = 'VI';
                                                                                                    }
                                                                                                    if ($dt[1] == '07') {
                                                                                                        $month = 'VII';
                                                                                                    }
                                                                                                    if ($dt[1] == '08') {
                                                                                                        $month = 'VIII';
                                                                                                    }
                                                                                                    if ($dt[1] == '09') {
                                                                                                        $month = 'IX';
                                                                                                    }
                                                                                                    if ($dt[1] == '10') {
                                                                                                        $month = 'X';
                                                                                                    }
                                                                                                    if ($dt[1] == '11') {
                                                                                                        $month = 'XI';
                                                                                                    }
                                                                                                    if ($dt[1] == '12') {
                                                                                                        $month = 'XII';
                                                                                                    }
                                                                                                    echo    $month;

                                                                                                    ?> " readonly>
                                    <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                                    $dt = explode('-', date('Y-m-d'));

                                                                                                    echo   $dt['0'];

                                                                                                    ?> " readonly>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-12 col-form-label" style="font-size: large; font-weight: bolder;">Pemberi Kuasa</label>

                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Nik / Nama Pemberi Kuasa</label>
                                <div class="col-9">
                                    <select name="nama" id="nama" class="form-control" data-toggle="select2" onchange='changeValue(this.value)'>
                                        <option>-- Pilih Nik / Nama Penduduk --</option>
                                        <?php
                                        $jsArray1 = "var prdName1 = new Array();\n";
                                        foreach ($penduduk as $d) : ?>
                                            <option name="id" value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                                            <?php $jsArray1 .= "prdName1['" . $d['id'] . "'] = {nik:'" . addslashes($d['nik']) . "', namapenduduk:'" . addslashes($d['nama']) . "', tempatlahir:'" . addslashes($d['tempatlahir']) . "'};\n"; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Nik</label>
                                <div class="col-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '';  ?>" name="nik" id="nik" readonly>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('nik'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="namapenduduk" id="namapenduduk" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Tempat Lahir</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" readonly>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $kode ?>">
                            <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $surat['id_format_surat']; ?>">
                            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off">


                            <div class="form-group row">
                                <label for="inputEmail3" class="col-12 col-form-label" style="font-size: large; font-weight: bolder;">Penerima Kuasa</label>
                                <div class="col-3">

                                </div>

                            </div>
                            <br>

                            <div class="form-group row" id="nik_penerima">
                                <label for="inputEmail3" class="col-3 col-form-label">Nik </label>
                                <div class="col-9">
                                    <input type="text" class="form-control <?= ($validation->hasError('nik_penerima')) ? 'is-invalid' : '';  ?>" name="nik_penerima" id="nik_penerima" placeholder="NIK" value="<?= old('nik_penerima'); ?>" maxlength="16">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('nik_penerima'); ?></b>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Nama</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="Nama" required value="<?= old('nama_penerima'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Tempat, Tanggal Lahir</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="tempatlahirpenerima" name="tempatlahirpenerima" required placeholder="Tempat Lahir" value="<?= old('tempatlahirpenerima'); ?>">
                                </div>
                                <div class="col-4">
                                    <input type="date" class="form-control" id="tgllahirpenerima" name="tgllahirpenerima" required placeholder="Tanggal Lahir" value="<?= old('tgllahirpenerima'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Jenis Kelamin / Pekerjaan</label>
                                <div class="col-4">
                                    <select name="jk_penerima" id="jk_penerima" class="form-control <?= ($validation->hasError('jk_penerima')) ? 'is-invalid' : '';  ?>">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option <?php if (old('jk_penerima') == "Laki - Laki") {
                                                    echo 'selected';
                                                } ?> value="Laki - Laki">Laki - Laki
                                        </option>
                                        <option <?php if (old('jk_penerima') == "Perempuan") {
                                                    echo 'selected';
                                                } ?> value="Perempuan">Perempuan
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('jk_penerima'); ?></b>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <select name="id_pekerjaan" id="id_pekerjaan" class="form-control <?= ($validation->hasError('id_pekerjaan')) ? 'is-invalid' : '';  ?>" autofocus>
                                        <option value="">Pilih Pekerjaan</option>
                                        <?php foreach ($pekerjaan as $d) : ?>
                                            <option value="<?php echo $d['id_pekerjaan'] ?>" <?php if (old('id_pekerjaan') == $d['id_pekerjaan']) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                <?php echo $d['nama_pekerjaan'] ?></option>


                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('id_pekerjaan'); ?></b>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Alamat</label>
                                <div class="col-9">
                                    <textarea type="text" rows="2" class="form-control" id="alamat_penerima" name="alamat_penerima" required placeholder="Alamat"><?= old('alamat_penerima'); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Desa / Kecamatan </label>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="desa_penerima" name="desa_penerima" required placeholder="Desa" value="<?= old('desa_penerima'); ?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="kec_penerima" name="kec_penerima" required placeholder="Kecamatan" value="<?= old('kec_penerima'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Kabupaten / Provinsi</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="kab_penerima " name="kab_penerima" required placeholder="Kabupaten" value="<?= old('kab_penerima'); ?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="prov_penerima" name="prov_penerima" required placeholder="Provinsi" value="<?= old('prov_penerima'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Keperluan</label>
                                <div class="col-9">
                                    <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required placeholder="Keperluan"><?= old('keperluan'); ?></textarea>
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

</div>
<!-- end row -->
</div>

</div>


</div> <!-- end container-fluid -->

<script type="text/javascript">
    <?php echo $jsArray1; ?>


    function changeValue(id) {
        document.getElementById('nik').value = prdName1[id].nik;
        document.getElementById('namapenduduk').value = prdName1[id].namapenduduk;
        document.getElementById('tempatlahir').value = prdName1[id].tempatlahir;
    };
</script>


<?php $this->Endsection(); ?>