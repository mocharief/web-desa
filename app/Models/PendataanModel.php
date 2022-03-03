<?php

namespace App\Models;

use CodeIgniter\Model;

class PendataanModel extends Model
{
    protected $table = 'covid_pemudik';
    protected $primaryKey = 'id_terdata';


    public function getrequest($id = false)
    {
        if ($id === false) {
            return $this->table('covid_pemudik')
                ->orderBy('id_terdata', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('covid_pemudik')
                ->orderBy('id_terdata', 'DESC')
                ->where('id_terdata', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($kddesa)
    {
        $this->select('covid_pemudik.*, penduduk.*');
        $this->join('penduduk', 'penduduk.id = covid_pemudik.id');
        $this->where('covid_pemudik.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewpemantauan($kddesa)
    {
        $this->select('covid_pemudik.*, penduduk.nama, penduduk.nik');
        $this->join('penduduk', 'penduduk.id = covid_pemudik.id');
        $this->where('covid_pemudik.wajib_pantau', 1);
        $this->where('covid_pemudik.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    function getdata($id)
    {

        $this->select('*');
        $this->where('id', $id);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_terdata' => $id]);
    }
}
