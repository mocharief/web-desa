<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DusunModel;
use App\Models\PendudukModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Wilayah extends BaseController
{

    protected $identitasModel;
    protected $dusunModel;
    protected $pendudukModel;
    protected $rwModel;
    protected $rtModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->dusunModel = new DusunModel();
        $this->pendudukModel = new PendudukModel();
        $this->rwModel = new RwModel();
        $this->rtModel = new RtModel();
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
        $dusun = $this->dusunModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'title' => 'Data budaya',
            'dusun' => $dusun,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/wilayah/dusun/dusun', $data);
    }
    public function tambahdusun()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);

        $data = [
            'title' => 'Tambah Data Wilayah Administratif Dusun',
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'logo' => $logo,
            'kddesa' => $kddesa,
        ];

        return view('admin/wilayah/dusun/tambahdusun', $data);
    }


    public function simpandusun()
    {


        $dusun = $this->request->getPost('dusun');
        $nama = $this->request->getPost('nama');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'namadusun' => $dusun,
            'kepala_dusun' => $nama,
            'kddesa' => $kddesa,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->dusunModel->simpan($data);
        return redirect()->to(base_url('/managewilayah'));
    }

    public function editdusun($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->findall();
        $dusun = $this->dusunModel->find($id);

        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'dusun' => $dusun,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/wilayah/dusun/editdusun', $data);
    }
    public function updatedusun($id)
    {

        $dusun = $this->request->getPost('dusun');
        if ($this->request->getPost('nama') == "") {

            $namakepala = $this->request->getPost('namalama');
        } else {
            $namakepala = $this->request->getPost('nama');
        }
        $data = [

            'namadusun' => $dusun,
            'kepala_dusun' => $namakepala,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->dusunModel->updatedata($data, $id);
        return redirect()->to(base_url('/managewilayah'));
    }
    public function deletedusun($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }


        $this->dusunModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managewilayah'));
    }

    public function viewrw($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->findall();
        $dusun = $this->dusunModel->find($id);
        $rw = $this->rwModel->view($id, $kddesa);
        $data = [
            'title' => 'RW',
            'dusun' => $dusun,
            'penduduk' => $penduduk,
            'rw' => $rw,
            'pendaftar' => $pendaftar,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
        ];

        return view('admin/wilayah/rw/rw', $data);
    }
    public function tambahrw($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $dusun = $this->dusunModel->find($id);
        $rw = $this->rwModel->view($id, $kddesa);

        $data = [
            'title' => 'RW',
            'dusun' => $dusun,
            'penduduk' => $penduduk,
            'rw' => $rw,
            'pendaftar' => $pendaftar,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'kddesa' => $kddesa,
        ];

        return view('admin/wilayah/rw/tambahrw', $data);
    }
    public function simpanrw()
    {


        $rw = $this->request->getPost('rw');
        $id_dusun = $this->request->getPost('id_dusun');
        $id = $this->request->getPost('nama');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'rw' => $rw,
            'id_dusun' => $id_dusun,
            'kepala_rw' => $id,

            'kddesa' => $kddesa,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->rwModel->simpan($data);
        return redirect()->to(base_url('viewrw/' . $id_dusun));
    }
    public function editrw($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $rw = $this->rwModel->find($id);
        $data = [
            'title' => 'RW',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'rw' => $rw,
            'pendaftar' => $pendaftar,
            'logo' => $logo,
        ];

        return view('admin/wilayah/rw/editrw', $data);
    }
    public function updaterw($id)
    {

        $rw = $this->request->getPost('rw');
        $id_dusun = $this->request->getPost('id_dusun');
        if ($this->request->getPost('nama') == "") {

            $namakepala = $this->request->getPost('namalama');
        } else {
            $namakepala = $this->request->getPost('nama');
        }
        $data = [

            'rw' => $rw,
            'kepala_rw' => $namakepala,
            'id_dusun' => $id_dusun,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->rwModel->updatedata($data, $id);
        return redirect()->to(base_url('viewrw/' . $id_dusun));
    }

    public function deleterw($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $id_dusun = $this->request->getPost('id_dusun');
        $this->rwModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('viewrw/' . $id_dusun));
    }


    public function viewrt($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $rw = $this->rwModel->find($id);
        $rt = $this->rtModel->view($id);

        $data = [
            'title' => 'RT',
            'rw' => $rw,
            'penduduk' => $penduduk,
            'rt' => $rt,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'logo' => $logo,
        ];

        return view('admin/wilayah/rt/rt', $data);
    }
    public function tambahrt($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $rw = $this->rwModel->find($id);
        $rt = $this->rtModel->view($id);

        $data = [
            'title' => 'RT',
            'rw' => $rw,
            'penduduk' => $penduduk,
            'rt' => $rt,
            'pendaftar' => $pendaftar,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'kddesa' => $kddesa,
        ];

        return view('admin/wilayah/rt/tambahrt', $data);
    }
    public function simpanrt()
    {


        $rt = $this->request->getPost('rt');
        $id_rw = $this->request->getPost('id_rw');
        $id_dusun = $this->request->getPost('id_dusun');
        $id = $this->request->getPost('nama');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'rt' => $rt,
            'id_dusun' => $id_dusun,
            'id_rw' => $id_rw,
            'kepala_rt' => $id,
            'kddesa' => $kddesa,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->rtModel->simpan($data);
        return redirect()->to(base_url('viewrt/' . $id_rw));
    }
    public function editrt($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $penduduk = $this->pendudukModel->findall();
        $logo = $this->identitasModel->view($kddesa);
        $rt = $this->rtModel->find($id);

        $data = [
            'title' => 'RT',
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'rt' => $rt,
            'pendaftar' => $pendaftar,
            'logo' => $logo,
        ];

        return view('admin/wilayah/rt/editrt', $data);
    }
    public function updatert($id)
    {

        $rt = $this->request->getPost('rt');
        $id_rw = $this->request->getPost('id_rw');
        $id_dusun = $this->request->getPost('id_dusun');
        if ($this->request->getPost('nama') == "") {

            $namakepala = $this->request->getPost('namalama');
        } else {
            $namakepala = $this->request->getPost('nama');
        }
        $data = [

            'rt' => $rt,
            'kepala_rt' => $namakepala,
            'id_dusun' => $id_dusun,
            'id_rw' => $id_rw,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->rtModel->updatedata($data, $id);
        return redirect()->to(base_url('viewrt/' . $id_rw));
    }

    public function deletert($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $id_rw = $this->request->getPost('id_rw');
        $this->rtModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('viewrt/' . $id_rw));
    }
}
