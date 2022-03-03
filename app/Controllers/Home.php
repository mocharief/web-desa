<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\BudayaModel;
use App\Models\UmkmModel;
use App\Models\IdentitasModel;
use App\Models\SosmedModel;
use App\Models\AlbumModel;
use App\Models\KatalbumModel;
use App\Models\GaleriModel;

class Home extends BaseController
{
	protected $pendudukModel;
	protected $budayaModel;
	protected $umkmModel;
	protected $identitasModel;
    protected $albumModel;
    protected $galeriModel;
    protected $katalbumModel;
	
	public function __construct()
	{
		$this->pendudukModel = new PendudukModel();
		$this->budayaModel = new BudayaModel();
		$this->umkmModel = new UmkmModel();
		$this->identitasModel = new IdentitasModel();
        $this->albumModel = new AlbumModel();
        $this->galeriModel = new GaleriModel();
        $this->katalbumModel = new KatalbumModel();
		helper('form');
	}


	public function index()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$budaya = $this->budayaModel->totalbudaya($kddesa);
		$penduduk = $this->pendudukModel->totalpenduduk($kddesa);
		$umkm = $this->umkmModel->totalumkm($kddesa);
		$logo = $this->identitasModel->view($kddesa);
        $album = $this->albumModel->viewalbum($kddesa);

		$db = \Config\Database::connect();
		$data = [
			'title' => 'Beranda',
			'budaya' => $budaya,
			'penduduk' => $penduduk,
			'umkm' => $umkm,
			'logo' => $logo,
			'album' => $album,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'beranda',
		];

		return view('frontend/index', $data);
	}

	public function profil()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$budaya = $this->budayaModel->totalbudaya($kddesa);
		$penduduk = $this->pendudukModel->totalpenduduk($kddesa);
		$galeri = $this->albumModel->totalgaleri($kddesa);
		$umkm = $this->umkmModel->totalumkm($kddesa);
		$logo = $this->identitasModel->view($kddesa);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Profil',
			'budaya' => $budaya,
			'penduduk' => $penduduk,
			'galeri' => $galeri,
			'umkm' => $umkm,
			'logo' => $logo,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'profil',
		];

		return view('frontend/profil', $data);
	}

	public function galeri($id)
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$albumList = $this->albumModel->viewalbum($kddesa);
        $albumDetail = $this->albumModel->find($id);
        $galeri = $this->galeriModel->view($id, $kddesa);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Galeri',
			'logo' => $logo,
			'albumList' => $albumList,
			'albumDetail' => $albumDetail,
			'galeri' => $galeri,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'galeri',
		];

		return view('frontend/galeri', $data);
	}

	//--------------------------------------------------------------------

}
