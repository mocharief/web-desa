<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AgamaModel;
use App\Models\DusunModel;
use App\Models\PendudukModel;
use App\Models\BudayaModel;
use App\Models\AlbumModel;
use App\Models\KkModel;
use App\Models\PekerjaanModel;
use App\Models\UmkmModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PesankeluarModel;
use App\Models\PengaturansuratModel;
use App\Models\SettingsyaratModel;
use App\Models\SuratpengantarModel;
use App\Models\SuratjualbeliModel;
use App\Models\SettingModel;
use App\Models\SuratkriminalModel;
use App\Models\SurattidakmampuModel;
use App\Models\SuratusahaModel;
use App\Models\SuratkeramaianModel;
use App\Models\SuratkehilanganModel;
use App\Models\SuratjalanModel;
use App\Models\SuratdomisiliModel;
use App\Models\SuratpermohonanModel;
use App\Models\SuratkepemilikantanahModel;
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

class Surat extends BaseController
{
    protected $agamaModel;
    protected $dusunModel;
    protected $pendudukModel;
    protected $budayaModel;
    protected $pekerjaanModel;
    protected $albumModel;
    protected $kkModel;
    protected $umkmModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $pesankeluarModel;
    protected $pengaturansuratModel;
    protected $settingsyaratModel;
    protected $suratpengantarModel;
    protected $settingModel;
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
        $this->dusunModel = new DusunModel();
        $this->pendudukModel = new PendudukModel();
        $this->budayaModel = new BudayaModel();
        $this->albumModel = new AlbumModel();
        $this->kkModel = new KkModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->umkmModel = new UmkmModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->identitasModel = new IdentitasModel();
        $this->pesankeluarModel = new PesankeluarModel();
        $this->pengaturansuratModel = new PengaturansuratModel();
        $this->settingsyaratModel = new SettingsyaratModel();
        $this->suratpengantarModel = new SuratpengantarModel();
        $this->settingModel = new SettingModel();
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
        $this->suratktpprosesModel = new SuratktpprosesModel();
        $this->suratbedanamaModel = new SuratbedanamaModel();
        $this->agamaModel = new AgamaModel();
        $this->suratjamkesosModel = new SuratjamkesosModel();
        $this->suratmilikkendaraanModel = new SuratmilikkendaraanModel();
        $this->suratwalihakimModel = new SuratwalihakimModel();
        $this->suratlahirmatiModel = new SuratlahirmatiModel();
        $this->suratbioModel = new SuratbioModel();
        $this->suratkawinModel = new SuratkawinModel();
        $this->suratbelumaktaModel = new SuratbelumaktaModel();
        $this->suratceraiModel = new SuratceraiModel();
        $this->suratkuasaModel = new SuratkuasaModel();
        helper('form');
    }

    public function index()
    {

        $session = session();
        $id = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->permohonanuser($id);
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
        ];

        return view('user/surat/surat', $data);
    }

    public function buatsurat()
    {

        $session = session();
        $id = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);

        $db = \Config\Database::connect();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'db' => $db,
            'id' => $id,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/buatsurat', $data);
    }

    public function batalkanpermohonan($id)
    {

        $idpermohonan = $this->request->getPost('id');

        $data = [

            'status' => 6,
        ];


        session()->setFlashdata('pesan', 'Permohonan Dibatalkan');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        $simpan = $this->suratpengantarModel->hapusdata($idpermohonan);
        return redirect()->to(base_url('/surat'));
    }
    public function kirimlagi($id)
    {


        $data = [

            'status' => 1,
        ];


        session()->setFlashdata('pesan', 'Permohonan Dibatalkan');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        return redirect()->to(base_url('/surat'));
    }

    public function permohonanselesai($id)
    {

        $data = [

            'status' => 4,
        ];


        session()->setFlashdata('pesan', 'Permohonan Dibatalkan');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        return redirect()->to(base_url('/surat'));
    }
    public function surat_ket_pengantar($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_pengantar', $data);
    }

    public function simpanpengantar()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $keterangan = $this->request->getPost('keterangan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratpengantarModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_jual_beli($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_jual_beli', $data);
    }
    public function simpanjualbeli()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $jenis = $this->request->getPost('jenis');
        $rincian = $this->request->getPost('rincian');
        $nikpembeli = $this->request->getPost('nikpembeli');
        $namapembeli = $this->request->getPost('namapembeli');
        $tempatlahirpembeli = $this->request->getPost('tempatlahirpembeli');
        $tgllahirpembeli = $this->request->getPost('tgllahirpembeli');
        $jkpembeli = $this->request->getPost('jkpembeli');
        $alamatpembeli = $this->request->getPost('alamatpembeli');
        $pekerjaanpembeli = $this->request->getPost('pekerjaanpembeli');
        $keterangan = $this->request->getPost('keterangan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratjualbeliModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_catatan_kriminal($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_catatan_kriminal', $data);
    }

    public function simpankriminal()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkriminalModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_kurang_mampu($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_kurang_mampu', $data);
    }

    public function simpankurangmampu()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->surattidakmampuModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }
    public function surat_ket_usaha($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_usaha', $data);
    }

    public function simpanusaha()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $namausaha = $this->request->getPost('namausaha');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'nama_usaha' => $namausaha,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratusahaModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_izin_keramaian($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_izin_keramaian', $data);
    }

    public function simpankeramaian()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $jenis_acara = $this->request->getPost('jenis_acara');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'kddesa' => $kddesa,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'jenis_acara' => $jenis_acara,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkeramaianModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }
    public function surat_ket_kehilangan($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_kehilangan', $data);
    }

    public function simpankehilangan()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $barang = $this->request->getPost('barang');
        $rincian_barang = $this->request->getPost('rincian_barang');
        $kejadian = $this->request->getPost('kejadian');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkehilanganModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_jalan($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_jalan', $data);
    }

    public function simpanjalan()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'kddesa' => $kddesa,

        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratjalanModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_domisili_usaha($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_domisili_usaha', $data);
    }

    public function simpandomisili()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $nama_usaha = $this->request->getPost('namausaha');
        $alamat_usaha = $this->request->getPost('alamat');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratdomisiliModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }
    public function surat_permohonan_akta($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_permohonan_akta', $data);
    }

    public function simpanakta()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratpermohonanModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_kepemilikan_tanah($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_kepemilikan_tanah', $data);
    }

    public function simpantanah()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkepemilikantanahModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }
    public function surat_ket_ktp_dalam_proses($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_ktp_dalam_proses', $data);
    }

    public function simpanktp()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratktpprosesModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_beda_nama($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'agama' => $agama,
            'kddesa' => $kddesa,

        ];

        return view('user/surat/surat_ket_beda_nama', $data);
    }

    public function simpanidentitas()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratbedanamaModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_jamkesos($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'agama' => $agama,
            'kddesa' => $kddesa,

        ];

        return view('user/surat/surat_ket_jamkesos', $data);
    }

    public function simpanjamkesos()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');

        $no_jamkesos = $this->request->getPost('no_jamkesos');
        $keperluan = $this->request->getPost('keperluan');


        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratjamkesosModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_kepemilikan_kendaraan($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'agama' => $agama,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation(),
        ];

        return view('user/surat/surat_ket_kepemilikan_kendaraan', $data);
    }

    public function simpanmilikkendaraan()
    {
        if (!$this->validate([
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
            $p = $this->request->getPost('url_surat');
            return redirect()->to(base_url('user/surat/' . $p . '/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratmilikkendaraanModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_wali_hakim($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_wali_hakim', $data);
    }

    public function simpanwalihakim()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratwalihakimModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }
    public function surat_ket_lahir_mati($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $kode = $this->permohonanModel->kode();
        $db = \Config\Database::connect();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'penduduk' => $penduduk,
            'kddesa' => $kddesa,
            'db' => $db,
            'validation' => \Config\Services::validation(),
        ];

        return view('user/surat/surat_ket_lahir_mati', $data);
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
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '* Harus diisi',
                    'numeric' => '* Harus angka',
                ]

            ],
        ])) {
            $validation = \Config\Services::validation();
            $id_surat = $this->request->getPost('id_surat');
            $p = $this->request->getPost('url_surat');
            return redirect()->to(base_url('user/surat/' . $p . '/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');

        $hari = $this->request->getPost('hari');
        $tglmati = $this->request->getPost('tglmati');
        $tempatmeninggal = $this->request->getPost('tempatmeninggal');
        $pelapor = $this->request->getPost('pelapor');
        $hubungan = $this->request->getPost('hubungan');
        $lamakandungan = $this->request->getPost('lamakandungan');

        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $pelapor,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratlahirmatiModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_bio_penduduk($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $agama = $this->agamaModel->findAll();
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'agama' => $agama,
            'kddesa' => $kddesa,

        ];

        return view('user/surat/surat_bio_penduduk', $data);
    }

    public function simpanbio()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratbioModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_pergi_kawin($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_pergi_kawin', $data);
    }

    public function simpankawin()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $tujuan = $this->request->getPost('tujuan');
        $keperluan = $this->request->getPost('keperluan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkawinModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_pernyataan_akta($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_pernyataan_akta', $data);
    }

    public function simpanpernyataan()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');

        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
            'kddesa' => $kddesa,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,

            'kddesa' => $kddesa,
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratbelumaktaModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_ket_cerai($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
        ];

        return view('user/surat/surat_ket_cerai', $data);
    }

    public function simpancerai()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $tglcerai = $this->request->getPost('tglcerai');
        $sebab = $this->request->getPost('sebab');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratceraiModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }

    public function surat_kuasa($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan($kddesa);
        $surat = $this->pengaturansuratModel->find($id);
        $pekerjaan = $this->pekerjaanModel->findAll();
        $kode = $this->permohonanModel->kode();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'surat' => $surat,
            'kode' => $kode,
            'pekerjaan' => $pekerjaan,
            'iduser' => $iduser,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation(),
        ];

        return view('user/surat/surat_kuasa', $data);
    }

    public function simpankuasa()
    {
        if (!$this->validate([
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
            $p = $this->request->getPost('url_surat');
            return redirect()->to(base_url('user/surat/' . $p . '/' . $id_surat))->withInput()->with('validation', $validation);
        }
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratkuasaModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }


    public function ket_pengantar($id)
    {
        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $db = \Config\Database::connect();
        $setting = $this->settingModel->viewsetting($kddesa);
        $data = [
            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'user' => $user,
            'setting' => $setting,
        ];
        return view('user/surat/surat/suratpengantar', $data);
    }

    public function ket_jualbeli($id)
    {
        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratjualbeli', $data);
    }

    public function ket_kriminal($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratkriminal', $data);
    }

    public function ket_kurangmampu($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratkurangmampu', $data);
    }

    public function ket_usaha($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'kddesa' => $kddesa,

            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratusaha', $data);
    }
    public function ket_keramaian($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratkeramaian', $data);
    }

    public function ket_kehilangan($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratkehilangan', $data);
    }

    public function ket_jalan($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratjalan', $data);
    }

    public function ket_domisili($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratdomisili', $data);
    }

    public function ket_miliktanah($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratkepemilikantanah', $data);
    }

    public function ket_ktp($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratktp', $data);
    }
    public function ket_bedanama($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratbedaidentitas', $data);
    }
    public function ket_jamkesos($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratjamkesos', $data);
    }

    public function ket_milikkendaraan($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratmilikkendaraan', $data);
    }

    public function ket_walihakim($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratwalihakim', $data);
    }

    public function ket_lahirmati($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratlahirmati', $data);
    }

    public function ket_biopenduduk($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratbio', $data);
    }

    public function ket_kawin($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratpergikawin', $data);
    }

    public function ket_belumakta($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratbelumakta', $data);
    }

    public function ket_cerai($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratcerai', $data);
    }

    public function ket_kuasa($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [

            'kddesa' => $kddesa,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'user' => $user,
        ];
        return view('user/surat/surat/suratkuasa', $data);
    }
}
