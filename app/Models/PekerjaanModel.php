<?php

namespace App\Models;

use CodeIgniter\Model;

class PekerjaanModel extends Model
{
    protected $table = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('pekerjaan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pekerjaan')
                ->where('id_pekerjaan', $id)
                ->get()
                ->getRowArray();
        }
    }
}
