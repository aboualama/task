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
 
Route::get('/', 'HomeController@index')->name('home'); 


/////// REGISTRATION MIDDLEWARE ////////// 
Route::group(['middleware' => 'setting:registration'] , function(){ 
	Auth::routes(); 
	Route::group(['middleware' => 'activeuser:active'] , function(){
		Route::get('/user/edit', 'auth\registercontroller@edit');
		Route::put('/user/edit', 'auth\registercontroller@update'); 
	});
	Route::get('login/{provider}', 'Auth\sociallogincontroller@redirectToProvider');   // $provider if we need many website
	Route::get('login/{provider}/callback', 'Auth\sociallogincontroller@handleProviderCallback');
});

 
/////// SETTING MIDDLEWARE ////////// 
Route::group(['middleware' => 'setting:contact'] , function(){ 
	Route::get('/contact', 'Admin\contactController@show');
	Route::post('/contact', 'Admin\contactController@contact'); 
});


/////// PAGE MIDDLEWARE ////////// 
Route::group(['middleware' => 'setting:page'] , function(){ 
	Route::get('/page/{name}', 'Admin\pagecontroller@show'); 
}); 
  

/////// E_COMMERCE MIDDLEWARE ////////// 
Route::group(['middleware' => 'setting:e_commerce'] , function(){  
	
	Route::group(['middleware' => 'setting:category'] , function(){  
		Route::get('/category/{name}/{srot?}', 'categorycontroller@show'); 
	}); 
 
	Route::group(['middleware' => 'setting:product'] , function(){  
		Route::get('/product/{id}', 'Admin\productcontroller@show'); 
		Route::get('/all-products/{srot?}', 'Admin\productcontroller@allproducts');  
 
		Route::get('/cart', 'cartcontroller@show');
		Route::get('/cart/add/{id}', 'cartcontroller@add'); 
		Route::put('/cart/update', 'cartcontroller@update'); 
		Route::delete('/cart/delete/{rowId}', 'cartcontroller@delete'); 
		Route::get('/cart/destroy', 'cartcontroller@destroy'); 

		Route::group(['middleware' => 'setting:registration'] , function(){	
			Route::get('/checkout', 'cartcontroller@checkout');
		}); 

	});

 
	Route::post('pay','PaymentController@payWithPaypal')->name('pay'); 
	Route::get('status','PaymentController@status')->name('status'); 
	Route::get('canceled','PaymentController@canceled')->name('canceled');

}); 
 
