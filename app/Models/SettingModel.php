<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'setting_web';
    protected $primaryKey = 'id_setting';

    public function getSetting($id = false)
    {
        if ($id === false) {
            return $this->table('setting_web')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('setting_web')
                ->where('id_setting', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function viewsetting($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function totalsetting($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_setting' => $id]);
    }
}
