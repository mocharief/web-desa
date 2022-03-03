<?php

namespace App\Models;

use CodeIgniter\Model;

class KatumkmModel extends Model
{
    protected $table = 'kat_umkm';
    protected $primaryKey = 'id_kat';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('kat_umkm')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('kat_umkm')
                ->where('id_kat', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function kat($kddesa)
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
        return $this->db->table($this->table)->update($data, ['id_kat' => $id]);
    }
}
