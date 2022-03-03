<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\PendaftarModel;
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
use App\Models\PemerintahanModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\LogsuratModel;
use App\Models\SuratpengantarModel;
use App\Models\SuratjualbeliModel;
use App\Models\SuratkriminalModel;
use App\Models\SurattidakmampuModel;
use App\Models\SuratusahaModel;
use App\Models\PesankeluarModel;
use App\Models\SettingModel;
use App\Models\SuratkeramaianModel;
use App\Models\SuratkehilanganModel;
use App\Models\SuratjalanModel;
use App\Models\SuratdomisiliModel;
use App\Models\SuratpermohonanModel;

class Permohonan extends BaseController
{

    protected $identitasModel;
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
    protected $pemerintahanModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $logsuratModel;
    protected $suratpengantarModel;
    protected $pesankeluarModel;
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
    protected $pendaftarModel;

    public function __construct()

    {
        $this->pendaftarModel = new PendaftarModel();
        $this->identitasModel = new IdentitasModel();
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
        $this->pemerintahanModel = new PemerintahanModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->logsuratModel = new LogsuratModel();
        $this->suratpengantarModel = new SuratpengantarModel();
        $this->pesankeluarModel = new PesankeluarModel();
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
        helper('form');
    }
    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->permohonan($kddesa);
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/permohonan', $data);
    }

    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $this->permohonanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepermohonan'));
    }

    public function periksa($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $db = \Config\Database::connect();
        $pemerintahan = $this->pemerintahanModel->find($id);
        $penduduk = $this->pendudukModel->findAll();
        $datapermohonan = $this->permohonanModel->datapermohonan($id);
        $id_format_surat = $datapermohonan['id_surat'];
        $no_surat = $this->logsuratModel->nomorsurat($id_format_surat);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'db' => $db,
            'penduduk' => $penduduk,
            'pemerintahan' => $pemerintahan,
            'logo' => $logo,
            'datapermohonan' => $datapermohonan,
            'no_surat' => $no_surat,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/permohonan/periksapermohonan', $data);
    }
    public function belumlengkap($id)
    {


        $nama = $this->request->getPost('id');
        $pesan = $this->request->getPost('pesan');


        $data = [
            'status' => 5,
        ];
        $data1 = [

            'id' => $nama,
            'pesan' => $pesan



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        $simpan = $this->pesankeluarModel->simpan1($data1);
        return redirect()->to(base_url('/managepermohonan'));
    }
    public function aktaselesai($id)
    {



        $data = [
            'status' => 4,
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        return redirect()->to(base_url('/managepermohonan'));
    }
    public function addpermohonan($id)
    {

        $iduser = $this->request->getPost('id');
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id_surat = $this->request->getPost('id_surat');
        $no_surat = $this->request->getPost('no_surat');
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $keperluan = $this->request->getPost('keperluan');
        $keterangan = $this->request->getPost('keterangan');



        $jenis_barang = $this->request->getPost('jenis_barang');
        $rincian_barang = $this->request->getPost('rincian_barang');
        $nik_pembeli = $this->request->getPost('nik_pembeli');
        $nama_pembeli = $this->request->getPost('nama_pembeli');
        $tempatlahirpembeli = $this->request->getPost('tempatlahirpembeli');
        $tgllahirpembeli = $this->request->getPost('tgllahirpembeli');
        $jkpembeli = $this->request->getPost('jkpembeli');
        $alamat_pembeli = $this->request->getPost('alamat_pembeli');
        $pekerjaan_pembeli = $this->request->getPost('pekerjaan_pembeli');


        $nama_usaha = $this->request->getPost('nama_usaha');

        $jenis_acara = $this->request->getPost('jenis_acara');

        $barang = $this->request->getPost('barang');
        $rincian_barang = $this->request->getPost('rincian_barang');
        $kejadian = $this->request->getPost('kejadian');

        $alamat_usaha = $this->request->getPost('alamat_usaha');

        $nama_anak = $this->request->getPost('nama_anak');
        $tempatlahiranak = $this->request->getPost('tempatlahiranak');
        $tgl_anak = $this->request->getPost('tgl_anak');
        $harilahir = $this->request->getPost('harilahir');
        $alamatanak = $this->request->getPost('alamatanak');
        $jkanak = $this->request->getPost('jkanak');
        $nama_ayahanak = $this->request->getPost('nama_ayahanak');
        $nama_ibuanak = $this->request->getPost('nama_ibuanak');
        $alamat_orangtua = $this->request->getPost('alamat_orangtua');

        $data = [
            'status' => 2,
        ];
        $data1 = [
            'id_user' => $iduser,
            'id_permohonan' => $id_permohonan,
            'id_format_surat' => $id_surat,
            'no_surat' => $no_surat,
            'bulan' => $bulan,
            'tahun' => $tahun,

        ];
        $data2 = [
            'id_permohonan' => $id_permohonan,
            'keperluan' => $keperluan,
            'keterangan' => $keterangan,

        ];
        $data3 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'jenis_barang' => $jenis_barang,
            'rincian_barang' => $rincian_barang,
            'nik_pembeli' => $nik_pembeli,
            'nama_pembeli' => $nama_pembeli,
            'tempatlahirpembeli' => $tempatlahirpembeli,
            'tgllahirpembeli' => $tgllahirpembeli,
            'jkpembeli' => $jkpembeli,
            'alamat_pembeli' => $alamat_pembeli,
            'pekerjaan_pembeli' => $pekerjaan_pembeli,
            'keterangan' => $keterangan,

        ];
        $data4 = [
            'id_permohonan' => $id_permohonan,
            'keperluan' => $keperluan,


        ];
        $data5 = [
            'id_permohonan' => $id_permohonan,
            'keperluan' => $keperluan,


        ];
        $data6 = [
            'id_permohonan' => $id_permohonan,
            'keperluan' => $keperluan,
            'nama_usaha' => $nama_usaha,

        ];
        $data7 = [
            'id_permohonan' => $id_permohonan,
            'keperluan' => $keperluan,
            'jenis_acara' => $jenis_acara,

        ];

        $data8 = [
            'id_permohonan' => $id_permohonan,
            'barang' => $barang,
            'rincian_barang' => $rincian_barang,
            'kejadian' => $kejadian,
        ];
        $data9 = [
            'id_permohonan' => $id_permohonan,
            'keperluan' => $keperluan,

        ];
        $data10 = [
            'id_permohonan' => $id_permohonan,
            'nama_usaha' => $nama_usaha,
            'alamat_usaha' => $alamat_usaha,

        ];
        $data11 = [
            'id_permohonan' => $id_permohonan,
            'nama_anak' => $nama_anak,
            'tempatlahiranak' => $tempatlahiranak,
            'tgl_anak' => $tgl_anak,
            'hari_lahir' => $harilahir,
            'alamat_anak' => $alamatanak,
            'jkanak' => $jkanak,
            'nama_ayahanak' => $nama_ayahanak,
            'nama_ibuanak' => $nama_ibuanak,
            'alamat_orangtua' => $alamat_orangtua,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        $simpan = $this->logsuratModel->simpan($data1);
        if ($id_surat == 1) {
            $simpan = $this->suratpengantarModel->updatedata2($data2, $id_permohonan);
        } else if ($id_surat == 5) {
            $simpan = $this->suratjualbeliModel->updatedata2($data3, $id_permohonan);
        } else if ($id_surat == 6) {
            $simpan = $this->suratkriminalModel->updatedata2($data4, $id_permohonan);
        } else if ($id_surat == 10) {
            $simpan = $this->surattidakmampuModel->updatedata2($data5, $id_permohonan);
        } else if ($id_surat == 13) {
            $simpan = $this->suratusahaModel->updatedata2($data6, $id_permohonan);
        } else if ($id_surat == 11) {
            $simpan = $this->suratkeramaianModel->updatedata2($data7, $id_permohonan);
        } else if ($id_surat == 12) {
            $simpan = $this->suratkehilanganModel->updatedata2($data8, $id_permohonan);
        } else if ($id_surat == 9) {
            $simpan = $this->suratjalanModel->updatedata2($data9, $id_permohonan);
        } else if ($id_surat == 15) {
            $simpan = $this->suratdomisiliModel->updatedata2($data10, $id_permohonan);
        } else if ($id_surat == 17) {
            $simpan = $this->suratpermohonanModel->updatedata2($data11, $id_permohonan);
        }

        return redirect()->to(base_url('/managepermohonan'));
    }

    public function ket_pengantar($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $db = \Config\Database::connect();
        $setting = $this->settingModel->view();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratpengantar', $data);
    }

    public function ket_jualbeli($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratjualbeli', $data);
    }

    public function ket_kriminal($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratkriminal', $data);
    }

    public function ket_kurangmampu($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratkurangmampu', $data);
    }

    public function ket_usaha($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratusaha', $data);
    }

    public function ket_keramaian($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratkeramaian', $data);
    }

    public function ket_kehilangan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratkehilangan', $data);
    }

    public function ket_jalan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratjalan', $data);
    }

    public function ket_domisili($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratdomisili', $data);
    }

    public function ket_akta($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/permohonan/surat/suratakta', $data);
    }
}
