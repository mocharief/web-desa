<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\DusunModel;
use App\Models\PendudukModel;
use App\Models\BudayaModel;
use App\Models\AlbumModel;
use App\Models\KkModel;
use App\Models\UmkmModel;
use App\Models\PesanModel;
use App\Models\PermohonanModel;
use App\Models\IdentitasModel;
use App\Models\PendaftarModel;

class Count extends BaseController
{
	protected $dusunModel;
	protected $pendudukModel;
	protected $budayaModel;
	protected $albumModel;
	protected $kkModel;
	protected $umkmModel;
	protected $pesanModel;
	protected $permohonanModel;
	protected $identitasModel;
	protected $pendaftarModel;

	public function __construct()
	{
		$this->dusunModel = new DusunModel();
		$this->pendudukModel = new PendudukModel();
		$this->budayaModel = new BudayaModel();
		$this->albumModel = new AlbumModel();
		$this->kkModel = new KkModel();
		$this->umkmModel = new UmkmModel();
		$this->pesanModel = new PesanModel();
		$this->permohonanModel = new PermohonanModel();
		$this->identitasModel = new IdentitasModel();
		$this->pendaftarModel = new PendaftarModel();
		helper('form');
	}

	public function pesanmasuk()
	{
		$session = session();
		$kddesa = $session->get('kddesa');

		$pesanmasuk = $this->pesanModel->viewpesan($kddesa);

		echo json_encode($pesanmasuk);
	}
	public function permohonan()
	{
		$session = session();
		$kddesa = $session->get('kddesa');


		$permohonan = $this->permohonanModel->viewpermohonan($kddesa);



		echo json_encode($permohonan);
	}

	public function pendaftar()
	{
		$session = session();
		$kddesa = $session->get('kddesa');

		$pendaftar = $this->pendaftarModel->totalpendaftar($kddesa);
		echo json_encode($pendaftar);
	}
}
