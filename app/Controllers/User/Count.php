<?php

namespace App\Controllers\User;

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
use App\Models\PesankeluarModel;

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
	protected $pesankeluarModel;

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
		$this->pesankeluarModel = new PesankeluarModel();
		helper('form');
	}


	public function permohonan()
	{
		$session = session();
		$id = $session->get('id');
		$kddesa = $session->get('kddesa');
		$permohonan = $this->permohonanModel->viewpermohonanuser($id);
		echo json_encode($permohonan);
	}

	public function pesanmasuk()
	{
		$session = session();
		$id = $session->get('id');
		$kddesa = $session->get('kddesa');
		$pesanmasuk = $this->pesankeluarModel->viewpesanmasuk($id);

		echo json_encode($pesanmasuk);
	}
}
