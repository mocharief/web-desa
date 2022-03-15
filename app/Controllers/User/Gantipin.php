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
use App\Models\PendaftarModel;

class Gantipin extends BaseController
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
    protected $pendaftarModel;

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
        $this->pendaftarModel = new PendaftarModel();
        helper('form');
    }

    public function index()
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
        ];

        return view('user/gantipin', $data);
    }
    public function gantipassword()
    {
        $session = session();
        $id = $session->get('id');
        $pinlama = $this->request->getPost('pinlama');
        $pinbaru = $this->request->getPost('pinbaru');
        $data =    $this->pendaftarModel->where([
            'id' => $id,
        ])->first();
        if ($data) {
            if ($data['pin'] == md5($pinlama)) {
                $data = [
                    'pin' => md5($pinbaru),

                ];
                $this->pendaftarModel->updatedata($data, $id);
                $session->setFlashdata('msg', 'PIN SUDAH DIRUBAH');
                return redirect()->to(base_url('/gantipin'));
            } else {
                $session->setFlashdata('msg', 'PIN yang Anda Masukan tidak sama dengan PIN Lama');
                return redirect()->to(base_url('/gantipin'));
            }
        } else {
            $session->setFlashdata('msg', 'ID Anda Tidak Ditemukan');
            return redirect()->to(base_url('/gantipin'));
        }
    }
}
