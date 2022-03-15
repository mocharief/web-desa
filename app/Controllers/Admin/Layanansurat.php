<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\HubunganModel;
use App\Models\AgamaModel;
use App\Models\PendidikankkModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\GolonganModel;
use App\Models\DusunModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\KkModel;
use App\Models\IdentitasModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\PersyaratanModel;
use App\Models\PengaturansuratModel;
use App\Models\SettingsyaratModel;
use App\Models\PendaftarModel;
use App\Models\SuratpengantarModel;
use App\Models\SuratjualbeliModel;
use App\Models\SuratkriminalModel;
use App\Models\SurattidakmampuModel;
use App\Models\SuratusahaModel;
use App\Models\SuratkeramaianModel;
use App\Models\SuratkehilanganModel;
use App\Models\SuratjalanModel;
use App\Models\SuratdomisiliModel;
use App\Models\SuratpermohonanModel;
use App\Models\SuratkepemilikantanahModel;
use App\Models\LogsuratModel;
use App\Models\SuratktpprosesModel;
use App\Models\SuratbedanamaModel;
use App\Models\SuratjamkesosModel;
use App\Models\SuratmilikkendaraanModel;
use App\Models\SuratwalihakimModel;
use App\Models\SuratlahirmatiModel;
use App\Models\SuratbioModel;
use App\Models\SuratkawinModel;
use App\Models\SuratbelumaktaModel;
use App\Models\SuratceraiModel;
use App\Models\SuratkuasaModel;

class Layanansurat extends BaseController
{

