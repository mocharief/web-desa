<?php

namespace App\Models;

use CodeIgniter\Model;

class KkModel extends Model
{
    protected $table = 'kk';
    protected $primaryKey = 'id_kk';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('kk')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('kk')
                ->where('id_kk', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view($kddesa)
    {
        $this->select('kk.*, penduduk.*,dusun.*,rw.*,rt.*');
        $this->join('penduduk', 'penduduk.id = kk.id');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->where('kk.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function cetaksemua($kddesa)
    {
        $this->select('kk.*, penduduk.*,dusun.*,rw.*,rt.*');
        $this->join('penduduk', 'penduduk.id = kk.id');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->where('kk.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function viewkk($id)
    {
        $this->select('kk.*, penduduk.nama');
        $this->join('penduduk', 'penduduk.id = kk.id');
        $this->where('kk.id_kk', $id);
        $query = $this->get();
        return $query->getResultArray();
    }

   
    public function totalkk($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function kode()
    {
        $this->selectCount('id_kk');
        $this->orderby('id_kk', 'ASC');
        $this->limit(1);
        $query = $this->get();
        $data = $query->getRow();
        $kode = intval($data->id_kk) + 1;

        $kodemax = str_pad($kode, 1, STR_PAD_LEFT);
        $kodejadi =  $kodemax;
        return $kodejadi;
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_kk' => $id]);
    }
}
