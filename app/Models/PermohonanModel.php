<?php

namespace App\Models;

use CodeIgniter\Model;

class PermohonanModel extends Model
{
    protected $table = 'permohonan_surat';
    protected $primaryKey = 'id_permohonan';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('permohonan_surat')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('permohonan_surat')
                ->where('id_permohonan', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function viewpermohonan()
    {
        $this->select('*');
        $this->where('status', '1');
        $query = $this->countAllResults();
        return $query;
    }

    public function viewpermohonanuser($id)
    {
        $this->select('permohonan_surat.*, surat_format.*');
        $this->join('surat_format', 'surat_format.id_format_surat = permohonan_surat.id_surat');
        $this->where('status', '3');
        $this->where('surat_format.mandiri', 1);
        $this->where('id', $id);
        $query = $this->countAllResults();
        return $query;
    }

    public function viewpermohonankades($kddesa)
    {
        $this->select('*');
        $this->where('status', '2');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function permohonan($kddesa)
    {
        $this->select('permohonan_surat.*, penduduk.nik, penduduk.nama, surat_format.*');
        $this->join('penduduk', 'penduduk.id = permohonan_surat.id');
        $this->join('surat_format', 'surat_format.id_format_surat = permohonan_surat.id_surat');
        $this->orderBy('id_permohonan', 'DESC');
        $this->where('permohonan_surat.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function permohonanuser($id)
    {
        $this->select('permohonan_surat.*, surat_format.*');
        $this->join('surat_format', 'surat_format.id_format_surat = permohonan_surat.id_surat');
        $this->where('id', $id);
        $this->where('surat_format.mandiri', 1);
        $this->orderBy('permohonan_surat.id_permohonan', 'DESC');
        $query = $this->get();
        return $query->getResultArray();
    }


    public function kode()
    {
        $this->selectCount('id_permohonan');
        $this->orderby('id_permohonan', 'ASC');
        $this->limit(1);
        $query = $this->get();
        $data = $query->getRow();
        $kode = intval($data->id_permohonan) + 1;

        $kodemax = str_pad($kode, 1, STR_PAD_LEFT);
        $kodejadi =  $kodemax;
        return $kodejadi;
    }


    public function datapermohonan($id)
    {
        $this->select('permohonan_surat.*, surat_format.*, penduduk.*');
        $this->join('surat_format', 'surat_format.id_format_surat = permohonan_surat.id_surat');
        $this->join('penduduk', 'penduduk.id = permohonan_surat.id');
        $this->where('permohonan_surat.id_permohonan', $id);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function approve($id)
    {
        $this->select('permohonan_surat.*, surat_format.*, penduduk.*, log_surat.*, dusun.*, rw.*, rt.*, pekerjaan.*, kk.*, agama.*,  golongan_darah.*,  pendidikan_kk.*');
        $this->join('surat_format', 'surat_format.id_format_surat = permohonan_surat.id_surat');
        $this->join('penduduk', 'penduduk.id = permohonan_surat.id');
        $this->join('log_surat', 'log_surat.id_permohonan = permohonan_surat.id_permohonan');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.id_pekerjaan');
        $this->join('kk', 'kk.id_kk = penduduk.id_kk');
        $this->join('agama', 'agama.agama_id = penduduk.agama_id');
        $this->join('golongan_darah', 'golongan_darah.id_golongan = penduduk.id_golongan');
        $this->join('pendidikan_kk', 'pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk');
        $this->where('permohonan_surat.id_permohonan', $id);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_permohonan' => $id]);
    }
}
