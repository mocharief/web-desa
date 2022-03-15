<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Pembuatan Surat Permohonan Keterangan Kepemilikan Kendaraan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="col-xl-12">
            <form action="<?php echo base_url('/admin/layanansurat/simpanmilikkendaraan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Merek / Tipe</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="merk" name="merk" required placeholder="Merk / Tipe" value="<?= old('merk'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Tahun Penerbitan / Warna</label>
                                <div class="col-4">
                                    <input type="text" class="form-control  <?= ($validation->hasError('tahun_penerbitan')) ? 'is-invalid' : '';  ?>" id="tahun_penerbitan" name="tahun_penerbitan" placeholder="Tahun Penerbitan" value="<?= old('tahun_penerbitan'); ?>" maxlength="4">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('tahun_penerbitan'); ?></b>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <input type="text" class="form-control" id="warna" name="warna" required placeholder="Warna" value="<?= old('warna'); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">No Polisi / No Mesin / No Rangka</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" id="nopol" name="nopol" required placeholder="No Polisi" value="<?= old('nopol'); ?>">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" id="no_mesin" name="no_mesin" required placeholder="No Mesin" value="<?= old('no_mesin'); ?>">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" id="no_rangka" name="no_rangka" required placeholder="No Rangka" value="<?= old('no_rangka'); ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">No BPKB / Bahan Bakar / Silinder (CC)</label>
                                <div class="col-3">
                                    <input type="text" class="form-control" id="no_bpkb" name="no_bpkb" required placeholder="No BPKB" value="<?= old('no_bpkb'); ?>">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" required placeholder="Bahan Bakar" value="<?= old('bahan_bakar'); ?>">
                                </div>
                                <div class="col-3">
                                    <input type="text" class="form-control <?= ($validation->hasError('silinder')) ? 'is-invalid' : '';  ?>" id="silinder" name="silinder" placeholder="Silinder (CC)" value="<?= old('silinder'); ?>">
                                    <div class="invalid-feedback">
                                        <b><?= $validation->getError('silinder'); ?></b>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-3 col-form-label">Atas Nama</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="atas_milik" name="atas_milik" required placeholder="Atas Nama" value="<?= old('atas_milik'); ?>">
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