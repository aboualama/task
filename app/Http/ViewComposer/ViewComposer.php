<?php 

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use App\page; 
use App\social; 
use App\category; 
use App\subcategory; 
use App\contact; 
use App\brand; 
use DB;

class ViewComposer {

    public function compose(View $view) {
 
    	$view->with('all_categories', category::all() );    
      $view->with('all_subcategories', subcategory::all() );   
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
    
 
    }
}

		//  'registration' , 'contact' , 'page' , 'social' , 'category' , 'subcategory' , 'product' , 'brand' , 'comment'
