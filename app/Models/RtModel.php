<?php

namespace App\Models;

use CodeIgniter\Model;

class RtModel extends Model
{
    protected $table = 'rt';
    protected $primaryKey = 'id_rt';
    protected $allowedFields = ['id_rt', 'rt'];
    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('rt')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('rt')
                ->where('id_rt', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($id)
    {
        $this->select('*');
        $this->where('id_rw', $id);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_rt' => $id]);
    }
}
