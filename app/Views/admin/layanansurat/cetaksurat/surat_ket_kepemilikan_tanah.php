<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Pembuatan Surat Keterangan Kepemilikkan Tanah</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="col-xl-12">
            <form action="<?php echo base_url('/admin/layanansurat/simpanmiliktanah'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                <label for="inputEmail3" class="col-3 col-form-label">Nik / Nama </label>
                                <div class="col-9">
                                    <select name="nama" id="nama" class="form-control" required data-toggle="select2" onchange='changeValue(this.value)'>
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
                                    <input type="text" class="form-control" name="namapenduduk" id="namapenduduk" required readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Tempat Lahir</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="tempatlahir" id="tempatlahir" required readonly>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $kode ?>" required>
                            <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $surat['id_format_surat']; ?>" required>
                            <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">No Surat</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" name="no_surat" value="<?= $no_surat ?>" required readonly>
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

                                                                                                    ?> " required readonly>
                                    <input type="hidden" class="form-control" name="tahun" value="<?php
                                                                                                    $dt = explode('-', date('Y-m-d'));

                                                                                                    echo   $dt['0'];

                                                                                                    ?> " required readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Jenis Tanah</label>
                                <div class="col-9">
                                    <select name="jenis_tanah" id="jenis_tanah" class="form-control" required autofocus>
                                        <option value="">Pilih Jenis Tanah</option>
                                        <option <?php if (old('jenis_tanah') == "Tanah Darat") {
                                                    echo 'selected';
                                                } ?> value="Tanah Darat">Tanah Darat
                                        </option>
                                        <option <?php if (old('jenis_tanah') == "Tanah Sawah") {
                                                    echo 'selected';
                                                } ?> value="Tanah Sawah">Tanah Sawah
                                        </option>
                                        <option <?php if (old('jenis_tanah') == "Tanah Bangunan") {
                                                    echo 'selected';
                                                } ?> value="Tanah Bangunan">Tanah Bangunan
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Luas Tanah (m<sup>2</sup>)</label>
                                <div class="col-9">
                                    <input type="number" class="form-control" id="luas_tanah" name="luas_tanah" required placeholder="Luas Tanah (Dalam M2)" value="<?= old('luas_tanah'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Bukti Kepemilikan</label>
                                <div class="col-9">
                                    <select name="bukti_kepemilikan" id="bukti_kepemilikan" class="form-control" required autofocus>
                                        <option value="">Pilih Bukti Kepemilikan</option>
                                        <option <?php if (old('bukti_kepemilikan') == "Petok Lama") {
                                                    echo 'selected';
                                                } ?> value="Petok Lama">Petok Lama
                                        </option>
                                        <option <?php if (old('bukti_kepemilikan') == "Petok Baru") {
                                                    echo 'selected';
                                                } ?> value="Petok Baru">Petok Baru
                                        </option>
                                        <option <?php if (old('bukti_kepemilikan') == "Sit Segel") {
                                                    echo 'selected';
                                                } ?> value="Sit Segel">Sit Segel
                                        </option>
                                        <option <?php if (old('bukti_kepemilikan') == "Akta") {
                                                    echo 'selected';
                                                } ?> value="Akta">Akta
                                        </option>
                                        <option <?php if (old('bukti_kepemilikan') == "Copy") {
                                                    echo 'selected';
                                                } ?> value="Copy">Copy
                                        </option>
                                        <option <?php if (old('bukti_kepemilikan') == "Buku Krawangan Desa") {
                                                    echo 'selected';
                                                } ?> value="Buku Krawangan Desa">Buku Krawangan Desa
                                        </option>
                                        <option <?php if (old('bukti_kepemilikan') == "Lainnya") {
                                                    echo 'selected';
                                                } ?> value="Lainnya">Lainnya
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">No Bukti / Atas Nama</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="no_buktikepemilikan" name="no_buktikepemilikan" required placeholder="No Bukti Kepemilikan" value="<?= old('no_buktikepemilikan'); ?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="atas_nama" name="atas_nama" required placeholder="Atas Nama" value="<?= old('atas_nama'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Asal Kepemilikan Tanah</label>
                                <div class="col-9">
                                    <select name="asal_kepemilikan_tanah" id="asal_kepemilikan_tanah" class="form-control" required autofocus>
                                        <option value="">Pilih Asal Kepemilikan Tanah</option>
                                        <option <?php if (old('asal_kepemilikan_tanah') == "Yayasan") {
                                                    echo 'selected';
                                                } ?> value="Yayasan">Yayasan
                                        </option>
                                        <option <?php if (old('asal_kepemilikan_tanah') == "Warisan") {
                                                    echo 'selected';
                                                } ?> value="Warisan">Warisan
                                        </option>
                                        <option <?php if (old('asal_kepemilikan_tanah') == "Hibah") {
                                                    echo 'selected';
                                                } ?> value="Hibah">Hibah
                                        </option>
                                        <option <?php if (old('asal_kepemilikan_tanah') == "Jual Beli") {
                                                    echo 'selected';
                                                } ?> value="Jual Beli">Jual Beli
                                        </option>
                                        <option <?php if (old('asal_kepemilikan_tanah') == "Lainnya") {
                                                    echo 'selected';
                                                } ?> value="Lainnya">Lainnya
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Bukti Pendukung Kepemilikan</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="bukti_pendukung" name="bukti_pendukung" required placeholder="Bukti Pendukung Kepemilikan" value="<?= old('bukti_pendukung'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Batas Utara / Batas Timur</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="batas_utara" name="batas_utara" required placeholder="Batas Utara" value="<?= old('batas_utara'); ?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="batas_timur" name="batas_timur" required placeholder=" Batas Timur" value="<?= old('batas_timur'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Batas Barat / Batas Selatan</label>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="batas_barat" name="batas_barat" required placeholder="Batas Barat" value="<?= old('batas_barat'); ?>">
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="batas_selatan" name="batas_selatan" required placeholder="Batas Selatan" value="<?= old('batas_selatan'); ?>">
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