<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id_dokumen';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('dokumen')
                ->orderBy('id_dokumen', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('dokumen')
                ->orderBy('id_dokumen', 'DESC')
                ->where('id_dokumen', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function viewdokumen($id)
    {
        $this->select('*');
        $this->where('id', $id);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function daftardokumen($id, $kddesa)
    {
        $this->select('dokumen.*, syarat_surat.*');
        $this->join('syarat_surat', 'syarat_surat.ref_syarat_id = dokumen.id_syarat');
        $this->where('dokumen.id', $id);
        $this->where('dokumen.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function dokumenpenduduk($kddesa)
    {
        $this->select('dokumen.*, penduduk.*');
        $this->join('penduduk', 'penduduk.id = dokumen.id');
        $this->where('penduduk.kddesa', $kddesa);
        $this->groupBy('dokumen.id');
        $query = $this->get();
        return $query->getResultArray();
    }


    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_dokumen' => $id]);
    }
}
