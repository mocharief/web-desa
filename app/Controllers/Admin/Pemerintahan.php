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
use App\Models\PemerintahanModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Pemerintahan extends BaseController
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
    protected $pendaftarModel;

    public function __construct()

    {

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
        helper('form');
        $this->identitasModel = new IdentitasModel();
        $this->pendaftarModel = new PendaftarModel();
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
        $pemerintahan = $this->pemerintahanModel->viewpemerintahan($kddesa);
        $data = [
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/pemerintahan/pemerintahan', $data);
    }
    public function tambah()
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
        $db = \Config\Database::connect();
        $hubungan = $this->hubunganModel->findAll();
        $agama = $this->agamaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $pendidikankk = $this->pendidikankkModel->findAll();
        $pekerjaan = $this->pekerjaanModel->findAll();
        $golongan = $this->golonganModel->findAll();

        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'hubungan' => $hubungan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pendidikankk' => $pendidikankk,
            'pekerjaan' => $pekerjaan,
            'golongan' => $golongan,
            'db' => $db,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/pemerintahan/tambahpemerintahan', $data);
    }



    public function simpan()
    {


        $nama = $this->request->getPost('nama');
        $namaaparat = $this->request->getPost('namaaparat');
        $nik = $this->request->getPost('nik');
        $nipd = $this->request->getPost('nipd');
        $nip = $this->request->getPost('nip');
        $tempatlahir = $this->request->getPost('tempatlahir');
        $tanggallahir = $this->request->getPost('tanggallahir');
        $jk = $this->request->getPost('jk');
        $pendidikan = $this->request->getPost('pendidikan');
        $agama = $this->request->getPost('agama');
        $pangkat = $this->request->getPost('pangkat');
        $skp = $this->request->getPost('skp');
        $tglsk = $this->request->getPost('tglsk');
        $jabatan = $this->request->getPost('jabatan');
        $kddesa = $this->request->getPost('kddesa');

        $data = [
            'id' => $nama,
            'pamong_nama' => $namaaparat,
            'pamong_nik	' => $nik,
            'pamong_nipd' => $nipd,
            'pamong_nip' => $nip,
            'pamong_tempatlahir' => $tempatlahir,
            'pamong_tanggallahir' => $tanggallahir,
            'pamong_sex' => $jk,
            'pamong_pendidikan' => $pendidikan,
            'pamong_agama' => $agama,
            'pamong_pangkat' => $pangkat,
            'pamong_nosk' => $skp,
            'pamong_tglsk' => $tglsk,
            'jabatan' => $jabatan,
            'kddesa' => $kddesa,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pemerintahanModel->simpan($data);
        return redirect()->to(base_url('/managepemerintahan'));
    }

    public function edit($id)
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
        $logo = $this->identitasModel->view($kddesa);
        $pemerintahan = $this->pemerintahanModel->find($id);
        $penduduk = $this->pendudukModel->findAll();
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pemerintahan' => $pemerintahan,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/pemerintahan/editpemerintahan', $data);
    }
    public function update($id)
    {

        $nama = $this->request->getPost('nama');
        $namaaparat = $this->request->getPost('namaaparat');
        $nik = $this->request->getPost('nik');
        $nipd = $this->request->getPost('nipd');
        $nip = $this->request->getPost('nip');
        $tempatlahir = $this->request->getPost('tempatlahir');
        $tanggallahir = $this->request->getPost('tanggallahir');
        $jk = $this->request->getPost('jk');
        $pendidikan = $this->request->getPost('pendidikan');
        $agama = $this->request->getPost('agama');
        $pangkat = $this->request->getPost('pangkat');
        $skp = $this->request->getPost('skp');
        $tglsk = $this->request->getPost('tglsk');
        $jabatan = $this->request->getPost('jabatan');
        $data = [
            'id' => $nama,
            'pamong_nama' => $namaaparat,
            'pamong_nik	' => $nik,
            'pamong_nipd' => $nipd,
            'pamong_nip' => $nip,
            'pamong_tempatlahir' => $tempatlahir,
            'pamong_tanggallahir' => $tanggallahir,
            'pamong_sex' => $jk,
            'pamong_pendidikan' => $pendidikan,
            'pamong_agama' => $agama,
            'pamong_pangkat' => $pangkat,
            'pamong_nosk' => $skp,
            'pamong_tglsk' => $tglsk,
            'jabatan' => $jabatan,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->pemerintahanModel->updatedata($data, $id);
        return redirect()->to(base_url('/managepemerintahan'));
    }
    public function ganti($id)
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
        $logo = $this->identitasModel->view($kddesa);
        $db = \Config\Database::connect();
        $pemerintahan = $this->pemerintahanModel->find($id);
        $penduduk = $this->pendudukModel->findAll();
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'db' => $db,
            'penduduk' => $penduduk,
            'pemerintahan' => $pemerintahan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/pemerintahan/gantipemerintahan', $data);
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $this->pemerintahanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepemerintahan'));
    }

    function penduduk()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'getpenduduk') {
                $pendudukModel = new PendudukModel();

                $penduduk = $pendudukModel->where('id', $this->request->getVar('id'))->findAll();

                echo json_encode($penduduk);
            }
        }
    }
}
