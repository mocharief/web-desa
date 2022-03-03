<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Media Sosial</h4>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card-box">
          <form action="<?php echo base_url('/sosmed/update/' . $sosmed['id']); ?>" method="post" class="form-horizontal">
            <?= csrf_field(); ?>
            <div class="row">


              <div class="col-md-12">
                <div class="card-box">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Link Facebook</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="fb" name="fb" placeholder="Link Facebook" value="<?= $sosmed['fb']; ?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">No WhatsApp</label>
                    <div class="col-9">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">+62</span>
                        </div>
                        <input class="form-control <?= ($validation->hasError('wa')) ? 'is-invalid' : '';  ?>" type="text" id="wa" name="wa" placeholder="No Wa" maxlength="13" autocomplete="" value="<?php echo substr($sosmed['wa'], 2, 20); ?>">
                        <div class="invalid-feedback">
                          <b><?= $validation->getError('wa'); ?></b>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Link Youtube</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Link Youtube" value="<?= $sosmed['yt']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Link Instagram</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Link Instagram" value="<?= $sosmed['ig']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Link Twitter</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Link Twitter" value="<?= $sosmed['twitter']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label">Link Telegram</label>
                    <div class="col-9">
                      <input type="text" class="form-control" id="telegram" name="telegram" placeholder="Link Telegram" value="<?= $sosmed['telegram']; ?>">
                    </div>
                  </div>
                  <div class="form-group mb-0 justify-content-end row">
                    <div class="col-9">
                      <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </form>
        </div>
      </div> <!-- end col -->


    </div>
    <!-- /.content-wrapper -->
  </div>
  <?php $this->Endsection(); ?>