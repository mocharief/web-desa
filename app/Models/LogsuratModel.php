<?php

namespace App\Models;

use CodeIgniter\Model;

class LogsuratModel extends Model
{
    protected $table = 'log_surat';
    protected $primaryKey = 'id_log';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('log_surat')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('log_surat')
                ->where('id_log', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function nomorsurat($id_format_surat)
    {
        $this->selectCount('no_surat');
        $this->orderby('no_surat', 'ASC');
        $this->where('id_format_surat', $id_format_surat);
        $this->limit(1);
        $query = $this->get();
        $data = $query->getRow();
        $kode = intval($data->no_surat) + 1;

        $kodemax = str_pad($kode, 1, STR_PAD_LEFT);
        $kodejadi =  $kodemax;
        return $kodejadi;
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
