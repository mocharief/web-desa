<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendudukModel;
use App\Models\DusunModel;
use App\Models\BudayaModel;
use App\Models\UmkmModel;
use App\Models\IdentitasModel;
use App\Models\SosmedModel;
use App\Models\AlbumModel;
use App\Models\KatalbumModel;
use App\Models\GaleriModel;
use App\Models\TextModel;
use App\Models\ArtikelModel;
use App\Models\KatartikelModel;
use App\Models\SliderModel;
use App\Models\PendataanModel;
use App\Models\PemerintahanModel;

use App\Models\PendidikanModel;
use App\Models\PekerjaanModel;
use App\Models\PendidikankkModel;
use App\Models\AgamaModel;
use App\Models\GolonganModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\PendaftarModel;

class Home extends BaseController
{
	protected $pendudukModel;
	protected $dusunModel;
	protected $budayaModel;
	protected $umkmModel;
	protected $identitasModel;
    protected $albumModel;
    protected $galeriModel;
    protected $katalbumModel;
	protected $textModel;
	protected $artikelModel;
	protected $katartikelModel;
    protected $sliderModel;
    protected $pendataanModel;
    protected $pemerintahanModel;

    protected $pendidikanModel;
    protected $pekerjaanModel;
    protected $pendidikankkModel;
    protected $agamaModel;
    protected $golonganModel;
    protected $pesanModel;
    protected $permohonanModel;
    protected $pendaftarModel;
	
	public function __construct()
	{
		$this->pendudukModel = new PendudukModel();
		$this->dusunModel = new DusunModel();
		$this->budayaModel = new BudayaModel();
		$this->umkmModel = new UmkmModel();
		$this->identitasModel = new IdentitasModel();
        $this->albumModel = new AlbumModel();
        $this->galeriModel = new GaleriModel();
        $this->katalbumModel = new KatalbumModel();
        $this->textModel = new TextModel();
        $this->artikelModel = new ArtikelModel();
        $this->katartikelModel = new KatartikelModel();
        $this->sliderModel = new SliderModel();
        $this->pendataanModel = new PendataanModel();
        $this->pemerintahanModel = new PemerintahanModel();

		$this->pesanModel = new PesanModel();
        $this->permohonanModel = new PermohonanModel();
        $this->pekerjaanModel = new PekerjaanModel();
        $this->pendidikanModel = new PendidikanModel();
        $this->pendidikankkModel = new PendidikankkModel();
        $this->agamaModel = new AgamaModel();
        $this->golonganModel = new GolonganModel();
        $this->pendaftarModel = new PendaftarModel();
		helper('form');
	}


	public function index()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
        $text = $this->textModel->view($kddesa);
		$penduduk = $this->pendudukModel->totalpenduduk($kddesa);
		$dusun = $this->dusunModel->totaldusun($kddesa);
		$budaya = $this->budayaModel->totalbudaya($kddesa);
		$umkm = $this->umkmModel->totalumkm($kddesa);
        $slider = $this->sliderModel->view($kddesa);
		$artikelList = $this->artikelModel->viewArtikelWithKat($kddesa, '');
		$budayaList = $this->budayaModel->viewBudayaWithKat($kddesa);
		$albumList = $this->albumModel->viewalbum($kddesa);
        $pendataan = $this->pendataanModel->view($kddesa);

		$db = \Config\Database::connect();
		$data = [
			'title' => 'Beranda',
			'logo' => $logo,
            'text' => $text,
			'penduduk' => $penduduk,
			'dusun' => $dusun,
			'budaya' => $budaya,
			'umkm' => $umkm,
            'slider' => $slider,
			'artikelList' => $artikelList,
			'budayaList' => $budayaList,
			'albumList' => $albumList,
            'pendataan' => $pendataan,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'beranda',
		];

