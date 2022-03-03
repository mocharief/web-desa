<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;
use App\Models\TeamModel;
use App\Models\PortofolioModel;
use App\Models\PaketModel;
use App\Models\SubscribeModel;

class About extends BaseController
{

	protected $testimoniModel;
	protected $partnerModel;
	protected $settingModel;
	protected $teamModel;
	protected $portofolioModel;
	protected $paketModel;
	protected $subscribeModel;

	public function __construct()
	{
		$this->testimoniModel = new TestimoniModel();
		$this->partnerModel = new PartnerModel();
		$this->settingModel = new SettingModel();
		$this->teamModel = new TeamModel();
		$this->portofolioModel = new PortofolioModel();
		$this->paketModel = new PaketModel();
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

		$team = $this->teamModel->findAll();


		$portofolio = $this->portofolioModel->view();
		$total_portofolio = $this->portofolioModel->countAllResults();

		$setting = $this->settingModel->getSetting();

		$paket = $this->paketModel->findAll();

		$data = [
			'testimoni' => $testimoni,
			'view_testimoni' => $view_testimoni,
			'partner' => $partner,
			'total' => $total_partner,
			'setting' => $setting,
			'team' => $team,
			'portofolio' => $portofolio,
			'total_testimoni' => $total_testimoni,
			'total_portofolio' => $total_portofolio,
			'paket' => $paket,
			'activemenu' => $this->data['activemenu'] = 'about',

		];

		return view('frontend/about', $data);
	}



	//--------------------------------------------------------------------

}
