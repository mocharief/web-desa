<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>

<div class="col-xl-9">
    <div class="card-box table-responsive">
        <h3 class="mb-2"> Tambah Dokumen</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">

        <a href="<?php echo base_url('/dokumenuser'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Dokumen
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


        <div class="col-md-12">
            <form action="<?php echo base_url('dokumenuser/update/' . $dokumen['id_dokumen']); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Pesan</label>
                    <div class="col-9">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $iduser; ?>">
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" required autocomplete="off" value="<?= $dokumen['nama_dokumen']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Persyaratan</label>
                    <div class="col-9">

                        <?php $query   = $db->query('SELECT * from syarat_surat');
                        $results = $query->getResultArray();
                        foreach ($results as $d) : ?>
                            <?php if ($dokumen['id_syarat'] == $d['ref_syarat_id']) {
                            ?>
                                <input type="hidden" class="form-control" id="syarat" name="syarat" value=" <?php echo $d['ref_syarat_id'] ?>" readonly>
                                <input type="text" class="form-control" value=" <?php echo $d['ref_syarat_nama'] ?>" readonly>
                            <?php  } ?>



                        <?php endforeach; ?>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">File</label>
                    <div class="col-9">
                        <input type="hidden" class="form-control" id="namalama" name="namalama" value="<?php echo $dokumen['file']; ?>" readonly>
                        <a href="<?= base_url('public/admin/dokumen/' . $dokumen['id'] . '/' . $dokumen['file']) ?>" class="img-thumbnail" data-lightbox="#single-image">
                            <img id="single-image" src="<?= base_url('public/admin/dokumen/' . $dokumen['id'] . '/' . $dokumen['file']) ?>" alt="image-1" class="img-fluid" width="60%" />
                        </a>

                    </div>
                    <label for=" inputEmail3" class="col-3 col-form-label"></label>
                    <div class="col-9">

                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="form-group mb-0 justify-content-end row">
                    <div class="col-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

</div>


</div>
</div>

</div>
<!-- end row -->



</div> <!-- end container-fluid -->



<?php $this->Endsection(); ?>