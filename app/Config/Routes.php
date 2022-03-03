<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/managedesa', 'Admin\Login::index');
$routes->get('/admin', 'Admin\Home::index', ['filter' => 'authadmin']);

// penduduk
$routes->get('/managependuduk', 'Admin\Penduduk::index', ['filter' => 'authadmin']);
$routes->get('/tambahpenduduk', 'Admin\Penduduk::tambah', ['filter' => 'authadmin']);
$routes->get('/editpenduduk/(:segment)', 'Admin\Penduduk::edit/$1', ['filter' => 'authadmin']);
$routes->add('/penduduk/update/(:num)', 'Admin\Penduduk::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletependuduk/(:num)', 'Admin\Penduduk::delete/$1', ['filter' => 'authadmin']);
$routes->get('/cetaksemuapenduduk', 'Admin\Penduduk::cetaksemua', ['filter' => 'authadmin']);
$routes->get('/cetakpenduduk/(:num)', 'Admin\Penduduk::cetak/$1', ['filter' => 'authadmin']);
$routes->get('/unduhsemuapenduduk', 'Admin\Penduduk::unduhsemua', ['filter' => 'authadmin']);


// artikel
$routes->get('/manageartikel', 'Admin\Artikel::index', ['filter' => 'authadmin']);
$routes->get('/tambahartikel', 'Admin\Artikel::tambah', ['filter' => 'authadmin']);
$routes->get('/managekatartikel', 'Admin\Artikel::katartikel', ['filter' => 'authadmin']);
$routes->add('/artikel/update/(:num)', 'Admin\Artikel::update/$1', ['filter' => 'authadmin']);
$routes->delete('/delete/(:num)', 'Admin\Artikel::delete/$1', ['filter' => 'authadmin']);
$routes->add('/artikel/updatekategori/(:num)', 'Admin\Artikel::updatekategori/$1', ['filter' => 'authadmin']);
$routes->delete('/deletekategori/(:num)', 'Admin\Artikel::deletekategori/$1', ['filter' => 'authadmin']);

//  Album
$routes->get('/managealbum', 'Admin\Album::index', ['filter' => 'authadmin']);
$routes->get('/tambahalbum', 'Admin\Album::tambah', ['filter' => 'authadmin']);
$routes->get('/editalbum/(:segment)', 'Admin\Album::edit/$1', ['filter' => 'authadmin']);
$routes->delete('/deletealbum/(:num)', 'Admin\Album::delete/$1', ['filter' => 'authadmin']);
$routes->get('/managekatalbum', 'Admin\Album::katalbum', ['filter' => 'authadmin']);
$routes->add('/album/updatekategori/(:num)', 'Admin\Album::updatekategori/$1', ['filter' => 'authadmin']);
$routes->delete('/deletekatalbum/(:num)', 'Admin\Album::deletekategori/$1', ['filter' => 'authadmin']);

// galeri
$routes->get('/viewgaleri/(:segment)', 'Admin\Album::viewgaleri/$1', ['filter' => 'authadmin']);
$routes->get('/tambahgaleri/(:segment)', 'Admin\Album::tambahgaleri/$1', ['filter' => 'authadmin']);
$routes->get('/editgaleri/(:segment)', 'Admin\Album::editgaleri/$1', ['filter' => 'authadmin']);
$routes->add('/galeri/update/(:num)', 'Admin\Album::updategaleri/$1', ['filter' => 'authadmin']);
$routes->delete('/deletegaleri/(:num)', 'Admin\Album::deletegaleri/$1', ['filter' => 'authadmin']);

//  Sosmed
$routes->get('/managemedsos', 'Admin\Sosmed::index', ['filter' => 'authadmin']);
$routes->add('/sosmed/update/(:num)', 'Admin\Sosmed::update/$1', ['filter' => 'authadmin']);

