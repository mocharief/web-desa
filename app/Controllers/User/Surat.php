<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DusunModel;
use App\Models\PendudukModel;
use App\Models\BudayaModel;
use App\Models\AlbumModel;
use App\Models\KkModel;
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

class Surat extends BaseController
{
    protected $dusunModel;
    protected $pendudukModel;
    protected $budayaModel;
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

    public function __construct()
    {
        $this->dusunModel = new DusunModel();
        $this->pendudukModel = new PendudukModel();
        $this->budayaModel = new BudayaModel();
        $this->albumModel = new AlbumModel();
        $this->kkModel = new KkModel();
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
        helper('form');
    }

    public function index()
    {

        $session = session();
        $id = $session->get('id');
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
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();

        $db = \Config\Database::connect();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'layanan' => $layanan,
            'db' => $db,
            'id' => $id,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
            'keterangan' => $keterangan,

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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        ];

        return view('user/surat/surat_ket_jual_beli', $data);
    }

    public function surat_ket_catatan_kriminal($id)
    {

        $session = session();
        $iduser = $session->get('id');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        ];

        return view('user/surat/surat_ket_catatan_kriminal', $data);
    }

    public function simpankriminal()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        ];

        return view('user/surat/surat_ket_kurang_mampu', $data);
    }

    public function simpankurangmampu()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'nama_usaha' => $namausaha,
            'keperluan' => $keperluan,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'jenis_acara' => $jenis_acara,
            'keperluan' => $keperluan,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'barang' => $barang,
            'rincian_barang' => $rincian_barang,
            'kejadian' => $kejadian,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        ];

        return view('user/surat/surat_jalan', $data);
    }

    public function simpanjalan()
    {
        $id_permohonan = $this->request->getPost('id_permohonan');
        $id = $this->request->getPost('id');
        $id_surat = $this->request->getPost('id_surat');
        $keperluan = $this->request->getPost('keperluan');

        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'keperluan' => $keperluan,

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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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

        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
        ];
        $data1 = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'nama_usaha' => $nama_usaha,
            'alamat_usaha' => $alamat_usaha,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $layanan = $this->pengaturansuratModel->viewlayanan();
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
        $data = [
            'id_permohonan' => $id_permohonan,
            'id' => $id,
            'id_surat' => $id_surat,
            'status' => 1,
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
        ];

        session()->setFlashdata('pesan', 'Permohonan Berhasil Terkirim ke Admin');
        $simpan = $this->permohonanModel->simpan($data);
        $simpan = $this->suratpermohonanModel->simpan($data1);
        return redirect()->to(base_url('/surat'));
    }
    public function ket_pengantar($id)
    {
        $session = session();
        $iduser = $session->get('id');
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonan();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $db = \Config\Database::connect();
        $setting = $this->settingModel->view();
        $data = [
            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [
            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk();
        $pesanmasuk = $this->pesanModel->viewpesan();
        $permohonan = $this->permohonanModel->viewpermohonankades();
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->view();
        $db = \Config\Database::connect();
        $data = [

            'penduduk' => $penduduk,
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
}
