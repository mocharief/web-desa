<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>

<div class="col-xl-9">
    <div class="card-box table-responsive">
        <h3 class="mb-2"> Tulis Pesan</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">

        <a href="<?php echo base_url('/pesanuser'); ?>">
            <button type="button" class="btn btn-success btn-sm waves-effect waves-light">
                <i class="fas fa-arrow-left"></i> &nbsp; Pesan Masuk
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
            <form action="<?php echo base_url('/user/pesanuser/simpan'); ?>" method="post" class="form-horizontal">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Pesan</label>
                    <div class="col-9">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $id; ?>">
                        <input type="hidden" name="kddesa" class="form-control" value="<?= $kddesa; ?>">
                        <textarea type="text" rows="9" class="form-control" id="pesan" name="pesan" placeholder="Isi Pesan Anda" required autocomplete="off"></textarea>




                    </div>
                </div>

                <div class="form-group mb-0 justify-content-end row">
                    <div class="col-9">
                        <button type="submit" class="btn btn-success waves-effect waves-light">Kirim</button>
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