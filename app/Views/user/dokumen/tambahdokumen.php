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
            <form action="<?php echo base_url('/user/dokumen/simpan'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Pesan</label>
                    <div class="col-9">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                        <input type="text" class="form-control" id="nama_dokumen" name="nama_dokumen" placeholder="Nama Dokumen" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Persyaratan</label>
                    <div class="col-9">
                        <select name="syarat" id="syarat" class="form-control" required autofocus>
                            <option value="">Pilih Persyaratan</option>
                            <?php $query   = $db->query('SELECT * from syarat_surat Where ref_syarat_id NOT IN(SELECT id_syarat FROM dokumen where id =' . $id . ')');
                            $results = $query->getResultArray();
                            foreach ($results as $d) : ?>
                                <option value="<?= $d['ref_syarat_id']; ?>"><?= $d['ref_syarat_nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <input type="hidden" name="kddesa" class="form-control" value="<?= $kddesa; ?>">

                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">File</label>
                    <div class="col-9">
                        <input type="file" name="file" class="form-control" required>
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