<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id_pendidikan';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('pendidikan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pendidikan')
                ->where('id_pendidikan', $id)
                ->get()
                ->getRowArray();
        }
    }
}
