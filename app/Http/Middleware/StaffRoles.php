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
        $see_admin = Auth::user()->role->permissions()->where('code', 'see_admin_panel')->get();
        if (!$see_admin->count()) {
            return redirect('/');
        }

        return $next($request);
    }
}
