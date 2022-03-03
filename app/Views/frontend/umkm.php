<?php $this->extend('layout/templatefrontend'); ?>
<?php $this->section('isi'); ?>

<!-- Start Page Title Area -->
<div class="page-title-area bg-5">
    <div class="container">
        <div class="page-title-content">
            <h2>UMKM</h2>

            <ul>
                <li>
                    <a href="<?= base_url(); ?>">
                        Beranda 
                    </a>
                </li>

                <li class="active">UMKM</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start FAQ Area -->
<section class="faq-area faq-page-style ptb-100">
    <div class="container">
        <div class="section-title">
            <h3>Usaha Mikro Kecil dan Menengah</h3>
        </div>

        <div class="faq-accordion">
            <ul class="accordion">
                <?php foreach ($umkm as $p) : ?>
                <li class="accordion-item">
                    <a class="accordion-title active" href="javascript:void(0)">
                        <i class="ri-arrow-right-s-line"></i>
                        <?= $p['nama_umkm'] ?>
                    </a>

                    <div class="accordion-content show">
                        <p><?= $p['deskripsi'] ?></p>
                        <p><b>Ketua</b> : <?= $p['nama'] ?></p>
                        <p><b>Anggota</b> :</p>
                        <?php $query   = $db->query('SELECT anggotaumkm.*, penduduk.nama as namaLengkap from anggotaumkm join penduduk on anggotaumkm.id = penduduk.id Where anggotaumkm.id_umkm=' . $p['id_umkm']);
                        $results = $query->getResultArray();
                        foreach ($results as $res) : ?>
                            <p><i class="ri-checkbox-multiple-blank-line">  </i><?= $res['namaLengkap'] . ' (' . $res['keterangan'] . ')'; ?></p>
                        <?php endforeach; ?>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<!-- End FAQ Area -->

<?php $this->Endsection(); ?>