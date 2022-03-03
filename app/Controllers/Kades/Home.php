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
		$permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
		$logo = $this->identitasModel->view($kddesa);
		$data = [
			'title' => 'Halaman Administrator',
			'budaya' => $budaya,
			'penduduk' => $penduduk,
			'dusun' => $dusun,
			'galeri' => $galeri,
			'kk' => $kk,
			'umkm' => $umkm,
			'permohonan' => $permohonan,
			'logo' => $logo,
		];

		return view('kades/home', $data);
	}
}
