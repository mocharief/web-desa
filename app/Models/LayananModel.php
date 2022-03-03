<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id';

    public function getLayanan($id = false)
    {
        if ($id === false) {
            return $this->table('layanan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('layanan')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatelayanan($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
