<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratjamkesosModel extends Model
{
    protected $table = 'surat_jamkesos';
    protected $primaryKey = 'id_jamkesos';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_jamkesos')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_jamkesos')
                ->where('id_jamkesos', $id)
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
