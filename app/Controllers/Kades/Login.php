<?php

namespace App\Controllers\Kades;

use App\Controllers\BaseController;

use App\Models\AkunkadesModel;
use App\Models\IdentitasModel;

class Login extends BaseController
{
	protected $akunkadesModel;
	protected $identitasModel;

	public function __construct()

	{

		$this->akunkadesModel = new AkunkadesModel();
		$this->identitasModel = new IdentitasModel();
	}
	public function index()
	{

		return view('kades/login');
	}
	public function auth()
	{
		$session = session();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$data =	$this->akunkadesModel->where([
			'username' => $username,
		])->first();
		if ($data) {
			if ($data['password'] == md5($password)) {
				$ses_data = [
					'id_kades' => $data['id_kades'],
					'username' => $data['username'],
					'kddesa' => $data['kddesa'],
					'logged_in' => TRUE
				];
				$session->set($ses_data);
				return redirect()->to(base_url('/kades'));
			} else {
				$session->setFlashdata('msg', 'Password Anda Salah');
				return redirect()->to(base_url('/loginkades'));
			}
		} else {
			$session->setFlashdata('msg', 'Username Tidak Ditemukan');
			return redirect()->to(base_url('/loginkades'));
		}
	}


	// Logout
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/loginkades'));
	}
}
