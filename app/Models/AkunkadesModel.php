<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunkadesModel extends Model
{
    protected $table = 'tweb_kades';
    protected $primaryKey = 'id_kades';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('tweb_kades')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('tweb_kades')
                ->where('id_kades', $id)
                ->get()
                ->getRowArray();
        }
    }


    public function view($id_kades, $kode_desa)
    {
        $this->select('*');
        $this->where('id_kades', $id_kades);
        $this->where('kddesa', $kode_desa);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function viewkades($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function totalkades($kddesa)
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
        return $this->db->table($this->table)->update($data, ['id_kades' => $id]);
    }
}
