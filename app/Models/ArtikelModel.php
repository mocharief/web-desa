<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('artikel')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('artikel')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view()
    {
        $this->select('*');
        $this->limit('12');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function viewartikel($kddesa)
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
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function viewArtikelWithKat($kddesa, $kategori)
    {
        if (empty($kategori)) {
            $this->select('artikel.*, kat_artikel.kategori');
            $this->join('kat_artikel', 'kat_artikel.id_kat = artikel.id_kat');
            $this->where('artikel.kddesa', $kddesa);
            $query = $this->get();
            return $query->getResultArray();
        } else {
            $this->select('artikel.*, kat_artikel.kategori');
            $this->join('kat_artikel', 'kat_artikel.id_kat = artikel.id_kat');
            $this->where('artikel.kddesa', $kddesa);
            $this->where('kategori', $kategori);
            $query = $this->get();
            return $query->getResultArray();
        }
        
    }

    public function getDataWithKat($id)
    {
        $this->select('artikel.*, kat_artikel.kategori');
        $this->join('kat_artikel', 'kat_artikel.id_kat = artikel.id_kat');
        $this->where('artikel.id', $id);
        $query = $this->get();
        return $query->getRowArray();
    }
}
