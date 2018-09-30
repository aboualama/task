<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\product;

class cartcontroller extends Controller
{ 

    public function show()
    {
    	$charge = 45 ;
    	$cart_item =  Cart::content();
		$new_products = product::orderBy('created_at' , 'desc')->take(10)->get();  
    	return view('cart' , compact('cart_item' , 'new_products' , 'charge'));
    }

    public function checkout()
    {
        $charge = 45 ;
        $cart_item =  Cart::content();
        $new_products = product::orderBy('created_at' , 'desc')->take(10)->get();  
        return view('checkout' , compact('cart_item' , 'new_products' , 'charge'));
    }

    public function add($id)
    {
    	$product = product::find($id);
    	Cart::add($id,$product->name,1,$product->price , ['photo' => $product->photo]);
        return response()->json();
    }

    public function update(Request $r)
    {
    	$qty = $r->qty;
    	$rowId = $r->rowId;

    	Cart::update($rowId, $qty);
        return response()->json();
    }

    public function delete($rowId)
    {
    	Cart::remove($rowId);
        return response()->json();
    }

    public function destroy()
    {
    	Cart::destroy();
    	return back();
    }

}
