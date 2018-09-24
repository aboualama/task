<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\product;

class productsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // { 
   //      DB::table('products')->insert([
			// 'name'           => 'mobile' ,
			// 'description'    => str_random(10),
			// 'price'          => rand(1 , 1000), 
			// 'subcategory_id' =>  1 ,  
			// 'brand_id'       =>  1 , 
			// 'admin_id'       =>  1 ,  
			// 'photo'          => rand() . '.jpg',   
   //      ]); 
    // }

	public function run(){
	    // for($j = 1; $j < 1000 ; $j++){         if you need 1000000 records and make $i < 1000
	        for($i = 1; $i <= 20 ; $i++){
	             $product_data[] = [
			 		'name'           =>  str_random(6) .' mobile' ,    
					'description'    =>  str_random(10),
					'price'          =>  rand(1 , 1000), 
					'subcategory_id' =>  rand(2 , 6),  
					'brand_id'       =>  rand(4 , 8) , 
					'admin_id'       =>  1 ,  
					'photo'          =>  rand(10 , 40) . '.jpg',   
	             ];
	        }

	        product::insert($product_data);
    	// }
	}






 
}
