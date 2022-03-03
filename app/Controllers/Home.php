<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;
use App\Models\LayananModel;
use App\Models\PortofolioModel;
use App\Models\PaketModel;
use App\Models\SubscribeModel;
use App\Models\SliderModel;
use App\Models\HighlightModel;

class Home extends BaseController
{
	protected $sliderModel;
	protected $testimoniModel;
	protected $partnerModel;
	protected $settingModel;
	protected $layananModel;
	protected $portofolioModel;
	protected $paketModel;
	protected $subscribeModel;
	protected $highlightModel;

	public function __construct()
	{
		$this->testimoniModel = new TestimoniModel();
		$this->partnerModel = new PartnerModel();
		$this->settingModel = new SettingModel();
		$this->layananModel = new LayananModel();
		$this->portofolioModel = new PortofolioModel();
		$this->paketModel = new PaketModel();
		$this->subscribeModel = new SubscribeModel();
		$this->sliderModel = new SliderModel();
		$this->highlightModel = new HighlightModel();
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

		$setting = $this->settingModel->getSetting();

		$paket = $this->paketModel->view();
		$image = $this->highlightModel->image();
		$video = $this->highlightModel->video();

		$slider = $this->sliderModel->findAll();

		$db = \Config\Database::connect();
		$data = [
			'testimoni' => $testimoni,
			'view_testimoni' => $view_testimoni,
			'partner' => $partner,
			'total' => $total_partner,
			'setting' => $setting,
			'layanan' => $layanan,
			'portofolio' => $portofolio,
			'total_testimoni' => $total_testimoni,
			'total_layanan' => $total_layanan,
			'total_portofolio' => $total_portofolio,
			'slider' => $slider,
			'db' => $db,
			'paket' => $paket,
			'image' => $image,
			'video' => $video,
			'activemenu' => $this->data['activemenu'] = 'home',


		];

		return view('frontend/index', $data);
	}

	//--------------------------------------------------------------------

}
