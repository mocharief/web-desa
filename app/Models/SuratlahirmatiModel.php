<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratlahirmatiModel extends Model
{
    protected $table = 'surat_lahirmati';
    protected $primaryKey = 'id_lahirmati';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_lahirmati')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_lahirmati')
                ->where('id_lahirmati', $id)
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
    public function updatedata2($data11, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data11, ['id_permohonan' => $id_permohonan]);
    }
}