		return view('frontend/index', $data);
	}

	public function profil()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
        $text = $this->textModel->view($kddesa);
		$pendudukTotal = $this->pendudukModel->totalpenduduk($kddesa);
		$dusun = $this->dusunModel->totaldusun($kddesa);
		$budaya = $this->budayaModel->totalbudaya($kddesa);
		$umkm = $this->umkmModel->totalumkm($kddesa);
        $slider = $this->sliderModel->view($kddesa);
		$budayaList = $this->budayaModel->viewBudayaWithKat($kddesa);
		$dusunList = $this->dusunModel->view($kddesa);
        $pemerintahan = $this->pemerintahanModel->viewpemerintahan($kddesa);

		$pesanmasuk = $this->pesanModel->viewpesan($kddesa);
        $permohonan = $this->permohonanModel->viewpermohonan($kddesa);
        $pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
        $penduduk = $this->pendudukModel->find();
        $pekerjaan = $this->pekerjaanModel->findAll();
        $pendidikan = $this->pendidikanModel->findAll();
        $pendidikankk = $this->pendidikankkModel->findAll();
        $agama = $this->agamaModel->findAll();
        $golongan = $this->golonganModel->findAll();

		$db = \Config\Database::connect();
		$data = [
			'title' => 'Profil',
			'kddesa' => $kddesa,
			'logo' => $logo,
            'text' => $text,
			'pendudukTotal' => $pendudukTotal,
			'dusun' => $dusun,
			'budaya' => $budaya,
			'umkm' => $umkm,
            'slider' => $slider,
			'budayaList' => $budayaList,
			'dusunList' => $dusunList,
            'pemerintahan' => $pemerintahan,
			'pekerjaan' => $pekerjaan,
            'pendidikan' => $pendidikan,
            'pendidikankk' => $pendidikankk,
            'agama' => $agama,
            'golongan' => $golongan,
            'penduduk' => $penduduk,
            'pesanmasuk' => $pesanmasuk,
            'permohonan' => $permohonan,
            'pendaftar' => $pendaftar,
			'db' => $db,
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
        $text = $this->textModel->view($kddesa);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Galeri',
			'logo' => $logo,
			'albumList' => $albumList,
			'albumDetail' => $albumDetail,
			'galeri' => $galeri,
            'text' => $text,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'galeri',
		];

		return view('frontend/galeri', $data);
	}

	public function umkm()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
        $text = $this->textModel->view($kddesa);
		$umkm = $this->umkmModel->view($kddesa);

		$db = \Config\Database::connect();
		$data = [
			'title' => 'UMKM',
			'logo' => $logo,
            'text' => $text,
			'umkm' => $umkm,
			'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'umkm',
		];

		return view('frontend/umkm', $data);
	}

	public function kebudayaan()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$text = $this->textModel->view($kddesa);
		$budayaList = $this->budayaModel->viewBudayaWithKat($kddesa);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Kebudayaan',
			'logo' => $logo,
		    'text' => $text,
			'budayaList' => $budayaList,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'kebudayaan',
		];

		return view('frontend/kebudayaan/index', $data);
	}

	public function kebudayaanDetail($id)
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$text = $this->textModel->view($kddesa);
		$budayaList = $this->budayaModel->viewBudayaWithKat($kddesa, $id);
		$budayaDetail = $this->budayaModel->getDataWithKat($id);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Kebudayaan',
			'logo' => $logo,
		    'text' => $text,
			'budayaList' => $budayaList,
			'budayaDetail' => $budayaDetail,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'kebudayaan',
		];

		return view('frontend/kebudayaan/detail', $data);
	}

	public function artikel()
	{
		$all_query_values = $this->request->getVar();
        // It will return an array of all values
      
      	// get query variable - name
        $kategoriQuery = $this->request->getVar("kat");

		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$text = $this->textModel->view($kddesa);
		$artikelList = $this->artikelModel->viewArtikelWithKat($kddesa, $kategoriQuery);
		$katArtikelList = $this->katartikelModel->viewkategori($kddesa);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Artikel',
			'logo' => $logo,
		    'text' => $text,
			'artikelList' => $artikelList,
			'katArtikelList' => $katArtikelList,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'artikel',
		];

		return view('frontend/artikel/index', $data);
	}

	public function artikelDetail($id)
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$logo = $this->identitasModel->view($kddesa);
		$text = $this->textModel->view($kddesa);
		$artikelDetail = $this->artikelModel->getDataWithKat($id);
		$katArtikelList = $this->katartikelModel->viewkategori($kddesa);

		// $db = \Config\Database::connect();
		$data = [
			'title' => 'Artikel',
			'logo' => $logo,
		    'text' => $text,
			'artikelDetail' => $artikelDetail,
			'katArtikelList' => $katArtikelList,
			// 'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'artikel',
		];

		return view('frontend/artikel/detail', $data);
	}

	//--------------------------------------------------------------------

}
