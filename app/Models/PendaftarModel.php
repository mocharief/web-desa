<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    protected $allowedFields = ['id_pendaftar', 'id', 'nik'];


    public function getUser($id = false)
    {
        if ($id === false) {
            return $this->table('pendaftar')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pendaftar')
                ->where('id_pendaftar', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($kddesa)
    {
        $this->select('pendaftar.*, penduduk.nama, penduduk.nik');
        $this->join('penduduk', 'penduduk.id = pendaftar.id');
        $this->where('pendaftar.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewpendaftar($id)
    {
        $this->select('*');
        $this->where('id', $id);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function totalpendaftar($kddesa)
    {
        $this->select('*');
        $this->where('status', '0');
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
        return $this->db->table($this->table)->update($data, ['id_pendaftar' => $id]);
    }
    public function updatedata1($data1, $id)
    {
        return $this->db->table($this->table)->update($data1, ['id_pendaftar' => $id]);
    }
}
