<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratwalihakimModel extends Model
{
    protected $table = 'surat_walihakim';
    protected $primaryKey = 'id_walihakim';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_walihakim')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_walihakim')
                ->where('id_walihakim', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function hapusdata($idpermohonan)
    {

        return $this->db->table($this->table)->delete(['id_permohonan' => $idpermohonan]);
    }

    public function simpan($data1)
    {
        return $this->db->table($this->table)->insert($data1);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_surat' => $id]);
    }
    public function updatedata2($data6, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data6, ['id_permohonan' => $id_permohonan]);
    }
}
