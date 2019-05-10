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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=> 'user'],function(){
	Route::resource('type', 'TypeController');
	Route::resource('room', 'RoomController');
	Route::resource('employee', 'EmployeeController');
	Route::resource('item', 'ItemController');
	Route::get('/supply/{id}','SupplyController@index')->name('supply');
	Route::post('/supply','SupplyController@store')->name('supply.store');
	
	Route::resource('borrow_detail', 'BorrowDetailController');
	Route::resource('user','UserController');
	//Report
	Route::get('laporan/','ReportController@index')->name('report.index');
	Route::get('report/{param}','ReportController@create')->name('report.create');
	Route::get('barang','ReportController@barang')->name('report.barang');
	Route::get('ruang/','ReportController@ruang')->name('report.ruang');
	// Route::get('ruang/tampil/', 'ReportController@load_ruang')->name('report.load');	
	Route::post('ruang/tampil/', 'ReportController@load_ruang')->name('report.load');	
});

Route::group(['prefix'=>'pegawai', 'middleware' => 'employee'],function(){
	Route::get('dashboard',function(){
		return view('templates.employee');
	})->name('emp.dash');
	
});
Route::resource('borrow','BorrowController');
Route::resource('broken_item','BrokenItemController');
Route::get('borrow/detail/{borrow}','BorrowController@detail')->name('detail');

Route::get('dashboard',function(){
	return view('templates.dashboard');
})->name('dash');


Route::get('login/emp','EmployeeAuth\LoginController@show')->name('emp.show');
Route::post('login/emp','EmployeeAuth\LoginController@login')->name('emp.login');
Route::post('logout/emp','EmployeeAuth\LoginController@logout')->name('emp.logout');

