<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikankkModel;
use App\Models\AgamaModel;
use App\Models\GolonganModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Statistik extends BaseController
{


    protected $pendudukModel;
    protected $pendidikanModel;
    protected $pekerjaanModel;
    protected $pendidikankkModel;
    protected $agamaModel;
    protected $golonganModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $pendaftarModel;
    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pendudukModel = new PendudukModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pendidikankkModel = new PendidikankkModel();
        $this->agamaModel = new AgamaModel();
        $this->golonganModel = new GolonganModel();
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
        $penduduk = $this->pendudukModel->find();
        $pekerjaan = $this->pekerjaanModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $pendidikankk = $this->pendidikankkModel->findAll();
        $agama = $this->agamaModel->findAll();
        $golongan = $this->golonganModel->findAll();
        $db = \Config\Database::connect();
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'db' => $db,
            'pekerjaan' => $pekerjaan,
            'pendidikan' => $pendidikan,
            'pendidikankk' => $pendidikankk,
            'agama' => $agama,
            'golongan' => $golongan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/statistik/statistik', $data);
    }
}
