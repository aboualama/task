<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\commentDataTable;
use App\comment ;
use Auth;

class commentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(commentDataTable $comment)
    {
        return $comment->render('admin.comment.comment' , ['title' => 'Comment Control']); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comment.addnewcomment');
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

                'comment'       => 'required',     
            ]); 
        
        $data['user_id']          = Auth::user()->id;       
        $data['product_id']       = $request->product_id;       
            
         
        comment::create($data);
        return back ();
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment   = comment::find($id);
        return view('admin.comment.editcomment', compact('comment'));
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
          
        $data['status']       = $request->status;          
     
        $comment     = comment::find($id);
        $comment->update($data);
        return redirect ('/admin/comment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {
        $comment     = comment::find($id);
        $comment->delete();

        return back() ;
    }
}
