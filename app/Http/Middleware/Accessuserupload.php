<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessUserUpload
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->hasAnyRole('user')){
        if(Auth::user()->status=='inactive'){
              return redirect('/profile/edit'); 
        }
        return $next($request); 
         
      
      }
      return redirect('/');
                 
    }
}
