<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subcategory; 

class categorycontroller extends Controller
{
    public function subcategories(){

    	$all_sub = subcategory::all;

    }


    public function show($name){
    	
		$name = str_replace( '-', ' ', strtolower($name));
    	$subcategory = subcategory::where('name', $name)->first(); 
    	return view ('subcategory' , compact('subcategory'));

    }

}
