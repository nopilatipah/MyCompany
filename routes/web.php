<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
	Route::resource('akun','AkunController');
	Route::resource('artikel','ArtikelController');
	Route::resource('profil','ProfilController');
	Route::resource('kejuruan','KejuruanController');
	Route::resource('fasilitas','FasilitasController');
	Route::resource('prestasi','PrestasiController');
	Route::resource('ekskul','EkskulController');
	Route::resource('komponen','KomponenController');
	Route::resource('kategori-ekskul','KatEkskulController');
	Route::resource('kategori-artikel','KatArtikelController');
	Route::resource('utama','UtamaController');
	Route::resource('maps','MapsController');
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