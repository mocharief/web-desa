<?php

namespace App\Controllers;

use App\Models\SettingModel;
use App\Models\PartnerModel;
use App\Models\PaketModel;
use App\Models\RequestModel;

class Booking extends BaseController
{

	protected $settingModel;
	protected $partnerModel;
	protected $paketModel;
	protected $requestModel;

	public function __construct()
	{
		$this->settingModel = new SettingModel();
		$this->partnerModel = new PartnerModel();
		$this->paketModel = new PaketModel();
		$this->requestModel = new RequestModel();
		helper('form');
	}


	public function index($id)
	{
		$partner = $this->partnerModel->findAll();
		$total_partner = $this->partnerModel->countAllResults();
		$setting = $this->settingModel->getSetting();
		$paket = $this->paketModel->find($id);

		$data = [
			'partner' => $partner,
			'total' => $total_partner,
			'setting' => $setting,
			'paket' => $paket,
			'activemenu' => $this->data['activemenu'] = 'service',
		];

		return view('frontend/booking', $data);
	}

	public function update($id)
	{

		$nama = $this->request->getPost('nama');
		$email = $this->request->getPost('email');
		$paket = $this->request->getPost('paket');
		$no_hp = $this->request->getPost('no_hp');
		$alamat = $this->request->getPost('alamat');
		$catatan = $this->request->getPost('catatan');


		$data = [
			'nama' => $nama,
			'email' => $email,
			'paket' => $paket,
			'no_hp' => $no_hp,
			'alamat' => $alamat,
			'catatan' => $catatan

		];
		session()->setFlashdata('booking', 'Terima Kasih Telah Memesan Paket Wedding Kami, Selanjutnya Anda Akan dapat Pesan WA dari Admin Kami');
		$this->requestModel->simpan($data);
		return redirect()->to(base_url(''));
	}


	//--------------------------------------------------------------------

}
