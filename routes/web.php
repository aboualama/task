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

Route::get('/', 'HomeController@task') ; 
Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => 'setting:registration'] , function(){
	
	Auth::routes();
	Route::get('/user/edit', 'auth\registercontroller@edit');
	Route::put('/user/edit', 'auth\registercontroller@update');

});
 
Route::group(['middleware' => 'setting:contact'] , function(){

	Route::get('/contact', 'Admin\contactController@show');
	Route::post('/contact', 'Admin\contactController@contact');

});
 
Route::group(['middleware' => 'setting:page'] , function(){

	Route::get('/page/{name}', 'Admin\pagecontroller@show');

}); 


Route::get('/test',  function(){   /// test page

	return view('test');

}); 
Route::get('/category/{name}', 'categorycontroller@show');