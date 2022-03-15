<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Layanan Mandiri Pembuatan Surat Permohonan Keterangan Kepemilikan Kendaraan</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">
        <a href="<?php echo base_url('/surat'); ?>">
            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">
                <i class="fas fa-envelope"></i> &nbsp; Permohonan Surat Anda
            </button>

        </a>

        <br> <br>

    </div>
    <form action="<?php echo base_url('/user/surat/simpanmilikkendaraan'); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <?= csrf_field(); ?>
        <div class="row">


            <div class="col-md-12">
                <div class="card-box">
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

                    <input type="hidden" class="form-control" id="url_surat" name="url_surat" required placeholder="Atas Nama" value="<?= $surat['url_surat']; ?>">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Keperluan</label>
                        <div class="col-9">
                            <textarea type="text" rows="4" class="form-control" id="keperluan" name="keperluan" required placeholder="Keperluan"><?= old('keperluan'); ?></textarea>
                        </div>
                    </div>
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