<?php

namespace App\Controllers\Kades;

use App\Controllers\BaseController;
use App\Models\DusunModel;
use App\Models\PendudukModel;
use App\Models\BudayaModel;
use App\Models\AlbumModel;
use App\Models\KkModel;
use App\Models\UmkmModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\SettingModel;

class Setting extends BaseController
{
	protected $dusunModel;
	protected $pendudukModel;
	protected $budayaModel;
	protected $albumModel;
	protected $kkModel;
	protected $umkmModel;
	protected $pesanModel;
	protected $permohonanModel;
	protected $identitasModel;
	protected $settingModel;

	public function __construct()
	{
		$this->dusunModel = new DusunModel();
		$this->pendudukModel = new PendudukModel();
		$this->budayaModel = new BudayaModel();
		$this->albumModel = new AlbumModel();
		$this->kkModel = new KkModel();
		$this->umkmModel = new UmkmModel();
		$this->pesanModel = new PesanModel();
		$this->permohonanModel = new PermohonanModel();
		$this->identitasModel = new IdentitasModel();
		$this->settingModel = new SettingModel();
		helper('form');
	}

	public function index()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
		$setting = $this->settingModel->viewsetting($kddesa);
		$totalsetting = $this->settingModel->totalsetting($kddesa);
		$data = [
			'title' => 'Halaman Administrator',

			'permohonan' => $permohonan,
			'logo' => $logo,
			'setting' => $setting,
			'totalsetting' => $totalsetting,
		];

		return view('kades/setting/setting', $data);
	}
	public function tambah()
	{

		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$penduduk = $this->pendudukModel->viewpenduduk($kddesa);
		$pesanmasuk = $this->pesanModel->viewpesan($kddesa);
		$permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
		$db = \Config\Database::connect();

		$data = [

			'penduduk' => $penduduk,
			'pesanmasuk' => $pesanmasuk,
			'permohonan' => $permohonan,
			'kddesa' => $kddesa,
			'logo' => $logo,
			'db' => $db,

		];
		return view('kades/setting/tambahsetting', $data);
	}

	public function simpan()
	{
		$nama = $this->request->getPost('nama');
		$kddesa = $this->request->getPost('kddesa');
		$gambar1 = $this->request->getFile('file');
		if ($gambar1->getError() == 4) {

			$namagambar1 = "";
		} else {
			$namagambar1 = $gambar1->getName();

			$gambar1->move('public/admin/images/file/3/2/' . $kddesa . '/', $namagambar1);
			$file = "$namagambar1";
			$enkripsi = base64_encode($file);
		}


		$data = [
			'nama' => $nama,
			'kddesa' => $kddesa,
			'file' => $enkripsi,


		];
		session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
		$simpan = $this->settingModel->simpan($data);
		return redirect()->to(base_url('/setting'));
	}
	public function edit($id)
	{

		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$penduduk = $this->pendudukModel->viewpenduduk($kddesa);
		$setting = $this->settingModel->find($id);

		$permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
		$db = \Config\Database::connect();
		$data = [

			'penduduk' => $penduduk,
			'permohonan' => $permohonan,
			'setting' => $setting,
			'logo' => $logo,
			'db' => $db,
			'kddesa' => $kddesa,
		];
		return view('kades/setting/editsetting', $data);
	}

	public function updatefile($id)
	{

		$nama = $this->request->getPost('nama');
		$kddesa = $this->request->getPost('kddesa');
		$file = $this->request->getFile('file');

		if ($file->getError() == 4) {

			$namafile = $this->request->getPost('namalama');
		} else {
			$namafile = $file->getName();
			$file->move('public/admin/images/file/3/2/' . $kddesa . '/', $namafile);
			$files = "$namafile";
			$enkripsi = base64_encode($files);
			unlink('public/admin/images/file/3/2/' . $kddesa . '/' . $this->request->getPost('namalama'));
		}


		$data = [

			'nama' => $nama,
			'file' => $enkripsi,

		];
		session()->setFlashdata('pesan', 'Data Berhasil Diubah');
		$simpan = $this->settingModel->updatedata($data, $id);
		return redirect()->to(base_url('/setting'));
	}
}
