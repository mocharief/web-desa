<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>

<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Dokumen</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">
        <br>
        <a href="<?php echo base_url('/tambahdokumenuser'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-plus"></i> &nbsp; Tambah Dokumen
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
                    <th style="width: 15%;">Aksi</th>
                    <th>Nama Dokumen</th>




                </tr>
            </thead>


            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($dokumen as $p) : ?>
                    <tr>

                        <td style="vertical-align: middle;"><?= $i++; ?></td>
                        <td style="vertical-align: middle;">

                            <a href="<?php echo base_url('editdokumenuser/' . $p['id_dokumen']); ?>"><button type="button" class="btn btn-success btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </a>
                            <form action="<?= base_url('deletedokumenuser/' . $p['id_dokumen']); ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" id="id" name="id" value="<?= $p['id']; ?>">
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin ?');" class="btn btn-danger waves-effect waves-light btn-xs " data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </form>

                        </td>

                        <td style="vertical-align: middle;"><?= $p['nama_dokumen']; ?></td>




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