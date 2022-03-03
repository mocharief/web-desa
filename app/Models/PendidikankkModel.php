<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikankkModel extends Model
{
    protected $table = 'pendidikan_kk';
    protected $primaryKey = 'id_pendidikan_kk';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('pendidikan_kk')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pendidikan_kk')
                ->where('id_pendidikan_kk', $id)
                ->get()
                ->getRowArray();
        }
    }
}
