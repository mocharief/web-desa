<?php

namespace App\Models;

use CodeIgniter\Model;

class UmkmModel extends Model
{
    protected $table = 'umkm';
    protected $primaryKey = 'id_umkm';
    protected $allowedFields = [
        'id_umkm',
        'nama_umkm',
        'kode',


    ];

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('umkm')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('umkm')
                ->where('id_umkm', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function totalumkm($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function view($kddesa)
    {
        $this->select('umkm.*, penduduk.nama, kat_umkm.kategori');
        $this->join('penduduk', 'penduduk.id = umkm.id');
        $this->join('kat_umkm', 'kat_umkm.id_kat = umkm.id_kat');
        $this->where('umkm.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewpenerima($kddesa)
    {
        $this->select('umkm.*, penduduk.nama, penduduk.nik');
        $this->join('penduduk', 'penduduk.id = umkm.id');
        $this->where('umkm.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_umkm' => $id]);
    }
}
