<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ProductDataTable;
use App\product;
use App\subcategory;
use Storage;
use Auth;
use Image;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDataTable $product)
    {
        return $product->render('admin.product.product' , ['title' => 'Product Control']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.addnewproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = $this->validate(request(), [
                    
                'name'           => 'required',   
                'description'    => 'required',  
                'price'          => 'required',    
                'subcategory'    => 'required',   
            ]); 


        $data['admin_id']       = Auth::guard('admin')->user()->id;   
        $data['subcategory_id'] = $request->subcategory;  
        $data['brand_id']       = $request->brand;  

        if (request()->hasFile('photo')) 
        { 
        
         $file = request('photo'); 
         $photo_name = time() . '.' . request('photo')->getClientOriginalExtension();

         $public_path = 'uploads/product/' . $photo_name ;
         // $public_path = 'uploads/product/';  

         Image::make($file)->resize(300, 500)->insert('uploads/watermark/A.png', 'bottom-right', 10, 10)->save($public_path);
         // request('photo')->move($public_path , $photo_name); 
        }else
        { 
            $photo_name = 'banner3.jpg';  
        } 

        $data['photo']       =  $photo_name; 

 
        product::create($data);
        return redirect ('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        $product   = product::where('id', $id)->first();
        $rel_products = product::where('id', '!='  ,$id)
                        ->where('subcategory_id' , $product->subcategory->id)
                        ->take(4)->get(); //or
        // $rel_products = product::where('id', '!='  ,$id)->limit(4)->get(); 
        return view('product' , compact('product' , 'rel_products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product   = product::find($id); 
        return view('admin.product.editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate(request(), [
                    
                'name'           => 'required',   
                'description'    => 'required',  
                'price'          => 'required',    
                'subcategory'    => 'required',   
            ]); 
        
        
        $data['admin_id']       = Auth::guard('admin')->user()->id;   
        $data['subcategory_id'] = $request->subcategory;  
        $data['brand_id']       = $request->brand;  

        if (request()->hasFile('photo')) 
        { 

            $product     = product::find($id);
                if($product->photo !==  'default.jpg'){
                    Storage::delete('product/'.$product->photo);       
                }   
            
             $public_path = 'uploads/product';
             $photo_name = time() . '.' . request('photo')->getClientOriginalExtension();
             request('photo')->move($public_path , $photo_name); 

         $data['photo']       =  $photo_name; 
     
        } 

        $product     = product::find($id);
        $product->update($data);
        return redirect ('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $product     = product::find($id);
        if($product->photo !==  'default.jpg'){
            Storage::delete('product/'.$product->photo);       
        } 
        $product->delete();

        return back() ;
    }     
 
}





