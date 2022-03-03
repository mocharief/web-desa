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
use App\Models\AkunModel;
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
    protected $akunModel;
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
        $this->akunModel = new AkunModel();
        $this->akunkadesModel = new AkunkadesModel();
    }
    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $id_users = $session->get('id_users');
        $logo = $this->identitasModel->view($kddesa);
        $akun = $this->akunModel->view($id_users, $kddesa);
        $akunkades = $this->akunkadesModel->viewkades($kddesa);
        $totalkades = $this->akunkadesModel->totalkades($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'akun' => $akun,
            'akunkades' => $akunkades,
            'totalkades' => $totalkades,
        ];
        return view('admin/user/user', $data);
    }


    public function edit($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $akun = $this->akunModel->find($id);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'akun' => $akun,
        ];

        return view('admin/user/edituser', $data);
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
        $simpan = $this->akunModel->updatedata($data, $id);
        return redirect()->to(base_url('/profiladmin'));
    }
    public function ubahpassword($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $akun = $this->akunModel->find($id);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'akun' => $akun,
        ];

        return view('admin/user/editpassword', $data);
    }

    public function updatepassword($id)
    {
        $session = session();
        $passwordlama = $this->request->getPost('passwordlama');
        $passwordbaru = $this->request->getPost('passwordbaru');
        $data =    $this->akunModel->find($id);
        if ($data) {
            if ($data['password'] == md5($passwordlama)) {
                $data = [
                    'password' => md5($passwordbaru),

                ];
                $this->akunModel->updatedata($data, $id);
                $session->setFlashdata('msg', 'Password Berhasil Dirubah');
                return redirect()->to(base_url('/profiladmin'));
            } else {
                $session->setFlashdata('msg', 'Password Tidak sesuai dengan Password Lama Anda');
                return redirect()->to(base_url('/ubahpassword/' . $id));
            }
        } else {
            $session->setFlashdata('msg', 'ID Anda Tidak Ditemukan');
            return redirect()->to(base_url('/ubahpassword/' . $id));
        }
    }
    public function tambahkades()
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
            'validation' => \Config\Services::validation()
        ];

        return view('admin/user/tambahkades', $data);
    }


    public function simpan()
    {
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|min_length[16]|numeric|is_unique[tweb_kades.nik]',
                'errors' => [
                    'is_unique' => '* Ada Data Yang Sama',
                    'required' => '* NIK Harus diisi',
                    'min_length' => '* NIK Harus 16 Angka',
                    'numeric' => '* NIK Harus Berupa Angka'
                ]

            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Nama Harus diisi',

                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[tweb_kades.username]',
                'errors' => [
                    'required' => '* Nama Harus diisi',

                ]
            ],
            'password' => [
                'rules' => 'required|is_unique[tweb_kades.password]',
                'errors' => [
                    'required' => '* Nama Harus diisi',
                    'is_unique' => '* Password Sering Digunakan',
                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/tambahkades'))->withInput()->with('validation', $validation);
        }

        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'nik' => $nik,
            'nama' => $nama,
            'username' => $username,
            'kddesa' => $kddesa,
            'password' => md5($password),

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->akunkadesModel->simpan($data);
        return redirect()->to(base_url('/profiladmin'));
    }

    public function deletekades($id)
    {

        $this->akunkadesModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/profiladmin'));
    }
}
