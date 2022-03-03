<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerimaModel extends Model
{
    protected $table = 'penerima';
    protected $primaryKey = 'id_penerima';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('penerima')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('penerima')
                ->where('id_penerima', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($id, $kkdesa)
    {
        $this->select('penerima.*, penduduk.nama, penduduk.nik,  penduduk.tempatlahir,  penduduk.tanggallahir, penduduk.sex, penduduk.alamat_sekarang');
        $this->join('penduduk', 'penduduk.id = penerima.id');
        $this->where('id_program', $id);
        $this->where('penerima.kddesa', $kkdesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function hapusdata($id_program)
    {

        return $this->db->table($this->table)->delete(['id_program' => $id_program]);
    }

    public function edit($id)
    {
        $this->select('penerima.*, bantuan.*');
        $this->join('bantuan', 'bantuan.id_program = penerima.id_program');
        $this->where('id_penerima', $id);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function viewpenerima($id)
    {
        $this->select('penerima.*, bantuan.*');
        $this->join('bantuan', 'bantuan.id_program = penerima.id_program');
        $this->where('penerima.id', $id);
        $this->where('bantuan.status', 1);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_penerima' => $id]);
    }
}
