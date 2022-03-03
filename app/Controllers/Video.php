<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;
use App\Models\LayananModel;
use App\Models\PortofolioModel;
use App\Models\PaketModel;
use App\Models\HighlightModel;
use App\Models\GaleriModel;

class Video extends BaseController
{

	protected $testimoniModel;
	protected $partnerModel;
	protected $settingModel;
	protected $layananModel;
	protected $portofolioModel;
	protected $paketModel;
	protected $highlightModel;
	protected $galeriModel;

	public function __construct()
	{
		$this->testimoniModel = new TestimoniModel();
		$this->partnerModel = new PartnerModel();
		$this->settingModel = new SettingModel();
		$this->layananModel = new LayananModel();
		$this->portofolioModel = new PortofolioModel();
		$this->paketModel = new PaketModel();
		$this->highlightModel = new HighlightModel();
		$this->galeriModel = new GaleriModel();
		helper('form');
	}


	public function index()
	{

		$testimoni = $this->testimoniModel->findAll();
		$view_testimoni = $this->testimoniModel->view();
		$total_testimoni = $this->testimoniModel->countAllResults();

		$partner = $this->partnerModel->findAll();
		$total_partner = $this->partnerModel->countAllResults();

		$layanan = $this->layananModel->findAll();
		$total_layanan = $this->layananModel->countAllResults();

		$portofolio = $this->portofolioModel->view();
		$total_portofolio = $this->portofolioModel->countAllResults();
		$video = $this->highlightModel->video();
		$allvideo = $this->highlightModel->allvideo();


		$setting = $this->settingModel->getSetting();

		$paket = $this->paketModel->findAll();

		$galeri = $this->galeriModel->view();
		$db = \Config\Database::connect();

		$data = [
			'testimoni' => $testimoni,
			'view_testimoni' => $view_testimoni,
			'partner' => $partner,
			'total' => $total_partner,
			'setting' => $setting,
			'layanan' => $layanan,
			'portofolio' => $portofolio,
			'allvideo' => $allvideo,
			'total_testimoni' => $total_testimoni,
			'total_layanan' => $total_layanan,
			'total_portofolio' => $total_portofolio,
			'video' => $video,
			'paket' => $paket,
			'galeri' => $galeri,
			'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'video',

		];

		return view('frontend/video', $data);
	}



	//--------------------------------------------------------------------

}
