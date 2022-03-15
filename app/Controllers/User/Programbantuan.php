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

class Programbantuan extends BaseController
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
        $data = [
            'user' => $user,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penerima' => $penerima,
        ];

        return view('user/bantuan/bantuan', $data);
    }

    function download($id)
    {

        $data =  $this->penerimaModel->find($id);
        return $this->response->download('public/admin/images/penerima/' . $data['foto'], null);
    }
}
