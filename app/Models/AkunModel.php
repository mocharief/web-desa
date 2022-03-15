<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'tweb_users';
    protected $primaryKey = 'id_users';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('tweb_users')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('tweb_users')
                ->where('id_users', $id)
                ->get()
                ->getRowArray();
        }
    }


    public function view($id_users, $kode_desa)
    {
        $this->select('*');
        $this->where('id_users', $id_users);
        $this->where('kddesa', $kode_desa);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_users' => $id]);
    }

    public function updatedata1($data1, $id_users)
    {
        return $this->db->table($this->table)->update($data1, ['id_users' => $id_users]);
    }
}
