<?php

namespace App\Models;

use CodeIgniter\Model;

class GolonganModel extends Model
{
    protected $table = 'golongan_darah';
    protected $primaryKey = 'id_golongan';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('golongan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('golongan')
                ->where('id_golongan', $id)
                ->get()
                ->getRowArray();
        }
    }
}
