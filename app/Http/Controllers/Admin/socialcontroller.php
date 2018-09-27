<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\social; 
use Storage; 
use App\DataTables\SocialDatatable; 

class socialcontroller extends Controller
{

 
  
    public function index(SocialDatatable $social)
    {
          
        return $social->render('admin.social.social' , ['title' => 'social Control']);
 
    }
 
 

    public function create()
    {
       return view('admin.social.addnewsocial');
    }

  

    public function store(Request $request)
    { 
        $data = $this->validate(request(), [
                
                'name'        => 'required',  
                'link'        => 'required',   
                'img'         => 'required',        
            ]);   

            if (request()->hasFile('img')) 
            {  
                 $public_path = 'uploads/social';
                 $img_name = time() . '.' . request('img')->getClientOriginalExtension();
                 request('img')->move($public_path , $img_name); 
            }else
            { 
                $img_name = 'default.jpg';  
            } 

        $data['img'] =  $img_name;  
        
        social::create($data); 
        return redirect ('/admin/social');
    }
 




    public function edit($id)
    {
        $social   = social::find($id);
        return view('admin.social.editsocial', compact('social'));
    }
 
 
    public function update(Request $request , $id)
    {
        $file = social::find($id);
        $data = $this->validate(request(), [
                    
                'name'        => 'required',   
                'link'        => 'required',        
            ]);  

        if (request()->hasFile('img')) 
        { 
             if($file->img !==  'default.jpg'){
                Storage::delete('social/'.$file->img);    
             }
         $public_path = 'uploads/social';
         $img_name = time() . '.' . request('img')->getClientOriginalExtension();
         request('img')->move($public_path , $img_name); 
        
         $data['img']       =  $img_name; 
        }  
     
        $social     = social::find($id);
        $social->update($data);
        return redirect ('/admin/social');
    }
 
 
    public function destroy($id)
    {
        $social = social::find($id); 
        if($social->img !==  'default.jpg'){
            Storage::delete('social/'.$social->img);       
        } 
        $social->delete();

        return back()->with('succses' , 'The social Deleted Successfully');
    }
}
