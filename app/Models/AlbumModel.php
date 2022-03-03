<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table = 'album';
    protected $primaryKey = 'id_album';
    protected $allowedFields = [
        'id_galery',
        'id',
        'foto',
        'judul'
    ];



    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('album')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('album')
                ->where('id_album', $id)
                ->get()
                ->getRowArray();
        }
    }
    public function totalgaleri($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function viewalbum($kddesa)
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
}
