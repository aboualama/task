<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "adminauth" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin' , 'namespace' => 'Admin'] , function(){

	Config::set('auth.defines' , 'admin'); 
	
	Route::get('/login', 'AdminAuthcontroller@loginpage' );
	Route::post('/login', 'AdminAuthcontroller@login' );
	// Route::get('/forgot/password', 'AdminAuthcontroller@forgot_password' );
	// Route::post('/forgot/password', 'AdminAuthcontroller@forgot_password_post' );
	// Route::get('reset/password/{token}', 'AdminAuthcontroller@reset_password');
	// Route::post('reset/password/{token}', 'AdminAuthcontroller@reset_password_final'); 
	// Route::get('/register', 'Registercontroller@showRegistrationForm' );
	// Route::post('/register', 'Registercontroller@register' );



	Route::group(['middleware' => 'adminauth:admin'] , function(){


		Route::get('/', function () { return view('admin.dashboard'); }); 
	
		/////// Admin //////////
		Route::get('/admin', 'AdminAuthcontroller@index');  
		Route::get('/register', 'Registercontroller@showRegistrationForm' );
		Route::post('/register', 'Registercontroller@register' ); 
		Route::delete('/admin/delete/{id}', 'AdminAuthcontroller@destroy' );
		Route::any('/logout', 'AdminAuthcontroller@logout' );  


		/////// SETTING //////////
			Route::get('/settings', 'settingcontroller@index');
			Route::get('/add/setting', 'settingcontroller@create');
			Route::post('/setting', 'settingcontroller@store');
			Route::get('/setting/edit/{id}', 'settingcontroller@edit');
			Route::put('/setting/edit/{id}', 'settingcontroller@update');   
			// Route::delete('/setting/delete/{id}', 'settingcontroller@destroy' );

		/////// CONTACT //////////
		Route::group(['middleware' => 'setting:contact'] , function(){
				// Route::get('/contact', 'contactcontroller@create');
				// Route::post('/contact', 'contactcontroller@store');
				Route::get('/contact/edit', 'contactcontroller@edit');
				Route::put('/contact/edit', 'contactcontroller@update');  
		 });


		// /////// USER //////////
		Route::group(['middleware' => 'setting:registration'] , function(){
				Route::get('/user', 'usercontroller@index');  
				Route::get('/user/edit/{id}', 'usercontroller@edit');
				Route::put('/user/update/{id}', 'usercontroller@update');
				Route::delete('/user/delete/{id}', 'usercontroller@destroy' );
		 }); 


		/////// PAGE //////////
		Route::group(['middleware' => 'setting:page'] , function(){
				Route::get('/page', 'pagecontroller@index');
				Route::get('/add/page', 'pagecontroller@create');
				Route::post('/page', 'pagecontroller@store');
				Route::get('/page/edit/{id}', 'pagecontroller@edit');
				Route::put('/page/edit/{id}', 'pagecontroller@update');   
				Route::delete('/page/delete/{id}', 'pagecontroller@destroy' );
		 });


		/////// SOCIAL //////////
		Route::group(['middleware' => 'setting:social'] , function(){
				Route::get('/social', 'socialcontroller@index');
				Route::get('/add/social', 'socialcontroller@create');
				Route::post('/social', 'socialcontroller@store');
				Route::get('/social/edit/{id}', 'socialcontroller@edit');
				Route::put('/social/edit/{id}', 'socialcontroller@update');   
				Route::delete('/social/delete/{id}', 'socialcontroller@destroy' );
		 });


		/////// CATEGORY //////////
		Route::group(['middleware' => 'setting:category'] , function(){
				Route::get('/category', 'categorycontroller@index');
				Route::get('/add/category', 'categorycontroller@create');
				Route::post('/category', 'categorycontroller@store');
				Route::get('/category/edit/{id}', 'categorycontroller@edit');
				Route::put('/category/edit/{id}', 'categorycontroller@update');   
				Route::delete('/category/delete/{id}', 'categorycontroller@destroy' );
		 });


		/////// SUBCATEGORY //////////
		Route::group(['middleware' => 'setting:subcategory'] , function(){
				Route::get('/subcategory', 'subcategorycontroller@index');
				Route::get('/add/subcategory', 'subcategorycontroller@create');
				Route::post('/subcategory', 'subcategorycontroller@store');
				Route::get('/subcategory/edit/{id}', 'subcategorycontroller@edit');
				Route::put('/subcategory/edit/{id}', 'subcategorycontroller@update');   
				Route::delete('/subcategory/delete/{id}', 'subcategorycontroller@destroy' );
		 });


		/////// BRAND //////////
		Route::group(['middleware' => 'setting:brand'] , function(){
				Route::get('/brand', 'brandcontroller@index');
				Route::get('/add/brand', 'brandcontroller@create');
				Route::post('/brand', 'brandcontroller@store');
				Route::get('/brand/edit/{id}', 'brandcontroller@edit');
				Route::put('/brand/edit/{id}', 'brandcontroller@update');   
				Route::delete('/brand/delete/{id}', 'brandcontroller@destroy' );
		 });


		/////// PRODUCT //////////  
		Route::group(['middleware' => 'setting:product'] , function(){
				Route::get('/product', 'productcontroller@index');
				Route::get('/add/product', 'productcontroller@create');
				Route::post('/product', 'productcontroller@store');
				Route::get('/product/edit/{id}', 'productcontroller@edit');
				Route::put('/product/edit/{id}', 'productcontroller@update');   
				Route::delete('/product/delete/{id}', 'productcontroller@destroy' );
		 });


		/////// COMMENT //////////  
		Route::group(['middleware' => 'setting:comment'] , function(){
				Route::get('/comment', 'commentcontroller@index');  
				Route::get('/comment/edit/{id}', 'commentcontroller@edit');
				Route::put('/comment/edit/{id}', 'commentcontroller@update');   
				Route::delete('/comment/delete/{id}', 'commentcontroller@destroy' );
		 });


		/////// ORDER //////////  
		Route::group(['middleware' => 'setting:order'] , function(){
				Route::get('/order', 'ordercontroller@index');  
				Route::get('/order/edit/{id}', 'ordercontroller@edit');
				Route::put('/order/edit/{id}', 'ordercontroller@update');   
				Route::delete('/order/delete/{id}', 'ordercontroller@destroy' );
		 });

	});
});


