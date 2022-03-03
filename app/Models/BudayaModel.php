<?php

namespace App\Models;

use CodeIgniter\Model;

class BudayaModel extends Model
{
    protected $table = 'budaya';
    protected $primaryKey = 'id_budaya';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('budaya')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('budaya')
                ->where('id_budaya', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view()
    {
        $this->select('*');
        $this->limit('12');
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewbudaya($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function totalbudaya($kddesa)
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
        return $this->db->table($this->table)->update($data, ['id_budaya' => $id]);
    }

    public function viewBudayaWithKat($kddesa, $id = false)
    {
        if ($id === false) {
            $this->select('budaya.*, kat_budaya.kategori');
            $this->join('kat_budaya', 'budaya.id_kat = kat_budaya.id_kat');
            $this->where('budaya.kddesa', $kddesa);
            $query = $this->get();
            return $query->getResultArray();
        } else {
            $this->select('budaya.*, kat_budaya.kategori');
            $this->join('kat_budaya', 'budaya.id_kat = kat_budaya.id_kat');
            $this->where('budaya.kddesa', $kddesa);
            $this->where('budaya.id_budaya !=', $id);
            $query = $this->get();
            return $query->getResultArray();
        }
    }

    public function getDataWithKat($id)
    {
        $this->select('budaya.*, kat_budaya.kategori');
        $this->join('kat_budaya', 'budaya.id_kat = kat_budaya.id_kat');
        $this->where('budaya.id_budaya', $id);
        $query = $this->get();
        return $query->getRowArray();
    }
}
