<?php

namespace App\Models;

use CodeIgniter\Model;

class TextModel extends Model
{
    protected $table = 'text_berjalan';
    protected $primaryKey = 'id';

    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('text_berjalan')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('text_berjalan')
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

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
