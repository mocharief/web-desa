<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">


    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Profile Website</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="<?php echo base_url('/setting/update/' . $setting['id']); ?>" enctype="multipart/form-data" method="post" class="form-material">
          <?= csrf_field(); ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Website</label>
                  <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?php echo $setting['nama']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Logo</label>
                  <h6>Logo Yang Sudah Ada</h6>
                  <input type="hidden" id="namalama" name="namalama" value="<?php echo $setting['logo']; ?>" required>
                  <div class="input-group">
                    <img src="<?php echo base_url('public/admin/img/setting/logo/' . $setting['logo']) ?>" width="30%">
                  </div>
                  <br>
                  <div class="custom-file">
                    <input type="file" name="logo" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <textarea type="text" rows="8" class="form-control" id="alamat" name="alamat" autocomplete="off" required><?php echo $setting['alamat']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jam Buka</label>
                  <input type="text" class="form-control" id="jam_buka" name="jam_buka" autocomplete="off" value="<?php echo $setting['jam_buka']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">E-mail</label>
                  <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $setting['email']; ?>" required>
                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">No WA (format : 6289xxxxx)</label>
                  <div class="input-group-append">
                    <span class="input-group-text">+62</span>
                    <input type="number" class="form-control" id="wa" name="wa" autocomplete="off" value="<?php echo substr($setting['wa'], 2, 20); ?>" required>
                  </div>

                </div>
                <div class="form-group mb-3">
                  <label for="exampleInputEmail1">No WA 2 (format : 6289xxxxx)</label>
                  <div class="input-group-append">
                    <span class="input-group-text">+62</span>
                    <input type="number" class="form-control" id="wa2" name="wa2" autocomplete="off" value="<?php echo substr($setting['wa2'], 2, 20); ?>">
                  </div>

                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Instagram</label>
                  <input type="text" class="form-control" id="ig" name="ig" autocomplete="off" value="<?php echo $setting['ig']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Facebook</label>
                  <input type="text" class="form-control" id="fb" name="fb" autocomplete="off" value="<?php echo $setting['fb']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Twitter</label>
                  <input type="text" class="form-control" id="twitter" name="twitter" autocomplete="off" value="<?php echo $setting['twitter']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Map</label>
                  <textarea type="text" rows="9" class="form-control" id="map" name="map" autocomplete="off" required><?php echo $setting['map']; ?></textarea>
                </div>
              </div>
              <div class="col-md-6">

                <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <textarea type="text" rows="9" class="form-control" id="deskripsi" name="deskripsi" autocomplete="off" required><?php echo $setting['deskripsi']; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Sejarah</label>
                  <textarea type="text" rows="9" class="form-control" id="sejarah" name="sejarah" autocomplete="off" required><?php echo $setting['sejarah']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Visi</label>
                  <textarea type="text" rows="9" class="form-control" id="visi" name="visi" autocomplete="off" required><?php echo $setting['visi']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Misi</label>
                  <textarea type="text" rows="9" class="form-control" id="misi" name="misi" autocomplete="off" required><?php echo $setting['misi']; ?></textarea>
                </div>
                <h3>Setting Background</h3>
                <hr>
                <div class="form-group">
                  <label for="exampleInputFile">Background Header</label>
                  <h6>Logo Yang Sudah Ada</h6>
                  <input type="hidden" id="namalamabg" name="namalamabg" value="<?php echo $setting['background']; ?>" required>
                  <div class="input-group">
                    <img src="<?php echo base_url('public/admin/img/setting/' . $setting['background']) ?>" width="50%">
                  </div>
                  <br>
                  <div class="custom-file">
                    <input type="file" name="bg" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row"">
          <div class=" card-footer" style="background-color: transparent">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>

      </div>
      </form>
  </div>
  <!-- /.card -->
</div>

</section>
<!-- /.content -->
</div>

<?php $this->Endsection(); ?>