<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth as users;

class auth
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
        $id = users::id();
        if($id){
        return $next($request);
        }else{
            return redirect('login');
        }
    }
}
