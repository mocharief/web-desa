<?php $this->extend('layout/templateadmin'); ?>
<?php $this->section('isi'); ?>

<!-- Right Sidebar -->


<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">

          <h4 class="page-title">Data Dokumen Penduduk</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->



    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
          <br> <br>
          <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


            <thead>
              <tr>
                <th style="width: 2%;">No</th>
                <th style="width: 7%;">Aksi</th>
                <th>Nik </th>
                <th>Nama Penduduk</th>
              </tr>
            </thead>


            <tbody>
              <?php $i = 1; ?>

              <?php foreach ($dokumen as $p) : ?>

                <tr>



                  <td style="vertical-align: middle;"><?= $i++; ?></td>
                  <td style="vertical-align: middle;">
                    <a href="<?php echo base_url('daftardokumen/' . $p['id']); ?>"><button type="button" class="btn btn-primary btn-xs waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Data Dokumen Penduduk">
                        <i class="fas fa-list"></i>
                      </button>
                    </a>

                  </td>
                  <td style="vertical-align: middle;"> <?= $p['nik']; ?></td>
                  <td style="vertical-align: middle;"> <?= $p['nama']; ?></td>
                </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- end row -->

  </div> <!-- end container-fluid -->

</div> <!-- end content -->




<!-- end Footer -->


<?php $this->Endsection(); ?>