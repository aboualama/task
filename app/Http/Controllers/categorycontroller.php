<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcategory; 
use App\category; 
use App\product;  
use App\brand;

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
                $products   = product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('created_at','DESC')
                        ->paginate(9);
                break;
            case 1:
                $products   = product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('price','ASC')
                        ->paginate(9);
                break;
            case 2:
                $products   = product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('created_at','AC')
                        ->paginate(9);
                break;
            case 3:
                $products   = product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('price','ASC')
                        ->paginate(9);
                break;
            case 4:
                $products   = product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('created_at','AC')
                        ->paginate(9);
                break;
            case 5:
                $products   = product::where('subcategory_id' , $subcategory->id)
                        ->orderBy('price','ASC')
                        ->paginate(9);
                break;  
        endswitch; 
 
        $results      = product::where('subcategory_id' , $subcategory->id)->paginate(9);
        $new_products = product::limit(8)->get();   
    	return view ('subcategory' , compact('subcategory' , 'products' , 'new_products' , 'results'));

    }


    public function clothing(){ 
        $category = category::where('name', 'Clothes')->first();   
        $products      = $category->products()->orderBy('created_at','DESC')->limit(9)->get();    
        $new_products = product::limit(8)->get();    
        return view ('category' , compact('category' , 'products' , 'new_products')); 
    } 
    public function shoes(){  
        $category = category::where('name', 'Footwear & Bags')->first();   
        $products      = $category->products()->orderBy('created_at','DESC')->limit(9)->get();   
        $new_products = product::limit(8)->get();    
        return view ('category' , compact('category' , 'products' , 'new_products')); 
    } 
    public function watches(){ 
        $category = category::where('name', 'Accessories')->first();   
        $products      = $category->products()->orderBy('created_at','DESC')->limit(9)->get();   
        $new_products = product::limit(8)->get();    
        return view ('category' , compact('category' , 'products' , 'new_products')); 
    }



    public function brand($name){ 
        $name         = str_replace( '-', ' ', strtolower($name));
        $brand        = brand::where('name', $name)->first();   
        $products     = $brand->products()->orderBy('created_at','DESC')->paginate(9); 
        $new_products = product::limit(8)->get();    
        return view ('brand' , compact('brand' , 'products' , 'new_products')); 
    } 
} 