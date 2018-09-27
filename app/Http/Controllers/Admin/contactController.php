<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\contact;
use Mail; 

class contactcontroller extends Controller
{


    public function show()
    {
        $contact   = contact::first();       
        return view('contact' , compact('contact'));

    }



    public function contact(Request $request) {
        
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
            'telephone' => 'numeric',
            'subject'   => 'min:3',
            'message'   => 'min:10']);

        $data = array(
            'name'        => $request->name,
            'email'       => $request->email,
            'telephone'   => $request->telephone,
            'subject'     => $request->subject,
            'bodyMessage' => $request->message
            );

        Mail::send('emails.contact_temp', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('aboualama@gmail.com');
            $message->subject($data['subject']);
        });
 

        return redirect('/contact')->with('message', 'Your Email Was Sent Successfully ! ');
    }
 

    public function edit()
    {
        $contact   = contact::first();
        return view('admin.contact.Editcontact', compact('contact'));
    }

 
    public function update(Request $request)
    {

        $data = $this->validate(request(), [
                    
                    'email'   => 'required|email|max:255', 
                    'phone'   => 'required|numeric',
                    'fax'     => 'required|numeric',
                    'country' => 'required',  
                    'city'    => 'required',   
                    'address' => 'required',   
                    'lat'     => 'required',   
                    'lan'     => 'required',   
            ]); 
        
        $data['email']   = $request->email;     
        $data['phone']   = $request->phone;     
        $data['fax']     = $request->fax;     
        $data['country'] = $request->country;
        $data['city']    = $request->city; 
        $data['address'] = $request->address; 
        $data['lat']     = $request->lat; 
        $data['lan']     = $request->lan; 
 
     
        $contact     = contact::first();
        $contact->update($data);
        return redirect ('/admin/contact/edit');
    }
 
}
