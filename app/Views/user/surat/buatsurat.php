<?php $this->extend('layout/templateuser'); ?>
<?php $this->section('isi'); ?>


<div class="col-xl-9">
    <div class="card-box">
        <h3 class="mb-2">Layanan Mandiri</h3>
        <hr style="size: 20px;border-width: 7px; border-color: burlywood;">
        <a href="<?php echo base_url('/surat'); ?>">
            <button type="button" class="btn btn-info btn-sm waves-effect waves-light">
                <i class="fas fa-envelope"></i> &nbsp; Permohonan Surat Anda
            </button>

        </a>

        <br> <br>
        <div class="row">
            <?php foreach ($layanan as $p) : ?>
                <div class="col-lg-6">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <div class="card-widgets">
                                <a data-toggle="collapse" href="#cardCollpase<?= $p['id_format_surat']; ?>" role="button" aria-expanded="true" aria-controls="cardCollpase2"><i class="mdi mdi-plus"></i></a>

                            </div>
                            <h5 class="card-title mb-0 text-white"> <?= $p['nama_surat']; ?></h5>
                        </div>
                        <div id="cardCollpase<?= $p['id_format_surat']; ?>" class="collapse">
                            <div class="card-body">
                                <h4>Persyaratan Dokumen</h4>

                                <form action="<?php echo base_url('user/surat/' . $p['url_surat'] . '/' . $p['id_format_surat']); ?>" method="post" class="form-horizontal">
                                    <?= csrf_field(); ?>
                                    <table class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">


                                        <thead>
                                            <tr>
                                                <th style="width: 2%;">No</th>
                                                <th style="width: 7%;">Persyaratan</th>
                                                <th style="width: 20%;">Dokumen Anda</th>




                                            </tr>
                                        </thead>


                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php $query   = $db->query('SELECT * FROM setting_syarat JOIN syarat_surat ON setting_syarat.id_syarat = syarat_surat.ref_syarat_id where setting_syarat.kddesa=' . $kddesa . ' AND setting_syarat.id_surat =' . $p['id_format_surat']);
                                            $results = $query->getResultArray();
                                            foreach ($results as $j) : ?>

                                                <tr>

                                                    <td style="vertical-align: middle;"><?= $i++; ?></td>

                                                    <td style="vertical-align: middle;"><?= $j['ref_syarat_nama']; ?></td>


                                                    <td style="vertical-align: middle;">

                                                        <select name="hubungan" id="hubungan" class="form-control" required autofocus>
                                                            <option value="">Pilih Data</option>
                                                            <?php $query   = $db->query('SELECT * FROM dokumen JOIN syarat_surat ON dokumen.id_syarat = syarat_surat.ref_syarat_id where id =' . session()->get('id') . ' AND  dokumen.kddesa=' . $kddesa . ' AND dokumen.id_syarat =' . $j['ref_syarat_id']);
                                                            $results = $query->getResultArray();
                                                            foreach ($results as $d) : ?>
                                                                <option value="<?= $d['id_syarat']; ?>"><?= $d['nama_dokumen']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>

                                                    </td>




                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-info btn-sm waves-effect waves-light">
                                        <i class="fas fa-envelope"></i> &nbsp; Buat Surat
                                    </button>


                                </form>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div><!-- end col -->
            <?php endforeach; ?>
        </div>

    </div>

</div>
</div>

</div>
<!-- end row -->



</div> <!-- end container-fluid -->



<?php $this->Endsection(); ?>