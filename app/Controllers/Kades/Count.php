<?php

namespace App\Controllers\Kades;

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


	public function permohonan()
	{
		$session = session();
		$kddesa = $session->get('kddesa');
		$permohonan = $this->permohonanModel->viewpermohonankades($kddesa);
		echo json_encode($permohonan);
	}
}
