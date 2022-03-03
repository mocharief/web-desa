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

class Pesanuser extends BaseController
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
        helper('form');
    }

    public function index()
    {

        $session = session();
        $id = $session->get('id');
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $pesan = $this->pesankeluarModel->viewpesan($id);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesan' => $pesan,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
        ];

        return view('user/pesan/pesanuser', $data);
    }

    public function tulispesan()
    {

        $session = session();
        $id = $session->get('id');
        $kddesa = $session->get('kddesa');
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'id' => $id,
            'kddesa' => $kddesa,
        ];

        return view('user/pesan/tulispesan', $data);
    }

    public function simpan()
    {
        if (!$this->validate([

            'pesan' => 'required',


        ])) {
            return redirect()->to(base_url('/tulispesanuser'));
        }

        $id = $this->request->getPost('id');
        $pesan = $this->request->getPost('pesan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'id' => $id,
            'pesan' => $pesan,
            'kddesa' => $kddesa,
        ];


        session()->setFlashdata('pesan', 'Pesan Berhasil Terkirim ke Admin');
        $simpan = $this->pesanModel->simpan($data);
        return redirect()->to(base_url('/pesanuser'));
    }
    public function lihatpesan($id)
    {
        $session = session();
        $iduser = $session->get('id');
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($iduser);
        $permohonan = $this->permohonanModel->viewpermohonanuser($iduser);
        $user = $this->pendudukModel->user($iduser);
        $pesan = $this->pesankeluarModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'user' => $user,
            'logo' => $logo,
            'pesan' => $pesan,

        ];

        $data1 = [
            'status' => 1,

        ];
        $simpan = $this->pesankeluarModel->updatestatus($data1, $id);
        return view('user/pesan/lihatpesan', $data);
    }

    public function pesankeluar()
    {

        $session = session();
        $id = $session->get('id');
        $user = $this->pendudukModel->user($id);
        $logo = $this->identitasModel->view($kddesa);
        $pesan = $this->pesanModel->viewpesanuser($id);
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);
        $permohonan = $this->permohonanModel->viewpermohonanuser($id);
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesan' => $pesan,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
        ];

        return view('user/pesan/pesankeluar', $data);
    }

    public function lihatpesankeluar($id)
    {
        $session = session();
        $iduser = $session->get('id');
        $pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($iduser);
        $permohonan = $this->permohonanModel->viewpermohonanuser($iduser);

        $user = $this->pendudukModel->user($iduser);
        $pesan = $this->pesankeluarModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'user' => $user,
            'logo' => $logo,
            'pesan' => $pesan,
        ];

        return view('user/pesan/lihatpesankeluar', $data);
    }
}
