<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\KatalbumModel;
use App\Models\GaleriModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Album extends BaseController
{

    protected $pendaftarModel;
    protected $albumModel;
    protected $galeriModel;
    protected $katalbumModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->albumModel = new AlbumModel();
        $this->galeriModel = new GaleriModel();
        $this->katalbumModel = new KatalbumModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pendaftarModel = new PendaftarModel();
    }

    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $album = $this->albumModel->viewalbum($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $data = [
            'title' => 'Data Album',
            'album' => $album,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/galeri/album', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katalbumModel->viewkategori($kddesa);
        $data = [

            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'kat' => $kat,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/galeri/tambahalbum', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'judul' => 'required',
            'kategori' => 'required'


        ])) {
            return redirect()->to(base_url('/tambahalbum'));
        }

        $judul = $this->request->getPost('judul');
        $kategori = $this->request->getPost('kategori');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'judul' => $judul,
            'id_kat' => $kategori,
            'kddesa' => $kddesa,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->albumModel->simpan($data);
        return redirect()->to(base_url('/managealbum'));
    }

    public function edit($id)
    {
        // $session = session();

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katalbumModel->viewkategori($kddesa);
        $album = $this->albumModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'logo' => $logo,
            'album' => $album,
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/galeri/editalbum', $data);
    }
    public function update($id)
    {

        $judul = $this->request->getPost('judul');
        $kategori = $this->request->getPost('kategori');

        $data = [

            'judul' => $judul,
            'id_kat' => $kategori



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->albumModel->updatedata($data, $id);
        return redirect()->to(base_url('/managealbum'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));

        $this->albumModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managealbum'));
    }


    public function katalbum()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $kat = $this->katalbumModel->viewkategori($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data Kategori Album',
            'kat' => $kat,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/galeri/kategori/kategori', $data);
    }
    public function tambahkat()
    {
        if (!$this->validate([

            'kategori' => 'required',



        ])) {
            return redirect()->to(base_url('/managekatgaleri'));
        }

        $kategori = $this->request->getPost('kategori');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'kategori' => $kategori,

            'kddesa' => $kddesa,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->katalbumModel->simpan($data);
        return redirect()->to(base_url('/managekatalbum'));
    }
    public function editkategori($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katalbumModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Edit Kategori',
            'kat' => $kat,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/galeri/kategori/editkategori', $data);
    }
    public function updatekategori($id)
    {

        $kat = $this->request->getPost('kategori');

        $data = [
            'kategori' => $kat,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->katalbumModel->updatedata($data, $id);
        return redirect()->to(base_url('/managekatalbum'));
    }
    public function deletekategori($id)
    {


        $this->katalbumModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managekatalbum'));
    }


    public function viewgaleri($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $album = $this->albumModel->find($id);
        $galeri = $this->galeriModel->view($id, $kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'logo' => $logo,
            'album' => $album,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'galeri' => $galeri,
            'pendaftar' => $pendaftar,

        ];

        return view('admin/galeri/galeri/galeri', $data);
    }
    public function tambahgaleri($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $album = $this->albumModel->find($id);
        $galeri = $this->galeriModel->view($id, $kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'album' => $album,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'galeri' => $galeri,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/galeri/galeri/tambahgaleri', $data);
    }
    public function simpangaleri()
    {


        $judul = $this->request->getPost('judul');
        $id_album = $this->request->getPost('id_album');
        $kddesa = $this->request->getPost('kddesa');
        $gambar = $this->request->getFile('gambar');
        $namagambar = $gambar->getName();
        $gambar->move('public/admin/images/galeri/' . $kddesa . '/', $namagambar);



        $data = [

            'judul' => $judul,
            'id_album' => $id_album,
            'foto' => $namagambar,
            'kddesa' => $kddesa,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->galeriModel->simpan($data);
        return redirect()->to(base_url('viewgaleri/' . $id_album));
    }
    public function editgaleri($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $album = $this->albumModel->find($id);

        $galeri = $this->galeriModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'logo' => $logo,
            'galeri' => $galeri,
            'album' => $album,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/galeri/galeri/editgaleri', $data);
    }
    public function updategaleri($id)
    {

        $judul = $this->request->getPost('judul');
        $id_album = $this->request->getPost('id_album');
        $gambar = $this->request->getFile('gambar');
        $kddesa = $this->request->getPost('kddesa');
        if ($gambar->getError() == 4) {

            $nama = $this->request->getPost('namalama');
        } else {
            $nama = $gambar->getName();
            $gambar->move('public/admin/images/galeri/' . $kddesa . '/', $nama);
            unlink('public/admin/images/galeri/' . $kddesa . '/' . $this->request->getPost('namalama'));
        }
        $data = [

            'judul' => $judul,

            'foto' => $nama,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->galeriModel->updatedata($data, $id);
        return redirect()->to(base_url('viewgaleri/' . $id_album));
    }

    public function deletegaleri($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $galeri = $this->galeriModel->find($id);
        unlink('public/admin/images/galeri/' . $galeri['kddesa'] . '/' . $galeri['foto']);
        $id_album = $this->request->getPost('id_album');
        $this->galeriModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('viewgaleri/' . $id_album));
    }
}
