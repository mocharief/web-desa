<?php

namespace App\Controllers\Kades;

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
use App\Models\PemerintahanModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\LogsuratModel;
use App\Models\SuratpengantarModel;
use App\Models\SettingModel;

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
    protected $settingModel;

    public function __construct()

    {

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
        $this->settingModel = new SettingModel();
        helper('form');
    }
    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->permohonan($kddesa);
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
        ];
        return view('kades/permohonan/permohonan', $data);
    }

    public function approve($id)
    {

        $data = [
            'status' => 3,
        ];
        session()->setFlashdata('pesan', 'Permohonan Berhasil Di Approve');
        $simpan = $this->permohonanModel->updatedata($data, $id);
        return redirect()->to(base_url('/permohonansurat'));
    }

    public function ket_pengantar($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratpengantar', $data);
    }

    public function ket_jualbeli($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratjualbeli', $data);
    }

    public function ket_kriminal($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratkriminal', $data);
    }
    public function ket_kurangmampu($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratkurangmampu', $data);
    }

    public function ket_usaha($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratusaha', $data);
    }

    public function ket_keramaian($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratkeramaian', $data);
    }
    public function ket_kehilangan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratkehilangan', $data);
    }

    public function ket_jalan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratjalan', $data);
    }

    public function ket_domisili($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratdomisili', $data);
    }

    public function ket_akta($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratakta', $data);
    }
    public function ket_miliktanah($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratkepemilikantanah', $data);
    }

    public function ket_ktp($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratktp', $data);
    }

    public function ket_bedanama($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratbedaidentitas', $data);
    }

    public function ket_jamkesos($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratjamkesos', $data);
    }

    public function ket_milikkendaraan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratmilikkendaraan', $data);
    }

    public function ket_walihakim($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratwalihakim', $data);
    }

    public function ket_lahirmati($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratlahirmati', $data);
    }

    public function ket_biopenduduk($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratbio', $data);
    }

    public function ket_kawin($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratpergikawin', $data);
    }

    public function ket_belumakta($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratbelumakta', $data);
    }

    public function ket_cerai($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratcerai', $data);
    }

    public function ket_kuasa($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $pemerintahan = $this->pemerintahanModel->findAll();
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $permohonansurat = $this->permohonanModel->approve($id);
        $surat = $this->permohonanModel->find($id);
        $setting = $this->settingModel->viewsetting($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'permohonan' => $permohonan,
            'permohonansurat' => $permohonansurat,
            'logo' => $logo,
            'db' => $db,
            'surat' => $surat,
            'setting' => $setting,
            'kddesa' => $kddesa,
        ];
        return view('kades/permohonan/suratkuasa', $data);
    }
}
