<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturansuratModel extends Model
{
    protected $table = 'surat_format';
    protected $primaryKey = 'id_format_surat';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_format')
                ->orderBy('id_format_surat', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_format')
                ->orderBy('id_format_surat', 'DESC')
                ->where('id_format_surat', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function viewfavorit()
    {
        $this->select('*');
        $this->where('favorit', 1);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function view()
    {
        $this->select('*');
        $this->where('favorit', 0);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function viewlayanan($kddesa)
    {
        $this->select('*');
        $this->where('mandiri', 1);
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewpengaturan($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_format_surat' => $id]);
    }
}
