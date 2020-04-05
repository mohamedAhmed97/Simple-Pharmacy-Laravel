<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class DoctorAuth
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
        if (!Auth::guard('doctor')->check()) {
            return redirect()->route('doctorLogin.index');
        }

        return $next($request);
    }
}
