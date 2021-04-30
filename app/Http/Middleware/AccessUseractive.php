<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessUseractive
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

        if(Auth::user()->status=='active'){
              return redirect('/'); 
        }
        

      
        return $next($request);
      
                
    }
}
