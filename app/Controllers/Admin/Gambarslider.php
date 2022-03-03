<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SliderModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Gambarslider extends BaseController
{

    protected $pendaftarModel;
    protected $sliderModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        helper('form');
        $this->sliderModel = new SliderModel();
        $this->pendaftarModel = new PendaftarModel();
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
        $slider = $this->sliderModel->view($kddesa);
        $data = [
            'title' => 'Data Slider',
            'slider' => $slider,
            'pendaftar' => $pendaftar,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'kddesa' => $kddesa,
        ];
        return view('admin/slider/slider', $data);
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
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Tambah Slider',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/slider/tambahslider', $data);
    }


    public function simpan()
    {


        $judul = $this->request->getPost('judul');
        $tipe = $this->request->getPost('tipe');
        $kddesa = $this->request->getPost('kddesa');
        $gambar = $this->request->getFile('data');

        $image = \Config\Services::image();
        $nama = $gambar->getName();
        $gambar->move('public/admin/images/slider/' . $kddesa . '/', $nama);


        $data = [
            'file' => $nama,
            'tipe' => $tipe,
            'judul' => $judul,
            'kddesa' => $kddesa,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->sliderModel->simpan($data);
        return redirect()->to(base_url('/manageslider'));
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
        $slider = $this->sliderModel->find($id);
        $data = [
            'title' => 'Edit Slider',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'slider' => $slider,
            'logo' => $logo,
            'kddesa' => $kddesa,
        ];

        return view('admin/slider/editslider', $data);
    }
    public function update($id)
    {

        $judul = $this->request->getPost('judul');
        $tipe = $this->request->getPost('tipe');
        $gambar = $this->request->getFile('data');
        $kddesa = $this->request->getPost('kddesa');
        if ($gambar->getError() == 4) {

            $nama = $this->request->getPost('namalama');
        } else {
            $nama = $gambar->getName();
            $gambar->move('public/admin/images/slider/' . $kddesa . '/', $nama);
            unlink('public/admin/images/slider/' . $kddesa . '/' . $this->request->getPost('namalama'));
        }
        $data = [
            'file' => $nama,
            'tipe' => $tipe,
            'judul' => $judul,
            'kddesa' => $kddesa,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->sliderModel->updateslider($data, $id);
        return redirect()->to(base_url('/manageslider'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $slider = $this->sliderModel->find($id);

        unlink('public/admin/images/slider/' . $slider['kddesa'] . '/' . $slider['file']);
        $this->sliderModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/manageslider'));
    }
}
