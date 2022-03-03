<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\IdentitasModel;
use App\Models\PendataanModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\PendaftarModel;

class Identitas extends BaseController
{


    protected $identitasModel;
    protected $pendataanModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $pendaftarModel;

    public function __construct()

    {
        $this->pendaftarModel = new PendaftarModel();
        $this->identitasModel = new IdentitasModel();
        $this->pendataanModel = new PendataanModel();
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
    }
    public function identitas()
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [

            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
            'logo' => $logo,


        ];
        return view('admin/identitas/identitas', $data);
    }
    public function edit($id)
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $identitas = $this->identitasModel->find($id);
        $data = [
            'title' => 'Edit Identitas',
            'identitas' => $identitas,
            'logo' => $logo,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
        ];

        return view('admin/identitas/editidentitas', $data);
    }
    public function update($id)
    {

        $nama_desa = $this->request->getPost('nama_desa');
        $kode_desa = $this->request->getPost('kode_desa');
        $kode_pos = $this->request->getPost('kode_pos');
        $nama_kepala_desa = $this->request->getPost('nama_kepala_desa');
        $nip_kepala_desa = $this->request->getPost('nip_kepala_desa');
        $alamat_kantor = $this->request->getPost('alamat_kantor');
        $email_desa = $this->request->getPost('email_desa');
        $telepon = $this->request->getPost('telepon');
        $website = $this->request->getPost('website');
        $nama_kecamatan = $this->request->getPost('nama_kecamatan');
        $kode_kecamatan = $this->request->getPost('kode_kecamatan');
        $nama_kepala_camat = $this->request->getPost('nama_kepala_camat');
        $nip_kepala_camat = $this->request->getPost('nip_kepala_camat');
        $nama_kabupaten = $this->request->getPost('nama_kabupaten');
        $kode_kabupaten = $this->request->getPost('kode_kabupaten');
        $nama_propinsi = $this->request->getPost('nama_propinsi');
        $kode_propinsi = $this->request->getPost('kode_propinsi');
        $kddesa = $this->request->getPost('kddesa');

        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {

            $namagambar = $this->request->getPost('namalama');
        } else {
            if ($this->request->getPost('namalama') == "") {
                $namagambar = $gambar->getName();
                $gambar->move('public/admin/images/identitas', $namagambar);
            } else {
                $namagambar = $gambar->getName();
                $gambar->move('public/admin/images/identitas', $namagambar);
                unlink('public/admin/images/identitas/' . $this->request->getPost('namalama'));
            }
        }

        $gambar2 = $this->request->getFile('gambar2');
        if ($gambar2->getError() == 4) {

            $namagambar2 = $this->request->getPost('namalama2');
        } else {
            if ($this->request->getPost('namalama2') == "") {
                $namagambar2 = $gambar2->getName();
                $gambar2->move('public/admin/images/identitas' . $kddesa . '/', $namagambar2);
            } else {
                $namagambar2 = $gambar2->getName();
                $gambar->move('public/admin/images/identitas', $namagambar2);
                unlink('public/admin/images/identitas/' . $kddesa . '/' . $this->request->getPost('namalama2'));
            }
        }
        $data = [

            'nama_desa' => $nama_desa,
            'kode_desa' => $kode_desa,
            'kode_pos' => $kode_pos,
            'nama_kepala_desa' => $nama_kepala_desa,
            'nip_kepala_desa' => $nip_kepala_desa,
            'alamat_kantor' => $alamat_kantor,
            'email_desa' => $email_desa,
            'telepon' => $telepon,
            'website' => $website,
            'nama_kecamatan' => $nama_kecamatan,
            'kode_kecamatan' => $kode_kecamatan,
            'nama_kepala_camat' => $nama_kepala_camat,
            'nip_kepala_camat' => $nip_kepala_camat,
            'nama_kabupaten' => $nama_kabupaten,
            'kode_kabupaten' => $kode_kabupaten,
            'nama_propinsi' => $nama_propinsi,
            'kode_propinsi' => $kode_propinsi,
            'logo' => $namagambar,
            'kantor_desa' => $namagambar2,




        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->identitasModel->updatedata($data, $id);
        return redirect()->to(base_url('/manageidentitas'));
    }
}
