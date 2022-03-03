<?php

namespace App\Controllers\Admin;

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
use App\Models\PendaftarModel;

class Home extends BaseController
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
	protected $pendaftarModel;

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
		$this->pendaftarModel = new PendaftarModel();
		helper('form');
	}

	public function index()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$budaya = $this->budayaModel->totalbudaya($kddesa);
		$penduduk = $this->pendudukModel->totalpenduduk($kddesa);
		$dusun = $this->dusunModel->totaldusun($kddesa);
		$galeri = $this->albumModel->totalgaleri($kddesa);
		$kk = $this->kkModel->totalkk($kddesa);
		$umkm = $this->umkmModel->totalumkm($kddesa);
		$pesanmasuk = $this->pesanModel->viewpesan($kddesa);
		$permohonan = $this->permohonanModel->viewpermohonan($kddesa);
		$pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
		$logo = $this->identitasModel->view($kddesa);
		$data = [
			'title' => 'Halaman Administrator',
			'budaya' => $budaya,
			'penduduk' => $penduduk,
			'dusun' => $dusun,
			'galeri' => $galeri,
			'kk' => $kk,
			'umkm' => $umkm,
			'pesanmasuk' => $pesanmasuk,
			'permohonan' => $permohonan,
			'logo' => $logo,
			'pendaftar' => $pendaftar,
		];

		return view('admin/home', $data);
	}
}
