<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
// Admin Access //
Route::match(['get', 'post'], '/access/admin-site/login', 'Access@admin_login')->name('accessAdmin.login');

Route::match(['get','post'], '/admin/index', 'Admins@all')->name('admins.all');
Route::match(['get','post'], '/admin/create', 'Admins@create')->name('admins.create');
Route::match(['get','post'], '/admin/edit/{id}', 'Admins@edit')->name('admins.edit');

// START OF ADMIN PANEL ROUTE //
Route::match(['get','post'], '/jenis-user/index', 'JenisUser@all')->name('jenisUser.all');
Route::match(['get','post'], '/jenis-user/create', 'JenisUser@create')->name('jenisUser.create');
Route::match(['get','post'], '/jenis-user/edit/{id}', 'JenisUser@edit')->name('jenisUser.edit');

Route::match(['get','post'], '/otoritas-admin/index', 'OtoritasAdmin@all')->name('otoritasAdmin.all');
Route::match(['get','post'], '/otoritas-admin/create', 'OtoritasAdmin@create')->name('otoritasAdmin.create');
Route::match(['get','post'], '/otoritas-admin/edit/{id}', 'OtoritasAdmin@edit')->name('otoritasAdmin.edit');

Route::match(['get','post'], '/size/index', 'Size@all')->name('size.all');
Route::match(['get','post'], '/size/create', 'Size@create')->name('size.create');
Route::match(['get','post'], '/size/edit/{id}', 'Size@edit')->name('size.edit');

Route::match(['get','post'], '/jenis-poin/index', 'JenisPoin@all')->name('jenisPoin.all');
Route::match(['get','post'], '/jenis-poin/create', 'JenisPoin@create')->name('jenisPoin.create');
Route::match(['get','post'], '/jenis-poin/edit/{id}', 'JenisPoin@edit')->name('jenisPoin.edit');

Route::match(['get','post'], '/jenis-pakaian/index', 'JenisPakaian@all')->name('jenisPakaian.all');
Route::match(['get','post'], '/jenis-pakaian/create', 'JenisPakaian@create')->name('jenisPakaian.create');
Route::match(['get','post'], '/jenis-pakaian/edit/{id}', 'JenisPakaian@edit')->name('jenisPakaian.edit');

Route::match(['get','post'], '/bahan-print-pakaian/index', 'BahanPrintPakaian@all')->name('bahanPrintPakaian.all');
Route::match(['get','post'], '/bahan-print-pakaian/create', 'BahanPrintPakaian@create')->name('bahanPrintPakaian.create');
Route::match(['get','post'], '/bahan-print-pakaian/edit/{id}', 'BahanPrintPakaian@edit')->name('bahanPrintPakaian.edit');

Route::match(['get','post'], '/luas-daerah-print/index', 'LuasDaerahPrint@all')->name('luasDaerahPrint.all');
Route::match(['get','post'], '/luas-daerah-print/create', 'LuasDaerahPrint@create')->name('luasDaerahPrint.create');
Route::match(['get','post'], '/luas-daerah-print/edit/{id}', 'LuasDaerahPrint@edit')->name('luasDaerahPrint.edit');

Route::match(['get','post'], '/warna-pakaian/index', 'WarnaPakaian@all')->name('warnaPakaian.all');
Route::match(['get','post'], '/warna-pakaian/create', 'WarnaPakaian@create')->name('warnaPakaian.create');
Route::match(['get','post'], '/warna-pakaian/edit/{id}', 'WarnaPakaian@edit')->name('warnaPakaian.edit');

Route::match(['get','post'], '/variasi-pakaian/index', 'VariasiPakaian@all')->name('variasiPakaian.all');
Route::match(['get','post'], '/variasi-pakaian/create', 'VariasiPakaian@create')->name('variasiPakaian.create');
Route::match(['get','post'], '/variasi-pakaian/edit/{id}', 'VariasiPakaian@edit')->name('variasiPakaian.edit');

Route::match(['get','post'], '/harga-dasar-pakaian/index', 'HargaDasarPakaian@all')->name('hargaDasarPakaian.all');
Route::match(['get','post'], '/harga-dasar-pakaian/create', 'HargaDasarPakaian@create')->name('hargaDasarPakaian.create');
Route::match(['get','post'], '/harga-dasar-pakaian/edit/{id}', 'HargaDasarPakaian@edit')->name('hargaDasarPakaian.edit');

Route::match(['get','post'], '/pakaian/index', 'Pakaian@all')->name('pakaian.all');
Route::match(['get','post'], '/pakaian/create', 'Pakaian@create')->name('pakaian.create');
Route::match(['get','post'], '/pakaian/edit/{id}', 'Pakaian@edit')->name('pakaian.edit');

// Users will have two sub types : users and designers
Route::get('/users/index', 'Users@all')->name('users.all');
Route::match(['get','post'], '/users/base/index', 'Users@base_all')->name('baseUsers.all');
Route::match(['get','post'], '/users/designers/index', 'Users@designer_all')->name('designersUsers.all');
Route::match(['get','post'], '/users/create', 'Users@create')->name('users.create');
Route::match(['get','post'], '/users/edit/{id}', 'Users@edit')->name('users.edit');
// END OF ADMIN PANEL ROUTE

// Belows are AJAX functions
Route::match(['get','post'], '/search/variasi-pakaian/', 'Search@VariasiPakaian')->name('searchVariasiPakaian');


// Test functions 
Route::match(['get','post'], '/test-password/{password}', 'Users@check_password');


// Check connection
Route::get('checkingConnection',function(){
    if(DB::connection()){
        return "Connected";
    }else{
        return "Hello world";
    }
});
