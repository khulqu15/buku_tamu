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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'VideoController@index');
Route::get('/fitur', function() {
    return view('pages.pilih');
});

Route::get('/login', function() {
    if(Auth::check()) {
        return redirect('/dashboard')->with('error', 'Anda Sudah Login');
    }
    return view('pages.login');
});
Route::post('/login/post', 'UserController@login');

// buku_tamu
/* Webcam */ Route::post('/buku_tamu/{token}/foto/click/pegawai/{id}', 'TamuController@webcam');
Route::get('/buku_tamu', 'TamuController@create');
Route::post('/buku_tamu/add', 'TamuController@store');
Route::get('/buku_tamu/{token}/foto/pegawai/{id}', 'TamuController@webcamPage');
Route::get('/buku_tamu/{token}/pegawai/{id}', 'TamuController@show');
Route::post('/buku_tamu/{token}/pegawai/{id}/pdf', 'TamuController@cetak');
Route::get('/buku_tamu/{token}/pegawai/{id}/pdf', 'TamuController@cetak');
Route::get('/buku_tamu/fix/{token}/pegawai/{id}', 'TamuController@edit');
Route::post('/buku_tamu/fix/{token}/pegawai/{id}/updated', 'TamuController@update');

// simpan_pinjam
Route::get('/simpan_pinjam', 'InventarisController@index');
Route::get('/pengembalian', function() {
    return view('pages.pengembalian');
});
Route::get('/pinjam/barang/{id}', 'InventarisController@show');
Route::post('/pinjam/barang/{id}/{kode}', 'InventarisController@pinjam');
Route::get('/pinjam/barang/{id}/{kode}/foto', 'InventarisController@pinjam_foto');
Route::post('/pinjam/{id}/{kode}/foto/clicked', 'InventarisController@webcam');
Route::get('/pinjam/barang/{id}/transaksi/{kode}', 'InventarisController@getCode');
Route::post('/pinjam/barang/{id}/transaksi/{kode}/update', 'InventarisController@update_alone');
/* Searching */ Route::post('/pengembalian/search', 'TransaksiController@search');
                Route::post('/peminjaman/search', 'InventarisController@peminjaman_search');
/* Kembalikan */Route::get('/kembali/barang/{id}/transaksi/{kode}', 'TransaksiController@kembali');
/* Make PDF  */ Route::get('/transaksi/{kode_tf}/pdf', 'TransaksiController@pdf');
                Route::get('/transaksi/{kode_tf}/pdf', 'TransaksiController@pdf');

// Dashboard
// Route::get('/dashboard', 'DashboardController@index');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('/pegawai', 'DashboardController@pegawai');
    Route::get('/pegawai/search', 'DashboardController@pegawai_search')->name('live_search.action');
    Route::get('/pegawai_delete/{id}', 'DashboardController@pegawai_destroy');
    Route::get('/pegawai/{id}', 'DashboardController@pegawai_show');
    Route::post('/pegawai/{id}/update', 'DashboardController@pegawai_update');
    Route::post('/pegawai/add', 'DashboardController@pegawai_store');
    Route::get('/pegawai/search/{name}', 'DashboardController@pegawai_result');

    Route::get('/siswa', 'SiswaController@index');
    Route::get('/siswa/search', 'SiswaController@siswa_search');
    Route::post('/siswa/add', 'SiswaController@store');
    Route::get('/siswa_delete/{id}', 'SiswaController@destroy');
    Route::get('/siswa/{id}', 'SiswaController@show');
    Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::get('/siswa/search/{name}', 'SiswaController@siswa_result');

    Route::get('/tamu', 'TamuController@index');
    Route::get('/tamu/search', 'TamuController@tamu_search');
    Route::get('/tamu_delete/{id}', 'TamuController@destroy');

    Route::get('/barang', 'InventarisController@index_dashboard');
    Route::get('/barang/search', 'InventarisController@barang_search');
    Route::post('/barang/add', 'InventarisController@store');
    Route::get('/barang_delete/{id}', 'InventarisController@destroy');
    Route::get('/barang/{id}', 'InventarisController@edit');
    Route::post('/barang/{id}/update', 'InventarisController@update');

    Route::get('/transaksi', 'TransaksiController@index');
    Route::get('/transaksi/search', 'TransaksiController@transaksi_search');
    Route::get('/transaksi_delete/{id}', 'TransaksiController@destroy');
});

