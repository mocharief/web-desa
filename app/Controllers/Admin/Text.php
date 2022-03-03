<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TextModel;
use App\Models\KatartikelModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Text extends BaseController
{


    protected $textModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $katartikelModel;
    protected $identitasModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->identitasModel = new IdentitasModel();
        $this->textModel = new TextModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->katartikelModel = new KatartikelModel();
        $this->pendaftarModel = new PendaftarModel();
    }

    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $text = $this->textModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [

            'text' => $text,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,

        ];
        return view('admin/text/text', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'title' => 'Tambah artikel',
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,

        ];

        return view('admin/text/tambahtext', $data);
    }


    public function simpan()
    {


        $isi = $this->request->getPost('isi');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'isi' => $isi,
            'kddesa' => $kddesa,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->textModel->simpan($data);
        return redirect()->to(base_url('/managetext'));
    }

    public function edit($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $text = $this->textModel->find($id);
        $data = [
            'title' => 'Edit tTxt',
            'text' => $text,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/text/edittext', $data);
    }
    public function update($id)
    {

        $isi = $this->request->getPost('isi');

        $data = [
            'isi' => $isi,




        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->textModel->updatedata($data, $id);
        return redirect()->to(base_url('/managetext'));
    }
    public function delete($id)
    {


        $this->textModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managetext'));
    }
}
