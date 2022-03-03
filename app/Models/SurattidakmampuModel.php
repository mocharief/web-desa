<?php

namespace App\Models;

use CodeIgniter\Model;

class SurattidakmampuModel extends Model
{
    protected $table = 'surat_tidakmampu';
    protected $primaryKey = 'id_tidakmampu';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_tidakmampu')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_tidakmampu')
                ->where('id_tidakmampu', $id)
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
    public function updatedata2($data5, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data5, ['id_permohonan' => $id_permohonan]);
    }
}
