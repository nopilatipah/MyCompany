<?php

Route::get('/','FrontController@index');
Route::get('/profil','FrontController@profil');
Route::get('/kejuruan','FrontController@kejuruan');
Route::get('/fasilitas','FrontController@fasilitas');
Route::get('/ekstrakurikuler','FrontController@ekskul');
Route::get('/prestasi','FrontController@prestasi');
Route::get('/berita','FrontController@berita');
Route::post('/berita', 'FrontController@search');
Route::get('/kontak','FrontController@kontak');
Route::post('/kontak','PesanController@store');
Route::get('/baca-selengkapnya/{id}','FrontController@selengkapnya');
Route::get('/like/{id}','FrontController@like');
Route::get('/unlike/{id}','FrontController@unlike');
Route::get('/kategori/{id}','FrontController@kategori');
Route::post('/komentar','FrontController@komentar');
Route::get('/galeri','FrontController@galeri');
Route::get('/detail-kejuruan/{id}','FrontController@detailkejuruan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
	Route::resource('akun','AkunController');
	Route::resource('artikel','ArtikelController');
	Route::resource('profil','ProfilController');
	Route::resource('kejuruan','KejuruanController');
	// Route::resource('fasilitas','FasilitasController');
	Route::resource('prestasi','PrestasiController');
	Route::resource('ekskul','EkskulController');
	// Route::resource('komponen','KomponenController');
	Route::resource('kategori-ekskul','KatEkskulController');
	Route::resource('kategori-fasilitas','KatFasilitasController');
	Route::resource('kategori-artikel','KatArtikelController');
	Route::resource('utama','UtamaController');
	Route::resource('maps','MapsController');
	Route::resource('perusahaan','PerusahaanController');
	Route::get('perusahaans/{id}','PerusahaanController@pers');
	Route::get('fasilitass/{id}','FasilitasController@fas');
	Route::resource('pesan','PesanController');
	Route::resource('kontak','KontakController');
	Route::resource('fasilitas','FasilitasController');
	Route::resource('alumni','AlumniController');
});

Route::get('vendor/add', function()
{
	return View::make('backend.utama.maps.add');
});

Route::get('vendor/{id}', function($id)
{
	$vendor = Vendor::find($id);
	return View::make('backend.utama.maps.vendor', compact('vendor'));
});

Route::post('vendor/add', function()
{
	App\Vendor::create(Input::all());
	var_dump('lokasi ditambahkan');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
