<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Right Sidebar -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">


    <!-- Main content -->
    <section class="content">

      <div class="card">
        <div class="card-header">
          <div style="width: 520px;">



            <h2>Profil Admin</h2>



          </div>



          <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-info">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?= session()->getFlashdata('pesan'); ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="card-body">
          <table id="example" class="table table-bordered table-striped table-responsive">
            <thead>
              <tr>
                <th style="width: 2%">No</th>
                <th style="width: 60%">Username</th>

                <th style="width: 10%; text-align: center;">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php $i = 1; ?>
                <?php foreach ($profil as $p) : ?>
                  <td><?= $i++; ?></td>
                  <td><?= $p['username']; ?></td>

                  <td>
                    <a href="<?php echo base_url('profil/edit/' . $p['id']); ?>">
                      <button type="button" class="btn btn-block btn-outline-primary btn-xs">Edit Username</button>
                    </a>
                    <a href="<?php echo base_url('profil/editpassword/' . $p['id']); ?>">
                      <button type="button" class="btn btn-block btn-outline-primary btn-xs">Edit Password</button>
                    </a>

                  </td>
              </tr>
            <?php endforeach; ?>


            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
  </div>

  </section>
  <!-- /.content -->
</div>
<?php $this->Endsection(); ?>