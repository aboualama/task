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
	
	Route::get('/login', 'AdminAuthController@loginpage' );
	Route::post('/login', 'AdminAuthController@login' );
	// Route::get('/forgot/password', 'AdminAuthController@forgot_password' );
	// Route::post('/forgot/password', 'AdminAuthController@forgot_password_post' );
	// Route::get('reset/password/{token}', 'AdminAuthController@reset_password');
	// Route::post('reset/password/{token}', 'AdminAuthController@reset_password_final'); 
	// Route::get('/register', 'RegisterController@showRegistrationForm' );
	// Route::post('/register', 'RegisterController@register' );



	Route::group(['middleware' => 'adminauth:admin'] , function(){
	
	
		Route::any('/logout', 'AdminAuthController@logout' );  
	 
		Route::get('/', function () { return view('admin.dashboard'); }); 
 


/////// SETTING //////////
		Route::get('/settings', 'settingController@index');
		Route::get('/add/setting', 'settingController@create');
		Route::post('/setting', 'settingController@store');
		Route::get('/setting/edit/{id}', 'settingController@edit');
		Route::put('/setting/edit/{id}', 'settingController@update');   
		// Route::delete('/setting/delete/{id}', 'settingController@destroy' );

/////// CONTACT //////////
		// Route::get('/contact', 'contactController@create');
		// Route::post('/contact', 'contactController@store');
		Route::get('/contact/edit', 'contactController@edit');
		Route::put('/contact/edit', 'contactController@update');  


// /////// USER //////////
		Route::get('/user', 'userController@index');  
		Route::get('/user/edit/{id}', 'userController@edit');
		Route::put('/user/update/{id}', 'userController@update');
		Route::delete('/user/delete/{id}', 'userController@destroy' );



/////// PAGE //////////
		Route::get('/page', 'pageController@index');
		Route::get('/add/page', 'pageController@create');
		Route::post('/page', 'pageController@store');
		Route::get('/page/edit/{id}', 'pageController@edit');
		Route::put('/page/edit/{id}', 'pageController@update');   
		Route::delete('/page/delete/{id}', 'pageController@destroy' );


/////// SOCIAL //////////
		Route::get('/social', 'socialController@index');
		Route::get('/add/social', 'socialController@create');
		Route::post('/social', 'socialController@store');
		Route::get('/social/edit/{id}', 'socialController@edit');
		Route::put('/social/edit/{id}', 'socialController@update');   
		Route::delete('/social/delete/{id}', 'socialController@destroy' );


/////// CATEGORY //////////
		Route::get('/category', 'categoryController@index');
		Route::get('/add/category', 'categoryController@create');
		Route::post('/category', 'categoryController@store');
		Route::get('/category/edit/{id}', 'categoryController@edit');
		Route::put('/category/edit/{id}', 'categoryController@update');   
		Route::delete('/category/delete/{id}', 'categoryController@destroy' );


/////// SUBCATEGORY //////////
		Route::get('/subcategory', 'subcategoryController@index');
		Route::get('/add/subcategory', 'subcategoryController@create');
		Route::post('/subcategory', 'subcategoryController@store');
		Route::get('/subcategory/edit/{id}', 'subcategoryController@edit');
		Route::put('/subcategory/edit/{id}', 'subcategoryController@update');   
		Route::delete('/subcategory/delete/{id}', 'subcategoryController@destroy' );


/////// BRAND //////////
		Route::get('/brand', 'brandController@index');
		Route::get('/add/brand', 'brandController@create');
		Route::post('/brand', 'brandController@store');
		Route::get('/brand/edit/{id}', 'brandController@edit');
		Route::put('/brand/edit/{id}', 'brandController@update');   
		Route::delete('/brand/delete/{id}', 'brandController@destroy' );


/////// PRODUCT //////////  
		Route::get('/product', 'productController@index');
		Route::get('/add/product', 'productController@create');
		Route::post('/product', 'productController@store');
		Route::get('/product/edit/{id}', 'productController@edit');
		Route::put('/product/edit/{id}', 'productController@update');   
		Route::delete('/product/delete/{id}', 'productController@destroy' );


/////// PRODUCT //////////  
		Route::get('/comment', 'commentController@index');
		// Route::get('/add/comment', 'commentController@create');
		Route::post('/a/comment', 'commentController@store');
		Route::get('/comment/edit/{id}', 'commentController@edit');
		Route::put('/comment/edit/{id}', 'commentController@update');   
		Route::delete('/comment/delete/{id}', 'commentController@destroy' );

	});
});


