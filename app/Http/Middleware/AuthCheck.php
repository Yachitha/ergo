<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthCheck
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
        $role=session('Cdata')->user->user_type;

        switch ($role) {
            case "Admin":
                return $next($request);
                break;
            case "CEO":
                return $next($request);
                break;
            case "Developer":
                return redirect('/landing');
            default:
                return redirect('/landing');
                break;
        }
    }
}
//Project Manager