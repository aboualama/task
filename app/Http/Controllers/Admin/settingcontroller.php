<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\setting; 
use App\DataTables\SettingDatatable; 

class settingcontroller extends Controller
{

 
  
    public function index(SettingDatatable $setting)
    {
          
        return $setting->render('admin.setting.settings' , ['title' => 'Setting Control']);
 
    }
 
 

    public function create()
    {
       return view('admin.setting.addnewsetting');
    }

  

    public function store(Request $request)
    { 
        $data = $this->validate(request(), [
                    
                    'name'        => 'required',  
                    'description' => 'required',   
                    'status'      => 'required',     
            ]); 
        
        $data['name']        = $request->name;     
        $data['description'] = $request->description;     
        $data['status']      = $request->status;      
 
         
        setting::create($data);
        return redirect ('/admin/settings');
    }
 




    public function edit($id)
    {
        $setting   = setting::find($id);
        return view('admin.setting.editsetting', compact('setting'));
    }




 
    public function update(Request $request , $id)
    {
        $data = $this->validate(request(), [
                    
                    'name'        => 'required',   
                    'description' => 'required',   
                    'status'      => 'required',     
            ]); 
        
        $data['name']        = $request->name;     
        $data['description'] = $request->description;     
        $data['status']      = $request->status;      
  
     
        $setting     = setting::find($id);
        $setting->update($data);
        return redirect ('/admin/settings');
    }
 
    // public function destroy($id)
    // {
    //     $setting     = setting::find($id);
    //     $setting->delete();

    //     return back()->with('succses' , 'The Setting Deleted Successfully');
    // }
}
