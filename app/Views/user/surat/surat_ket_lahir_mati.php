<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Layanan Mandiri Pembuatan Surat Permohonan Keterangan Lahir Mati</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">
        <a href="<?php echo base_url('/surat'); ?>">
            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">
                <i class="fas fa-envelope"></i> &nbsp; Permohonan Surat Anda
            </button>

        </a>

        <br> <br>

    </div>
    <form action="<?php echo base_url('/user/surat/simpanlahirmati'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <?= csrf_field(); ?>
        <div class="row">


            <div class="col-md-12">
                <div class="card-box">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nik / Nama Ibu</label>
                        <div class="col-9">
                            <select name="id" id="id" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '';  ?>" data-toggle="select2" onchange='changeValue(this.value)'>
                                <option>-- Pilih Nik / Nama Ibu --</option>
                                <?php $jsArray1 = "var prdName1 = new Array();\n"; ?>
                                <?php foreach ($penduduk as $d) : ?>

                                    <option name="id" value="<?= $d['id']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?> </option>
                                    <?php $jsArray1 .= "prdName1['" . $d['id'] . "'] = {nik:'" . addslashes($d['nik']) . "'};\n"; ?>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <b><?= $validation->getError('nik'); ?></b>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="nik" name="nik">
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $kode ?>" required>
                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $surat['id_format_surat']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Hari Meninggal, Tanggal Meninggal</label>
                        <div class="col-4">
                            <input type="text" class="form-control" id="hari" name="hari" required placeholder="Hari Meninggal" value="<?= old('hari'); ?>">
                        </div>
                        <div class="col-4">
                            <input type="date" class="form-control" id="tglmati" name="tglmati" required placeholder="Tanggal Meninggal" value="<?= old('tglmati'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tempat Meninggal</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="tempatmeninggal" name="tempatmeninggal" required placeholder="Tempat Meninggal" value="<?= old('tempatmeninggal'); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Lama Kandungan (Bulan)</label>
                        <div class="col-9">
                            <input type="text" class="form-control <?= ($validation->hasError('lamakandungan')) ? 'is-invalid' : '';  ?>" id="lamakandungan" name="lamakandungan" placeholder="Lama Kandungan" value="<?= old('lamakandungan'); ?>">
                            <div class="invalid-feedback">
                                <b><?= $validation->getError('lamakandungan'); ?></b>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="pelapor" name="pelapor" required placeholder="Nama Pelapor" value="<?= $iduser; ?>" readonly>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nama Pelapor</label>
                        <div class="col-9">
                            <input type="text" class="form-control" required placeholder="Nama Pelapor" value="<?= $user['nama']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Hubungan Dengan yg Lahir Mati</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="hubungan" name="hubungan" required placeholder="Hubungan Dengan yg Lahir Mati" value="<?= old('hubungan'); ?>">
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="url_surat" name="url_surat" required placeholder="Atas Nama" value="<?= $surat['url_surat']; ?>">


                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Kirim Permohonan</button>
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



</div> <!-- end container-fluid -->

<script type="text/javascript">
    <?php echo $jsArray1; ?>


    function changeValue(id) {
        document.getElementById('nik').value = prdName1[id].nik;

    };
</script>

<?php $this->Endsection(); ?>