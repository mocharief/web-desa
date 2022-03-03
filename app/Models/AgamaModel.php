<?php

namespace App\Models;

use CodeIgniter\Model;

class AgamaModel extends Model
{
    protected $table = 'agama';
    protected $primaryKey = 'agama_id';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('agama')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('agama')
                ->where('agama_id', $id)
                ->get()
                ->getRowArray();
        }
    }
}
