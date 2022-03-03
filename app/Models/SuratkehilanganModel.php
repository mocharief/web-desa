<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratkehilanganModel extends Model
{
    protected $table = 'surat_kehilangan';
    protected $primaryKey = 'id_kehilangan';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_kehilangan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_kehilangan')
                ->where('id_kehilangan', $id)
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
    public function updatedata2($data8, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data8, ['id_permohonan' => $id_permohonan]);
    }
}
