<?php

namespace App\Models;

use CodeIgniter\Model;

class SuratmilikkendaraanModel extends Model
{
    protected $table = 'surat_milikkendaraan';
    protected $primaryKey = 'id_milikkendaraan';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('surat_milikkendaraan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('surat_milikkendaraan')
                ->where('id_milikkendaraan', $id)
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
