<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcategory; 
use App\Product; 

class categorycontroller extends Controller
{
    public function subcategories(){

    	$all_sub = subcategory::all;

    }


    public function show($name, $srot=null){
    	
		$name = str_replace( '-', ' ', strtolower($name));
    	$subcategory = subcategory::where('name', $name)->first();  


        switch ($srot):
            case null:
                $products   = Product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('created_at','DESC')
                        ->paginate(10);
                break;
            case 1:
                $products   = Product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('price','ASC')
                        ->paginate(10);
                break;
            case 2:
                $products   = Product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('created_at','AC')
                        ->paginate(10);
                break;
             
        endswitch;
 



        $new_products = product::limit(8)->get(); 

        // dd($new_products);
        // $new_products = product::orderBy('created_at','DESC')->limit(4)->get(); 

    	return view ('subcategory' , compact('subcategory' , 'products' , 'new_products'));

    }

}
