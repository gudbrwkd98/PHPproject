<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessUser
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
        
        if(Auth::user()->status=='inactive'){
              return redirect('editprofile'); 
        }
        elseif(Auth::user()->status=='admincreate'){
              return redirect('changepass'); 
        }
        return $next($request); 
         
      
      
    
                 
    }
}
