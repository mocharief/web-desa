<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratjualbeliModel extends Model
{
    protected $table = 'surat_jualbeli';
    protected $primaryKey = 'id_jualbeli';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_jualbeli')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_jualbeli')
                ->where('id_jualbeli', $id)
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
        return $this->db->table($this->table)->update($data, ['id_jualbeli' => $id]);
    }
    public function updatedata2($data3, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data3, ['id_permohonan' => $id_permohonan]);
    }
}
