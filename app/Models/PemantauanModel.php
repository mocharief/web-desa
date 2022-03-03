<?php

namespace App\Models;

use CodeIgniter\Model;

class PemantauanModel extends Model
{
    protected $table = 'covid_pantau';
    protected $primaryKey = 'id_pantau';


    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('covid_pantau')
                ->orderBy('id_pantau', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('covid_pantau')
                ->orderBy('id_pantau', 'DESC')
                ->where('id_pantau', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view($kddesa)
    {
        $this->select('covid_pantau.*, penduduk.*');
        $this->join('penduduk', 'penduduk.id = covid_pantau.id');
        $this->where('covid_pantau.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