    protected $pesanModel;
    protected $permohonanModel;
    protected $pendudukModel;
    protected $hubunganModel;
    protected $agamaModel;
    protected $pendidikankkModel;
    protected $pendidikanModel;
    protected $pekerjaanModel;
    protected $golonganModel;
    protected $dusunModel;
    protected $rwModel;
    protected $rtModel;
    protected $kkModel;
    protected $identitasModel;
    protected $persyaratanModel;
    protected $pengaturansuratModel;
    protected $settingsyaratModel;
    protected $pendaftarModel;
    protected $suratpengantarModel;
    protected $suratjualbeliModel;
    protected $suratkriminalModel;
    protected $surattidakmampuModel;
    protected $suratusahaModel;
    protected $suratkeramaianModel;
    protected $suratkehilanganModel;
    protected $suratjalanModel;
    protected $suratdomisiliModel;
    protected $suratpermohonanModel;
    protected $suratkepemilikantanahModel;
    protected $logsuratModel;
    protected $suratktpprosesModel;
    protected $suratbedanamaModel;
    protected $suratjamkesosModel;
    protected $suratmilikkendaraanModel;
    protected $suratwalihakimModel;
    protected $suratlahirmatiModel;
    protected $suratbioModel;
    protected $suratkawinModel;
    protected $suratbelumaktaModel;
    protected $suratceraiModel;
    protected $suratkuasaModel;


    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->hubunganModel = new HubunganModel();
        $this->pendudukModel = new PendudukModel();
        $this->agamaModel = new AgamaModel();
        $this->pendidikankkModel = new PendidikankkModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->golonganModel = new GolonganModel();
        $this->dusunModel = new DusunModel();
        $this->rwModel = new RwModel();
        $this->rtModel = new RtModel();
        $this->kkModel = new KkModel();
        $this->identitasModel = new IdentitasModel();
        $this->persyaratanModel = new PersyaratanModel();
        $this->pengaturansuratModel = new PengaturansuratModel();
        $this->settingsyaratModel = new SettingsyaratModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->suratpengantarModel = new SuratpengantarModel();
        $this->suratjualbeliModel = new SuratjualbeliModel();
        $this->suratkriminalModel = new SuratkriminalModel();
        $this->surattidakmampuModel = new SurattidakmampuModel();
        $this->suratusahaModel = new SuratusahaModel();
        $this->suratkeramaianModel = new SuratkeramaianModel();
        $this->suratkehilanganModel = new SuratkehilanganModel();
        $this->suratjalanModel = new SuratjalanModel();
        $this->suratdomisiliModel = new SuratdomisiliModel();
        $this->suratpermohonanModel = new SuratpermohonanModel();
        $this->suratkepemilikantanahModel = new SuratkepemilikantanahModel();
        $this->logsuratModel = new LogsuratModel();
        $this->suratktpprosesModel = new SuratktpprosesModel();
        $this->suratbedanamaModel = new SuratbedanamaModel();
        $this->suratjamkesosModel = new SuratjamkesosModel();
        $this->suratmilikkendaraanModel = new SuratmilikkendaraanModel();
        $this->suratwalihakimModel = new SuratwalihakimModel();
        $this->suratlahirmatiModel = new SuratlahirmatiModel();
        $this->suratbioModel = new SuratbioModel();
        $this->suratkawinModel = new SuratkawinModel();
        $this->suratbelumaktaModel = new SuratbelumaktaModel();
        $this->suratceraiModel = new SuratceraiModel();
        $this->suratkuasaModel = new SuratkuasaModel();
    }

    public function pengaturansurat()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $db = \Config\Database::connect();
        $kk = $this->kkModel->view($kddesa);
        $kode = $this->kkModel->kode();
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $syarat = $this->persyaratanModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pengaturan = $this->pengaturansuratModel->viewpengaturan($kddesa);
        $data = [
            'kk' => $kk,
            'db' => $db,
            'kode' => $kode,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'syarat' => $syarat,
            'logo' => $logo,
            'pengaturan' => $pengaturan,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/layanansurat/pengaturan/surat', $data);
    }

    public function editpengaturansurat($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $pengaturansurat = $this->pengaturansuratModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $persyaratan = $this->persyaratanModel->view($kddesa);
        $syarat = $this->settingsyaratModel->view($id, $kddesa);
        $data = [
            'pengaturansurat' => $pengaturansurat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'persyaratan' => $persyaratan,
            'syarat' => $syarat,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/layanansurat/pengaturan/editpengaturansurat', $data);
    }

    public function updatepengaturansurat($id)
    {

        $kode = $this->request->getPost('kode');
        $mandiri = $this->request->getPost('mandiri');
        $id_syarat = $this->request->getPost('id_syarat');
        $id_format_surat = $this->request->getPost('id_format_surat');
        $masa_berlaku = $this->request->getPost('masa_berlaku');
        $satuan_masa_berlaku = $this->request->getPost('satuan_masa_berlaku');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'kode_surat' => $kode,
            'mandiri' => $mandiri,
            'masa_berlaku' => $masa_berlaku,
            'satuan_masa_berlaku' => $satuan_masa_berlaku,
            'kddesa' => $kddesa,
        ];


        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->pengaturansuratModel->updatedata($data, $id);
        $this->settingsyaratModel->hapusdata($id_format_surat, $kddesa);
        if ($id_syarat != 0) {
            for ($i = 0; $i < sizeof($id_syarat); $i++) {
                $data1 = [

                    'id_surat' => $id_format_surat,
                    'id_syarat' => $id_syarat[$i],
                    'kddesa' => $kddesa,

                ];

                $this->settingsyaratModel->simpan($data1);
            }
        }

        return redirect()->to(base_url('/managepengaturan'));
    }

    // Cetak Surat
    public function cetaksurat()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $db = \Config\Database::connect();
        $kk = $this->kkModel->view($kddesa);
        $kode = $this->kkModel->kode();
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $syarat = $this->persyaratanModel->findAll();
        $logo = $this->identitasModel->view($kddesa);
        $nonfavorit = $this->pengaturansuratModel->view();
        $favorit = $this->pengaturansuratModel->viewfavorit();
        $pengaturan = $this->pengaturansuratModel->findAll();
        $data = [
            'kk' => $kk,
            'db' => $db,
            'kode' => $kode,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'syarat' => $syarat,
            'logo' => $logo,
            'nonfavorit' => $nonfavorit,
            'favorit' => $favorit,
            'pengaturan' => $pengaturan,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/layanansurat/cetaksurat/surat', $data);
    }

    public function favorit($id)
    {


        $data = [
            'favorit' => 1,
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan Ke Favorit');
        $simpan = $this->pengaturansuratModel->updatedata($data, $id);
        return redirect()->to(base_url('/managecetaksurat'));
    }

    public function nonfavorit($id)
    {


        $data = [
            'favorit' => 0,
        ];

        session()->setFlashdata('pesan', 'Data Favorit Berhasil Diubah');
        $simpan = $this->pengaturansuratModel->updatedata($data, $id);
        return redirect()->to(base_url('/managecetaksurat'));
    }



    // Syarat
    public function syarat()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $db = \Config\Database::connect();
        $kk = $this->kkModel->view($kddesa);
        $kode = $this->kkModel->kode();
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $syarat = $this->persyaratanModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'kk' => $kk,
            'db' => $db,
            'kode' => $kode,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'syarat' => $syarat,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/layanansurat/syarat/syarat', $data);
    }
    // Kecamatan

    public function tambahsyarat()
    {

        $dokumen = $this->request->getPost('dokumen');
        $kddesa = $this->request->getPost('kddesa');

        $data = [
            'ref_syarat_nama' => $dokumen,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->persyaratanModel->simpan($data);
        return redirect()->to(base_url('/managepersyaratan'));
    }

    public function editsyarat($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $syarat = $this->persyaratanModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'syarat' => $syarat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/layanansurat/syarat/editsyarat', $data);
    }
    public function updatesyarat($id)
    {

        $dokumen = $this->request->getPost('dokumen');

        $data = [

            'ref_syarat_nama' => $dokumen,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->persyaratanModel->updatedata($data, $id);
        return redirect()->to(base_url('/managepersyaratan'));
    }
    public function deletesyarat($id)
    {

        $this->persyaratanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepersyaratan'));
    }

    public function surat_ket_pengantar($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_pengantar', $data);
    }

    public function simpanpengantar()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_pengantar/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $keterangan = $this->request->getPost('keterangan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'keterangan' => $keterangan,
            'kddesa' => $kddesa,
        ];

        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratpengantarModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }
    public function surat_ket_jual_beli($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_jual_beli', $data);
    }

    public function simpanjualbeli()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],

        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_jual_beli/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $jenis = $this->request->getPost('jenis_barang');
        $rincian = $this->request->getPost('rincian_barang');
        $nikpembeli = $this->request->getPost('nik_pembeli');
        $namapembeli = $this->request->getPost('nama_pembeli');
        $tempatlahirpembeli = $this->request->getPost('tempatlahirpembeli');
        $tgllahirpembeli = $this->request->getPost('tgllahirpembeli');
        $jkpembeli = $this->request->getPost('jkpembeli');
        $alamatpembeli = $this->request->getPost('alamat_pembeli');
        $pekerjaanpembeli = $this->request->getPost('pekerjaan_pembeli');
        $keterangan = $this->request->getPost('keterangan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'jenis_barang' => $jenis,
            'rincian_barang' => $rincian,
            'nik_pembeli' => $nikpembeli,
            'nama_pembeli' => $namapembeli,
            'tempatlahirpembeli' => $tempatlahirpembeli,
            'tgllahirpembeli' => $tgllahirpembeli,
            'jkpembeli' => $jkpembeli,
            'alamat_pembeli' => $alamatpembeli,
            'pekerjaan_pembeli' => $pekerjaanpembeli,
            'keterangan' => $keterangan,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratjualbeliModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_catatan_kriminal($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_catatan_kriminal', $data);
    }

    public function simpankriminal()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'keperluan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],

        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_catatan_kriminal/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkriminalModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }


    public function surat_jalan($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_jalan', $data);
    }

    public function simpanjalan()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'keperluan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],

        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_jalan/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratjalanModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_kurang_mampu($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_kurang_mampu', $data);
    }

    public function simpantidakmampu()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'keperluan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],

        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_kurang_mampu/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->surattidakmampuModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_izin_keramaian($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_izin_keramaian', $data);
    }

    public function simpankeramaian()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'keperluan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],

        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_izin_keramaian/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $jenis_acara = $this->request->getPost('jenis_acara');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'jenis_acara' => $jenis_acara,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkeramaianModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_kehilangan($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_kehilangan', $data);
    }

    public function simpankehilangan()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_kehilangan/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $barang = $this->request->getPost('barang');
        $rincian_barang = $this->request->getPost('rincian_barang');
        $kejadian = $this->request->getPost('kejadian');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'barang' => $barang,
            'rincian_barang' => $rincian_barang,
            'kejadian' => $kejadian,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkehilanganModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_usaha($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_usaha', $data);
    }

    public function simpanusaha()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_usaha/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $nama_usaha = $this->request->getPost('nama_usaha');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'nama_usaha' => $nama_usaha,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratusahaModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_domisili_usaha($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_domisili_usaha', $data);
    }

    public function simpandomisili()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_domisili_usaha/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $nama_usaha = $this->request->getPost('nama_usaha');
        $alamat_usaha = $this->request->getPost('alamat_usaha');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'nama_usaha' => $nama_usaha,
            'alamat_usaha' => $alamat_usaha,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratdomisiliModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_permohonan_akta($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_permohonan_akta', $data);
    }

    public function simpanakta()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_permohonan_akta/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');
        $nama_anak = $this->request->getPost('nama_anak');
        $tempatlahiranak = $this->request->getPost('tempatlahiranak');
        $tgl_anak = $this->request->getPost('tgl_anak');
        $harilahir = $this->request->getPost('harilahir');
        $alamatanak = $this->request->getPost('alamatanak');
        $jkanak = $this->request->getPost('jkanak');
        $nama_ayahanak = $this->request->getPost('nama_ayahanak');
        $nama_ibuanak = $this->request->getPost('nama_ibuanak');
        $alamat_orangtua = $this->request->getPost('alamat_orangtua');
        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'nama_anak' => $nama_anak,
            'tempatlahiranak' => $tempatlahiranak,
            'tgl_anak' => $tgl_anak,
            'hari_lahir' => $harilahir,
            'alamat_anak' => $alamatanak,
            'jkanak' => $jkanak,
            'nama_ayahanak' => $nama_ayahanak,
            'nama_ibuanak' => $nama_ibuanak,
            'alamat_orangtua' => $alamat_orangtua,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratpermohonanModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_kepemilikan_tanah($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_kepemilikan_tanah', $data);
    }

    public function simpanmiliktanah()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_kepemilikan_tanah/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $jenis_tanah = $this->request->getPost('jenis_tanah');
        $luas_tanah = $this->request->getPost('luas_tanah');
        $bukti_kepemilikan = $this->request->getPost('bukti_kepemilikan');
        $no_buktikepemilikan = $this->request->getPost('no_buktikepemilikan');
        $atas_nama = $this->request->getPost('atas_nama');
        $asal_kepemilikan_tanah = $this->request->getPost('asal_kepemilikan_tanah');
        $bukti_pendukung = $this->request->getPost('bukti_pendukung');
        $batas_utara = $this->request->getPost('batas_utara');
        $batas_barat = $this->request->getPost('batas_barat');
        $batas_timur = $this->request->getPost('batas_timur');
        $batas_selatan = $this->request->getPost('batas_selatan');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'jenis_tanah' => $jenis_tanah,
            'luas_tanah' => $luas_tanah,
            'bukti_kepemilikan' => $bukti_kepemilikan,
            'no_buktikepemilikan' => $no_buktikepemilikan,
            'atas_nama' => $atas_nama,
            'asal_kepemilikan_tanah' => $asal_kepemilikan_tanah,
            'bukti_pendukung' => $bukti_pendukung,
            'batas_utara' => $batas_utara,
            'batas_barat' => $batas_barat,
            'batas_timur' => $batas_timur,
            'batas_selatan' => $batas_selatan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkepemilikantanahModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_ktp_dalam_proses($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_ktp_dalam_proses', $data);
    }

    public function simpanktp()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_ktp_dalam_proses/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');


        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,


            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratktpprosesModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }
    public function surat_ket_beda_nama($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'agama' => $agama,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_beda_nama', $data);
    }

    public function simpanbedanama()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_beda_nama/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $identitas = $this->request->getPost('identitas');
        $no_bedaidentitas = $this->request->getPost('no_bedaidentitas');
        $nama_bedaidentitas = $this->request->getPost('nama_bedaidentitas');
        $tempat_bedaidentitas = $this->request->getPost('tempat_bedaidentitas');
        $tgl_bedaidentitas = $this->request->getPost('tgl_bedaidentitas');
        $jk_bedaidentitas = $this->request->getPost('jk_bedaidentitas');
        $alamat_bedaidentitas = $this->request->getPost('alamat_bedaidentitas');
        $agama_bedaidentitas = $this->request->getPost('agama_bedaidentitas');
        $pekerjaan_bedaidentitas = $this->request->getPost('pekerjaan_bedaidentitas');
        $keterangan_bedaidentitas = $this->request->getPost('keterangan_bedaidentitas');
        $perbedaan = $this->request->getPost('perbedaan');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'identitas' => $identitas,
            'no_bedaidentitas' => $no_bedaidentitas,
            'nama_bedaidentitas' => $nama_bedaidentitas,
            'tempat_bedaidentitas' => $tempat_bedaidentitas,
            'tgl_bedaidentitas' => $tgl_bedaidentitas,
            'jk_bedaidentitas' => $jk_bedaidentitas,
            'alamat_bedaidentitas' => $alamat_bedaidentitas,
            'agama_bedaidentitas' => $agama_bedaidentitas,
            'pekerjaan_bedaidentitas' => $pekerjaan_bedaidentitas,
            'keterangan_bedaidentitas' => $keterangan_bedaidentitas,
            'perbedaan' => $perbedaan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratbedanamaModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_jamkesos($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'agama' => $agama,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_jamkesos', $data);
    }

    public function simpanjamkesos()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_jamkesos/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $no_jamkesos = $this->request->getPost('no_jamkesos');
        $keperluan = $this->request->getPost('keperluan');


        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'no_jamkesos' => $no_jamkesos,
            'keperluan' => $keperluan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratjamkesosModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_kepemilikan_kendaraan($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'agama' => $agama,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_kepemilikan_kendaraan', $data);
    }

    public function simpanmilikkendaraan()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'tahun_penerbitan' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '* Harus diisi',
                    'numeric' => '* Harus angka',
                ]

            ],
            'silinder' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '* Harus diisi',
                    'numeric' => '* Harus angka',
                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_kepemilikan_kendaraan/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $merk = $this->request->getPost('merk');
        $tahun_penerbitan = $this->request->getPost('tahun_penerbitan');
        $warna = $this->request->getPost('warna');
        $nopol = $this->request->getPost('nopol');
        $no_mesin = $this->request->getPost('no_mesin');
        $no_rangka = $this->request->getPost('no_rangka');
        $no_bpkb = $this->request->getPost('no_bpkb');
        $bahan_bakar = $this->request->getPost('bahan_bakar');
        $silinder = $this->request->getPost('silinder');
        $atas_milik = $this->request->getPost('atas_milik');
        $keperluan = $this->request->getPost('keperluan');


        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'merk' => $merk,
            'tahun_penerbitan' => $tahun_penerbitan,
            'warna' => $warna,
            'nopol' => $nopol,
            'no_mesin' => $no_mesin,
            'no_rangka' => $no_rangka,
            'no_bpkb' => $no_bpkb,
            'bahan_bakar' => $bahan_bakar,
            'silinder' => $silinder,
            'atas_milik' => $atas_milik,
            'keperluan' => $keperluan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratmilikkendaraanModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_wali_hakim($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_wali_hakim', $data);
    }

    public function simpanwalihakim()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_wali_hakim/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');


        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,


            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratwalihakimModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }


    public function surat_ket_lahir_mati($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_lahir_mati', $data);
    }

    public function simpanlahirmati()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'lamakandungan' => [
                'rules' => 'required|numeric|max_length[1]',
                'errors' => [
                    'required' => '* Harus diisi',
                    'numeric' => '* Harus Angka',
                    'max_length' => '* Max 1 Digit Angka',
                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_lahir_mati/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $hari = $this->request->getPost('hari');
        $tglmati = $this->request->getPost('tglmati');
        $tempatmeninggal = $this->request->getPost('tempatmeninggal');
        $pelapor = $this->request->getPost('pelapor');
        $hubungan = $this->request->getPost('hubungan');
        $lamakandungan = $this->request->getPost('lamakandungan');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $pelapor,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $pelapor,
            'id_surat' => $id_surat,

            'hari' => $hari,
            'tglmati' => $tglmati,
            'tempatmeninggal' => $tempatmeninggal,
            'ibu' => $id,
            'hubungan' => $hubungan,
            'lamakandungan' => $lamakandungan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $pelapor,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratlahirmatiModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_bio_penduduk($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_bio_penduduk', $data);
    }

    public function simpanbio()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_bio_penduduk/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,


            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratbioModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_pergi_kawin($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_ket_pergi_kawin', $data);
    }

    public function simpankawin()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_ket_pergi_kawin/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $tujuan = $this->request->getPost('tujuan');
        $keperluan = $this->request->getPost('keperluan');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'tujuan' => $tujuan,
            'keperluan' => $keperluan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkawinModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_pernyataan_akta($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_pernyataan_akta', $data);
    }

    public function simpanpernyataan()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_pernyataan_akta/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratbelumaktaModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_ket_cerai($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_permohonan_cerai', $data);
    }

    public function simpancerai()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_permohonan_cerai/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');

        $sebab = $this->request->getPost('sebab');
        $tglcerai = $this->request->getPost('tglcerai');

        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'sebab' => $sebab,
            'tglcerai' => $tglcerai,
            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratceraiModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function surat_kuasa($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $no_surat = $this->logsuratModel->buatnomorsurat($id, $kddesa);
        $pekerjaan =  $this->pekerjaanModel->findAll();
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'pekerjaan' => $pekerjaan,
            'no_surat' => $no_surat,
            'validation' => \Config\Services::validation(),
        ];

        return view('admin/layanansurat/cetaksurat/surat_kuasa', $data);
    }

    public function simpankuasa()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'nik_penerima' => [
                'rules' => 'required|min_length[16]|numeric',
                'errors' => [
                    'required' => '* NIK Harus diisi',
                    'min_length' => '* NIK Harus 16 Angka',
                    'numeric' => '* NIK Harus Berupa Angka'
                ]

            ],
            'jk_penerima' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],
            'id_pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]

            ],


        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            return redirect()->to(base_url('buat_surat_kuasa/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('nama');
        $id_surat = $this->request->getPost('id_surat');


        $nama_penerima = $this->request->getPost('nama_penerima');
        $nik_penerima = $this->request->getPost('nik_penerima');
        $jk_penerima = $this->request->getPost('jk_penerima');
        $id_pekerjaan = $this->request->getPost('id_pekerjaan');
        $alamat_penerima = $this->request->getPost('alamat_penerima');
        $tempatlahirpenerima = $this->request->getPost('tempatlahirpenerima');
        $tgllahirpenerima = $this->request->getPost('tgllahirpenerima');
        $desa_penerima = $this->request->getPost('desa_penerima');
        $kec_penerima = $this->request->getPost('kec_penerima');
        $kab_penerima = $this->request->getPost('kab_penerima');
        $prov_penerima = $this->request->getPost('prov_penerima');
        $keperluan = $this->request->getPost('keperluan');


        $kddesa = $this->request->getPost('kddesa');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 2,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,


            'nama_penerima' => $nama_penerima,
            'nik_penerima' => $nik_penerima,
            'nama_penerima' => $nama_penerima,
            'jk_penerima' => $jk_penerima,
            'id_pekerjaan' => $id_pekerjaan,
            'alamat_penerima' => $alamat_penerima,
            'tempatlahirpenerima' => $tempatlahirpenerima,
            'tgllahirpenerima' => $tgllahirpenerima,
            'desa_penerima' => $desa_penerima,
            'kec_penerima' => $kec_penerima,
            'kab_penerima' => $kab_penerima,
            'prov_penerima' => $prov_penerima,
            'keperluan' => $keperluan,

            'kddesa' => $kddesa,
        ];
        $data2 = [
            'id_user' => $id,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Surat Selesai Dibuat Menunggu Approve Dari Kades');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkuasaModel->simpan($data1);
        $simpan = $this->logsuratModel->simpandata($data2);
        return redirect()->to(base_url('/managepermohonan'));
    }
}
