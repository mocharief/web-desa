<?php

namespace App\Models;

use CodeIgniter\Model;

class PersyaratanModel extends Model
{
    protected $table = 'syarat_surat';
    protected $primaryKey = 'ref_syarat_id';




    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('syarat_surat')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('syarat_surat')
                ->where('ref_syarat_id', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function view($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['ref_syarat_id' => $id]);
    }
}
