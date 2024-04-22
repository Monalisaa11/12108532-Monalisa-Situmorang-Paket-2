<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isGuest
{
    
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.index')->with('error', 'Anda sudah login!');
        }
        return $next($request);
    }
}
