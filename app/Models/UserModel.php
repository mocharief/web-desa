<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';

    public function getUser($id = false)
    {
        if ($id === false) {
            return $this->table('admin')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('admin')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function login($username, $password)
    {
        $this->select('*');
        $this->where([
            'username'    => $username,
            'password'    => md5($password)
        ]);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateprofil($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
