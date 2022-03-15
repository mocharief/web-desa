<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratkepemilikantanahModel extends Model
{
    protected $table = 'surat_miliktanah';
    protected $primaryKey = 'id_miliktanah';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_miliktanah')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_miliktanah')
                ->where('id_miliktanah', $id)
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
