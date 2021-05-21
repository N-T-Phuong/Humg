<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        //dd($role);
        //dd(explode('|', $role);
        $allowsRoles = explode('|', $role);
        if (in_array(Auth::user()->getStrRole(), $allowsRoles))
        {
            return $next($request);
        }
        return redirect()->back()
            ->with('bạn không có quyền truy cập trang này');
    }
}
