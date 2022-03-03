<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SosmedModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Sosmed extends BaseController
{


    protected $sosmedModel;
    protected $pesanModel;
    protected $requestModel;
    protected $subscribeModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $pendaftarModel;
    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->sosmedModel = new SosmedModel();
        $this->identitasModel = new IdentitasModel();
        $this->pendaftarModel = new PendaftarModel();
    }
    public function index()
    {
        session();
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $sosmed = $this->sosmedModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'title' => 'Data Paket Harga',
            'sosmed' => $sosmed,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/sosmed/sosmed', $data);
    }


    public function update($id)
    {
        if (!$this->validate([

            'wa' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => '* Harus diisi dengan angka',

                ]
            ],



        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/managemedsos/'))->withInput()->with('validation', $validation);
        }
        $fb = $this->request->getPost('fb');
        $wa = $this->request->getPost('wa');
        $youtube = $this->request->getPost('youtube');
        $instagram = $this->request->getPost('instagram');
        $twitter = $this->request->getPost('twitter');
        $telegram = $this->request->getPost('telegram');
        $data = [
            'fb' => $fb,
            'wa' => '62' . $wa,
            'yt' => $youtube,
            'ig' => $instagram,
            'twitter' => $twitter,
            'telegram' => $telegram


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->sosmedModel->updatedata($data, $id);
        return redirect()->to(base_url('/managemedsos'));
    }
}