//  Text
$routes->get('/managetext', 'Admin\Text::index', ['filter' => 'authadmin']);
$routes->get('/tambahtext', 'Admin\Text::tambah', ['filter' => 'authadmin']);
$routes->get('/edittext/(:segment)', 'Admin\Text::edit/$1', ['filter' => 'authadmin']);
$routes->get('/text/simpantext', 'Admin\Text::simpan', ['filter' => 'authadmin']);
$routes->add('/text/updatetext/(:num)', 'Admin\Text::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletetext/(:num)', 'Admin\Text::delete/$1', ['filter' => 'authadmin']);

// budaya
$routes->get('/managekebudayaan', 'Admin\Budaya::index', ['filter' => 'authadmin']);
$routes->get('/tambahbudaya', 'Admin\Budaya::tambah', ['filter' => 'authadmin']);
$routes->get('/editbudaya/(:segment)', 'Admin\Budaya::edit/$1', ['filter' => 'authadmin']);
$routes->get('/managekatbudaya', 'Admin\Budaya::katbudaya', ['filter' => 'authadmin']);
$routes->add('/budaya/update/(:num)', 'Admin\Budaya::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletebudaya/(:num)', 'Admin\Budaya::delete/$1', ['filter' => 'authadmin']);
$routes->add('/budaya/updatekategori/(:num)', 'Admin\Budaya::updatekategori/$1', ['filter' => 'authadmin']);
$routes->delete('/deletekatbudaya/(:num)', 'Admin\Budaya::deletekatbudaya/$1', ['filter' => 'authadmin']);


// slider
$routes->get('/manageslider', 'Admin\Gambarslider::index', ['filter' => 'authadmin']);
$routes->get('/tambahslider', 'Admin\Gambarslider::tambah', ['filter' => 'authadmin']);
$routes->get('/gambarslider/(:segment)', 'Admin\Gambarslider::edit/$1', ['filter' => 'authadmin']);
$routes->add('/gambarslider/update/(:num)', 'Admin\Gambarslider::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deleteslider/(:num)', 'Admin\Gambarslider::delete/$1', ['filter' => 'authadmin']);


// identitas
$routes->get('/manageidentitas', 'Admin\Identitas::identitas', ['filter' => 'authadmin']);
$routes->get('/editidentitas/(:segment)', 'Admin\Identitas::edit/$1', ['filter' => 'authadmin']);
$routes->add('/identitas/update/(:num)', 'Admin\Identitas::update/$1', ['filter' => 'authadmin']);


// dusun
$routes->get('/managewilayah', 'Admin\Wilayah::index', ['filter' => 'authadmin']);
$routes->get('/tambahdusun', 'Admin\Wilayah::tambahdusun', ['filter' => 'authadmin']);
$routes->get('/editdusun/(:segment)', 'Admin\Wilayah::editdusun/$1', ['filter' => 'authadmin']);
$routes->add('/dusun/update/(:num)', 'Admin\Wilayah::updatedusun/$1', ['filter' => 'authadmin']);
$routes->delete('/deletedusun/(:num)', 'Admin\Wilayah::deletedusun/$1', ['filter' => 'authadmin']);

// rw
$routes->get('/viewrw/(:segment)', 'Admin\Wilayah::viewrw/$1', ['filter' => 'authadmin']);
$routes->get('/tambahrw/(:segment)', 'Admin\Wilayah::tambahrw/$1', ['filter' => 'authadmin']);
$routes->get('/editrw/(:segment)', 'Admin\Wilayah::editrw/$1', ['filter' => 'authadmin']);
$routes->add('/rw/update/(:num)', 'Admin\Wilayah::updaterw/$1', ['filter' => 'authadmin']);
$routes->delete('/deleterw/(:num)', 'Admin\Wilayah::deleterw/$1', ['filter' => 'authadmin']);


