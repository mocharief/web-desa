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
        $persyaratan = $this->persyaratanModel->findAll();
        $syarat = $this->settingsyaratModel->view($id);
        $data = [
            'pengaturansurat' => $pengaturansurat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'persyaratan' => $persyaratan,
            'syarat' => $syarat,
            'pendaftar' => $pendaftar,
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
        $data = [

            'kode_surat' => $kode,
            'mandiri' => $mandiri,
            'masa_berlaku' => $masa_berlaku,
            'satuan_masa_berlaku' => $satuan_masa_berlaku,
        ];


        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->pengaturansuratModel->updatedata($data, $id);
        $this->settingsyaratModel->hapusdata($id_format_surat);
        if ($id_syarat != 0) {
            for ($i = 0; $i < sizeof($id_syarat); $i++) {
                $data1 = [

                    'id_surat' => $id_format_surat,
                    'id_syarat' => $id_syarat[$i],


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

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pengaturansuratModel->updatedata($data, $id);
        return redirect()->to(base_url('/managecetaksurat'));
    }

    public function nonfavorit($id)
    {


        $data = [
            'favorit' => 0,
        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
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
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $this->persyaratanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepersyaratan'));
    }
}
