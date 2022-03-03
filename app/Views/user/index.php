<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Profil Penduduk</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">
        <table class="table  dt-responsive nowrap" style="border-spacing: 0; width: 100%;">
            <tbody>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NIK</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nik']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nama']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> No Kartu Keluarga</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['no_kk']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Hubungan Dalam Keluarga</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"><?= $user['nama_hubungan']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Jenis Kelamin</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['sex'] == '1') {
                            echo "Laki - Laki";
                        } else if ($user['sex'] == '2') {
                            echo "Perempuan";
                        }

                        ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Agama</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['agama']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> No Akta Kelahiran</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"><?= $user['akta_lahir']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Tempat Lahir</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"><?= $user['tempatlahir']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Tanggal Lahir</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php
                        $dt = explode('-', $user['tanggallahir']);
                        echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];

                        ?></td>
                </tr>


                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Waktu Kelahiran</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['waktu_lahir']; ?> WIB</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Tempat Dilahirkan</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['tempat_dilahirkan'] == 1) {
                            echo 'RS/RB';
                        } ?> <?php if ($user['tempat_dilahirkan'] == 2) {
                                        echo 'Puskesmas';
                                    } ?>
                        <?php if ($user['tempat_dilahirkan'] == 3) {
                            echo 'Polindes';
                        } ?>
                        <?php if ($user['tempat_dilahirkan'] == 4) {
                            echo 'Rumah';
                        } ?>
                        <?php if ($user['tempat_dilahirkan'] == 5) {
                            echo 'Lainnya';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">Jenis Kelahiran</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['jenis_kelahiran'] == 1) {
                            echo 'Tunggal';
                        } ?>
                        <?php if ($user['jenis_kelahiran'] == 2) {
                            echo 'Kembar 2';
                        } ?>
                        <?php if ($user['jenis_kelahiran'] == 3) {
                            echo 'Kembar 3';
                        } ?>
                        <?php if ($user['jenis_kelahiran'] == 4) {
                            echo 'Kembar 4';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Anak Ke</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"><?= $user['kelahiran_anak_ke']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Penolong Kelahiran</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['penolong_kelahiran'] == 1) {
                            echo 'Dokter';
                        } ?>
                        <?php if ($user['penolong_kelahiran'] == 2) {
                            echo 'Bidan Perawat';
                        } ?>
                        <?php if ($user['penolong_kelahiran'] == 3) {
                            echo 'Dukun Beranak';
                        } ?>
                        <?php if ($user['penolong_kelahiran'] == 4) {
                            echo 'Lainnya';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Berat Lahir (gram)</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['berat_lahir']; ?> gr</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Panjang Lahir (cm)</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['panjang_lahir']; ?> cm</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Pendidikan Dalam KK</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nama_pendidikan_kk']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Pendidikan yang sedang ditempuh</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nama_pendidikan']; ?></td>
                </tr>


                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Pekerjaan</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nama_pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Status Kewarganegaraan</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['warganegara_id'] == 1) {
                            echo 'WNI';
                        } ?>
                        <?php if ($user['warganegara_id'] == 2) {
                            echo 'WNA';
                        } ?>
                        <?php if ($user['warganegara_id'] == 3) {
                            echo 'Dua Kewarganegaraan';
                        } ?> </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">No Passport</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['dokumen_pasport'] != 0) {
                        ?>
                            <?= $user['dokumen_pasport']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Tgl Berakhir Pasport</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">

                        <?php if ($user['tanggal_akhir_paspor'] != 0) {
                            $dt = explode('-', $user['tanggal_akhir_paspor']);
                            echo   $dt[2] . '-' . $dt[1] . '-' . $dt[0];
                        } else {
                            echo "-";
                        }
                        ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nomor KITAS/KITAP</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['dokumen_kitas'] != 0) {
                        ?>
                            <?= $user['dokumen_kitas']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NIK Ayah</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['ayah_nik']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Ayah</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nama_ayah']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> NIK Ibu</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['ibu_nik']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Nama Ibu</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['nama_ibu']; ?></td>
                </tr>

                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Dusun</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['namadusun']; ?>a</td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> RT/RW</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['rt']; ?> / <?= $user['rw']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">No Telepon</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['telepon'] != 0) {
                        ?>
                            <?= $user['telepon']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Alamat Email</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['email'] != 0) {
                        ?>
                            <?= $user['email']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">Alamat Sekarang</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;"> <?= $user['alamat_sekarang']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Status Perkawinan</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['status_kawin'] == 1) {
                            echo 'Belum Kawin';
                        } ?>
                        <?php if ($user['status_kawin'] == 2) {
                            echo 'Kawin';
                        } ?>
                        <?php if ($user['status_kawin'] == 3) {
                            echo 'Cerai Hidup';
                        } ?>

                        <?php if ($user['status_kawin'] == 4) {
                            echo 'Cerai Mati';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">No Akta Nikah</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['akta_perkawinan'] != 0) {
                        ?>
                            <?= $user['akta_perkawinan']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?></td>
                </tr>

                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> No Akta Perceraian</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['akta_perceraian'] != 0) {
                        ?>
                            <?= $user['akta_perceraian']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Tanggal Perceraian</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['tanggalperceraian'] != 0) {
                        ?>
                            <?= $user['tanggalperceraian']; ?>
                        <?php  } else {
                            echo "-";
                        }
                        ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">Golongan Darah</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?= $user['nama_golongan']; ?></td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;">Cacat</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['cacat_id'] == 1) {
                            echo 'Cacat Fisik';
                        } ?>
                        <?php if ($user['cacat_id'] == 2) {
                            echo 'Cacat Netra/Buta';
                        } ?>
                        <?php if ($user['cacat_id'] == 3) {
                            echo 'Cacat Rungu/Wicara';
                        } ?>
                        <?php if ($user['cacat_id'] == 4) {
                            echo 'Cacat Mental/Jiwa';
                        } ?>
                        <?php if ($user['cacat_id'] == 5) {
                            echo 'Cacat Fisik dan Mental';
                        } ?>
                        <?php if ($user['cacat_id'] == 6) {
                            echo 'Cacat Lainnya';
                        } ?>
                        <?php if ($user['cacat_id'] == 7) {
                            echo 'Tidak Cacat';
                        } ?> </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Sakit Menahun</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['sakit_menahun_id'] == 1) {
                            echo 'Tidak Sakit';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 2) {
                            echo 'Jantung';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 3) {
                            echo 'Lever';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 4) {
                            echo 'Paru - Paru';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 5) {
                            echo 'Kangker';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 6) {
                            echo 'Stroke';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 7) {
                            echo 'Diabetes';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 8) {
                            echo 'Ginjal';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 9) {
                            echo 'Malaria';
                        } ?>
                        <?php if ($user['sakit_menahun_id'] == 10) {
                            echo 'Lainnya';
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; width: 35%; color: black; font-weight: bold;"> Status Kehamilan</td>
                    <td style="vertical-align: middle; width: 2%; color: black; font-weight: bold;"> :</td>
                    <td style=" vertical-align: middle;color: black; font-weight: bold;">
                        <?php if ($user['hamil'] == 1) {
                            echo 'Tidak Hamil';
                        } ?>
                        <?php if ($user['hamil'] == 2) {
                            echo 'Hamil';
                        } ?>
                    </td>
                </tr>

            </tbody>
        </table>

    </div>


</div>
</div>

</div>
<!-- end row -->



</div> <!-- end container-fluid -->



<?php $this->Endsection(); ?>