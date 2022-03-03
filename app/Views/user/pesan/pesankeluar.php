<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box table-responsive">
        <h3 class="mb-2">Pesan Keluar</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">

        <a href="<?php echo base_url('/tulispesanuser'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-plus"></i> &nbsp; Tulis Pesan
            </button>

        </a>
        <a href="<?php echo base_url('/pesanuser'); ?>">
            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">
                <i class="fas fa-envelope"></i> &nbsp; Pesan Masuk
            </button>

        </a>
        <a href="<?php echo base_url('/pesankeluaruser'); ?>">
            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">
                <i class="fas fa-envelope-open"></i> &nbsp; Pesan Keluar
            </button>

        </a>
        <br> <br>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-icon alert-success text-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <i class="mdi mdi-check-all mr-2"></i>
                <?= session()->getFlashdata('pesan'); ?>
            </div>

        <?php endif; ?>

        <br>
        <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
                <tr>
                    <th style="width: 2%;">No</th>
                    <th style="width: 7%;">Aksi</th>
                    <th style="width: 40%;">Pesan</th>
                    <th>Status Pesan</th>
                    <th>Dikirim Pada</th>



                </tr>
            </thead>


            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($pesan as $p) : ?>
                    <tr>

                        <td style="vertical-align: middle;"><?= $i++; ?></td>
                        <td style="vertical-align: middle;">

                            <a href="<?php echo base_url('lihatpesankeluar/' . $p['id_pesan']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </a>

                        </td>




                        <td style="vertical-align: middle;"><?= $p['pesan']; ?></td>
                        <td style="vertical-align: middle;">
                            <?php if ($p['status'] == 0) {
                                echo "Belum Dibaca Admin";
                            } else if ($p['status'] == 1) {
                                echo "Sudah Dibaca Admin";
                            } ?>

                        </td>
                        <td style="vertical-align: middle;">
                            <?php
                            $dt = explode('-', $p['tgl_kirim']);
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



                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</div>


</div>
</div>

</div>
<!-- end row -->



</div> <!-- end container-fluid -->



<?php $this->Endsection(); ?>