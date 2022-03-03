<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PesanModel;
use App\Models\PendudukModel;
use App\Models\PesankeluarModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Pesan extends BaseController
{

    protected $permohonanModel;
    protected $pesanModel;
    protected $pendudukModel;
    protected $pesankeluarModel;
    protected $identitasModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->permohonanModel = new PermohonanModel();
        $this->pendudukModel = new PendudukModel();
        $this->pesanModel = new PesanModel();
        $this->pesankeluarModel = new PesankeluarModel();
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
        $pesan = $this->pesanModel->view($kddesa);
        $pesankeluar = $this->pesankeluarModel->view();
        $data = [
            'title' => 'Data Pesan',
            'pesan' => $pesan,
            'pesankeluar' => $pesankeluar,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/pesan/pesan', $data);
    }
    public function tulispesan()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);

        $data = [
            'title' => 'Tambah artikel',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/pesan/tulispesan', $data);
    }
    public function simpan()
    {


        $nama = $this->request->getPost('nama');
        $pesan = $this->request->getPost('pesan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'id' => $nama,
            'pesan' => $pesan,
            'kddesa' => $kddesa,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pesankeluarModel->simpan($data);
        return redirect()->to(base_url('/managepesanmasuk'));
    }

    public function balaspesan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesan = $this->pesanModel->find($id);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pesan' => $pesan,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,

        ];

        return view('admin/pesan/balaspesan', $data);
    }

    public function viewpesan($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesan = $this->pesanModel->find($id);
        $penduduk = $this->pendudukModel->findall();
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pesan' => $pesan,
            'penduduk' => $penduduk,
            'pendaftar' => $pendaftar,
            'logo' => $logo,

        ];
        $data1 = [
            'status' => 1,

        ];
        $simpan = $this->pesanModel->updatestatus($data1, $id);
        return view('admin/pesan/viewpesan', $data);
    }

    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));

        $this->pesanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepesanmasuk'));
    }
    public function viewpesankeluar($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesan = $this->pesankeluarModel->find($id);
        $penduduk = $this->pendudukModel->findall();

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pesan' => $pesan,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,

        ];

        return view('admin/pesan/viewpesankeluar', $data);
    }

    public function deletepesankeluar($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));

        $this->pesankeluarModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managepesanmasuk'));
    }
}
