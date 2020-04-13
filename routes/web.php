<?php

//use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/homeAdmin', 'HomeController@index')->name('admin/home');
    //datamember
    Route::get('/datamember', 'MemberController@showData')->name('admin/datamember');
    Route::post('/datamember', 'MemberController@tambah')->name('addmember');
    Route::get('/datamember/create', 'MemberController@create')->name('tambahmember');
    Route::get('/datamember/{id}/delete', 'MemberController@destroy')->name('deletemember');
    Route::get('/datamember/{id}', 'MemberController@editdata')->name('editmember');
    Route::post('/datamember/{id}', 'MemberController@updatedata')->name('updatemember');

    //dataoutlet
    Route::get('/dataoutlet', 'OutletController@showData')->name('admin/dataoutlet');
    Route::post('/dataoutlet', 'OutletController@tambah')->name('addoutlet');
    Route::get('/dataoutlet/create', 'OutletController@create')->name('tambahoutlet');
    Route::get('/dataoutlet/{id}/delete', 'OutletController@destroy')->name('deleteoutlet');
    Route::get('/dataoutlet/{id}', 'OutletController@editdata')->name('editoutlet');
    Route::post('/dataoutlet/{id}', 'OutletController@updatedata')->name('updateoutlet');

    //datapaket
    Route::get('/datapaket', 'PaketController@showData')->name('admin/datapaket');
    Route::post('/datapaket', 'PaketController@tambah')->name('addpaket');
    Route::get('/datapaket/create', 'PaketController@create')->name('tambahpaket');
    Route::get('/datapaket/{id}/delete', 'PaketController@destroy')->name('deletepaket');
    Route::get('/datapaket/{id}', 'PaketController@editdata')->name('editpaket');
    Route::post('/datapaket/{id}', 'PaketController@updatedata')->name('updatepaket');

    //transaksi
    Route::get('/datatransaksi', 'TransaksiController@showData')->name('admin/datatransaksi');
    Route::post('/datatransaksi', 'TransaksiController@tambah')->name('addtransaksi');
    Route::get('/datatransaksi/create', 'TransaksiController@create')->name('tambahtransaksi');
    Route::get('/datatransaksi/naikkan_status/{id}','TransaksiController@naikkan_status');
    Route::get('/datatransaksi/naikkan_status_pembayaran/{id}','TransaksiController@naikkan_status_pembayaran');
    Route::get('/datatransaksi/{id}/delete', 'TransaksiController@destroy')->name('deletetransaksi');

    //status pesanan
    Route::get('/datastatuspesan', 'StatusPesananController@showData')->name('admin/datastatuspesan');
    Route::post('/datastatuspesan', 'StatusPesananController@tambah')->name('add');
    Route::get('/datastatuspesan/create', 'StatusPesananController@create')->name('tambah');
    Route::get('/datastatuspesan/{id}/delete', 'StatusPesananController@destroy')->name('delete');
    Route::get('/datastatuspesan/{id}', 'StatusPesananController@editdata')->name('edit');
    Route::post('/datastatuspesan/{id}', 'StatusPesananController@updatedata')->name('update');

    //status pembayaran
    Route::get('/datastatusbayar', 'StatusPembayaranController@showData')->name('admin/datastatuspesan');
    Route::post('/datastatusbayar', 'StatusPembayaranController@tambah')->name('add');
    Route::get('/datastatusbayar/create', 'StatusPembayaranController@create')->name('tambah');
    Route::get('/datastatusbayar/{id}/delete', 'StatusPembayaranController@destroy')->name('delete');
    Route::get('/datastatusbayar/{id}', 'StatusPembayaranController@editdata')->name('edit');
    Route::post('/datastatusbayar/{id}', 'StatusPembayaranController@updatedata')->name('update');

});

Route::group(['prefix' => '/kasir', 'middleware' => ['auth', 'kasir']], function () {
    Route::get('/homeKasir', 'HomeController@indexKasir')->name('kasir/homeKasir');

    //datamember
    Route::get('/datamember', 'MemberController@showDataKasir')->name('datamember');
    Route::post('/datamember', 'MemberController@tambahKasir')->name('addmember');
    Route::get('/datamember/create', 'MemberController@createKasir')->name('tambahmember');
    Route::get('/datamember/{id}/delete', 'MemberController@destroyKasir')->name('deletemember');
    Route::get('/datamember/{id}', 'MemberController@editdataKasir')->name('editmember');
    Route::post('/datamember/{id}', 'MemberController@updatedataKasir')->name('updatemember');

    //transaksi
    Route::get('/datatransaksi', 'TransaksiController@showDataKasir')->name('admin/datatransaksi');
    Route::post('/datatransaksi', 'TransaksiController@tambahKasir')->name('addtransaksi');
    Route::get('/datatransaksi/create', 'TransaksiController@createKasir')->name('tambahtransaksi');
    Route::get('/datatransaksi/naikkan_status/{id}','TransaksiController@naikkan_statusKasir');
    Route::get('/datatransaksi/naikkan_status_pembayaran/{id}','TransaksiController@naikkan_status_pembayaranKasir');
    Route::get('/datatransaksi/{id}/delete', 'TransaksiController@destroyKasir')->name('deletetransaksi');

});

