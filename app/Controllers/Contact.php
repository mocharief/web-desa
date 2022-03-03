<?php

namespace App\Controllers;

use App\Models\TestimoniModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;
use App\Models\LayananModel;
use App\Models\PortofolioModel;
use App\Models\PesanModel;
use App\Models\SubscribeModel;

class Contact extends BaseController
{

	protected $testimoniModel;
	protected $partnerModel;
	protected $settingModel;
	protected $layananModel;
	protected $portofolioModel;
	protected $pesanModel;
	protected $subscribeModel;

	public function __construct()
	{
		$this->testimoniModel = new TestimoniModel();
		$this->partnerModel = new PartnerModel();
		$this->settingModel = new SettingModel();
		$this->layananModel = new LayananModel();
		$this->portofolioModel = new PortofolioModel();
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

		$portofolio = $this->portofolioModel->view();
		$total_portofolio = $this->portofolioModel->countAllResults();

		$setting = $this->settingModel->getSetting();



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

			'activemenu' => $this->data['activemenu'] = 'contact',
		];

		return view('frontend/contact', $data);
	}

	public function kirimpesan()
	{

		$nama = $this->request->getPost('nama');
		$no_telp = $this->request->getPost('no_telp');
		$pesan = $this->request->getPost('pesan');
		$data = [
			'nama' => $nama,
			'no_telp' => $no_telp,
			'pesan' => $pesan
		];
		session()->setFlashdata('kirimpesan', 'Terima Kasih Telah Menyampaikan Pesan Terhadap Kami');
		$simpan = $this->pesanModel->simpan($data);
		return redirect()->to(base_url('contact'));
	}


	//--------------------------------------------------------------------

}
