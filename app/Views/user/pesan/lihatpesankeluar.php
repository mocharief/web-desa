<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box table-responsive">
        <h3 class="mb-2"> Pesan Masuk</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">

        <a href="<?php echo base_url('/pesankeluaruser'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Pesan Keluar
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

            <?= csrf_field(); ?>
            <div class="form-group row">
                <label for="inputEmail3" class="col-3 col-form-label">Pesan</label>
                <div class="col-9">
                    <textarea type="text" rows="9" class="form-control" id="pesan" name="pesan" placeholder="Isi Pesan Anda" required autocomplete="off" readonly><?= $pesan['pesan']; ?></textarea>
                </div>
            </div>

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