<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'username',
        'email',
        'alamat',
        'paket',
        'no_hp',
        'status'

    ];

    public function getrequest($id = false)
    {
        if ($id === false) {
            return $this->table('request')
                ->orderBy('id', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('request')
                ->orderBy('id', 'DESC')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view_total()
    {
        $this->select('*');
        $this->where('status', '0');
        $query = $this->countAllResults();
        return $query;
    }

    public function view($username)
    {
        $this->select('*');
        $this->where('username', $username);
        $this->orderBy('id', 'DESC');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updaterequest($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
