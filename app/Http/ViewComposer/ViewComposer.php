<?php 

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\page; 
use App\social; 
use App\category; 
use App\subcategory; 
use App\product; 
use App\contact; 
use App\brand; 
use DB;
use Carbon\Carbon;


class ViewComposer {

    public function compose(View $view) {
 
		$view->with('all_categories', category::all() );    
		$view->with('all_subcategories', subcategory::all() );   
		$view->with('all_products', product::all() );   
		$view->with('all_brands', brand::all() );      
		$view->with('thepages', page::all() );   
		$view->with('sociallinks', social::all() );   
		$view->with('footer_contact', contact::first() );   
		
		$view->with('registration_setting', DB::table('settings')->where('name' , 'registration')->value('status') );
		$view->with('contact_setting', DB::table('settings')->where('name' , 'contact')->value('status') );
		$view->with('page_setting', DB::table('settings')->where('name' , 'page')->value('status') );
		$view->with('social_setting', DB::table('settings')->where('name' , 'social')->value('status') );
		$view->with('category_setting', DB::table('settings')->where('name' , 'category')->value('status') );
		$view->with('subcategory_setting', DB::table('settings')->where('name' , 'subcategory')->value('status') );
		$view->with('brand_setting', DB::table('settings')->where('name' , 'brand')->value('status') );
		$view->with('product_setting', DB::table('settings')->where('name' , 'product')->value('status') );
		$view->with('comment_setting', DB::table('settings')->where('name' , 'comment')->value('status') );
		$view->with('order_setting', DB::table('settings')->where('name' , 'order')->value('status') );
		$view->with('e_commerce_setting', DB::table('settings')->where('name' , 'e_commerce')->value('status') );

		$view->with('cat_has_new_pro', subcategory::whereHas('products', function($query){ 
						$query->where('created_at',  '>=' , Carbon::now()->subDays(7)); })->get());   		// For Sidebar
		$view->with('foot_sub', subcategory::where('category_id',  3)->get());  							// For Sidebar
		$view->with('new_pro', product::where('created_at',  '>=' , Carbon::now()->subDays(7))->get());  	// For Nav

 

    }
}

		//  'registration' , 'contact' , 'page' , 'social' , 'category' , 'subcategory' , 'product' , 'brand' , 'comment' , 'order' , 'e_commerce'

