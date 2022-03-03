<?php

namespace App\Models;

use CodeIgniter\Model;

class GaleriModel extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';


    public function view($id, $kddesa)
    {
        $this->select('*');
        $this->where('id_album', $id);
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function getGaleri($id = false)
    {
        if ($id === false) {
            return $this->table('galeri')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('galeri')
                ->where('id_galeri', $id)
                ->get()
                ->getRowArray();
        }
    }


    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_galeri' => $id]);
    }
}
