<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendaftarModel;
use App\Models\PendudukModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;

class Pendaftar extends BaseController
{


    protected $pendaftarModel;
    protected $pendudukModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;

    public function __construct()

    {
        $this->pendudukModel = new PendudukModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->identitasModel = new IdentitasModel();
    }

    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $pendaftaran = $this->pendaftarModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data Pendaftar Layanan Mandiri',
            'pendaftaran' => $pendaftaran,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/pendaftar/pendaftar', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'title' => 'Tambah artikel',
            'logo' => $logo,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'db' => $db,
        ];

        return view('admin/pendaftar/tambahpendaftar', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'nama' => 'required',
            'pin' => 'required'


        ])) {
            return redirect()->to(base_url('/tambahpendaftar'));
        }

        $nama = $this->request->getPost('nama');
        $pin = $this->request->getPost('pin');
        $nik = $this->request->getPost('nik');
        $no_wa = $this->request->getPost('no_wa');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'id' => $nama,
            'pin' => md5($pin),
            'nik' => $nik,
            'no_wa' => '62' . $no_wa,
            'kddesa' => $kddesa,
            'status' => 1,

        ];
        session()->setFlashdata('pesan', 'Akun dengan NIK ' . $nik . ' Sudah dibuat');
        session()->setFlashdata('no_wa', $no_wa);
        session()->setFlashdata('pin', $pin);
        $simpan = $this->pendaftarModel->simpan($data);
        return redirect()->to(base_url('/managependaftaran'));
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
        $penduduk = $this->pendudukModel->findall();
        $pendaftaran = $this->pendaftarModel->find($id);

        $data = [
            'title' => 'Edit Pendaftar',
            'pendaftaran' => $pendaftaran,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/pendaftar/editpendaftar', $data);
    }
    public function update($id)
    {

        $nama = $this->request->getPost('namalama');
        $pin = $this->request->getPost('pin');
        $nik = $this->request->getPost('nik');
        $no_wa = $this->request->getPost('no_wa');
        $data = [

            'id' => $nama,
            'pin' => md5($pin),
            'nik' => $nik,
            'no_wa' => '62' . $no_wa,


        ];
        $data1 = [

            'status' => 1,




        ];

        session()->setFlashdata('pesan', 'Pin dengan NIK ' . $nik . ' Sudah Diatur');
        session()->setFlashdata('no_wa', $no_wa);
        session()->setFlashdata('pin', $pin);
        $simpan = $this->pendaftarModel->updatedata($data, $id);
        $simpan = $this->pendaftarModel->updatedata1($data1, $id);
        return redirect()->to(base_url('/managependaftaran'));
    }


    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));

        $this->pendaftarModel->delete($id);

        session()->setFlashdata('msg', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managependaftaran'));
    }
}