// rt
$routes->get('/viewrt/(:segment)', 'Admin\Wilayah::viewrt/$1', ['filter' => 'authadmin']);
$routes->get('/tambahrt/(:segment)', 'Admin\Wilayah::tambahrt/$1', ['filter' => 'authadmin']);
$routes->get('/editrt/(:segment)', 'Admin\Wilayah::editrt/$1', ['filter' => 'authadmin']);
$routes->add('/rt/update/(:num)', 'Admin\Wilayah::updatert/$1', ['filter' => 'authadmin']);
$routes->delete('/deletert/(:num)', 'Admin\Wilayah::deletert/$1', ['filter' => 'authadmin']);


// pendaftar
$routes->get('/managependaftaran', 'Admin\Pendaftar::index', ['filter' => 'authadmin']);
$routes->add('/pendaftar/updatestatus/(:num)', 'Admin\Pendaftar::updatestatus/$1', ['filter' => 'authadmin']);
$routes->get('/tambahpengguna', 'Admin\Pendaftar::tambah', ['filter' => 'authadmin']);
$routes->get('/editpengguna/(:segment)', 'Admin\Pendaftar::edit/$1', ['filter' => 'authadmin']);
$routes->add('/pengguna/update/(:num)', 'Admin\Pendaftar::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepengguna/(:num)', 'Admin\Pendaftar::delete/$1', ['filter' => 'authadmin']);

// pesan
$routes->get('/managepesanmasuk', 'Admin\Pesan::index', ['filter' => 'authadmin']);
$routes->add('/pesan/updatestatus/(:num)', 'Admin\Pesan::updatestatus/$1', ['filter' => 'authadmin']);
$routes->get('/tulispesan', 'Admin\Pesan::tulispesan', ['filter' => 'authadmin']);
$routes->get('/balaspesan/(:segment)', 'Admin\Pesan::balaspesan/$1', ['filter' => 'authadmin']);
$routes->get('/viewpesan/(:segment)', 'Admin\Pesan::viewpesan/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepesan/(:num)', 'Admin\Pesan::delete/$1', ['filter' => 'authadmin']);
$routes->get('/viewpesankeluar/(:segment)', 'Admin\Pesan::viewpesankeluar/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepesankeluar/(:num)', 'Admin\Pesan::deletepesankeluar/$1', ['filter' => 'authadmin']);


// umkm
$routes->get('/manageumkm', 'Admin\Umkm::index', ['filter' => 'authadmin']);
$routes->get('/tambahumkm', 'Admin\Umkm::tambah', ['filter' => 'authadmin']);
$routes->get('/editumkm/(:segment)', 'Admin\Umkm::edit/$1', ['filter' => 'authadmin']);
$routes->add('/umkm/update/(:num)', 'Admin\Umkm::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deleteumkm/(:num)', 'Admin\Umkm::delete/$1', ['filter' => 'authadmin']);
$routes->get('/viewanggota/(:segment)', 'Admin\Umkm::viewanggota/$1', ['filter' => 'authadmin']);
$routes->get('/tambahanggota/(:segment)', 'Admin\Umkm::tambahanggota/$1', ['filter' => 'authadmin']);
$routes->get('/editanggota/(:segment)', 'Admin\Umkm::editanggota/$1', ['filter' => 'authadmin']);
$routes->add('/anggota/update/(:num)', 'Admin\Umkm::updateanggota/$1', ['filter' => 'authadmin']);
$routes->delete('/deleteanggota/(:num)', 'Admin\Umkm::deleteanggota/$1', ['filter' => 'authadmin']);

$routes->get('/managekatumkm', 'Admin\Umkm::katumkm', ['filter' => 'authadmin']);
$routes->get('/editkatumkm/(:segment)', 'Admin\Umkm::editkategori/$1', ['filter' => 'authadmin']);
$routes->add('/umkm/updatekategori/(:num)', 'Admin\Umkm::updatekategori/$1', ['filter' => 'authadmin']);
$routes->delete('/deletekatumkm/(:num)', 'Admin\Umkm::deletekatumkm/$1', ['filter' => 'authadmin']);


