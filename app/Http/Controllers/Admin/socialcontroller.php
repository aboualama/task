<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\social; 
use App\DataTables\SocialDatatable; 

class socialController extends Controller
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
                // 'link'        => 'required',   
                'icon'        => 'required',        
            ]); 
        
        $data['name'] = $request->name;     
        $data['link'] = $request->link;      
        $data['icon'] = $request->icon;       
 
         
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
        $data = $this->validate(request(), [
                    
                'name'        => 'required',   
                // 'link'        => 'required',   
                'icon'        => 'required',      
            ]); 
        
        $data['name']   = $request->name;       
        $data['link']   = $request->link;      
        $data['icon']   = $request->icon;        
  
     
        $social     = social::find($id);
        $social->update($data);
        return redirect ('/admin/social');
    }
 
    // public function destroy($id)
    // {
    //     $social     = social::find($id);
    //     $social->delete();

    //     return back()->with('succses' , 'The social Deleted Successfully');
    // }
}
