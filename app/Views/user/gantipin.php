<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Ganti Pin</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">


    </div>
    <div class="col-12">
        <div class="card-box">


            <form action="<?php echo base_url('/user/gantipin/gantipassword'); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <?php if (session()->getFlashdata('msg')) { ?>
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo session()->getFlashdata('msg') ?>
                    </div>
                <?php } ?>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">PIN LAMA</label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="pinlama" id="pinlama" placeholder="PIN LAMA" maxlength="6">
                        <br>
                        <input type="checkbox" onclick="myFunction()"> Show PIN
                    </div>

                </div>
                <div class=" form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">PIN BARU</label>
                    <div class="col-9">
                        <input type="password" class="form-control" name="pinbaru" id="pinbaru" maxlength="6" placeholder="PIN BARU">
                        <br>
                        <input type="checkbox" onclick="myFunction1()"> Show PIN
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
<!-- end row -->



</div> <!-- end container-fluid -->

<script>
    function myFunction() {
        var x = document.getElementById("pinlama");

        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }

    }
</script>
<script>
    function myFunction1() {

        var y = document.getElementById("pinbaru");


        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }

    }
</script>

<?php $this->Endsection(); ?>