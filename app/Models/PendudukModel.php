<?php

namespace App\Models;

use CodeIgniter\Model;


class PendudukModel extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'nik',
        'id_kk',
        'kk_level',
        'sex',
        'tempatlahir',
        'tanggallahir',
        'id_dusun',
        'id_rw',
        'id_rt',
        'agama_id',
        'id_pendidikan_kk',
        'id_pekerjaan',
        'status_kawin',
        'warganegara_id',
        'dokumen_pasport',
        'dokumen_kitas',
        'ayah_nik',
        'ibu_nik',
        'nama_ayah',
        'nama_ibu',
        'foto',
        'id_golongan',
        'id_cluster',
        'status',
        'alamat_sebelumnya',
        'alamat_sekarang',
        'status_dasar',
        'hamil',
        'cacat_id',
        'sakit_menahun_id',
        'akta_lahir',
        'akta_perkawinan',
        'tanggalperkawinan',
        'akta_perceraian',
        'tanggalperceraian',
        'cara_kb_id',
        'telepon',
        'tanggal_akhir_paspor',
        'no_kk_sebelumnya',
        'ktp_el',
        'status_rekam',
        'waktu_lahir',
        'tempat_dilahirkan',
        'jenis_kelahiran',
        'kelahiran_anak_ke',
        'penolong_kelahiran',
        'berat_lahir',
        'email',
    ];


    public function getdata($id = false)
    {
        if ($id === false) {
            return $this->table('penduduk')
                ->orderBy('id', 'DESC')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('penduduk')
                ->orderBy('id', 'DESC')
                ->where('id', $id)
                ->get()
                ->getRowArray();
        }
    }

    public function view($kddesa)
    {

        $this->select('penduduk.*, dusun.namadusun, rw.rw, rt.rt, pendidikan_kk.nama_pendidikan_kk, pekerjaan.nama_pekerjaan');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->join('pendidikan_kk', 'pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk');
        $this->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.id_pekerjaan');
        $this->where('penduduk.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function totalpenduduk($kddesa)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $query = $this->countAllResults();
        return $query;
    }
    public function viewpenduduk($kddesa)
    {

        $this->select('penduduk.*,  kk.no_kk');
        $this->join('kk', 'kk.id_kk = penduduk.id_kk');
        $this->where('penduduk.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function daftarpenduduk($kddesa)
    {

        $this->select('*');
        $this->where('kddesa', $kddesa);
        $this->where('status_dasar', 1);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function viewkeluarga($id, $kddesa)
    {
        $this->select('*');
        $this->where('id_kk', $id);
        $this->where('kddesa', $kddesa);
        $this->orderBy('kk_level', 'ASC');
        $query = $this->get();
        return $query->getResultArray();
    }
    public function updatekeluarga($id_kk, $kddesa)
    {
        $this->select('*');
        $this->where('id_kk', $id_kk);
        $this->where('kddesa', $kddesa);
        $query = $this->get();
        return $query->getRowArray();
    }
    public function viewalamat($id)
    {
        $this->select('penduduk.*, dusun.namadusun, rw.rw, rt.rt');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->where('penduduk.id_kk', $id);
        $query = $this->get();
        return $query->getRowArray();
    }

    public function viewdata($id)
    {

        $this->select('*');
        $this->where('id', $id);
        $query = $this->get();
        return $query->getResultArray();
    }

    public function user($id)
    {

        $this->select('penduduk.*, dusun.*, rw.*, rt.*, pendidikan_kk.*, pekerjaan.*, kk.*, hubungan.*, agama.*, pendidikan.*, golongan_darah.*');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->join('pendidikan_kk', 'pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk');
        $this->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.id_pekerjaan');
        $this->join('kk', 'kk.id_kk = penduduk.id_kk');
        $this->join('hubungan', 'hubungan.id_hubungan = penduduk.kk_level');
        $this->join('agama', 'agama.agama_id = penduduk.agama_id');
        $this->join('pendidikan', 'pendidikan.id_pendidikan = penduduk.pendidikan_sedang_id');
        $this->join('golongan_darah', 'golongan_darah.id_golongan = penduduk.id_golongan');
        $this->where('penduduk.id', $id);
        $query = $this->get();
        return $query->getRowArray();
    }
    public function cetaksemua($kddesa)
    {

        $this->select('penduduk.*, dusun.*, rw.*, rt.*, pendidikan_kk.*, pekerjaan.*, kk.*, hubungan.*, agama.*, pendidikan.*, golongan_darah.*');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->join('pendidikan_kk', 'pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk');
        $this->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.id_pekerjaan');
        $this->join('kk', 'kk.id_kk = penduduk.id_kk');
        $this->join('hubungan', 'hubungan.id_hubungan = penduduk.kk_level');
        $this->join('agama', 'agama.agama_id = penduduk.agama_id');
        $this->join('pendidikan', 'pendidikan.id_pendidikan = penduduk.pendidikan_sedang_id');
        $this->join('golongan_darah', 'golongan_darah.id_golongan = penduduk.id_golongan');
        $this->where('penduduk.kddesa', $kddesa);
        $query = $this->get();
        return $query->getResultArray();
    }
    public function cetak($id)
    {

        $this->select('penduduk.*, dusun.*, rw.*, rt.*, pendidikan_kk.*, pekerjaan.*, kk.*, hubungan.*, agama.*, pendidikan.*, golongan_darah.*');
        $this->join('dusun', 'dusun.id_dusun = penduduk.id_dusun');
        $this->join('rw', 'rw.id_rw = penduduk.id_rw');
        $this->join('rt', 'rt.id_rt = penduduk.id_rt');
        $this->join('pendidikan_kk', 'pendidikan_kk.id_pendidikan_kk = penduduk.id_pendidikan_kk');
        $this->join('pekerjaan', 'pekerjaan.id_pekerjaan = penduduk.id_pekerjaan');
        $this->join('kk', 'kk.id_kk = penduduk.id_kk');
        $this->join('hubungan', 'hubungan.id_hubungan = penduduk.kk_level');
        $this->join('agama', 'agama.agama_id = penduduk.agama_id');
        $this->join('pendidikan', 'pendidikan.id_pendidikan = penduduk.pendidikan_sedang_id');
        $this->join('golongan_darah', 'golongan_darah.id_golongan = penduduk.id_golongan');
        $this->where('penduduk.id', $id);
        $query = $this->get();
        return $query->getRowArray();
    }


    public function jumlahkeluarga($kddesa, $id_kk)
    {
        $this->select('*');
        $this->where('kddesa', $kddesa);
        $this->where('id_kk', $id_kk);
        $query = $this->countAllResults();
        return $query;
    }


    public function simpan($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatedata($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function updatedata1($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id' => $id]);
    }

    public function updatedata2($data, $nama)
    {
        return $this->db->table($this->table)->update($data, ['id' => $nama]);
    }
    public function updatekk($data, $id_kk)
    {

        return $this->db->table($this->table)->update($data, ['id_kk' => $id_kk]);
    }

    public function updatestatus($data, $iduser)
    {

        return $this->db->table($this->table)->update($data, ['id' => $iduser]);
    }
}