// Pemilih
$routes->get('/managecalonpemilih', 'Admin\Pemilih::index', ['filter' => 'authadmin']);
$routes->get('/tambahpenduduk', 'Admin\Penduduk::tambah', ['filter' => 'authadmin']);
$routes->get('/editpenduduk/(:segment)', 'Admin\Penduduk::edit/$1', ['filter' => 'authadmin']);
$routes->add('/penduduk/update/(:num)', 'Admin\Penduduk::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletependuduk/(:num)', 'Admin\Penduduk::delete/$1', ['filter' => 'authadmin']);

// bantuan
$routes->get('/managebantuan', 'Admin\Bantuan::index', ['filter' => 'authadmin']);
$routes->get('/tambahbantuan', 'Admin\Bantuan::tambah', ['filter' => 'authadmin']);
$routes->get('/editbantuan/(:segment)', 'Admin\Bantuan::edit/$1', ['filter' => 'authadmin']);
$routes->add('/bantuan/update/(:num)', 'Admin\Bantuan::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletebantuan/(:num)', 'Admin\Bantuan::delete/$1', ['filter' => 'authadmin']);

$routes->get('/viewpenerima/(:segment)', 'Admin\Bantuan::viewpenerima/$1', ['filter' => 'authadmin']);
$routes->get('/tambahpenerima/(:segment)', 'Admin\Bantuan::tambahpenerima/$1', ['filter' => 'authadmin']);
$routes->get('/editpenerima/(:segment)', 'Admin\Bantuan::editpenerima/$1', ['filter' => 'authadmin']);
$routes->add('/penerima/update/(:num)', 'Admin\Bantuan::updatepenerima/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepenerima/(:num)', 'Admin\Bantuan::deletepenerima/$1', ['filter' => 'authadmin']);

// statistik
$routes->get('/managestatistik', 'Admin\Statistik::index', ['filter' => 'authadmin']);

// pendataan
$routes->get('/managependataan', 'Admin\Pendataan::index', ['filter' => 'authadmin']);
$routes->get('/tambahpemudik', 'Admin\Pendataan::tambah', ['filter' => 'authadmin']);
$routes->get('/editpemudik/(:segment)', 'Admin\Pendataan::edit/$1', ['filter' => 'authadmin']);
$routes->add('/pemudik/update/(:num)', 'Admin\Pendataan::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepemudik/(:num)', 'Admin\Pendataan::delete/$1', ['filter' => 'authadmin']);


// pemantauan
$routes->get('/managepemantauan', 'Admin\Pemantauan::index', ['filter' => 'authadmin']);
$routes->delete('/deletepemantauan/(:num)', 'Admin\Pemantauan::delete/$1', ['filter' => 'authadmin']);

// pemerintahan
$routes->get('/managepemerintahan', 'Admin\Pemerintahan::index', ['filter' => 'authadmin']);
$routes->get('/tambahpemerintahan', 'Admin\Pemerintahan::tambah', ['filter' => 'authadmin']);
$routes->get('/editpemerintahan/(:segment)', 'Admin\Pemerintahan::edit/$1', ['filter' => 'authadmin']);
$routes->get('/gantipemerintahan/(:segment)', 'Admin\Pemerintahan::ganti/$1', ['filter' => 'authadmin']);
$routes->add('/pemerintahan/update/(:num)', 'Admin\Pemerintahan::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepemerintahan/(:num)', 'Admin\Pemerintahan::delete/$1', ['filter' => 'authadmin']);


// dokumen
$routes->get('/managedokumen', 'Admin\Dokumen::index', ['filter' => 'authadmin']);
$routes->get('/daftardokumen/(:segment)', 'Admin\Dokumen::daftardokumen/$1', ['filter' => 'authadmin']);

