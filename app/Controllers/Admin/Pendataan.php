<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendataanModel;
use App\Models\PendudukModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Pendataan extends BaseController
{

    protected $pendaftarModel;
    protected $pendataanModel;
    protected $pendudukModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;

    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pendataanModel = new PendataanModel();
        $this->pendudukModel = new PendudukModel();
        $this->identitasModel = new IdentitasModel();
        $this->pendaftarModel = new PendaftarModel();
    }
    public function index()
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
        $pendataan = $this->pendataanModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendataan' => $pendataan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/pendataan/pendataan', $data);
    }
    public function tambah()
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
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/pendataan/tambahpendataan', $data);
    }


    public function simpan()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'asal_mudik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'tgl_tiba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'tujuan_mudik' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'durasi_mudik' => [
                'rules' => 'max_length[3]|numeric',
                'errors' => [
                    'min_length' => '* Max 3 Digit Angka',
                    'numeric' => '* Harus Berupa Angka'

                ]
            ],
            'status_covid' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'wajib_pantau' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'no_hp' => [
                'rules' => 'max_length[16]|numeric',
                'errors' => [
                    'min_length' => '* Max 16 Angka',
                    'numeric' => '* Harus Berupa Angka'

                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/tambahpemudik'))->withInput()->with('validation', $validation);
        }

        $nama = $this->request->getPost('nama');
        $asal_mudik = $this->request->getPost('asal_mudik');
        $tgl_tiba = $this->request->getPost('tgl_tiba');
        $tujuan_mudik = $this->request->getPost('tujuan_mudik');
        $durasi_mudik = $this->request->getPost('durasi_mudik');
        $no_hp = $this->request->getPost('no_hp');
        $email = $this->request->getPost('email');
        $status_covid = $this->request->getPost('status_covid');
        $wajib_pantau = $this->request->getPost('wajib_pantau');
        $keluhan = $this->request->getPost('keluhan');
        $keterangan = $this->request->getPost('keterangan');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id' => $nama,
            'asal_mudik' => $asal_mudik,
            'tgl_datang' => $tgl_tiba,
            'tujuan_mudik' => $tujuan_mudik,
            'durasi_mudik' => $durasi_mudik,
            'no_hp' => $no_hp,
            'email_penduduk' => $email,
            'status_covid' => $status_covid,
            'wajib_pantau' => $wajib_pantau,
            'keluhan_kesehatan' => $keluhan,
            'keterangan' => $keterangan,
            'kddesa' => $kddesa,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pendataanModel->simpan($data);
        return redirect()->to(base_url('/managependataan'));
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
        $penduduk = $this->pendataanModel->view($kddesa);
        $pendataan = $this->pendataanModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'penduduk' => $penduduk,
            'pendataan' => $pendataan,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/pendataan/editpendataan', $data);
    }
    public function update($id)
    {

        $nama = $this->request->getPost('namalama');
        $asal_mudik = $this->request->getPost('asal_mudik');
        $tgl_tiba = $this->request->getPost('tgl_tiba');
        $tujuan_mudik = $this->request->getPost('tujuan_mudik');
        $durasi_mudik = $this->request->getPost('durasi_mudik');
        $no_hp = $this->request->getPost('no_hp');
        $email = $this->request->getPost('email');
        $status_covid = $this->request->getPost('status_covid');
        $wajib_pantau = $this->request->getPost('wajib_pantau');
        $keluhan = $this->request->getPost('keluhan');
        $keterangan = $this->request->getPost('keterangan');
        $data = [

            'asal_mudik' => $asal_mudik,
            'tgl_datang' => $tgl_tiba,
            'tujuan_mudik' => $tujuan_mudik,
            'durasi_mudik' => $durasi_mudik,
            'no_hp' => $no_hp,
            'email_penduduk' => $email,
            'status_covid' => $status_covid,
            'wajib_pantau' => $wajib_pantau,
            'keluhan_kesehatan' => $keluhan,
            'keterangan' => $keterangan,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->pendataanModel->updatedata($data, $id);
        return redirect()->to(base_url('/managependataan'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }


        $this->pendataanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managependataan'));
    }
}
