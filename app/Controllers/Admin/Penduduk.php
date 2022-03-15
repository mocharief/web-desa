<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\HubunganModel;
use App\Models\AgamaModel;
use App\Models\PendidikankkModel;
use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\GolonganModel;
use App\Models\DusunModel;
use App\Models\RwModel;
use App\Models\RtModel;
use App\Models\KkModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;
use App\Models\LogpendudukModel;

class Penduduk extends BaseController
{


    protected $pendudukModel;
    protected $hubunganModel;
    protected $agamaModel;
    protected $pendidikankkModel;
    protected $pendidikanModel;
    protected $pekerjaanModel;
    protected $golonganModel;
    protected $dusunModel;
    protected $rwModel;
    protected $rtModel;
    protected $kkModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $identitasModel;
    protected $pendaftarModel;
    protected $logpendudukModel;

    public function __construct()

    {
        $this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->hubunganModel = new HubunganModel();
        $this->pendudukModel = new PendudukModel();
        $this->agamaModel = new AgamaModel();
        $this->pendidikankkModel = new PendidikankkModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->golonganModel = new GolonganModel();
        $this->dusunModel = new DusunModel();
        $this->rwModel = new RwModel();
        $this->rtModel = new RtModel();
        $this->kkModel = new KkModel();
        $this->identitasModel = new IdentitasModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->logpendudukModel = new LogpendudukModel();
    }
    public function index()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $penduduk = $this->pendudukModel->daftarpenduduk($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'penduduk' => $penduduk,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
        ];
        return view('admin/penduduk/penduduk', $data);
    }
    public function tambah()
    {

        session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $hubungan = $this->hubunganModel->findAll();
        $agama = $this->agamaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $pendidikankk = $this->pendidikankkModel->findAll();
        $pekerjaan = $this->pekerjaanModel->findAll();
        $golongan = $this->golonganModel->findAll();
        $dusun = $this->dusunModel->view($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $data = [
            'hubungan' => $hubungan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pendidikankk' => $pendidikankk,
            'pekerjaan' => $pekerjaan,
            'golongan' => $golongan,
            'dusun' => $dusun,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/penduduk/tambahpenduduk', $data);
    }


    function action()
    {
        if ($this->request->getVar('action')) {
            $action = $this->request->getVar('action');

            if ($action == 'getrw') {
                $rwModel = new RwModel();

                $rw = $rwModel->where('id_dusun', $this->request->getVar('id_dusun'))->findAll();

                echo json_encode($rw);
            }

            if ($action == 'getrt') {
                $rtModel = new RtModel();
                $rt = $rtModel->where('id_rw', $this->request->getVar('id_rw'))->findAll();

                echo json_encode($rt);
            }

            if ($action == 'getpenduduk') {
                $pendudukModel = new PendudukModel();
                $penduduk = $pendudukModel->where('id', $this->request->getVar('id'))->findAll();
                echo json_encode($penduduk);
            }
        }
    }

    // Kecamatan

    public function simpan()
    {

        if (!$this->validate([
            'nik' => [
                'rules' => 'required|min_length[16]|numeric|is_unique[penduduk.nik]',
                'errors' => [
                    'is_unique' => '* Ada Data Yang Sama',
                    'required' => '* NIK Harus diisi',
                    'min_length' => '* NIK Harus 16 Angka',
                    'numeric' => '* NIK Harus Berupa Angka'
                ]

            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Nama Harus diisi',

                ]
            ],
            'hubungan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'jk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'agama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'tempatlahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'tanggallahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'pendidikankk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'pendidikan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'pekerjaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'kewarganegaraan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'nikayah' => [
                'rules' => 'min_length[16]|numeric',
                'errors' => [
                    'min_length' => '* NIK Harus 16 Angka',
                    'numeric' => '* NIK Harus Berupa Angka'

                ]
            ],
            'nikibu' => [
                'rules' => 'min_length[16]|numeric',
                'errors' => [
                    'min_length' => '* NIK Harus 16 Angka',
                    'numeric' => '* NIK Harus Berupa Angka'

                ]
            ],
            'dusun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'alamatsekarang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'kawin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'golongan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'cacat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'sakit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/tambahpenduduk'))->withInput()->with('validation', $validation);
        }
        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $hubungan = $this->request->getPost('hubungan');
        $jk = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $no_akta = $this->request->getPost('no_akta');
        $tempatlahir = $this->request->getPost('tempatlahir');
        $tanggallahir = $this->request->getPost('tanggallahir');
        $waktulahir = $this->request->getPost('waktulahir');
        $tempatdilahirkan = $this->request->getPost('tempatdilahirkan');
        $jeniskelahiran = $this->request->getPost('jeniskelahiran');
        $anakke = $this->request->getPost('anakke');
        $penolong = $this->request->getPost('penolong');
        $berat = $this->request->getPost('berat');
        $panjang = $this->request->getPost('panjang');
        $pendidikankk = $this->request->getPost('pendidikankk');
        $pendidikan = $this->request->getPost('pendidikan');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $kewarganegaraan = $this->request->getPost('kewarganegaraan');
        $pasport = $this->request->getPost('pasport');
        $tglpasport = $this->request->getPost('tglpasport');
        $kitas = $this->request->getPost('kitas');
        $nikayah = $this->request->getPost('nikayah');
        $namaayah = $this->request->getPost('namaayah');
        $nikibu = $this->request->getPost('nikibu');
        $namaibu = $this->request->getPost('namaibu');
        $dusun = $this->request->getPost('dusun');
        $rw = $this->request->getPost('rw');
        $rt = $this->request->getPost('rt');
        $telp = $this->request->getPost('telp');
        $email = $this->request->getPost('email');
        $alamatsebelumnya = $this->request->getPost('alamatsebelumnya');
        $alamatsekarang = $this->request->getPost('alamatsekarang');
        $kawin = $this->request->getPost('kawin');
        $aktanikah = $this->request->getPost('aktanikah');
        $tglkawin = $this->request->getPost('tglkawin');
        $aktacerai = $this->request->getPost('aktacerai');
        $tglcerai = $this->request->getPost('tglcerai');
        $golongan = $this->request->getPost('golongan');
        $cacat = $this->request->getPost('cacat');
        $sakit = $this->request->getPost('sakit');
        $hamil = $this->request->getPost('hamil');
        $kddesa = $this->request->getPost('kddesa');
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {

            $namagambar = '';
        } else {
            $namagambar = $gambar->getName();
            $gambar->move('public/admin/images/penduduk/', $namagambar);
        }

        $data = [

            'nik' => $nik,
            'nama' => $nama,
            'kk_level' => $hubungan,
            'sex' => $jk,
            'agama_id' => $agama,
            'akta_lahir' => $no_akta,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tanggallahir,
            'waktu_lahir' => $waktulahir,
            'tempat_dilahirkan' => $tempatdilahirkan,
            'kelahiran_anak_ke' => $anakke,
            'penolong_kelahiran' => $penolong,
            'berat_lahir' => $berat,
            'panjang_lahir' => $panjang,
            'id_pendidikan_kk' => $pendidikankk,
            'pendidikan_sedang_id' => $pendidikan,
            'id_pekerjaan' => $pekerjaan,
            'warganegara_id' => $kewarganegaraan,
            'dokumen_pasport' => $pasport,
            'tanggal_akhir_paspor' => $tglpasport,
            'dokumen_kitas' => $kitas,
            'ayah_nik' => $nikayah,
            'nama_ayah' => $namaayah,
            'jenis_kelahiran' => $jeniskelahiran,
            'ibu_nik' => $nikibu,
            'nama_ibu' => $namaibu,
            'id_dusun' => $dusun,
            'id_rw' => $rw,
            'id_rt' => $rt,
            'telepon' => $telp,
            'email' => $email,
            'alamat_sebelumnya' => $alamatsebelumnya,
            'alamat_sekarang' => $alamatsekarang,
            'status_kawin' => $kawin,
            'akta_perkawinan' => $aktanikah,
            'tanggalperkawinan' => $tglkawin,
            'akta_perceraian' => $aktacerai,
            'tanggalperceraian' => $tglcerai,
            'id_golongan' => $golongan,
            'cacat_id' => $cacat,
            'sakit_menahun_id' => $sakit,
            'hamil' => $hamil,
            'kddesa' => $kddesa,
            'foto' => $namagambar,
            'status_dasar' => 1,
            'status' => 1,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pendudukModel->simpan($data);
        return redirect()->to(base_url('/managependuduk'));
    }

    public function edit($id)
    {
        session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $hubungan = $this->hubunganModel->findAll();
        $agama = $this->agamaModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $pendidikankk = $this->pendidikankkModel->findAll();
        $pekerjaan = $this->pekerjaanModel->findAll();
        $golongan = $this->golonganModel->findAll();
        $dusun = $this->dusunModel->view($kddesa);
        $penduduk = $this->pendudukModel->find($id);
        $data = [
            'hubungan' => $hubungan,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pendidikankk' => $pendidikankk,
            'pekerjaan' => $pekerjaan,
            'golongan' => $golongan,
            'dusun' => $dusun,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/penduduk/editpenduduk', $data);
    }
    public function update($id)
    {
        if (!$this->validate([

            'dusun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'rw' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],
            'rt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '* Harus diisi',

                ]
            ],


        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/editpenduduk/' . $id))->withInput()->with('validation', $validation);
        }
        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $hubungan = $this->request->getPost('hubungan');
        $jk = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $no_akta = $this->request->getPost('no_akta');
        $tempatlahir = $this->request->getPost('tempatlahir');
        $tanggallahir = $this->request->getPost('tanggallahir');
        $waktulahir = $this->request->getPost('waktulahir');
        $tempatdilahirkan = $this->request->getPost('tempatdilahirkan');
        $jeniskelahiran = $this->request->getPost('jeniskelahiran');
        $anakke = $this->request->getPost('anakke');
        $penolong = $this->request->getPost('penolong');
        $berat = $this->request->getPost('berat');
        $panjang = $this->request->getPost('panjang');
        $pendidikankk = $this->request->getPost('pendidikankk');
        $pendidikan = $this->request->getPost('pendidikan');
        $pekerjaan = $this->request->getPost('pekerjaan');
        $kewarganegaraan = $this->request->getPost('kewarganegaraan');
        $pasport = $this->request->getPost('pasport');
        $tglpasport = $this->request->getPost('tglpasport');
        $kitas = $this->request->getPost('kitas');
        $nikayah = $this->request->getPost('nikayah');
        $namaayah = $this->request->getPost('namaayah');
        $nikibu = $this->request->getPost('nikibu');
        $namaibu = $this->request->getPost('namaibu');
        $dusun = $this->request->getPost('dusun');
        $rw = $this->request->getPost('rw');
        $rt = $this->request->getPost('rt');
        $telp = $this->request->getPost('telp');
        $email = $this->request->getPost('email');
        $alamatsebelumnya = $this->request->getPost('alamatsebelumnya');
        $alamatsekarang = $this->request->getPost('alamatsekarang');
        $kawin = $this->request->getPost('kawin');
        $aktanikah = $this->request->getPost('aktanikah');
        $tglkawin = $this->request->getPost('tglkawin');
        $aktacerai = $this->request->getPost('aktacerai');
        $tglcerai = $this->request->getPost('tglcerai');
        $golongan = $this->request->getPost('golongan');
        $cacat = $this->request->getPost('cacat');
        $sakit = $this->request->getPost('sakit');
        $hamil = $this->request->getPost('hamil');
        $gambar = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {

            $namagambar = $this->request->getPost('namalama');
        } else {
            if ($this->request->getPost('namalama') == "") {
                $namagambar = $gambar->getName();
                $gambar->move('public/admin/images/penduduk/', $namagambar);
            } else {
                $namagambar = $gambar->getName();
                $gambar->move('public/admin/images/penduduk/', $namagambar);
                unlink('public/admin/images/penduduk/' . $this->request->getPost('namalama'));
            }
        }
        $data = [

            'nik' => $nik,
            'nama' => $nama,
            'kk_level' => $hubungan,
            'sex' => $jk,
            'agama_id' => $agama,
            'akta_lahir' => $no_akta,
            'tempatlahir' => $tempatlahir,
            'tanggallahir' => $tanggallahir,
            'waktu_lahir' => $waktulahir,
            'tempat_dilahirkan' => $tempatdilahirkan,
            'kelahiran_anak_ke' => $anakke,
            'penolong_kelahiran' => $penolong,
            'berat_lahir' => $berat,
            'panjang_lahir' => $panjang,
            'id_pendidikan_kk' => $pendidikankk,
            'pendidikan_sedang_id' => $pendidikan,
            'id_pekerjaan' => $pekerjaan,
            'warganegara_id' => $kewarganegaraan,
            'dokumen_pasport' => $pasport,
            'tanggal_akhir_paspor' => $tglpasport,
            'dokumen_kitas' => $kitas,
            'ayah_nik' => $nikayah,
            'nama_ayah' => $namaayah,
            'jenis_kelahiran' => $jeniskelahiran,
            'ibu_nik' => $nikibu,
            'nama_ibu' => $namaibu,
            'id_dusun' => $dusun,
            'id_rw' => $rw,
            'id_rt' => $rt,
            'telepon' => $telp,
            'email' => $email,
            'alamat_sebelumnya' => $alamatsebelumnya,
            'alamat_sekarang' => $alamatsekarang,
            'status_kawin' => $kawin,
            'akta_perkawinan' => $aktanikah,
            'tanggalperkawinan' => $tglkawin,
            'akta_perceraian' => $aktacerai,
            'tanggalperceraian' => $tglcerai,
            'id_golongan' => $golongan,
            'cacat_id' => $cacat,
            'sakit_menahun_id' => $sakit,
            'foto' => $namagambar,
            'status_dasar' => 1,
            'status' => 1,
            'hamil' => $hamil,
        ];
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        $simpan = $this->pendudukModel->updatedata($data, $id);
        return redirect()->to(base_url('/managependuduk'));
    }
    public function delete($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $penduduk = $this->pendudukModel->find($id);

        unlink('public/admin/images/penduduk/' . $penduduk['foto']);
        $this->pendudukModel->delete($id);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to(base_url('/managependuduk'));
    }

    public function cetaksemua()
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->cetaksemua($kddesa);
        $sensor = $this->request->getPost('sensor');
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'sensor' => $sensor,
        ];

        return view('admin/penduduk/cetak/cetaksemua', $data);
    }

    public function cetak($id)
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->cetak($id);
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
        ];

        return view('admin/penduduk/cetak/cetakperorangan', $data);
    }
    public function unduhsemua()
    {
        // $session = session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $penduduk = $this->pendudukModel->cetaksemua($kddesa);
        $sensor = $this->request->getPost('sensor');
        $data = [
            'penduduk' => $penduduk,
            'logo' => $logo,
            'sensor' => $sensor,
        ];

        return view('admin/penduduk/cetak/unduh', $data);
    }

    public function log()
    {
        $session = session();
        $kddesa = $session->get('kddesa');
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $logo = $this->identitasModel->view($kddesa);
        $statusdasar = $this->request->getPost('statusdasar');
        $db = \Config\Database::connect();
        $data = [
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'statusdasar' => $statusdasar,
            'db' => $db,
            'kddesa' => $kddesa,
        ];
        return view('admin/penduduk/log/logpenduduk', $data);
    }


    public function statusdasar($id)
    {

        $statusdasar = $this->request->getPost('statusdasar');
        $tgl1 = $this->request->getPost('tgl1');
        $tgl2 = $this->request->getPost('tgl2');
        $catatan = $this->request->getPost('catatan');
        $kddesa = $this->request->getPost('kddesa');
        $iduser = $this->request->getPost('id');
        $data = [

            'status_dasar' => $statusdasar,


        ];
        $data1 = [
            'id' => $iduser,
            'id_peristiwa' => $statusdasar,
            'tgl_peristiwa' => $tgl1,
            'tgl_lapor' => $tgl2,
            'kddesa' => $kddesa,
            'catatan' => $catatan,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pendudukModel->updatedata($data, $id);
        $simpan = $this->logpendudukModel->simpan($data1);
        return redirect()->to(base_url('/managependuduk'));
    }


    public function editlog($id)
    {
        session();
        // // Proteksi
        // if ($session->get('username') == "") {
        //     $session->setFlashdata('pesan', 'Anda Belum Login');
        //     return redirect()->to(base_url('/login'));
        // }
        $session = session();
        $kddesa = $session->get('kddesa');
        $logo = $this->identitasModel->view($kddesa);
        $pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $log = $this->logpendudukModel->find($id);
        $data = [
            'log' => $log,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'logo' => $logo,
            'pendaftar' => $pendaftar,
            'kddesa' => $kddesa,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/penduduk/log/editlog', $data);
    }

    public function updatelog($id)
    {

        $statusdasar = $this->request->getPost('namalama');
        $tgl1 = $this->request->getPost('tgl1');
        $tgl2 = $this->request->getPost('tgl2');
        $catatan = $this->request->getPost('catatan');


        $data = [
            'id_peristiwa' => $statusdasar,
            'tgl_peristiwa' => $tgl1,
            'tgl_lapor' => $tgl2,
            'catatan' => $catatan,

        ];
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->logpendudukModel->updatedata($data, $id);
        return redirect()->to(base_url('/logpenduduk'));
    }

    public function restorestatus($id)
    {

        $session = session();
        $kddesa = $session->get('kddesa');
        $log = $this->logpendudukModel->find($id);
        $iduser = $log['id'];

        $data = [
            'status_dasar' => 1,

        ];

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        $simpan = $this->pendudukModel->updatestatus($data, $iduser);
        $this->logpendudukModel->delete($id);
        return redirect()->to(base_url('/logpenduduk'));
    }
}
