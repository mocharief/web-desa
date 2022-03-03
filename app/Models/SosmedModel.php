<?php

namespace App\Models;

use CodeIgniter\Model;

class SosmedModel extends Model
{
    protected $table = 'sosmed';
    protected $primaryKey = 'id';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('sosmed')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('sosmed')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getRowArray();
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
