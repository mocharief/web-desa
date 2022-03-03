<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id';

    public function getslider($id = false)
    {
        if ($id === false) {
            return $this->table('slider')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('slider')
                ->where('id', $id)
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

    public function updateslider($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
