<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratkeramaianModel extends Model
{
    protected $table = 'surat_izin_keramaian';
    protected $primaryKey = 'id_keramaian';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_izin_keramaian')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_izin_keramaian')
                ->where('id_keramaian', $id)
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
    public function updatedata2($data7, $id_permohonan)
    {
        return $this->db->table($this->table)->update($data7, ['id_permohonan' => $id_permohonan]);
    }
}
