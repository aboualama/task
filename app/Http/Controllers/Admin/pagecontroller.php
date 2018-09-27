<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\page;
use App\DataTables\PageDatatable;


class pagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageDatatable $page)
    {
        return $page->render('admin.page.page' , ['title' => 'Page Control']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.addnewpage');
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
                    
                'title'       => 'required',  
                'keywords'    => 'required',   
                'description' => 'required',   
                'body'        => 'required',     
            ]); 
        
        $data['title']       = $request->title;     
        $data['keywords']    = $request->keywords;     
        $data['description'] = $request->description;     
        $data['body']        = $request->body;      
 
         
        page::create($data);
        return redirect ('/admin/page');
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
        $page   = page::where('title', $slug)->first();
        return view('page' , compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page   = page::find($id);
        return view('admin.page.editpage', compact('page'));
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
                    
                'title'       => 'required',  
                'keywords'    => 'required',   
                'description' => 'required',   
                'body'        => 'required',     
            ]); 
        
        $data['title']       = $request->title;     
        $data['keywords']    = $request->keywords;     
        $data['description'] = $request->description;     
        $data['body']        = $request->body;       
  
     
        $page     = page::find($id);
        $page->update($data);
        return redirect ('/admin/page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $page     = page::find($id);
        $page->delete();

        return back() ;
    }
}
