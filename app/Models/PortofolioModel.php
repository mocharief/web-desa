<?php

namespace App\Models;

use CodeIgniter\Model;

class PortofolioModel extends Model
{
    protected $table = 'portofolio';
    protected $primaryKey = 'id';

    public function getportofolio($id = false)
    {
        if ($id === false) {
            return $this->table('portofolio')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('portofolio')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view()
    {
        $this->select('*');
        $this->limit('12');
        $query = $this->get();
        return $query->getResultArray();
    }

    public function portofolio($tipe)
    {
        $this->select('*');
        $this->where('tipe', $tipe);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateportofolio($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }
}
