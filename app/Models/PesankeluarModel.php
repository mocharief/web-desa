<?php

namespace App\Models;

use CodeIgniter\Model;

class PesankeluarModel extends Model
{
    protected $table = 'pesankeluar';
    protected $primaryKey = 'id_pesankeluar';

    public function getpesan($id = false)
    {
        if ($id === false) {
            return $this->table('pesankeluar')
                ->orderBy('id_pesankeluar', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pesankeluar')
                ->orderBy('id_pesankeluar', 'DESC')
                ->where('id_pesankeluar', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view()
    {
        $this->select('pesankeluar.*, penduduk.nama, penduduk.nik');
        $this->join('penduduk', 'penduduk.id = pesankeluar.id');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function viewpesan($id)
    {
        $this->select('*');
        $this->where('id', $id);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewpesanmasuk($id)
    {
        $this->select('*');
        $this->where('status', '0');
        $this->where('id', $id);
        $query = $this->countAllResults();
        return $query;
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function simpan1($data1)
    {
        return $this->db->table($this->table)->insert($data1);
    }
    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_pesankeluar' => $id]);
    }
    public function updatestatus($data1, $id)
    {
        return $this->db->table($this->table)->update($data1, ['id_pesankeluar' => $id]);
    }
}
