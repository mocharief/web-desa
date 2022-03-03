<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\HubunganModel;
use App\Models\AgamaModel;
use App\Models\PendidikankkModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\GolonganModel;
use App\Models\DusunModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\KkModel;
use App\Models\IdentitasModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\PendaftarModel;

class Kk extends BaseController
{

    protected $pesanModel;
    protected $permohonanModel;
    protected $pendudukModel;
    protected $hubunganModel;
    protected $agamaModel;
    protected $pendidikankkModel;
    protected $pendidikanModel;
    protected $pekerjaanModel;
    protected $golonganModel;
    protected $dusunModel;
    protected $rwModel;
    protected $rtModel;
    protected $kkModel;
    protected $identitasModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->hubunganModel = new HubunganModel();
        $this->pendudukModel = new PendudukModel();
        $this->agamaModel = new AgamaModel();
        $this->pendidikankkModel = new PendidikankkModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->golonganModel = new GolonganModel();
        $this->dusunModel = new DusunModel();
        $this->rwModel = new RwModel();
        $this->rtModel = new RtModel();
        $this->kkModel = new KkModel();
        $this->identitasModel = new IdentitasModel();
        $this->pendaftarModel = new PendaftarModel();
        helper('form');
    }
    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $db = \Config\Database::connect();
        $kk = $this->kkModel->view($kddesa);
        $kode = $this->kkModel->kode();
        $penduduk = $this->pendudukModel->viewpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'kk' => $kk,
            'db' => $db,
            'kode' => $kode,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/kk/kk', $data);
    }
    function action()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'getrw') {
                $rwModel = new RwModel();

                $rw = $rwModel->where('id_dusun', $this->request->getVar('id_dusun'))->findAll();

                echo json_encode($rw);
            }

            if ($action == 'getrt') {
                $rtModel = new RtModel();
                $rt = $rtModel->where('id_rw', $this->request->getVar('id_rw'))->findAll();

                echo json_encode($rt);
            }
        }
    }

    // Kecamatan

    public function simpan()
    {

        $id_kk = $this->request->getPost('id_kk');
        $id = $this->request->getPost('nama');
        $no_kk = $this->request->getPost('no_kk');
        $kddesa = $this->request->getPost('kddesa');
        $data = [
            'id_kk' => $id_kk,
            'id' => $id,
            'no_kk' => $no_kk,
            'kddesa' => $kddesa,

        ];
        $data1 = [
            'id_kk' => $id_kk,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->kkModel->simpan($data);
        $simpan = $this->pendudukModel->updatedata1($data1, $id);
        return redirect()->to(base_url('/managekeluarga'));
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
        $kk = $this->kkModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'kk' => $kk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/kk/editkk', $data);
    }
    public function update($id)
    {

        $no_kk = $this->request->getPost('no_kk');

        $data = [

            'no_kk' => $no_kk,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->kkModel->updatedata($data, $id);
        return redirect()->to(base_url('/managekeluarga'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }

        $id_kk = $this->request->getPost('id_kk');

        $data = [
            'id_kk' => 0,
        ];
        $this->kkModel->delete($id);
        $this->pendudukModel->updatekk($data, $id_kk);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managekeluarga'));
    }

    public function viewkeluarga($id)
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
        $kk = $this->kkModel->find($id);
        $hubungan = $this->hubunganModel->findAll();
        $keluarga = $this->pendudukModel->viewkeluarga($id, $kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'keluarga' => $keluarga,
            'hubungan' => $hubungan,
            'kk' => $kk,
            'db' => $db,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];

        return view('admin/kk/anggota/anggota', $data);
    }


    public function simpankeluarga()
    {


        $id_kk = $this->request->getPost('id_kk');
        $hubungan = $this->request->getPost('hubungan');
        $id = $this->request->getPost('nama');

        $data = [

            'id_kk' => $id_kk,
            'kk_level' => $hubungan,
            'id' => $id,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pendudukModel->updatedata($data, $id);
        return redirect()->to(base_url('viewkeluarga/' . $id_kk));
    }
    public function deletekeluarga($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $id = $this->request->getPost('id');
        $id_kk = $this->request->getPost('id_kk');
        $update = $this->pendudukModel->updatekeluarga($id_kk, $kddesa);
        if ($update) {
            $data = [
                'id_kk' => 0,
            ];

            $this->pendudukModel->updatedata($data, $id);

            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to(base_url('viewkeluarga/' . $id_kk));
        }
    }
    public function viewkk($id)
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
        $kk = $this->kkModel->find($id);
        $hubungan = $this->hubunganModel->findAll();
        $keluarga = $this->pendudukModel->viewkeluarga($id, $kddesa);
        $identitas = $this->identitasModel->view($kddesa);
        $agama = $this->agamaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $pendidikankk = $this->pendidikankkModel->findAll();
        $pekerjaan = $this->pekerjaanModel->findAll();
        $golongan = $this->golonganModel->findAll();
        $alamat = $this->pendudukModel->viewalamat($id);
        $db = \Config\Database::connect();
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'identitas' => $identitas,
            'keluarga' => $keluarga,
            'hubungan' => $hubungan,
            'kk' => $kk,
            'db' => $db,
            'agama' => $agama,
            'alamat' => $alamat,
            'pendidikan' => $pendidikan,
            'pendidikankk' => $pendidikankk,
            'pekerjaan' => $pekerjaan,
            'golongan' => $golongan,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/kk/anggota/kartukeluarga', $data);
    }
}
