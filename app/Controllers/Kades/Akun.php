<?php

namespace App\Controllers\Kades;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\KatalbumModel;
use App\Models\GaleriModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;
use App\Models\AkunkadesModel;

class Akun extends BaseController
{


    protected $pendaftarModel;
    protected $albumModel;
    protected $galeriModel;
    protected $katalbumModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $akunkadesModel;

    public function __construct()

    {

        $this->identitasModel = new IdentitasModel();
        $this->albumModel = new AlbumModel();
        $this->galeriModel = new GaleriModel();
        $this->katalbumModel = new KatalbumModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->akunkadesModel = new AkunkadesModel();
    }
    public function index()
    {
        $session = session();
        $id_kades = $session->get('id_kades');
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $akun = $this->akunkadesModel->view($id_kades, $kddesa);
        $data = [

            'permohonan' => $permohonan,
            'logo' => $logo,
            'akun' => $akun,

        ];
        return view('kades/user/user', $data);
    }


    public function edit($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $akun = $this->akunkadesModel->find($id);
        $data = [

            'permohonan' => $permohonan,
            'logo' => $logo,
            'akun' => $akun,
        ];

        return view('kades/user/edituser', $data);
    }
    public function update($id)
    {

        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $data = [
            'username' => $username,
            'nama' => $nama,
            'nik' => $nik


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->akunkadesModel->updatedata($data, $id);
        return redirect()->to(base_url('/profilkades'));
    }
    public function ubahpassword($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
        $akun = $this->akunkadesModel->find($id);
        $data = [

            'permohonan' => $permohonan,
            'logo' => $logo,

            'akun' => $akun,
        ];

        return view('kades/user/editpassword', $data);
    }

    public function updatepassword($id)
    {
        $session = session();
        $passwordlama = $this->request->getPost('passwordlama');
        $passwordbaru = $this->request->getPost('passwordbaru');
        $data =    $this->akunkadesModel->find($id);
        if ($data) {
            if ($data['password'] == md5($passwordlama)) {
                $data = [
                    'password' => md5($passwordbaru),

                ];
                $this->akunkadesModel->updatedata($data, $id);
                $session->setFlashdata('msg', 'Password Berhasil Dirubah');
                return redirect()->to(base_url('/profilkades'));
            } else {
                $session->setFlashdata('msg', 'Password Tidak sesuai dengan Password Lama Anda');
                return redirect()->to(base_url('/ubahpasswordkades/' . $id));
            }
        } else {
            $session->setFlashdata('msg', 'ID Anda Tidak Ditemukan');
            return redirect()->to(base_url('/ubahpasswordkades/' . $id));
        }
    }

    public function privasi($id)
    {
        $session = session();

        $data = [
            'status' => 1,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->akunkadesModel->updatedata($data, $id);
        return redirect()->to(base_url('/profilkades'));
    }
}
