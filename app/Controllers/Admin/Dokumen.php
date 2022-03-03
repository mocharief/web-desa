<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;
use App\Models\DokumenModel;

class Dokumen extends BaseController
{

    protected $pendaftarModel;
    protected $sliderModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $dokumenModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        helper('form');
        $this->sliderModel = new SliderModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->dokumenModel = new DokumenModel();
    }
    public function index()
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
        $dokumen = $this->dokumenModel->dokumenpenduduk($kddesa);
        $data = [
            'title' => 'Data Slider',
            'dokumen' => $dokumen,
            'pendaftar' => $pendaftar,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'kddesa' => $kddesa,
        ];
        return view('admin/dokumen/dokumen', $data);
    }
    public function daftardokumen($id)
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
        $dokumen = $this->dokumenModel->daftardokumen($id, $kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Tambah Slider',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'dokumen' => $dokumen,
        ];

        return view('admin/dokumen/daftardokumen', $data);
    }
}
