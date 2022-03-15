<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratceraiModel extends Model
{
    protected $table = 'surat_cerai';
    protected $primaryKey = 'id_cerai';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_cerai')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_cerai')
                ->where('id_cerai', $id)
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
