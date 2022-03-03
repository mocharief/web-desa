<?php

namespace App\Models;

use CodeIgniter\Model;

class DusunModel extends Model
{
    protected $table = 'dusun';
    protected $primaryKey = 'id_dusun';
    protected $allowedFields = ['id_dusun', 'nama_dusun'];

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('dusun')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('dusun')
                ->where('id_dusun', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function totaldusun($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_dusun' => $id]);
    }
}
