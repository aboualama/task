<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SubcategoryDatatable;
use App\subcategory;
use Storage;

class subcategorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubcategoryDatatable $subcategory)
    {
        return $subcategory->render('admin.subcategory.subcategory' , ['title' => 'subcategory Control']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subcategory.addnewsubcategory');
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
                'category_id' => 'required',     
            ]); 

        if (request()->hasFile('img')) 
        { 
        
         $public_path = 'uploads/subcategory';
         $img_name = time() . '.' . request('img')->getClientOriginalExtension();
         request('img')->move($public_path , $img_name); 
        }else
        { 
            $img_name = 'default.jpg';  
        } 


        if (request()->hasFile('r_img')) 
        { 
        
         $public_path = 'uploads/subcategory';
         $r_img_name = strtolower(request('name')).'_r_image.' . request('r_img')->getClientOriginalExtension();
         request('r_img')->move($public_path , $r_img_name); 
        }else
        { 
            $r_img_name = 'default.jpg';  
        } 


        if (request()->hasFile('l_img')) 
        { 
        
         $public_path = 'uploads/subcategory';
         $l_img_name = strtolower(request('name')).'_l_image.' . request('l_img')->getClientOriginalExtension();
         request('l_img')->move($public_path , $l_img_name); 
        }else
        { 
            $l_img_name = 'default.jpg';  
        } 

        $data['img']     =  $img_name; 
        $data['r_img']   =  $r_img_name; 
        $data['l_img']   =  $l_img_name; 
        $data['r_title'] =  request('r_title'); 
        $data['l_title'] =  request('l_title'); 

 
        subcategory::create($data);
        return redirect ('/admin/subcategory');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($name)
    // {
    //     $slug   = str_replace( '-', ' ', strtolower($name));   
    //     $subcategory   = subcategory::where('title', $slug)->first();
    //     return view('subcategory' , compact('subcategory'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory   = subcategory::find($id); 
        return view('admin.subcategory.editsubcategory', compact('subcategory'));
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

        $file = subcategory::find($id);

        $data = $this->validate(request(), [
                    
                'name'        => 'required',   
                'description' => 'required',  
                'keywords'    => 'required',   
                'category_id' => 'required',     
            ]); 

            if (request()->hasFile('img')) 
            { 
             if($file->img !==  'default.jpg'){
                Storage::delete('subcategory/'.$file->img);    
             }
             $public_path = 'uploads/subcategory';
             $img_name = time() . '.' . request('img')->getClientOriginalExtension();
             request('img')->move($public_path , $img_name); 
            
             $data['img']       =  $img_name; 
            }   

            if (request()->hasFile('r_img')) 
            {  
             Storage::delete('subcategory/'.$file->r_img);  
             $public_path = 'uploads/subcategory';
             $r_img_name = strtolower(request('name')).'_r_image.' . request('r_img')->getClientOriginalExtension();
             request('r_img')->move($public_path , $r_img_name); 

             $data['r_img']   =  $r_img_name; 
            }  
            if (request()->hasFile('l_img')) 
            {  
             Storage::delete('subcategory/'.$file->l_img); 
             $public_path = 'uploads/subcategory';
             $l_img_name = strtolower(request('name')).'_l_image.' . request('l_img')->getClientOriginalExtension();
             request('l_img')->move($public_path , $l_img_name); 
            
             $data['l_img']   =  $l_img_name; 
            }
      
        $data['r_title'] =  request('r_title'); 
        $data['l_title'] =  request('l_title'); 

     
        $subcategory     = subcategory::find($id);
        $subcategory->update($data);
        return redirect ('/admin/subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $subcategory     = subcategory::find($id);    
        if($subcategory->img !==  'default.jpg'){
            Storage::delete('subcategory/'.$subcategory->img);       
        } 
        Storage::delete('subcategory/'.$subcategory->r_img);    
        Storage::delete('subcategory/'.$subcategory->l_img); 
        $subcategory->delete();

        return back() ;
    }
}
