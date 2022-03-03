<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\KatartikelModel;
use App\Models\SettingModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Artikel extends BaseController
{

    protected $identitasModel;
    protected $artikelModel;
    protected $settingModel;
    protected $katartikelModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        helper('form');
        $this->artikelModel = new ArtikelModel();
        $this->settingModel = new SettingModel();
        $this->katartikelModel = new KatartikelModel();
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
        $artikel = $this->artikelModel->viewartikel($kddesa);

        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data Artikel',
            'artikel' => $artikel,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'activemenu' => $this->data['activemenu'] = 'artikel',
        ];
        return view('admin/artikel/artikel', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katartikelModel->viewkategori($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'kat' => $kat,
            'kddesa' => $kddesa,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/artikel/tambahartikel', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'judul' => 'required',



        ])) {
            return redirect()->to(base_url('/tambahartikel'));
        }

        $judul = $this->request->getPost('judul');
        $kat = $this->request->getPost('kategori');
        $isi = $this->request->getPost('isi');
        $kddesa = $this->request->getPost('kddesa');
        $gambar = $this->request->getFile('gambar');

        $image = \Config\Services::image();
        $nama = $gambar->getName();
        $gambar->move('public/admin/images/artikel/' . $kddesa . '/', $nama);


        $gambar1 = $this->request->getFile('gambar1');
        if ($gambar1->getError() == 4) {

            $namagambar1 = "";
        } else {
            $namagambar1 = $gambar1->getName();
            $gambar1->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar1);
        }

        $gambar2 = $this->request->getFile('gambar2');
        if ($gambar2->getError() == 4) {

            $namagambar2 = "";
        } else {
            $namagambar2 = $gambar2->getName();
            $gambar2->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar2);
        }
        $gambar3 = $this->request->getFile('gambar3');
        if ($gambar3->getError() == 4) {

            $namagambar3 = "";
        } else {
            $namagambar3 = $gambar3->getName();
            $gambar3->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar3);
        }
        $dokumen = $this->request->getFile('dokumen');
        if ($dokumen->getError() == 4) {

            $namadokumen = "";
        } else {
            $namadokumen = $dokumen->getName();
            $dokumen->move('public/admin/images/artikel/dokumen/' . $kddesa . '/', $namadokumen);
        }
        $namadok = $this->request->getPost('namadokumen');
        $slug = url_title($this->request->getPost('judul') . '-', true);
        $data = [

            'judul' => $judul,
            'isi' => $isi,

            'id_kat' => $kat,
            'gambar' => $nama,
            'gambar1' => $namagambar1,
            'gambar2' => $namagambar2,
            'gambar3' => $namagambar3,
            'dokumen' => $namadokumen,
            'nama_dokumen' => $namadok,
            'enabled' => '1',
            'slug' =>  $slug,
            'kddesa' =>  $kddesa,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->artikelModel->simpan($data);
        return redirect()->to(base_url('/manageartikel'));
    }

    public function edit($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katartikelModel->findAll();
        $logo = $this->identitasModel->view($kddesa);
        $artikel = $this->artikelModel->find($id);

        $data = [
            'title' => 'Edit Layanan',
            'artikel' => $artikel,
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/artikel/editartikel', $data);
    }
    public function update($id)
    {

        $judul = $this->request->getPost('judul');
        $kat = $this->request->getPost('kategori');
        $isi = $this->request->getPost('isi');
        $kddesa = $this->request->getPost('kddesa');
        $slug = url_title($this->request->getPost('judul') . '-', true);

        $gambar = $this->request->getFile('gambar');

        if ($gambar->getError() == 4) {

            $nama = $this->request->getPost('namalama');
        } else {
            $nama = $gambar->getName();
            $gambar->move('public/admin/images/artikel/' . $kddesa . '/', $nama);
            unlink('public/admin/images/artikel/' . $kddesa . '/' . $this->request->getPost('namalama'));
        }

        $gambar1 = $this->request->getFile('gambar1');
        if ($gambar1->getError() == 4) {

            $namagambar1 = $this->request->getPost('namalama1');
        } else {
            if ($this->request->getPost('namalama1') == "") {
                $namagambar1 = $gambar1->getName();
                $gambar1->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar1);
            } else {
                $namagambar1 = $gambar1->getName();
                $gambar1->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar1);
                unlink('public/admin/images/artikel/' . $kddesa . '/' . $this->request->getPost('namalama'));
            }
        }
        $gambar2 = $this->request->getFile('gambar2');

        if ($gambar2->getError() == 4) {

            $namagambar2 = $this->request->getPost('namalama2');
        } else {
            if ($this->request->getPost('namalama2') == "") {
                $namagambar2 = $gambar2->getName();
                $gambar2->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar2);
            } else {
                $namagambar2 = $gambar2->getName();
                $gambar2->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar2);
                unlink('public/admin/images/artikel/' . $kddesa . '/' . $this->request->getPost('namalama2'));
            }
        }
        $gambar3 = $this->request->getFile('gambar3');
        if ($gambar3->getError() == 4) {

            $namagambar3 = $this->request->getPost('namalama3');
        } else {
            if ($this->request->getPost('namalama3') == "") {
                $namagambar3 = $gambar3->getName();
                $gambar3->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar3);
            } else {
                $namagambar3 = $gambar3->getName();
                $gambar3->move('public/admin/images/artikel/' . $kddesa . '/', $namagambar3);
                unlink('public/admin/images/artikel/' . $kddesa . '/' . $this->request->getPost('namalama3'));
            }
        }
        $dokumen = $this->request->getFile('dokumen');
        if ($dokumen->getError() == 4) {

            $namadokumen = $this->request->getPost('namalama4');
        } else {
            if ($this->request->getPost('namalama4') == "") {
                $namadokumen = $dokumen->getName();
                $dokumen->move('public/admin/images/artikel/dokumen/' . $kddesa . '/', $namadokumen);
            } else {
                $namadokumen = $dokumen->getName();
                $dokumen->move('public/admin/images/artikel/dokumen/' . $kddesa . '/', $namadokumen);
                unlink('public/admin/images/artikel/dokumen/' . $kddesa . '/' . $this->request->getPost('namalama4'));
            }
        }
        $namadok = $this->request->getPost('namadokumen');
        $data = [

            'judul' => $judul,
            'isi' => $isi,

            'id_kat' => $kat,
            'gambar' => $nama,
            'gambar1' => $namagambar1,
            'gambar2' => $namagambar2,
            'gambar3' => $namagambar3,
            'dokumen' => $namadokumen,
            'nama_dokumen' => $namadok,
            'slug' =>  $slug,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->artikelModel->updatedata($data, $id);
        return redirect()->to(base_url('/manageartikel'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $artikel = $this->artikelModel->find($id);
        unlink('public/admin/images/artikel/' . $artikel['kddesa'] . '/' . $artikel['gambar']);
        if ($artikel['gambar1'] != "") {
            unlink('public/admin/images/artikel/' . $artikel['kddesa']  . '/' . $artikel['gambar1']);
        }
        if ($artikel['gambar2'] != "") {
            unlink('public/admin/images/artikel/' . $artikel['kddesa']  . '/' . $artikel['gambar2']);
        }
        if ($artikel['gambar3'] != "") {
            unlink('public/admin/images/artikel/' . $artikel['kddesa']  . '/' . $artikel['gambar3']);
        }
        if ($artikel['dokumen'] != "") {
            unlink('public/admin/images/artikel/dokumen/' . $artikel['kddesa']  . '/' . $artikel['dokumen']);
        }


        $this->artikelModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/manageartikel'));
    }


    public function katartikel()
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katartikelModel->viewkategori($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data Kategori artikel',
            'kat' => $kat,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/artikel/kategori/kategori', $data);
    }
    public function tambahkat()
    {
        if (!$this->validate([

            'kategori' => 'required',



        ])) {
            return redirect()->to(base_url('/managekatartikel'));
        }

        $kategori = $this->request->getPost('kategori');
        $kddesa = $this->request->getPost('kddesa');


        $data = [
            'kategori' => $kategori,

            'kddesa' => $kddesa,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->katartikelModel->simpan($data);
        return redirect()->to(base_url('/managekatartikel'));
    }
    public function editkategori($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $kat = $this->katartikelModel->find($id);
        $data = [
            'title' => 'Edit Kategori',
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/artikel/kategori/editkategori', $data);
    }
    public function updatekategori($id)
    {

        $kat = $this->request->getPost('kategori');

        $data = [
            'kategori' => $kat,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->katartikelModel->updatedata($data, $id);
        return redirect()->to(base_url('/managekatartikel'));
    }
    public function deletekategori($id)
    {


        $this->katartikelModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managekatartikel'));
    }
}
