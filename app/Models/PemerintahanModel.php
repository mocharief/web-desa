<?php

namespace App\Models;

use CodeIgniter\Model;


class PemerintahanModel extends Model
{
    protected $table = 'aparat';
    protected $primaryKey = 'pamong_id';


    public function getrequest($id = false)
    {
        if ($id === false) {
            return $this->table('aparat')
                ->orderBy('pamong_id', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('aparat')
                ->orderBy('pamong_id', 'DESC')
                ->where('pamong_id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function viewpemerintahan($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['pamong_id' => $id]);
    }
}
