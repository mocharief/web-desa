<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Layanan Mandiri</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">
        <a href="<?php echo base_url('/buatpermohonan'); ?>">
            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">
                <i class="fas fa-plus"></i> &nbsp; Permohonan Surat
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
                    <th style="text-align: center;">Aksi</th>
                    <th style="width: 65%;text-align: center;">Jenis Surat</th>

                </tr>
            </thead>


            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($permohonansurat as $p) : ?>
                    <tr>

                        <td style="vertical-align: middle;"><?= $i++; ?></td>
                        <td style="vertical-align: middle;">
                            <?php if ($p['status'] == '1') {
                            ?>
                                <a href=""><button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik Untuk Memeriksa" disabled>
                                        <span><i class="dripicons-loading"></i> </span> Sedang Diperiksa
                                    </button></a>

                                <form action="<?php echo base_url('batalkanpermohonan/' . $p['id_permohonan']); ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $p['id_permohonan']; ?>" required>
                                    <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Batalkan Permohonan">
                                        <span><i class="fas fa-times"></i> </span>
                                    </button>

                                </form>
                            <?php } else if ($p['status'] == '2') {
                            ?>
                                <a href=""><button type="button" class="btn btn-purple btn-xs waves-effect waves-light" disabled>
                                        <span><i class="fas fa-edit"></i> </span> Menunggu Tandatangan
                                    </button></a>
                            <?php } else if ($p['status'] == '3') {
                            ?>
                                <?php if ($p['id_surat'] == '17') {
                                ?>
                                    <a href=""><button type="button" class="btn btn-warning btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik Jika akta Sudah Selesai" disabled>
                                            <span><i class="dripicons-thumbs-up"></i> </span> Akta Sedang Diproses
                                        </button></a>
                                <?php } else {
                                ?>
                                    <a href="<?php echo base_url('permohonanselesai/' . $p['id_permohonan']); ?>"><button type="button" class="btn btn-warning btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik Untuk Melihat Surat">
                                            <span><i class="dripicons-thumbs-up"></i> </span> Sudah Selesai
                                        </button></a>
                                <?php  }  ?>

                            <?php } else if ($p['status'] == '4') {
                            ?>
                                <?php if ($p['id_surat'] == '17') {
                                ?>
                                    <a href=""><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Klik Jika akta Sudah Selesai" disabled>
                                            Akta Selesai Silahkan Hubungi Admin Untuk Pengambilan Akta
                                        </button></a>
                                <?php } else {
                                ?>
                                    <a href=""><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sudah Diambil" disabled>
                                            <span><i class="dripicons-checkmark"></i> </span> Proses Selesai
                                        </button></a>
                                    <a href="<?= base_url('' . $p['url_download'] . '/' . $p['id_permohonan']); ?>"><button type=" button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Permohonan">
                                            <span><i class="fas fa-eye"></i> </span>
                                        </button></a>
                                <?php  }  ?>


                            <?php } else if ($p['status'] == '5') {
                            ?>
                                <a href="<?php echo base_url('kirimlagi/' . $p['id_permohonan']); ?>"><button type="button" class="btn btn-dark btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kirim Lagi">
                                        <span><i class="dripicons-wrong"></i> </span> Permohonan Ditolak
                                    </button></a>
                            <?php } else if ($p['status'] == '6') {
                            ?>
                                <a href=""><button type="button" class="btn btn-danger btn-xs waves-effect waves-light" disabled>
                                        <span><i class="dripicons-wrong"></i> </span> Dibatalkan
                                    </button></a>
                            <?php }
                            ?>

                        </td>

                        <td style="vertical-align: middle;"> <?= $p['nama_surat']; ?></td>

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