<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\brandDataTable;
use App\brand;

class brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(brandDataTable $product)
    {
        return $product->render('admin.brand.brand' , ['title' => 'brand Control']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.addnewbrand');
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
                    
                'name'        => 'required',   
                'description' => 'required',     
                'keywords'    => 'required',      
            ]); 

        if (request()->hasFile('img')) 
        { 
        
         $public_path = 'uploads/images';
         $img_name = time() . '.' . request('img')->getClientOriginalExtension();
         request('img')->move($public_path , $img_name); 
        }else
        { 
            $img_name = 'banner3.jpg';  
        } 

        $data['img']       =  $img_name; 

 
        brand::create($data);
        return redirect ('/admin/brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $slug   = str_replace( '-', ' ', strtolower($name));   
        $brand   = brand::where('title', $slug)->first();
        return view('brand' , compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand   = brand::find($id); 
        return view('admin.brand.editbrand', compact('brand'));
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
                    
                'name'        => 'required',   
                'description' => 'required',  
                'keywords'    => 'required',      
            ]); 

        if (request()->hasFile('img')) 
        { 
        
         $public_path = 'uploads/images';
         $img_name = time() . '.' . request('img')->getClientOriginalExtension();
         request('img')->move($public_path , $img_name); 
        }else
        { 
            $img_name = 'banner3.jpg';  
        } 

        $data['img']       =  $img_name; 

     
        $brand     = brand::find($id);
        $brand->update($data);
        return redirect ('/admin/brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $brand     = brand::find($id);
        $brand->delete();

        return back() ;
    }
}
