<?php

namespace App\Models;

use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesanmasuk';
    protected $primaryKey = 'id_pesan';

    public function getpesan($id = false)
    {
        if ($id === false) {
            return $this->table('pesanmasuk')
                ->orderBy('id_pesan', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pesanmasuk')
                ->orderBy('id_pesan', 'DESC')
                ->where('id_pesan', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view($kddesa)
    {
        $this->select('pesanmasuk.*, penduduk.nama, penduduk.nik');
        $this->join('penduduk', 'penduduk.id = pesanmasuk.id');
        $this->where('pesanmasuk.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewpesan($kddesa)
    {
        $this->select('*');
        $this->where('status', '0');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }

    public function viewpesanuser($id)
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
        return $this->db->table($this->table)->update($data, ['id_pesan' => $id]);
    }
    public function updatestatus($data1, $id)
    {
        return $this->db->table($this->table)->update($data1, ['id_pesan' => $id]);
    }
}
