<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; 

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest' , ['except' => ['getlogout' , 'edit' , 'update']] );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'    => 'required|string|min:6|max:255',
            'last_name'     => 'required|string|min:6|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
            'date'          => 'required',
            'gender'        => 'required',
            'bio'           => 'required|string|min:6|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name'=> $data['first_name'],
            'last_name' => $data['last_name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'date'      => $data['date'],
            'gender'    => $data['gender'],
            // 'status'    => $data['status'],
            'bio'       => $data['bio'], 
        ]);
    }


   public function edit()

    {
        $user = Auth::user();
        return view('auth.edit' , compact('user'));
    }


   public function update(request $request)

    {   

        $user = Auth::user(); 
 
        $data = $this->validate(request(), [

            'first_name'    => 'required|string|min:6|max:255',
            'last_name'     => 'required|string|min:6|max:255', 
            'date'          => 'required',
            'gender'        => 'required',
            'bio'           => 'required|string|min:6|max:255',
                
            ]);
        
  
        $data['first_name'] = $request->first_name;
        $data['last_name']  = $request->last_name;
        $data['email']      = $request->email;
        $data['date']       = $request->date;
        $data['gender']     = $request->gender;
        // $data['status']  = $request->status;
        $data['bio']        = $request->bio;   

        if ( ! $request->password == '')
        {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);
        return redirect ('/home')->with('succses' , 'Your account has been updated!');
    }

}