$routes->get('/editpemerintahan/(:segment)', 'Admin\Pemerintahan::edit/$1', ['filter' => 'authadmin']);
$routes->get('/gantipemerintahan/(:segment)', 'Admin\Pemerintahan::ganti/$1', ['filter' => 'authadmin']);
$routes->add('/pemerintahan/update/(:num)', 'Admin\Pemerintahan::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepemerintahan/(:num)', 'Admin\Pemerintahan::delete/$1', ['filter' => 'authadmin']);

// kk
$routes->get('/managekeluarga', 'Admin\Kk::index', ['filter' => 'authadmin']);
$routes->get('/editkk/(:segment)', 'Admin\Kk::edit/$1', ['filter' => 'authadmin']);
$routes->add('/kk/update/(:num)', 'Admin\Kk::update/$1', ['filter' => 'authadmin']);
$routes->delete('/deletekk/(:num)', 'Admin\Kk::delete/$1', ['filter' => 'authadmin']);
$routes->get('/viewkk/(:segment)', 'Admin\Kk::viewkk/$1', ['filter' => 'authadmin']);
$routes->add('/kk/updatehubungan/(:num)', 'Admin\Kk::updatehubungan/$1', ['filter' => 'authadmin']);
$routes->get('/viewkeluarga/(:segment)', 'Admin\Kk::viewkeluarga/$1', ['filter' => 'authadmin']);
$routes->get('/editpenerima/(:segment)', 'Admin\Kk::editpenerima/$1', ['filter' => 'authadmin']);
$routes->delete('/deletekeluarga/(:segment)', 'Admin\Kk::deletekeluarga/$1', ['filter' => 'authadmin']);


// pengaturan
$routes->get('/managepengaturan', 'Admin\Layanansurat::pengaturansurat', ['filter' => 'authadmin']);
$routes->get('/edit_format_surat/(:segment)', 'Admin\Layanansurat::editpengaturansurat/$1', ['filter' => 'authadmin']);
$routes->add('/pengaturansurat/update/(:num)', 'Admin\Layanansurat::updatepengaturansurat/$1', ['filter' => 'authadmin']);


// cetak
$routes->get('/managecetaksurat', 'Admin\Layanansurat::cetaksurat', ['filter' => 'authadmin']);
$routes->get('/editsyarat/(:segment)', 'Admin\Layanansurat::editsyarat/$1', ['filter' => 'authadmin']);
$routes->add('/syarat/update/(:num)', 'Admin\Layanansurat::updatesyarat/$1', ['filter' => 'authadmin']);
$routes->delete('/deletesyarat/(:num)', 'Admin\Layanansurat::deletesyarat/$1', ['filter' => 'authadmin']);
$routes->add('/nonfavorit/(:num)', 'Admin\Layanansurat::nonfavorit/$1', ['filter' => 'authadmin']);
$routes->add('/favorit/(:num)', 'Admin\Layanansurat::favorit/$1', ['filter' => 'authadmin']);


// persyaratan
$routes->get('/managepersyaratan', 'Admin\Layanansurat::syarat', ['filter' => 'authadmin']);
$routes->get('/editsyarat/(:segment)', 'Admin\Layanansurat::editsyarat/$1', ['filter' => 'authadmin']);
$routes->add('/syarat/update/(:num)', 'Admin\Layanansurat::updatesyarat/$1', ['filter' => 'authadmin']);
$routes->delete('/deletesyarat/(:num)', 'Admin\Layanansurat::deletesyarat/$1', ['filter' => 'authadmin']);

