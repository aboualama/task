<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class settingmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $option = null)
    {
        if (DB::table('settings')->where('name' , $option )->value('status') == 'active' ) {

            return $next($request);

        }else {
            return redirect('/');
        }
    }
}
 