<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;
use App\Models\LayananModel;
use App\Models\PromoModel;
use App\Models\PesanModel;
use App\Models\SubscribeModel;

class Promo extends BaseController
{

	protected $testimoniModel;
	protected $partnerModel;
	protected $settingModel;
	protected $layananModel;
	protected $promoModel;
	protected $pesanModel;
	protected $subscribeModel;

	public function __construct()
	{
		$this->testimoniModel = new TestimoniModel();
		$this->partnerModel = new PartnerModel();
		$this->settingModel = new SettingModel();
		$this->layananModel = new LayananModel();
		$this->promoModel = new PromoModel();
		$this->pesanModel = new PesanModel();
		$this->subscribeModel = new SubscribeModel();
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

		$promo = $this->promoModel->getpromo();

		$setting = $this->settingModel->getSetting();



		$data = [
			'testimoni' => $testimoni,
			'view_testimoni' => $view_testimoni,
			'partner' => $partner,
			'total' => $total_partner,
			'setting' => $setting,
			'layanan' => $layanan,
			'promo' => $promo,
			'total_testimoni' => $total_testimoni,
			'total_layanan' => $total_layanan,
			'activemenu' => $this->data['activemenu'] = 'promo',


		];

		return view('frontend/promo', $data);
	}


	//--------------------------------------------------------------------

}
