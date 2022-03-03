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
}
