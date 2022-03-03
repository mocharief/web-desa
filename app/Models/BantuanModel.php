<?php

namespace App\Models;

use CodeIgniter\Model;

class BantuanModel extends Model
{
    protected $table = 'bantuan';
    protected $primaryKey = 'id_program';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('bantuan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('bantuan')
                ->where('id_program', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function viewbantuan($kddesa)
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
        return $this->db->table($this->table)->update($data, ['id_program' => $id]);
    }
}
