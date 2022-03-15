<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DusunModel;
use App\Models\PendudukModel;
use App\Models\BudayaModel;
use App\Models\AlbumModel;
use App\Models\KkModel;
use App\Models\UmkmModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PesankeluarModel;
use App\Models\PenerimaModel;
use App\Models\DokumenModel;
use App\Models\PersyaratanModel;

class Dokumen extends BaseController
{
    protected $dusunModel;
    protected $pendudukModel;
    protected $budayaModel;
    protected $albumModel;
    protected $kkModel;
    protected $umkmModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $pesankeluarModel;
    protected $penerimaModel;
    protected $dokumenModel;
    protected $persyaratanModel;

    public function __construct()
    {
        $this->dusunModel = new DusunModel();
        $this->pendudukModel = new PendudukModel();
        $this->budayaModel = new BudayaModel();
        $this->albumModel = new AlbumModel();
        $this->kkModel = new KkModel();
        $this->umkmModel = new UmkmModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->identitasModel = new IdentitasModel();
        $this->pesankeluarModel = new PesankeluarModel();
        $this->penerimaModel = new PenerimaModel();
        $this->dokumenModel = new DokumenModel();
        $this->persyaratanModel = new PersyaratanModel();
        helper('form');
    }

    public function index()
    {
        $session = session();
        $id = $session->get('id');
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $penerima = $this->penerimaModel->viewpenerima($id);
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $dokumen = $this->dokumenModel->viewdokumen($id);

        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penerima' => $penerima,
            'dokumen' => $dokumen,
        ];

        return view('user/dokumen/dokumen', $data);
    }
    public function tambah()
    {
        $session = session();
        $id = $session->get('id');
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $penerima = $this->penerimaModel->viewpenerima($id);
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $dokumen = $this->dokumenModel->viewdokumen($id);
        $persyaratan = $this->persyaratanModel->findAll();
        $db = \Config\Database::connect();
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penerima' => $penerima,
            'dokumen' => $dokumen,
            'persyaratan' => $persyaratan,
            'db' => $db,
            'id' => $id,
            'kddesa' => $kddesa,
        ];

        return view('user/dokumen/tambahdokumen', $data);
    }


    public function simpan()
    {


        $id = $this->request->getPost('id');
        $dokumen = $this->request->getPost('nama_dokumen');
        $kddesa = $this->request->getPost('kddesa');
        $syarat = $this->request->getPost('syarat');
        $file = $this->request->getFile('file');
        $slug = url_title($dokumen, '-', true);
        if ($file->getError() == 4) {

            $namagambar = '';
        } else {
            $namagambar = $file->getName();
            $file->move('public/admin/dokumen/' . $id . '/', $namagambar);
        }

        $data = [

            'id' => $id,
            'nama_dokumen' => $dokumen,
            'id_syarat' => $syarat,
            'file' => $namagambar,
            'slug' => $slug,
            'kddesa' => $kddesa,
        ];


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->dokumenModel->simpan($data);
        return redirect()->to(base_url('/dokumenuser'));
    }

    public function edit($id)
    {
        $session = session();
        $iduser = $session->get('id');
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($iduser);
        $permohonan = $this->permohonanModel->viewpermohonanuser($iduser);
        $penerima = $this->penerimaModel->viewpenerima($iduser);
        $user = $this->pendudukModel->user($iduser);
        $logo = $this->identitasModel->view($kddesa);
        $persyaratan = $this->persyaratanModel->findAll();
        $db = \Config\Database::connect();
        $dokumen = $this->dokumenModel->find($id);
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penerima' => $penerima,
            'persyaratan' => $persyaratan,
            'db' => $db,
            'iduser' => $iduser,
            'dokumen' => $dokumen,
        ];

        return view('user/dokumen/editdokumen', $data);
    }
    public function update($id)
    {

        $iduser = $this->request->getPost('id');
        $dokumen = $this->request->getPost('nama_dokumen');
        $syarat = $this->request->getPost('syarat');
        $file = $this->request->getFile('file');
        $slug = url_title($dokumen, '-', true);
        if ($file->getError() == 4) {

            $namagambar = $this->request->getPost('namalama');
        } else {
            if ($this->request->getPost('namalama') == "") {
                $namagambar = $file->getName();
                $file->move('public/admin/dokumen/' . $iduser . '/', $namagambar);
            } else {
                $namagambar = $file->getName();
                $file->move('public/admin/dokumen/' . $iduser . '/', $namagambar);
                unlink('public/admin/dokumen/' . $iduser . '/' . $this->request->getPost('namalama'));
            }
        }

        $data = [

            'id' => $iduser,
            'nama_dokumen' => $dokumen,
            'id_syarat' => $syarat,
            'file' => $namagambar,
            'slug' => $slug,
        ];


        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->dokumenModel->updatedata($data, $id);
        return redirect()->to(base_url('/dokumenuser'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        $iduser = $this->request->getPost('id');
        $dokumen = $this->dokumenModel->find($id);

        if ($dokumen['file'] != "") {
            unlink('public/admin/dokumen/' . $iduser . '/' . $dokumen['file']);
        }

        $this->dokumenModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('dokumenuser'));
    }
}
