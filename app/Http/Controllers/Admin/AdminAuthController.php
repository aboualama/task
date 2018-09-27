<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\admin; 
use App\Mail\AdminResetPassword;
use App\DataTables\AdminDatatable;
use Carbon\Carbon;
use DB;
use Mail;
 

class AdminAuthcontroller extends Controller
{

	public function index(AdminDatatable $admin)
    {
        return $admin->render('admin.admin.admin' , ['title' => 'Admin Control']); 
    }
   
   	public function loginpage()
   	{ 
		return view('admin.admin.auth.login');
   	}
   
   	public function login()
   	{
 		$remember = request('remember') == 1 ? true : false ; 

        if ( auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $remember) ) {
            return redirect ('/admin') ;
        }else{
        	session()->flash('error' , trans('admin.you_cant_login'));
            return redirect ('admin/login');
        }
   	}

   
  	public function forgot_password()
   	{ 
		return view('admin.auth.forgot_password');
   	}
 
   
	public function forgot_password_post() 
	{
		$admin = admin::where('email', request('email'))->first();
		if (!empty($admin)) {
			$token = app('auth.password.broker')->createToken($admin);
			$data  = DB::table('password_resets')->insert([
					'email'      => $admin->email,
					'token'      => $token,
					'created_at' => Carbon::now(),
				]);
			Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
			session()->flash('success', trans('admin.the_link_reset_sent'));
			return back();
		}
		return back();
	}
	
	public function reset_password_final($token) 
	{
		$this->validate(request(), [
				'password'              => 'required|confirmed',
				'password_confirmation' => 'required',
			], [], [
				'password'              => 'Password',
				'password_confirmation' => 'Confirmation Password',
			]);
		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		if (!empty($check_token)) {
			$admin = admin::where('email', $check_token->email)->update([
					'email'    => $check_token->email,
					'password' => bcrypt(request('password'))
				]);
			DB::table('password_resets')->where('email', request('email'))->delete();
			admin()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
			return redirect(url('admin/'));
		} else {
			return redirect(url('admin/forgot/password'));
		}
	}
	
	public function reset_password($token) 
	{
		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		if (!empty($check_token)) {
			return view('admin.auth.reset_password', ['data' => $check_token]);
		} else {
			return redirect(url('admin/forgot/password'));
		}
	}
 
   
   public function logout()
   { 
 		Auth::guard('admin')->logout();
 		return redirect ('admin/login');
   }

 
    public function destroy($id)
    {
        $admin     = admin::find($id);
        $admin->delete();

        return back() ;
    }


}
