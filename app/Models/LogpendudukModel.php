<?php

namespace App\Models;

use CodeIgniter\Model;

class LogpendudukModel extends Model
{
    protected $table = 'log_penduduk';
    protected $primaryKey = 'id_log';


    public function getrequest($id = false)
    {
        if ($id === false) {
            return $this->table('log_penduduk')
                ->orderBy('id_log', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('log_penduduk')
                ->orderBy('id_log', 'DESC')
                ->where('id_log', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function simpan($data1)
    {
        return $this->db->table($this->table)->insert($data1);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_log' => $id]);
    }
}