// profiladmin
$routes->get('/profiladmin', 'Admin\Akun::index', ['filter' => 'authadmin']);
$routes->get('/editakun/(:segment)', 'Admin\Akun::edit/$1', ['filter' => 'authadmin']);
$routes->add('/akun/update/(:num)', 'Admin\Akun::update/$1', ['filter' => 'authadmin']);
$routes->get('/ubahpassword/(:segment)', 'Admin\Akun::ubahpassword/$1', ['filter' => 'authadmin']);
$routes->add('/akun/updatepassword/(:num)', 'Admin\Akun::updatepassword/$1', ['filter' => 'authadmin']);
$routes->get('/tambahkades', 'Admin\Akun::tambahkades', ['filter' => 'authadmin']);
$routes->delete('/deletekades/(:num)', 'Admin\Akun::deletekades/$1', ['filter' => 'authadmin']);

// permohonan
$routes->get('/managepermohonan', 'Admin\Permohonan::index', ['filter' => 'authadmin']);
$routes->get('/editsyarat/(:segment)', 'Admin\Permohonan::editsyarat/$1', ['filter' => 'authadmin']);
$routes->add('/syarat/update/(:num)', 'Admin\Permohonan::updatesyarat/$1', ['filter' => 'authadmin']);
$routes->delete('/deletepermohonan/(:num)', 'Admin\Permohonan::delete/$1', ['filter' => 'authadmin']);
$routes->get('/periksapermohonan/(:num)', 'Admin\Permohonan::periksa/$1', ['filter' => 'authadmin']);
$routes->add('/permohonan/update/(:num)', 'Admin\Permohonan::updatepermohonan/$1', ['filter' => 'authadmin']);
$routes->add('/belumlengkap/(:num)', 'Admin\Permohonan::belumlengkap/$1', ['filter' => 'authadmin']);
$routes->add('/addpermohonan/(:segment)', 'Admin\Permohonan::addpermohonan/$1', ['filter' => 'authadmin']);
$routes->add('/aktaselesai/update/(:num)', 'Admin\Permohonan::aktaselesai/$1', ['filter' => 'authadmin']);

$routes->get('/admin_surat_ket_pengantar/(:segment)', 'Admin\Permohonan::ket_pengantar/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_ket_jual_beli/(:segment)', 'Admin\Permohonan::ket_jualbeli/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_ket_catatan_kriminal/(:segment)', 'Admin\Permohonan::ket_kriminal/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_ket_kurang_mampu/(:segment)', 'Admin\Permohonan::ket_kurangmampu/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_ket_usaha/(:segment)', 'Admin\Permohonan::ket_usaha/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_izin_keramaian/(:segment)', 'Admin\Permohonan::ket_keramaian/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_ket_kehilangan/(:segment)', 'Admin\Permohonan::ket_kehilangan/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_jalan/(:segment)', 'Admin\Permohonan::ket_jalan/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_ket_domisili_usaha/(:segment)', 'Admin\Permohonan::ket_domisili/$1', ['filter' => 'authadmin']);
$routes->get('/admin_surat_permohonan_akta/(:segment)', 'Admin\Permohonan::ket_akta/$1', ['filter' => 'authadmin']);

// Kades
$routes->get('/kades', 'Kades\Home::index', ['filter' => 'authkades']);
$routes->get('/permohonansurat', 'Kades\Permohonan::index', ['filter' => 'authkades']);
$routes->get('/viewapproved/(:segment)', 'Kades\Permohonan::viewapproved/$1', ['filter' => 'authkades']);
$routes->add('/approve/(:segment)', 'Kades\Permohonan::approve/$1', ['filter' => 'authkades']);
$routes->get('/setting', 'Kades\Setting::index/$1', ['filter' => 'authkades']);
$routes->get('/tambahsetting', 'Kades\Setting::tambah/$1', ['filter' => 'authkades']);
$routes->get('/editsetting/(:segment)', 'Kades\Setting::edit/$1', ['filter' => 'authkades']);
$routes->delete('/deletesetting/(:num)', 'Kades\Setting::delete/$1', ['filter' => 'authkades']);
$routes->add('/setting/updatefile/(:segment)', 'Kades\Setting::updatefile/$1', ['filter' => 'authkades']);

