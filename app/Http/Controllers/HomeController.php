<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\subcategory;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('task');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function task()
    // {
    //     return view('home');
    // }    

    public function index()
    {
        $a_category = subcategory::where('id' , 5)->first();   
        $b_category = subcategory::where('id' , 2)->first();    
        $c_category = subcategory::where('id' , 3)->first();    
        $d_category = subcategory::where('id' , 3)->first();    
        $e_category = subcategory::where('id' , 2)->first();  

        $new_products = product::orderBy('created_at' , 'desc')->take(10)->get();  
        return view('home' , compact('new_products' , 'a_category' , 'b_category' , 'c_category' , 'd_category' , 'e_category'));
    }
}
