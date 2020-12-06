<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class StaffRoles
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
        $role = new Role();

        if (!in_array(Auth::user()->role->code, $role->staffRoles())) {
            return redirect('/');
        }

        return $next($request);
    }
}
