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

// Route::get('/home', 'HomeController@task') ; 
Route::get('/', 'HomeController@index')->name('home');



Route::group(['middleware' => 'setting:registration'] , function(){
	
	Auth::routes(); 
	Route::group(['middleware' => 'activeuser:active'] , function(){
		Route::get('/user/edit', 'auth\registercontroller@edit');
		Route::put('/user/edit', 'auth\registercontroller@update');
	});
});
 
Route::group(['middleware' => 'setting:contact'] , function(){ 
	Route::get('/contact', 'Admin\contactController@show');
	Route::post('/contact', 'Admin\contactController@contact'); 
});
 
Route::group(['middleware' => 'setting:page'] , function(){ 
	Route::get('/page/{name}', 'Admin\pagecontroller@show'); 
}); 

 
Route::group(['middleware' => 'setting:e_commerce'] , function(){  
	Route::group(['middleware' => 'setting:category'] , function(){  
		Route::get('/category/{name}', 'categorycontroller@show'); 
	}); 

	 
	Route::group(['middleware' => 'setting:product'] , function(){  
		Route::get('/product/{id}', 'Admin\productcontroller@show'); 
	}); 

	 
	// Route::group(['middleware' => 'setting:cart'] , function(){  
		Route::get('/cart', 'cartcontroller@show');
		Route::get('/cart/add/{id}', 'cartcontroller@add'); 
		Route::put('/cart/update', 'cartcontroller@update'); 
		Route::delete('/cart/delete/{rowId}', 'cartcontroller@delete'); 
		Route::get('/cart/destroy', 'cartcontroller@destroy'); 
	// }); 
}); 
Route::get('/test',  function(){   /// test page

	return view('test');

});  
	 
 