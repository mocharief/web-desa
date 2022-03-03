<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AkunModel;
use App\Models\IdentitasModel;
use App\Models\AllsettingModel;

class Login extends BaseController
{
	protected $akunModel;
	protected $identitasModel;
	protected $allsettingModel;

	public function __construct()

	{

		$this->akunModel = new AkunModel();
		$this->identitasModel = new IdentitasModel();
		$this->allsettingModel = new AllsettingModel();
	}
	public function index()
	{
		// helper(['form']);
		// $logo = $this->identitasModel->view();
		// $data = [

		// 	'logo' => $logo,
		// ];
		return view('admin/login');
	}
	public function auth()
	{
		$session = session();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$data =	$this->akunModel->where([
			'username' => $username,
		])->first();
		if ($data) {
			if ($data['password'] == md5($password)) {
				$ses_data = [
					'id_users' => $data['id_users'],
					'username' => $data['username'],
					'kddesa' => $data['kddesa'],
					'logged_in' => TRUE
				];
				$session->set($ses_data);
				return redirect()->to(base_url('/admin'));
			} else {
				$session->setFlashdata('msg', 'Password Anda Salah');
				return redirect()->to(base_url('/managedesa'));
			}
		} else {
			$session->setFlashdata('msg', 'Username Tidak Ditemukan');
			return redirect()->to(base_url('/managedesa'));
		}
	}


	// Logout
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/managedesa'));
	}
}
