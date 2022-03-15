<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BudayaModel;
use App\Models\KatbudayaModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Budaya extends BaseController
{


    protected $budayaModel;
    protected $settingModel;
    protected $katbudayaModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        helper('form');
        $this->budayaModel = new BudayaModel();
        $this->katbudayaModel = new KatbudayaModel();
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
        $budaya = $this->budayaModel->viewbudaya($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data budaya',
            'budaya' => $budaya,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/kebudayaan/budaya', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katbudayaModel->viewkategori($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Tambah budaya',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'kat' => $kat,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/kebudayaan/tambahbudaya', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'judul' => 'required',



        ])) {
            return redirect()->to(base_url('/tambahbudaya'));
        }

        $judul = $this->request->getPost('judul');
        $kat = $this->request->getPost('kategori');
        $isi = $this->request->getPost('isi');
        $tipe = $this->request->getPost('tipe');
        $link = $this->request->getPost('link');
        $kddesa = $this->request->getPost('kddesa');
        $data = $this->request->getFile('data');

        $image = \Config\Services::image();



        if ($data == null) {

            $namadata = "";
        } else {
            $namadata = $data->getName();
            $data->move('public/admin/images/budaya/' . $kddesa . '/', $namadata);
        }

        if ($tipe == null) {

            $namatipe = "";
        } else {
            $namatipe = $tipe;
        }

        if ($link == null) {

            $namalink = "";
        } else {
            $namalink = $link;
        }
        $slug = url_title($this->request->getPost('judul') . '-', true);
        $data = [

            'judul' => $judul,
            'isi' => $isi,
            'tipe' => $namatipe,
            'id_kat' => $kat,
            'data' => $namadata,
            'slug' =>  $slug,
            'link' =>  $namalink,
            'kddesa' => $kddesa,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->budayaModel->simpan($data);
        return redirect()->to(base_url('/managekebudayaan'));
    }

    public function edit($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katbudayaModel->findAll();
        $budaya = $this->budayaModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Edit Layanan',
            'budaya' => $budaya,
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/kebudayaan/editbudaya', $data);
    }
    public function update($id)
    {

        $judul = $this->request->getPost('judul');
        $kat = $this->request->getPost('kategori');
        $isi = $this->request->getPost('isi');
        $tipe = $this->request->getPost('tipe');
        $data = $this->request->getFile('data');
        $kddesa = $this->request->getPost('kddesa');
        $slug = url_title($this->request->getPost('judul') . '-', true);



        if ($data->getError() == 4) {

            $nama = $this->request->getPost('namalama');
        } else {
            $nama = $data->getName();
            $data->move('public/admin/images/budaya/' . $kddesa . '/', $nama);
            unlink('public/admin/images/budaya/' . $kddesa . '/' . $this->request->getPost('namalama'));
        }


        $data = [

            'judul' => $judul,
            'isi' => $isi,
            'tipe' => $tipe,
            'id_kat' => $kat,
            'data' => $nama,
            'slug' =>  $slug,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->budayaModel->updatedata($data, $id);
        return redirect()->to(base_url('/managekebudayaan'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $budaya = $this->budayaModel->find($id);

        if ($budaya['data'] != "") {
            unlink('public/admin/images/budaya/' . $budaya['kddesa'] . '/' . $budaya['data']);
        }



        $this->budayaModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managekebudayaan'));
    }


    public function katbudaya()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $kat = $this->katbudayaModel->viewkategori($kddesa);
        $data = [
            'title' => 'Data Kategori budaya',
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/kebudayaan/kategori/kategori', $data);
    }
    public function tambahkat()
    {
        if (!$this->validate([

            'kategori' => 'required',



        ])) {
            return redirect()->to(base_url('/managekatbudaya'));
        }

        $kategori = $this->request->getPost('kategori');
        $kddesa = $this->request->getPost('kddesa');


        $data = [
            'kategori' => $kategori,
            'kddesa' => $kddesa,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->katbudayaModel->simpan($data);
        return redirect()->to(base_url('/managekatbudaya'));
    }
    public function editkategori($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $kat = $this->katbudayaModel->find($id);
        $data = [
            'title' => 'Edit Kategori',
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/kebudayaan/kategori/editkategori', $data);
    }
    public function updatekategori($id)
    {

        $kat = $this->request->getPost('kategori');

        $data = [
            'kategori' => $kat,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->katbudayaModel->updatedata($data, $id);
        return redirect()->to(base_url('/managekatbudaya'));
    }
    public function deletekatbudaya($id)
    {


        $this->katbudayaModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managekatbudaya'));
    }
}
