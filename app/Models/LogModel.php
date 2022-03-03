<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table = 'log';
    protected $primaryKey = 'id';


    public function getrequest($id = false)
    {
        if ($id === false) {
            return $this->table('log')
                ->orderBy('id', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('log')
                ->orderBy('id', 'DESC')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }
   
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function deletedata($id)
    {
        return $this->db->table($this->table)->where(['id' => $id])->delete();
    }
}
