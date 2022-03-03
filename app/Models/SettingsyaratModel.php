<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsyaratModel extends Model
{
    protected $table = 'setting_syarat';
    protected $primaryKey = 'id_setting';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('setting_syarat')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('setting_syarat')
                ->where('id_setting', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function hapusdata($id_format_surat)
    {

        return $this->db->table($this->table)->delete(['id_surat' => $id_format_surat]);
    }

    public function view($id)
    {
        $this->select('*');
        $this->where('id_surat', $id);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data1)
    {
        return $this->db->table($this->table)->insert($data1);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_setting' => $id]);
    }
}