$routes->get('/managestatistikkades', 'Kades\Statistik::index', ['filter' => 'authkades']);

$routes->get('/view_surat_ket_pengantar/(:segment)', 'Kades\Permohonan::ket_pengantar/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_ket_jual_beli/(:segment)', 'Kades\Permohonan::ket_jualbeli/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_ket_catatan_kriminal/(:segment)', 'Kades\Permohonan::ket_kriminal/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_ket_kurang_mampu/(:segment)', 'Kades\Permohonan::ket_kurangmampu/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_ket_usaha/(:segment)', 'Kades\Permohonan::ket_usaha/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_izin_keramaian/(:segment)', 'Kades\Permohonan::ket_keramaian/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_ket_kehilangan/(:segment)', 'Kades\Permohonan::ket_kehilangan/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_jalan/(:segment)', 'Kades\Permohonan::ket_jalan/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_ket_domisili_usaha/(:segment)', 'Kades\Permohonan::ket_domisili/$1', ['filter' => 'authkades']);
$routes->get('/view_surat_permohonan_akta/(:segment)', 'Kades\Permohonan::ket_akta/$1', ['filter' => 'authkades']);

// profilkades
$routes->get('/profilkades', 'Kades\Akun::index', ['filter' => 'authkades']);
$routes->get('/editakunkades/(:segment)', 'Kades\Akun::edit/$1', ['filter' => 'authkades']);
$routes->add('/akunkades/update/(:num)', 'Kades\Akun::update/$1', ['filter' => 'authkades']);
$routes->get('/ubahpasswordkades/(:segment)', 'Kades\Akun::ubahpassword/$1', ['filter' => 'authkades']);
$routes->add('/akun/updatepasswordkades/(:num)', 'Kades\Akun::updatepassword/$1', ['filter' => 'authkades']);
$routes->add('/privasi/(:num)', 'Kades\Akun::privasi/$1', ['filter' => 'authkades']);


$routes->get('/loginkades', 'Kades\Login::index');


// User
$routes->get('/layananmandiri', 'User\Login::index');
$routes->get('/pengajuan', 'User\Login::register');
$routes->get('/userkeluar', 'User\Login::logout');
$routes->get('/user', 'User\Home::index', ['filter' => 'auth']);

// Gantipin
$routes->get('/gantipin', 'User\Gantipin::index', ['filter' => 'auth']);

// Pesanuser
$routes->get('/pesanuser', 'User\Pesanuser::index', ['filter' => 'auth']);
$routes->get('/pesankeluaruser', 'User\Pesanuser::pesankeluar', ['filter' => 'auth']);
$routes->get('/tulispesanuser', 'User\Pesanuser::tulispesan', ['filter' => 'auth']);
$routes->get('/lihatpesan/(:segment)', 'User\Pesanuser::lihatpesan/$1', ['filter' => 'auth']);
$routes->get('/lihatpesankeluar/(:segment)', 'User\Pesanuser::lihatpesankeluar/$1', ['filter' => 'auth']);

// Surat
$routes->get('/surat', 'User\Surat::index', ['filter' => 'auth']);
$routes->get('/buatpermohonan', 'User\Surat::buatsurat', ['filter' => 'auth']);
$routes->add('/batalkanpermohonan/(:segment)', 'User\Surat::batalkanpermohonan/$1', ['filter' => 'auth']);
$routes->add('/kirimlagi/(:segment)', 'User\Surat::kirimlagi/$1', ['filter' => 'auth']);
$routes->add('/permohonanselesai/(:segment)', 'User\Surat::permohonanselesai/$1', ['filter' => 'auth']);

