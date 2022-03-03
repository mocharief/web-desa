<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UmkmModel;
use App\Models\KatumkmModel;
use App\Models\PendudukModel;
use App\Models\AnggotaModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Umkm extends BaseController
{

    protected $pesanModel;
    protected $permohonanModel;
    protected $umkmModel;
    protected $katumkmModel;
    protected $pendudukModel;
    protected $anggotaModel;
    protected $identitasModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->umkmModel = new UmkmModel();
        $this->katumkmModel = new katumkmModel();
        $this->pendudukModel = new PendudukModel();
        $this->anggotaModel = new AnggotaModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pendaftarModel = new PendaftarModel();
    }

    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $db = \Config\Database::connect();
        $umkm = $this->umkmModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'umkm' => $umkm,
            'db' => $db,
            'logo' => $logo,
            'pendaftar' => $pendaftar,

        ];
        return view('admin/umkm/umkm', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $kat = $this->katumkmModel->kat($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Tambah artikel',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'kat' => $kat,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/umkm/tambahumkm', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'umkm' => 'required',
            'kategori' => 'required',
            'nama' => 'required',



        ])) {
            return redirect()->to(base_url('/tambahumkm'));
        }

        $umkm = $this->request->getPost('umkm');
        $kode = $this->request->getPost('kode');
        $kategori = $this->request->getPost('kategori');
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'nama_umkm' => $umkm,
            'kode' => $kode,
            'id_kat' => $kategori,
            'id' => $nama,
            'deskripsi' => $deskripsi,
            'kddesa' => $kddesa,
        ];


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->umkmModel->simpan($data);
        return redirect()->to(base_url('/manageumkm'));
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
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $kat = $this->katumkmModel->kat($kddesa);
        $umkm = $this->umkmModel->find($id);
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'kat' => $kat,
            'logo' => $logo,
            'umkm' => $umkm,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/umkm/editumkm', $data);
    }
    public function update($id)
    {

        $umkm = $this->request->getPost('umkm');
        $kode = $this->request->getPost('kode');
        $kategori = $this->request->getPost('kategori');
        $nama = $this->request->getPost('nama');
        $deskripsi = $this->request->getPost('deskripsi');

        $data = [

            'nama_umkm' => $umkm,
            'kode' => $kode,
            'id_kat' => $kategori,
            'id' => $nama,
            'deskripsi' => $deskripsi,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->umkmModel->updatedata($data, $id);
        return redirect()->to(base_url('/manageumkm'));
    }
    public function viewanggota($id)
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
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $kat = $this->katumkmModel->findAll();
        $umkm = $this->umkmModel->find($id);
        $anggota = $this->anggotaModel->view($id, $kddesa);
        $db = \Config\Database::connect();

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'kat' => $kat,
            'anggota' => $anggota,
            'db' => $db,
            'umkm' => $umkm,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/umkm/anggota/anggota', $data);
    }
    public function tambahanggota($id)
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
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $kat = $this->katumkmModel->findAll();
        $umkm = $this->umkmModel->find($id);
        $db = \Config\Database::connect();
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'kat' => $kat,
            'db' => $db,
            'umkm' => $umkm,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/umkm/anggota/tambahanggota', $data);
    }


    public function simpananggota()
    {


        $id_umkm = $this->request->getPost('id_umkm');
        $ket = $this->request->getPost('ket');
        $id = $this->request->getPost('nama');
        $kddesa = $this->request->getPost('kddesa');

        $data = [

            'id_umkm' => $id_umkm,
            'keterangan' => $ket,
            'id' => $id,
            'kddesa' => $kddesa,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->anggotaModel->simpan($data);
        return redirect()->to(base_url('viewanggota/' . $id_umkm));
    }
    public function editanggota($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $penduduk = $this->pendudukModel->findall();
        $logo = $this->identitasModel->view($kddesa);
        $anggota = $this->anggotaModel->find($id);

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'penduduk' => $penduduk,
            'anggota' => $anggota,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/umkm/anggota/editanggota', $data);
    }

    public function updateanggota($id)
    {



        $id_umkm = $this->request->getPost('id_umkm');
        $ket = $this->request->getPost('keterangan');
        $data = [



            'keterangan' => $ket,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->anggotaModel->updatedata($data, $id);
        return redirect()->to(base_url('viewanggota/' . $id_umkm));
    }
    public function deleteanggota($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        $id_umkm = $this->request->getPost('id_umkm');
        $this->anggotaModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('viewanggota/' . $id_umkm));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));

        $this->umkmModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/manageumkm'));
    }


    public function katumkm()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kat = $this->katumkmModel->kat($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data Kategori Album',
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/umkm/kategori/kategori', $data);
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
        $simpan = $this->katumkmModel->simpan($data);
        return redirect()->to(base_url('/managekatumkm'));
    }

    public function editkategori($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $kat = $this->katumkmModel->find($id);

        $data = [
            'title' => 'Edit Kategori',
            'kat' => $kat,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/umkm/kategori/editkategori', $data);
    }
    public function updatekategori($id)
    {

        $kat = $this->request->getPost('kategori');

        $data = [
            'kategori' => $kat,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->katumkmModel->updatedata($data, $id);
        return redirect()->to(base_url('/managekatumkm'));
    }
    public function deletekatumkm($id)
    {


        $this->katumkmModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managekatumkm'));
    }
}
