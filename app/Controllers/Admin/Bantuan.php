<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BantuanModel;
use App\Models\PenerimaModel;
use App\Models\PendudukModel;
use App\Models\UmkmModel;
use App\Models\KkModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Bantuan extends BaseController
{

    protected $pendaftarModel;
    protected $bantuanModel;
    protected $penerimaModel;
    protected $pendudukModel;
    protected $umkmModel;
    protected $kkModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;

    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->bantuanModel = new BantuanModel();
        $this->penerimaModel = new PenerimaModel();
        $this->pendudukModel = new PendudukModel();
        $this->umkmModel = new UmkmModel();
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

        $bantuan = $this->bantuanModel->viewbantuan($kddesa);
        $db = \Config\Database::connect();
        $logo = $this->identitasModel->view($kddesa);

        $data = [
            'db' => $db,
            'bantuan' => $bantuan,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,

            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];
        return view('admin/bantuan/bantuan', $data);
    }
    public function tambah()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        session();
        $identitas = $this->identitasModel->findall();
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'identitas' => $identitas,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/bantuan/tambahbantuan', $data);
    }


    public function simpan()
    {
        if (!$this->validate([

            'sasaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'namaprogram' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'asaldana' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ], 'tgl1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ], 'tgl2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/tambahbantuan'))->withInput()->with('validation', $validation);
        }

        $sasaran = $this->request->getPost('sasaran');
        $namaprogram = $this->request->getPost('namaprogram');
        $keterangan = $this->request->getPost('keterangan');
        $asaldana = $this->request->getPost('asaldana');
        $tgl1 = $this->request->getPost('tgl1');
        $tgl2 = $this->request->getPost('tgl2');
        $status = $this->request->getPost('status');
        $kddesa = $this->request->getPost('kddesa');
        $data = [

            'sasaran' => $sasaran,
            'nama_program' => $namaprogram,
            'keterangan' => $keterangan,
            'asaldana' => $asaldana,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'status' => $status,
            'kddesa' => $kddesa,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->bantuanModel->simpan($data);
        return redirect()->to(base_url('/managebantuan'));
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
        $identitas = $this->identitasModel->findall();
        $bantuan = $this->bantuanModel->find($id);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'bantuan' => $bantuan,
            'identitas' => $identitas,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/bantuan/editbantuan', $data);
    }
    public function update($id)
    {

        $sasaran = $this->request->getPost('namalama');
        $namaprogram = $this->request->getPost('namaprogram');
        $keterangan = $this->request->getPost('keterangan');
        $asaldana = $this->request->getPost('asaldana');
        $tgl1 = $this->request->getPost('tgl1');
        $tgl2 = $this->request->getPost('tgl2');
        $status = $this->request->getPost('status');
        $data = [

            'sasaran' => $sasaran,
            'nama_program' => $namaprogram,
            'keterangan' => $keterangan,
            'asaldana' => $asaldana,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
            'status' => $status,


        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->bantuanModel->updatedata($data, $id);
        return redirect()->to(base_url('/managebantuan'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        $id_program = $this->request->getPost('id_program');
        $data = $this->penerimaModel->hapusdata($id_program);
        $this->bantuanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managebantuan'));
    }

    public function viewpenerima($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $bantuan = $this->bantuanModel->find($id);
        $penerima = $this->penerimaModel->view($id, $kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'bantuan' => $bantuan,
            'penerima' => $penerima,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/bantuan/penerima/penerima', $data);
    }
    public function tambahpenerima($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kk = $this->kkModel->view($kddesa);
        $umkm = $this->umkmModel->viewpenerima($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $bantuan = $this->bantuanModel->find($id);
        $penerima = $this->penerimaModel->view($id, $kddesa);
        $identitas = $this->identitasModel->findall();
        $logo = $this->identitasModel->view($kddesa);
        $db = \Config\Database::connect();
        $data = [
            'bantuan' => $bantuan,
            'penduduk' => $penduduk,
            'penerima' => $penerima,
            'kk' => $kk,
            'umkm' => $umkm,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'identitas' => $identitas,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'db' => $db,
            'kddesa' => $kddesa,
        ];

        return view('admin/bantuan/penerima/tambahpenerima', $data);
    }


    public function simpanpenerima()
    {


        $id_program = $this->request->getPost('id_program');
        $nama = $this->request->getPost('nama');
        $no_peserta = $this->request->getPost('no_peserta');
        $kddesa = $this->request->getPost('kddesa');
        $gambar = $this->request->getFile('gambar');

        if ($gambar->getError() == 4) {

            $namagambar = "";
        } else {
            $namagambar = $gambar->getName();
            $gambar->move('public/admin/images/penerima/' . $kddesa . '/', $namagambar);
        }


        $data = [
            'no_peserta' => $no_peserta,
            'id_program' => $id_program,
            'id' => $nama,
            'foto' => $namagambar,
            'kddesa' => $kddesa,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->penerimaModel->simpan($data);
        return redirect()->to(base_url('viewpenerima/' . $id_program));
    }
    public function editpenerima($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $kk = $this->kkModel->view($kddesa);
        $umkm = $this->umkmModel->viewpenerima($kddesa);
        $penduduk = $this->pendudukModel->findAll();
        $bantuan = $this->bantuanModel->find($id);
        $penerima = $this->penerimaModel->edit($id);
        $identitas = $this->identitasModel->findall();
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'bantuan' => $bantuan,
            'penduduk' => $penduduk,
            'penerima' => $penerima,
            'kk' => $kk,
            'umkm' => $umkm,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'identitas' => $identitas,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,

        ];

        return view('admin/bantuan/penerima/editpenerima', $data);
    }
    public function updatepenerima($id)
    {

        $id_program = $this->request->getPost('id_program');

        $no_peserta = $this->request->getPost('no_peserta');
        $kddesa = $this->request->getPost('kddesa');
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {

            $namagambar = $this->request->getPost('namalama');
        } else {
            if ($this->request->getPost('namalama') == "") {
                $namagambar = $gambar->getName();
                $gambar->move('public/admin/images/penerima/' . $kddesa . '/', $namagambar);
            } else {
                $namagambar = $gambar->getName();
                $gambar->move('public/admin/images/penerima/' . $kddesa . '/', $namagambar);
                unlink('public/admin/images/penerima/' . $kddesa . '/' . $this->request->getPost('namalama'));
            }
        }
        $data = [
            'id_program' => $id_program,
            'no_peserta' => $no_peserta,

            'foto' => $namagambar,



        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->penerimaModel->updatedata($data, $id);
        return redirect()->to(base_url('viewpenerima/' . $id_program));
    }
 

    public function deletepenerima($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $penerima = $this->penerimaModel->find($id);

        if ($penerima['foto'] != "") {
            unlink('public/admin/images/penerima/' . $penerima['kddesa'] . '/' . $penerima['foto']);
        }

        $id_program = $this->request->getPost('id_program');
        $this->penerimaModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('viewpenerima/' . $id_program));
    }
}
