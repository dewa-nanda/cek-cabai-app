<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        if ($request->user()->hasType($type)) {
            return $next($request);
        }

        if(Auth::user())
        {
            return redirect(route('dashboard'))->with('success', "You don't have permission to access this page.");
        }

        return redirect(route('loginView'))->with('success', "You don't have permission to access this page.");
    }
}
