<?php

namespace App\Models;

use CodeIgniter\Model;

class HubunganModel extends Model
{
    protected $table = 'hubungan';
    protected $primaryKey = 'id_hubungan';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('hubungan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('hubungan')
                ->where('id_hubungan', $id)
                ->get()
                ->getRowArray();
        }
    }
}
