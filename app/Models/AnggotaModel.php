<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggotaumkm';
    protected $primaryKey = 'id_anggota';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('anggotaumkm')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('anggotaumkm')
                ->where('id_anggota', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($id, $kddesa)
    {
        $this->select('anggotaumkm.*, penduduk.nama, penduduk.nik,  penduduk.tempatlahir,  penduduk.tanggallahir, penduduk.sex, penduduk.alamat_sekarang');
        $this->join('penduduk', 'penduduk.id = anggotaumkm.id');
        $this->where('id_umkm', $id);
        $this->where('anggotaumkm.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_anggota' => $id]);
    }
}
