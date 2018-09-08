<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\OrderDataTable;
use App\order;
use Auth;
use Storage;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderDataTable $order)
    {
        return $order->render('admin.order.order' , ['title' => 'Order Control']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order.addneworder');
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
        
         $public_path = 'uploads/order';
         $img_name = time() . '.' . request('img')->getClientOriginalExtension();
         request('img')->move($public_path , $img_name); 
        }else
        { 
            $img_name = 'default.jpg';  
        } 


        if (request()->hasFile('r_img')) 
        { 
        
         $public_path = 'uploads/order';
         $r_img_name = strtolower(request('name')).'_r_image.' . request('r_img')->getClientOriginalExtension();
         request('r_img')->move($public_path , $r_img_name); 
        }else
        { 
            $r_img_name = 'default.jpg';  
        } 


        if (request()->hasFile('l_img')) 
        { 
        
         $public_path = 'uploads/order';
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

 
        order::create($data);
        return redirect ('/admin/order');
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
    //     $order   = order::where('title', $slug)->first();
    //     return view('order' , compact('order'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order   = order::find($id); 
        return view('admin.order.editorder', compact('order'));
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

        $file = order::find($id);

        $data = $this->validate(request(), [
                    
                'name'        => 'required',   
                'description' => 'required',  
                'keywords'    => 'required',   
                'category_id' => 'required',     
            ]); 

            if (request()->hasFile('img')) 
            { 
             if($file->img !==  'default.jpg'){
                Storage::delete('order/'.$file->img);    
             }
             $public_path = 'uploads/order';
             $img_name = time() . '.' . request('img')->getClientOriginalExtension();
             request('img')->move($public_path , $img_name); 
            
             $data['img']       =  $img_name; 
            }   

            if (request()->hasFile('r_img')) 
            {  
             Storage::delete('order/'.$file->r_img);  
             $public_path = 'uploads/order';
             $r_img_name = strtolower(request('name')).'_r_image.' . request('r_img')->getClientOriginalExtension();
             request('r_img')->move($public_path , $r_img_name); 

             $data['r_img']   =  $r_img_name; 
            }  
            if (request()->hasFile('l_img')) 
            {  
             Storage::delete('order/'.$file->l_img); 
             $public_path = 'uploads/order';
             $l_img_name = strtolower(request('name')).'_l_image.' . request('l_img')->getClientOriginalExtension();
             request('l_img')->move($public_path , $l_img_name); 
            
             $data['l_img']   =  $l_img_name; 
            }
      
        $data['r_title'] =  request('r_title'); 
        $data['l_title'] =  request('l_title'); 

     
        $order     = order::find($id);
        $order->update($data);
        return redirect ('/admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $order     = order::find($id);    
        if($order->img !==  'default.jpg'){
            Storage::delete('order/'.$order->img);       
        } 
        Storage::delete('order/'.$order->r_img);    
        Storage::delete('order/'.$order->l_img); 
        $order->delete();

        return back() ;
    }
}