$routes->get('/surat_ket_pengantar/(:segment)', 'User\Surat::suratketpengantar/$1', ['filter' => 'auth']);
$routes->get('/surat_ket_jual_beli/(:segment)', 'User\Surat::suratketjualbeli/$1', ['filter' => 'auth']);
$routes->get('/surat_ket_catatan_kriminal/(:segment)', 'User\Surat::suratketcatatankriminal/$1', ['filter' => 'auth']);
$routes->get('/surat_ket_kurang_mampu/(:segment)', 'User\Surat::suratketkurangmampu/$1', ['filter' => 'auth']);
$routes->get('/surat_ket_usaha/(:segment)', 'User\Surat::suratketusaha/$1', ['filter' => 'auth']);
$routes->get('/surat_izin_keramaian/(:segment)', 'User\Surat::suratizinkeramian/$1', ['filter' => 'auth']);
$routes->get('/surat_ket_kehilangan/(:segment)', 'User\Surat::suratketkehilangan/$1', ['filter' => 'auth']);
$routes->get('/surat_jalan/(:segment)', 'User\Surat::suratjalan/$1', ['filter' => 'auth']);
$routes->get('/surat_ket_domisili_usaha/(:segment)', 'User\Surat::suratketdomisiliusaha/$1', ['filter' => 'auth']);
$routes->get('/surat_permohonan_akta/(:segment)', 'User\Surat::suratpermohonanakta/$1', ['filter' => 'auth']);


$routes->add('/download_surat_ket_pengantar/(:segment)', 'User\Surat::ket_pengantar/$1', ['filter' => 'auth']);
$routes->add('/download_surat_ket_jual_beli/(:segment)', 'User\Surat::ket_jualbeli/$1', ['filter' => 'auth']);
$routes->add('/download_surat_ket_catatan_kriminal/(:segment)', 'User\Surat::ket_kriminal/$1', ['filter' => 'auth']);
$routes->add('/download_surat_ket_kurang_mampu/(:segment)', 'User\Surat::ket_kurangmampu/$1', ['filter' => 'auth']);
$routes->add('/download_surat_ket_usaha/(:segment)', 'User\Surat::ket_usaha/$1', ['filter' => 'auth']);
$routes->add('/download_surat_izin_keramaian/(:segment)', 'User\Surat::ket_keramaian/$1', ['filter' => 'auth']);
$routes->add('/download_surat_ket_kehilangan/(:segment)', 'User\Surat::ket_kehilangan/$1', ['filter' => 'auth']);
$routes->add('/download_surat_jalan/(:segment)', 'User\Surat::ket_jalan/$1', ['filter' => 'auth']);
$routes->add('/download_surat_ket_domisili_usaha/(:segment)', 'User\Surat::ket_domisili/$1', ['filter' => 'auth']);




// Programbantuan
$routes->get('/programbantuan', 'User\Programbantuan::index', ['filter' => 'auth']);
$routes->get('/download/(:segment)', 'User\Programbantuan::download/$1', ['filter' => 'auth']);


// Dokumen
$routes->get('/dokumenuser', 'User\Dokumen::index', ['filter' => 'auth']);
$routes->get('/tambahdokumenuser', 'User\Dokumen::tambah', ['filter' => 'auth']);
$routes->get('/editdokumenuser/(:segment)', 'User\Dokumen::edit/$1', ['filter' => 'auth']);
$routes->add('/dokumenuser/update/(:num)', 'User\Dokumen::update/$1', ['filter' => 'auth']);
$routes->delete('/deletedokumenuser/(:num)', 'User\Dokumen::delete/$1', ['filter' => 'auth']);

//------ Route Web Desa Untuk User ------//
$routes->get('/profil', 'Home::profil');
$routes->get('/galeri/(:segment)', 'Home::galeri/$1');
$routes->get('/umkm', 'Home::umkm');
$routes->get('/kebudayaan', 'Home::kebudayaan');
$routes->get('/kebudayaan/detail/(:segment)', 'Home::kebudayaanDetail/$1');
$routes->get('/artikel', 'Home::artikel');
$routes->get('/artikel/detail/(:segment)', 'Home::artikelDetail/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
