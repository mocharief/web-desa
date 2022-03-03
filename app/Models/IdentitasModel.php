<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model
{
    protected $table = 'identitas';
    protected $primaryKey = 'id';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('identitas')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('identitas')
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


    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
