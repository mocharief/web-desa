<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratpengantarModel extends Model
{
    protected $table = 'surat_pengantar';
    protected $primaryKey = 'id_surat';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_pengantar')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_pengantar')
                ->where('id_surat', $id)
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
    public function updatedata2($data2, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data2, ['id_permohonan' => $id_permohonan]);
    }
}
