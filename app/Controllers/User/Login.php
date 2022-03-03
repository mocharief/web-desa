<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\PendaftarModel;
use App\Models\IdentitasModel;
use App\Models\PendudukModel;

class Login extends BaseController
{
	protected $pendaftarModel;
	protected $identitasModel;
	protected $pendudukModel;

	public function __construct()

	{
		$this->pendudukModel = new PendudukModel();
		$this->pendaftarModel = new PendaftarModel();
		$this->identitasModel = new IdentitasModel();
	}
	public function index()
	{
		helper(['form']);
		$logo = $this->identitasModel->view();
		$data = [

			'logo' => $logo,
		];
		return view('user/login', $data);
	}
	public function auth()
	{
		$session = session();
		$nik = $this->request->getVar('nik');
		$pin = $this->request->getVar('pin');
		$data =	$this->pendaftarModel->where([
			'nik' => $nik,
		])->first();
		if ($data) {
			if ($data['pin'] == md5($pin)) {
				$ses_data = [
					'id' => $data['id'],
					'nik' => $data['nik'],
					'kddesa' => $data['kddesa'],
					'logged_in' => TRUE
				];
				$session->set($ses_data);
				return redirect()->to(base_url('/user'));
			} else {
				$session->setFlashdata('msg', 'Salah PIN');
				return redirect()->to(base_url('/layananmandiri'));
			}
		} else {
			$session->setFlashdata('msg', 'NIK Tidak Ditemukan');
			return redirect()->to(base_url('/layananmandiri'));
		}
	}

	public function register()
	{

		session();

		$logo = $this->identitasModel->view();
		$data = [
			'logo' => $logo,
			'validation' => \Config\Services::validation()
		];

		return view('user/register', $data);
	}

	public function pengajuan()
	{

		if (!$this->validate([
			'nik' => [
				'rules' => 'required|min_length[16]|numeric|is_unique[pendaftar.nik]',
				'errors' => [
					'is_unique' => '* NIK Sudah Terdaftar',
					'required' => '* NIK Harus diisi',
					'min_length' => '* NIK Harus 16 Angka',
					'numeric' => '* NIK Harus Berupa Angka'
				]

			],
			'no_wa' => [
				'rules' => 'required|numeric',
				'errors' => [
					'required' => '* Harus diisi',
					'numeric' => '* Harus Berupa Angka'

				]
			],


		])) {
			$validation = \Config\Services::validation();
			return redirect()->to(base_url('/pengajuan'))->withInput()->with('validation', $validation);
		}
		$session = session();
		$nik = $this->request->getPost('nik');
		$data =	$this->pendudukModel->where([
			'nik' => $nik,
		])->first();
		if ($data) {
			$kddesa = $data['kddesa'];
			$id =	$data['id'];
			$no_wa = $this->request->getPost('no_wa');

			$data = [

				'kddesa' => $kddesa,
				'id' => $id,
				'no_wa' => '62' . $no_wa,
				'nik' => $nik,


			];

			session()->setFlashdata('msg', 'Proses Pengajuan Berhasil Tunggu Admin Menghubungi Anda');
			$simpan = $this->pendaftarModel->simpan($data);
			return redirect()->to(base_url('/layananmandiri'));
		} else {
			$session->setFlashdata('msg', 'NIK Tidak Ditemukan');
			return redirect()->to(base_url('/register'));
		}
	}
	// Logout
	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/layananmandiri'));
	}
}
