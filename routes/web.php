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


Auth::routes();
// Authentication Routes...
Route::get('admin', 'HomeController@index');
Route::get('admin_login', 'Auth\LoginAdminOPController@showLoginForm');
Route::post('proc_admin', 'Auth\LoginAdminOPController@login')->name('login-admin');
Route::post('logout_admin', 'Auth\LoginAdminOPController@logout')->name('admlgt');

Route::get('/', 'HomePagePeminjam@index')->name('home');
Route::get('/pinjaman', 'HomePagePeminjam@pinjaman');
Route::get('/user/barang', 'HomePagePeminjam@barang');
Route::post('/user/proc_pinjam', 'HomePagePeminjam@proc_pinjam')->name("proc_pinjam");
Route::get('/user/detail_pinjam/{id}', 'HomePagePeminjam@detail_pinjam');
Route::get('/user/delete_detail_barang/{ida}/{idb}', 'HomePagePeminjam@delete_detail_barang');
Route::post('/user/send_pinjam', 'HomePagePeminjam@send_pinjam')->name('send_pinjam');

Route::get('/users/cari','UsersController@search');
Route::resource('/users','UsersController');
Route::get('/barang/cari','BarangController@search');
Route::resource('/barang','BarangController');
Route::get('/supplier/cari','SupplierController@search');
Route::resource('/supplier','SupplierController');
Route::get('/kategori/cari','KategoriController@search');
Route::resource('/kategori','KategoriController');
Route::get('/lokasi/cari','LokasiController@search');
Route::resource('/lokasi','LokasiController');


Route::get('barang-sementara/delete/{id}','BarangMasukController@remove');
Route::get('barang-masuk/getBarangSementara','BarangMasukController@getBarangSementara');
Route::get('barang-masuk/getBarang/{param?}','BarangMasukController@fetchBarang');

Route::get('barang-masuk/cari','BarangMasukController@search');
Route::post('barang-masuk/saveBarangSementara','BarangMasukController@saveBarangSementara');
Route::resource('/barang-masuk','BarangMasukController');



Route::get('barang-keluar/getBarangSementara','BarangKeluarController@getBarangSementara');
Route::get('barang-keluar/getBarang/{param?}','BarangKeluarController@fetchBarang');
Route::post('barang-keluar/saveBarangSementara','BarangKeluarController@saveBarangSementara');
Route::get('barang-keluar/cari','BarangKeluarController@search');
Route::resource('/barang-keluar','BarangKeluarController');


Route::get('pinjam-barang/cari','PinjamBarangController@search');
Route::get('pinjam-barang/kembalikan/{id}','PinjamBarangController@kembalikan');
Route::post('pinjam-barang/kembalikan/{id}','PinjamBarangController@kembalikanSave');
Route::get('pinjam-barang/getBarangSementara','PinjamBarangController@getBarangSementara');
Route::get('pinjam-barang/getBarang/{param?}','PinjamBarangController@fetchBarang');
Route::post('pinjam-barang/saveBarangSementara','PinjamBarangController@saveBarangSementara');
Route::resource('/pinjam-barang','PinjamBarangController');
Route::get("/admin/pinjaman/{id}/verify", 'PinjamBarangController@verify');
Route::get("/admin/pinjaman/{id}/kembali", 'PinjamBarangController@kembali');
Route::get("/admin/pinjaman/{id}/detail", 'PinjamBarangController@detail_pinjam');


Route::get('/stok-barang','BarangController@stok');
Route::get('/stok-data','BarangController@stokData');
Route::get('/database','HomeController@database');
Route::get('/database/export','HomeController@export');
Route::post('/database/import','HomeController@import');
Route::post('/database/reset','HomeController@reset');

Route::get('/laporan','LaporanController@index');
Route::get('/laporan/barang-masuk/cetak','LaporanController@barangMasukCetak');
Route::get('/laporan/barang-masuk','LaporanController@barangMasuk');
Route::get('/laporan/barang-keluar/cetak','LaporanController@barangKeluarCetak');
Route::get('/laporan/barang-keluar','LaporanController@barangKeluar');
Route::get('/laporan/pinjam-barang/cetak','LaporanController@pinjamBarangCetak');
Route::get('/laporan/pinjam-barang','LaporanController@pinjamBarang');
Route::get('/laporan/peminjaman-barang','LaporanController@pinjamBarang');


Route::get('/admin/pinjaman','PinjamBarangController@index');
Route::get('/admin/pinjaman/cari','PinjamBarangController@search');

Route::get('/tambah', function () {
return view('inputdata');
});
//menerapkan aksi terhadap aktivitas yang diinputkan pada halaman input data menuju controller
Route::get('/lokasi', 'LokasiController@index');
Route::get('/lokasi/create', 'LokasiController@create');



                    // <li><a href="{{ url('/suppliers') }}">Supplier</a></li>
                    // <li><a href="{{ url('/users') }}">User</a></li>
                    // <li><a href="{{ url('/barang') }}">Barang</a></li>
                    // <li><a href="{{ url('/barang-masuk') }}">Tambah Barang Masuk</a></li>
                    // <li><a href="{{ url('/barang-keluar') }}">Tambah Barang Keluar</a></li>
                    // <li><a href="{{ url('/pinjam-barang') }}">Pinjam Barang</a></li>