<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>

<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Bantuan Penduduk</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">

        <br>
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
                <tr>
                    <th style="width: 2%;">No</th>
                    <th style="width: 7%;">Aksi</th>
                    <th style="width: 20%;">Tanggal Berlaku</th>
                    <th style="width: 20%;">Nama Proram</th>
                    <th>Keterangan</th>



                </tr>
            </thead>


            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($penerima as $p) : ?>
                    <tr>

                        <td style="vertical-align: middle;"><?= $i++; ?></td>
                        <td style="vertical-align: middle;">
                            <?php if ($p['foto'] != '') {
                            ?>
                                <a href="<?php echo base_url('download/' . $p['id_penerima']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download Kartu Peserta">
                                        <i class="fas fa-download"></i>
                                    </button>
                                </a>
                            <?php } else {
                            ?>
                                <a href=""><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Download Kartu Peserta" disabled>
                                        <i class="fas fa-download"></i>
                                    </button>
                                </a>
                            <?php  } ?>


                        </td>



                        <td style="vertical-align: middle;">
                            <?php
                            $dt = explode('-', $p['tgl1']);
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

                            ?> s/d <?php
                                                $dt = explode('-', $p['tgl2']);
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

                                                ?></td>
                        <td style="vertical-align: middle;"><?= $p['nama_program']; ?></td>
                        <td style="vertical-align: middle;"><?= $p['keterangan']; ?></td>



                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>
</div>

</div>
<!-- end row -->



</div> <!-- end container-fluid -->



<?php $this->Endsection(); ?>