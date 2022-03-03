<?php

namespace App\Models;

use CodeIgniter\Model;

class RwModel extends Model
{
    protected $table = 'rw';
    protected $primaryKey = 'id_rw';
    protected $allowedFields = ['id_rw', 'rw'];

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('rw')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('rw')
                ->where('id_rw', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($id, $kddesa)
    {
        $this->select('*');
        $this->where('id_dusun', $id);
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    function getrw($id_dusun)
    {
        $this->select('*');
        $this->where('id_dusun', $id_dusun);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_rw' => $id]);
    }
}
