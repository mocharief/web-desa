<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;
use App\Models\PaketModel;
use App\Models\PromoModel;
use App\Models\PesanModel;
use App\Models\SubscribeModel;


class Package extends BaseController
{

	protected $testimoniModel;
	protected $partnerModel;
	protected $settingModel;
	protected $paketModel;
	protected $promoModel;
	protected $pesanModel;
	protected $subscribeModel;


	public function __construct()
	{
		$this->testimoniModel = new TestimoniModel();
		$this->partnerModel = new PartnerModel();
		$this->settingModel = new SettingModel();
		$this->paketModel = new PaketModel();
		$this->promoModel = new PromoModel();
		$this->pesanModel = new PesanModel();
		$this->subscribeModel = new SubscribeModel();
		$this->pager = \Config\Services::pager();
		helper('form');
	}


	public function index()
	{

		$testimoni = $this->testimoniModel->findAll();
		$view_testimoni = $this->testimoniModel->view();
		$total_testimoni = $this->testimoniModel->countAllResults();
		$paket = $this->paketModel->getHarga();
		$db = \Config\Database::connect();
		$partner = $this->partnerModel->findAll();
		$total_partner = $this->partnerModel->countAllResults();




		$promo = $this->promoModel->getpromo();
		$promo_terbaru = $this->promoModel->view();

		$setting = $this->settingModel->getSetting();

		$data = [
			'testimoni' => $testimoni,
			'view_testimoni' => $view_testimoni,
			'partner' => $partner,

			'total' => $total_partner,
			'setting' => $setting,
			'db' => $db,
			'paket' => $paket,
			'promo' => $promo,
			'promo_terbaru' => $promo_terbaru,
			'total_testimoni' => $total_testimoni,

			'activemenu' => $this->data['activemenu'] = 'package',
		];

		return view('frontend/package', $data);
	}

	public function view($id)
	{
		$setting = $this->settingModel->getSetting();

		$partner = $this->partnerModel->findAll();
		$total_partner = $this->partnerModel->countAllResults();

		$paket = $this->paketModel->find($id);
		$db = \Config\Database::connect();
		$data = [
			'setting' => $setting,
			'paket' => $paket,
			'total' => $total_partner,
			'partner' => $partner,
			'db' => $db,
			'activemenu' => $this->data['activemenu'] = 'package',

		];

		return view('frontend/detailpackage', $data);
	}

	//--------------------------------------------------------------------

}
