<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendataanModel;
use App\Models\PendudukModel;
use App\Models\PemantauanModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Pemantauan extends BaseController
{

    protected $identitasModel;
    protected $pendataanModel;
    protected $pendudukModel;
    protected $pemantauanModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->pendataanModel = new PendataanModel();
        $this->pendudukModel = new PendudukModel();
        $this->pemantauanModel = new PemantauanModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pendaftarModel = new PendaftarModel();
        helper('form');
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
        $pendataan = $this->pendataanModel->viewpemantauan($kddesa);
        $pemantauan = $this->pemantauanModel->view($kddesa);
        $db = \Config\Database::connect();
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pendataan' => $pendataan,
            'pemantauan' => $pemantauan,
            'db' => $db,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/pemantauan/pemantauan', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'suhu_tubuh' => 'required',


        ])) {
            return redirect()->to(base_url('/managepemantauan'));
        }

        $nama = $this->request->getPost('nama');
        $suhu_tubuh = $this->request->getPost('suhu_tubuh');
        $batuk = $this->request->getPost('batuk');
        $flu = $this->request->getPost('flu');
        $sesak = $this->request->getPost('sesak');
        $keluhan = $this->request->getPost('keluhan');
        $kddesa = $this->request->getPost('kddesa');

        $data = [
            'id' => $nama,
            'suhu_tubuh' => $suhu_tubuh,
            'batuk' => $batuk,
            'flu' => $flu,
            'sesak_nafas' => $sesak,
            'keluhan_lain' => $keluhan,
            'kddesa' => $kddesa

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pemantauanModel->simpan($data);
        return redirect()->to(base_url('/managepemantauan'));
    }

    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $this->pemantauanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepemantauan'));
    }
}
