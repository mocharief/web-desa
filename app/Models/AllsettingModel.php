<?php

namespace App\Models;

use CodeIgniter\Model;

class AllsettingModel extends Model
{
    protected $table = 'allsetting';
    protected $primaryKey = 'kddesa';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('allsetting')
                ->orderBy('id_dokumen', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('allsetting')
                ->orderBy('kddesa', 'DESC')
                ->where('kddesa', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['kddesa' => $id]);
    }
}
