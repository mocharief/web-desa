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
    <form action="<?php echo base_url('/user/surat/simpankuasa'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <?= csrf_field(); ?>
        <div class="row">


            <div class="col-md-12">
                <div class="card-box">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label" style="font-size: large; font-weight: bolder;">Pemberi Kuasa</label>
                        <div class="col-3">

                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Nik / Nama</label>
                        <div class="col-9">
                            <input type="text" class="form-control" value="<?= $user['nik']; ?> / <?= $user['nama']; ?>" required readonly>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="id_permohonan" name="id_permohonan" value="<?= $kode ?>" required>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $iduser; ?>" required>

                    <input type="hidden" class="form-control" id="id_surat" name="id_surat" value="<?= $surat['id_format_surat']; ?>" required>
                    <input type="hidden" class="form-control" id="kddesa" name="kddesa" value="<?= $kddesa; ?>" autocomplete="off" required>


                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Tempat Tanggal Lahir</label>
                        <div class="col-5">
                            <input type="text" class="form-control" value="<?= $user['tempatlahir']; ?> " required readonly>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" value="<?php
                                                                            $dt = explode('-', $user['tanggallahir']);
                                                                            if ($dt[1] == '01') {
                                                                                $month = 'Januari';
                                                                            }
                                                                            if ($dt[1] == '02') {
                                                                                $month = 'Februari';
                                                                            }
                                                                            if ($dt[1] == '03') {
                                                                                $month = 'Maret';
                                                                            }
                                                                            if ($dt[1] == '04') {
                                                                                $month = 'April';
                                                                            }
                                                                            if ($dt[1] == '05') {
                                                                                $month = 'Mei';
                                                                            }
                                                                            if ($dt[1] == '06') {
                                                                                $month = 'Juni';
                                                                            }
                                                                            if ($dt[1] == '07') {
                                                                                $month = 'Juli';
                                                                            }
                                                                            if ($dt[1] == '08') {
                                                                                $month = 'Agustus';
                                                                            }
                                                                            if ($dt[1] == '09') {
                                                                                $month = 'September';
                                                                            }
                                                                            if ($dt[1] == '10') {
                                                                                $month = 'Oktober';
                                                                            }
                                                                            if ($dt[1] == '11') {
                                                                                $month = 'November';
                                                                            }
                                                                            if ($dt[1] == '12') {
                                                                                $month = 'Desember';
                                                                            }
                                                                            echo $dt[2] . ' ' . $month . ' ' . $dt[0];

                                                                            ?>" required readonly>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-12 col-form-label" style="font-size: large; font-weight: bolder;">Penerima Kuasa</label>
                        <div class="col-3">

                        </div>

                    </div>

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


<?php $this->Endsection(); ?>